<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Welcome</title>
    <style>
        body {
            font-family: sans-serif;
        }

        .button {
            width: fit-content;
            margin: 0 auto;
            text-decoration: none;
            text-align: center;
            padding: 10px 16px;
            display: block;
            margin: 0 auto;
            border-radius: 4px;
            background-color: rgb(71, 71, 241);
            color: white;
            transition: 0.2s
        }

        .button:hover {
            background-color: rgb(56, 56, 253);
        }
    </style>
</head>

<body>
    {{$slot}}
</body>