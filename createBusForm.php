<?php
require 'ensureUserLoggedIn.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <script type="text/javascript" src="js/createBus.js"></script>
        <link rel="stylesheet" type="text/css" href="Css/style.css">
    
    </head>
    <body>
        
        <?php require 'toolbar.php'; ?>
        <h1><i> Enter your personal Details</i></h1>
        
       
        
        <form id="createBusForm" action="createBus.php" method="POST">
            <table id="t"
                   border="1">
                <tbody>
                    <tr>

                        <th> Registration</th>
                        <td>
                            <input type="text" name="registration" value="<?php
                            if (isset($_POST) && isset($_POST['registration'])) {
                                echo $_POST['registration'];
                            }
                            ?>"/>
                            <span id="registrationError" class="error">
                                <?php
                                if (isset($errorMessage) && isset($errorMessage['registration'])) {
                                    echo $errorMessage['registration'];
                                }
                                ?>  

                            </span>

                        </td>
                    </tr>
                <td> Make & Model</td>
                <td>
                    <input type="text" name="makeModel" value="<?php
                    if (isset($_POST) && isset($_POST['makeModel'])) {
                        echo $_POST['makeModel'];
                    }
                    ?>"/>
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
                            }
                            ?>"/>
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
                        }
                        ?>"/>
                        <!-- span is also like a div-->
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
                        }
                        ?>"/>
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
                        }
                        ?>"/>
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
                        <td></td>
                        <td>
                            <input type="submit" value="Create Bus" name="createBus" />
                        </td>
                    </tr>
                </tbody>
            </table>

        </form>
    </body>
</html>