$(function () {
    $('#modalButton').click(function () {
        $('#create-modal')
            .modal('show')
            .find('#createModalContent')
            .load($(this).attr('value'));
    });
});