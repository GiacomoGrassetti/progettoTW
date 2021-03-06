<!DOCTYPE html>
<html lang="en">
    <head>
        <meta  charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
        <link href='https://fonts.googleapis.com/css?family=IM Fell Double Pica' rel='stylesheet'>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <link rel="stylesheet" href="css/style.css">
        <script type="text/javascript" src="js/sha512.js"></script>
        <script type="text/javascript" src="js/forms.js"></script>
        <script type="text/javascript" src="js/uploader.js"></script>
        <script type="text/javascript" src="js/uploader_item.js"></script>
        <script type="text/javascript" src="js/utility.js"></script>
        <script type="text/javascript" src="js/control_form.js"></script>
        <script type="text/javascript" src="js/control_role.js"></script>
        <script type="text/javascript" src="js/insert_spec.js"></script>
        <script type="text/javascript" src="js/calculator.js"></script>
        <title><?php echo $templateParams["titolo"]; ?></title>
        <link rel="icon" href="img/lolitems_doppio.png">
    </head>
    <body>
    <!--INIZIO HEADER-->
        <div id="header" class="container-fluid">
            <div id="header-title" class="row">
                <div id="header-logo-left" class="col-sm">
                    <a href="index.php"><img id="logo-img" class="pt-2" alt="lolItems" src="img/lolitems_linea.png"/></a>
                </div>
                <div id="header-content-center" class="mx-auto col-sm">
                <form method="get" action="controller_home.php" class="d-flex justify-content-center mt-2">
                    <input id="search-input" class="form-control me-2" value="search" type="search" placeholder="Search" name="find" aria-label="Search">
                    <button id="search-button" aria-label="search" type="submit"><i class="fa fa-search"></i></button>
                </form>
                </div>
                <div id="header-login-right " class="col-sm mt-4" >
                    <span class="d-flex justify-content-center">
                        <a data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="">
                            <?php 
                                if(login_check($dbh) == true){
                            ?>  
                                    <h6 class="ml-2"><a class="col-sm-1" href="controller_pArea.php"><i class="fas fa-user"></i>&nbsp;PERSONAL AREA |&nbsp;</a></h6>
                            <?php
                                }else{
                            ?>  
                                <h6><i  class="fas fa-user"></i> LOGIN |&nbsp;</h6>
                            <?php     
                                }
                            ?>
                        </a>
                        <!--DROPDOWN LOGIN-->
                        <div class="dropdown-menu box-login bubble">
                            <form id="form-login" class="px-4 py-3" method="post" action="process_login.php">
                                <div class="form-group">
                                    <label for="email">Email address</label>
                                    <input type="email" class="form-control" name="inputEmail" id="email" placeholder="Enter your email">
                                </div>
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" class="form-control" name="inputPassword" id="password" placeholder="Password">
                                </div>
                                
                                <button class="btn-rectangle mt-2" type="submit" onclick="formhash(this.form, this.form.password);">SIGN IN</button>
                            </form>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="controller_register.php">New around here? Sign up</a>
                        </div>
                        <!---->
                        <?php 
                            if(!(isset($_SESSION["venditore"]) && $_SESSION["venditore"])): ?>
                                <h6 class="ml-2"><a class="col-sm-1" href="controller_cart.php"><i class="fas fa-shopping-cart"></i> CART |&nbsp;</a> </h6>
                        <?php endif; ?>
                        
                        
                        <?php 
                            if(login_check($dbh) == true){
                            ?>  
                                <h6 class="ml-2"><a class="col-sm-1" href="process_logout.php"><i class="fas fa-sign-out-alt"></i> LOGOUT </a> </h6>
                            <?php
                            }
                        ?>
                    </span>
                </div>
            </div>
            <div id="navbar-container" class="d-flex justify-content-center">
                <nav class="navbar navbar-expand-lg navbar-inverse bg-inverse">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon">
                           
                        </span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav mx-auto">
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                ALL ITEMS
                                </a>
                                <div class="dropdown-menu container filter" aria-labelledby="navbarDropdown">
                                    <div class="col-sm-12">
                                        <form class="row">
                                            <fieldset>
                                            <legend> Category</legend>
                                            <?php foreach($templateParams["categorie"] as $item): ?>
                                                <div class="form-check form-switch">
                                                    <input class="form-check-input" value="<?php echo $item["idCategoria"];?>" onClick="filterItem(this);" name="filter" type="checkbox" id="<?php echo $item["nome"];?>">
                                                    <label class="form-check-label" for="<?php echo $item["nome"];?>"><?php echo $item["nome"];?></label>
                                                </div>
                                                
                                            <?php endforeach; ?>  
                                            </fieldset>
                                        </form>
                                    </div>
                                </div>
                            </li>
                            <li class="nav-item">
                                <?php 
                                    if(login_check($dbh) == true){
                                ?>  
                                       <a class="nav-link" href="controller_notifica.php">NOTIFICATIONS</a>
                                <?php
                                    } ?>
                                
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
        
        <!--BUTTON TO TOP-->
        <div id="btn-to-top" class="align-items-center">
            <a aria-label="up" href="#header"><i class="fas fa-angle-up"></i></a><br>
            <a aria-label="down" href="#footer"><i class="fas fa-angle-down"></i></a>
        </div>
        
        <!---->
        <div id="footer" class="container-fluid">
            <div id="footer-title" class="row">
                <div class="col-md-2">
                    <div class="row">
                        <a href="index.php"><img id="logo-img" class="pt-2" alt="lolItems" src="img/lolitems_linea.png"/></a>
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
                       <!-- <a class="text-muted" href="#">Termsof Usage</a></br>
                        <a class="text-muted" href="controller_policy.php">Privacy Policy</a>-->
                    </div>
                </div>
                <div class="col-md-6 justify-content-center">
                    <img class="pt-2" id="footer-img" alt="" src="img/volibear.png"/>
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

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>