<?php

    include("functions.php");
    $query = "SELECT * FROM `course` WHERE `isAccepted` = '0' ";
    if ($result = mysqli_query($link,$query)){
        echo "Ok";
    } else mysqli_connect_error();
    $row = mysqli_fetch_assoc($result);
    print_r($row);

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>
    <h1>Hello, world!</h1>

            <div class = 'container' style = "margin-top:10px"> 

            <div class="mb-3">
                <label for="subject" class="form-label">Môn bạn đăng ký dạy</label>
                <input type="text" class="form-control" id="subject" aria-describedby="emailHelp">
                
            </div>

            <div class="mb-3">
                <label for="exp" class="form-label">Kinh nghiệm</label>
                <input type="text" class="form-control" id="exp" aria-describedby="emailHelp">
                
            </div>

            <div class="mb-3">
                <label for="acheive" class="form-label">Thành tựu</label>
                <input type="text" class="form-control" id="acheive" aria-describedby="emailHelp">
            </div>

            <div class="mb-3">
                <label for="describeTrainer" class="form-label">Mô tả về bản thân bạn</label>
                <input type="text" class="form-control" id="describeTrainer" aria-describedby="emailHelp">
            </div>

            <div class="mb-3">
                <label for="describeCourse" class="form-label">Mô tả về buổi học</label>
                <input type="text" class="form-control" id="describeCourse" aria-describedby="emailHelp">
            </div>

            <div class="mb-3">
                <label for="whatWeDo" class="form-label">Chúng ta sẽ làm gì ?</label>
                <input type="text" class="form-control" id="whatWeDo" aria-describedby="emailHelp">
            </div>

            <div class="mb-3">
                <label for="whereWeDo" class="form-label">Ở đâu ?</label>
                <input type="text" class="form-control" id="whereWeDo" aria-describedby="emailHelp">
            </div>

            

            <div class="mb-3 row g-4">

                <div class="col">
                    <label for="courseTime" class="form-label">Thời lượng khóa học</label>
                    <input type="text" class="form-control" id="courseTime" aria-describedby="emailHelp">
                </div>

                <div class = "col">
                    <label for="dateStart" class="form-label">Ngày bắt đầu</label>
                    <input type="date" class="form-control" id="dateStart" aria-describedby="emailHelp">
                </div>


                <div class = "col">
                    <label for="timeStart" class="form-label">Từ:</label>
                    <input type="time" class="form-control" id="timeStart" name="timeStart">
                </div>

                <div class = "col">
                    <label for="timeEnd" class="form-label">Cho đến:</label>
                    <input type="time" class="form-control" id="timeEnd" name="timeEnd">
                </div>
                
                
            </div>
            <button type="submit" class="btn btn-primary" id = "submitCourse">Submit</button>
        </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>

    
  </body>
</html>