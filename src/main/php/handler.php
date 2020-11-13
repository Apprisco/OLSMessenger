<!DOCTYPE html>
<html lang="en">
<head>
    <title>Verification</title>
    <style>
        body {
            padding: 20px;
        }

        h3 {
            color: green;
        }
    </style>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
</head>
<body>


<?php 

if (isset($_POST['schedule']))
{
    $schedule = $_POST['schedule'];

    for ($format = 'A'; $format <= 'H'; $format++) 
    {
        $pos = strpos($schedule, "SUMMARY:Format $format");
        $posEnd = strpos(substr($schedule, $pos, strlen($schedule) - $pos - 1), "DESCRIPTION");
        $exeterclass = substr($schedule, $pos, $posEnd) . "<br>";
        echo substr($exeterclass, 8);
    }
}

?>

</body>
</html>