

function low(ida){
    if($("#qnt_"+ida).text()>0){
        $("#qnt_"+ida).text($("#qnt_"+ida).text()-1);
        let q= $("#qnt_"+ida).text();
        $.ajax({
            type: "GET",
            url: "process_cookie.php",
            data: { id:ida, qnt:q},
            success: function(){
                //window.location.href="process_cookie.php?id="+id+"&qnt="+$("#qnt_"+id).text();
            }
        });
    }
    
    
}



function high(ida){
    $("#qnt_"+ida).text(parseInt($("#qnt_"+ida).text())+1);
    let q= $("#qnt_"+ida).text();
        $.ajax({
            type: "GET",
            url: "process_cookie.php",
            data: { id:ida, qnt:q},
            success: function(){
                //window.location.href="process_cookie.php?id="+id+"&qnt="+$("#qnt_"+id).text();
            }
        });
}
   
function checkQnt(){
    let rows = document.getElementsByClassName("tr-control");

    for(let item of rows){
        let qnt= item.getElementsByClassName("qnt").item(0);
        let quantity=item.getElementsByClassName("quantita").item(0);
        let nome = document.getElementsByClassName("nome").item(0);
        if(parseInt(qnt.innerHTML)>parseInt(quantity.innerHTML)){
            alert("Il numero di "+nome.innerHTML+" supera i pezzi disponibili("+quantity.innerHTML+")");
            
            qnt.innerHTML = quantity.innerHTML;
            return  false;
        }
        
    }
    return true;
    
}

$(document).ready(function() {
    $('#call').click(function() {
        if(!checkQnt()){
            return;
        }

        $.ajax({
        type: "POST",
        url: "process_checkout.php",
        data: { status:"4"},
        success: function(){
            window.location.href="controller_home.php?status=4";
        }
    });
  });
});

function callCheckout(){
    
}
