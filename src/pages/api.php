<!DOCTYPE html>
<html>
    <head></head>
    <body>

    <?php
        include 'custom-lib.php';
        $jeson = file_get_contents("php://input");
        api($jeson);
    ?>

    </body>
</html>

