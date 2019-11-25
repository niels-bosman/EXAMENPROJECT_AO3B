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
// ----------------------------------------------------------------------------------------------------
$('.profiel__block-account-button').on('click', function() {
    let id = $(this).attr('data-id');

    if(id) {
        $('.profiel__block-modal[data-id="' + id + '"]').addClass('profiel__block-modal--active');
        $('.profiel__block-modal-background[data-id="' + id + '"]').addClass('profiel__block-modal-background--active');
    } else {
        $('.profiel__block-modal').addClass('profiel__block-modal--active');
        $('.profiel__block-modal-background').addClass('profiel__block-modal-background--active');
    }

    $('body').addClass('body--noscroll ');
});

$('.profiel__block-modal-disable').on('click', function() {
    $('.profiel__block-modal').removeClass('profiel__block-modal--active');
    $('.profiel__block-modal-background').removeClass('profiel__block-modal-background--active');
    $('body').removeClass('body--noscroll');
});
