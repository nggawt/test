<!DOCTYPE html>
<html dir="rtl" lang="he">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
<!--        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">-->
        <link href="{{ URL::to('styles/bootstrap.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ URL::to('styles/main.css') }}" rel="stylesheet" type="text/css">
        <title>@yield('title')</title>
        @yield('styles')
    </head>
    <body>

<div class="wrraper">
        <div class="main_content">
            <div class="inner-contant">
                <section class="main_sec">
                    @yield('section')
                </section>
                <aside class="main_sidebar">
                    @yield('sidebar')
                </aside>
                
            </div>
        </div>
</div>
    
        
        <script src="{{ URL::to('script/jquery-1.11.3.js') }}"></script>
        <script src="{{ URL::to('script/bootstrap.min.js') }}"></script>
    </body>
</html>