<?php
use App\Events\Notify;
?>
    <!doctype html>
<html lang="en">
<head class="head-wrapper">
    <meta property="og:image" content=""/>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>    {{ config('app.name') }}</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description"
          content="Climate Change Monitoring & Evaluation Platform"/>
    <meta name="keywords" content="Piraeus Internet of Things Piraiot LoRa IOT Lorawan uplinks downlinks TEIPIR PADA"/>
    <meta name="robots" content="INDEX,FOLLOW"/>
    <link rel="icon" href="{{URL::asset('/media/favicon.png')}}" type="image/x-icon"/>
    <link rel="shortcut icon" href="{{URL::asset('/media/favicon.png')}}" type="image/x-icon"/>
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/piraiot.css') }}">
</head>
<body>
<div id="main-wrapper">
    <div class="main-content container">
        @yield('content')
    </div>
    @if (Auth::check())
        <flash userid="{{ Auth::user()->id }}"></flash>
    @endif
    @include('layout.sidebar')
</div>
</body>
</html>
<script src="{{ URL::asset('js/app.js') }}"></script>

<script src="https://js.pusher.com/5.0/pusher.min.js"></script>
<script>
    // Enable pusher logging - don't include this in production
    Pusher.logToConsole = true;

    var pusher = new Pusher('{{ env('PUSHER_APP_KEY') }}', {
        cluster: '{{ env('PUSHER_APP_CLUSTER') }}',
        forceTLS: true
    });

    var channel = pusher.subscribe('application');
    channel.bind('my-event', function(data) {
        console.log(data);
    });
</script>
@yield('endofpage')
