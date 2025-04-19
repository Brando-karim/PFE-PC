<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="icon" href="{{ asset('img/favicon.ico') }}" type="image/x-icon">
    <link rel="shortcut icon" href="{{ asset('img/favicon.ico') }}" type="image/x-icon">
    
    <!-- Favicon for modern browsers -->
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('img/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('img/favicon-16x16.png') }}">
    
    <!-- Apple Touch Icon (for iOS devices) -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('img/apple-touch-icon.png') }}">
    
    <!-- Safari Pinned Tab Icon -->
    <link rel="mask-icon" href="{{ asset('img/safari-pinned-tab.svg') }}" color="#5bbad5">

    <!-- 
      - google font link
    -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
      href="https://fonts.googleapis.com/css2?family=Oxanium:wght@400;500;600;700&family=Work+Sans:wght@600&display=swap"
      rel="stylesheet">
  
    <!-- 
      - custom css link
    -->
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
  
</head>
<body >
    
    @include('Menu')
    <div class="content">
        @yield('content')
    </div>

    @include('Footer')



    <a href="#top" class="back-top-btn" aria-label="back to top" data-back-top-btn>
        <ion-icon name="arrow-up-outline" aria-hidden="true"></ion-icon>
      </a>
    
    
    
    
    
      <!-- 
        - #CUSTOM CURSOR
      -->
    
      <div class="cursor" data-cursor></div>
    
      <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
      <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script> 
      
      
      <script src="{{asset('js/what.js')}}"></script>
</body>
</html>