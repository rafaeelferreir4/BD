<?php
    function conectaBD () {
        $bd = "pgsql: host=localhost, dbname=conectphp; port=5432";
        $user = "postgres";
        $password = "postgres";
        $con = new PDO ($bd, $user, $password);
        if (!$con) {
            echo "erro";
        }
        return $con;
    }
?>