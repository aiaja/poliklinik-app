<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Title | Admin Dashboard</title>
    <link rel="stylesheet" href="{{ asset('/css/app.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
        integrity="sha512-Evv84MrkqGSIVRlgF/aZq0bYxQZycrdIWxtJHSh8CR7PBfaKCr51Ck+w/U6sWJzm1vVXs9Vx9ABhgm="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-oX1oLFHLfeMPrJ0GpXh1LbcEPTINAed2xpHp5D9ESMjDYd0nLwMLNDG9y4HI+N" crossorigin="anonymous">
    @stack('styles')
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        @include('components.partials.sidebar')

        <div class="content-wrapper">
            @include('components.partials.header')
            {{ $slot }}
        </div>

        @include('components.partials.footer')
    </div>

    <script src="{{ asset('/js/app.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
        integrity="sha512-894YE6QWD5I59oQYFneFdAnC6t1WfSnCoNpUtT9X+9p2Q1hYkd0+8PSIgn+e7PJoAe6u7bTu0WgJf0Y7ZqYig=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/admin-lte@3.1/dist/js/adminlte.min.js"></script>
    @stack('scripts')
</body>

</html>
