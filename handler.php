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
if (!(isset($_POST['schedule']) and isset($_POST['name']) and isset($_POST['password'])))
{
    echo "<h2>Forbidden</h2>";
}
else if (strlen($_POST['schedule']) > 0 and strlen($_POST['name']) > 0 and strlen($_POST['password']) > 0)
{
    $schedule = $_POST['schedule'];
    $peaclasses;

    for ($format = 'A'; $format <= 'H'; $format++)
    {
        $pos = strpos($schedule, "SUMMARY:Format $format");
        $posEnd = strpos(substr($schedule, $pos, strlen($schedule) - $pos - 1), "DESCRIPTION");
        $exeterclass = substr($schedule, $pos, $posEnd);
        $peaclasses[$format] = rtrim(substr($exeterclass, 8));

        if (strlen($peaclasses[$format]) == 8)
        {
            $peaclasses[$format] = "FREE-$format";
        }
        else
        {
            $peaclasses[$format] = substr($peaclasses[$format], 10);
        }
    }
    $tmp1=$_POST['email'];
    $tmp2=$_POST['name'];
    $classes="";
    $classes = $classes . "$peaclasses[A]!";
    $classes = $classes . "$peaclasses[B]!";
    $classes = $classes . "$peaclasses[C]!";
    $classes = $classes . "$peaclasses[D]!";
    $classes = $classes . "$peaclasses[E]!";
    $classes = $classes . "$peaclasses[F]!";
    $classes = $classes . "$peaclasses[G]!";
    $classes = $classes . "$peaclasses[H]";

    $data = array('key'=>$key,'name'=>$_POST['name'],'email'=>$_POST['email'],'classes'=>$classes,'password'=>$_POST['password']);
    $options = array(
        'http' => array(
            'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
            'method'  => 'POST',
            'content' => http_build_query($data)
        )
    );
    $context  = stream_context_create($options);
    $result = file_get_contents($spark."/signup", false, $context);
    if($result=="successful!"){
    echo "<img src='logo.png' alt='exeter logo' id='logo'>";
    echo "<h1 style='text-align: center'>Exeter Messenger</h1>";
    echo "<h4 style='text-align: center; color: grey'>Welcome, $tmp2. You have now joined Exeter Messenger!</h1>";
    echo "
    
    <div style='text-align:center; padding: 40px;'>
        <a href='main.html'>Join the main texting room!</a>
    </div>
    
    ";

    ini_set('session.cookie_lifetime', 60 * 60 * 24 * 7);
    ini_set('session.gc_maxlifetime', 60 * 60 * 24 * 7);
    //ini_set('session.save_path', '/sessions');
    session_start();
    $_SESSION['email'] = $tmp1; 
    $_SESSION['name'] = $tmp2;
    $_SESSION['login'] = true;}
    else{
        echo "<h2>Failed to sign up. Duplicate email.</h2>";
    }
}
else
{
    echo "<h2>Failed to sign up. Please fill in all information.</h2>";
}

?>

</body>
</html>