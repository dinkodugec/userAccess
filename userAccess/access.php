<?php

function access ($rank, $redirect = true)
{

   if(isset($_SESSION['ACCESS']) && !$_SESSION["ACCESS"][$rank]){
          
          if($redirect){
               
            header("Location: denied.php");
            die();
 
          }
         return false;
       
    }
       return true;
}



/*  $admin =  isset($_SESSION['myrank']) &&  trim($_SESSION['myrank']) == "admin" ;
 define("ADMIN", $admin); //making this variable constants so they can be acces everywhere, in function outside function


 $user =  isset($_SESSION['myrank']) &&  trim($_SESSION['myrank']) == "user" ;
 define("USER", $user);
 
 $recepcionist  =  isset($_SESSION['myrank']) &&  trim($_SESSION['myrank']) == "recepcionist" ;
 define("RECEPCIONIST", $recepcionist); */

  // or making this better
/* 
  define("ADMIN",  isset($_SESSION['myrank']) &&  trim($_SESSION['myrank']) == "admin" );
  define("USER",  isset($_SESSION['myrank']) &&  trim($_SESSION['myrank']) == "user" );
  define("RECEPCIONIST",  isset($_SESSION['myrank']) &&  trim($_SESSION['myrank']) == "recepcionist" ); */

  // BUT THE BEST WAY
$_SESSION["ACCESS"]["ADMIN"] = isset($_SESSION['myrank']) &&  trim($_SESSION['myrank']) == "admin";
$_SESSION["ACCESS"]["USER"] = isset($_SESSION['myrank']) &&  (trim($_SESSION['myrank']) == "user" || trim($_SESSION['myrank']) == "admin" || trim($_SESSION['myrank']) == "recepcionist" );
$_SESSION["ACCESS"]["RECEPCIONIST"] = isset($_SESSION['myrank']) &&  (trim($_SESSION['myrank']) == "recepcionist" || trim($_SESSION['myrank']) == "admin");
$_SESSION["ACCESS"]["ACCOUNTANT"] = isset($_SESSION['myrank']) &&  (trim($_SESSION['myrank']) == "accountant" || trim($_SESSION['myrank']) == "admin");




/* var_dump($_SESSION["ACCESS"]);  *///assoc array of ACCESS like key and boolan like value 
  




 /*  var_dump($_SESSION['myrank']); */
?>