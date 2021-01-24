$( document ).ready(function() {
    $("#profileImage").click(function(e) {
        $("#imageUpload").click();
    });
    
    $("#imageUpload").change(function(){
        fasterPreview( this );
    });

    $("#but_upload").click(function(){

        var fd = new FormData();
        var files = $('#imageUpload')[0].files;
        alert("ebnter");
        // Check file selected or not
        if(files.length > 0 ){
           fd.append('file',files[0]);
           $.ajax({
              url: 'upload.php',
              type: 'post',
              data: fd,
              contentType: false,
              processData: false,
              success: function(response){
                 if(response != 0){
                    $("#profileImage").attr("src",response);
                 }
              },
           });
        }
    });
});

let fileName;

function fasterPreview( uploader ) {
    if ( uploader.files && uploader.files[0] ){
            $('#profileImage').attr('src', window.URL.createObjectURL(uploader.files[0]));
            fileName = uploader.files[0]["name"];
    }
}
