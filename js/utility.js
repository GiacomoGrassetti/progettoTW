let tmp = document.getElementsByClassName("item-container");

function filterItem(){
    let countChecked=0;
    let countFound=0;
    let checkbox = document.getElementsByClassName("form-check-input");
    for(let controller of checkbox){
        if(controller.checked){
            countChecked++;
        }
    }
    for (let item of tmp) {
        countFound=0;
        let cat=item.getElementsByClassName("idCat");
        for (let value of cat) {
            for(let controller of checkbox){
                if(controller.checked){
                    if(controller.value==value.innerHTML){
                        countFound++;
                        break;
                    }
                }
            }
            
        }
        if(countFound==countChecked){
            item.style.display="block";
        }else{
            item.style.display="none";
        }
    }
}