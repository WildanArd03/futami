<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>@yield('title') - Apps Futami </title>

  <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}"crossorigin="anonymous">
  <link rel="stylesheet" href="{{ asset('assets/css/all.css') }}"  crossorigin="anonymous">

  {{-- CSS Libraries --}}
  @yield('page-styles')

  {{-- Template CSS  --}}
  <link rel="stylesheet" href="{{ asset('assets/css/style.css')}}">
  <link rel="stylesheet" href="{{ asset('assets/css/components.css')}}">
</head>

<body class="sidebar-gone sidebar-mini">
  <div id="app">
    <div class="main-wrapper">
      @include('layouts.header')
      @include('layouts.sidebar')

      {{-- Main Content  --}}
      <div class="main-content">
        
        @yield('content')

      </div>
      <footer class="main-footer">
        <div class="footer-left">
            Futami Food & Beverages &copy; {{ date('Y') }} 
              <!-- </div> Design By <a href="https://www.instagram.com/dimasrizqi">RADJA RIZQI RAMADHAN </a>  -->
        </div>
        
      </footer>
    </div>
  </div>

  <!-- General JS Scripts -->
  <script src="{{ asset('assets/js/jquery-3.3.1.min.js')}}" crossorigin="anonymous"></script>
  <script src="{{ asset('assets/js/popper.min.js')}}" crossorigin="anonymous"></script>
  <script src="{{ asset('assets/js/bootstrap.min.js')}}"  crossorigin="anonymous"></script>
  <script src="{{ asset('assets/js/jquery.nicescroll.min.js')}}"></script>
  <script src="{{ asset('assets/js/moment.min.js')}}"></script>
  <script src="{{ asset('assets/js/stisla.js')}}"></script>


  {{-- JS Libraies --}}

  {{-- Template JS File  --}}
  <script src="{{ asset('assets/js/scripts.js')}}"></script>
  <script src="{{ asset('assets/js/custom.js')}}"></script>

   <!-- Page Specific JS File  -->
   
  @stack('page-scripts')
</body>
</html>
