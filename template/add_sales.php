<section class="area-add-sales">
    <div class="d-flex justify-content-center ">
        <form action="process_add_sale.php" method="post">
            <div class="row ">
                <div class="col-sm-2 form-group">
                    <label for="value">Value</label>
                    <input type="number" class="form-control" id="value" name="value" required/>
                </div>
                <div class="col-sm-4 form-group">
                    <label for="date">expiration date</label>
                    <input type="date" class="form-control it-date-datepicker" id="date" name="date" required/>
                </div>

                <div class="col-sm-4 form-group">
                    <fieldset>
                    <legend class="mb-2">Select item:</legend>
                    <?php foreach ( $templateParams["items"] as $item) : ?>
                        <div class="add form-check cat-box">
                            <input class="form-check-input"  name="items[]" type="checkbox" id="<?php echo $item["idOggetto"]?>" value="<?php echo $item["idOggetto"]?>">
                            <label class="form-check-label" for="<?php echo $item["idOggetto"]?>"><?php echo $item["nome"] ?></label>
                        </div>
                    <?php endforeach; ?>          
                    </fieldset>          
                </div>
            </div>
            <button type="submit" value="Submit">Save</button>
        </form>
    </div>
</section>