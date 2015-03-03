<?php
require_once 'Bus.php';
require_once 'Connection.php';
require_once 'BusTableGateway.php';

$id = session_id();
if ($id == "") {
    session_start();
}

require 'ensureUserLoggedIn.php';

if (!isset($_GET) || !isset($_GET['id'])) {
    die('Invalid request');
}
$id = $_GET['id'];

$connection = Connection::getInstance();
$gateway = new BusTableGateway($connection);

$statement = $gateway->getBusById($id);
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <script type="text/javascript" src="js/bus.js"></script>
        <link rel="stylesheet" type="text/css" href="Css/style.css">
        <title></title>
    </head>
    <body>
        <?php require 'toolbar.php' ?>
        <?php 
        if (isset($message)) {
            echo '<p>'.$message.'</p>';
        }
        ?>
        <table border="1">
            <tbody>
                <?php
                $row = $statement->fetch(PDO::FETCH_ASSOC);
                    echo '<tr>';
                    echo '<td>Registration</td>'
                    . '<td>' . $row['registration'] . '</td>';
                    echo '</tr>';
                    echo '<tr>';
                    echo '<td>Make & Model</td>'
                    . '<td>' . $row['makeModel'] . '</td>';
                    echo '</tr>';
                    echo '<tr>';
                    echo '<td>Seats</td>'
                    . '<td>' . $row['seats'] . '</td>';
                    echo '</tr>';
                    echo '<tr>';
                    echo '<td>Engine</td>'
                    . '<td>' . $row['engine'] . '</td>';
                    echo '</tr>';
                    echo '<tr>';
                    echo '<td>Date Bought</td>'
                    . '<td>' . $row['dateBought'] . '</td>';
                    echo '</tr>';
                    echo '<tr>';
                    echo '<td>Next Service</td>'
                    . '<td>' . $row['nextService'] . '</td>';
                    echo '</tr>';
                ?>
            </tbody>
        </table>
        <p>
            <a href="editBusForm.php?id=<?php echo $row['id']; ?>">
                Edit Bus</a>
            <a class="deleteBus" href="deleteBus.php?id=<?php echo $row['id']; ?>">
                Delete Bus</a>
        </p>
    </body>
</html>
