<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CHAT</title>
    <link rel="stylesheet" href="{{ asset('public/css/app.css') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
         .list-group{
            overflow-y: scroll; 
            height: 200px; 
         }
    </style>
</head>
<body>

        <div class="container">
            <div class="row" id="app">
                <div class="offset-4 col-4 offset-sm-1 col-sm-10">
                    <li class="list-group-item active">Chat ROOM  <span class="badge badge-pill badge-warning"> @{{  numberOfusers }}</span> </li>

                    <div class="badge badge-pill badge-primary"> @{{ typing }} </div>
                  
                    <ul class="list-group" v-chat-scroll>
               <message
				  v-for="value,index in chat.message"
				  :key=value.index
                  :color= chat.color[index]
				  :user = chat.user[index]
				  :time = chat.time[index]
				  >
                            @{{ value  }}
                        </message>
                    </ul>
                        <input type="text" name="" id="" class='form-control' placeholder='Type your message here..' 
                        v-model='message' @keyup.enter='send'>
                </div>
            </div>

            <a href="{{ route('home') }}">Home</a>
        </div>


        <script src="{{ asset('public/js/app.js') }}"></script>
</body>
</html>