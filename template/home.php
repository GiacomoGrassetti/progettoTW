<section id="item-list" class="">
    <div class="gradient-top"></div>
    <video playsinline autoplay muted loop poster="img/runeterra.jpg" class="bgvid">
        <source src="img/animated-ionia.webm" type="video/webm">
    </video>
    <div class="col-sm-12 col-md-12 row container-fluid m-0">
        <?php foreach($templateParams["articoli"] as $item): ?>
            <?php if($item["quantita"] > 0) {?>
            <div class="item-container col-md-2 mt-2">
                <a href="controller_item_info.php?id=<?php echo $item["idOggetto"]?>">
                    <div class="opacity">
                        <img  class="item-img" src="<?php echo $item["immagine"] ?>" alt="<?php echo $item["nome"] ?>">
                        <div class="stats-img d-flex justify-content-center align-items-center ">
                            <ul>
                                <?php 
                                    $val=$templateParams["stats"][$item["idOggetto"]];
                                    foreach($val as $st){
                                        echo("<li>".$st["nome"]." ".$st["valore"]."</li>");
                                    }
                                ?>
                            </ul>
                        </div>
                    </div>
                </a>
                <?php if(isset($item["idSconto"])): ?>
                    <div class="label-sale">
                        SALES 
                    </div>
                <?php endif; ?>
                <div class="row col-sm-12 item-pre-info">
                    <div class="col-sm-9 col-md-9 ">
                        <p>
                            <?php echo $item["nome"] ?><br>
                            <?php
                                $cat=$dbh->getItemCat($item["idOggetto"]);
                                foreach($cat as $val){
                                    if(!($val["idCategoria"]==8 || $val["idCategoria"]==2)){
                                        echo '<p class="idCat" hidden>'.$val["idCategoria"] . "</p>";
                                    }else{
                                        echo $val["nome"] . "<br>";
                                        echo '<p class="idCat" hidden>'.$val["idCategoria"] . "</p>";
                                    }
                                }
                            ?>
                            <br><?php echo $item["prezzo"] ?>€
                        </p>
                    </div>
                    <div class="col-sm col-md d-flex justify-content-center align-self-center">
                        <a aria-label="shop" href="add_to_cart.php?id=<?php echo $item["idOggetto"];?>"><i alt="shop" class="fa fa-cart-plus fa-2x"></i></a>                
                    </div>
                </div>
            </div>
            <?php } ?>
        <?php endforeach; ?>  
    </div>
    <div class="gradient-bottom"></div>
</section>

