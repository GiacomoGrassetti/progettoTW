
    function getTotalWithSale(price, qnt, sale){
        sale = sale.toString().replace("%", "");
        let total = price * qnt;
        total = (total * sale) /100;
        document.write(total);
    }

    function getTotal(price, qnt){
        let total = price * qnt;
        document.write(total);
    }
