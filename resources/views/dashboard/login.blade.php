<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description"
        content="Hi I'm Philip, I'm a 22 years old junior Software Engineer who enjoys
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
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    <title>Philip Droubi / LOGIN</title>
</head>

<body>
    <main>
        <h1><i class="fas fa-user-tie    "></i> Login to dashboard</h1>
        <form class="login-form" method="POST" action="/auth">
            <div class="user-name">
                <label for="userName">User name</label>
                <input type="text" name="name" id="userName" aria-required="true" autocomplete="off" autofocus
                    placeholder="user name" value={{ old('name') }}>
            </div>
            @error('name')
                <p class="error-input-message">{{ $message }}</p>
            @enderror
            <div class="password">
                <label for="pass">password</label>
                <input type="password" name="password" id="pass" aria-required="true" autocomplete="off"
                    placeholder="password">
                <div class="eye">
                    <i class="fa fa-eye" aria-hidden="true"></i>
                </div>
            </div>
            @csrf
            @honeypot
            <x-button-with-load>
                Login
            </x-button-with-load>
        </form>
    </main>
    <script src={{ asset('js/login.js') }} type="module"></script>
    <script src={{ asset('js/main.js') }} type="module"></script>
</body>

</html>
