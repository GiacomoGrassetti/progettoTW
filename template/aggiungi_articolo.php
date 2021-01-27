<section class="add-item-area">
    <div class="gradient-top"></div>
    <div class="container">
        <h1 class="text-center text-white mb-2">Add new item</h1>
        <form action="process_add_item.php" method="post">
            <div class="row  d-flex justify-content-center">
                <div class="col-sm-2 add-box">
                    <div id="profile-container">
                        <image id="itemImage" src="img/items/item_default.png" />
                    </div>
                    <label for="imageItemUpload">profile photo</label>
                    <input id="imageItemUpload" type="file" name="profile_photo" placeholder="Photo" accept="image/*" capture/>

                    <div class="add mt-2">
                        <label for="spec" class="mb-2">Statistic(name=value)</label>
                        <input id="spec" type="text" class="form-control input-stretch mb-2" id="nomeSpec" name="nomeSpec" placeholder="name=value" required>
                        <a>
                            <span id="add-spec" class='btn btn-span'>Add stats</span>
                        </a>
                        <!--<button id="add-spec" type="btn" class="btn btn-span mb-2" >Add spec</button>-->
                        <textarea aria-label="Statistic" id="textAreaSpec" class="form-control mb-2" id="itemSpec" name="itemSpec" rows=3></textarea>
                    </div>
                </div>
                <div class="col-sm-4 add-box">
                    <div class="add">
                        <label class="d-flex" for="itemName">Item name</label>
                        <input type="text" class="form-control" id="itemName" name="itemName" placeholder="Item name" required>
                        <hr>
                        <label class="d-flex" for="itemPrice">Item price</label>
                        <input type="text" class="form-control" id="itemPrice" name="itemPrice" placeholder="item price" required>
                        <hr>
                        <label class="d-flex" for="itemQuantity">Quantity</label>
                        <input type="number" class="form-control" id="itemQuantity" name="itemQuantity" value=1 required>
                        <hr>
                        <label class="d-flex" for="itemDesc">Description</label>
                        <textarea class="form-control mb-2" id="itemDesc" name="itemDesc" rows=3 placeholder="Write item description" required></textarea>
                    </div>
                </div>
                <div class="col-sm-2 add-box">
                    <fieldset>
                    <legend class="mb-2">Category item:</legend>
                    <?php foreach ( $templateParams["category"] as $cat) : ?>
                        <div class="add form-check cat-box">
                            <input class="form-check-input"  name="categoria[]" type="checkbox" id="<?php echo $cat["idCategoria"]?>" value="<?php echo $cat["idCategoria"]?>">
                            <label class="form-check-label" for="<?php echo $cat["idCategoria"]?>"><?php echo $cat["nome"] ?></label>
                        </div>
                    <?php endforeach; ?>          
                    </fieldset>          
                </div>
                
            </div>
            <div class="d-flex justify-content-center">
                <button id="but_upload_item" class="btn mt-2 btn-span" type="submit">Add new item</button>
            </div>
        </form> 
    </div>
    <div class="gradient-bottom"></div>
</section>