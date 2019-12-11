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
$('.hamburger').on('click', function() {
    $(this).toggleClass('hamburger--active');
});

$('.toggleStars').on('click', function() {
    let value = $(this).attr('data-value');
    let string;

    $('#stars').val(value * 2);

    if (value * 2 === 1) {
        $('#star1').removeClass('far fa-star');
        $('#star1').addClass('fas fa-star-half-alt');

        // Haal hogere weg
        $('#star2').removeClass('fas far fa-star-half-alt fa-star');
        $('#star2').addClass('far fa-star');
        $('#star3').removeClass('fas far fa-star-half-alt fa-star');
        $('#star3').addClass('far fa-star');
        $('#star4').removeClass('fas far fa-star-half-alt fa-star');
        $('#star4').addClass('far fa-star');
        $('#star5').removeClass('fas far fa-star-half-alt fa-star');
        $('#star5').addClass('far fa-star');
    }  else if(value * 2 === 2) {
        $('#star1').removeClass('fas far fa-star-half-alt fa-star');
        $('#star1').addClass('fas fa-star');

        // Haal hogere weg
        $('#star2').removeClass('fas far fa-star-half-alt fa-star');
        $('#star2').addClass('far fa-star');
        $('#star3').removeClass('fas far fa-star-half-alt fa-star');
        $('#star3').addClass('far fa-star');
        $('#star4').removeClass('fas far fa-star-half-alt fa-star');
        $('#star4').addClass('far fa-star');
        $('#star5').removeClass('fas far fa-star-half-alt fa-star');
        $('#star5').addClass('far fa-star');
    } else if(value * 2 === 3) {
        $('#star2').removeClass('far fa-star');
        $('#star2').addClass('fas fa-star-half-alt');

        // Haal hogere weg
        $('#star3').removeClass('fas far fa-star-half-alt fa-star');
        $('#star3').addClass('far fa-star');
        $('#star4').removeClass('fas far fa-star-half-alt fa-star');
        $('#star4').addClass('far fa-star');
        $('#star5').removeClass('fas far fa-star-half-alt fa-star');
        $('#star5').addClass('far fa-star');

        // Voeg lagere toe
        $('#star1').removeClass('fas far fa-star-half-alt fa-star');

        $('#star1').addClass('fas fa-star');
    } else if(value * 2 === 4) {
        $('#star2').removeClass('fas far fa-star-half-alt fa-star');
        $('#star2').addClass('fas fa-star');

        // Haal hogere weg
        $('#star3').removeClass('fas far fa-star-half-alt fa-star');
        $('#star3').addClass('far fa-star');
        $('#star4').removeClass('fas far fa-star-half-alt fa-star');
        $('#star4').addClass('far fa-star');
        $('#star5').removeClass('fas far fa-star-half-alt fa-star');
        $('#star5').addClass('far fa-star');

        // Voeg lagere toe
        $('#star1').removeClass('fas far fa-star-half-alt fa-star');

        $('#star1').addClass('fas fa-star');
    } else if(value * 2 === 5) {
        $('#star3').removeClass('far fa-star');
        $('#star3').addClass('fas fa-star-half-alt');

        // Haal hogere weg
        $('#star4').removeClass('fas far fa-star-half-alt fa-star');
        $('#star4').addClass('far fa-star');
        $('#star5').removeClass('fas far fa-star-half-alt fa-star');
        $('#star5').addClass('far fa-star');

        // Voeg lagere toe
        $('#star1').removeClass('fas far fa-star-half-alt fa-star');
        $('#star2').removeClass('fas far fa-star-half-alt fa-star');

        $('#star1').addClass('fas fa-star');
        $('#star2').addClass('fas fa-star');
    } else if(value * 2 === 6) {
        $('#star3').removeClass('fas far fa-star-half-alt fa-star');
        $('#star3').addClass('fas fa-star');

        // Haal hogere weg
        $('#star4').removeClass('fas far fa-star-half-alt fa-star');
        $('#star4').addClass('far fa-star');
        $('#star5').removeClass('fas far fa-star-half-alt fa-star');
        $('#star5').addClass('far fa-star');

        // Voeg lagere toe
        $('#star1').removeClass('fas far fa-star-half-alt fa-star');
        $('#star2').removeClass('fas far fa-star-half-alt fa-star');

        $('#star1').addClass('fas fa-star');
        $('#star2').addClass('fas fa-star');
    } else if(value * 2 === 7) {
        $('#star4').removeClass('fas far fa-star-half-alt fa-star');
        $('#star4').addClass('fas fa-star-half-alt');

        // Haal hogere weg
        $('#star5').removeClass('fas far fa-star-half-alt fa-star');
        $('#star5').addClass('far fa-star');

        // Voeg lagere toe
        $('#star1').removeClass('fas far fa-star-half-alt fa-star');
        $('#star2').removeClass('fas far fa-star-half-alt fa-star');
        $('#star3').removeClass('fas far fa-star-half-alt fa-star');

        $('#star1').addClass('fas fa-star');
        $('#star2').addClass('fas fa-star');
        $('#star3').addClass('fas fa-star');
    } else if(value * 2 === 8) {
        $('#star4').removeClass('fas far fa-star-half-alt fa-star');
        $('#star4').addClass('fas fa-star');

        // Haal hogere weg
        $('#star5').removeClass('fas far fa-star-half-alt fa-star');
        $('#star5').addClass('far fa-star');

        // Voeg lagere toe
        $('#star1').removeClass('fas far fa-star-half-alt fa-star');
        $('#star2').removeClass('fas far fa-star-half-alt fa-star');
        $('#star3').removeClass('fas far fa-star-half-alt fa-star');

        $('#star1').addClass('fas fa-star');
        $('#star2').addClass('fas fa-star');
        $('#star3').addClass('fas fa-star');
    } else if(value * 2 === 9) {
        $('#star5').removeClass('fas far fa-star-half-alt fa-star');
        $('#star5').addClass('fas fa-star-half-alt');

        // Voeg lagere toe
        $('#star1').removeClass('fas far fa-star-half-alt fa-star');
        $('#star2').removeClass('fas far fa-star-half-alt fa-star');
        $('#star3').removeClass('fas far fa-star-half-alt fa-star');
        $('#star4').removeClass('fas far fa-star-half-alt fa-star');

        $('#star1').addClass('fas fa-star');
        $('#star2').addClass('fas fa-star');
        $('#star3').addClass('fas fa-star');
        $('#star4').addClass('fas fa-star');
    } else if(value * 2 === 10) {
        $('#star5').removeClass('fas far fa-star-half-alt fa-star');
        $('#star5').addClass('fas fa-star');

        // Voeg lagere toe
        $('#star1').removeClass('fas far fa-star-half-alt fa-star');
        $('#star2').removeClass('fas far fa-star-half-alt fa-star');
        $('#star3').removeClass('fas far fa-star-half-alt fa-star');
        $('#star4').removeClass('fas far fa-star-half-alt fa-star');

        $('#star1').addClass('fas fa-star');
        $('#star2').addClass('fas fa-star');
        $('#star3').addClass('fas fa-star');
        $('#star4').addClass('fas fa-star');
    }

    $('.stars').html(string);
});
