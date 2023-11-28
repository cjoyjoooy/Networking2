<?php

    use Infobip\Configuration;
    use Infobip\Api\SmsApi;
    use Infobip\Model\SmsDestination;
    use Infobip\Model\SmsTextualMessage;
    use Infobip\Model\SmsAdvancedTextualRequest;

    require __DIR__ . "/vendor/autoload.php";

    $message = "Hi. Gusto kag message?";
    $receiverNum = "639917909540";
    $senderNum = "639956132620";

    $apiURL = "9lvwey.api.infobip.com";
    $apiKey = "0f205dd05a10d92655d854d705cfcf8a-6e002280-4a6b-4dc4-bdde-a35d93f2857c";

    $configuration = new Configuration(host: $apiURL, apiKey: $apiKey);
    $api = new SmsApi(config: $configuration);

    $destination = new SmsDestination(to: $receiverNum);

    $theMessage = new SmsTextualMessage(
        destinations:[$destination],
        text: $message,
        from: $senderNum
    );

    //Send SMS

    $request = new SmsAdvancedTextualRequest(messages: [$theMessage]);
    $response = $api -> sendSmsMessage($request);

    echo 'SMS Message sent';
?>