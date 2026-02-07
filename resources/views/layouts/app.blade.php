<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'EBD Digital') }}</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700&display=swap" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <style>
        [x-cloak] {
            display: none !important;
        }

        .no-scrollbar::-webkit-scrollbar {
            display: none;
        }

        .no-scrollbar {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }

        .card-shadow {
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.04), 0 4px 6px -2px rgba(0, 0, 0, 0.02);
        }
    </style>
</head>

<body class="font-sans antialiased bg-[#f8fafc] text-slate-900" x-data="{ sidebarOpen: false, logoutModal: false }">

    <div class="flex h-screen overflow-hidden">
        @include('layouts.navigation')

        <div class="relative flex flex-col flex-1 overflow-y-auto overflow-x-hidden">
            <header
                class="sticky top-0 z-30 flex items-center justify-between w-full px-6 py-4 bg-white/70 backdrop-blur-xl border-b border-slate-200/60">
                <div class="flex items-center">
                    <button @click="sidebarOpen = true"
                        class="p-2 mr-4 text-slate-600 rounded-lg hover:bg-slate-100 focus:outline-none lg:hidden transition-colors">
                        <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </button>

                    @if (isset($header))
                        <h2 class="text-lg font-bold text-slate-800 tracking-tight">
                            {{ $header }}
                        </h2>
                    @endif
                </div>

                <div class="flex items-center space-x-5">
                    <div class="relative" x-data="{ open: false }">
                        <button @click="open = !open" class="flex items-center group focus:outline-none">
                            <div
                                class="flex items-center space-x-3 p-1 pr-3 rounded-full hover:bg-slate-100 transition-all">
                                <img class="w-9 h-9 rounded-full ring-2 ring-white border border-slate-200 shadow-sm"
                                    src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name) }}&background=6366f1&color=fff&bold=true"
                                    alt="{{ Auth::user()->name }}">
                                <span
                                    class="hidden md:block text-sm font-semibold text-slate-700 group-hover:text-indigo-600 transition-colors">
                                    {{ Auth::user()->name }}
                                </span>
                                <svg class="w-4 h-4 text-slate-400" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 9l-7 7-7-7" />
                                </svg>
                            </div>
                        </button>

                        <div x-show="open" @click.away="open = false" x-cloak
                            x-transition:enter="transition ease-out duration-150"
                            x-transition:enter-start="opacity-0 translate-y-2"
                            x-transition:enter-end="opacity-100 translate-y-0"
                            class="absolute right-0 w-56 mt-3 origin-top-right bg-white rounded-2xl shadow-xl border border-slate-100 overflow-hidden z-50">

                            <div class="px-5 py-4 bg-slate-50/50 border-b border-slate-100">
                                <p class="text-xs font-semibold text-slate-400 uppercase tracking-wider">Sua Conta</p>
                                <p class="text-sm font-bold text-slate-800 truncate">{{ Auth::user()->email }}</p>
                            </div>

                            <div class="p-2">
                                <a href="{{ route('profile.edit') }}"
                                    class="flex items-center px-4 py-2.5 text-sm text-slate-600 rounded-xl hover:bg-indigo-50 hover:text-indigo-600 transition-colors">
                                    <svg class="w-4 h-4 mr-3 opacity-70" fill="none" viewBox="0 0 24 24"
                                        stroke="currentColor">
                                        <path d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"
                                            stroke-width="2" />
                                    </svg>
                                    Meu Perfil
                                </a>
                                <a href="#"
                                    class="flex items-center px-4 py-2.5 text-sm text-slate-600 rounded-xl hover:bg-indigo-50 hover:text-indigo-600 transition-colors">
                                    <svg class="w-4 h-4 mr-3 opacity-70" fill="none" viewBox="0 0 24 24"
                                        stroke="currentColor">
                                        <path
                                            d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"
                                            stroke-width="2" />
                                        <path d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" stroke-width="2" />
                                    </svg>
                                    Configurações
                                </a>
                            </div>

                            <div class="p-2 border-t border-slate-100">
                                <button @click="open = false; logoutModal = true"
                                    class="flex items-center w-full px-4 py-2.5 text-sm text-red-500 rounded-xl hover:bg-red-50 transition-colors">
                                    <svg class="w-4 h-4 mr-3 opacity-70" fill="none" viewBox="0 0 24 24"
                                        stroke="currentColor">
                                        <path
                                            d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"
                                            stroke-width="2" />
                                    </svg>
                                    Sair do Sistema
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </header>

            <main class="flex-grow p-6 md:p-10">
                <div class="max-w-7xl mx-auto">
                    {{ $slot }}
                </div>
            </main>
        </div>
    </div>

    <div x-show="logoutModal" class="fixed inset-0 z-[100] overflow-y-auto" x-cloak>
        <div x-show="logoutModal" x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
            x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0" class="fixed inset-0 bg-slate-900/60 backdrop-blur-sm"></div>

        <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
            <div x-show="logoutModal" x-transition:enter="transition ease-out duration-300"
                x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                x-transition:leave="transition ease-in duration-200"
                x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                @click.away="logoutModal = false"
                class="relative transform overflow-hidden rounded-[2rem] bg-white text-left shadow-2xl transition-all sm:my-8 sm:w-full sm:max-w-lg border border-slate-100">

                <div class="bg-white px-6 pb-6 pt-8 sm:p-10 sm:pb-8">
                    <div class="sm:flex sm:items-start">
                        <div
                            class="mx-auto flex h-14 w-14 flex-shrink-0 items-center justify-center rounded-2xl bg-red-50 sm:mx-0">
                            <svg class="h-7 w-7 text-red-600" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15M12 9l-3 3m0 0l3 3m-3-3h12.75" />
                            </svg>
                        </div>
                        <div class="mt-4 text-center sm:ml-6 sm:mt-0 sm:text-left">
                            <h3 class="text-xl font-extrabold text-slate-900 tracking-tight leading-6">Sair da conta?
                            </h3>
                            <div class="mt-3">
                                <p class="text-sm font-medium text-slate-500 leading-relaxed">Você está prestes a
                                    encerrar sua sessão. Alguma alteração não salva pode ser perdida. Tem certeza que
                                    deseja sair agora?</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="bg-slate-50/50 px-6 py-6 sm:flex sm:flex-row-reverse sm:px-10 gap-3">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit"
                            class="inline-flex w-full justify-center rounded-xl bg-red-600 px-6 py-3 text-sm font-bold text-white shadow-lg shadow-red-600/20 hover:bg-red-700 transition-all active:scale-95 sm:w-auto">Confirmar
                            Saída</button>
                    </form>
                    <button type="button" @click="logoutModal = false"
                        class="mt-3 inline-flex w-full justify-center rounded-xl bg-white px-6 py-3 text-sm font-bold text-slate-700 border border-slate-200 shadow-sm hover:bg-slate-50 transition-all sm:mt-0 sm:w-auto">Continuar
                        Logado</button>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
