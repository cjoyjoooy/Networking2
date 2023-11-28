<?php 
    $conn = mysqli_connect("localhost" ,"root", "" ,"instatxt-db");

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
?>
