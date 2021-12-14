@if(isset($innerLoop))

<div class="uk-navbar-dropdown">
    <ul class="uk-nav uk-navbar-dropdown-nav">
@endif

@php

    if (Voyager::translatable($items)) {
        $items = $items->load('translations');
    }

@endphp

@foreach ($items as $item)

    @php

        $originalItem = $item;
        if (Voyager::translatable($item)) {
            $item = $item->translate($options->locale);
        }

        $listItemClass = null;
        $linkAttributes =  null;
        $styles = null;
        $icon = null;
        $caret = null;

        // Background Color or Color
        if (isset($options->color) && $options->color == true) {
            $styles = 'color:'.$item->color;
        }
        if (isset($options->background) && $options->background == true) {
            $styles = 'background-color:'.$item->color;
        }

        // With Children Attributes
        if(!$originalItem->children->isEmpty()) {
            $linkAttributes =  'class="dropdown-toggle" data-toggle="dropdown"';
            $caret = '<span class="caret"></span>';

            if(url($item->link()) == url()->current()){
                $listItemClass = 'dropdown uk-active';
            }else{
                $listItemClass = 'dropdown';
            }
        }

        if(url($item->link()) == url()->current()){
            $listItemClass = 'uk-active';
        }

        // Set Icon
        if(isset($item->icon_class)){
            $icon = '<span uk-icon="icon: ' . $item->icon_class . '"></span>';
        }

    @endphp

    <li class="{{ $listItemClass }}">
        <a href="{{ url($item->link()) }}" target="{{ $item->target }}" style="{{ $styles }}" {!! $linkAttributes or '' !!} @if((substr($item->link(), 0, 1) == '#' || substr($item->link(), 0, 2) == '/#') && Request::is( substr($item->link(), 0, strpos($item->link(), '#')) ) )@php echo 'uk-scroll="offset: 80"' @endphp@endif>
            {!! $icon !!}
            <span> {{ $item->title }}</span>
            {!! $caret !!}
        </a>
        @if(!$originalItem->children->isEmpty())
        @include('theme::menus.uikit', ['items' => $originalItem->children, 'options' => $options, 'innerLoop' => true])
        @endif
    </li>
@endforeach
        <li><a href="" class="nav__link chat_btn" >Chat</a></li>
        <div class="dsa">
            <div class="asd">
                <div class="chat-container">
                    <div class="chat_box">
                        <div class="chat-head">
                            <a href="" class="nav__link close_btn" >Close</a>
                            <div class="user">
                                <div class="avatar">
                                    <img src="{{url('images/icons/7.png')}}" />
                                </div>
                                <div class="name" style="color: black">Admin</div>
                            </div>

                        </div>
                        <div class="chat-body" style="overflow-y:auto">
                        </div>
                        <div class="chat-foot">
                            <input id="chatInput" type="text" class="msg" placeholder="Type a message..." />
                            <a href="" class="nav__link send_btn" style="color: black">Send</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@if(isset($innerLoop))
    </ul>
</div>
@endif
