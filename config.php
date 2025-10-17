<?php
$conf["Username"]= 'root';
$conf["Password"]= '';
$conf["Host"]= 'localhost';
$conf["Database"]= 'jsrecipesearcheraccounts';

$conn = mysqli_connect($conf["Host"], $conf["Username"],
$conf["Password"], $conf["Database"]);

if($conn == false)
{
    echo "Can't connect to database!";  
}

?>