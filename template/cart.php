<section class="cart-section">
    <div class="gradient-top"></div>
    <div class="row">
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
                    <th scope="col">Remove?</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($templateParams["articoliCart"] as $item): ?>
                        <tr>
                            <td scope="hidden-xs">
                                <img style="width: 58px; height: 58px" src="<?php echo $item["immagine"]?>" alt="">
                            </td>
                            <td><?php echo $item["nome"]?></td>
                            <td><?php echo $item["prezzo"] ?>€</td>
                            <td>quantita</td>
                            <td><?php echo $item["prezzo"]?>€</td>
                            <td>
                                <a href="#"><i class="fas fa-trash-alt"></i></a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
                </table>
            </div>
        </div>

    </div>
    <div class="gradient-bottom"></div>
</section>