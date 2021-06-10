(function () {
    'use stricet';

    var sidebar = $('#info');
    var button = $('#infoButton');
    var header = $('#infoHeader');

    //the info box is closed either by clicking on info or the button.
    sidebar.toggle('slow');
    button.click(function () {
        sidebar.toggle('slow');
    });
    header.click(function () {
        sidebar.toggle('slow');
    });
    var closeButton = $('#closeAlert');
    var alert = $('#alertBox');

    closeButton.click(function () {
        alert.toggle('slow');
    });
}());