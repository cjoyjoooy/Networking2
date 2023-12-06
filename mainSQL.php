<?php
$conn = mysqli_connect("localhost", "root", "", "instatxt-db");

date_default_timezone_set('Asia/Manila');
session_start();

//Add Contact

if (isset($_POST['addContact'])) {
    $fName = $_POST['fName'];
    $lName = $_POST['lName'];
    $num = intval($_POST['num']);

    $query = "INSERT INTO contacts (fName, lName, number)
                VALUES ('$fName', '$lName', '$num')";

    mysqli_query($conn, $query);

    header('location: homepage.php?added=true');
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Get data from the POST request
    $groupMessage = $_POST['groupMessage'];
    $receiverNumbers = json_decode($_POST['receiverNumbers']);  // Assuming receiverNumbers is an array

    // Get senderNum from your session or wherever it's stored
    $senderNum = "639156874806";

    // Get the current datetime
    $datetime = date("Y-m-d H:i:s");

    // Insert data into the database
    foreach ($receiverNumbers as $receiverNum) {
        $query = "INSERT INTO msg (senderNum, receiverNum, datetime, msg) VALUES ('$senderNum', '$receiverNum', '$datetime', '$groupMessage')";
        mysqli_query($conn, $query);
    }
}
