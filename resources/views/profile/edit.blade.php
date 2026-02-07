<x-app-layout>
    <x-slot name="header">
        Configurações de Perfil
    </x-slot>

    <div class="space-y-8 max-w-4xl mx-auto">

        <div class="bg-white p-8 rounded-[2rem] border border-slate-200 card-shadow flex flex-col items-center">
            <h3 class="text-lg font-bold text-slate-800 mb-6">Foto de Perfil</h3>

            <form id="avatar-form" action="{{ route('profile.avatar') }}" method="POST" enctype="multipart/form-data"
                class="relative group cursor-pointer">
                @csrf
                @method('PATCH')

                <input type="file" name="avatar" id="avatar-input" class="hidden" accept="image/*"
                    onchange="document.getElementById('avatar-form').submit();">

                <div onclick="document.getElementById('avatar-input').click();" class="relative">
                    <div
                        class="w-32 h-32 rounded-3xl overflow-hidden ring-4 ring-indigo-50 border-4 border-white shadow-xl group-hover:opacity-75 transition-all">
                        <img src="{{ Auth::user()->avatar ? asset(Auth::user()->avatar) : 'https://ui-avatars.com/api/?name=' . urlencode(Auth::user()->name) . '&background=6366f1&color=fff&size=128' }}"
                            alt="{{ Auth::user()->name }}" class="w-full h-full object-cover">
                    </div>

                    <div
                        class="absolute -bottom-2 -right-2 bg-indigo-600 p-2.5 rounded-2xl text-white shadow-lg group-hover:scale-110 transition-transform">
                        <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 13a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                    </div>
                </div>
            </form>

            {{-- TIPO DE USUÁRIO NO PERFIL --}}
            <div class="mt-6">
                @if (Auth::user()->isSuperAdmin())
                    <span
                        class="inline-flex items-center px-4 py-1.5 rounded-full text-xs font-black bg-indigo-100 text-indigo-700 uppercase tracking-widest border border-indigo-200">
                        Super Administrador
                    </span>
                @elseif(Auth::user()->isAdmin())
                    <span
                        class="inline-flex items-center px-4 py-1.5 rounded-full text-xs font-black bg-amber-100 text-amber-700 uppercase tracking-widest border border-amber-200">
                        Administrador
                    </span>
                @else
                    <span
                        class="inline-flex items-center px-4 py-1.5 rounded-full text-xs font-black bg-slate-100 text-slate-700 uppercase tracking-widest border border-slate-200">
                        Usuário
                    </span>
                @endif
            </div>

            @if (session('status') === 'avatar-updated')
                <p class="mt-4 text-sm font-bold text-emerald-600">Avatar atualizado com sucesso!</p>
            @endif
            <p class="mt-3 text-xs text-slate-400 font-medium">Clique na imagem para alterar</p>
        </div>

        <div class="p-8 bg-white card-shadow rounded-[2rem] border border-slate-100">
            <div class="max-w-xl">
                @include('profile.partials.update-profile-information-form')
            </div>
        </div>

        <div class="p-8 bg-white card-shadow rounded-[2rem] border border-slate-100">
            <div class="max-w-xl">
                @include('profile.partials.update-password-form')
            </div>
        </div>

        <div class="p-8 bg-red-50/30 rounded-[2rem] border border-red-100">
            <div class="max-w-xl">
                @include('profile.partials.delete-user-form')
            </div>
        </div>
    </div>
</x-app-layout>
