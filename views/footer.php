        
        
        
        



        <!-- Button trigger modal -->


        <!-- Modal -->

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                
                <div class="modal-header">
                    <h5 class="modal-title" id="loginModalLabel">Sign up</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                    <div class="modal-body">
                                <div  class="alert alert-danger" role="alert" id = "error"></div>
                                <input type="hidden" id = "loginActive" name = "loginActive" value="0">
                                <div class="form-floating mb-3" id = nameForm>
                                    <input type="text" class="form-control" id="name" name = "name" placeholder="User Name">
                                    <label for="name" >Name</label>
                                </div>

                                

                                <div class="form-floating mb-3"  id ="emailForm">
                                    <input type="email" class="form-control" id="email" name = "email" placeholder="name@example.com">
                                    <label for="email">Email address</label>
                                </div>

                                <div class="form-floating mb-3"  id ="passwordForm">
                                    <input type="password" class="form-control" id="password" name="password"  placeholder="Password">
                                    <label for="password">Password</label>
                                </div>

        
                                
                                <button class="w-100 btn btn-lg btn-primary mb-3" id = "loginSignupButton" type="submit">Sign in</button>
                        
                    </div>

                <div class="modal-footer">
                             <a id = "toggleLogin" >
                                <span>Wanna log in?</span>
                            </a>
                </div>

            </div>
        </div>
    </div>
   
        

  



        <footer class="footer mt-auto py-3 bg-light">
            <div class="container">
                <span class="text-muted">&copy;SWEAT UP 2021.</span>
            </div>
        </footer>       
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
    
        <script>


            $("#toggleLogin").click(function(){
                if ($("#loginActive").val()=="0"){

                    $("#loginActive").val("1");
                    $("#nameForm").hide();
                    $("#toggleLogin").html("Create a new account!");
                    $("#loginModalLabel").html("Log in");
                    $("#loginSignupButton").html("Log in");

                }
                else {

                    $("#loginActive").val("0");
                    $("#nameForm").show();
                    $("#toggleLogin").html("Wanna log in?");
                    $("#loginModalLabel").html("Sign up");
                    $("#loginSignupButton").html("Sign up");

                }
            })
            

            $("#loginSignupButton").click(function(){
                $.ajax({
                    type: "POST",
                    url: "actions.php?action=loginSignup",
                    data: "name=" + $("#name").val() +
                          "&email=" + $("#email").val() +
                          "&password=" + $("#password").val() +
                          "&loginActive=" + $("#loginActive").val(),
                          
                    success:function(result){
                        if (result == "1"){
                            window.location.assign("http://caodangkhoahosting-com.stackstaging.com");
                        }
                        else $("#error").html(result).show();

                    }
                })
            })


            $("#trainerSubmitForm").click(function(){
                $.ajax({
                    type: "POST",
                    url: "actions.php?action=trainerSignup",
                    data: "age=" + $("#age").val()+
                          "&phone="+$("#phone").val(),
                          
                    success:function(result){
                        if (result == 1){
                            window.location.assign("http://caodangkhoahosting-com.stackstaging.com");
                        }
                        else alert(result);

                    }
                })
            })

            $("#submitCourse").click(function(){
                $.ajax({
                    type: "POST",
                    url: "actions.php?action=trainerCourse",
                    data: "subject=" + $("#subject").val() +
                          "&exp=" + $("#exp").val()  +
                          "&acheive=" + $("#acheive").val()  +
                          "&describeTrainer=" + $("#describeTrainer").val()  +
                          "&describeCourse=" + $("#describeCourse").val()  +
                          "&whatWeDo=" + $("#whatWeDo").val()  +
                          "&whereWeDo=" + $("#whereWeDo").val()  +
                          "&courseTime=" + $("#courseTime").val()  +
                          "&dateStart=" + $("#dateStart").val()  +
                          "&timeStart=" + $("#timeStart").val()  +
                          "&timeEnd=" + $("#timeEnd").val(),
                          
                    success:function(result){
                        if (result == 1){
                            alert("Your class is waiting for checking!");
                            window.location.assign("http://caodangkhoahosting-com.stackstaging.com");
                        }
                        else alert(result);

                    }
                })
            })

        </script>
    
    
    
    
    
    </body>
</html>