<?php
    /*
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
    */

    function getVehicles($orderBy = 'price', $make_id = null, $type_id = null, $class_id = null) {
        global $db;
        $query = "SELECT vehicles.*, makes.make, types.type, classes.class 
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
            $query .= " WHERE " . implode(" AND ", $conditions);
        }
    
        if ($orderBy === 'year') {
            $query .= " ORDER BY vehicles.year DESC";
        } else {
            $query .= " ORDER BY vehicles.price DESC";
        }

        // $result = $db->query($query); 

        // $vehicles = [];
        // while ($row = $result->fetch_assoc()) {
        //     $vehicles[] = $row;
        // }

    
        $statement = $db->prepare($query);
        $statement->execute();
        $vehicles = $statement->fetchAll();
        $statement->closeCursor();
    
        return $vehicles;
    }

    
    /*
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
    */
    function getMakes($db) { // make_id
        global $db;
        $query = "SELECT * FROM makes ORDER BY make";
        $statement = $db->prepare($query);
        // $statement->bindValue(':make', $make_id);
        $statement->execute();
        $makes = $statement->fetchAll();
        $statement->closeCursor();
        return $makes;
    }
    
    function getTypes($db) { // type_id
        global $db;
        $query = "SELECT * FROM types ORDER BY type";
        $statement = $db->prepare($query);
        $statement->execute();
        $types = $statement->fetchAll();
        $statement->closeCursor();
        return $types;
    }
    
    function getClasses($db) { // class_id
        global $db;
        $query = "SELECT * FROM classes ORDER BY class";
        $statement = $db->prepare($query);
        $statement->execute();
        $classes = $statement->fetchAll();
        $statement->closeCursor();
        return $classes;
    }

?>