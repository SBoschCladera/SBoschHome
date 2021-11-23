/* --------------------MI EXAMEN----------------- */



<?php
$seed = 0436; //TODO: LAST 4 NUMBERS OF YOUR DNI.

$api_url = "https://dawsonferrer.com/allabres/apis_solutions/rickandmorty/api.php?seed=" . $seed . "&data=";
//NOTE: Arrays unsorted
$characters = json_decode(file_get_contents($api_url . "characters"), true);
$episodes = json_decode(file_get_contents($api_url . "episodes"), true);
$locations = json_decode(file_get_contents($api_url . "locations"), true);

function getSortedCharactersById($characters)
{
    //TODO: Your code here.

    for ($i = 0;$i < count($characters)-1;$i++){
        for($j = $i+1; $j < count($characters);$j++){
            if($characters[$j]['id'] < $characters[$i]['id']){

                $aux = $characters[$i];
                $characters[$i] = $characters[$j];
                $characters[$j] = $aux;
            }
        }
    }
    return $characters;
}

function getSortedCharactersByOrigin($characters)
{
    //TODO: Your code here.

    for ($i = 0;$i < count($characters)-1;$i++){
        for($j = $i+1; $j < count($characters);$j++){
            if($characters[$j]['location'] < $characters[$i]['location']){

                $aux = $characters[$i];
                $characters[$i] = $characters[$j];
                $characters[$j] = $aux;
            }
        }
    }
    return $characters;
}

function getSortedCharactersByStatus($characters)
{
    //TODO: Your code here.

    for ($i = 0;$i < count($characters)-1;$i++){
        for($j = $i+1; $j < count($characters);$j++){
            if($characters[$j]['status'] < $characters[$i]['status']){

                $aux = $characters[$i];
                $characters[$i] = $characters[$j];
                $characters[$j] = $aux;
            }
        }
    }
    return $characters;
}

//NOTE: OPTIONAL FUNCTION
function getSortedLocationsById($locations)
{
    //TODO: Your code here.

    for ($i = 0;$i < count($locations)-1;$i++){
        for($j = $i+1; $j < count($locations);$j++){
            if($locations[$j]['id'] < $locations[$i]['id']){

                $aux = $locations[$i];
                $locations[$i] = $locations[$j];
                $locations[$j] = $aux;
            }
        }
    }
    return $locations;


}

//NOTE: OPTIONAL FUNCTION
function getSortedEpisodesById($episodes)
{
    //TODO: Your code here.

    for ($i = 0;$i < count($episodes)-1;$i++){
        for($j = $i+1; $j < count($episodes);$j++){
            if($episodes[$j]['id'] < $episodes[$i]['id']){

                $aux = $episodes[$i];
                $episodes[$i] = $episodes[$j];
                $episodes[$j] = $aux;
            }
        }
    }
    return $episodes;


}

function mapCharacters($characters)
{
    //TODO: Your code here.

    global $characters;
    global $episodes;
    global $locations;


    for($i = 0;$i < count($characters); $i++){
        for($j = 0;$j < count($locations); $j++){
            if($characters[$i]['origin'] = $locations[$j]['name']){
                $characters[$i]['Procedencia'] = $locations[$j]['name'];
            }
        }
        for($j = 0;$j < count($episodes); $j++){
            if($characters[$i]['episodes'] = $episodes[$j]['name']){
                $characters[$i]['TítuloEpisodio'] = $episodes[$j]['name'];
            }
        }
    }
    return $characters;
}

//NOTE: Function to render each character card HTML. Don't edit.
function renderCard($character)
{
    $ch = curl_init('https://dawsonferrer.com/allabres/apis_solutions/rickandmorty/api.php?data=render');
    $data = array("character" => $character);
    $postData = json_encode($data);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
    $result = curl_exec($ch);
    curl_close($ch);
    return $result;
}

//NOTE: $sortingCriteria receive the sorting criteria of the form. Don't edit
$sortingCriteria = "";
if (isset($_GET["sortingCriteria"])) {
    $sortingCriteria = $_GET["sortingCriteria"];
    switch ($sortingCriteria) {
        case "id":
            $characters = getSortedCharactersById($characters);
            break;
        case "origin":
            $characters = getSortedCharactersByOrigin($characters);
            break;
        case "status":
            $characters = getSortedCharactersByStatus($characters);
            break;
    }
}

//NOTE: Save function returns to variables and then you can use it as globals if needed. Don't edit.
$sortedLocations = getSortedLocationsById($locations);
$sortedEpisodes = getSortedEpisodesById($episodes);
$mappedCharacters = mapCharacters($characters);

?>

<html lang="es">
<head>
    <title>RMDB</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
            crossorigin="anonymous"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <form class="d-flex" action="rickandmorty.php">
                <select class="form-control me-2 form-select" aria-label="Sorting criteria" name="sortingCriteria">
                    <option <?php echo($sortingCriteria == "" ? "selected" : "") ?> value="unsorted">Sorting criteria
                    </option>
                    <option <?php echo($sortingCriteria == "id" ? "selected" : "") ?> value="id">Id</option>
                    <option <?php echo($sortingCriteria == "origin" ? "selected" : "") ?> value="origin">Origin</option>
                    <option <?php echo($sortingCriteria == "status" ? "selected" : "") ?> value="status">Status</option>
                </select>
                <button class="btn btn-outline-success" type="submit">Sort</button>
            </form>
        </div>
    </div>
</nav>
<main role="main">
    <div class="py-5 bg-light">
        <div class="container">

            <div class="row">
                <?php
                //TODO: Your code here.


                $characterId = getSortedCharactersById($characters);

                /*   for ($i = 0;$i < count($characterId);$i++){
                      echo '<div class="col-md-4 col-sm-12 col-xs-12">';
                      echo '<div class="card mb-4 box-shadow bg-light">';
                      echo '<img class="card-img-top" src=".characterId[$i]['image']" alt="https://dawsonferrer.com/allabres/apis_solutions/rickandmorty/images/character_115_avatar.jpg">';
                      echo '<div class="card-body">';
                      echo '<h5 class="card-title">. $characterId[$i]["name"].</h5>';
                      echo '<div class="alert alert-success" style="padding:0;" role="alert">.$characterId[$i]["status"]. - .$characterId[$i]["species"]</div>';
                      echo '<form><div class="mb-3" style="margin-bottom:0!important;">';
                      echo '<label for="exampleInputEmail1" class="form-label" style="margin-bottom: 0;">';
                      echo '<strong>Origin:</strong></label><div id="emailHelp" class="form-text" style="margin-top:0;">. loca.</div></div><div class="mb-3">';
                      echo '<label for="exampleInputEmail1" class="form-label" style="margin-bottom: 0;"><strong>Last known location:</strong></label><div id="emailHelp" class="form-text" style="margin-top:0;">Earth (Replacement Dimension)</div></div></form><div class="d-flex justify-content-between align-items-center"><div class="btn-group"><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#characterModal_115">View episodes</button><!-- Modal --><div class="modal fade" id="characterModal_115" tabindex="-1" aria-labelledby="characterModalLabel_115" aria-hidden="true"><div class="modal-dialog"><div class="modal-content"><div class="modal-header"><h5 class="modal-title" id="characterModalLabel_115">Episodes list</h5><button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button></div><div class="modal-body"><ol class="list-group"><li class="list-group-item">Get Schwifty</li><li class="list-group-item">The Whirly Dirly Conspiracy</li></ol></div><div class="modal-footer"><button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button></div></div></div></div></div><small class="text-muted">2017-12-26</small></div></div></div></div>';
                   }*/

                var_dump(getSortedCharactersById($characters));
                // var_dump(getSortedCharactersByOrigin($characters));
                // var_dump(getSortedCharactersByStatus($characters));


                ?>
            </div>
        </div>
    </div>

</main>
</body>
</html>