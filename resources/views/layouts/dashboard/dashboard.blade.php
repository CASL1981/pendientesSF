@props(['dir'])
<!DOCTYPE html>
<html 
lang="{{ str_replace('_', '-', app()->getLocale()) }}" 
dir="{{$dir ? 'rtl' : 'ltr'}}"
class="theme-fs-sm"
>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{env('APP_NAME')}}</title>

    @include('partials.dashboard._head')
</head>
<body class="light" >
    <script>

        // theme-toggle.js
        document.addEventListener('DOMContentLoaded', function() {
            const body = document.body;
            const lightModeButton = document.getElementById('color-mode-light');
            const darkModeButton = document.getElementById('color-mode-dark');

            // Función para cambiar el tema
            function setTheme(theme) {
                if (theme === 'dark') {
                    body.classList.add('dark');
                    localStorage.setItem('theme', 'dark');
                    darkModeButton.setAttribute('checked', 'checked');
                    lightModeButton.removeAttribute('checked');
                } else {
                    body.classList.remove('dark');
                    localStorage.setItem('theme', 'light');
                    lightModeButton.setAttribute('checked', 'checked');
                    darkModeButton.removeAttribute('checked');
                }
            }

            // Cargar el tema desde el localStorage
            const storedTheme = localStorage.getItem('theme') || 'light';
            setTheme(storedTheme);

            // Event listeners para los botones
            lightModeButton.addEventListener('click', () => setTheme('light'));
            darkModeButton.addEventListener('click', () => setTheme('dark'));
        });


    </script>
@include('partials.dashboard._body')
</body>

</html>