@extends('theme::layouts.app')

@section('content')
<div id="liqpay_checkout"></div>
<script>
  window.LiqPayCheckoutCallback = function() {
    LiqPayCheckout.init({
      data: "eyJ2ZXJzaW9uIjozLCJhY3Rpb24iOiJzdWJzY3JpYmUiLCJhbW91bnQiOiIyIiwiY3VycmVuY3kiOiJVQUgiLCJkZXNjcmlwdGlvbiI6ItCi0LXRgdGC0L7QstCwINC/0ZbQtNC/0LjRgdC60LAg0L3QsCDQvNGW0YHRj9GG0YwgIzEiLCJwdWJsaWNfa2V5Ijoic2FuZGJveF9pOTM1NjI4OTE0MjMiLCJsYW5ndWFnZSI6InJ1Iiwic3Vic2NyaWJlIjoxLCJzdWJzY3JpYmVfZGF0ZV9zdGFydCI6Im5vdyIsInN1YnNjcmliZV9wZXJpb2RpY2l0eSI6Im1vbnRoIn0=",
      signature: "zaBeE5WgoTUxjsA3sbeFp5EXw+g=",
      embedTo: "#liqpay_checkout",
      mode: "embed" // embed || popup,
        }).on("liqpay.callback", function(data){
      console.log(data.status);
      console.log(data);
      }).on("liqpay.ready", function(data){
        // ready
      }).on("liqpay.close", function(data){
        // close
    });
  };
</script>
<script src="//static.liqpay.ua/libjs/checkout.js" async></script>
    
    
@endsection