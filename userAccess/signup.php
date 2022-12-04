<?php

include "access.php";
 
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

      while( $condition){
          $query = "select id from users where userid = :userid limit 1";
          $stmt = $DB->prepare($query);
         
          if($stmt){
          $check = $stmt->execute($arr);
         
            if($check){
            $data =$stmt->fetchAll(PDO::FETCH_ASSOC);
              
                if(is_array($data) && count($data) > 0){
                  $arr['userid'] = create_userid();
                  continue;
              }
            }
          }
          $condition = false;
       
      }

   
     
       //save to database

       $arr['name'] = $_POST['name'];
       $arr['email'] = $_POST['email'];
       $arr['password'] = hash('sha1', $_POST['password']);
       $arr['rank']= "user";
       $arr['userid']= create_userid();

       $query = "insert into users (userid,name,email,password,rank) values 
                 (:userid, :name, :email, :password, :rank)";
       $stmt = $DB->prepare($query);
      
       if($stmt)
          {
                $check = $stmt->execute($arr);
                if(!$check){
                  $error = "could not save to DB";
                }
                if($error == ""){
                     header("Location: login.php");
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


<h1>Signup</h1>

<?php
    if($error != ""){
      echo $error;
    }
?>

<form action="" method="post">
  <input class="input" type="text" name="name" placeholder="name" required><br>
  <input class="input" type="email" name="email" placeholder="email" required><br>
  <input class="input" type="password" name="password" placeholder="password" required><br>
  <br>
  <input class="button" type="submit" value="signup"><br>
</form>

<?php  include "footer.php"; ?>