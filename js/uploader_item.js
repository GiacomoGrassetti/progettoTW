$( document ).ready(function() {
    $("#itemImage").click(function(e) {
        $("#imageItemUpload").click();
    });
    
    $("#imageItemUpload").change(function(){
        fasterPreview( this );
    });

    $("#but_upload_item").click(function(){

        let fd = new FormData();
        let files = $('#imageItemUpload')[0].files;
        // Check file selected or not
        if(files.length > 0 ){
           fd.append('file',files[0]);
           $.ajax({
              url: 'upload_item.php',
              type: 'post',
              data: fd,
              contentType: false,
              processData: false,
              success: function(response){
                 if(response != 0){
                    $("#itemImage").attr("src",response);
                 }
              },
           });
        }
    });
});

let fileNameItem;

function fasterPreview( uploader ) {
    if ( uploader.files && uploader.files[0] ){
            $('#itemImage').attr('src', window.URL.createObjectURL(uploader.files[0]));
            fileNameItem = uploader.files[0]["name"];
    }
}
