function send_ajax(url, method, send_data, settings_obj) {

    if (settings_obj.hasOwnProperty('abort') && settings_obj['abort'] == true) {
        if (typeof xhr != 'undefined' && xhr.readyState != 4) {
            xhr.abort();
        }
    }

    var async;

    if (settings_obj.hasOwnProperty('async') && settings_obj['async'] == 'false') {
        async = false;
    }

    xhr = $.ajax({
        url: url,
        type: method,
        data: send_data,
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        async: async,
        beforeSend: function () {

            if (settings_obj.hasOwnProperty('loader')) {
                $(settings_obj['loader']).show();
            }

            if (settings_obj.hasOwnProperty('beforsend')) {
                eval(settings_obj['beforsend']);
            }

            /*if (settings_obj.hasOwnProperty('show_loader')) {

                $(settings_obj['answer']).html("<div class='progress-container'><div class='progress'><div class='progress-bar'><div class='progress-shadow'></div></div></div></div>");
            }*/
        },

        complete: function () {

            if (settings_obj.hasOwnProperty('loader')) {
                $(settings_obj['loader']).hide();
            }

            if (settings_obj.hasOwnProperty('complete')) {
                eval(settings_obj['complete']);
            }
        },
        success: function (data) {


            if (settings_obj.hasOwnProperty('handler')) {
                data = JSON.stringify(data);
                data = eval(settings_obj['handler'] + '(' + data + ')');
            }

            if (settings_obj.hasOwnProperty('answer')) {
                $(settings_obj['answer']).html(data);
                $(settings_obj['answer']).show();
            }

            if (settings_obj.hasOwnProperty('success')) {
                eval(settings_obj['success']);
            }
        }
    });

}

$(document).ready(function () {
    getNewMessaages();
})

$('.chat_list').on('click',function(){
    $('.active_chat').removeClass('active_chat');
    $(this).addClass('active_chat');

    let id = $(this).attr('data-id');
    let url = 'getMessages/' + id;
    send_ajax(url, 'GET', false, {'answer':'.msg_history', 'complete':'$(\'.msg_history\').scrollTop($(\'.msg_history\').prop("scrollHeight"));'});

});


$('.msg_send_btn').on('click', function (e) {
    e.preventDefault();

    let sms = $('.write_msg').val();
    let receiver = $('.active_chat').attr('data-id');
    if(sms != ''){
        send_ajax('sendMessage', 'POST', {sms:sms, receiver:receiver}, {'handler':'message_sent_handler', 'complete':'$(\'.msg_history\').scrollTop($(\'.msg_history\').prop("scrollHeight"));'})
    }
});

function message_sent_handler(response) {
    if(response.error == undefined) {
        $('.msg_history').append(response);
        $('.write_msg').val('');

    }else {
        console.log(response.error);
    }
}

function getNewMessaages() {
    send_ajax('getNewMessages', 'GET', {}, {'handler': 'new_message_handler'} )
}

var intervalId = window.setInterval(function(){
    getNewMessaages()
}, 5000);

function new_message_handler(response) {

    if(!jQuery.isEmptyObject(response)) {
        $.each(response, function (user_id, count) {
            let chat_element = $(".inbox_chat").find(`[data-id='${user_id}']`);
            chat_element.find('.chat_ib').find('p').remove();
            let chat_element_clone = chat_element.clone();
            chat_element.remove();
            chat_element_clone.find('.chat_ib').append('<p>Новые сообщения:'+count+'</p>')
            $('.inbox_chat').prepend(chat_element_clone);
        })
    }
}