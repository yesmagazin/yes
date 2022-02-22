<?php
//echo 'test';
$data = "POST: ".print_r($_POST, true);
file_put_contents('test.txt', $data);

if($_GET['manual_send'] == '1' && 1 === 2) {
    ini_set('display_errors', true);
    $phones = array("+380 (50) 550-59-07",
        "+380 (96) 205-18-13",
        "+380 (97) 161-85-16",
        "+380 (66) 941-81-42",
        "+380 (67) 527-16-76",
        "+380 (50) 402-92-68",
        "+380 (63) 678-56-52",
        "+380 (67) 928-35-53",
        "+380 (97) 873-47-75",
        "+380 (97) 168-96-65");

    $codes = file_get_contents('codes.txt');
    $codes = unserialize($codes);

    $codesSended = file_get_contents('codes-sended.txt');
        if(!empty($codesSended))
            $codesSended = unserialize($codesSended);

    foreach($phones as $phone) {
        $index = mt_rand(0, count($codes) - 1);
        $key = '2cc3423385be7f54f7267d48a02d8a26be87191d';
        $phone = str_replace(array("+", "-", " ", "(", ")"), '', $phone);
        $phonePart = substr($phone, -3);
        $codePart = 'yes-716';

        $text = "Промокод: {$codes[$index]}\nКупити тут - https://yes-tm.com/actions-partners";

        $phoneExists = false;

        foreach($codesSended as $codeSended) {
            if($codeSended['phone'] == $phone) {
                //$phoneExists = true;
                //continue;
            }
        }

        $codeForClient = $codes[$index];

        unset($codes[$index]);
        $codes = array_values($codes);

        $dataSend = array(
            'recipients' => array(
                $phone,
            ),
            'sms' => array(
                'sender' => 'Market',
                'text' => $text,
            ),
            'token' => $key
        );
        $url = "https://api.turbosms.ua/message/send.json?" . http_build_query($dataSend);
        //$result = file_get_contents($url);

        $ch = curl_init();

//Set the URL that you want to GET by using the CURLOPT_URL option.
        curl_setopt($ch, CURLOPT_URL, $url);

//Set CURLOPT_RETURNTRANSFER so that the content is returned as a variable.
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

//Set CURLOPT_FOLLOWLOCATION to true to follow redirects.
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);

//Execute the request.
        $data = curl_exec($ch);

//Close the cURL handle.
        curl_close($ch);

        echo "Index: {$index}; Code: {$codeForClient}; Phone: {$phone}<br/>";

        $codesSended[] = array(
            'phone' => $phone,
            'code' => $codeForClient,
            'date' => date('d.m.Y H:i:s')
        );
    }
    $codes = serialize($codes);
    file_put_contents('codes.txt', $codes);

    $codesSended = serialize($codesSended);

    file_put_contents('codes-sended.txt', $codesSended);
}

if(!empty($_POST['Phone']) && !empty($_POST['formid'])) {
    if($_POST['formid'] == 'form213148422') {
        $codes = file_get_contents('codes.txt');
        $codes = unserialize($codes);
        $codesSended = file_get_contents('codes-sended.txt');
        if(!empty($codesSended))
            $codesSended = unserialize($codesSended);


        $index = mt_rand(0, count($codes) - 1);
        $key = '2cc3423385be7f54f7267d48a02d8a26be87191d';
        $phone = str_replace(array("+", "-", " ", "(", ")"), '', $_POST['Phone']);
        $phonePart = substr($phone, -3);
        $codePart = 'yes-716';

        $text = "Промокод: {$codes[$index]}\nКупити тут - https://yes-tm.com/actions-partners";

        $phoneExists = false;

        foreach($codesSended as $codeSended) {
            if($codeSended['phone'] == $phone) {
                $phoneExists = true;
                die('exists');
            }
        }

        $codeForClient = $codes[$index];

        unset($codes[$index]);
        $codes = array_values($codes);
        $codes = serialize($codes);
        file_put_contents('codes.txt', $codes);

        $dataSend = array(
            'recipients' => array(
                $phone,
            ),
            'sms' => array(
                'sender' => 'Market',
                'text' => $text,
            ),
            'token' => $key
        );
        $url = "https://api.turbosms.ua/message/send.json?" . http_build_query($dataSend);
        //$result = file_get_contents($url);

        $ch = curl_init();

//Set the URL that you want to GET by using the CURLOPT_URL option.
        curl_setopt($ch, CURLOPT_URL, $url);

//Set CURLOPT_RETURNTRANSFER so that the content is returned as a variable.
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

//Set CURLOPT_FOLLOWLOCATION to true to follow redirects.
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);

//Execute the request.
        $data = curl_exec($ch);

//Close the cURL handle.
        curl_close($ch);

        $codesSended[] = array(
            'phone' => $phone,
            'code' => $codeForClient,
            'date' => date('d.m.Y H:i:s')
        );

        $codesSended = serialize($codesSended);

        file_put_contents('codes-sended.txt', $codesSended);

        file_put_contents('test.txt', $url." ".print_r($data, true));
    }
}else{
    echo "Hello World";
}