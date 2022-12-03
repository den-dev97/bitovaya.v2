
$.get("/ajax/checkcookie.php", function (cart) {
        $('#cart').html('(' + cart + ')');
    }
)

$(document).on('click', '.ajx', function () {
    let id = $(this).attr('data-id');
    let url = "/ajax/delcookie.php?id=" + id;
    let price = $(this).parent().parent().find('.price').text();
    let count = $(this).parent().parent().find('.count').text();
    let amount = $('.amount').text();
    let newAmount = amount - price * count;
    $(this).parent().parent().fadeOut(500, function () {
        $.get(url,
            function (cart) {
                $('#cart').html('(' + cart + ')')
                $('.amount').html(newAmount);
            }
        );
        $(this).remove();
    })

})

$('#popup').on('click', function () {
    $('.modal').addClass('is-active');
    $('#f_amount').html($('.amount').html() + ' &#8381;')
    $count = 0;
    $('.count').each(function () {
        $count += parseInt($(this).text());
    })
    $('#f_count').html($count);
    $('form').append(`<input type="hidden" name="amount" value="${$('.amount').html()}">`);
})

$('.modal-close').on('click', function () {
    $('.modal').removeClass('is-active');
})