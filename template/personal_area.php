<section class="account-section">
    <div class="gradient-top"></div>
    <div class="main-body container">    
        <h1 class="text-center text-white mb-2">Manage account</h1>
        <div class="row gutters-sm">
            <div class="col-md-4 mb-3">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex flex-column align-items-center text-center">
                            <img src="<?php echo $userInfo["immagine"]?>" alt="Admin" class="rounded-circle" width="150">
                        </div>
                    </div>
                </div>
                <div class="card mt-3">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                            <h6 class="mb-0"><i class="fas fa-map"></i>Address</h6>
                            <span class="text-secondary"><?php echo $userInfo["strada"]?></span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                            <h6 class="mb-0"><i class="fas fa-city"></i>City</h6>
                            <span class="text-secondary"><?php echo $userInfo["citta"]?></span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                            <h6 class="mb-0"><i class="fas fa-globe-americas"></i>State</h6>
                            <span class="text-secondary"><?php echo $userInfo["stato"]?></span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                            <h6 class="mb-0"><i class="fas fa-road"></i>CAP</h6>
                            <span class="text-secondary"><?php echo $userInfo["codP"]?></span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                        <a type="button" class="btn" href="controller_modifica_indirizzo.php">
                            <span class='btn btn-span'>Modify address</span>
                        </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card mb-3">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Name</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <?php echo $userInfo["nome"]?>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Surname</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <?php echo $userInfo["cognome"]?>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Email</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <?php echo $userInfo["email"]?>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Phone</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <?php echo $userInfo["telefono"]?>
                            </div>
                        </div>
                        <hr> 
                        <div class="row">
                            <div class="col-sm-3">
                                <a href="controller_modifica_info.php" class="btn">
                                    <span class='btn btn-span'>Modify info</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row gutters-sm mx-auto d-flex justify-content-center align-items-center">
                    <div class="col-sm-3">
                        <a href="controller_area_venditore.php">
                            <span id="<?php echo $userInfo["role"]?>" class='btn btn-span role'>Manage list</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="gradient-bottom"></div>
</section>