$( document ).ready(function() {
    $('#add-spec').click(function() {
        console.log($('#spec').val());
        let spec = $('#spec').val();
        
        if($("#textAreaSpec").val() == ""){
            $("#textAreaSpec").val(spec+';');
        }else{
            $("#textAreaSpec").append(spec+';');
        }
    });
});
