function onSuccess(googleUser) {
    const idToken = googleUser.getAuthResponse().id_token;

    const xhr = new XMLHttpRequest();
    xhr.open('POST', '/tokensignin');
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.onload = function () {
        console.log(`Signed in as: ${xhr.responseText}`);
    };
    xhr.send(`idtoken=${idToken}`);
}

function onFailure(error) {
    console.error(error);
}

function renderButton() {
    gapi.signin2.render('custom-g-signin2', {
        scope: 'profile email openid',
        width: 240,
        height: 50,
        longtitle: true,
        theme: 'dark',
        onsuccess: onSuccess,
        onfailure: onFailure
    });
}

function signOut() {
    const auth2 = gapi.auth2.getAuthInstance();
    auth2.signOut().then(() => {
        console.log('User signed out.');
    })
        .catch(e => console.error(e));
}