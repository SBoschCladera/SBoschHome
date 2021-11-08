<?php
include "./clases/district.php";
include "./clases/party.php";
include "./clases/result.php";
include "./logic/dhondt.php";

class Logic
{

    private $url_base = "https://dawsonferrer.com/allabres/apis_solutions/elections/api.php?data=";
    //Url para extraer los datos (local)
    private $url_base_local = "http://localhost/SBoschHome/OOP/elecciones/api/";
    //Boolean que indica si debemos extraer los datos de local
    private $run_local = true;

    //Para tener los datos en memoria
    private $parties_in_memory = null;
    private $results_in_memory = null;
    private $districts_in_memory = null;


    /**
     * Recupera todos los partidos con los que vamos a trabajar.
     *     * @return array array de objetos de tipo Party
     */
    function getParties()
    {
        $partiesArray = array();
        //Se comprueba si los datos ya están en memoria
        if ($this->parties_in_memory != null) {
            return $this->parties_in_memory;
        }
        //Si no están en memoria los cogemos del api.
        $parties_json = $this->run_local ? $this->getDecodedUrlContent($this->url_base_local . "parties.json") : $this->getDecodedUrlContent($this->url_base . "parties");
        foreach ($parties_json as $key => $party) {
            $partiesArray[$key] = new Party($party);
        }
        //Cargamos los datos en memoria
        $this->parties_in_memory = $partiesArray;
        return $partiesArray;
    }

    /**
     * Recupera todos los distritos con los que vamos a trabajar.
     *     * @return array array de objetos de tipo District
     */
    function getDistricts()
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
     * Recupera todos los resultados con los que vamos a trabajar.
     * @return array array de objetos de tipo Result
     */
    function getResults()
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
     * Con el nombre de un partido nos devuelve un objeto con toda la información de éste.
     *
     * @param partyName nombre del partido para buscar en el listado
     * @return Party objeto party que devolvemos tras buscar en el listado
     */
    function getPartyInfo($partyName): Party
    {

        foreach ($this->getParties() as $party) {
            if ($partyName == $party->getName()) {
                return $party;
            }
        }
    }

    /**
     * Nos marca un item preseleccionado.
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
     * Aplica el método de Dhondt a nivel de distrito.
     * @return array
     */
    function applyDhondtAlgorithm()
    {
        $fullData = array();
        foreach ($this->getDistricts() as $district) {
            $d = new Dhondt;
            $d->blankVotes = 0;
            $d->min = 3;   //descarte del 3%
            $d->seats = $district->getDelegates();
            $currentDistrict = $district->getName();
            foreach ($this->getResults() as $result) {
                if ($currentDistrict == $result->getDistrict()) {
                    $party = $this->getPartyInfo($result->getParty());
                    $d->addParty($currentDistrict, $party, $result->getVotes()); //Añadimos distrito, partido y votos para el cálculo de escaños
                }
            }
            $d->process(); //Procesamos el algoritmo
            foreach ($d->getParties() as $da) {
                $fullData[] = $da;
            }
        }
        return $fullData;
    }

    /**
     * A partir de los datos a nivel de distrito, aplica el método de Dhondt a nivel nacional.
     *
     * @param array $fullData datos a nivel de distrito
     * @return array
     */
    function calculateGeneralData($fullData)
    {
        $generalData = array();

        foreach ($this->getParties() as $party) {
            $currentParty = $party->getAcronym();
            $seats = 0;
            $votes = 0;
            $district = "General";
            foreach ($fullData as $data) {
                if ($data['party']->getAcronym() == $currentParty) {
                    $seats = $seats + $data['seats'];
                    $votes = $votes + $data['votes'];
                }
            }
            $generalData[] = array('district' => "General", 'party' => $party, 'votes' => $votes, 'seats' => $seats);
        }
        return $generalData;
    }


    /**
     * Decodifica el json que contiene la url
     * @param url url donde va a coger el json y decodificarlo
     * @return mixed
     */
    private function getDecodedUrlContent($url)
    {
        return json_decode(file_get_contents($url), true);
    }
}