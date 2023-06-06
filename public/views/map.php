<!DOCTYPE html>
<html>
<?php
include('base/head.php')
?>
<head>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"/>
    <link rel="stylesheet" type="text/css" href="public/css/map.css">
    <script>
        var locations = JSON.parse('<?php echo json_encode($locations) ?>');
    </script>
    <script type="module" src="public/js/index.js"></script>
</head>
<body>
<?php
include('base/slider.php')
?>
<div class="wrapper">
    <div class="main">
        <?php
        include('base/nav.php')
        ?>

        <div id="map"></div>
        <script
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDCTZ9K839uJxdnOKG-GmUfL0vK1HyLC5s&callback=initMap&v=weekly"
            defer
        ></script>
    </div>
    <?php
    include('base/footer.php')
    ?>
</div>
</body>

</html>