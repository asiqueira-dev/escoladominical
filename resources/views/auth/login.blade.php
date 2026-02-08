<x-guest-layout>
    @if (session('verified_success'))
        <div id="alert-verified" class="fixed top-5 right-5 z-50 transform transition-all duration-500">
            <div class="bg-green-600 text-white px-6 py-4 rounded-2xl shadow-2xl flex items-center gap-3">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <div>
                    <p class="font-bold">Sucesso!</p>
                    <p class="text-xs text-green-100">Seu e-mail foi verificado. Dados de acesso enviados por e-mail.
                    </p>
                </div>
            </div>
        </div>

        <script>
            setTimeout(function() {
                const alert = document.getElementById('alert-verified');
                if (alert) {
                    alert.style.opacity = '0';
                    alert.style.transform = 'translateY(-20px)';
                    setTimeout(() => alert.remove(), 500);
                }
            }, 5000);
        </script>
    @endif

    <div class="mb-6">
        <h2 class="text-2xl font-bold text-gray-800">Bem-vindo(a)</h2>
        <p class="text-sm text-gray-500">Insira suas credenciais para acessar.</p>
    </div>

    <form method="POST" action="{{ route('login') }}" class="space-y-5">
        @csrf

        <div>
            <label for="email" class="block text-sm font-medium text-gray-700 mb-1">E-mail</label>
            <div class="relative">
                <div class="input-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-5 h-5">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75" />
                    </svg>
                </div>
                <input id="email"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-xl focus:ring-indigo-500 focus:border-indigo-500 block w-full input-with-icon p-3 transition-all"
                    type="email" name="email" value="{{ old('email') }}" required autofocus
                    placeholder="seu@email.com" />
            </div>
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div>
            <div class="flex justify-between items-center mb-1">
                <label for="password" class="block text-sm font-medium text-gray-700">Senha</label>
                @if (Route::has('password.request'))
                    <a class="text-xs font-semibold text-indigo-600" href="{{ route('password.request') }}">Esqueceu a
                        senha?</a>
                @endif
            </div>
            <div class="relative">
                <div class="input-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-5 h-5">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M16.5 10.5V6.75a4.5 4.5 0 10-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 002.25-2.25v-6.75a2.25 2.25 0 00-2.25-2.25H6.75a2.25 2.25 0 00-2.25 2.25v6.75a2.25 2.25 0 002.25 2.25z" />
                    </svg>
                </div>
                <input id="password"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-xl focus:ring-indigo-500 focus:border-indigo-500 block w-full input-with-icon p-3 transition-all"
                    type="password" name="password" required placeholder="••••••••" />
                <button type="button" id="toggleLoginPass" onclick="togglePassword('password', 'toggleLoginPass')"
                    class="btn-eye">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-5 h-5">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                </button>
            </div>
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <div class="block">
            <label for="remember_me" class="inline-flex items-center cursor-pointer">
                <input id="remember_me" type="checkbox"
                    class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500 w-4 h-4"
                    name="remember">
                <span class="ms-2 text-sm text-gray-600">Lembrar-me neste dispositivo</span>
            </label>
        </div>

        <button type="submit"
            class="w-full text-white bg-indigo-600 hover:bg-indigo-700 font-medium rounded-xl text-sm px-5 py-3.5 shadow-lg transition-all active:scale-95">
            Entrar no Sistema
        </button>
    </form>

    <div class="mt-8 pt-6 border-t border-gray-100 text-center">
        <p class="text-sm text-gray-500">Ainda não tem conta?</p>
        <a href="{{ route('register') }}" class="mt-2 inline-block text-sm font-bold text-indigo-600">Criar nova
            conta</a>
    </div>
</x-guest-layout>
