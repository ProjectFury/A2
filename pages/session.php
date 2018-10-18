<?php
    session_start();
    $url = '../index.php';    
    if ($_SESSION['login']== false) {
        redirect($url,false);
    }
    function Redirect($url, $permanent = false) {
            header('Location: ' . $url, true, $permanent ? 301 : 302);

         exit();
        }
?>
<html>
    <head>
        <title>Welcome</title>
        <meta charset="UTF-8">
    </head>
    <body>
        <div style="border: 1px solid black; width: 40%; margin: 0 auto; text-align: center;">  
        <h1>Welcome </h1>
        <?php

 if ( isset ($_COOKIE['remember'])) {
     $src = "../lib/data.json";
      $data = file_get_contents($src);
        $data = json_decode ($data, true);
        if ($data['time'] != null) {
             $time = date("d-m-Y H:i:s", $data['time']); 
             echo "Última visita: " . $time;
        }
 }
  ?>
        <div style="margin: 0 auto; text-align: center;"><a style="text-decoration: none;" href="redirect.php"><input type="button" value="Salir"></a></div>
        </div>
        <div>
            <form method="POST" action="<?= $_SERVER['PHP_SELF'] ?>">
                <input type="submit" value="Buscar">
                <input type="text" name="url" placeholder="Introduce url">
            </form>
        </div>
        <?php
            if($_SERVER["REQUEST_METHOD"] == "POST") {
                $cerca = $_POST['url'];
                if (cerca != null) {
                    echo '<div style="width: 100%; height: 500px;"><iframe style="width: 100%; height: 100%;" src="' . $cerca . '"></iframe></div>';
                }
                        
            }   
        ?>
    </body>
</html>