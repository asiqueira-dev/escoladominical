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
                        class="absolute inset-0 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity bg-slate-900/20 rounded-3xl">
                        <svg class="w-8 h-8 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 13a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                    </div>
                </div>
            </form>

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
