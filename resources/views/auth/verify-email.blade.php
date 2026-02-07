<x-guest-layout>
    <div class="mb-6 text-center">
        <div class="inline-flex items-center justify-center w-12 h-12 rounded-full bg-yellow-100 mb-4">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="w-6 h-6 text-yellow-600">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75" />
            </svg>
        </div>
        <h2 class="text-xl font-bold text-gray-800">Verifique seu E-mail</h2>
        <p class="mt-2 text-sm text-gray-500 leading-relaxed">
            Obrigado por se inscrever! Antes de começar, verifique seu endereço de e-mail clicando no link que acabamos
            de enviar para você.
        </p>
    </div>

    @if (session('status') == 'verification-link-sent')
        <div
            class="mb-6 font-medium text-sm text-center text-green-600 bg-green-50 p-3 rounded-lg border border-green-100">
            Um novo link de verificação foi enviado para o e-mail cadastrado.
        </div>
    @endif

    <div class="space-y-4">
        <form method="POST" action="{{ route('verification.send') }}">
            @csrf
            <button type="submit"
                class="w-full text-white bg-indigo-600 hover:bg-indigo-700 focus:ring-4 focus:ring-indigo-300 font-medium rounded-xl text-sm px-5 py-3.5 text-center shadow-lg shadow-indigo-500/30 transition-all transform active:scale-95">
                Reenviar E-mail de Verificação
            </button>
        </form>

        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit"
                class="w-full text-gray-700 bg-white border border-gray-300 hover:bg-gray-50 focus:ring-4 focus:ring-gray-200 font-medium rounded-xl text-sm px-5 py-3.5 text-center transition-all">
                Sair
            </button>
        </form>
    </div>
</x-guest-layout>
