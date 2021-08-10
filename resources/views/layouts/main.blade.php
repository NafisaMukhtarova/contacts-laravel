<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF8">
      <title>@yield('title')</title>
    
    <link rel="icon" type="image" href="https://www.favicon.by/ico/607d4157eb10b.ico">
    
  <!-- CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
  
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css">
  
  <!-- jQuery and JS bundle w/ Popper.js -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
  
  
  <script src="https://snipp.ru/cdn/jquery/2.1.1/jquery.min.js"></script>
  <script src="https://snipp.ru/cdn/maskedinput/jquery.maskedinput.min.js"></script>
  
  </head>
<body>
  @include('includes.header')

  <div class="container mt-5">
     @include('includes.messages')


    <div class="row">
      <div class = "col">
      
          @yield('content')
      </div>
      
    </div>
  </div>
  
  
  @include('includes.footer')
</body>
</html>