// jQuery( function( $ ) {
// // асинхронный запрос при отправке формы
// $( '#ajaxform' ).submit( function( event ) {
//     event.preventDefault();

//     const form = $(this);

    
//     $.ajax({
//         type: 'POST',
//         url: woocommerce_params.ajax_url,
//         data: form.serialize(),
//         beforeSend : function( xhr ) {
// 				// отображаем прелоадер и блокируем клик по фильтр в момент, когда он загружается
// 				$( '.catalog__items' ).block({
// 					message : null,
// 					overlayCSS: {
//             background: 'var(--white-light) url( ' + window.location.protocol + '//' + window.location.hostname + '/wp-content/themes/woocommerce-course/assets/img/oval.svg) center 150px no-repeat',
//             opacity: 0.6
//             }

//             })
//         },
//         success: function (data) {
//             $('.catalog__list').html(data.products);
//             console.log('успех AJAX');
//             // $( '.page-pagination-wrapper' ).html( '' ); // подставить свой элемент
//             console.log('ответ сервера:', data);
//             $( '.catalog__items' ).unblock();
//         }
//     });
    
// } );

// $('.catalog-filters-new__apply').on('click', function (e) {
//     e.preventDefault();
//     $('#ajaxform').submit(); 
// });

// $('.catalog-filters-new__reset').on('click', function (e) {
//     e.preventDefault();
    
//     $('#ajaxform')[0].reset();

//     $('#ajaxform').submit();
// });
// } );

jQuery(function($){

    function sendAjax(form, append = false) {

        $.ajax({
            type: 'POST',
            url: woocommerce_params.ajax_url,
            data: form.serialize(),
            beforeSend: function() {
                if (!append) {
                    $('.catalog__items').block({
                        message: null,
                        overlayCSS: {
                            background: 'rgba(255,255,255,0.6)',
                            opacity: 0.6
                        }
                    });
                }
            },
            success: function(data) {

                if (append) {
                    $('.catalog__list').append(data.products);
                } else {
                    $('.catalog__list').html(data.products);
                    $('#page').val(1);
                }

                if (data.count && data.count.length > 0) {
                    $('.catalog__count').text(data.count).show();
                } else {
                    $('.catalog__count').hide();
                }

                if (data.pagination) {
                    $('.pagination').replaceWith(data.pagination);
                } else {
                    $('.pagination').hide();
                }

                if (data.no_more) {
                    $('.btn-show-more').hide();
                } else {
                    $('.btn-show-more').show();
                }

                $('.catalog__items').unblock();
            }
        });
    }


    $('#ajaxform').on('submit', function(e){
        e.preventDefault();
        sendAjax($(this));
    });

    $('.catalog-filters-new__apply').on('click', function(){
        $('#ajaxform').submit();
    });

    $('.catalog-filters-new__reset').on('click', function(){
        $('#ajaxform')[0].reset();
        $('#ajaxform').submit();
    });


    $('#ajaxform-mobile').on('submit', function(e){
        e.preventDefault();
        sendAjax($(this));
    });

    $('.catalog-filters__apply').on('click', function(){
        $('#ajaxform-mobile').submit();
    });

    $('.catalog-filters__reset').on('click', function(){
        $('#ajaxform-mobile')[0].reset();
        $('#ajaxform-mobile').submit();
    });

    $('.custom-dropdown[data-name="orderby"] .dropdown-option').on('click', function () {
        const value = $(this).data('value');      
        const text  = $(this).text().trim();      

        $('#orderby').val(value);

        $(this)
            .closest('.custom-dropdown')
            .find('.dropdown-selected span')
            .text(text)
            .attr('data-value', value);

        $('#ajaxform').submit();
    });

    $('.custom-dropdown[data-name="pageSize3"] .dropdown-option').on('click', function () {
        const value = $(this).data('value');

        $('#per_page').val(value);

        $(this)
            .closest('.custom-dropdown')
            .find('.dropdown-selected span')
            .text(value);

        $('#ajaxform').submit();
    });

    $('.btn-show-more').on('click', function () {
        let page = parseInt($('#page').val(), 10);
        page++;
        $('#page').val(page);

        sendAjax($('#ajaxform'), true); 
    });

    $(document).on('click', '.pagination__link', function(e) {
        e.preventDefault();
        let page = $(this).data('page');
        $('#page').val(page);
        sendAjax($('#ajaxform'));
    });

    $(document).on('click', '.pagination__arrow', function(e) {
        if ($(this).is('[disabled]')) return;
        let page = $(this).data('page');
        $('#page').val(page);
        sendAjax($('#ajaxform'));
    });
        
});


