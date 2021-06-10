/* public $ */
(function () {
    'use strict';
    var form = $('#profileForm'),
        alertRow = $('#alertRow'),
        alertDiv = $('#alerts'),
        closeButton = $('#closeAlert'),
        upgrade = $('.upgrade');

    closeButton.click(function () {
        alertRow.toggle();
    });
    //for the profile update.
    form.on('submit', function (event) {
        event.preventDefault();
        modules.profileUpdate.update(alertRow, alertDiv);

    });
    //for the user upgrade.
    upgrade.click(function (event) {
        var user = $(event.target).closest('.user');
        modules.usersUpdate.upgrade(user, alertDiv, alertRow);
    });
}());