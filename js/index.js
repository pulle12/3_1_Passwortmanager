$(document).ready(function() {
    $('#btnSearch').click(function() {
        loadFilteredCredentials();
    });

    $('#btnClear').click(function() {
        $("#filter").val("");
        loadAllCredentials();
    });

    $('#filter').keypress(function(e) {
        if(e.which == 13) {
            loadFilteredCredentials();
        }
    });
});

function parseCredentialsTable() {

}

function loadAllCredentials() {
    $.get('api/credentials', function(data) {
        console.log(data);
    })
}

function loadFilteredCredentials() {
    var filter = $('#filter').val();

    if(filter == "") {
        loadAllCredentials();
    } else {
        $.get('api/credentials/search/' + filter, function(data) {
            console.log(data);
        })
    }
}