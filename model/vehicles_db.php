<?php

    function getVehicles($conn, $orderBy = 'price', $make_id = null, $type_id = null, $class_id = null) {
        $sql = "SELECT vehicles.*, makes.make, types.type, classes.class
                FROM vehicles
                INNER JOIN makes ON vehicles.make_id = makes.id
                INNER JOIN types ON vehicles.type_id = types.id
                INNER JOIN classes ON vehicles.class_id = classes.id";

        $conditions = [];

        if ($make_id) {
            $conditions[] = "makes.id = " . intval($make_id);
        }

        if ($type_id) {
            $conditions[] = "types.id = " . intval($type_id);
        }

        if ($class_id) {
            $conditions[] = "classes.id = " . intval($class_id);
        }

        if (!empty($conditions)) {
            $sql .= " WHERE " . implode(" AND ", $conditions);
        }

        if ($orderBy === 'year') {
            $sql .= " ORDER BY vehicles.year DESC";
        } else {
            $sql .= " ORDER BY vehicles.price DESC";
        }

        $result = $conn->query($sql);

        $vehicles = [];
        while ($row = $result->fetch_assoc()) {
            $vehicles[] = $row;
        }

        return $vehicles;
    }

    function getMakes($conn) {
        $sql = "SELECT * FROM makes ORDER BY make";
        $result = $conn->query($sql);

        $makes = [];
        while ($row = $result->fetch_assoc()) {
            $makes[] = $row;
        }

        return $makes;
    }

    function getTypes($conn) {
        $sql = "SELECT * FROM types ORDER BY type";
        $result = $conn->query($sql);

        $types = [];
        while ($row = $result->fetch_assoc()) {
            $types[] = $row;
        }

        return $types;
    }

    function getClasses($conn) {
        $sql = "SELECT * FROM classes ORDER BY class";
        $result = $conn->query($sql);

        $classes = [];
        while ($row = $result->fetch_assoc()) {
            $classes[] = $row;
        }

        return $classes;
    }

?>