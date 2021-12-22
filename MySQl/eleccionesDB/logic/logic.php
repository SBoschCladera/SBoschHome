<?php
include "./models/district.php";
include "./models/party.php";
include "./models/result.php";
include "./logic/dhondt.php";
include "./logic/Database.php";

class Logic
{

    //Url para extraer los datos (remoto)
    private $url_base = "https://dawsonferrer.com/allabres/apis_solutions/elections/api.php?data=";
    //Url para extraer los datos (local)
    private $url_base_local = "http://localhost/SBosch/SBoschHome/MySQl/eleccionesDB/api/";
    //Flag que nos indica si debemos extraer los datos de local o remoto
    private $run_local = true;


    //Propiedades para mantener en memoria los datos
    private $parties_in_memory = null;
    private $results_in_memory = null;
    private $districts_in_memory = null;



    public function __construct()
    {
        $this->db = new database();

        /*Sólo para meter datos en base de datos*/
/*
        $parties = $this->getPartiesFromJson();
        foreach ($parties as $party) {
            $this->db->insertPartidos($party);
        }
        $districts = $this->getDistrictsFromJson();
        foreach ($districts as $district) {
            $this->db->insertDistricts($district);
        }
        $results = $this->getResultsFromJson();
        foreach ($results as $result) {
            $this->db->insertResults($result);
        }
*/
    }


    function getPartiesFromJson()
    {
        //Inicializamos array
        $partiesArray = array();
        //Comprobamos si los datos ya estan en memoria
        if ($this->parties_in_memory != null) {
            //Si estan en memoria los devolvemos sin más
            return $this->parties_in_memory;
        }
        //Si no se encontrasen en memoria iriamos al api, dependiendo de si es run_local a true o false, atacaremos una url u otra.
        $parties_json = $this->run_local ? $this->getDecodedUrlContent($this->url_base_local . "parties.json") : $this->getDecodedUrlContent($this->url_base . "parties");
        //Por cada resultado devuelto, lo mapeamos a nuestra clase Party y lo añadimos al array.
        foreach ($parties_json as $key => $party) {
            $partiesArray[$key] = new Party($party);
        }
        //Cargamos los datos en memoria para posteriores consultas
        $this->parties_in_memory = $partiesArray;
        //Devolvemos los datos
        return $partiesArray;
    }


    /**
     * Recupera todos los distritos con los que vamos a trabajar, si el listado ya se encuentra en memoria lo usamos para
     * evitar llamar al api cada vez que necesitamos usar el listado. Alternativamente se puede leer el json directamente
     * en local, emulando que se encuentra en un servicio api externo.
     *      
     * @return array array de objetos de tipo District
     */
    function getDistrictsFromJson()
    {
        $districtsArray = array();
        if ($this->districts_in_memory != null) {
            return $this->districts_in_memory;
        }
        $districts_json = $this->run_local ? $this->getDecodedUrlContent($this->url_base_local . "districts.json") : $this->getDecodedUrlContent($this->url_base . "districts");
        foreach ($districts_json as $key => $district) {
            $districtsArray[$key] = new District($district);
        }
        $this->districts_in_memory = $districtsArray;
        return $districtsArray;
    }

    /**
     * Recupera todos los resultados con los que vamos a trabajar, si el listado ya se encuentra en memoria lo usamos para
     * evitar llamar al api cada vez que necesitamos usar el listado. Alternativamente se puede leer el json directamente
     * en local, emulando que se encuentra en un servicio api externo.
     *      
     * @return array array de objetos de tipo Result
     */
    function getResultsFromJson()
    {
        $resultsArray = array();
        if ($this->results_in_memory != null) {
            return $this->results_in_memory;
        }
        $results_json = $this->run_local ? $this->getDecodedUrlContent($this->url_base_local . "results.json") : $this->getDecodedUrlContent($this->url_base . "results");
        foreach ($results_json as $key => $result) {
            $resultsArray[$key] = new Result($result);
        }
        $this->results_in_memory = $resultsArray;
        return $resultsArray;
    }


    /**
     * Dado un nombre de partido nos devulve todo el objeto con el resto de info.
     * 
     * @param partyName nombre del partido para vuscar en el listado
     * @return Party objeto party que devolvemos tras buscar en el listado
     */
    function getPartyInfo($partyName): Party
    {
        //Iteramos todos los partidos
        foreach ($this->db->getPartiesFromDB() as $party) {
            //foreach ($this->getPartiesFromJson() as $party) {
            //Cuando encontramos en el listado el partido que queremos
            if ($partyName == $party->getName()) {
                //Devolvemos todo el objeto
                return $party;
            }
        }
    }


    /**
     * Helper que nos marca in item preseleccionado en una select
     * 
     * @param filter filtro a contrastar
     * @param match contraste
     */
    function isSelected($filter, $match)
    {
        if ($filter == $match) {
            return "selected";
        } else {
            return "";
        }
    }

    /**
     * Este método coge los datos de distritos y hace el join con los resultados, 
     * de esa manera podemos saber los votos y escaños de cada partido a nivel de
     * distrito. La librería de dhondt ya nos descarta esos partidos que no llegan a 
     * representar un 3% en el total de votos y a continuación nos calcula los 
     * escaños para cada partido.
     * 
     * @return array
     */
    function applyDhondtAlgorithm()
    {
        //Inicializa array vacio
        $fullData = array();
        //Iteramos los distritos
        foreach ($this->db->getDistrictsFromDB() as $district) {
            //foreach ($this->getDistrictsFromJson() as $district) {
            //Por cada distrito calculamos el dhondt
            $d = new Dhondt;
            $d->blankVotes = 0;
            $d->min = 3; //descarte del 3%
            $d->seats = $district->getDelegates(); //Escaños del distrito
            $currentDistrict = $district->getName();
            foreach ($this->db->getResultsFromDB() as $result) { //Iteramos los distritos
                //foreach ($this->getResultsFromJson() as $result) { //Iteramos los distritos
                if ($currentDistrict == $result->getDistrict()) { //Nos interesa unir los datos del distrito con los resultados
                    $party = $this->getPartyInfo($result->getParty()); //Extraemos toda la info del partido (imagen, acronimo, etc...)
                    $d->addParty($currentDistrict, $party, $result->getVotes()); //Añadimos distrito, partido y votos para el cálculo de dhondt
                }
            }
            $d->process(); //Procesamos el algoritmo
            foreach ($d->getParties() as $da) { //Metemos cada uno de los registros que nos ha devuelto en un array vacio...
                $fullData[] = $da;
            }
        }
        return $fullData; //...y lo devolvemos
    }

    /**
     * A partir de los datos ya procesados a nivel de distrito, calculamos los totales 
     * a nivel nacional, sumando los votos y escaños de cada partido en todas las provincias. 
     * Devolvemos los datos en el mismo formato que los recibimos.
     * 
     * @param array $fullData datos ya procesados a nivel de distrito
     * @return array
     */
    function calculateGeneralData($fullData)
    {
        $generalData = array();
        //Iteramos los partidos
        foreach ($this->db->getPartiesFromDB() as $party) {
            //foreach ($this->getPartiesFromJson() as $party) {
            $currentParty = $party->getAcronym();
            //Ponemos contadores a 0 para empezar a sumar cada distrito
            $seats = 0;
            $votes = 0;
            $district = "General";
            foreach ($fullData as $data) {
                //Sólo sumamos aquellos votos y escaños del partido que estamos mirando.
                if ($data['party']->getAcronym() == $currentParty) {
                    $seats = $seats + $data['seats'];
                    $votes = $votes + $data['votes'];
                }
            }
            //Montamos el array de respuesta
            $generalData[] = array('district' => "General", 'party' => $party, 'votes' => $votes, 'seats' => $seats);
        }
        //Devolvemos los resultados
        return $generalData;
    }

    /* PRIVATE METHODS */

    /**
     * Decodifica el json que contiene la url que le pasamos por parametros.
     * Devuleve un objeto con el json parseado.
     * 
     * @param url url donde va a coger el json y decodificarlo
     * @return mixed
     */
    private function getDecodedUrlContent($url)
    {
        return json_decode(file_get_contents($url), true);
    }
}