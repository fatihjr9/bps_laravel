<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Aplikasi SI-NANAS</title>
  <link href="https://cdn.jsdelivr.net/npm/flowbite@2.4.1/dist/flowbite.min.css" rel="stylesheet" />
  @vite('resources/css/app.css')
</head>
<body style="background-image: url('/auth-bg.jpg');" class="object-cover bg-center bg-no-repeat">
    <div class="w-96 mx-auto my-20 bg-white border border-slate-150 drop-shadow-md rounded-xl p-4">
        <img src= "{{ asset('/bps.png') }}" class="w-28 mx-auto" />
        @yield('content')
    </div>
  <script src="https://cdn.jsdelivr.net/npm/flowbite@2.4.1/dist/flowbite.min.js"></script>
</body>
</html>
