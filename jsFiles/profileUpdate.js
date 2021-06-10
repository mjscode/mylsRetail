var modules = modules || {};

modules.profileUpdate = (function () {
    // the information displayed.
    var nameText = $('#nameSlot'),
        userName = $('#userName').html(),
        emailText = $('#emailSlot'),
        // the update form.
        nameInput = $('#nameInput'),
        emailInput = $('#emailInput');

    //this function will change the info displayed, makes it a large font with green color temporaly.
    function updateInfo(element, info) {
        var oldStyle = element.css('color'),
            oldFont = element.css('font-size'),
            oldBackground = element.css('background-color');
        window.setTimeout(function () {
            element.css({
                'color': oldStyle, 'font-size': oldFont
            });
        }, 1000);
        element.css({ 'color': '#4faf54', 'font-size': '20px' });
        element.html(info);
    }
    //checks if object has a property.
    function isNotEmpty(obj) {
        for (var prop in obj) {
            return true;
        }
        return false;
    }

    function update(alertDiv, alertRow) {
        var oldName = nameText.html(),
            oldEmail = emailText.html(),
            newName = nameInput.val(),
            newEmail = emailInput.val(),
            updates = {};
        //checks to see if anything updated.
        if (oldName !== newName) {
            updates.name = newName;
        }
        if (oldEmail !== newEmail) {
            updates.email = newEmail;

        }
        //if there were updates.
        if (isNotEmpty(updates)) {
            // in the users table username is the id.
            updates.userName = userName;
            //takes update object turns it into a json string and sends it to be updated.
            $.post("models/profileUpdate.php", JSON.stringify(updates),
                function () {
                    if ('name' in updates) {
                        updateInfo(nameText, newName);
                    }
                    if ('email' in updates) {
                        updateInfo(emailText, newEmail);
                    }
                }).fail(function (jqxhr) {
                    var response = jqxhr.responseText;
                    alert = $('<div>' +
                        '<strong>Error! </strong>' + response + '</div>'
                    ).appendTo(alertDiv);
                    if (alertRow.is(":hidden")) {
                        alertRow.toggle();
                    }
                });

        }
    }

    return {
        update: update
    };

}());