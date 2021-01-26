$(document).ready(function() {
    let role =$('.role').attr('id');
    if(role === "cliente"){
        $('#cliente').hide();
    }else{
        $('#venditore').show();
    }
  });