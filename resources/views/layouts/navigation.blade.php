<div x-show="sidebarOpen" @click="sidebarOpen = false" x-cloak
    x-transition:enter="transition-opacity ease-linear duration-300" x-transition:enter-start="opacity-0"
    x-transition:enter-end="opacity-100" class="fixed inset-0 bg-slate-900/60 z-40 lg:hidden backdrop-blur-sm"></div>

<aside :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'"
    class="fixed inset-y-0 left-0 z-50 w-72 bg-[#1e293b] shadow-2xl transition-transform duration-300 ease-in-out lg:translate-x-0 lg:static lg:inset-auto flex flex-col">

    <div class="flex items-center px-8 h-24 shrink-0 border-b border-slate-700/50">
        <a href="{{ route('dashboard') }}" class="flex items-center space-x-3 group">
            <div
                class="p-2.5 bg-indigo-600 rounded-xl shadow-lg shadow-indigo-500/20 group-hover:scale-110 transition-transform">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                    stroke="currentColor" class="w-6 h-6 text-white">
                    <path
                        d="M12 6.042A8.967 8.967 0 006 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 016 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 016-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0018 18a8.967 8.967 0 00-6 2.292m0-14.25v14.25" />
                </svg>
            </div>
            <span class="text-xl font-bold text-white tracking-tight">EBD <span
                    class="text-indigo-400">Digital</span></span>
        </a>
    </div>

    <nav class="flex-1 px-4 py-6 space-y-2 overflow-y-auto no-scrollbar">
        <a href="{{ route('dashboard') }}"
            class="flex items-center px-4 py-3.5 text-sm font-semibold rounded-2xl transition-all duration-200 {{ request()->routeIs('dashboard') ? 'bg-indigo-600 text-white shadow-lg shadow-indigo-600/20' : 'text-slate-400 hover:bg-slate-800/50 hover:text-white' }}">
            <svg class="w-5 h-5 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path
                    d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
            </svg>
            Dashboard
        </a>

        <a href="#"
            class="flex items-center px-4 py-3.5 text-sm font-semibold text-slate-400 rounded-2xl hover:bg-slate-800/50 hover:text-white transition-all duration-200">
            <svg class="w-5 h-5 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path
                    d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
            </svg>
            Revistas da EBD
        </a>
    </nav>

    <div class="p-4 border-t border-slate-700/50 bg-[#161e2e]">
        <div class="flex items-center p-3 rounded-2xl bg-slate-800/40 border border-slate-700/50 shadow-inner">
            <div class="shrink-0 relative">
                <img class="w-10 h-10 rounded-xl object-cover ring-2 ring-slate-700"
                    src="{{ Auth::user()->avatar ? asset(Auth::user()->avatar) : 'https://ui-avatars.com/api/?name=' . urlencode(Auth::user()->name) . '&background=6366f1&color=fff' }}"
                    alt="{{ Auth::user()->name }}">
                <div class="absolute -bottom-1 -right-1 w-4 h-4 bg-emerald-500 border-2 border-[#1e293b] rounded-full">
                </div>
            </div>
            <div class="ml-3 min-w-0 flex-1">
                <p class="text-sm font-bold text-white truncate leading-none mb-1">{{ Auth::user()->name }}</p>

                {{-- TIPO DE USUÁRIO --}}
                @if (Auth::user()->isSuperAdmin())
                    <span class="text-[10px] uppercase tracking-wider font-extrabold text-indigo-400">Super Admin</span>
                @elseif(Auth::user()->isAdmin())
                    <span
                        class="text-[10px] uppercase tracking-wider font-extrabold text-amber-400">Administrador</span>
                @else
                    <span class="text-[10px] uppercase tracking-wider font-extrabold text-slate-400">Usuário</span>
                @endif
            </div>
            <a href="{{ route('profile.edit') }}"
                class="p-2 text-slate-400 hover:text-white hover:bg-slate-700/50 rounded-lg transition-colors">
                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path
                        d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                    <path d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                </svg>
            </a>
        </div>
    </div>
</aside>
