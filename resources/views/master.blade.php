<!DOCTYPE html>
<html ng-app="myApp">
<head>
    <title>Laravel AngularJS</title>
    <link href="{{ asset('bower_components/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
    <script>var baseUrl = "{{ url('/') }}/";</script>
</head>
<body>
    <div class="container">
        <div ng-view></div>

    </div>

    <script src="{{ asset('bower_components/angular/angular.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('bower_components/angular-route/angular-route.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('bower_components/angular-cookies/angular-cookies.min.js') }}" type="text/javascript"></script>
    <script src="{{ url(elixir('js/app.js')) }}" type="text/javascript"></script>
    <script src="{{ url(elixir('js/models.js')) }}" type="text/javascript"></script>
    <script src="{{ url(elixir('js/controllers.js')) }}" type="text/javascript"></script>
</body>
</html>
