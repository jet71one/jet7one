//Send ajax request
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
function send_sms(sms)
{
    send_ajax('/message/send', 'POST', {message:sms}, {'handler': 'send_message_handler'} )
}
function send_message_handler(response) {
    if(response.success == 1) {

        let sms = response.message;

        if(!$('body').hasClass('popup_opened')) {
            $('body').addClass('popup_opened');
            $('.chat-container').trigger('open');
        }

        $('.chat-body').append('<div class="outgoing"> <div class="bubble"> <p>' + sms +'</p></div></div>')
        scrollChatButtom()
    }else {
        if(response.code == 401) {
            window.location.href = base_url + '/login'
        }
    }
}

function new_message_handler(response) {
    if (response.hasNew == 1) {
        $.each(response.messages, function (key, message) {
            $('.chat-body').append('<div class="incoming"> <div class="bubble"> <p>'+ message.message +'</p></div></div>');
        })
    }
}

function scrollChatButtom() {
    $('.chat-body').scrollTop($('.chat-body').prop("scrollHeight"))
}

function get_all_message_handler(response) {
    if(typeof response.error == 'undefined') {

        $.each(response, function (key, message) {

            let divClass = (message.user_id == id) ? "outgoing" : "incoming";
            $('.chat-body').append('<div class="' + divClass + '"><div class="bubble"><p>'+ message.message+'</p></div></div>');
            scrollChatButtom();
        })
    }
}


function getAllMessages(){
    send_ajax('/message/getAll', 'GET', {}, {'handler' : 'get_all_message_handler'})
}

if (!guest) {
    var intervalId = window.setInterval(function(){
        send_ajax('/message/getNew', 'GET', {}, {'handler': 'new_message_handler'} )
    }, 5000);
}



$(document).ready(function () {
    
    $('.contact_btn').click(function(e){
        eraseCookie('region_name');
        eraseCookie('region_url');
        setCookie('region_name', $('.header__title').html());
        setCookie('region_url', window.location);
    });
    
    $(document).on('click', '#search_button', function () {

    });

    if(!guest && id != 1) {
        getAllMessages();
    }

    $('.chat-container').on('open', function () {
        if (!guest) {
            send_ajax('/message/makeAllSeen', 'POST', {}, {'handler': ''} )
        }
    });

    //open chat
    $('.chat_btn').click(function (e) {
        e.preventDefault();
        $('body').addClass('popup_opened');
        $('.chat-container').trigger('open');
    });

    //Close btn
    $('.close_btn').click(function (e) {
        e.preventDefault();
        $('body').removeClass('popup_opened');
        $('.chat-container').trigger('close');
    });

    $('.send_btn').click(function (e) {
        e.preventDefault();
        let input = $('.chat-foot').find('input');
        let sms = input.val();
        if(sms) {
            send_sms($('#chatInput').val());
        }
        input.val('');
    });



    $('.fav_confirm_btn').click(function (e) {
        e.preventDefault();

        let checked = $('.uk-table').find('input:checked');
        let names = '';

        checked.each(function (key, guide) {
            names = names + ' ' + $(guide).attr('data-name');
        });

        send_sms('I have chosen ' + names);
    });

    $('.favorites_ckbx').change(function () {
        let checked = $('.uk-table').find('input:checked');
        let max_guide_count = false;

        switch (role_id) {
            case '3' :
                max_guide_count = 5;
                break;
            case '4' :
                max_guide_count = 10;
                break;
            case '5' :
                max_guide_count = 15;
                break
        }

        if(max_guide_count) {
            if (checked.length == max_guide_count) {

                let notChecked = $('.uk-table').find("input:checkbox:not(:checked)");

                notChecked.attr('style', 'background-color:#f8f8f8; border-color:#e5e5e5; cursor: not-allowed;')
                notChecked.attr('data-disabled', 'true');
                notChecked.attr('uk-tooltip', "You can chose only " + max_guide_count +' guides with your current plan.');

                notChecked.click(function (e) {
                    e.preventDefault();
                    return false;
                });
            }

            if(checked.length < max_guide_count) {
                $('.uk-table').find("input[data-disabled = 'true']")
                    .off('click').removeAttr('style').removeAttr('data-disabled').removeAttr('uk-tooltip');
            }
        }
    });

    $(document).on('click', '.monthly_update', function () {

        let email = $(this).parents('div').find(':input').val();

        if(!email) {
            return;
        }

        let data = {
            email: email
        };


        send_ajax(base_url + '/monthlySubscribe', 'POST', data, {'beforsend': 'monthly_before_send()', 'success' : 'monthly_success()'})
    });

    $(document).on('click', '.send_email', function () {

        let email = $('.contact_form_email').val();
        let message = $('.contact__form-input-message').val();
        let subject = $('.contact__form-input-subject').val();
        let name = $('.contact_form_name').val();

        if(!email || !message || !subject || !name) {
            $('.contact__form').after('<p style="color: red;" id="validation_error">All fields are required!</p>');
            return;
        } else {
            $('#validation_error').remove();
        }

        let data = {
            email: email,
            name: name,
            subject : subject,
            message : message
        };

        if(getCookie('region_name')){
            data.regionName = getCookie('region_name');
            data.regionUrl = getCookie('region_url');
        }
        send_ajax(base_url + '/contactForm', 'POST', data, {'beforsend': 'monthly_before_send()', 'success' : 'monthly_success()'})
    });

    $(document).on('click', '.uk-search-icon', function () {
        $('.search_block').hasClass('opened') ? $('.search_block').removeClass('opened') : $('.search_block').addClass('opened');
    });

    $(document).on('click', '.uk-search-icon', function () {

        let $nav_link = $(this).closest('div').find('.nav__link');
        let $search_input = $('.search_input');

        if($('.search_input:visible').length == 1) {
            $search_input.val('').hide();
            $nav_link.show('slow');
            
            $('.autocomplete_block').hide();
            return;
        }

        if($('.search_input:visible').length == 0) {
            $nav_link.hide()
            $search_input.show('slow');
            return;
        }
    });

    $(document).on('keyup', '.search_input', function () {
        console.log('barev');
        if($(this).val() == '') {
            console.log('datark value')
            $('.autocomplete_block').find('ul').remove();return;
        }

        send_ajax(base_url + '/search', 'POST', {word:$(this).val()}, {handler: 'search_handler'})
    })

});

function search_handler(response) {
    $('.autocomplete_block').find('ul').remove();
    let ul = '<ul>';
    $.each(response.guides, function (key, guide) {
        let li = '<li><a href="' + guide.url + '">'+guide.name+'</a>';
        ul = ul + li;
    });
    $.each(response.regions, function (key, guide) {
        let li = '<li><a href="' + guide.url + '">'+guide.name+'</a>';
        ul = ul + li;
    });


    ul = ul + '</ul>';
    $('.autocomplete_block').append(ul);
    $('.autocomplete_block').show('fast');
}
function monthly_before_send() {
    $('.monthly_update').attr('style', 'cursor:wait !important').attr('disabled', true)
    $('.send_email').attr('style', 'cursor:wait !important').attr('disabled', true)
}

function monthly_success() {
    $('.monthly_update').parents('div').find(':input').val('');
    $('.send_email').parents('div').find(':input').val('');
    $('#sign_up_message').remove();
    $('.footer__form-input').after('<p id="sign_up_message">Successfully sign uped!</p>');
    $('.contact__form').after('<p>Email has been sent!</p>');

    $('.monthly_update').removeAttr('style').attr('disabled', false)
    $('.send_email').removeAttr('style').attr('disabled', false)
}
