<?php

    $conn = mysqli_connect("localhost" ,"root", "" ,"instatxt-db");

    date_default_timezone_set('Asia/Manila');
    session_start();

    //Signup
    if (isset($_POST['signup'])) {
        $fName = $_POST['fName'];
        $lName = $_POST['lName'];
        $num = $_POST['num'];
        $username = $_POST['username'];
        $pass = $_POST['pass'];
        $confPass = $_POST['confPass'];

        if ($pass == $confPass) {
            $query = "INSERT INTO user (username, password, number, fName, lName)
                    VALUES ('$username', '$pass', '$num', '$fName', '$lName')";
            mysqli_query($conn, $query);

            header('location: index.php?success=true');
            
        }

        else {
            header('location: signup.php?invalid=true');
        }

    }

    //Sign in
    if (isset($_POST['signin'])) {
        $username = $_POST['user'];
        $password = $_POST['pass'];

        $query = "SELECT * FROM user WHERE username = '$username' AND BINARY password = '$password'";
        $result = mysqli_query($conn, $query);
        if (mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_assoc($result);
            $_SESSION['name'] = $row['fName']." ".$row['lName'];
            $_SESSION['uName'] = $row['username'];
            $_SESSION['senderNum'] = $row['number'];          
            header('location: homepage.php?success=true');
        }
        else header('location: index.php?invalid=true'); 
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

    //Delete message
    if (isset($_POST['receiver'])) {
        $query = "DELETE FROM msg 
                WHERE (senderNum = $_SESSION[senderNum] AND receiverNum = $_POST[receiver])
                OR (receiverNum = $_SESSION[senderNum]  AND senderNum = $_POST[receiver])";

        mysqli_query($conn, $query);
    }

    //Delete contact
    if (isset($_POST['contNum'])) {
        $query = "DELETE FROM contacts
                WHERE number = $_POST[contNum]";

        mysqli_query($conn, $query);

        $query = "DELETE FROM msg 
                WHERE (senderNum = $_SESSION[senderNum] AND receiverNum = $_POST[contNum])
                OR (receiverNum = $_SESSION[senderNum]  AND senderNum = $_POST[contNum])";

        mysqli_query($conn, $query);
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
        $_SESSION = [];
        header('location: index.php');
    }
?>