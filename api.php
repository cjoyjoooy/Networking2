<?php

    require("mainSQL.php");

    use Infobip\Configuration;
    use Infobip\Api\SmsApi;
    use Infobip\Model\SmsDestination;
    use Infobip\Model\SmsTextualMessage;
    use Infobip\Model\SmsAdvancedTextualRequest;

    require __DIR__ . "/vendor/autoload.php";

    $apiURL = "9lvwey.api.infobip.com";
    $apiKey = "0f205dd05a10d92655d854d705cfcf8a-6e002280-4a6b-4dc4-bdde-a35d93f2857c";
    $configuration = new Configuration(host: $apiURL, apiKey: $apiKey);
    $api = new SmsApi(config: $configuration);


    $mode = $_POST["mode"];
    $senderNum = $_SESSION['senderNum'];
    
    
    //Status code

    //PENDING_ACCEPTED
    //200 NO_ERROR
    //400 BAD_REQUEST
    //401 UNAUTHORIZED
    //500 GENERAL_ERROR

    //Single
    if ($mode == "single") {
        $message = $_POST['msg'];
        $receiverNum = $_SESSION['receiverNum'];

        //Send SMS
        $destination = new SmsDestination(to: $receiverNum);
        $theMessage = new SmsTextualMessage(
            destinations: [$destination],
            from: $senderNum,
            text: $message
        );
        $request = new SmsAdvancedTextualRequest(messages: [$theMessage]);
        $response = $api -> sendSmsMessage($request);
        $statusCode = $response -> getMessages()[0] -> getStatus() -> getName();

        $dateTime = date("Y-m-d H:i:s");
        $query = "INSERT INTO msg (senderNum, receiverNum, datetime, msg)
                VALUES ('$senderNum', '$receiverNum', '$dateTime', '$message')";
        mysqli_query($conn, $query);
    }


    //Group
    else {
        
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

                // //Send SMS
                // $destination = new SmsDestination(to: $receiverNum);
                // $theMessage = new SmsTextualMessage(
                //     destinations: [$destination],
                //     from: $senderNum,
                //     text: $groupMessage
                // );
                // $request = new SmsAdvancedTextualRequest(messages: [$theMessage]);
                // $response = $api -> sendSmsMessage($request);
                // $statusCode = $response -> getMessages()[0] -> getStatus() -> getName();

                // $query = "INSERT INTO msg (senderNum, receiverNum, datetime, msg) VALUES ('$_SESSION[senderNum]', '$receiverNum', '$datetime', '$groupMessage')";
                // mysqli_query($conn, $query);
                echo $receiverNumbers;
            }
        }
    }

    header('location: homepage.php');
    
?>