ID_KILLSHEET_EXERCISE = 0

$(document).ready(function() {
    // RESET MODALS
    $('#killsheetModal').on('hidden.bs.modal', function() {
        ID_KILLSHEET_EXERCISE = 0;
        $('#killsheetForm')[0].reset();
        $('#killsheetModal .modal-title').text('New kilsheet');
    });
    // RESET MODALS - END
});
