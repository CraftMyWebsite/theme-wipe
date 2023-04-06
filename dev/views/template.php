<?php

include_once("includes/head.inc.php");
include_once("includes/header.inc.php");


?>

<!-- En prod (Appeler le content ici)-->
<?php
include_once("forum/forum.view.php");
?>


<?php
//En prod : View::loadInclude($includes, "afterScript");
include_once("includes/footer.inc.php");
?>
