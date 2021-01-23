<section id="registration-container" class="register justify-content-center container-fluid">
    <h2  class="text-center display-6 py-2 text-truncate">Update address</h2>
    <div class="row text-white">
        <div class="col-xl-5 col-lg-6 col-md-8 col-sm-10 mx-auto text-center form p-4">
            <div class="px-2">
                <form action="process_modifica_indirizzo.php" method="post" class="justify-content-center">
                    <div class="row form-group">
                        <div class="col-sm-6 form-input-reg">
                            <label class="d-flex" for="inputAddress">Address:</label>
                            <input type="text" class="form-control" id="inputAddress" name="address" placeholder="Address">
                        </div>
                        <div class="col-sm-6 form-input-reg">
                            <label class="d-flex" for="inputCity">City:</label>
                            <input type="text" class="form-control" id="inputCity" name="city" placeholder="City">
                        </div>
                        <div class="col-sm-6 form-input-reg">
                            <label class="d-flex" for="inputState">State:</label>
                            <input type="text" class="form-control" id="inputState" name="state" placeholder="State">
                        </div>
                        <div class="col-sm-6 form-input-reg">
                            <label class="d-flex" for="inputPostalCode">Postal code:</label>
                            <input type="text" class="form-control" id="inputPostalCode" name="postalCode" placeholder="Postal code">
                        </div>
                    </div>
                    <button class="btn mt-2 btn-update text-center" type="submit" onclick="formhash(this.form, this.form.inputPassword);">Submit</button>
                </form>
            </div>
        </div>
    <div class="gradient-bottom"></div>
</section>