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
if ($statement->rowCount() !== 1) {
    die("Illegal request");
}
$row = $statement->fetch(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <script type="text/javascript" src="js/bus.js"></script>
        <link rel="stylesheet" type="text/css" href="Css/style.css">
    </head>
    <body>
        <?php require 'toolbar.php' ?>
        <h1>Edit Bus Form</h1>
        <?php
        if (isset($errorMessage)) {
            echo '<p>Error: ' . $errorMessage . '</p>';
        }
        ?>
        <form id="editBusForm" name="editBusForm" action="editBus.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $id; ?>" />
            <table border="1">
                <tbody>
                    <tr>
                        <td>Registration</td>
                        <td>
                            <input type="text" name="registration" value="<?php
                            if (isset($_POST) && isset($_POST['registration'])) {
                                echo $_POST['registration'];
                            } else
                                echo $row['registration'];
                            ?>" />
                            <span id="registrationError" class="error">
                                <?php
                                if (isset($errorMessage) && isset($errorMessage['registration'])) {
                                    echo $errorMessage['registration'];
                                }
                                ?>
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <td>Make & Model</td>
                        <td>
                            <input type="text" name="makeModel" value="<?php
                            if (isset($_POST) && isset($_POST['makeModel'])) {
                                echo $_POST['makeModel'];
                            } else
                                echo $row['makeModel'];
                            ?>" />
                            <span id="makeModelError" class="error">
                                <?php
                                if (isset($errorMessage) && isset($errorMessage['makeModel'])) {
                                    echo $errorMessage['makeModel'];
                                }
                                ?>
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <td>Seats</td>
                        <td>
                            <input type="text" name="seats" value="<?php
                            if (isset($_POST) && isset($_POST['seats'])) {
                                echo $_POST['seats'];
                            } else
                                echo $row['seats'];
                            ?>" />
                            <span id="seatsError" class="error">
                                <?php
                                if (isset($errorMessage) && isset($errorMessage['seats'])) {
                                    echo $errorMessage['seats'];
                                }
                                ?>
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <td>Engine</td>
                        <td>
                            <input type="text" name="engine" value="<?php
                            if (isset($_POST) && isset($_POST['engine'])) {
                                echo $_POST['engine'];
                            } else
                                echo $row['engine'];
                            ?>" />
                            <span id="engineError" class="error">
                                <?php
                                if (isset($errorMessage) && isset($errorMessage['engine'])) {
                                    echo $errorMessage['engine'];
                                }
                                ?>
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <td>Date Bought</td>
                        <td>
                            <input type="text" name="dateBought" value="<?php
                            if (isset($_POST) && isset($_POST['dateBought'])) {
                                echo $_POST['dateBought'];
                            } else
                                echo $row['dateBought'];
                            ?>" />
                            <span id="dateBoughtError" class="error">
                                <?php
                                if (isset($errorMessage) && isset($errorMessage['dateBought'])) {
                                    echo $errorMessage['dateBought'];
                                }
                                ?>
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <td>Next Service</td>
                        <td>
                            <input type="text" name="nextService" value="<?php
                            if (isset($_POST) && isset($_POST['nextService'])) {
                                echo $_POST['nextService'];
                            } else
                                echo $row['nextService'];
                            ?>" />
                            <span id="nextServiceError" class="error">
                                <?php
                                if (isset($errorMessage) && isset($errorMessage['nextService'])) {
                                    echo $errorMessage['nextService'];
                                }
                                ?>
                            </span>
                        </td>
                    </tr>
                    <tr>

                        <td>
                            <input type="submit" value="Update Bus" name="updateBus" />
                        </td>
                    </tr>
                </tbody>
            </table>

        </form>
    </body>
</html>
