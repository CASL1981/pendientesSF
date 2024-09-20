@props(['dir'])
<!DOCTYPE html>
<html 
lang="{{ str_replace('_', '-', app()->getLocale()) }}" 
dir="{{$dir ? 'rtl' : 'ltr'}}"
class="theme-fs-sm"
data-bs-theme="light"
data-bs-theme-color="theme-color-default"
>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{env('APP_NAME')}}</title>

    @include('partials.dashboard._head')
</head>
<body class="light theme-fs-sm" data-bs-theme-color="theme-color-default">
@include('sgc::partials.dashboard._body')

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

    document.addEventListener('livewire:init', () => {
        Livewire.on('alert', (param) => {
            toastr.options = {
            "closeButton" : true,
            "progressBar" : true
            }

            toastr[param[0]['type']](param[0]['message']);
        });

        // evento para validar la duplicación de los registros
        Livewire.on('duplicarItem', () => {
        Swal.fire({
            title: 'Estas segro?',
            text: "¡Deseas Duplicar este Registro!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si, Duplicalo!'
            }).then((result) => {
            if (result.isConfirmed) {
                Livewire.dispatch('doubleItem')
            }});
        });
    });
</script>
</body>

</html>
