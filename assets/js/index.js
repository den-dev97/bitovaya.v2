$.get("/ajax/checkcookie.php", function (cart){
    $('#cart').html('('+ cart + ')');
}
)

$('.menu-list a').on('click', function(){
let id = $(this).attr('data-cat');
let url = "/ajax/products.php?id=" + id;
$('#products').load(url);
})
//Делегирование
$(document).on('click', '.product', function(e){
e.preventDefault();
let id = $(this).attr('data-id');
let url = "/ajax/addcookie.php?id=" + id;
$.get(url, 
    function(cart){
        $('#cart').html('('+ cart + ')')
    }
);
})