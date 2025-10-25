<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="{{ asset('assets/tabler-icons/tabler-icons-3.31.0/webfont/tabler-icons.min.css') }}">

        <title>{{ $title ?? 'Page Title' }}</title>

        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="bg-white text-black min-h-screen">
       
        @auth
            
            <div class="drawer  lg:drawer-open">
                <input id="drawer" type="checkbox" class="drawer-toggle" />
                <div class="drawer-content">
                    @livewire('partial.navbar')
                  {{ $slot }}
                </div>
                <div class="drawer-side">
                  <label for="drawer" aria-label="close sidebar" class="drawer-overlay"></label>
                  @livewire('partial.sidebar')
                </div>
              </div>
        @endauth
          
        @guest
            {{-- Konten untuk pengguna yang belum login --}}
            <div class="flex flex-col items-center justify-center h-screen gap-4">
                {{ $slot }}
            </div>
        @endguest

    </body>
</html>
