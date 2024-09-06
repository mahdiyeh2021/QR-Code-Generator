<?php

include_once 'C:/xampp/htdocs/practiceweb/wp-content/plugins/grcodeplugin/phpqrcode/phpqrcode.php';


if (isset($_GET['url'])) {
    $url = urldecode($_GET['url']);


    QRcode::png($url);
}
?>
