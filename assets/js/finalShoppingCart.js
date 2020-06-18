if (!sessionStorage.hasItem('shopping-cart')) {
    return;
}

const storage = sessionStorage.getItem('shopping-cart');
const shoppingCartMap = new Map(JSON.parse(storage));

let cart = document.getElementsByClassName('shopping-cart');


for (const [id, stuff] of shoppingCartMap.entries()) {
    let cardDiv = document.createElement('div');
    let farmName = document.createElement('farmname');
    let amount = document.createElement('amount');
    let unitPrice = document.createElement('unitPrice')

    cardDiv.value = stuff.name;
    farmName.value = stuff.farmName;
    amount.value = stuff.amount;
    unitPrice.value = stuff.unitPrice;


    cardDiv.appendChild(farmName);
    cardDiv.appendChild(amount);
    cardDiv.appendChild(unitPrice);

}