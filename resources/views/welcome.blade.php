<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->

        <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    </head>
    <body class="antialiased bg-dark">
       <div class="row mt-5">
           <div class="col-md-6 mx-auto card px-5 py-5 rounded">
                <h3 class="text-center">Welcome to Woodvale Sales Dashboard</h3>
               <div class="d-flex justify-content-center align-items-center mt-2">
                   <img src="/img/Logo.png" style="width: 200px; height: auto"  alt="">
               </div>
               <div class="col-md-6 mx-auto mt-4">
                   <a href="/login" class="btn text-light btn-block" style="background-color: #D0237A">Login</a>
               </div>

           </div>
       </div>
    </body>
</html>
