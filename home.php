<!DOCTYPE html>
<?php
require_once 'Bus.php';
require_once 'Connection.php';
require_once 'BusTableGateway.php';
require 'ensureUserLoggedIn.php';

$connection = Connection::getInstance();
$gateway = new BusTableGateway($connection);

$statement = $gateway->getBus();
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
        <?php require 'toolbar.php'; ?>
        <h1> List of Bus'</h1>
        <?php
        if (isset($message)) {
            echo '<p>' . $message . '</p>';
        }
        ?>

        <table border="1">
            <thead>
                <tr>
                    <!-- the different headers inside a table-->
                    <th>Registration</th>
                    <th>Make & Model</th>
                    <th>Seats</th>
                    <th>Engine</th>
                    <th>Date Bought</th>
                    <th>Next Service</th>
                    <th> Options</th>

                </tr>
            </thead>
            <tbody>
            <?php
            $row = $statement->fetch(PDO::FETCH_ASSOC);
            while ($row) {


                echo '<td>' . $row['registration'] . '</td>';
                echo '<td>' . $row['makeModel'] . '</td>';
                echo '<td>' . $row['seats'] . '</td>';
                echo '<td>' . $row['engine'] . '</td>';
                echo '<td>' . $row['dateBought'] . '</td>';
                echo '<td>' . $row['nextService'] . '</td>';

                // this is to see the view/delete links in my home page with the list of bus'
                echo '<td>'
                . '<a href="viewBus.php?id=' . $row['id'] . '">View</a> '
                . '<a href="editBusForm.php?id=' . $row['id'] . '">Edit</a> '
                . '<a class="deleteBus" href="deleteBus.php?id=' . $row['id'] . '">Delete</a> '
                . '</td>';
                echo '</tr>';

                $row = $statement->fetch(PDO::FETCH_ASSOC);
            }
            ?>
            </tbody>
        </table>

        <p><a href="createBusForm.php">Create Bus</a></p>
    </body>
</html>