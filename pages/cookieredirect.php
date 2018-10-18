<?php

session_start();
 $url = 'session.php';
 function Redirect($url, $permanent = false) {
            header('Location: ' . $url, true, $permanent ? 301 : 302);

         exit();
        }
         $_SESSION['login']= true;
            $_SESSION['user']= $data['name'];
            
            Redirect($url, false);
