<section class="cart-section mx-auto justify-content-center">
    <div class="gradient-top"></div>
    <div class="row cart-table">
        <div class="col-sm-6 col-sm-offset-3 mx-auto justify-content-center">
            <h1 class="text-center text-white title-page">Your cart</h1>
        </div>
        <div class="row">
            <div class="col-sm-10 mx-auto justify-content-center table-responsive">
                <table class="table mt-2">
                    <thead>
                        <tr>
                        <th scope="col"></th>
                        <th scope="col">Name</th>
                        <th scope="col">Price</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Total</th>
                        <!--<th scope="col">Amount</th>-->
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($templateParams["articoliCart"] as $item): ?>
                            <tr class="tr-control">
                                <td scope="hidden-xs">
                                    <img style="width: 58px; height: 58px" src="<?php echo $item["immagine"]?>" alt="">
                                </td>
                                <td class="nome"><?php echo $item["nome"]?></td>
                                <td class="prezzo"><?php echo $item["prezzo"] ?>€</td>
                               
                                <td  class="qnt-td">
                                    <button onClick="low(<?php echo $item["idOggetto"] ?>)" class="btn btn-low" type="button">-</button>
                                    <span class="qnt m-0" id="qnt_<?php echo $item["idOggetto"] ?>"><?php echo $item["qnt"]?></span>
                                    <button  onClick="high(<?php echo $item["idOggetto"] ?>)" class="btn btn-up" type="button">+</button>
                                    
                                </td>
                               
                                <td class="quantita"><?php echo $item["quantita"]?></td>
                                <td class="tot"><?php echo $item["prezzo"]?>€</td>
                                <!--<td id="amount-<?php echo $item["idOggetto"]?>">
                                    <input class="form-control item-qnt" type="number" value="1" id="">
                                </td>-->
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <button class="btn mx-auto btn-rectangle" onclick="callCheckout();">Submit</button>
            </div> 
            
        </div>
    </div>
    <div class="gradient-bottom"></div>
</section>