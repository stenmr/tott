if (!sessionStorage.hasItem('shopping-cart')) {
    return;
}

const storage = sessionStorage.getItem('shopping-cart');
const shoppingCartMap = new Map(JSON.parse(storage));

for (const [id, stuff] of shoppingCartMap.entries()) {

}