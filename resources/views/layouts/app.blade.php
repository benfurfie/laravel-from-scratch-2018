<!doctype html>
<html lang="{{ app()->getLocale() }}">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
  </head>
  <body class="font-sans antialiased text-grey-darkest leading-tight">
    <header class="bg-grey-darkest">
      <nav class="container mx-auto py-4 text-white flex justify-between align-center">
        <a class="text-white no-underline text-2xl" href="/">
          Laravel
        </a>
        <ul class="list-reset flex flex-row items-center">
          <li class="pl-4">
            <a class="text-white no-underline" href="/">Home</a>
          </li>
          <li class="pl-4">
            <a class="text-white no-underline" href="/projects">Projects</a>
          </li>
        </ul>
      </nav>
    </header>
    <div id="app">
      @yield('body')
    </div>
    <script src="{{ mix('js/app.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    @yield('scripts')
  </body>
</html>
