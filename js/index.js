

function parseCredentialsTable() {

}

function loadAllCredentials() {
    $.get('api/credentials', function(data) {
        console.log(data);
    })
}

function loadFilteredCredentials() {

}