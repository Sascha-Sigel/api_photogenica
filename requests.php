<?php
include 'connection.php';

$request = $_POST['request'];

//$request = 'getUsers';

if ($request == 'getUsers') {
    $res = $connection->query('SELECT * FROM TUsers');
    $rows = array();
    
    if ($res->num_rows > 0) {
        while($row = $res->fetch_assoc()) {
            array_push($rows, $row);
        }
    } else {
        echo "0 results";
    }
    echo json_encode($rows);
    
    $connection->close();
}

if ($request == 'getPlaces') {
    $res = $connection->query('SELECT * FROM TPlaces');
    $rows = array();
    
    if ($res->num_rows > 0) {
        while($row = $res->fetch_assoc()) {
            array_push($rows, $row);
        }
    } else {
        echo "0 results";
    }
    echo json_encode($rows);
    
    $connection->close();
}

if ($request == 'addPlace') {
    $descr = $_POST['descr'];
    $lat = $_POST['lat'];
    $lng = $_POST['lng'];
    $userid = $_POST['userid'];

    $connection->query("INSERT INTO TPlaces (PlaceId, PlaceDescr, PlaceNumLikes, PlaceLatitude, PlaceLongitude, UserId) VALUES (NULL, '" . $descr . "', 0, " . $lat . ", " . $lng . ", " . $userid . ")");
    
    $connection->close();
}

if ($request == 'login') {
    $email = $_POST['email'];
    $hash = $_POST['hash'];

    $res = $connection->query("SELECT UserId FROM TUsers WHERE UserEMail = '" . $email . "' AND UserHash = '" . $hash . "';");

    if ($res->num_rows > 0) {
        $row = $res->fetch_assoc();
        echo json_encode($row);
    } else {
        echo json_encode(array('UserId' => -1));
    }
    
    $connection->close();

}
?>