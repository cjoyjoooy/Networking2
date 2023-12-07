<?php
    require("mainSQL.php");

    use Infobip\Configuration;
    use Infobip\Api\SmsApi;
    use Infobip\Model\SmsDestination;
    use Infobip\Model\SmsTextualMessage;
    use Infobip\Model\SmsAdvancedTextualRequest;

    require __DIR__ . "/vendor/autoload.php";

    $message = "Hi. Gusto kag message?";

    // $senderNum = $_SESSION['senderNum'];
    // $receiverNum = $_SESSION['receiverNum'];
    
    $senderNum = "Sender Test <3";
    $receiverNum = "639958751284";

    $apiURL = "9lvwey.api.infobip.com";
    $apiKey = "0f205dd05a10d92655d854d705cfcf8a-6e002280-4a6b-4dc4-bdde-a35d93f2857c";

    $configuration = new Configuration(host: $apiURL, apiKey: $apiKey);
    $api = new SmsApi(config: $configuration);

    $destination = new SmsDestination(to: $receiverNum);

    $theMessage = new SmsTextualMessage(
        destinations: [$destination],
        from: $senderNum,
        text: $message
    );

    //Send SMS

    $request = new SmsAdvancedTextualRequest(messages: [$theMessage]);
    $response = $api -> sendSmsMessage($request);
    
    $statusCode = $response -> getMessages()[0] -> getStatus() -> getName();
    echo $statusCode;

    //PENDING_ACCEPTED
    //200 NO_ERROR
    //400 BAD_REQUEST
    //401 UNAUTHORIZED
    //500 GENERAL_ERROR

    // $dateTime = date("Y-m-d H:i:s");
    // $query = "INSERT INTO msg (senderNum, receiverNum, datetime, msg)
    //         VALUES ('$senderNum', '$receiverNum', '$dateTime', '$message')";
    // mysqli_query($conn, $query);
    // mysqli_close($conn);

?>