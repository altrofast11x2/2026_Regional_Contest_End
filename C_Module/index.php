<?php
$req =isset($_GET['url']) ? $_GET['url'] : 'index';
$cf = "./Controll/controller.php";
if (file_exists($cf)) {
    require_once $cf;
    $c = new Controll();
    if (method_exists($c, $req)) {
        $c->$req();
    }
}
