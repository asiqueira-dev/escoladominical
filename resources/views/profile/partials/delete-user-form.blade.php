<section class="space-y-6">
    <header>
        <h2 class="text-lg font-bold text-gray-900">
            {{ __('Deletar Conta') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __('Uma vez que sua conta for excluída, todos os seus recursos e dados serão excluídos permanentemente.') }}
        </p>
    </header>

    <x-danger-button x-data="" x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"
        class="bg-red-600 hover:bg-red-700 py-3 px-6 rounded-xl shadow-lg shadow-red-500/30">{{ __('Deletar Conta') }}</x-danger-button>

    <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
        <form method="post" action="{{ route('profile.destroy') }}" class="p-6">
            @csrf
            @method('delete')

            <h2 class="text-lg font-bold text-gray-900">
                {{ __('Tem certeza que deseja deletar sua conta?') }}
            </h2>

            <p class="mt-1 text-sm text-gray-600">
                {{ __('Uma vez que sua conta for excluída, todos os seus recursos e dados serão excluídos permanentemente. Por favor, digite sua senha para confirmar.') }}
            </p>

            <div class="mt-6">
                <x-input-label for="password" value="{{ __('Senha') }}" class="sr-only" />

                <x-text-input id="password" name="password" type="password"
                    class="mt-1 block w-3/4 rounded-xl border-gray-300 py-3"
                    placeholder="{{ __('Digite sua senha') }}" />

                <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2" />
            </div>

            <div class="mt-6 flex justify-end">
                <x-secondary-button x-on:click="$dispatch('close')" class="rounded-xl py-3">
                    {{ __('Cancelar') }}
                </x-secondary-button>

                <x-danger-button class="ms-3 bg-red-600 hover:bg-red-700 rounded-xl py-3 shadow-lg shadow-red-500/30">
                    {{ __('Deletar Conta') }}
                </x-danger-button>
            </div>
        </form>
    </x-modal>
</section>
