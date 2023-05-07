<?php 

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

?>

<?php 
/*
$dsn = "mysql:host=localhost; dbname=assignment_tracker";
$username = 'root';

try {
$db = new PDO($dsn, $username);

} catch (PDOException $e){
$error_message = "Database Error: ";
$error_message .= $e->getMessage();
include('view/error.php');
exit();
}
*/