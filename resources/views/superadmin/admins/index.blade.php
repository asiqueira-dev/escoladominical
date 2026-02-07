<x-app-layout>
    <x-slot name="header">
        Gerenciar Administradores
    </x-slot>

    <div class="mb-8 flex justify-between items-center">
        <div>
            <h3 class="text-2xl font-black text-slate-900 tracking-tight">Administradores</h3>
            <p class="text-slate-500 font-medium">Lista de gestores com acesso administrativo ao sistema.</p>
        </div>
        <a href="{{ route('superadmin.admins.create') }}"
            class="bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-3 px-6 rounded-xl shadow-lg shadow-indigo-600/20 transition-all flex items-center">
            <svg class="w-5 h-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-width="3" d="M12 4v16m8-8H4" />
            </svg>
            Novo Admin
        </a>
    </div>

    @if (session('status') === 'admin-created')
        <div
            class="bg-emerald-50 border border-emerald-100 text-emerald-700 px-6 py-4 rounded-2xl mb-6 font-bold flex items-center">
            <svg class="w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20">
                <path
                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" />
            </svg>
            Convite enviado com sucesso para o administrador!
        </div>
    @endif

    <div class="bg-white rounded-[2rem] border border-slate-200 card-shadow overflow-hidden">
        <table class="w-full text-left border-collapse">
            <thead class="bg-slate-50 border-b border-slate-100">
                <tr>
                    <th class="px-8 py-4 text-xs font-black text-slate-400 uppercase tracking-wider">Nome</th>
                    <th class="px-8 py-4 text-xs font-black text-slate-400 uppercase tracking-wider">E-mail</th>
                    <th class="px-8 py-4 text-xs font-black text-slate-400 uppercase tracking-wider">Status</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100">
                @foreach ($admins as $admin)
                    <tr class="hover:bg-slate-50/50 transition-colors">
                        <td class="px-8 py-5 flex items-center">
                            <img class="w-10 h-10 rounded-xl object-cover mr-4"
                                src="{{ $admin->avatar ? asset($admin->avatar) : 'https://ui-avatars.com/api/?name=' . urlencode($admin->name) . '&background=6366f1&color=fff' }}">
                            <span class="font-bold text-slate-800">{{ $admin->name }}</span>
                        </td>
                        <td class="px-8 py-5 text-slate-600 font-medium">{{ $admin->email }}</td>
                        <td class="px-8 py-5">
                            @if ($admin->email_verified_at)
                                <span
                                    class="px-3 py-1 bg-emerald-100 text-emerald-700 text-[10px] font-black uppercase rounded-full border border-emerald-200">Verificado</span>
                            @else
                                <span
                                    class="px-3 py-1 bg-amber-100 text-amber-700 text-[10px] font-black uppercase rounded-full border border-amber-200">Pendente</span>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>
