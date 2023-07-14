<?php
$requested_url = $_SERVER["REQUEST_URI"];
echo $requested_url;
switch ($requested_url) {
    case '/WebJournal/':
        header("location: ./mainpage/index.php");
        break;
    default:
        # code...
        break;
}