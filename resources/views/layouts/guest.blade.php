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
        /* Ajuste fino para sensação de App Nativo */
        body {
            -webkit-tap-highlight-color: transparent;
        }

        .input-icon {
            position: absolute;
            top: 50%;
            left: 0.75rem;
            transform: translateY(-50%);
            color: #9CA3AF;
            pointer-events: none;
        }

        .input-with-icon {
            padding-left: 2.5rem;
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

            <div class="h-1 w-full bg-gray-100">
                <div class="h-1 bg-indigo-500 w-0 transition-all duration-500" id="loading-bar"></div>
            </div>

            <div class="px-6 py-8 sm:p-10">
                {{ $slot }}
            </div>
        </div>

        <div class="mt-8 text-center text-xs text-blue-200">
            &copy; {{ date('Y') }} Escola Bíblica Dominical. Todos os direitos reservados.
        </div>
    </div>

    <div class="fixed top-5 right-5 z-50 space-y-2 w-full max-w-xs pointer-events-none px-4 sm:px-0">

        @if (session('status'))
            <div x-data="{ show: true }" x-show="show" x-transition.duration.300ms x-init="setTimeout(() => show = false, 5000)"
                class="pointer-events-auto flex items-center p-4 mb-4 text-green-800 rounded-xl bg-green-50 border border-green-200 shadow-lg"
                role="alert">
                <svg class="flex-shrink-0 w-5 h-5 mr-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    fill="currentColor" viewBox="0 0 20 20">
                    <path
                        d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z" />
                </svg>
                <div class="ms-1 text-sm font-medium">
                    {{ session('status') }}
                </div>
                <button type="button" @click="show = false"
                    class="ms-auto -mx-1.5 -my-1.5 bg-green-50 text-green-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-green-200 inline-flex items-center justify-center h-8 w-8">
                    <span class="sr-only">Fechar</span>
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                </button>
            </div>
        @endif

        @if ($errors->any())
            <div x-data="{ show: true }" x-show="show" x-transition.duration.300ms
                class="pointer-events-auto flex items-start p-4 mb-4 text-red-800 rounded-xl bg-red-50 border border-red-200 shadow-lg"
                role="alert">
                <svg class="flex-shrink-0 w-5 h-5 mt-0.5 mr-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    fill="currentColor" viewBox="0 0 20 20">
                    <path
                        d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 11.793a1 1 0 1 1-1.414 1.414L10 11.414l-2.293 2.293a1 1 0 0 1-1.414-1.414L8.586 10 6.293 7.707a1 1 0 0 1 1.414-1.414L10 8.586l2.293-2.293a1 1 0 0 1 1.414 1.414L11.414 10l2.293 2.293Z" />
                </svg>
                <div class="ms-1 text-sm font-medium">
                    <span class="font-bold block mb-1">Atenção:</span>
                    <ul class="list-disc list-inside">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                <button type="button" @click="show = false"
                    class="ms-auto -mx-1.5 -my-1.5 bg-red-50 text-red-500 rounded-lg focus:ring-2 focus:ring-red-400 p-1.5 hover:bg-red-200 inline-flex items-center justify-center h-8 w-8">
                    <span class="sr-only">Fechar</span>
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                </button>
            </div>
        @endif

    </div>
</body>

</html>
