    <!-- Navbar start -->
    <div class="w-full mx-auto fixed top-0 left-0 bg-gray-800">
        <nav class="px-2 pt-3 pb-3">
            <div class="container mx-auto flex flex-wrap items-center justify-between">
                <a href="{{ route('home') }}" class="text-2xl font-bold text-white">RTS<span
                        class="text-yellow-500">CafeAndResto</span>.</a>

                {{-- search bar & button --}}
                <div class="flex lg:order-2 lg:hidden">
                    <div class="hidden relative mr-3 md:mr-0">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="w-5 h-5 text-gray-500" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </div>
                        <input type="text" id="email-adress-icon"
                            class=" bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2"
                            placeholder="Search...">
                    </div>
                    <button data-collapse-toggle="mobile-menu-3" type="button"
                        class="lg:hidden text-gray-400 hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-blue-300 rounded-lg inline-flex items-center justify-center"
                        aria-controls="mobile-menu-3" aria-expanded="false">
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                                clip-rule="evenodd"></path>
                        </svg>
                        <svg class="hidden w-6 h-6" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </button>
                </div>

                {{-- daftar masuk --}}
                <div class="hidden lg:flex items-center md:order-2 gap-2">
                    <a href="{{ route('member.login') }}"
                        class="flex items-center bg-yellow-500 text-gray-800 px-4 py-2 rounded-md hover:bg-yellow-600 transition duration-200">
                        <i data-feather="log-in" class="w-5 h-5 text-white"></i>
                        <span class="text-white ml-2">Masuk</span>
                    </a>
                    <a href="{{ route('member.register') }}"
                        class="flex items-center bg-yellow-500 text-gray-800 px-4 py-2 rounded-md hover:bg-yellow-600 transition duration-200 mr-2">
                        <i data-feather="user-plus" class="w-5 h-5 text-white"></i>
                        <span class="text-white ml-2">Daftar</span>
                    </a>
                </div>

                <div class=" justify-between items-center w-full lg:w-auto lg:order-1" id="mobile-menu-3">
                    <ul class="flex-col lg:flex-row flex lg:space-x-8 mt-4 lg:mt-0 lg:text-sm lg:font-medium">
                        <li>
                            <a href="#home"class="text-white block pl-3 pr-4 py-2 hover:text-yellow-500"
                                aria-current="page">Home</a>
                        </li>
                        <li>
                            <a href="#about" class="text-white block pl-3 pr-4 py-2 hover:text-yellow-500">Tentang
                                Kami</a>
                        </li>
                        <li>
                            <a href="#menu" class="text-white block pl-3 pr-4 py-2 hover:text-yellow-500">Menu</a>
                        </li>
                        <li>
                            <a href="#contact" class="text-white block pl-3 pr-4 py-2 hover:text-yellow-500">Kontak</a>
                        </li>
                        <li>
                            <div class="flex lg:hidden items-center justify-end">
                                <!-- Daftar and Masuk Links -->
                                <a href="{{ route('member.login') }}"
                                    class="flex items-center bg-yellow-500 text-gray-800 px-4 py-2 rounded-md hover:bg-yellow-600 transition duration-200">
                                    <i data-feather="log-in" class="w-5 h-5 text-white"></i>
                                    <span class="text-white ml-2">Masuk</span>
                                </a>
                                <a href="{{ route('member.register') }}"
                                    class="flex items-center bg-yellow-500 text-gray-800 px-4 py-2 rounded-md hover:bg-yellow-600 transition duration-200 mr-2">
                                    <i data-feather="user-plus" class="w-5 h-5 text-white"></i>
                                    <span class="text-white ml-2">Daftar</span>
                                </a>
                            </div>

                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
    <!-- Navbar end -->
