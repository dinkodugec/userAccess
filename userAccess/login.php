<?php
include "access.php";

     session_start();
 
   $error = "";

   function create_userid()
   {

      $length = rand(4,20);
      $number = "";
      for($i=0; $i < $length; $i++){
        $new_rand = rand(0,9);

        $number = $number . $new_rand;
      }

      return $number;
   }
  
   if($_SERVER['REQUEST_METHOD'] == "POST")
   {
   
 

        if(!$DB = new PDO("mysql:host=localhost;dbname=ranks","root",""))
        {
          die('die');
        }

      $arr['userid'] = create_userid();

      $condition = true;

   
     
       //save to database

       $arr['email'] = $_POST['email'];
       $arr['password'] = hash('sha1', $_POST['password']);

       $query = "select * from users where email = :email && password = :password limit 1;
                 (:email, :password)";
       $stmt = $DB->prepare($query);
      
       if($stmt)
          {
                $check = $stmt->execute($arr);
         
                if($check){
                $data =$stmt->fetchAll(PDO::FETCH_ASSOC);
                  
                    if(is_array($data) && count($data) > 0){
                      $_SESSION['myid'] = $data[0]['userid'];
                      $_SESSION['myname'] = $data[0]['name'];
                      $_SESSION['myrank'] = $data[0]['rank'];
                     /*  print_r($data);
                      die(); */
                    
                  }else{
                    $error = "wrong username or password";
                  }
                }
             
                if($error == ""){

                     header("Location: index.php");
                     die();
                }
          }
  
  
      }

?>



<?php  include "header.php"; ?>

<style type="text/css">
.input {
  border-radius: 5px;
  border: solid thin #aaa;
  padding: 10px;
  margin: 4px;
}

.button {
  border-radius: 5px;
  border: solid thin #aaa;
  padding: 10px;
  margin: 4px;
  cursor: pointer;
}
</style>


<h1>Log in</h1>

<?php
    if($error != ""){
      echo $error;
    }
?>

<form action="" method="post">

  <input class="input" type="email" name="email" placeholder="email" required><br>
  <input class="input" type="password" name="password" placeholder="password" required><br>
  <br>
  <input class="button" type="submit" value="login"><br>
</form>

<?php  include "footer.php"; ?>