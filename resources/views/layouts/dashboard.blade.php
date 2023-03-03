<!DOCTYPE html>
<html lang="en" style="height: 100%;">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/40752e6f71.js" crossorigin="anonymous"></script>
</head>
<body style="height: 100%;">
    @include('partials.navbar')
    <div class="container-fluid px-0" style="height: inherit; ">
        <div class="row" style=" min-height: 100%;">
            <div class="col-2" style="min-height: 100%; ">
                @include('dashboard.sidebar')
            </div>
            <div class="col" style=" min-height: 100%;">
                <div class="container" style="min-height: 100%;">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" crossorigin="anonymous"></script>
</body>
</html>
