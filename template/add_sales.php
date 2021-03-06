<section class="area-add-sales">
    <div class="d-flex justify-content-center ">
        <form action="process_add_sale.php" method="post">
            <div class="row ">
                <div class="col-sm-2 form-group">
                    <label for="value" class="text-white">Value</label>
                    <input type="number" class="form-control" id="value" name="value" required/>
                </div>
                <div class="col-sm-4 form-group">
                    <label for="date" class="text-white">expiration date</label>
                    <input type="date" class="form-control it-date-datepicker" id="date" name="date" required/>
                </div>

                <div class="col-sm-4 form-group">
                    <fieldset>
                    <legend class="mb-2 text-white">Select item:</legend>
                    <?php foreach ( $templateParams["items"] as $item) : ?>
                        <div class="add form-check cat-box">
                            <input class="form-check-input"  name="items[]" type="checkbox" id="<?php echo $item["idOggetto"]?>" value="<?php echo $item["idOggetto"]?>">
                            <label class="form-check-label text-white" for="<?php echo $item["idOggetto"]?>"><?php echo $item["nome"] ?></label>
                        </div>
                    <?php endforeach; ?>          
                    </fieldset>          
                </div>
            </div>
            <button class="btn btn-rectangle mb-2" type="submit" value="Submit">Save</button>
        </form>
    </div>
</section>