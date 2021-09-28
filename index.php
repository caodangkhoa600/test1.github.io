







<?php 

    include("functions.php");

    include("views/header.php");



    if ($_GET['page']=='search')
        include("views/search.php");
    else
    if ($_GET['page']=='courseInformation')
        include("views/courseInformation.php");
    else
    if ($_GET['page']=='becomeTrainer')
        include("views/becomeTrainerForm.php");
    else
    if ($_GET['page']=='creCourse'){
        
        include("views/creCourse.php");
    }
    else
    include("views/home.php");

    include("views/footer.php");



?>