/*global $*/
$(document).ready(function() {
    $('#btnSearch').click(function() {
        loadFilteredCredentials();
    });

    $('#btnClear').click(function() {
        $("#filter").val("");
        loadAllCredentials();
    });

    $('#filter').keypress(function(e) {
        if(e.which === 13) {
            loadFilteredCredentials();
        }
    });

    // Daten am Anfang immer nachladen
    loadAllCredentials();
});

function parseCredentialsTable(data) {
    var tmp = "";

    if(!data || data.length === 0) {
        return "<tr><td colspan='5' class='text-center'>Keine Einträge gefunden</td></tr>";
    }

    $.each(data, function(index, credentials) {
        tmp += "<tr>";
        tmp += "<td>" + escapeHtml(credentials.name) + "</td>";
        tmp += "<td>" + escapeHtml(credentials.domain) + "</td>";
        tmp += "<td>" + escapeHtml(credentials.cms_username) + "</td>";
        tmp += "<td>" + escapeHtml(credentials.cms_password) + "</td>";
        tmp += "<td>";
        tmp += '<a class="btn btn-info" href="index.php?r=credentials/view&id=' + credentials.id + '"><span class="glyphicon glyphicon-eye-open"></span></a>&nbsp;';
        tmp += '<a class="btn btn-primary" href="index.php?r=credentials/update&id=' + credentials.id + '"><span class="glyphicon glyphicon-pencil"></span></a>&nbsp;';
        tmp += '<a class="btn btn-danger" href="index.php?r=credentials/delete&id=' + credentials.id + '"><span class="glyphicon glyphicon-remove"></span></a>';
        tmp += "</td>";
        tmp += "</tr>";
    });

    return tmp;
}

function escapeHtml(text) {
    if(!text) return '';
    var map = {
        '&': '&amp;',
        '<': '&lt;',
        '>': '&gt;',
        '"': '&quot;',
        "'": '&#039;'
    };
    return text.toString().replace(/[&<>"']/g, function(m) { return map[m]; });
}

function loadAllCredentials() {
    $.get('api/credentials', function(data) {
        $('#credentials').html(parseCredentialsTable(data));
    }).fail(function(error) {
        console.error('Fehler beim Laden:', error);
        $('#credentials').html("<tr><td colspan='5' class='text-center alert alert-danger'>Fehler beim Laden der Daten!</td></tr>");
    });
}

function loadFilteredCredentials() {
    var filter = $('#filter').val();

    if(filter === "") {
        loadAllCredentials();
    } else {
        $.get('api/credentials/search/' + filter, function(data) {
            $('#credentials').html(parseCredentialsTable(data));
        }).fail(function(error) {
            console.error('Fehler beim Filtern:', error);
            $('#credentials').html("<tr><td colspan='5' class='text-center alert alert-danger'>Fehler beim Filtern!</td></tr>");
        });
    }
}