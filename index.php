<?php
    session_start();
    $url = 'pages/login.php';
    if (!isset ($_COOKIE['remember'])) {
        redirect($url,false);
    }
    if ($_SESSION['login'] == true) {
        $url = 'pages/session.php';
        Redirect($url, false);
    }
    
    function Redirect($url, $permanent = false) {
            header('Location: ' . $url, true, $permanent ? 301 : 302);

         exit();
        }
?>
<html>
    <head>
        <title>Bienvenido</title>
        <meta charset="UTF-8">
    </head>
    <body>
        <div style="border: 1px solid black; width: 40%; margin: 0 auto; text-align: center;">  
            <h1>Te damos la bienvenida</h1>
            <h2>¿Qué quieres hacer?</h2>
            <div style="width: 40%; margin: 0 auto;"><a style="text-decoration: none;" href="pages/cookieredirect.php"><input type="button" value="Ya estoy identificado, acceder a la zona privada"></a></div><br>
            <div style="width: 40%; margin: 0 auto;"><a style="text-decoration: none;" href="pages/redirect.php"><input type="button" value="Identificarme para acceder a la zona privada"></a></div>
        </div>  