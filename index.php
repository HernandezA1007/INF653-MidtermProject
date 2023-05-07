<?php
// Antonio Hernandez
// INF653
// Muvva
// 3-25-23
?>

<?php

    require("model/database.php");
    require("model/vehicles_db.php");
    require("view/public_homepage.php");

    $conn = connect();

    $orderBy = isset($_GET['sort']) && $_GET['sort'] === 'year' ? 'year' : 'price';
    $make_id = isset($_GET['make_id']) ? $_GET['make_id'] : null;
    $type_id = isset($_GET['type_id']) ? $_GET['type_id'] : null;
    $class_id = isset($_GET['class_id']) ? $_GET['class_id'] : null;

    $vehicles = getVehicles($conn, $orderBy, $make_id, $type_id, $class_id);
    $makes = getMakes($conn);
    $types = getTypes($conn);
    $classes = getClasses($conn);

    $conn->close();

    renderPublicHomepage($vehicles, $makes, $types, $classes);