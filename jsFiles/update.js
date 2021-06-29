var modules = modules || {};

modules.update = (function () {
    'use strict';
    //this update is used for items as opposed to profileUpdate, and upgrade which is to grant users admin status.
    var updateBox = $('#updateModal'),
        header = $('#update-title'),
        item_name = $('.item_name'),
        updateBody = $('#updateBody'),
        upButtons = $('#upButtons'), //this button will be used to update and 
        updateBottom = $('#modal-bottom');

    function show(itemElement, alertDiv, alertRow) {

        header.html('Use the form below to update information on this item:');
        upButtons.html('Update'); //button is now update.
        var id = itemElement.find('.id').text(),
            name = itemElement.find('.itemName').text(),
            unit = itemElement.find('.itemUnit'),
            price = itemElement.find('.itemPrice'),
            stock = itemElement.find('.itemAmount'),
            old_unit = unit.text(),
            old_price = price.text(),
            old_stock = stock.text(),
            cancelUpdate = $('#cancelUpdate'),
            closeUpdate = $('#closeUpdate');

        updateBox.modal("toggle");
        item_name.html(name);
        var form = $('<form class="form-horizantal"> <label> unit: <input type="text" value="' + old_unit +
            '" id="updateUnit"></label> <label>price: $<input min="0.00" type="number" value=' + old_price +
            ' id="updatePrice"></label> <label>amount in stock:<input min="0" type="number" value=' +
            old_stock + ' id="updateStock"></label></form > '
        );
        updateBody.html(form);
        upButtons.off('click');
        upButtons.on('click', function (event) {
            upButtons.html("Confirm"); //changes button to confirm will later get a new event.
            //the list if no value will display default values.
            var new_unit = form.find('#updateUnit').val() ? form.find('#updateUnit').val() : ' ',
                new_price = form.find('#updatePrice').val() ? form.find('#updatePrice').val() : 0.00,
                new_stock = form.find('#updateStock').val() ? form.find('#updateStock').val() : 0;

            header.html("You have made the following changes:");
            updateBody.empty();//emptys body as now the confirmation body will be added.
            var list = $('<ul></ul>').appendTo(updateBody);
            //a list of all the changes, checks if changes were done and then adds to the list.
            if (new_unit != old_unit) {
                $('<li> stock: from ' + old_unit + ' to ' + new_unit + '</li>'
                ).appendTo(list);
            }
            if (new_price != old_price) {
                $('<li> price: from ' + old_price + ' to ' + new_price + '</li>'
                ).appendTo(list);
            }
            if (new_stock != old_stock) {
                $('<li> amount in stock: from ' + old_stock + ' to ' + new_stock + '</li>'
                ).appendTo(list);
            }
            //if list empty, then there are no changes 
            if (!(list.children().length)) {
                updateBody.html('<p>You have not made any changes</p>');
                upButtons.click(function () {
                    updateBox.modal('toggle');

                });
            } else {
                //if there are changes...
                upButtons.off('click');
                upButtons.on('click', function (event) {
                    $.post("admin/updateItem",
                        {
                            updateId: id,
                            unit: new_unit,
                            price: new_price,
                            stock: new_stock
                        }
                        , function () {
                            //changes the list.
                            unit.html(new_unit);
                            price.html(new_price);
                            stock.html(new_stock);
                        }
                        ).fail(function (jqxhr) {
                            var response = jqxhr.responseText;
                            alert = $('<div>' +
                                '<strong>Error! </strong>' + response + '</div>'
                            ).appendTo(alertDiv);
                            if (alertRow.is(":hidden")) {
                                alertRow.toggle();
                            }
                        });
                    updateBox.modal('toggle');
                });
            }

        });
    }


    return {
        show: show
    };

}());