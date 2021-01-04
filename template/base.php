<!DOCTYPE html>
<html>
    <head>
        <meta  charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="style.css">
        <title><?php echo $templateParams["titolo"]; ?></title>

    </head>
    <body>
    <!--INIZIO HEADER-->
        <div id="header" class="container-fluid">
            <div id="header-title" class="row">
                <div id="header-logo-left" class="col-sm">
                    <a href="index.php"><img id="logo-img" class="pt-2" src="img/logo.png"/></a>
                </div>
                <div id="header-content-center" class="mx-auto col-sm">
                <form class="d-flex justify-content-center mt-2">
                    <input id="search-input" class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button id="search-button" type="submit"><i class="fa fa-search"></i></button>
                </form>
                </div>
                <div id="header-login-right " class="col-sm mt-4" >
                    <span class="d-flex justify-content-center">
                        <h6><a class="col-sm-1" href="#">Login</a> | <a class="col-sm-1" href="#">Carrello</a><h6>
                    </span>
                </div>
            </div>
            <div id="navbar-container" class="d-flex justify-content-center">
                <nav class="navbar navbar-expand-lg ">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav mx-auto">
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                ALL ITEMS
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="#">Action</a>
                                <a class="dropdown-item" href="#">Another action</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#">Something else here</a>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">SKIN</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">ETERNAL</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">ACCESSIORIES</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">CHAMPIONS</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">GIFT</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">PROMOS</a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
            
        </div>
        <!--FINE HEADER-->
        <main id="content">
        <?php
            if(isset($templateParams["nome"])){
                require($templateParams["nome"]);
            }
        ?>
        </main>
        <div id="footer" class="container-fluid">
            <div id="footer-title" class="row">
                <div class="col-md-2">
                    <div class="row">
                        <h3>LoLItems</h3>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="row">
                        <h5>USEFULL PAGES</h5>
                    </div>
                    <div class="row">
                        <a href="#">Become a vendor</a></br>
                        <a href="#">About Us</a></br>
                        <a href="#">Contect Us</a>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="row">
                        <h5>POLICY</h5>
                    </div>
                    <div class="row">
                        <a class="text-muted" href="#">Termsof Usage</a></br>
                        <a class="text-muted" href="controller_policy.php">Privacy Policy</a>
                    </div>
                </div>
                <div class="col-md">
                    <img class="pt-4" id="footer-img"src="img/thresh-1.png"/>
                </div>
            </div>
            <div class="row">
                <div class="col-md-2">
                    <p>Copyright 2021</p>
                </div>
            </div>
        </div>

    </body>
    
</html>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>