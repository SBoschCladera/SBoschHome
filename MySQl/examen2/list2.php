<?php

include_once "country.php";
include_once "city.php";
include_once "image.php";
include_once "neighborhood.php";
include_once "state.php";
include_once "property.php";
include_once "database.php";

$dbo = new database();
$properties = $dbo->getProperties();

$selectedPropertyId = "";
$selectedLatitude = 39.650112;
$selectedLongitude = 2.932662;
$zoom = 10;

if (isset($_GET["propertyId"])) {
    $selectedPropertyId = $_GET["propertyId"];
    $selectedProperty = $dbo->getProperty($selectedPropertyId);
    $selectedLatitude = $dbo->getLatitude();
    $selectedLongitude = $dbo->getLongitude();
    $zoom = 15;
}

?>

<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://dawsonferrer.com/allabres/ddbb/mallorcasa/styles/main.css" rel="stylesheet">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <title>Mallorcasa</title>
</head>
<body>
<section class="head">
    <div class="container">
        <h2 class="text-center"><span><a href="list.php">Mallorcasa</a></span></h2>
    </div>
</section>
<div class="clearfix"></div>
<section class="search-box">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6 listing-block">
                <div class="col-md-6 listing-block">
                    <?php foreach ($properties as $property) { ?>
                        <div id="property= <? echo $property->getId(); ?>>" class="media">
                            <div class="fav-box">
                                <a href="?propertyId= <?php echo $property->getId(); ?>">
                                    <i class="fa fa-map-pin " <?php echo($selectedPropertyId == $property->getId() ? "style='color:red'" : "") ?>
                                       aria-hidden="true"></i>
                                </a>
                            </div>
                            <img class="d-flex align-self-start"
                                 src="<?php echo $property->getImages()[0]->getUrl(); ?>"
                                 alt="Generic placeholder image">
                            <div class="media-body pl-3">
                                <div class="price">
                                    <a href="singleproperty.php?id=<?php echo $property->getId(); ?>">
                                        <?php echo number_format($property->getPrice(), 0, ',', '.'); ?>???
                                    </a>
                                    <small><?php echo $property->getCity()->getName(); ?></small>
                                </div>
                                <div class=" stats">
                                    <span><i class="fa fa-arrows-alt"></i><?php echo $property->getSurface(); ?>m2</span>
                                    <span><i class="fa fa-bed"></i><?php echo $property->getRooms(); ?> Bedrooms</span>
                                    <span><i class="fa fa-bath"></i><?php echo $property->getBathrooms(); ?> Bathrooms</span>
                                </div>

                                <div class="address"><?php echo $property->getZipcode(); ?>
                                    , <?php echo $property->getCity()->getname(); ?></div>
                            </div>
                        </div>
                    <?php } ?>

                </div>
                <div class="col-md-6 map-box mx-0 px-0">
                    <iframe width="100%" height="800" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"
                            src="https://maps.google.com/maps?q=<?php echo $selectedLatitude ?>,<?php echo $selectedLongitude ?>&hl=es&z=<?php echo $zoom ?>&output=embed"></iframe>
                </div>
            </div>
        </div>
</section>
</body>
</html>
