<x-app-layout>
    <x-slot name="header">
        Cadastrar Novo Administrador
    </x-slot>

    <div class="max-w-2xl mx-auto">
        <div class="bg-white p-8 rounded-[2rem] border border-slate-200 card-shadow">
            <header class="mb-8">
                <h2 class="text-xl font-bold text-slate-800">Informações do Administrador</h2>
                <p class="text-sm text-slate-500 mt-1">
                    Um e-mail de verificação será enviado para que o novo admin defina sua senha e confirme o acesso.
                </p>
            </header>

            <form method="POST" action="{{ route('superadmin.admins.store') }}" class="space-y-6">
                @csrf

                <div>
                    <x-input-label for="name" :value="__('Nome Completo')" class="mb-1" />
                    <x-text-input id="name" name="name" type="text"
                        class="mt-1 block w-full rounded-xl border-slate-300 py-3" :value="old('name')" required
                        autofocus />
                    <x-input-error class="mt-2" :messages="$errors->get('name')" />
                </div>

                <div>
                    <x-input-label for="email" :value="__('E-mail Profissional')" class="mb-1" />
                    <x-text-input id="email" name="email" type="email"
                        class="mt-1 block w-full rounded-xl border-slate-300 py-3" :value="old('email')" required />
                    <x-input-error class="mt-2" :messages="$errors->get('email')" />
                </div>

                <div>
                    <x-input-label for="whatsapp" :value="__('WhatsApp')" class="mb-1" />
                    <x-text-input id="whatsapp" name="whatsapp" type="text"
                        class="mt-1 block w-full rounded-xl border-slate-300 py-3" :value="old('whatsapp')" required
                        placeholder="Ex: 5511999999999" />
                    <x-input-error class="mt-2" :messages="$errors->get('whatsapp')" />
                </div>

                <div class="flex items-center justify-end mt-8 gap-4">
                    <a href="{{ route('superadmin.admins.index') }}"
                        class="text-sm font-bold text-slate-500 hover:text-slate-700 transition-colors">Cancelar</a>
                    <x-primary-button
                        class="bg-indigo-600 hover:bg-indigo-700 py-3 px-8 rounded-xl shadow-lg shadow-indigo-500/30">
                        {{ __('Enviar Convite') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
