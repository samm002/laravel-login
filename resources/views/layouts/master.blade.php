<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('template/assets/css/style.css')}}">
    <link rel="icon" type="image/x-icon" href="{{asset('template/assets/img/lfk/lfk-logo.jpg')}}">
    @stack('styles')
    <title>LFK Profile</title>
</head>
<body>
    <div class="main-container">
        @include('partials.favian')
        @include('partials.fazrul')
        @include('partials.valdo')
        @include('partials.yurtan')
        @include('partials.samuel')
        @include('partials.ayus')
        @include('partials.arel')
        @include('partials.anca')
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
    <script src="{{asset('template/assets/js/script.js')}}"></script>
    @stack('scripts')
</body>
</html>