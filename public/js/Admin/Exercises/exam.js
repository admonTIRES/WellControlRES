ID_EXAM_EXERCISE = 0
ID_QUESTION_EXERCISE = 0

$(document).ready(function() {
    // RESET MODALS
    $('#examModal').on('hidden.bs.modal', function() {
        ID_EXAM_EXERCISE = 0;
        $('#examForm')[0].reset();
        $('#examModal .modal-title').text('New exam');
    });

    $('#questionModal').on('hidden.bs.modal', function() {
        ID_QUESTION_EXERCISE = 0;
        $('#questionForm')[0].reset();
        $('#questionModal .modal-title').text('New question');
    });
    // RESET MODALS - END
});