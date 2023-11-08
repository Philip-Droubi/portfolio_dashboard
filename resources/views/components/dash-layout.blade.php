<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="Hi I'm Philip, I'm a 22 years old junior Software Engineer who enjoys
    playing with code.">
    <meta name="theme-color" content="#111222">
    <meta name="keywords"
        content="HTML, CSS, JavaScript, JS, Philip, Droubi, Laravel, MySQL, SQL, PHP, job,hire,hiring">
    <meta name="author" content="Philip Droubi">
    <meta name='designer' content='Philip Droubi'>
    <meta name='owner' content='Philip Droubi'>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="shortcut icon" href={{ asset('media/favicon/logo-32.png') }} type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('css/Normalize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('css/dash.css') }}">
    <link rel="stylesheet" href="{{ asset('css/paginate.css') }}">
    <link rel="stylesheet" href="{{ asset('css/confirm_box.css') }}">
    <link rel="stylesheet" href="{{ asset('css/project_more_sec.css') }}">
    <title>{{ $title }}</title>
</head>

<body>
    <x-flash-message></x-flash-message>
    <div class="dark-layer hidden"></div>
    <nav class="main-nav">
        <div class="container">
            <a href="/dashboard" class="logo" aria-label="portfolio main dashboard page">
                <img src={{ asset('media/favicon/logo-96.png') }} alt="Logo">
            </a>
            <div class="welcome">
                Welcome <span class="name">{{ auth()->user()->name }}</span> !
            </div>
            <div class="berg hidden">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>
    </nav>

    <main class="dashMain">
        <x-rightSide-menu></x-rightSide-menu>
        {{ $slot }}
    </main>
    <script src={{ asset('js/confirm_message.js') }}></script>
    <script src={{ asset('js/main.js') }} type="module"></script>
</body>

</html>