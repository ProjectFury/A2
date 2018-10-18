<?php
    session_start();
    $url = '../index.php';
    $urlf = 'session.php';
    if ($_SESSION['login']== false && isset($_COOKIE['remember'])) {
        redirect($url,false);
    }
    
    if ($_SESSION['login']== true) {
        redirectf($urlf,false);
    }
    function Redirect($url, $permanent = false) {
            header('Location: ' . $url, true, $permanent ? 301 : 302);

         exit();
        }
        function Redirectf($urlf, $permanent = false) {
            header('Location: ' . $urlf, true, $permanent ? 301 : 302);

         exit();
        }
        
?>
<html>
    <head>
        <title>Login</title>
        <meta charset="UTF-8">
    </head>
    <body>
        <div style="border: 1px solid black; width: 40%; margin: 0 auto; text-align: center;">  
        <h1>Login</h1>
<form method="POST" action="<?= $_SERVER['PHP_SELF'] ?>">
    <div>
        <input required placeholder="Login" type="text" name="loginf">
    </div>
    <div>
        <input required placeholder="Contraseña" type="password" name="passf">
    </div>
    <div>
        <input type="checkbox" name="remember" value="yes">Recordarme
    </div>
    <div>
        <input type="submit" value="ENVIAR">
    </div>
        </div>
    
        
</form>
<?php
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        ini_set('display_errors', 1);
        $src = "../lib/data.json";
        $data = file_get_contents($src);
        $data = json_decode ($data, true);
        $loginf = $_POST['loginf'];
        $passf = $_POST['passf'];
        var_dump ($data);
        if($loginf == $data['login'] && $passf == $data['pass']) {
            $_SESSION['login']= true;
            $_SESSION['user']= $data['name'];
             
            if (isset($_POST['remember'])) {
                $cookie_name = "remember";
                $cookie_value = $loginf . ";" . $passf;
                $data['time'] = time();
                file_put_contents($src, json_encode($data));
                setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");
            } else {
                $data['time'] = null;
                file_put_contents($src, json_encode($data));
            }
            Redirectf($urlf,false);
        } else {
            echo 'Usuario o contraseña incorrectos.';
        }
    }
    ?>
    </body>
</html>
