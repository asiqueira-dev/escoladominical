<x-app-layout>
    <x-slot name="header">
        Visão Geral do Sistema
    </x-slot>

    <div class="relative bg-white p-8 rounded-[2rem] border border-slate-200 overflow-hidden mb-8 card-shadow">
        <div class="relative z-10 flex flex-col md:flex-row items-center justify-between">
            <div class="text-center md:text-left mb-6 md:mb-0">
                <h3 class="text-2xl font-extrabold text-slate-900 tracking-tight">Bem-vindo de volta,
                    {{ Auth::user()->name }}! 👋</h3>
                <p class="text-slate-500 mt-2 font-medium">Você tem <span class="text-indigo-600">4 novos pedidos</span>
                    aguardando conferência hoje.</p>
            </div>
            <a href="#"
                class="px-6 py-3 bg-indigo-600 text-white font-bold rounded-xl shadow-lg shadow-indigo-600/30 hover:bg-indigo-700 transition-all hover:-translate-y-1">
                Novo Pedido
            </a>
        </div>
        <div class="absolute -right-20 -top-20 w-64 h-64 bg-indigo-50 rounded-full opacity-50"></div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <div
            class="group bg-white p-6 rounded-[2rem] border border-slate-100 card-shadow transition-all hover:border-indigo-200">
            <div class="flex items-center">
                <div
                    class="p-4 bg-indigo-600 rounded-2xl shadow-lg shadow-indigo-500/20 group-hover:scale-110 transition-transform">
                    <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        stroke-width="2">
                        <path d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                    </svg>
                </div>
                <div class="ml-5">
                    <p class="text-sm font-bold text-slate-400 uppercase tracking-wider">Total de Pedidos</p>
                    <p class="text-3xl font-extrabold text-slate-900">1.248</p>
                </div>
            </div>
        </div>

        <div
            class="group bg-white p-6 rounded-[2rem] border border-slate-100 card-shadow transition-all hover:border-emerald-200">
            <div class="flex items-center">
                <div
                    class="p-4 bg-emerald-500 rounded-2xl shadow-lg shadow-emerald-500/20 group-hover:scale-110 transition-transform">
                    <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        stroke-width="2">
                        <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                <div class="ml-5">
                    <p class="text-sm font-bold text-slate-400 uppercase tracking-wider">Entregas Feitas</p>
                    <p class="text-3xl font-extrabold text-slate-900">856</p>
                </div>
            </div>
        </div>

        <div
            class="group bg-white p-6 rounded-[2rem] border border-slate-100 card-shadow transition-all hover:border-amber-200">
            <div class="flex items-center">
                <div
                    class="p-4 bg-amber-500 rounded-2xl shadow-lg shadow-amber-500/20 group-hover:scale-110 transition-transform">
                    <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        stroke-width="2">
                        <path d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                <div class="ml-5">
                    <p class="text-sm font-bold text-slate-400 uppercase tracking-wider">Pendentes</p>
                    <p class="text-3xl font-extrabold text-slate-900">12</p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
