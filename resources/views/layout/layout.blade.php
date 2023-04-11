<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
<link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.4/flowbite.min.css"  rel="stylesheet" />
<link rel="stylesheet" href="{{ URL::asset('../css/app.css') }}">
<link rel="stylesheet" href="{{asset('/assets/css/style.css')}}">
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <title>@yield('title')</title>
    @stack('styles')
</head>
@yield('content')

<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="{{asset('/assets/js/app.js')}}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.4/flowbite.min.js"></script>
  @stack('scripts')
</body>
</html>