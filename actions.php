<?php

    include("functions.php");

    if ($_GET['action']=='loginSignup'){
        $error = "";
        
        if ($_POST['loginActive']=="0"){

            if (!$_POST['name']){
                $error = "Your name is required";
            }
            else
            if (!$_POST['email']){
                $error = "An email address is required";
            }
            else if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
                $error = "Invalid email format";
            }
            else if (!$_POST['password']){
                $error = "Password is required";
            } 
            
            if ($error != ""){
                echo $error;
                exit();
            }
            
            else {
                
                $query = "SELECT * FROM `trainees` WHERE `email` = '".mysqli_real_escape_string($link,$_POST['email'])."' ";
                $result = mysqli_query($link,$query);
                $query1 = "SELECT * FROM `trainers` WHERE `email` = '".mysqli_real_escape_string($link,$_POST['email'])."' ";
                $result1 = mysqli_query($link,$query1);
                if (mysqli_num_rows($result)>0 || mysqli_num_rows($result1)>0 ){
                    echo "That email is already taken!";
                } else {
                    $query = " INSERT INTO `trainees`(`name`, `email`, `password`) VALUES ('".mysqli_real_escape_string($link,$_POST['name'])."','".mysqli_real_escape_string($link,$_POST['email'])."','".mysqli_real_escape_string($link,$_POST['password'])."')";
                    if (mysqli_query($link,$query)){
                        $_SESSION['id']=mysqli_insert_id($link);
                        $query = "UPDATE `trainees` SET `password` = '".password_hash((mysqli_insert_id($link)).$_POST['password'],PASSWORD_ARGON2I)."' WHERE id = ".$_SESSION['id']." LIMIT 1";
                        mysqli_query($link,$query);
                        echo "1";
                    } else echo "Could not create your account! please try later!";
                }
            }

        }
        
        else {
            $query = "SELECT * FROM `trainees` WHERE `email` = '".mysqli_real_escape_string($link,$_POST['email'])."' LIMIT 1";
            $result= mysqli_query($link,$query);
            $row = mysqli_fetch_assoc($result);
            $query1 = "SELECT * FROM `trainers` WHERE `email` = '".mysqli_real_escape_string($link,$_POST['email'])."' LIMIT 1";
            $result1= mysqli_query($link,$query1);
            $row1 = mysqli_fetch_assoc($result1);
            
            if ( (mysqli_num_rows($result) > 0 OR mysqli_num_rows($result1) > 0) AND (password_verify($row['id'].$_POST['password'], $row['password']) OR password_verify($row1['id'].$_POST['password'], $row1['password']))){
                echo "1";          
                if (mysqli_num_rows($result) > 0)                       
                    $_SESSION['id'] = $row['id'];  
                else   $_SESSION['id'] = $row1['id'];     
            }
            else echo "Email / password could not be found!";
        }
    }

    if ($_GET['action']=='trainerSignup'){
        $error = "";
        if (!$_POST['age']){
            $error = "Your age is required";
        }
        if (!$_POST['phone']){
            $error = "Your phone is required";
        }
        if ($error != ""){
            echo $error;
            exit();
        } else {
            $error = "";

            if (!$_POST['phone']){
                $error = "Your phone number is required";
            }
            if (!$_POST['age']){
                $error = "Your birthday is required";
            }
            if ($error != ""){
                echo $error;
                exit();
            }else {
                $date = date('Y-m-d', strtotime($_POST['age']));
                $query = "SELECT * FROM `trainees` WHERE id = '".mysqli_real_escape_string($link,$_SESSION['id'])."' LIMIT 1";
                $result = mysqli_query($link,$query);
                $row = mysqli_fetch_assoc($result);
                $query = "INSERT INTO `trainers` (`id`,`name`,`email`,`password`,`age`, `phone` )  VALUES ('".mysqli_real_escape_string($link,$row['id'])."','".mysqli_real_escape_string($link,$row['name'])."','".mysqli_real_escape_string($link,$row['email'])."','".mysqli_real_escape_string($link,$row['password'])."','".mysqli_real_escape_string($link,$date)."','".mysqli_real_escape_string($link,$_POST['phone'])."')";
                if ($result = mysqli_query($link,$query)){
                    $query = "DELETE FROM `trainees` WHERE `email` = '".mysqli_real_escape_string($link,$row['email'])."' LIMIT 1";
                    mysqli_query($link,$query);
                    echo "1";
                }
            }
            

        } 
        
    }

    if ($_GET['action'] == 'trainerCourse'){
        $error = "";

        if (!$_POST['subject']){
            $error = "Your subject is required.";
        }

        if (!$_POST['exp']){
            $error = "Your experiment is required.";
        }

        if (!$_POST['acheive']){
            $error = "Your acheivement is required.";
        }

        if (!$_POST['describeTrainer']){
            $error = "You need to describe about yourself.";
        }

        if (!$_POST['describeCourse']){
            $error = "You need to describe about the course.";
        }

        if (!$_POST['whatWeDo']){
            $error = "You need to explain about the course";
        }

        if (!$_POST['whereWeDo']){
            $error = "The place is required";
        }

        if (!$_POST['courseTime']){
            $error = "Course time is required";
        }

        if (!$_POST['dateStart']){
            $error = "Date start is required";
        }

        if (!$_POST['timeStart']){
            $error = "Time start is required";
        }

        if (!$_POST['timeEnd']){
            $error = "Time end is required";
        }

        

        if ($error != ""){
            echo $error;
            exit();
        } else {
            global $link;
            $date = date('Y-m-d', strtotime($_POST['dateStart']));
            $query = "INSERT INTO `course`(`idTrainer`,`acheive`, `subject`, `exp`, `describeTrainer`, `describeCourse`, `whatWeDo`, `whereWeDo`, `dateStart`, `courseTime`, `timeStart`, `timeEnd`) VALUES ('".mysqli_real_escape_string($link,$_SESSION['id'])."','".mysqli_real_escape_string($link,$_POST['acheive'])."','".mysqli_real_escape_string($link,$_POST['subject'])."','".mysqli_real_escape_string($link,$_POST['exp'])."','".mysqli_real_escape_string($link,$_POST['describeTrainer'])."','".mysqli_real_escape_string($link,$_POST['describeCourse'])."','".mysqli_real_escape_string($link,$_POST['whatWeDo'])."','".mysqli_real_escape_string($link,$_POST['whereWeDo'])."','".mysqli_real_escape_string($link,$date)."','".mysqli_real_escape_string($link,$_POST['courseTime'])."','".mysqli_real_escape_string($link,$_POST['timeStart'])."','".mysqli_real_escape_string($link,$_POST['timeEnd'])."')";
            if (mysqli_query($link,$query)){
                echo "1";
            }
            else echo "2";
        }

    } 


?>