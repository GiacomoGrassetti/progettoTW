<section id="registration-container" class="register justify-content-center container-fluid">
    <h2  class="text-center display-6 py-2 text-truncate">Profile avatar</h2>
      <div class="row text-white">
        <div class="col-xl-5 col-lg-6 col-md-8 col-sm-10 mx-auto text-center form p-4">
            <div class="px-2">
                <form id="form_register" action="regist_user.php" method="post" onsubmit="formhash(this, this.inputPassword)" class="justify-content-center">
                    <div id="profile-container" >
                        <image id="profileImage" src="img/user/user_default.png" />
                    </div>
                    <input id="imageUpload" type="file" name="profile_photo" placeholder="Photo" accept="image/*" capture/>

                    <img id="reg-divider" src="img/reg-divider.png" alt=""> 

                    <br><h2 class="d-flex">Personal details:</h2><br>
                    <div class="row form-group">
                        <div class="col-sm-6 form-input-reg">
                            <label class="d-flex" for="inputFirstname">First name</label>
                            <input type="text" class="form-control" id="inputFirstname" name="firstName" placeholder="First name" required >
                        </div>
                        <div class="col-sm-6 form-input-reg">
                            <label class="d-flex" for="inputLastname">Last name</label>
                            <input type="text" class="form-control" id="inputLastname" name="lastName" placeholder="Last name" required >
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-sm-6 form-input-reg">
                            <label class="d-flex" for="inputEmail">Email address:</label>
                            <input type="text" class="form-control" id="inputEmail" name="email" placeholder="Email" required >
                        </div>
                        <div class="col-sm-6 form-input-reg">
                            <label class="d-flex" for="inputMobileNumber">Mobile number:</label>
                            <input type="tel" class="form-control" id="inputMobileNumber" name="inputMobileNumber" placeholder="0123456789" pattern="[0-9]{10}" required >
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-sm-6 form-input-reg">
                            <label class="d-flex" for="inputPassword">Choose a password:</label>
                            <input type="password" class="form-control" id="inputPassword" name="psw" minlength="6" placeholder="Password" required >
                        </div>
                        <div class="col-sm-6 form-input-reg">
                            <label class="d-flex" for="inputPasswordCheck">Rewrite password:</label>
                            <input type="password" class="form-control" id="inputPasswordCheck"name="psw_check" minlength="6" placeholder="Rewrite password" required >
                        </div>
                    </div>
                    <div class="col-sm-12 form-group form-input-reg">
                        <label class="d-flex">You are:</label>
                        <div class="d-flex col-sm-6">    
                            <input class=" form-check-input" type="radio" name="inputRole" id="inputCustomer" value="customer" checked>
                            <label class="form-check-label" for="inputCustomer">
                                Customer
                            </label>
                        </div>
                            <div class="d-flex col-sm-6">
                            <input class=" form-check-input" type="radio" name="inputRole" id="inputVendor" value="vendor">
                            <label class="form-check-label" for="inputVendor">
                                Vendor
                            </label>
                        </div>
                        
                    </div>

                    <br><h2 class="d-flex">Address:</h2><br>

                    <div class="row form-group">
                        <div class="col-sm-6 form-input-reg">
                            <label class="d-flex" for="inputAddress">Address:</label>
                            <input type="text" class="form-control" id="inputAddress" name="address" placeholder="Address" required >
                        </div>
                        <div class="col-sm-6 form-input-reg">
                            <label class="d-flex" for="inputCity">City:</label>
                            <input type="text" class="form-control" id="inputCity" name="city" placeholder="City" required >
                        </div>
                        <div class="col-sm-6 form-input-reg">
                            <label class="d-flex" for="inputState">State:</label>
                            <input type="text" class="form-control" id="inputState" name="state" placeholder="State" required >
                        </div>
                        <div class="col-sm-6 form-input-reg">
                            <label class="d-flex" for="inputPostalCode">Postal code:</label>
                            <input type="text" class="form-control" id="inputPostalCode" name="postalCode" minlength="5" maxlength="5" placeholder="Postal code" required >
                        </div>
                    </div>
                    <button id="but_upload" class="btn mt-2 btn-update text-center" type="submit">Submit</button>
                </form>
            </div>
        </div>
    </div>
    <div class="gradient-bottom"></div>
</section>
