<?php
//save.php code
$mysqli=mysqli_connect("localhost", "root", "","appData");

$q = "SELECT id FROM app3 ORDER BY id DESC LIMIT 1";

$result = $mysqli->query($q);

if(!$result) {
    die('<br/>MySQL Error: ' . mysql_error());
}
else {
    
    $row = mysqli_fetch_array($result);
    
    if ($row !== FALSE) {
        $id = $row['id'];
    }
    else {
        die('<br/>MySQL Error: ' . mysql_error());
    }
}

$fileName = "img/app3data/".++$id.".png";
//Get the base-64 string from data
$filteredData=substr($_POST['data'], strpos($_POST['data'], ",")+1);
//Decode the string
$unencodedData=base64_decode($filteredData);
//Save the image
file_put_contents($fileName, $unencodedData);

echo json_encode($fileName);

?>