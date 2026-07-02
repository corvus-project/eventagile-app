    <!-- Footer -->
    <footer class="bg-gray-900 text-gray-300 py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid grid-cols-1 md:grid-cols-3 gap-8">

            <!-- Column 1: Brand -->
            <div>
                <p class="text-white font-bold text-lg">EventAgile</p>
                <p class="text-sm mt-2">The simplest way to manage and sell bookable events.</p>
                <p class="text-xs text-gray-500 mt-4">&copy; {{ date('Y') }} EventAgile. All rights reserved.</p>
            </div>

            <!-- Column 2: Page links -->
            <nav aria-label="Footer navigation">
                <ul class="flex flex-wrap gap-x-4 gap-y-2 text-sm">
                    <li><a href="{{ route('home') }}" class="hover:text-white">Home</a></li>
                    <li><a href="{{ route('features') }}" class="hover:text-white">Features</a></li>
                    <li><a href="{{ route('sample-usage') }}" class="hover:text-white">Sample Usage</a></li>
                    <li><a href="{{ route('demo') }}" class="hover:text-white">Live Demo</a></li>
                    <li><a href="{{ route('pricing') }}" class="hover:text-white">Pricing</a></li>
                    <li><a href="{{ route('support') }}" class="hover:text-white">Support</a></li>
                    <li><a href="{{ route('contact') }}" class="hover:text-white">Contact</a></li>
                    <li><a href="{{ route('privacy') }}" class="hover:text-white">Privacy Policy</a></li>
                    <li><a href="{{ route('terms') }}" class="hover:text-white">Terms of Service</a></li>
                </ul>
            </nav>

            <!-- Column 3: Contact + Socials -->
            <div>
                <a href="mailto:support@EventAgile.com"
                    class="text-sm hover:text-white">support@EventAgile.com</a>

                <!-- Social icon links -->
                <div class="flex gap-4 mt-4">

                    <!-- Instagram -->
                    <a href="https://instagram.com/EventAgile"
                        aria-label="Visit our Instagram page"
                        class="min-w-[44px] min-h-[44px] flex items-center justify-center text-gray-400 hover:text-white">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                            <path d="M12 2.163c3.204 0 3.584.012 4.85.07 1.17.054 1.97.24 2.43.403a4.9 4.9 0 0 1 1.772 1.153 4.9 4.9 0 0 1 1.153 1.772c.163.46.35 1.26.403 2.43.058 1.265.07 1.645.07 4.849s-.012 3.584-.07 4.85c-.054 1.17-.24 1.97-.403 2.43a4.9 4.9 0 0 1-1.153 1.772 4.9 4.9 0 0 1-1.772 1.153c-.46.163-1.26.35-2.43.403-1.265.058-1.645.07-4.849.07s-3.584-.012-4.85-.07c-1.17-.054-1.97-.24-2.43-.403a4.9 4.9 0 0 1-1.772-1.153 4.9 4.9 0 0 1-1.153-1.772c-.163-.46-.35-1.26-.403-2.43C2.175 15.584 2.163 15.204 2.163 12s.012-3.584.07-4.85c.054-1.17.24-1.97.403-2.43a4.9 4.9 0 0 1 1.153-1.772 4.9 4.9 0 0 1 1.772-1.153c.46-.163 1.26-.35 2.43-.403C8.416 2.175 8.796 2.163 12 2.163zm0-2.163C8.741 0 8.333.014 7.053.072 5.775.13 4.902.333 4.14.63a7.07 7.07 0 0 0-2.553 1.662A7.07 7.07 0 0 0 .63 4.84C.333 5.602.13 6.475.072 7.753.014 9.033 0 9.441 0 12c0 2.559.014 2.967.072 4.247.058 1.278.261 2.151.558 2.913a7.07 7.07 0 0 0 1.662 2.553 7.07 7.07 0 0 0 2.553 1.662c.762.297 1.635.5 2.913.558C9.033 23.986 9.441 24 12 24s2.967-.014 4.247-.072c1.278-.058 2.151-.261 2.913-.558a7.07 7.07 0 0 0 2.553-1.662 7.07 7.07 0 0 0 1.662-2.553c.297-.762.5-1.635.558-2.913.058-1.28.072-1.688.072-4.247s-.014-2.967-.072-4.247c-.058-1.278-.261-2.151-.558-2.913a7.07 7.07 0 0 0-1.662-2.553A7.07 7.07 0 0 0 19.16.63C18.398.333 17.525.13 16.247.072 14.967.014 14.559 0 12 0zm0 5.838a6.162 6.162 0 1 0 0 12.324 6.162 6.162 0 0 0 0-12.324zm0 10.162a4 4 0 1 1 0-8 4 4 0 0 1 0 8zm6.406-11.845a1.44 1.44 0 1 0 0 2.88 1.44 1.44 0 0 0 0-2.88z" />
                        </svg>
                    </a>

                    <!-- Twitter / X -->
                    <a href="https://twitter.com/EventAgile"
                        aria-label="Visit our Twitter page"
                        class="min-w-[44px] min-h-[44px] flex items-center justify-center text-gray-400 hover:text-white">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                            <path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z" />
                        </svg>
                    </a>

                    <!-- Facebook -->
                    <a href="https://facebook.com/EventAgile"
                        aria-label="Visit our Facebook page"
                        class="min-w-[44px] min-h-[44px] flex items-center justify-center text-gray-400 hover:text-white">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                            <path d="M24 12.073C24 5.405 18.627 0 12 0S0 5.405 0 12.073C0 18.1 4.388 23.094 10.125 24v-8.437H7.078v-3.49h3.047V9.41c0-3.025 1.792-4.697 4.533-4.697 1.312 0 2.686.235 2.686.235v2.97h-1.513c-1.491 0-1.956.93-1.956 1.874v2.25h3.328l-.532 3.49h-2.796V24C19.612 23.094 24 18.1 24 12.073z" />
                        </svg>
                    </a>

                    <!-- LinkedIn -->
                    <a href="https://linkedin.com/company/EventAgile"
                        aria-label="Visit our LinkedIn page"
                        class="min-w-[44px] min-h-[44px] flex items-center justify-center text-gray-400 hover:text-white">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                            <path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433a2.062 2.062 0 0 1-2.063-2.065 2.064 2.064 0 1 1 2.063 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z" />
                        </svg>
                    </a>

                </div>
            </div>

        </div>
    </footer>