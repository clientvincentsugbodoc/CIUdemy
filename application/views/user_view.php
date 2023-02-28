<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title> User View </title>
    </head>
    <body>
        <?php
            foreach($results as $object)
            {
                echo $object->username;
            }
        ?>
    </body>
</html>