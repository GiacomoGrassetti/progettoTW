<section id="registration-container" class="register justify-content-center container-fluid">
    <h2  class="text-center display-6 py-2 text-truncate">Profile avatar</h2>
      <div class="row text-white">
        <div class="col-xl-5 col-lg-6 col-md-8 col-sm-10 mx-auto text-center form p-4">
            <div class="px-2">
                <form action="process_modifica_info.php" method="post" onsubmit="formhash(this, this.inputPassword);"class="justify-content-center">
                    <div id="profile-container" >
                        <image id="profileImage" src="img/user/user_default.png" />
                    </div>
                    <input id="imageUpload" type="file" name="profile_photo" placeholder="Photo" accept="image/*" capture/>
                    
                    <img id="reg-divider" src="img/reg-divider.png" alt=""> 

                    <br><h2 class="d-flex">Personal details:</h2><br>
                    <div class="row form-group">
                        <div class="col-sm-6 form-input-reg">
                            <label class="d-flex" for="inputFirstname">First name</label>
                            <input type="text" class="form-control" id="inputFirstname" name="firstName" placeholder="First name" required>
                        </div>
                        <div class="col-sm-6 form-input-reg">
                            <label class="d-flex" for="inputLastname">Last name</label>
                            <input type="text" class="form-control" id="inputLastname" name="lastName" placeholder="Last name" required>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-sm-6 form-input-reg">
                            <label class="d-flex" for="inputEmail">Email address:</label>
                            <input type="text" class="form-control" id="inputEmail" name="email" placeholder="Email" required>
                        </div>
                        <div class="col-sm-6 form-input-reg">
                            <label class="d-flex" for="inputMobileNumber">Mobile number:</label>
                            <input type="tel" class="form-control" id="inputMobileNumber" name="inputMobileNumber" placeholder="0123456789" pattern="[0-9]{10}" required>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-sm-6 form-input-reg">
                            <label class="d-flex" for="inputPassword">Choose a password:</label>
                            <input type="password" class="form-control" id="inputPassword" name="psw" placeholder="Password" minlength="6" required>
                        </div>
                        <div class="col-sm-6 form-input-reg">
                            <label class="d-flex" for="inputPasswordCheck">Rewrite password:</label>
                            <input type="password" class="form-control" id="inputPasswordCheck" placeholder="Rewrite password" minlength="6" required>
                        </div>
                    </div>
                    <button id="but_upload" class="btn mt-2 btn-update text-center" type="submit" >Submit</button>
                </form>
            </div>
        </div>
    </div>
    <div class="gradient-bottom"></div>
</section>
