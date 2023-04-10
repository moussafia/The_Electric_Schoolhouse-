<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
<link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.4/flowbite.min.css"  rel="stylesheet" />
<link rel="stylesheet" href="{{ URL::asset('../css/app.css') }}">
<link rel="stylesheet" href="{{asset('/assets/css/style.css')}}">
    <title>@yield('title')</title>
</head>
@yield('content')

<script src="{{asset('/assets/js/app.js')}}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.4/flowbite.min.js"></script>
</body>
</html>