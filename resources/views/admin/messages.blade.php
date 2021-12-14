@extends('voyager::master')

@section('head')
   {{-- <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">--}}
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
@endsection

@section('css')
    <style type="text/css">

    img{ max-width:100%;}
    .inbox_people {
    float: left;
    overflow: hidden;
    width: 25%; border-right:1px solid #c4c4c4;
    }
    .inbox_msg {
    width: 75%;
    margin: 0 auto;
    clear: both;
    overflow: hidden;
    }
    .top_spac{ margin: 20px 0 0;}


    .recent_heading {float: left; width:40%;}
    .srch_bar {
    display: inline-block;
    text-align: right;
    width: 60%;
    }
    .headind_srch{ padding:10px 29px 10px 20px; overflow:hidden; border-bottom:1px solid #c4c4c4;}

    .recent_heading h4 {
    color: #1978fa;
    font-size: 21px;
    margin: auto;
    }
    .srch_bar input{ border:1px solid #cdcdcd; border-width:0 0 1px 0; width:80%; padding:2px 0 4px 6px; background:none;}
    .srch_bar .addon button {
    background: rgba(0, 0, 0, 0) none repeat scroll 0 0;
    border: medium none;
    padding: 0;
    color: #707070;
    font-size: 18px;
    }
    .srch_bar .addon { margin: 0 0 0 -27px;}

    .chat_ib h5{ font-size:15px; color:#464646; margin:0 0 8px 0;}
    .chat_ib h5 span{ font-size:13px; float:right;}
    .chat_ib p{ font-size:14px; color:#989898; margin:auto}
    .chat_img {
    float: left;
    width: 11%;
    }
    .chat_ib {
    float: left;
    padding: 0 0 0 15px;
    width: 88%;
    }

    .chat_people{ overflow:hidden; clear:both;}
    .chat_list {
    border-bottom: 1px solid #c4c4c4;
    margin: 0;
    padding: 18px 16px 10px;
    cursor: pointer;
    }
    .chat_list:hover{
        background:#ebebeb;
    }
    .inbox_chat { height: 550px; overflow-y: scroll;}

    .active_chat{ background:#ebebeb;}

    .incoming_msg_img {
    display: inline-block;
    width: 6%;
    }
    .received_msg {
    display: inline-block;
    padding: 0 0 0 10px;
    vertical-align: top;
    width: 92%;
    }
    .received_withd_msg p {
    background: #ebebeb none repeat scroll 0 0;
    border-radius: 3px;
    color: #646464;
    font-size: 14px;
    margin: 0;
    padding: 5px 10px 5px 12px;
    width: 100%;
    }
    .time_date {
    color: #747474;
    display: block;
    font-size: 12px;
    margin: 8px 0 0;
    }
    .received_withd_msg { width: 57%;}
    .mesgs {
    float: left;
    padding: 30px 15px 0 25px;
    width: 50%;
    }

    .sent_msg p {
    background: #1978fa none repeat scroll 0 0;
    border-radius: 3px;
    font-size: 14px;
    margin: 0; color:#fff;
    padding: 5px 10px 5px 12px;
    width:100%;
    }
    .outgoing_msg{ overflow:hidden; margin:26px 0 26px;}
    .sent_msg {
    float: right;
    width: 46%;
    }
    .input_msg_write input {
    background: rgba(0, 0, 0, 0) none repeat scroll 0 0;
    border: medium none;
    color: #4c4c4c;
    font-size: 15px;
    min-height: 48px;
    width: 100%;
    }

    .type_msg {border-top: 1px solid #c4c4c4;position: relative;}
    .msg_send_btn {
    background: #1978fa none repeat scroll 0 0;
    border: medium none;
    border-radius: 50%;
    color: #fff;
    cursor: pointer;
    font-size: 17px;
    height: 33px;
    position: absolute;
    right: 0;
    top: 11px;
    width: 33px;
    }
    .messaging { padding: 0 0 50px 0;}
    .msg_history {
    height: 516px;
    overflow-y: auto;
    }
    </style>
@stop

{{--@section('page_title', __('voyager::generic.'.($edit ? 'edit' : 'add')).' '.$dataType->getTranslatedAttribute('display_name_singular'))--}}

@section('page_header')
    <h1 class="page-title">
        <i class="icon voyager-bubble"></i>
        Сообщение
    </h1>
    @include('voyager::multilingual.language-selector')
@stop

@section('content')
    <div class="page-content container-fluid">
        <div class="panel panel-bordered">
            <div class="panel-body">
            <div class="inbox_msg">
                <div class="inbox_people">
                    <div class="headind_srch">
                        <div class="recent_heading">
                            <h4>Users</h4>
                        </div>
                        {{--<div class="srch_bar">
                            <div class="stylish-input-group">
                                <input type="text" class="search-bar"  placeholder="Search" >
                                <span class="addon">
                <button type="button"> <i class="voyager-search" aria-hidden="true"></i> </button>
                </span> </div>
                        </div>--}}
                    </div>
                    <div class="inbox_chat" id="chatInbox">
                        @if($users->count() > 0)
                            @foreach($users as $user)
                                <div class="chat_list" data-id="{{$user->id}}">
                                    <div class="chat_people">
                                        <div class="chat_img"> <img src="{{url('storage/'. $user->avatar)}}" alt="sunil"> </div>
                                        <div class="chat_ib">
                                            <h5>{{$user->name}}</h5>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
                <div class="mesgs">
                    <div class="msg_history" >
                        <p>Click on user to get messages</p>
                    </div>
                    <div class="type_msg">
                        <div class="input_msg_write">
                            <input type="text" class="write_msg" placeholder="Type a message" />
                            <button class="msg_send_btn" type="button"><i class="voyager-paper-plane" aria-hidden="true"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </div>


@stop

@section('javascript')
    <script src="{{ asset('js/admin-custom.js') }}"></script>
@stop
