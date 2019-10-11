$(document).ready(function() {
    $('#pessoa').DataTable( {
        "aaSorting": [[ 3, "asc" ]],
        "bPaginate": true,
        "bFilter": true,
        "sType": "brazilian",
        "aoColumns": [
            { "sType": 'text' },
            { "sType": 'text' },
            { "sType": 'text' },
            { "sType": 'text' },
            { "sType": 'text' },
            null
        ]
    });

} );