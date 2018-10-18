<?php

session_start();
session_destroy();
    $url = 'login.php';
    
    $src = "../lib/data.json";
    $data = file_get_contents($src);
    $data = json_decode ($data, true);
    $loginf = $data['login'];
    $passf = $data['pass'];
    $cookie_name = "remember";
    $cookie_value = $loginf . ";" . $passf;
    setcookie($cookie_name, $cookie_value, time() -315360000, "/");
       
    
    function Redirect($url, $permanent = false) {
        header('Location: ' . $url, true, $permanent ? 301 : 302);

        exit();
    } 
        redirect($url,false);
?>

