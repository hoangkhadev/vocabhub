function handleShowHidePassword(element, input, hide, show) {
    $(element).on('click', function() {
        if($(input).attr('type') === 'password') {
            $(input).attr('type', 'text');
            $(hide).hide();
            $(show).show();
        } else {
            $(input).attr('type', 'password');
            $(show).hide();
            $(hide).show();
        }
    });
}