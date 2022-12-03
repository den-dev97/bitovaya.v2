$.get("/ajax/checkcookie.php", function (cart) {
        $('#cart').html('(' + cart + ')');
    }
)
