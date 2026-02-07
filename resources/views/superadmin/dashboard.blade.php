<x-app-layout>
    <x-slot name="header">
        Painel Master (SuperAdmin)
    </x-slot>

    {{-- Welcome Card --}}
    <div class="relative bg-[#1e293b] p-8 rounded-[2rem] border border-slate-700 overflow-hidden mb-8 shadow-2xl">
        <div class="relative z-10 flex flex-col md:flex-row items-center justify-between text-white">
            <div class="text-center md:text-left mb-6 md:mb-0">
                <h3 class="text-2xl font-extrabold tracking-tight">Bem-vindo, Mestre {{ Auth::user()->name }}! 👑</h3>
                <p class="text-slate-400 mt-2 font-medium">Você tem controle total sobre todas as congregações do
                    sistema.</p>
            </div>
            <div class="flex space-x-3">
                <a href="{{ route('superadmin.admins.index') }}"
                    class="px-6 py-3 bg-indigo-600 text-white font-bold rounded-xl hover:bg-indigo-700 transition-all shadow-lg shadow-indigo-600/20 active:scale-95">Gerenciar
                    Admins</a>
                <button
                    class="px-6 py-3 bg-slate-700 text-white font-bold rounded-xl hover:bg-slate-600 transition-all active:scale-95">Relatórios
                    Globais</button>
            </div>
        </div>
        <div class="absolute -right-20 -top-20 w-64 h-64 bg-indigo-500/10 rounded-full"></div>
    </div>

    {{-- Stats Grid --}}
    <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
        <div class="bg-white p-6 rounded-[2rem] border border-slate-200 card-shadow">
            <p class="text-xs font-black text-slate-400 uppercase tracking-widest">Total Congregações</p>
            <p class="text-3xl font-black text-slate-900 mt-1">12</p>
            <div class="mt-2 text-xs font-bold text-emerald-500">+2 este mês</div>
        </div>

        <div class="bg-white p-6 rounded-[2rem] border border-slate-200 card-shadow">
            <p class="text-xs font-black text-slate-400 uppercase tracking-widest">Administradores</p>
            <p class="text-3xl font-black text-slate-900 mt-1">8</p>
            <div class="mt-2 text-xs font-bold text-indigo-500 flex items-center">
                <span class="w-2 h-2 bg-indigo-500 rounded-full mr-1.5"></span> Online agora
            </div>
        </div>

        <div class="bg-white p-6 rounded-[2rem] border border-slate-200 card-shadow">
            <p class="text-xs font-black text-slate-400 uppercase tracking-widest">Alunos Ativos</p>
            <p class="text-3xl font-black text-slate-900 mt-1">456</p>
            <div class="mt-2 text-xs font-bold text-slate-400 italic">Engajamento de 84%</div>
        </div>

        <div class="bg-white p-6 rounded-[2rem] border border-slate-200 card-shadow">
            <p class="text-xs font-black text-slate-400 uppercase tracking-widest">Acessos Hoje</p>
            <p class="text-3xl font-black text-slate-900 mt-1">1.2k</p>
            <div class="mt-2 text-xs font-bold text-amber-500">Pico às 09h</div>
        </div>
    </div>

    {{-- Recent Activity Example --}}
    <div class="mt-8">
        <div class="bg-white rounded-[2rem] border border-slate-200 card-shadow overflow-hidden">
            <div class="px-8 py-6 border-b border-slate-100 flex justify-between items-center">
                <h4 class="text-lg font-black text-slate-900">Atividade Recente</h4>
                <button class="text-sm font-bold text-indigo-600 hover:text-indigo-700">Ver tudo</button>
            </div>
            <div class="p-8">
                <p class="text-slate-500 text-sm font-medium">Nenhuma atividade crítica registrada nas últimas 24 horas.
                </p>
            </div>
        </div>
    </div>
</x-app-layout>
