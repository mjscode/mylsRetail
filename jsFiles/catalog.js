/* public $ */
(function () {
    'use strict';

    var allBox = $('#allBox'), //all categories
        check = $('.checkB'),   //checkbox for categories
        radio = $('input[type=radio]'), //radios for sort
        checkSetting,
        alertRow = $('#alertRow'),
        alertDiv = $('#alerts'),
        closeButton = $('#closeAlert');

    //clicking on radio will not check it only reloading the page.
    radio.click(function (event) {
        event.preventDefault();
    });
    // if all box checked all categories will be checked automatically, but disabled.
    if (allBox.prop('checked')) {
        check.prop("disabled", true);
        check.prop("checked", true);
    }
    //checks status of all checkbox.
    allBox.on('change', function () {
        checkSetting = allBox.prop('checked');
        check.prop("disabled", checkSetting);
        check.prop("checked", checkSetting);
    });

    closeButton.click(function () {
        alertRow.toggle();
    });
    //gets the module for delete and applies it to delete button, alert elements are sent as well so the module will not have to create own vars.
    var deleteB = $(".deleteButton");

    deleteB.click(function (event) {
        var item = $(event.target).closest('.item');
        modules.delete.show(item, alertDiv, alertRow);
    });
    //for update
    var updateB = $(".updateButton");
    updateB.click(function (event) {
        var item = $(event.target).closest('.item');
        modules.update.show(item, alertDiv, alertRow);
    });

    //for adding
    var addForm = $("#addForm");

    addForm.on("submit", function (event) {
        modules.add.show(alertDiv, alertRow);
        event.preventDefault();
    });


}());
