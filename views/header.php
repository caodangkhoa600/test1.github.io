<!doctype html>
<html lang="en" class="h-100">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
        <script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <link href="style.css" rel = "stylesheet">
        <title>SWEAT UP</title>
    </head>
  <body class="d-flex flex-column h-100">



        <nav class="navbar navbar-expand-md navbar-dark sticky-top bg-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="http://caodangkhoahosting-com.stackstaging.com">SWEAT UP</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <ul class="navbar-nav me-auto mb-2 mb-md-0">
                        
                        <li class="nav-item">
                            <a class="nav-link" href="#">Temp 1</a>
                        </li>
                            <li class="nav-item">
                                <form>
                                <input type = "hidden" name="page" value="search">
                                <input type="text" name = "q" class="form-control" id="search" placeholder="Search">
                                
                            </li>
                            
                            <li class="nav-item">
                                <button type="submit" class="btn btn-primary mb-3">Search</button>
                                </form>
                            </li>
                        
                        
                    </ul>
                    
                    
                    <?php if ($_SESSION['id']>0) {?>
                        

                        

                        <div class="d-flex">
                            
                                <?php if  (isTrainer()==2){   ?>
                                    <a href = "?page=creCourse">
                                        <button type="button" class="btn btn-primary">
                                            Đăng ký dạy!
                                        </button>
                                    </a>
                                <?php } else {?>    
                            
                            
                                    <a href = "?page=becomeTrainer">
                                        <button type="button " class="btn btn-success">
                                            Be a trainer
                                        </button>
                                    </a>

                                <?php } ?>
                            <a href = "?function=logout">
                                <button type="button" class="btn btn-primary">
                                    Log out
                                </button>
                            </a>
                           
                        </div>
                      
                    <?php } else { ?>

                        <div class="d-flex">
                            
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                Login/Signup
                            </button>
                            
                        </div>
                    <?php } ?>
                  
                </div>
            </div>
        </nav>