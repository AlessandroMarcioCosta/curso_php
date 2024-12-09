<?php
$con = new mysqli ("localhost" , "root", ""."cadastro");
if ($con-> connect_error) {

    echo " Error:" $con-> connect_error;

}

$stmt = $ conn->prepare