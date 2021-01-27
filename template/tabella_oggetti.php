<section>
    <div class="container-fluid mx-auto justify-content-center table-responsive">
        <table class="table mt-2 ">
            <thead>
                <tr>
                <td scope="col"></td>
                <th scope="col">Name</th>
                <th scope="col">Price</th>
                <th scope="col">Quantity</th>
                <td scope="col"></td>
                <td scope="col"></td>
                <!--<th scope="col">Amount</th>-->
                </tr>
            </thead>
            <tbody>
                <?php foreach($templateParams["items"] as $item): ?>
                    <tr class="tr-control">
                        <td scope="hidden-xs">
                            <img style="width: 58px; height: 58px" src="<?php echo $item["immagine"]?>" alt="">
                        </td>
                        <td class="nome"><?php echo $item["nome"]?></td>
                        <td class="prezzo"><?php echo $item["prezzo"] ?>€</td>
                        <td class="quantita"><?php echo $item["quantita"]?></td>
                        <td class="mod">
                            <a href="controller_modifica_item.php?id=<?php echo $item["idOggetto"]?>">
                                <span id="add-spec" class='btn btn-span'>Modify</span>
                            </a>
                        </td>    
                        <td class="del">
                            <a href="controller_elimina_item.php?id=<?php echo $item["idOggetto"]?>">
                                <span id="add-spec" class='btn btn-danger'>Delete</span>
                            </a>
                        </td> 
                        <td id="amount<?php echo $item["idOggetto"]?>"></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</section>