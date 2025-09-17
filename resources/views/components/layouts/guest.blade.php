<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>{{ $title ?? 'Login' }}</title>
  <link rel="stylesheet" href="{{ mix('css/app.css') }}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGR9NSGLF/aIDqB7QxQYcxdIrwxfjThSH8C7SRPBEakCr51Ck+++/U6sWU21mIVX0SXVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap4.6.2/dist/css/bootstrap.min.css" integrity="sha384-XOoLFHFLH6FP7JGoKPvL11bCPTNtaed2xpH5D9ESMhiqTYdOnLMwNLd69NpY4HiN" crossorigin="anonymous" />
  @stack('styles')
</head>

<body class="hold-transition sidebar-mini layout-fixed min-vh-100">
  {{ $slot }}

  <script src="{{ mix('js/app.js') }}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-8946E0Y5iQhQ58gReFfYmdwKloStNtvYSaNCoP+uTgYdvhz0PPSliqn/3e7Jo4E4g7TubfWgURMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="https://cdn.jsdelivr.net/npm/admin-lte@3.1/dist/js/adminlte.min.js"></script>
  @stack('scripts')
</body>
</html>
