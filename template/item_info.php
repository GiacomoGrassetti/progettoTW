<section class="item-info-container">
    <div class="item-info-container justify-content-center text-center pt-2">
        <div id="img-info-container">
            <img title="<?php echo $templateParams["item"][0]["nome"]?>" class="img-item-info" src="<?php echo $templateParams["item"][0]["immagine"]?>" alt="Ravenous Hydra" style="width:30%">
        </div>
        <div class="item-info mx-auto row text-white align-self-center">
            <h1 class="item-info-title display-1"><?php echo $templateParams["item"][0]["nome"]?></h1>
            <div class="col">
                <ul class="list-group-flush ">
                    <?php foreach($templateParams["itemParams"] as $par):?>
                    <li><?php echo ($par["valore"]." ".$par["nome"]); ?></li>
                    <?php endforeach; ?>
                </ul>    
            </div>
            <div class="vl"></div>
            <div class="col">
                <p style="padding: 0px 20px 0px 20px">
                    <?php echo $templateParams["item"][0]["descrizione"]?>
                </p>
            </div>
            
        </div>
        <div class="text-white mx-auto item-info justify-content-center text-center"><p><?php foreach($templateParams["itemCat"] as $cat){echo " | ".$cat["nome"]." | ";} ?></p></div>
            <a href="add_to_cart.php?id=<?php echo $templateParams["item"][0]["idOggetto"];?>">
                <span id="add-sale" class='btn mx-auto mt-2 btn-rectangle'>Add sale</span>
            </a>
    </div>
    <div class="gradient-bottom"></div>
</section>
