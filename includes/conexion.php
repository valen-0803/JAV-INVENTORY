<?php
function conectar(){
    $host="biffwcpwx1loqh2qgkwv-mysql.services.clever-cloud.com";
    $user="uposndip7ezkbg6e";
    $pass="QyQt6YvIWNulElPvw8U9";

    $bd="biffwcpwx1loqh2qgkwv";

    $con=mysqli_connect($host,$user,$pass);

    mysqli_select_db($con,$bd);

    return $con;
}
?>