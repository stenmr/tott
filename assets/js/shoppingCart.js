for (const item of [document.getElementsByClassName('minus'), document.getElementsByClassName('plus')]) {
    for (const element of item) {
        element.addEventListener('click', function() {
            const input = Array.from(this.parentElement.childNodes).find(x => x.tagName == 'INPUT');
            if (Array.from(this.classList).includes('plus')) {
                input.value = Number(input.value) + 1;
            } else {
                if (input.value > 0) input.value = Number(input.value) - 1;
            }
        })
    }
}


for (const element of document.getElementsByClassName('add-to-cart')) {
    element.addEventListener('click', function() {
        const input = Array.from(this.parentElement.childNodes).find(x => x.tagName == 'INPUT');
        
    })
}