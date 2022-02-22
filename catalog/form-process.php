<?php
date_default_timezone_set('Europe/Kiev'); 
if (is_file('../config.php')) {
	require_once('../config.php');
}
if (is_file('connect.php')) {
    require_once('connect.php');
}

$db = new DB(DB_HOSTNAME, DB_DATABASE, DB_USERNAME, DB_PASSWORD);

$goods = $db->query("SELECT value from " . DB_PREFIX . "setting  where `key` = 'config_email' ")->fetchAll(PDO::FETCH_COLUMN, 0);
$errorMSG = "";

// NAME
if (empty($_POST["name"])) {
    $errorMSG = "Требуется имя";
} else {
    $name = $_POST["name"];
}

// EMAIL
if (empty($_POST["tel"])) {
    $errorMSG .= "Требуется номер";
} else {
    $email = $_POST["tel"];
}

// MESSAGE
if (empty($_POST["message"])) {
    $errorMSG .= "Сообщение обязательное";
} else {
    $message = $_POST["message"];
}


$EmailTo = $goods[0];
$Subject = "Получено новое сообщение";

// prepare email body text
$Body = "";
$Body .= "Name: ";
$Body .= $name;
$Body .= "\n";
$Body .= "Email: ";
$Body .= $email;
$Body .= "\n";
$Body .= "Message: ";
$Body .= $message;
$Body .= "\n";

// send email
$success = mail($EmailTo, $Subject, $Body, "MIME-Version: 1.0\r\n"."Content-type: text/html; charset=utf-8\r\n"."From:".$email);

// redirect to success page
if ($success && $errorMSG == ""){
   echo "success";
}else{
    if($errorMSG == ""){
        echo "Что-то пошло не так:(";
    } else {
        echo $errorMSG;
    }
}

?>