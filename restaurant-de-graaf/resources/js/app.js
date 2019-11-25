$('.reservation__alert-close').on('click', function() {
    $('.reservation__alert').addClass('reservation__alert--dismissed');
});

$('.profiel__remove-account-button').on('click', function() {
    let id = $(this).attr('data-id');

    if(id) {
        $('.profiel__remove-modal[data-id="' + id + '"]').addClass('profiel__remove-modal--active');
        $('.profiel__remove-modal-background[data-id="' + id + '"]').addClass('profiel__remove-modal-background--active');
    } else {
        $('.profiel__remove-modal').addClass('profiel__remove-modal--active');
        $('.profiel__remove-modal-background').addClass('profiel__remove-modal-background--active');
    }

    $('body').addClass('body--noscroll ');
});

$('.profiel__remove-modal-disable').on('click', function() {
    $('.profiel__remove-modal').removeClass('profiel__remove-modal--active');
    $('.profiel__remove-modal-background').removeClass('profiel__remove-modal-background--active');
    $('body').removeClass('body--noscroll');
});

$('.hamburger').on('click', function() {
    $(this).toggleClass('hamburger--active');
});
