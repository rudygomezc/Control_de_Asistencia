<html>
    <head>
        <script type="text/javascript" src="<?php URL_APP;?>../js/control.js"></script>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
    <link rel="shortcut icon" href="<?php URL_APP;?>../images/favicon.ico"/> 
    <link href="<?php URL_APP;?>../css/style.css" rel="stylesheet">

    <link href="<?php URL_APP;?>../bootstrap/css/bootstrap.css" rel="stylesheet">
    <link href="<?php URL_APP;?>../bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php URL_APP;?>../bootstrap/css/bootstrap-theme.css" rel="stylesheet">
    <link href="<?php URL_APP;?>../bootstrap/css/bootstrap-theme.min.css" rel="stylesheet">

    <script type="text/javascript" src="<?php URL_APP;?>../js/jquery.js"></script>
    <script type="text/javascript" src="<?php URL_APP;?>../js/infoger.js"></script>
    <script src="<?php URL_APP;?>../bootstrap/js/bootstrap.min.js"></script>
    <script src="<?php URL_APP;?>../bootstrap/js/bootstrap.js"></script>
        
    </head>


<?php
require __DIR__.'/../bootstrap/autoload.php';
$app = require_once __DIR__.'/../bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);

$response = $kernel->handle(
    $request = Illuminate\Http\Request::capture()
);

$response->send();

$kernel->terminate($request, $response);
