{{--
    Reusable navigation bar.
    Included in the master layout so it never needs to be duplicated
    on individual pages. Uses request()->routeIs() to highlight the
    active link.
--}}
<header class="sticky top-0 z-50 bg-white/90 backdrop-blur border-b border-slate-100">
    <nav class="max-w-6xl mx-auto px-6 py-4 flex items-center justify-between">

        <a href="{{ route('home') }}" class="flex items-center gap-2">
            <span class="w-9 h-9 rounded-lg bg-brand-600 text-white flex items-center justify-center font-bold">N</span>
            <span class="text-lg font-bold text-brand-900">NovaWorks</span>
        </a>

        <button id="nav-toggle" class="md:hidden text-slate-700" aria-label="Toggle navigation">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-7 h-7" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
            </svg>
        </button>

        <ul id="nav-menu" class="hidden md:flex items-center gap-8 font-medium text-slate-600">
            <li>
                <a href="{{ route('home') }}"
                   class="hover:text-brand-600 transition {{ request()->routeIs('home') ? 'text-brand-600 font-semibold' : '' }}">
                    Home
                </a>
            </li>
            <li>
                <a href="{{ route('about') }}"
                   class="hover:text-brand-600 transition {{ request()->routeIs('about') ? 'text-brand-600 font-semibold' : '' }}">
                    About
                </a>
            </li>
            <li>
                <a href="{{ route('services') }}"
                   class="hover:text-brand-600 transition {{ request()->routeIs('services') ? 'text-brand-600 font-semibold' : '' }}">
                    Services
                </a>
            </li>
            <li>
                <a href="{{ route('contact') }}"
                   class="rounded-full bg-brand-600 text-white px-5 py-2 hover:bg-brand-700 transition {{ request()->routeIs('contact') ? 'ring-2 ring-brand-300' : '' }}">
                    Contact
                </a>
            </li>
        </ul>
    </nav>

    {{-- Mobile menu --}}
    <div id="nav-menu-mobile" class="hidden md:hidden px-6 pb-4 flex flex-col gap-3 font-medium text-slate-600">
        <a href="{{ route('home') }}" class="hover:text-brand-600">Home</a>
        <a href="{{ route('about') }}" class="hover:text-brand-600">About</a>
        <a href="{{ route('services') }}" class="hover:text-brand-600">Services</a>
        <a href="{{ route('contact') }}" class="hover:text-brand-600">Contact</a>
    </div>
</header>

<script>
    document.getElementById('nav-toggle')?.addEventListener('click', function () {
        document.getElementById('nav-menu-mobile').classList.toggle('hidden');
    });
</script>
