for (const item of [document.getElementsByClassName('minus'), document.getElementsByClassName('plus')]) {
    for (const element of item) {
        element.addEventListener('click', function () {
            const input = Array.from(this.parentElement.childNodes).find(x => x.tagName === 'INPUT');
            if (Array.from(this.classList).includes('plus')) {
                input.value = Number(input.value) + 1;
            } else if (input.value > 0) {
                input.value = Number(input.value) - 1;
            }
        });
    }
}

let shoppingCartMap;

if (sessionStorage.getItem('shopping-cart')) {
    const storage = sessionStorage.getItem('shopping-cart');
    shoppingCartMap = new Map(JSON.parse(storage));
} else {
    shoppingCartMap = new Map();
}

// Kuna Map ise ei serialiseeru
shoppingCartMap.toJSON = function () {
    return [...shoppingCartMap.entries()];
};

for (const element of document.getElementsByClassName('add-to-cart')) {
    element.addEventListener('click', function () {
        const amountContainer = Array.from(this.parentElement.childNodes)
            .find(x => x.className === 'amount-container');
        const input = Array.from(amountContainer.childNodes)
            .find(x => x.tagName === 'INPUT');
        const id = this.getAttribute('data-id');
        const productName = Array.from(this.parentElement.childNodes)
            .find(x => x.tagName === 'H3');
        const price = Array.from(this.parentElement.childNodes)
            .find(x => x.className === 'price');
        const selection = Array.from(this.parentElement.childNodes)
            .find(x => x.className === 'farm-select');
        const farmSelection = selection.selectedIndex;
        const farmName = selection.selectedOptions[0].innerText;

        if (shoppingCartMap.has(id)) {
            const existingValue = shoppingCartMap.get(id).amount;
            shoppingCartMap.set(id, {
                name: productName.innerText,
                amount: existingValue + Number(input.value),
                selection: farmSelection,
                unitPrice: price.innerText,
                farmName
            });
        } else {
            shoppingCartMap.set(id, {
                name: productName.innerText,
                amount: Number(input.value),
                selection: farmSelection,
                unitPrice: price.innerText,
                farmName
            });
        }
        console.log(shoppingCartMap);

        sessionStorage.setItem('shopping-cart', JSON.stringify(shoppingCartMap));
    });
}