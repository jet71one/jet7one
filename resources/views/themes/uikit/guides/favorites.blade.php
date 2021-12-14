@extends('theme::layouts.app')


@section('css')

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/uikit@3.6.18/dist/css/uikit.min.css" />

@endsection
@section('content')
<div class="header__text">
    <h1 class="header__title">
      Favorite Guides
    </h1>
</div>
<div class="hot-tour">

    <div class="uk-container">
        <div class="uk-container">
            @if($cart->count())
<table class="uk-table uk-table-middle uk-table-divider uk-table-justify" style="color:#020202; width:70%; margin:50px auto;" >
    <thead>
        <tr>
            <th class="uk-table-shrink"></th>
            <th>Picture</th>
            <th>Guide Name</th>
            <th class="uk-table-shrink">Remove</th>
        </tr>
    </thead>
    <tbody>
      @foreach ($cart as $key => $ct)
        <tr>
            <td><input class="uk-checkbox favorites_ckbx" type="checkbox" data-name="{{$ct->name}}"></td>
            <td><img src="/storage/{{$ct->attributes->image}}" style="height:80px"></td>
            {{--<td><img class="uk-preserve-width uk-border-circle" src="/storage/{{$ct->attributes->image}}" width="40" height="40" alt=""></td>--}}
            <td class="name_td">{{$ct->name}}</td>
            <td><span type="button" class="removeGuide" data-id="{{$ct->id}}" uk-icon="icon: close; ratio: 0.9"></span>  </td>
        </tr>
      @endforeach
      <tr>
          <td></td>
          <td></td>
          <td></td>
          <td><a href="" class="btn fav_confirm_btn">Confirm</a></td>
      </tr>
    </tbody>
</table>
@endif

        </div>
    </div>



</div>



@endsection

@section('javascript')
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js"></script>

@endsection
