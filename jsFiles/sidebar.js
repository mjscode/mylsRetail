/*global $*/
//in a function so you can't acces variables from the browser.
(function () {
    'use strict';
    //button to hide alert box.
    var closeButton = $('#closeAlert');
    var alert = $('#alertBox');

    closeButton.click(function () {
        alert.toggle('slow');
    });
    //these will control the panel for credits
    var creditHead = $('#creditsHeading');
    var creditBody = $('#creditsBody');
    var creditButton = $('#creditsClose');

    creditHead.click(function () {
        creditBody.toggle('slow');
    });
    creditButton.click(function () {
        creditBody.toggle('slow');
    });
    //triggers the modal when page opens.
    $(document).ready(function () {

        $("#homeModal").modal("toggle");
        $("#infoB").click(function () {
            $("#homeModal").modal("toggle");
        });

    });
})();