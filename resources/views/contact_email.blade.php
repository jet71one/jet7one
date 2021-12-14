<p>Name: {{ $data['name'] }}</p>
<p>Email: {{ $data['email'] }}</p>
@if(isset($data['regionName']))
    <a href="{{$data['regionUrl']}}"><p>Region:{{$data['regionName']}}</p></a>
@endif
{{--<p>Subject: {{ $data['subject'] }}</p><br>--}}
<p>Message: {{ $data['message'] }}</p>