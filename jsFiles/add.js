modules = modules || {};

modules.add = (function () {
    'use strict';

    var addForm = $('#addForm'),//the form  
        confirmB = $('#confirmAdd'),
        addBox = $('#addModal'), //the modal    
        confirmation = $('#confirmModal'),
        confirmBody = $('#confirmBody');

    //will be used to display a second box that it's been added.
    function showConfirmation(name) {
        var paragraph = '<p>You have added Item <strong>' + name + ' </strong>successfully!</p>';
        confirmBody.html(paragraph);
        confirmation.modal('toggle');

    }
    function closeConfirmation() {
        confirmBody.empty();
    }



    function show(alertDiv, alertRow) {
        addBox.modal('toggle');

        var name = $('#addName').val(),
            unit = $('#addUnit').val(),
            price = $('#addPrice').val(),
            stock = $('#addStock').val() ? $('#addStock').val() : 0, //if no value replace with 0.
            categorySelected = $('#addCategory :selected'), //gets the selected category.
            selectedName = categorySelected.text(),
            selectedValue = categorySelected.val(),
            //this the list in the modal.
            nameSpan = $('#newName'),
            unitSpan = $('#newUnit'),
            priceSpan = $('#newPrice'),
            stockSpan = $('#newStock'),
            categorySpan = $('#newCategory');

        nameSpan.html(name);
        // if nothing entered default will be none enetered.
        unitSpan.html(unit ? unit : '<i>(none entered)</i>');
        priceSpan.html(price ? price : '<i>(none entered)</i>');
        stockSpan.html(stock);
        categorySpan.html(selectedName);
        confirmB.off('click');

        confirmB.on('click', function () {
            $.post("models/addItemModel.php", {
                name: name, unit: unit ? unit : ' ', //if nothing added than value will be a string wih a space.
                price: price ? price : ' ', stock: stock,
                category: selectedValue
            },
                function () {
                    showConfirmation(name);// calls confirmation modal.
                    addForm.trigger('reset');//resets form.

                }).fail(function (jqxhr) {
                    var response = jqxhr.responseText;
                    alert = $('<div>' +
                        '<strong>Error! </strong>' + response + '</div>'
                    ).appendTo(alertDiv);
                    if (alertRow.is(":hidden")) {
                        alertRow.toggle();
                    }

                });
            addBox.modal('toggle');
        });

    }
    return {
        show: show
    };

}());