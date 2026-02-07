<x-app-layout>
    <x-slot name="header">
        Painel Administrativo
    </x-slot>

    <div class="relative bg-white p-8 rounded-[2rem] border border-slate-200 overflow-hidden mb-8 card-shadow">
        <div class="relative z-10 flex flex-col md:flex-row items-center justify-between">
            <div class="text-center md:text-left mb-6 md:mb-0">
                <h3 class="text-2xl font-extrabold text-slate-900 tracking-tight">Gestão Administrativa,
                    {{ Auth::user()->name }}</h3>
                <p class="text-slate-500 mt-2 font-medium">Gerencie as revistas e os alunos da sua unidade.</p>
            </div>
        </div>
        <div class="absolute -right-20 -top-20 w-64 h-64 bg-amber-50 rounded-full opacity-50"></div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <div class="bg-white p-6 rounded-[2rem] border border-amber-100 card-shadow">
            <div class="flex items-center text-amber-600 mb-4">
                <svg class="w-6 h-6 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-width="2"
                        d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                </svg>
                <span class="font-bold uppercase text-xs tracking-widest">Alunos Ativos</span>
            </div>
            <p class="text-3xl font-black text-slate-900">124</p>
        </div>
    </div>
</x-app-layout>
