<x-app-layout>
    <x-slot name="header">
        Meu Painel de Usuário
    </x-slot>

    <div class="relative bg-white p-8 rounded-[2rem] border border-slate-200 overflow-hidden mb-8 card-shadow">
        <div class="relative z-10">
            <h3 class="text-2xl font-extrabold text-slate-900 tracking-tight">Olá, {{ Auth::user()->name }}! 👋</h3>
            <p class="text-slate-500 mt-2 font-medium">Sua próxima aula na <span
                    class="text-indigo-600 font-bold">{{ Auth::user()->congregacao->nome ?? 'sua congregação' }}</span>
                está chegando.</p>
        </div>
    </div>

    <div class="grid grid-cols-1 gap-6">
        <div class="bg-indigo-600 p-8 rounded-[2rem] text-white shadow-xl shadow-indigo-200">
            <h4 class="text-xl font-bold mb-4">Revista do Trimestre</h4>
            <p class="opacity-80 mb-6">Acesse o conteúdo digital da sua revista e acompanhe as lições semanais.</p>
            <a href="#"
                class="inline-block px-8 py-3 bg-white text-indigo-600 font-bold rounded-xl transition-transform hover:scale-105">Abrir
                Revista</a>
        </div>
    </div>
</x-app-layout>
