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

    // Connect to database server
	$link = mysqli_connect("localhost", "root", "") or die (mysqli_error($link));

	// Select database
	mysqli_select_db($link, "olsmessenger") or die(mysqli_error($link));

	// The SQL statement is built

	$strSQL = "INSERT INTO users(";

	$strSQL = $strSQL . "email, ";
	$strSQL = $strSQL . "name, ";
    $strSQL = $strSQL . "password, ";
    $strSQL = $strSQL . "A, ";
    $strSQL = $strSQL . "B, ";
    $strSQL = $strSQL . "C, ";
    $strSQL = $strSQL . "D, ";
    $strSQL = $strSQL . "E, ";
    $strSQL = $strSQL . "F, ";
    $strSQL = $strSQL . "G, ";
	$strSQL = $strSQL . "H) ";

	$strSQL = $strSQL . "VALUES(";

    $tmp1 = $_POST['email'];
    $tmp2 = $_POST['name'];
    $tmp3 = $_POST['password'];

    $strSQL = $strSQL . "'$tmp1', ";
    $strSQL = $strSQL . "'$tmp2', ";
    $strSQL = $strSQL . "'$tmp3', ";
    $strSQL = $strSQL . "'$peaclasses[A]', ";
    $strSQL = $strSQL . "'$peaclasses[B]', ";
    $strSQL = $strSQL . "'$peaclasses[C]', ";
    $strSQL = $strSQL . "'$peaclasses[D]', ";
    $strSQL = $strSQL . "'$peaclasses[E]', ";
    $strSQL = $strSQL . "'$peaclasses[F]', ";
    $strSQL = $strSQL . "'$peaclasses[G]', ";
    $strSQL = $strSQL . "'$peaclasses[H]')";

    // The SQL statement is executed 
	mysqli_query($link, $strSQL) or die (mysqli_error($link));

	// Close the database connection
    mysqli_close($link);
    
    echo "<img src='logo.png' alt='exeter logo' id='logo'>";
    echo "<h1 style='text-align: center'>Exeter Messenger</h1>";
    echo "<h4 style='text-align: center; color: grey'>Welcome, $tmp2. You have now joined Exeter Messenger!</h1>";
    echo "
    
    <div style='text-align:center; padding: 40px;'>    
        <a href='masterlist.php'>See who is in your classes</a>
    </div>
    
    ";

    ini_set('session.cookie_lifetime', 60 * 60 * 24 * 7);
    ini_set('session.gc_maxlifetime', 60 * 60 * 24 * 7);
    ini_set('session.save_path', '/home/yoursite/sessions');
    session_start();
    $_SESSION['email'] = $tmp1;
    $_SESSION['name'] = $tmp2;
}
else
{
    echo "<h2>Failed to sign up. Please fill in all information.</h2>";
}

?>

</body>
</html>