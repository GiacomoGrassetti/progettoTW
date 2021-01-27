function low(id){
    if($("#qnt_"+id).text()>0){
        $("#qnt_"+id).text($("#qnt_"+id).text()-1);
    }
}

function high(id){
    $("#qnt_"+id).text(parseInt($("#qnt_"+id).text())+1);
    
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

function callCheckout(){
    if(checkQnt()){
        console.log("enter");
        $.ajax(
            location.href = 'process_checkout.php'
        );
    }

}