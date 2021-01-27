<section class="area-sales">
    <div class="gradient-top"></div>
    <div class="container">
        <h1 class="text-center text-white">Your Sale</h1>
        <div class="mx-auto justify-content-center table-responsive" >
            <table class="table mt-2 ">
                <thead>
                    <tr>
                    <th scope="col">Start date</th>
                    <th scope="col">Expiration date</th>
                    <th scope="col">Value</th>
                    <td scope="col"></td>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($tmp as $sale) : ?>
                        <tr class="tr-control">
                            <td class="dataEmissione"><?php echo $sale["dataEmissione"]?></td>
                            <td class="dataScendenza"><?php echo $sale["dataScadenza"] ?></td>
                            <td class="valore"><?php echo $sale["valore"]?></td>
                            <td class="oggetto">
                                <?php foreach($sale["item"] as $item):
                                    echo $item["nome"]." / ";
                                endforeach;
                                ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <a href="controller_add_sale.php">
                <span id="add-sale" class='btn mx-auto btn-span'>Add sale</span>
            </a>
        </div>
    </div>
    <div class="gradient-bottom"></div>
</section>