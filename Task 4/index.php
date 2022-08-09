<?php
$servername = "localhost";

// REPLACE with your Database name
$dbname = "sensor";
// REPLACE with Database user
$username = "user";
// REPLACE with Database user password
$password = "password";

if (isset($_GET["submit"])) {
    try {
        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        $sql = "SELECT value, date FROM sensor WHERE id=(SELECT MAX(id) FROM sensor);";
        $result = $conn->query($sql);
        $result = $result->fetch_assoc();
        $value = $result["value"];
        $date = $result["date"];
        $conn->close();
    } catch (Exception $e) {
        $error = "Connection failed";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sensor Monitor</title>
    <style>
        body {
            background: linear-gradient(45deg, #247881, #00FFC6) fixed;
            text-align: center;
            color: white;
        }

        h1 {
            font-size: 85px;
        }

        #container1 {
            margin-top: 100px;
        }

        #container2 {
            margin-top: 100px;
            display: inline-block;
        }

        #container3 {
            margin-top: 120px;
        }

        table {
            border-collapse: separate;
            width: 500px;
            font-size: 20px;
        }

        td {
            border: solid 2px;
            border-radius: 10px;
        }

        th {
            border: solid 2px;
            border-radius: 10px;
        }

        tr {
            height: 50px;
        }

        .button {
            background: #247881;
            width: 200px;
            background-image: -webkit-linear-gradient(top, #247881, #00FFC6);
            background-image: -moz-linear-gradient(top, #247881, #00FFC6);
            background-image: -ms-linear-gradient(top, #247881, #00FFC6);
            background-image: -o-linear-gradient(top, #247881, #00FFC6);
            background-image: -webkit-gradient(to bottom, #247881, #00FFC6);
            -webkit-border-radius: 20px;
            -moz-border-radius: 20px;
            border-radius: 20px;
            color: #FFFFFF;
            font-family: Arial;
            font-size: 40px;
            font-weight: 100;
            padding: 20px;
            text-shadow: 1px 1px 20px #000000;
            border: solid #247881 1px;
            text-decoration: none;
            display: inline-block;
            cursor: pointer;
            text-align: center;
        }

        .button:hover {
            border: solid #00FFC6 1px;
            background: #00FFC6;
            background-image: -webkit-linear-gradient(top, #00FFC6, #247881);
            background-image: -moz-linear-gradient(top, #00FFC6, #247881);
            background-image: -ms-linear-gradient(top, #00FFC6, #247881);
            background-image: -o-linear-gradient(top, #00FFC6, #247881);
            background-image: -webkit-gradient(to bottom, #00FFC6, #247881);
            -webkit-border-radius: 20px;
            -moz-border-radius: 20px;
            border-radius: 20px;
            text-decoration: none;
        }
    </style>
</head>

<body>
    <div id="container1">
        <h1>Sensor Monitor</h1>
    </div>
    <div id="container2">
        <table>
            <tr>
                <th>Value</th>
                <th>Date/Time</th>
            </tr>
            <tr>
                <td><?= $value ?></td>
                <td><?= $date ?></td>
            </tr>
        </table>
    </div>
    <div id="container3">
        <form action="index.php" method="get">
            <button class="button" type="submit" name="submit">Get</button>
        </form>
    </div>
    <p><?= $error ?></p>

</body>

</html>