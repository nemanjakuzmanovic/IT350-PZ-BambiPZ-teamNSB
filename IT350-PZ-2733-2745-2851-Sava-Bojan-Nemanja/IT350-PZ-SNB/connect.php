 <?php
require_once('dbconnect.php');

try {
    $conn = new PDO("mysql:host=" . SERVER . ";dbname=" . DB, USERNAME, PASSWORD);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo "Connected successfully";
    }
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }
?>