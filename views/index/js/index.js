$(document).ready(function () {
    var Gallery = {
        init: function () {
            this.carousel();
            this.photo();
            this.closePhoto();
            this.sort();
        },
        carousel: function () {
            $('#owl-demo').owlCarousel({
                navigation: false,
                slideSpeed: 300,
                paginationSpeed: 400,
                items: 1,
                itemsDesktop: false,
                itemsDesktopSmall: false,
                itemsTablet: false,
                itemsMobile: false
            });
        },
        sort: function () {
            $('#sort').change(function () {
                location.href = '/index/run/' + $(this).val();
            });
        },
        photo: function () {
            $('#photos .allPhotos .item a').click(function () {
                $.post($(this).attr('href'), true, function (data) {
                    if (data) {
                        var result = eval(data);
                        $('#black').fadeIn(200);
                        $('#black .item').html('<img src="/public/photos/' + result[1] + '">');
                        $('#black .comment .text').html(result[2]);
                        $('#black .comment .info').html('Добавлено ' + result[3]);
                    }
                });
                return false;
            });
        },
        closePhoto: function () {
            $('#black .close').click(function () {
                $('#black').fadeOut(200);
            });
        }
    };
    Gallery.init();
});