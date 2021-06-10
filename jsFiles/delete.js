//if modules already exists use it otherwise create new modules object.
var modules = modules || {};

modules.delete = (function () {
    'use strict';

    var deleteBox = $('#deleteModal'), //this is the modal that the actuall delte will work in.
        deleteParagraph = $('#deleteBody'),
        confirmDelete = $('#confirmDelete');


    function show(itemElement, alertDiv, alertRow) {
        var id = itemElement.find('.id').text(), //gets the id of this element.
            name = itemElement.find('.itemName').text(),
            stock = itemElement.find('.itemAmount').text(),
            //string will be main body of modal.
            string = 'ID: &nbsp;' + id + ', "' + name +
                '" (' + ' in stock: ' + stock + ' )';
        deleteParagraph.html(string);
        deleteBox.modal("toggle");//displays the modal.
        confirmDelete.off('click'); //ensures that any id that was set to delete button will be removed, necessary if someone cancels his deletion.
        confirmDelete.on('click', function () {
            //sends item's id to delete, if successfull will remove from list if not will retrieve the error from the back-end and display it.
            $.post("models/deleteModel.php", { delete: id }, function () {
                itemElement.remove();
            }).fail(function (jqxhr) {
                var response = jqxhr.responseText;
                alert = $('<div>' +
                    '<strong>Error! </strong>' + response + '</div>'
                ).appendTo(alertDiv);
                if (alertRow.is(":hidden")) {
                    alertRow.toggle();
                }
            });
        });

    }
    return {
        show: show
    };

}());