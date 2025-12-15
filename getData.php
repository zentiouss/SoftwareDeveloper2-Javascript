<?php



$conf["Username"]= 'root';


$conf["Password"]= '';


$conf["Host"]= 'localhost';


$conf["Database"]= 'classicmodels';





$con = mysqli_connect($conf["Host"], $conf["Username"],


$conf["Password"], $conf["Database"]);





if($con == false)


{


    echo "Kan geen verbinding maken met de database";  


}





$input = $_POST['input'];


$limit = $_POST['limit'];








$sql = "SELECT productName, productLine, productScale, productVendor, productDescription 


        FROM products 


        WHERE productName LIKE '%$input%' 


        LIMIT $limit";





$result = mysqli_query($con,$sql);


$data = mysqli_fetch_all($result, MYSQLI_ASSOC);








echo json_encode($data);





?>