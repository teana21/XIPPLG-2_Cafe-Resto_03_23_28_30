@extends('components.member.layouts.app')

@section('title', 'RTS Cafe and Resto')

@section('content')
    <!-- Hero Section start -->
    <section id="home" class="h-screen bg-cover bg-center text-white flex items-center justify-center"
        style="background-image: url('{{ asset('RTS/asset/images/Desain\ atas\ box\ steak\ RTS.jpg') }}');">
        <div class="text-center">
            <h1 class="text-4xl md:text-6xl font-bold">Mari Nikmati <span class="text-yellow-500">Steak</span></h1>
            <p class="mt-4 text-lg">Begitu banyak rasa di setiap gigitan.</p>
        </div>
    </section>
    <!-- Hero Section end -->

    <!-- About Section start -->
    <section id="about" class="py-16 bg-gray-100">
        <div class="container mx-auto px-8">
            <h2 class="text-3xl font-bold text-center"><span class="text-yellow-500">Tentang</span> Kami</h2>
            <div class="mt-8 flex flex-col md:flex-row items-center space-y-8 md:space-y-0 md:space-x-8">
                <img src="{{ asset('RTS/asset/images/tentang-kami.jpg') }}" alt="Tentang Kami"
                    class="w-full md:w-1/2 rounded-lg shadow-lg">
                <div class="text-center md:text-left">
                    <h3 class="text-xl font-semibold">Kenapa di namakan Roof Top Sari Cafe and Resto ?</h3>
                    <p class="mt-4">Hal ini berasal dari kata Roof yaitu atap dan kata Top itu atas, sedangkan Sari
                        adalah nama
                        yang biasanya di pakai oleh keluarga pemilik resto.</p>
                    <p class="mt-4">Jadi arti dan maksud dari nama tersebut adalah cafe dan resto sari yang berada di
                        atas atap.
                    </p>
                </div>
            </div>
        </div>
    </section>
    <!-- About Section end -->

    <!-- Menu Section start -->
    <section id="menu" class="py-16">
        <div class="container mx-auto px-4 sm:px-8">
            <h2 class="text-3xl font-bold text-center">
                <span class="text-yellow-500">Menu</span> Kami
            </h2>
            <p class="text-center mt-2 text-gray-600">Dengan pilihan menu yang banyak.</p>

            @if ($products && $products->count() > 0)
                <div class="mt-8 grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3">
                    @foreach ($products as $product)
                        <!-- Product Card with Link -->
                        <a href="javascript:void(0)" onclick="openModal({{ $product->id }})"
                            class="menu-item flex flex-col items-center bg-white rounded-lg shadow-2xl p-4 gap-4 sm:flex-row cursor-pointer">
                            <!-- Product Image -->
                            <img src="{{ asset('storage/covers/' . $product->cover) }}" alt="{{ $product->name }}"
                                class="w-32 h-32 object-cover rounded-lg" />

                            <!-- Product Basic Details -->
                            <div class="text-center sm:text-left">
                                <h3 class="font-bold text-lg text-gray-600">{{ $product->name }}</h3>
                                <p class="text-gray-600">IDR {{ number_format($product->price, 0) }}</p>
                            </div>
                        </a>

                        <!-- Modal (Initially Hidden) -->
                        <div id="modal-{{ $product->id }}"
                            class="modal hidden fixed inset-0 bg-gray-900 bg-opacity-50 z-50 flex justify-center items-center">
                            <!-- Modal Content -->
                            <div class="modal-content bg-white p-6 rounded-lg shadow-xl w-11/12 sm:w-1/3">
                                <!-- Modal Header (Close Button) -->
                                <div class="flex justify-between items-center mb-4">
                                    <h4 class="text-2xl font-bold text-gray-700">{{ $product->name }}</h4>
                                    <button onclick="closeModal({{ $product->id }})"
                                        class="text-gray-500 hover:text-gray-800">
                                        &times;
                                    </button>
                                </div>

                                <!-- Quantity and Total Price -->
                                <div class="mb-4 flex items-center gap-4">
                                    <input type="number" id="quantity-{{ $product->id }}" min="1" value="1"
                                        class="w-16 p-2 border border-gray-300 rounded-md" />
                                    <span class="text-xl font-semibold text-gray-700" id="total-{{ $product->id }}">
                                        IDR {{ number_format($product->price, 0) }}
                                    </span>
                                </div>

                                <!-- Address Form Section -->
                                <div class="mb-4">

                                    <!-- Address Input Form -->
                                    <form id="address-form-{{ $product->id }}" action="{{ route('member.checkout') }}"
                                        method="POST">
                                        @csrf
                                        <div class="space-y-4">

                                            <input type="hidden" id="price-modal" name="price"
                                                value="{{ $product->price }}">
                                            <div>
                                                <label for="phone" class="block text-gray-700 font-medium">Nomor
                                                    Telepon</label>
                                                <input type="tel" id="phone" name="no_telp"
                                                    class="w-full p-2 border border-gray-300 rounded-md"
                                                    placeholder="Nomor telepon Anda" required />
                                            </div>

                                            <!-- Submit Button -->
                                            <div class="mt-4 flex justify-center">
                                                <button type="submit"
                                                    class="bg-yellow-500 text-white px-6 py-2 rounded-md hover:bg-yellow-600 transition duration-200">
                                                    Beli Sekarang
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>

                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="mt-8 ">
                    <p style="color: red; font-size:16px; text-align: center;">Maaf Product Belum Tersedia</p>
                </div>
            @endif
        </div>
    </section>
    <!-- Menu Section end -->


    <!-- Contact Section start -->
    <section id="contact" class="py-16 bg-gray-100">
        <div class="container mx-auto px-8">
            <h2 class="text-3xl font-bold text-center">
                <span class="text-yellow-500">Kontak</span> Kami
            </h2>
            <p class="text-center mt-2 text-gray-600">
                Hubungi kami melalui email dengan mudah.
            </p>
            <div
                class="mt-8 max-w-lg mx-auto bg-white p-8 rounded-xl shadow-lg hover:shadow-2xl transition-shadow duration-300">
                <form id="contactForm" class="space-y-6" onsubmit="sendEmail(); return false;">
                    <!-- Email -->
                    <div class="flex items-center border-b border-gray-300 py-3">
                        <i data-feather="mail" class="text-gray-400"></i>
                        <input type="email" id="email" placeholder="Email"
                            class="ml-4 w-full focus:ring-2 focus:ring-yellow-500 focus:border-yellow-500 py-3 px-4 rounded-lg transition-all duration-300"
                            required />
                    </div>

                    <!-- Pesan -->
                    <div class="flex items-center border-b border-gray-300 py-3">
                        <i data-feather="message-circle" class="text-gray-400"></i>
                        <textarea id="message" placeholder="Pesan Anda"
                            class="ml-4 w-full focus:ring-2 focus:ring-yellow-500 focus:border-yellow-500 py-3 px-4 rounded-lg transition-all duration-300"
                            rows="4" required></textarea>
                    </div>

                    <!-- Submit Button -->
                    <button type="submit"
                        class="w-full bg-yellow-500 text-white py-3 px-4 rounded-lg hover:bg-yellow-600 transition duration-200">
                        Kirim Pesan
                    </button>
                </form>
            </div>
        </div>
    </section>
    <!-- Contact Section end -->

    @if (session('success'))
        <script>
            alert("{{ session('success') }}");
        </script>
    @endif


@endsection
