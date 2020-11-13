<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OLS Integration</title>
    <style>
        body {
            padding-left: 20px;
        }

        #logo {
            display: block;
            margin-left: auto;
            margin-right: auto;
            width: 10%;
        }
    </style>
</head>
<body>
    <img src="logo.png" alt="exeter logo" id="logo">

    <h1 style="text-align: center">OLS Integration</h1>
    
    <form action="handler.php" method="post">
        <p>
        <div class="form-group">
            <label for="schedule">Please paste your exported OLS schedule here</label>
            <input type="text" class="form-control" id="user" name="schedule">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
        </p>
    </form>

    <br><br><br>

    <h3>How do I submit my exported OLS schedule?</h3>
    <ol>
        <li>Go to OLS</li>
        <li>In the top left corner, click the hamburger and then click 'Export'.</li>
        <li>Select 'All Formats'.</li>
        <li>Scroll and click 'Export'.</li>
        <li>Open the '.ics' file in a text editor like Notepad.</li>
        <li>Copy, paste and submit.</li>
    </ol>
</body>
</html>