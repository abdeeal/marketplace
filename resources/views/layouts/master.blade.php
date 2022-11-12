<!DOCTYPE html>
<html>
<head>
  <script src="https://cdn.tailwindcss.com"></script>
  <title>{{ $title }}</title>
  @livewireStyles
  <link rel="stylesheet" href="https://unpkg.com/flowbite@1.5.3/dist/flowbite.min.css" />
  <style>
    .indigo900{
      filter: invert(17%) sepia(19%) saturate(6351%) hue-rotate(228deg) brightness(94%) contrast(96%);
    }
  </style>
</head>
<body class="w-100 vh-100">
  
  @yield('main')
  
@livewireScripts
<script src="https://unpkg.com/flowbite@1.5.3/dist/flowbite.js"></script>
<script src="{{ asset('js/main.js') }}"></script>
</body>
</html>