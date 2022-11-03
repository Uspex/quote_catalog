$(document).ready(function () {

    //покажем модельное окно share
    $("body").on('click', '.show_modal_share', function(e) {
        let modal = $(this).attr('data-modal');
        let object_id = $(this).attr('data-object-id');

        $(modal + ' .object_id').val(object_id);
        $(modal).modal();
    });


    $(document).on('submit', '.ajax_share_form', function(e) {
        e.preventDefault();
        sendNotification($(this))
    });

    //ajax отправка формы
    function sendNotification( data_this){
        let ajax_form_action = data_this.prop('action');
        let ajax_form_method = data_this.prop('method');

        let data = data_this.serialize();

        $.ajax({
            url:    ajax_form_action,
            type:   ajax_form_method,
            data:   data,
            success: function(result){
                console.log(result)
                $('.modal').modal('hide');

                $('#modal_success .text_message').text(result.message);
                $('#modal_success').modal();
            },
            error: function(result){
                console.log('ajax_form Ошибка AJAX');
                console.log(result);

                $('#modal_error .text_message').text(result.message);
                $('#modal_error').modal();
            }
        });
    }
});
