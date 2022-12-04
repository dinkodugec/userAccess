<?php  
session_start();

include "access.php";
include "header.php";

access('ADMIN');

?>


<h1>This is admin page</h1>



<?php  include "footer.php"; ?>