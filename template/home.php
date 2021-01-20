<div id="item-list" class="container-fluid mt-2">
    <div class="col-sm-12 col-md-12 row">
        <?php foreach($templateParams["articoli"] as $item): ?>
            <div class="item-container col-md-2">
                <a href="controller_item_info.php?id=<?php echo $item["idOggetto"]?>">
                    <div class="opacity">
                        <img title="<?php echo $item["nome"] ?>" class="item-img" src="<?php echo $item["immagine"] ?>" alt="<?php echo $item["nome"] ?>">
                        <div class="stats-img d-flex justify-content-center align-items-center">
                            <ul>
                                <li>aaa</li>
                                <li>aaa</li>
                                <li>aaa</li>
                            </ul>
                        </div>
                    </div>
                </a>
                <div class="label-sale">
                    SALES
                </div>
                <div class="row">
                    <div class="col-sm col-md">
                        <p><?php echo $item["nome"] ?><br>
                        <?php
                            $cat=$dbh->getItemCat($item["idOggetto"]);
                            foreach($cat as $val){
                                echo $val["nome"] . "<br>";
                            }
                        ?>
                        <br><?php echo $item["prezzo"] ?>€</p>
                    </div>
                    <div class="col-sm col-md d-flex justify-content-center align-self-center">
                        <a href="#"><i class="fa fa-cart-plus fa-2x" aria-hidden="true"></i></a>                
                    </div>
                </div>
            </div>
        <?php endforeach; ?>  
    </div>
</div>

