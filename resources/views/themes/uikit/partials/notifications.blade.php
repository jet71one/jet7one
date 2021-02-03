@php $notifications_count = App\Notification::all()->count(); @endphp



@if(!isset($show_all_notifications))
    @php $unreadNotifications = App\Notification::where('read_at','=', null)->take(5); @endphp
    <li id="notification-list">
        <a href="{{ route('wave.notifications') }}"  id="notification-icon">
            <span uk-icon="icon: bell" ></span>
            @if($unreadNotifications && $notifications_count > 0) <span id="notification-count">{{ $notifications_count }}</span> @endif
        </a>
@else
    {{-- @php $unreadNotifications = auth()->user()->unreadNotifications->all(); @endphp --}}
    @php $unreadNotifications = App\Notification::all()->take(5); @endphp
@endif


    <div class="@if(!isset($show_all_notifications)){{ 'uk-navbar-dropdown uk-notification-dropdown' }}@else{{ 'notifications-page' }}@endif">
        @if(!isset($show_all_notifications))
            <div id="notification-header">
                <div id="notification-head-content">
                    <span uk-icon="icon: bell" ></span> Notifications
                </div>
            </div>
        @endif

            <div id="notifications-none" class="@if($notifications_count > 0){{ 'hidden' }}@endif">
                <span uk-icon="icon: bell; ratio: 2" style="display:block; position:relative; opacity:0.5"></span>

                All Caught Up!
            </div>
            <ul class="uk-nav uk-navbar-dropdown-nav">

                @php $count = 0; @endphp
                @foreach ($unreadNotifications as $index => $notification)
                {{-- {{ dd($index) }} --}}
                <li id="notification-li-{{ $index + 1 }}"style="color: black;padding: 15px" >
                    <span class=""><i class="dojo-envelope"></i><span class="notification-highlight notification-user"></span>
                    🔔Updated profile. User {{ $notification->data }} </span>
                    <span class="notification-datetime" style="color: cornflowerblue;display:block;">{{ \Carbon\Carbon::parse($notification->created_at)->format('l F, jS Y h:i:s A') }}</span>
                    <div id="notification-actions">
                        <span class="icon-more" uk-icon="icon: more-vertical; ratio: 0.68"></span>
                        <span class="mark-as-read" data-id="{{ $notification->id }}" data-listid="{{ $index+1 }}"><i uk-icon="icon: check; ratio: 0.5" class="icon-check"></i> Mark as Read</span>
                    </div>
                   @php $count++; @endphp 
               </li>
                @endforeach


{{-- 
                @foreach ($unreadNotifications as $index => $notification)
                    @php $notification_data = (object)$notification->data; @endphp

                   
                    <li id="notification-li-{{ $index + 1 }}"><a href="{{ @$notification_data->link }}"><img src="{{ @$notification_data->icon }}"><span class="notification-content">@if(isset($notification_data->type) && @$notification_data->type == 'message'){!! '<i class="dojo-envelope"></i>' !!}@else{!! '<i class="dojo-forums"></i>' !!}@endif<span class="notification-highlight notification-user">{{ @$notification_data->user['username'] }}</span> @if(isset($notification_data->type) && @$notification_data->type == 'message'){{ 'left a message' }}@else{{ 'said' }}@endif {{ @$notification_data->body }} in <span class="notification-highlight">{{ @$notification_data->title }}</span></span></a>
                        <span class="notification-datetime">{{ \Carbon\Carbon::parse(@$notification->created_at)->format('l F, jS Y h:i:s A') }}</span>

                        <div id="notification-actions">
                            <span class="icon-more" uk-icon="icon: more-vertical; ratio: 0.68"></span>
                            <span class="mark-as-read" data-id="{{ $notification->id }}" data-listid="{{ $index+1 }}"><i uk-icon="icon: check; ratio: 0.5" class="icon-check"></i> Mark as Read</span>
                        </div>
                    </li>

                @endforeach --}}

            </ul>

        @if(!isset($show_all_notifications))
            <div id="notification-footer">
                <a href="{{ route('wave.notifications') }}"><span uk-icon="icon: eye"></span>View All Notifications</a>
            </div>
        @endif
    </div>
@if(!isset($show_all_notifications))
    </li>
@endif