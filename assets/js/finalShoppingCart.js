(function() {
    if (!sessionStorage.getItem('shopping-cart')) {
        return;
    }
    
    const storage = sessionStorage.getItem('shopping-cart');
    const shoppingCartMap = new Map(JSON.parse(storage));
    
    const cart = document.getElementsByClassName('items_basket')[0];
    
    for (const [id, stuff] of shoppingCartMap.entries()) {

        const cardDiv = document.createElement('div');
        cardDiv.classList.add('product-card');

        const productName = document.createElement('h3');

        const farmName = document.createElement('div');
        const amount = document.createElement('div');
    
        productName.innerText = stuff.name;
        farmName.innerText = stuff.farmName;
        amount.innerText = stuff.amount + " x " + stuff.unitPrice;
    
        cardDiv.appendChild(productName);
        cardDiv.appendChild(farmName);
        cardDiv.appendChild(amount);
        cart.appendChild(cardDiv);
    }

    
})();

