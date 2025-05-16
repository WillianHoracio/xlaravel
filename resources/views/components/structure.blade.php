
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
        @vite(['resources/scss/app.scss', 'resources/js/app.js'])
        <title>{{ $title }}</title>
    </head>
    <body>
        <x-navbar/>
        <x-baseHeader title="{{ $header }}"/>
        <div class="container-flexible">
            {{ $slot }}
        </div>
    </body>
</html>