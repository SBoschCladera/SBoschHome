<?php
$contents = file_get_contents("https://dawsonferrer.com/allabres/apis_solutions/elephants.php");
$elephants = json_decode($contents, true);

function getSortedElephantsByNumber($elephants){
    //TODO: Return an array of elephants sorted by it's number (ascending order).
    //NOTES 1: You receive a elephants multidimensional array, you can view it's content with var_dump() function.
    //NOTES 2:You CAN'T use any sorting PHP built-in function.

    $total = count($elephants);

    for($i = 0; $i < $total-1; $i++) {
        $aux[] = array();

        for ($j = 0; $j < $total - 1; $j++) {

            if ($elephants[$j]['number'] > $elephants[$j + 1]['number']) {

                $aux = $elephants[$j];
                $elephants[$j] = $elephants[$j + 1];
                $elephants[$j + 1] = $aux;
            }
        }
    }
    return $elephants;
}

function getSortedElephantsByBirth($elephants){
    //TODO: Return an array of elephants sorted by it's birth date (ascending order).
    //NOTES 1: You receive a elephants multidimensional array, you can view it's content with var_dump() function.
    //NOTES 2:You CAN'T use any sorting PHP built-in function.

    $total = count($elephants);

    for($i = 0; $i < $total -1; $i++){
       $aux[] = array();

        for($j = 0;$j < $total -1;$j++){
            if($elephants[$j]['dob'] > $elephants[$j+1]['dob']){

            $aux = $elephants[$j];
            $elephants[$j] = $elephants[$j+1];
            $elephants[$j+1] = $aux;
            }
        }
    }
    return $elephants;
}


function getSortedElephantsByHavingImage($elephants){
    //TODO: Return an array of elephants sorted depending on whether they have an image (those who have an image go first).
    //NOTES 1: You receive a elephants multidimensional array, you can view it's content with var_dump() function.
    //NOTES 2:You CAN'T use any sorting PHP built-in function.

    $total = count($elephants);

    for($i= 0;$i< $total-1;$i++){
        $aux[] = array();

        for ($j = 0;$j < $total-1;$j++ ){
            if($elephants[$j]['image'] > $elephants[$j+1]['image']){

                $aux = $elephants[$j];
                $elephants[$j] = $elephants[$j+1];
                $elephants[$j+1] = $aux;
            }
        }
    }
    return $elephants;
}

if(isset($_GET["sortingCriteria"])){
    //TODO: Logic to call a function depending on the sorting criteria.

    $mostrar = ($_GET["sortingCriteria"]);

    if(strcmp($mostrar,'number') == 0){
        $elephants = getSortedElephantsByNumber($elephants);

    }else if (strcmp($mostrar,'birth') == 0){
       $elephants = getSortedElephantsByBirth($elephants);

    } else if (strcmp($mostrar,'image') == 0){
        $elephants = getSortedElephantsByHavingImage($elephants);
    }

}

?>

<html lang="es">
<head>
    <title>Elephants</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>


    <style>
        :root {
            --gradient: linear-gradient(to left top, #DD2476 10%, #FF512F 90%) !important;
        }

        body {
            background: #111 !important;
        }

        .card {
            background: #222;
            border: 1px solid #dd2476;
            color: rgba(250, 250, 250, 0.8);
            margin-bottom: 2rem;
        }

        .custom .btn {
            border: 5px solid;
            border-image-slice: 1;
            background: var(--gradient) !important;
            -webkit-background-clip: text !important;
            -webkit-text-fill-color: transparent !important;
            border-image-source:  var(--gradient) !important;
            text-decoration: none;
            transition: all .4s ease;
        }

        .custom .btn:hover, .btn:focus {
            background: var(--gradient) !important;
            -webkit-background-clip: initial !important;
            -webkit-text-fill-color: #fff !important;
            border: 5px solid #fff !important;
            box-shadow: #222 1px 0 10px;
            text-decoration: underline;
        }

        img {
            max-height: 220px;
            height: auto; /* for IE 8 */
            overflow: hidden;
            min-height: 220px;
        }

        .card-text {
            max-height: 100px;
            height: auto; /* for IE 8 */
            overflow: hidden;
            min-height: 100px;
        }

        .custom {
            padding-top: 100px;
        }

    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container-fluid">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <form class="d-flex" action="elephants-multifilter.php">
                <select class="form-control me-2 form-select" aria-label="Sorting criteria" name="sortingCriteria">
                    <option selected value="unsorted">Sorting criteria</option>
                    <option value="number">Number</option>
                    <option value="birth">Year of birth</option>
                    <option value="image">Having image</option>
                </select>
                <button class="btn btn-outline-success" type="submit">Sort</button>
            </form>
        </div>
    </div>
</nav>
<div class="container mx-auto mt-4 custom">
    <div class="row">

        <?php
        //TODO: Logic to print the elephants cards.
        //NOTES 1: You can copy the markup language from the solution deployment.

        for ($i = 0; $i < count($elephants); $i++) {
            // var_dump($elephants);

            echo '<div class="col-md-4">';
            echo '<div class="card" style="width: 18rem">';
            echo '<img src="' . $elephants[$i]["image"] . '"  class="card-img-top" alt="...">';
            echo '<div class="card-body">';
            echo '<h5 class="card-title">' . $elephants[$i]["number"] . " - " . $elephants[$i]["name"] . '</h5>';
            echo '<h6 class="card-subtitle mb2 text-muted">' . "Species: " . '&nbsp' . $elephants[$i]["species"] . '</h6>';
            echo '<h6 class="card-subtitle mb2 text-muted">' . "Year of birth: " . '&nbsp' . $elephants[$i]["dob"] . '</h6>';
            echo '<p class="card-text">' . $elephants[$i]["note"] . '</p>';
            echo '<a href="' . $elephants[$i]["wikilink"] . '" class="btn mr-2" target="_blank">';
            echo '<i class="fas fa-link"></i>';
            echo ' "Visit elephant"';
            echo '</a>';
            echo '</div></div></div>';
        }
        ?>

    </div>
</div>
</body>
</html>