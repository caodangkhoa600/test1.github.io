<?php
    session_start();
    $link = mysqli_connect("sdb-g.hosting.stackcp.net","SWEATUP-3138359367",'37iz8lepj9',"SWEATUP-3138359367");
    if (mysqli_connect_errno()){
        print_r(mysqli_connect_error());
        exit();
    }

    if ($_GET['function']=='logout'){
        session_unset();
    }

    function isTrainer(){
        if ($_SESSION['id']>0){
            global $link;
            $query = "SELECT * FROM `trainees` WHERE `id` = ".mysqli_real_escape_string($link,$_SESSION['id']);
            $result = mysqli_query($link,$query);
            if (mysqli_num_rows($result)>0){
                return "1";
            }
            else return "2";
        } else return "3";
        
    }

    function displayWelcome(){
        $clause="";
        if ($_SESSION['id']>0){
            if (isTrainer()==1) $clause = '`trainees`';
            else $clause='`trainers`';
            global $link;
            $query = "SELECT * FROM $clause WHERE `id` = ".mysqli_real_escape_string($link,$_SESSION['id']);
            $result = mysqli_query($link,$query);
            $row = mysqli_fetch_assoc($result);
            if ($clause == '`trainees`')
            echo "Welcome our member ".$row['name']." to be here";
            else echo "Welcome our trainer ".$row['name']." to be here";
        } 
        else echo "Welcome to SWEAT UP";
    }

    function displayCourse($type){
        global $link;
        $whereClause = "WHERE `isAccepted` = '1'";
        if ($type == "pubilc") $whereClause .= "";
        else if ($type == 'search'){
            echo "<p> Showing the result for '".mysqli_real_escape_string($link,$_GET['q'])."':</p>";
            $whereClause .= " AND `subject` LIKE '%".mysqli_real_escape_string($link,$_GET['q'])."%'";
        }
        $query = "SELECT * FROM `course` ".$whereClause." ORDER BY `dateStart` DESC LIMIT 10";
        $result = mysqli_query($link,$query);
        if (mysqli_num_rows($result)==0){
            echo "There are no class to display";
        } else {
            while ($row = mysqli_fetch_assoc($result)){
                $userquery = "SELECT * FROM `trainers` WHERE id = ".mysqli_real_escape_string($link,$row['idTrainer'])." LIMIT 1"; 
                $userQueryResult = mysqli_query($link,$userquery);
                $user = mysqli_fetch_assoc($userQueryResult);
                $date = date('d-m-Y', strtotime($row['dateStart']));
                
                echo "<div class = 'course container'>"; 
                echo "<div class = 'row justify-content-md-center'>
                        <div class = 'col'><h2>".mysqli_real_escape_string($link,$row['subject'])."</h2>
                            <h4>Ng?????i h?????ng d???n: ".mysqli_real_escape_string($link,$user['name'])."</h4>
                            <p> V??? bu???i h???c: ".mysqli_real_escape_string($link,$row['describeCourse'])."</p>
                            <p> V??? gi???ng vi??n: ".mysqli_real_escape_string($link,$row['describeTrainer'])."</p>
                            <p> Ng??y b???t ?????u: ".mysqli_real_escape_string($link,$date)."</p>
                        </div>
                        
                        

                            <div class = 'col col-lg-2' > 
                                <a href = '?page=courseInformation&courseId=".$row['id']."'><button class='btn btn-secondary courseRes' type = 'button' > ????ng k?? </button> </a>
                            </div>
                        </div>";
                
                echo "</div>";
            }

        }
    }

    function displayCourseInformation($type){
        global $link;
        
        $query = "SELECT * FROM `course` WHERE `id` =".$type;
        $result = mysqli_query($link,$query);
        $row = mysqli_fetch_assoc($result);



        $queryTrainer = "SELECT * FROM `trainers` WHERE `id` =".$row['idTrainer'];
        $resultTrainer = mysqli_query($link,$queryTrainer);
        
        $rowTrainer = mysqli_fetch_assoc($resultTrainer);
        $date = date('d-m-Y', strtotime($row['dateStart']));
        echo "<h2>Kh??a hu???n luy???n: ".$row['subject']."</h2>";
        echo "<h3>Ng?????i h?????ng d???n: ".$rowTrainer['name']."</h3>";
        echo "<div class='row'>";
            echo "<div class='col'>";
                echo "<textarea disabled>V??? hu???n luy???n vi??n: ".$row['describeTrainer']."</textarea>";
            
                echo "<br>";

                echo "<textarea disabled>Th??nh t???u luy???n vi??n: ".$row['acheive']."</textarea>";
                echo "<br>";
                echo "<textarea disabled>Kinh nghi???m gi???ng d???y: ".$row['exp']."</textarea>";
                echo "<br>";
                echo "<textarea disabled>Mi??u ta v??? bu???i hu???n luy???n: ".$row['describeCourse']."</textarea>";
                echo "<br>";
                echo "<textarea disabled>Ch??ng ta s??? h???c g??? ".$row['whatWeDo']."</textarea>";
                echo "<br>";
            echo "</div>";      
            echo "<div class='col'> ";
                echo "<p>Ng??y b???t ?????u: ".$date."</p>";
                echo "<p>?????a ??i???m: ".$row['whereWeDo']."</p>";
                echo "<p>Gi??? b???t ?????u: ".$row['timeStart']." - Gi??? k???t th??c: ".$row['timeEnd']."</p>";
                echo "<a href = ''>test</a>";
            echo "</div>"; 
        echo "</div>";


        

    }
?>