$select = $('select', '#sorting');
$form = $('form#sorting');
url = "/ajax/filter.php";

$select.on('input', function(){
    /*let id = $(this).attr('data-cat');
    let url = "/ajax/products.php?id=" + id;
    $('#products').load(url);*/
    let post = {};
    $.each($select, function(){
        if($(this).val() !== ''){
            post[$(this).attr('name')] = $(this).val()
        }
    })
    $('#products').fadeOut(500, function(){
        $(this).empty().load(url, post).fadeIn(500);
    })
})