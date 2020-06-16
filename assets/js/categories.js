




for (const element of document.getElementsByClassName('category')) {
    element.addEventListener('click', function() {
        const category = element.innerHTML;

        const xhr = new XMLHttpRequest();
        xhr.open('POST', '/api/v1/filter');
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.onload = function() {
            console.log(xhr.responseText);
            const products = document.getElementsByClassName('products')[0];
            products.innerHTML="";
        };
        xhr.send(`category=${category}`);
            })
}