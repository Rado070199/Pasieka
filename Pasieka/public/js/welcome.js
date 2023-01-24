$(function() {
    $('div.products-count a').click(function(event) {
        event.preventDefault();
        $('a.products-actual-count').text($(this).text());
        getProducts($(this).text());
    });

    $('a#filter-button').click(function(event) {
        event.preventDefault();
        getProducts($('a.products-actual-count').first().text());
    });

    $('button.add-cart-button').click(function(event) {
        event.preventDefault();
            swal({
            title: "Czy napewno chcesz dodać produkt do koszyka?",
            icon: "warning",
            buttons: true,
            dangerMode: true,
            })
            .then((isConfirmed) => {
            if (isConfirmed) {
           
            $.ajax({
            method: "POST",
            url: WELCOME_DATA.addToCart + $(this).data("id")
            })
                .done(function() {
                     swal('ok')
                })
                .fail(function() {
                     swal('Coś poszło nie tak ');
                });
            }
         });
    });


    function getProducts(paginate) {
        const form = $('form.sidebar-filter').serialize();
        $.ajax({
            method: "GET",
            url: "/",
            data: form + "&" + $.param({paginate: paginate})
            })
            .done(function(response) {
                $('div#products-wrapper').empty();
                $.each(response.data, function(index, product) {
                    const html ='<div class="col-6 col-md-6 col-lg-4 mb-3">' +
                            '            <div class="card h-100 border-0">' +
                            '                <div class="card-img-top">' +
                            '                    <img src="' + getImage(product) + '" class="img-fluid mx-auto d-block" alt="Zdjęcie produktu">' +
                            '                </div>' +
                            '                <div class="card-body text-center">' +
                            '                    <h4 class="card-title">' +
                                                    product.name +
                            '                    </h4>' +
                            '                    <h5 class="card-price small">' +
                            '                        <i>PLN ' + product.price + '</i>' +
                            '                    </h5>' +
                            '                </div>' +
                            '            </div>' +
                            '        </div>';
                            $('div#products-wrapper').append(html);

                });
            })
    }

    function getImage(product) {
        if (!!product.image_path) {
            return WELCOME_DATA.storagePath + product.image_path;
        }
        return WELCOME_DATA.defaultImage;
    }
});
