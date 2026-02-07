<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'EBD Pedidos') }}</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700&display=swap" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <style>
        body {
            -webkit-tap-highlight-color: transparent;
        }

        /* Alinhamento de Ícones padrão Login */
        .input-icon {
            position: absolute;
            top: 50%;
            left: 0.75rem;
            transform: translateY(-50%);
            color: #9CA3AF;
            pointer-events: none;
            display: flex;
            align-items: center;
            z-index: 20;
        }

        .input-with-icon {
            padding-left: 2.75rem !important;
        }

        .btn-eye {
            position: absolute;
            top: 50%;
            right: 0.75rem;
            transform: translateY(-50%);
            color: #9CA3AF;
            cursor: pointer;
            z-index: 30;
            background: none;
            border: none;
            padding: 4px;
        }

        .btn-eye:hover {
            color: #4f46e5;
        }
    </style>
</head>

<body class="font-sans text-gray-900 antialiased bg-gray-50">
    <div
        class="min-h-screen flex flex-col justify-center items-center bg-gradient-to-br from-blue-600 via-indigo-600 to-purple-700 px-4 py-6 sm:px-6 lg:px-8">
        <div class="mb-8 text-center">
            <a href="/"
                class="inline-flex items-center justify-center w-16 h-16 rounded-full bg-white/20 backdrop-blur-sm shadow-xl mb-4">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-8 h-8 text-white">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M12 6.042A8.967 8.967 0 006 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 016 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 016-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0018 18a8.967 8.967 0 00-6 2.292m0-14.25v14.25" />
                </svg>
            </a>
            <h1 class="text-3xl font-bold text-white tracking-tight">EBD Digital</h1>
            <p class="text-blue-100 text-sm mt-1">Gestão de Pedidos e Revistas</p>
        </div>

        <div class="w-full sm:max-w-md bg-white shadow-2xl rounded-3xl overflow-hidden border border-gray-100 relative">
            <div class="px-6 py-8 sm:p-10">
                {{ $slot }}
            </div>
        </div>

        <div class="mt-8 text-center text-xs text-blue-200">
            &copy; {{ date('Y') }} Escola Bíblica Dominical.
        </div>
    </div>

    <script>
        function togglePassword(inputId, btnId) {
            const input = document.getElementById(inputId);
            const btn = document.getElementById(btnId);
            if (input.type === "password") {
                input.type = "text";
                btn.innerHTML =
                    '<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5"><path stroke-linecap="round" stroke-linejoin="round" d="M3.98 8.223A10.477 10.477 0 001.934 12C3.226 16.338 7.244 19.5 12 19.5c.993 0 1.953-.138 2.863-.395M6.228 6.228A10.45 10.45 0 0112 4.5c4.756 0 8.773 3.162 10.065 7.498a10.523 10.523 0 01-4.293 5.774M6.228 6.228L3 3m3.228 3.228l3.65 3.65m7.894 7.894L21 21m-3.228-3.228l-3.65-3.65m0 0a3 3 0 10-4.243-4.243m4.242 4.242L9.88 9.88" /></svg>';
            } else {
                input.type = "password";
                btn.innerHTML =
                    '<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5"><path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" /><path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" /></svg>';
            }
        }
    </script>
</body>

</html>
