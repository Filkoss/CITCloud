<?php
$servername = "localhost";
$username = "novotny12";
$password = "Filda942703";
$dbname = "CITCloud";

// Vytvoření připojení
$conn = new mysqli($servername, $username, $password, $dbname);

// Kontrola připojení
if ($conn->connect_error) {
    die("Připojení selhalo: " . $conn->connect_error);
}

// SQL dotaz pro načtení příspěvků
$sql = "SELECT id, title, content, created_at FROM posts ORDER BY created_at DESC";
$result = $conn->query($sql);

$posts = array();
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $posts[] = $row;
    }
}

// Výstup jako JSON
header('Content-Type: application/json');
echo json_encode($posts);

$conn->close();
?>
