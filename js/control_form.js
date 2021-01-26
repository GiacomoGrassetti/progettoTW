
   
function checkQnt(){
    let rows = document.getElementsByClassName("tr-control");
    let quantita = document.getElementsByClassName("quantita");
    let nomi = document.getElementsByClassName("nome");
    let i=0;
    for (let j = 0; j < rows.length; j++) {
        console.log(rows[j]);
        let columns = $(rows[j]).find("input");
        if(columns[0].value > quantita[i].innerHTML){
            alert("Il numero di "+nomi[i].innerHTML+" supera i pezzi disponibili("+quantita[i].innerHTML+")");
            columns[0].value = quantita[i].innerHTML;
            return  false;
        }
        i++;
    }
    return true;
    /*$.each( rows, function(index, row) {
        let columns = $(row).find("input");
        if(columns[0].value > quantita[i].innerHTML){
            alert("Il numero di "+nomi[i].innerHTML+" supera i pezzi disponibili("+quantita[i].innerHTML+")");
            columns[0].value = quantita[i].innerHTML;
            console.log("porcodio");
            return;
        }
        i++;
    });
    return true;*/
}

function callCheckout(){
    if(checkQnt()){
        console.log("enter");
        $.ajax(
            location.href = 'process_checkout.php'
        );
    }

}