<?php
session_start();
if (isset($_POST['submit'])) {
    $mobileno = "7017742830";
    $message = "test";
    sendsms($mobileno, $message);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Send Sms</title>
</head>

<body>

    <form method="post">

        <input type="submit" value="test" name="submit">
    </form>



    <?php


    function sendsms($mobileno, $message)
    {

        $message = urlencode($message);
        $sender = 'OPSERV';
        $apikey = '1207162143847824150';
        $baseurl = 'https://instantalerts.co/api/web/send?apikey=' . $apikey;

        $url = $baseurl . '&sender=' . $sender . '&to=' . $mobileno . '&message=' . $message;
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_POST, false);
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);
        curl_close($ch);

        // Use file get contents when CURL is not installed on server.
        if (!$response) {
            $response = file_get_contents($url);
        }
    }
    ?>
</body>

</html>