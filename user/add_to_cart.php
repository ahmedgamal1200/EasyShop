<?php

include 'config.php';

session_start();


if(isset($_SESSION['username']))
{
    $pName = $_POST['pName'];
    $pPrice = $_POST['pPrice'];
    $pQuantity = $_POST['pQuantity'];
    
    
    if(isset($_POST['addCart'])) 
    {
        if($_SESSION["cart"] === null) 
        {
            $_SESSION["cart"][] = ['pName' => $pName, 'pPrice' => $pPrice, 'pQuantity' => $pQuantity];
            //print_r($_SESSION["cart"]);
            header("location:viewCart.php");
            
        }
        
        // array_column : used to extract single column from multi-dimentional array
        $name_array = array_column($_SESSION["cart"], 'pName');
        
        if(in_array($pName, $name_array)) 
        {
            echo 
            "
            <script>
            alert('product already added in cart');
            window.location.href = 'index.php';
            </script>
            ";
        }else {
            $_SESSION["cart"][] = ['pName' => $pName, 'pPrice' => $pPrice, 'pQuantity' => $pQuantity];
            //print_r($_SESSION["cart"]);
            header("location:viewCart.php");
        }
        
    } 
        // Delete Product 
    if(isset($_POST['delete_btn']))
    {
        foreach($_SESSION["cart"] as $key => $value){
            if($value['pName'] === $_POST['item'])
            {
                unset($_SESSION["cart"][$key]);
                $_SESSION["cart"] = array_values($_SESSION["cart"]);
                header('location:viewCart.php');
            }
        }
    }
    
else{echo "afd";}
    
}else{
    header('location:form/login.php');
}

?>
