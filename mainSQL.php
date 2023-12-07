<?php 
    $conn = mysqli_connect("localhost" ,"root", "" ,"instatxt-db");

    date_default_timezone_set('Asia/Manila');
    session_start();

    //Signup
    if (isset($_POST['signup'])) {
        $fName = $_POST['fName'];
        $lName = $_POST['lName'];
        $num = $_POST['num'];
        $username = "@".$_POST['username'];
        $pass = $_POST['pass'];
        $confPass = $_POST['confPass'];

        if ($pass == $confPass) {
            $query = "INSERT INTO user (number, fName, lName, username, pass)
                    VALUES ('$num', '$fName', '$lName', '$username', '$pass')";
            mysqli_query($conn, $query);

            header('location: index.php?success=true');
            
        }

        else {
            header('location: signup.php?invalid=true');
        }

    }

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

    // //Search
    // if (isset($_POST['search'])) {
    //     $query = "SELECT * FROM contacts 
    //             WHERE fName LIKE %$_POST[keyword]% 
    //             OR lName LIKE %$_POST[keyword]%";
    //     $result = mysqli_query($conn, $query);
        
    //     while ($row = mysqli_fetch_assoc($result)) {
    //         echo $row['fName']."".$row['lName'];
    //     }
    // }

    //Logout

    if (isset($_POST['logout'])) {
        session_destroy();
        session_abort();
        header('location: index.php');
    }
?>
