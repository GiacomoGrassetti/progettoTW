
    function getTotalWithSale(price, qnt, sale, id){
        sale = sale.toString().replace("%", "");
        let total = price * qnt;
        total = (total * sale) /100;
        document.write("<span id=tot_"+id+">"+total+"</span>");
    }

    function getTotal(price, qnt, id){
        let total = price * qnt;
        document.write("<span id=tot_"+id+">"+total+"</span>");
    }
