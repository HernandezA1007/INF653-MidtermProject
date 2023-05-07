<?php 

    /*
    function connect() {
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "zippyusedautos";

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        return $conn;
    }
    */
    function connect() {
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "zippyusedautos";

        try {
            $db = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        } catch (PDOException $e) {
            $error_message = "Database Error: ";
            $error_message .= $e->getMessage();

        }
        return $db;
    }
?>