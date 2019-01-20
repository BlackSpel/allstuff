/* Filter */
$('body').on('change', '.w_sidebar input', function()
{
    var checked = $('.w_sidebar input:checked'),
        data = '';
    checked.each(function () {
        data += this.value + ',';
    });
    if(data)
    {
        $.ajax({
            url: location.href,
            data: {filter: data},
            type: 'GET',
            beforeSend: function () {
                $('.preloader').fadeIn(300, function () {
                    $('.product-one').hide();
                })
            },
            success: function (res) {
                $('.preloader').delay(500).fadeOut('slow', function() {
                    $('.product-one').html(res).fadeIn();
                    var url = location.search.replace(/filter(.+?)(&|$)/g, ''); //$2
                    var newURL = location.pathname + url + (location.search ? "&" : "?") + "filter=" + data;
                    newURL = newURL.replace('&&', '&');
                    newURL = newURL.replace('?&', '?');
                    history.pushState({}, '', newURL);
                });
            },
            error: function () {
                alert('Error');
            }
        });
    }
    else
    {
        window.location = location.pathname;
    }
});

/* Search */
var products = new Bloodhound({
    datumTokenizer: Bloodhound.tokenizers.whitespace,
    queryTokenizer: Bloodhound.tokenizers.whitespace,
    remote: {
        wildcard: '%QUERY',
        url: path + '/search/typeahead?query=%QUERY'
    }
});

products.initialize();

$("#typeahead").typeahead({
    hint: false,
    highlight: true
},{
    name: 'products',
    display: 'title',
    limit: 10,
    source: products
});

$('#typeahead').bind('typeahead:select', function(ev, suggestion) {
    window.location = '/search/?s=' + encodeURIComponent(suggestion.title);
});

/* Cart */
$('body').on('click', '.add-to-cart-link', function (e) {
    e.preventDefault();
    var id = $(this).data('id');
        qty = $('input.count-single').val() ? $('input.count-single').val() : 1,
        mod = $('select.image-picker').val();
    $.ajax({
        url: '/cart/add',
        data: {id: id, qty: qty, mod: mod},
        type: 'GET',
        success: function(res) {
            showCart(res);
        },
        error: function() {
            alert('Error! Try again.');
        }
    });
});

$('#cart .modal-body').on('click', '.del-item', function(){
    var id = $(this).data('id');
    $.ajax({
        url: '/cart/delete',
        data: {id: id},
        type: 'GET',
        success: function (res) {
            showCart(res);
        },
        error: function () {
            alert('Error');
        }
    });
    return false;
});

function showCart(cart){
    if($.trim(cart) == '<h3>Cart is empty.</h3>'){
        $('#cart .modal-footer a, #cart .modal-footer .btn-danger').css('display', 'none');
    }
    else{
        $('#cart .modal-footer a, #cart .modal-footer .btn-danger').css('display', 'inline-block');
    }
    $('#cart .modal-body').html(cart);
    $('#cart').modal();
    if($('.cart-sum').text()){
        $('.simpleCart_total').html($('#cart .cart-sum').text());
    }
    else{
        $('.simpleCart_total').text('Empty Cart')
    }
}

function getCart(){
    $.ajax({
        url: '/cart/show',
        type: 'GET',
        success: function(res) {
            showCart(res);
        },
        error: function() {
            alert('Error! Try again.');
        }
    });
}

function clearCart() {
    $.ajax({
        url: '/cart/clear',
        type: 'GET',
        success: function (res) {
            showCart(res);
        },
        error: function () {
            alert('Error');
        }
    });
}
/* Cart */

$('select.image-picker').on('change', function(){
    var modId = $(this).val();
        color = $(this).find('option').filter(':selected').data('title');
        price = $(this).find('option').filter(':selected').data('price');
        basePrice = $('#base-price').data('base');
        qty = $('input.count-single').val() ? $('input.count-single').val() : 1;
    if(price){
        $('#total-price').text(price * qty);
    }
    else{
        $('#total-price').text(basePrice * qty);
    }
});

$('body').on('click', '.qty_inp', function(e){
    var color = $('select.image-picker').find('option').filter(':selected').data('title');
        price = $('select.image-picker').find('option').filter(':selected').data('price');
        qty = $('input.count-single').val() ? $('input.count-single').val() : 1;
        basePrice = $('#base-price').data('base');
        result1 = (price * qty).toFixed(0);
        result2 = (basePrice * qty).toFixed(0);
    if(price){
        $('#total-price').text(result1);
    }
    else{
        $('#total-price').text(result2);
    }
});