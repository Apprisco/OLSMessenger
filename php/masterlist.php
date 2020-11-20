<!DOCTYPE html>
<html lang="en">
<head>
    <title>Verification</title>
    <style>
        body {
            padding: 20px;
        }

        #logo {
            display: block;
            margin-left: auto;
            margin-right: auto;
            width: 10%;
        }

        #group {
            text-align: left;
            padding: 15px;
            padding-left: 50px;
        }

        a {
            font-size: 40px;
        }

    </style>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
</head>
<body>

<img src="logo.png" alt="exeter logo" id="logo">

<h1 style="text-align: center">Exeter Messenger</h1>
<br>
<h1 style="text-align: center; color: grey">Class Master List</h1>

<?php 

// Connect to database server
$link = mysqli_connect("localhost", "root", "") or die (mysqli_error($link));

// Select database
mysqli_select_db($link, "olsmessenger") or die(mysqli_error($link));

$strSQL = "SELECT * FROM users";

// Execute the query (the recordset $rs contains the result)
$rs = mysqli_query($link, $strSQL);

$ols = array();

// Loop the recordset $rs
// Each row will be made into an array ($row) using mysql_fetch_array
while($row = mysqli_fetch_array($rs)) {
    // Write the value of the column FirstName (which is now in the array $row)

    for ($format = 'A'; $format <= 'H'; $format++) 
    {
        if (!array_key_exists($row[$format], $ols)) {
            $ols[$row[$format]] = array();
        }
    
        array_push($ols[$row[$format]], $row['name']);
    }
}

foreach ($ols as $classid => $persons) { 
    echo "<div id='group'>";
    echo "<h4>$classid</h2>"; 
    foreach ($persons as $person) {       
        echo "$person <br>";
    }
    echo "</div>";
} 

// Close the database connection
mysqli_close($link);

?>

</body>
</html>