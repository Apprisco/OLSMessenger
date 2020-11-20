<!DOCTYPE html>
<html lang="en">
<head>
    <title>Verification</title>
    <style>
        body {
            padding: 20px;
        }

        h2 {
            text-align: center;
        }

        #logo {
            display: block;
            margin-left: auto;
            margin-right: auto;
            width: 10%;
        }

        a {
            font-size: 40px;
        }

    </style>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
</head>
<body>


<?php 
include "variables.php";
if (!(isset($_POST['email']) and isset($_POST['password'])))
{
    echo "<h2>Forbidden</h2>";
}
else if (strlen($_POST['email']) > 0 and strlen($_POST['password']) > 0 )
{
    $email = $_POST['email'];
    $password=$_POST['password'];
    $data = array('key'=>$key,'email'=>$_POST['email'],'password'=>$_POST['password']);
    $options = array(
        'http' => array(
            'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
            'method'  => 'POST',
            'content' => http_build_query($data)
        )
    );
    $context  = stream_context_create($options);
    $result = file_get_contents($spark."/login", false, $context);
    if($result!="fail!"){
    echo "<img src='logo.png' alt='exeter logo' id='logo'>";
    echo "<h1 style='text-align: center'>Exeter Messenger</h1>";
    echo "<h4 style='text-align: center; color: grey'>Welcome, $tmp2. You have now logged in!</h1>";
    echo "
    
    <div style='text-align:center; padding: 40px;'>    
        <a href='main.html'>Join the main texting room!</a>
    </div>
    
    ";

    ini_set('session.cookie_lifetime', 60 * 60 * 24 * 7);
    ini_set('session.gc_maxlifetime', 60 * 60 * 24 * 7);
    //ini_set('session.save_path', '/sessions');
    session_start();
    $tmp1=$_POST['email'];
    $tmp2=$result;
    $_SESSION['email'] = $tmp1; 
    $_SESSION['name'] = $tmp2;
    $_SESSION['login'] = true;
    header('Location: /main.php');
}
    else{
        echo "<h2>Failed to log in. Incorrect email or password.</h2>";
    }
}
else
{
    echo "<h2>Failed to log in. Please fill in all information.</h2>";
}

?>

</body>
</html>