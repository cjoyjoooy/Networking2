<?php
    require("mainSQL.php");

    echo "Sender: $_SESSION[senderNum]<br>";
    echo "Receiver: $_SESSION[receiverNum]<br>";
    echo "Message: $_POST[msg]<br>";


    $date = date_create("2013-03-15 10:48:25");
    echo date_format($date,"M. j,Y H:i:s a");

?>