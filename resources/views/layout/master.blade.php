
<html lang="en" class="perfect-scrollbar-on"><head>
    <meta charset="utf-8">
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" sizes="96x96" href="../assets/img/favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

    <title>{{$title ?? ''}}</title>

    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport">
    <meta name="viewport" content="width=device-width">

    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet" />

    <!--  Paper Dashboard core CSS    -->
    <link href="{{asset('css/paper-dashboard.css')}}" rel="stylesheet"/>

    <!--  Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Muli:400,300" rel="stylesheet" type="text/css">
    <script type="text/javascript" charset="UTF-8" src="https://maps.googleapis.com/maps-api-v3/api/js/49/11/common.js"></script><script type="text/javascript" charset="UTF-8" src="https://maps.googleapis.com/maps-api-v3/api/js/49/11/util.js"></script></head>
    <link href="{{asset('css/themify-icons.css')}}" rel="stylesheet">

<body class="">
<div class="wrapper">

    @include('layout.sidebar')
    <div class="main-panel ps-container ps-theme-default ps-active-y" data-ps-id="35adbff3-a444-3369-13da-2d2b2681985f">
        @include('layout.header')


        <div class="content">
            <div class="container-fluid">
                <div class="row">

                    @yield('content')
                    <!-- your content here -->
                </div>
            </div>
        </div>
        @include('layout.footer')

        <div class="ps-scrollbar-x-rail" style="left: 0px; bottom: 3px;"><div class="ps-scrollbar-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps-scrollbar-y-rail" style="top: 0px; height: 625px; right: 3px;"><div class="ps-scrollbar-y" tabindex="0" style="top: 0px; height: 600px;"></div></div></div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
@stack('js')


</body></html>
