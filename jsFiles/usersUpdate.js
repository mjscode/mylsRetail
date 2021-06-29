var modules = modules || {};

modules.usersUpdate = (function () {
    'use strict';
    var usersName = $('#usersName'),
        confirm = $('#confirmUpgrade'),
        upgradeModal = $('#upgradeModal');

    function upgrade(element, alertDiv, alertRow) {
        var username = element.find('.username').html(),
            status = element.find('.status');
        console.log(username);
        upgradeModal.modal('toggle');
        usersName.html(username);
        confirm.off('click');
        confirm.on('click', function (event) {
            $.post('admin/userUpgrade', { username: username }, function () {
                status.html('Aministrator');
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
        upgrade: upgrade
    };


}());