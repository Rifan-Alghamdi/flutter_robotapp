<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "robot_arm_db";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM robot_status ORDER BY id DESC";
$result = $conn->query($sql);

$poses = array();

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $poses[] = $row;
    }
}

echo json_encode($poses);

$conn->close();
?>