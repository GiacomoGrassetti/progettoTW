<div id="registration-container" class="register justify-content-center">
    <h2  class="text-center display-6 py-2 text-truncate">Profile avatar</h2>
      <div class="row text-white">
        <div class="col-xl-5 col-lg-6 col-md-8 col-sm-10 mx-auto text-center form p-4">
            <div class="px-2">
                <form action="" class="justify-content-center">
                   
                    <div id="profile-container" >
                        <image id="profileImage" src="img/img-picker.png" />
                     </div>
                     <input id="imageUpload" type="file" 
                            name="profile_photo" placeholder="Photo" required="" capture/>
                    

                    <img id="reg-divider" src="img/reg-divider.png" alt=""> 

                    <br><h2 class="d-flex">Personal details:</h2><br>
                    <div class="row form-group">
                        <div class="col-sm-6 form-input-reg">
                            <label class="d-flex" for="inputFirstname">First name</label>
                            <input type="text" class="form-control" id="inputFirstname" placeholder="First name">
                        </div>
                        <div class="col-sm-6 form-input-reg">
                            <label class="d-flex" for="inputLastname">Last name</label>
                            <input type="text" class="form-control" id="inputLastname" placeholder="Last name">
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-sm-6 form-input-reg">
                            <label class="d-flex" for="inputEmail">Email address:</label>
                            <input type="text" class="form-control" id="inputEmail" placeholder="Email">
                        </div>
                        <div class="col-sm-6 form-input-reg">
                            <label class="d-flex" for="inputMobileNumber">Mobile number:</label>
                            <input type="text" class="form-control" id="inputMobileNumber" placeholder="Mobile number">
                        </div>
                    </div>

                    <br><h2 class="d-flex">Address:</h2><br>

                    <div class="row form-group">
                        <div class="col-sm-6 form-input-reg">
                            <label class="d-flex" for="inputAddress">Address:</label>
                            <input type="text" class="form-control" id="inputAddress" placeholder="Address">
                        </div>
                        <div class="col-sm-6 form-input-reg">
                            <label class="d-flex" for="inputCity">City:</label>
                            <input type="text" class="form-control" id="inputCity" placeholder="City">
                        </div>
                        <div class="col-sm-6 form-input-reg">
                            <label class="d-flex" for="inputState">State:</label>
                            <input type="text" class="form-control" id="inputState" placeholder="State">
                        </div>
                        <div class="col-sm-6 form-input-reg">
                            <label class="d-flex" for="inputPostalCode">Postal code:</label>
                            <input type="text" class="form-control" id="inputPostalCode" placeholder="Postal code">
                        </div>
                    </div>
                    
                </form>
            </div>
        </div>
    </div>
</div>

<script>
$("#profileImage").click(function(e) {
    $("#imageUpload").click();
});

function fasterPreview( uploader ) {
    if ( uploader.files && uploader.files[0] ){
          $('#profileImage').attr('src', 
             window.URL.createObjectURL(uploader.files[0]) );
    }
}

$("#imageUpload").change(function(){
    fasterPreview( this );
});
</script>