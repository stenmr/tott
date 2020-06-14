function onSuccess(googleUser) {
    const idToken = googleUser.getAuthResponse().id_token;

    const xhr = new XMLHttpRequest();
    xhr.open('POST', '/api/v1/tokensignin');
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.onload = function () {
        console.log(`Signed in as: ${xhr.responseText}`);
    };
    xhr.send(`idtoken=${idToken}`);
}

function onFailure(error) {
    console.error(error);
}

function signOut() {
    const auth2 = gapi.auth2.getAuthInstance();
    auth2.signOut().then(() => {
        console.log('User signed out.');
    })
        .catch(e => console.error(e));
}