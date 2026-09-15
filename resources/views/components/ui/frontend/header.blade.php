<!-- Skip navigation link — first focusable element in <body> -->
<a href="#main-content" class="sr-only focus:not-sr-only focus:absolute focus:top-4 focus:left-4 focus:z-50 focus:px-4 focus:py-2 focus:bg-white focus:text-blue-700 focus:font-semibold focus:rounded focus:outline focus:outline-2 focus:outline-blue-700">Skip to main content</a>

<!-- Navigation -->
<header>
    <nav x-data="{ open: false }" aria-label="Main navigation"
        class="bg-white border-b border-gray-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex items-center justify-between h-16">

            <!-- Logo -->
            <a href="{{ route('home') }}" aria-label="EventAgile — go to home page"
                class="text-xl font-bold text-blue-600">EventAgile</a>

            <!-- Desktop links (hidden below md) -->
            <ul class="hidden md:flex gap-6 text-sm font-medium text-gray-700">
                <li><a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? ' text-blue-600' : 'hover:text-blue-600' }}">Home</a></li>
                <li><a href="{{ route('features') }}" class="{{ request()->routeIs('features') ? ' text-blue-600' : 'hover:text-blue-600' }}">Features</a></li>
                <li><a href="{{ route('sample-usage') }}" class="{{ request()->routeIs('sample-usage') ? ' text-blue-600' : 'hover:text-blue-600' }}">Sample Usage</a></li>
                <li><a href="{{ route('demo') }}" class="{{ request()->routeIs('demo') ? ' text-blue-600' : 'hover:text-blue-600' }}">Live Demo</a></li>
                <li><a href="{{ route('pricing') }}" class="{{ request()->routeIs('pricing') ? ' text-blue-600' : 'hover:text-blue-600' }}">Pricing</a></li>
                <li><a href="{{ route('support') }}" class="{{ request()->routeIs('support') ? ' text-blue-600' : 'hover:text-blue-600' }}">Support</a></li>
                <li><a href="{{ route('contact') }}" class="{{ request()->routeIs('contact') ? ' text-blue-600' : 'hover:text-blue-600' }}">Contact</a></li>
            </ul>

            <!-- CTA + hamburger -->
            <div class="flex items-center gap-3">
                <a href="{{ route('signup') }}"
                    class="hidden md:inline-flex items-center px-4 py-2 bg-blue-600 text-white text-sm font-semibold rounded-lg hover:bg-blue-700 focus:outline focus:outline-2 focus:outline-offset-2 focus:outline-blue-600 min-h-[44px]">
                    Get Started Free
                </a>
                <button @click="open = !open"
                    :aria-expanded="open.toString()"
                    aria-controls="mobile-menu"
                    aria-label="Open navigation menu"
                    class="md:hidden p-2 rounded-lg text-gray-500 hover:bg-gray-100 focus:outline focus:outline-2 focus:outline-blue-600 min-w-[44px] min-h-[44px]">
                    <svg aria-hidden="true" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
            </div>
        </div>

        <!-- Mobile menu -->
        <div id="mobile-menu" x-show="open" x-transition class="md:hidden border-t border-gray-200">
            <ul class="flex flex-col px-4 py-3 gap-2 text-sm font-medium text-gray-700">
                <li><a href="{{ route('home') }}" class="block py-2 min-h-[44px] flex items-center {{ request()->routeIs('home') ? 'underline text-blue-600' : 'hover:text-blue-600' }}">Home</a></li>
                <li><a href="{{ route('features') }}" class="block py-2 min-h-[44px] flex items-center {{ request()->routeIs('features') ? 'underline text-blue-600' : 'hover:text-blue-600' }}">Features</a></li>
                <li><a href="{{ route('sample-usage') }}" class="block py-2 min-h-[44px] flex items-center {{ request()->routeIs('sample-usage') ? 'underline text-blue-600' : 'hover:text-blue-600' }}">Sample Usage</a></li>
                <li><a href="{{ route('demo') }}" class="block py-2 min-h-[44px] flex items-center {{ request()->routeIs('demo') ? 'underline text-blue-600' : 'hover:text-blue-600' }}">Live Demo</a></li>
                <li><a href="{{ route('pricing') }}" class="block py-2 min-h-[44px] flex items-center {{ request()->routeIs('pricing') ? 'underline text-blue-600' : 'hover:text-blue-600' }}">Pricing</a></li>
                <li><a href="{{ route('support') }}" class="block py-2 min-h-[44px] flex items-center {{ request()->routeIs('support') ? 'underline text-blue-600' : 'hover:text-blue-600' }}">Support</a></li>
                <li><a href="{{ route('contact') }}" class="block py-2 min-h-[44px] flex items-center {{ request()->routeIs('contact') ? 'underline text-blue-600' : 'hover:text-blue-600' }}">Contact</a></li>
                <li>
                    <a href="{{ route('signup') }}"
                        class="block mt-2 px-4 py-2 bg-blue-600 text-white text-center rounded-lg hover:bg-blue-700 min-h-[44px] flex items-center justify-center">
                        Get Started Free
                    </a>
                </li>
            </ul>
        </div>
    </nav>
</header>