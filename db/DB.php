<?php


$serverName = "PCGIADA\SQLEXPRESS"; 
$connectionOptions = [
    "Database" => "ecommerce",
    "UID" => "", 
    "PWD" => ""  
];

// Create connection
$conn = sqlsrv_connect($serverName, $connectionOptions);

// Check connection
if ($conn === false) {
    die(print_r(sqlsrv_errors(), true));
}else{
    echo 'connesso';
}

$sql = "SELECT * FROM products";
$stmt = sqlsrv_query($conn, $sql);

if ($stmt === false) {
    die(print_r(sqlsrv_errors(), true));
}

if (sqlsrv_has_rows($stmt)) {
    // output data of each row
    while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
      //   echo "id: " . $row["id"] . " - Name: " . $row["name"] . " " . $row["description"] . " " . $row["price"] ;
   var_dump($row);
    }
} else {
    echo "0 results";
}

// Close the connection
sqlsrv_free_stmt($stmt);
sqlsrv_close($conn);
?>




 ?>