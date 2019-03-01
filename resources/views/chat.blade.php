<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CHAT</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>

        <div class="container">
        <br>
            <div class="row" id="app">
                <ul class="list-group offset-4 col-4">
                    <li class="list-group-item active">Chat ROOM</li>
                  
                    <message v-for="value in chat.message">
                     @{{ value }}
                    </message>

                    <input type="text" name="" id="" class='form-control' placeholder='Type your message here..' 
                       v-model='message' @keyup.enter='send'>
                </ul>
            </div>
        </div>


        <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>