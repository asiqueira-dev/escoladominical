<x-app-layout>
    <x-slot name="header">
        Painel Master (SuperAdmin)
    </x-slot>

    <div class="relative bg-[#1e293b] p-8 rounded-[2rem] border border-slate-700 overflow-hidden mb-8 shadow-2xl">
        <div class="relative z-10 flex flex-col md:flex-row items-center justify-between text-white">
            <div class="text-center md:text-left mb-6 md:mb-0">
                <h3 class="text-2xl font-extrabold tracking-tight">Bem-vindo, Mestre {{ Auth::user()->name }}! 👑</h3>
                <p class="text-slate-400 mt-2 font-medium">Você tem controle total sobre todas as congregações do
                    sistema.</p>
            </div>
            <div class="flex space-x-3">
                <button
                    class="px-6 py-3 bg-indigo-600 text-white font-bold rounded-xl hover:bg-indigo-700 transition-all">Nova
                    Congregação</button>
                <button
                    class="px-6 py-3 bg-slate-700 text-white font-bold rounded-xl hover:bg-slate-600 transition-all">Relatórios
                    Globais</button>
            </div>
        </div>
        <div class="absolute -right-20 -top-20 w-64 h-64 bg-indigo-500/10 rounded-full"></div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
        <div class="bg-white p-6 rounded-[2rem] border border-slate-200 card-shadow">
            <p class="text-xs font-black text-slate-400 uppercase">Total Congregações</p>
            <p class="text-3xl font-black text-slate-900 mt-1">12</p>
        </div>
        <div class="bg-white p-6 rounded-[2rem] border border-slate-200 card-shadow">
            <p class="text-xs font-black text-slate-400 uppercase">Total Usuários</p>
            <p class="text-3xl font-black text-slate-900 mt-1">458</p>
        </div>
    </div>
</x-app-layout>
