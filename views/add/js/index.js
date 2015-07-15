$(document).ready(function () {
    var Add = {
        init: function () {
            this.deletePhoto();
            this.changeComment();
            this.closeMessage();
        },
        closeMessage: function () {
            $('#message .close').click(function () {
                $('#message').fadeOut(200);
            });
        },
        message: function (text) {
            $('#message').fadeIn(200);
            $('#message .text').text(text);
        },
        changeComment: function () {
            $('#editPhoto .item .change').click(function () {
                $.post('/add/comment', {id: $(this).attr('href'), comment: $('#newcomment-' + $(this).attr('href')).val()}, function (data) {
                    Add.message(data);
                });
                return false;
            });
        },
        deletePhoto: function () {
            $('#editPhoto .item .delete').click(function () {
                $.post('/add/delete', {id: $(this).attr('href')}, function (data) {
                    if (data) {
                        Add.message(data);
                    } else {
                        location.reload();
                    }
                });
                return false;
            });
        }
    };
    Add.init();
});