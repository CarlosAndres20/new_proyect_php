<?php
$connection= mysqli_connect(
        'localhost',
        'root',
        '',
        'happy'
        );

    if($connection)
    {
    echo('Database connnection Success <br>');
    }
    else{
    echo('Compilation error');
    }
    
?>