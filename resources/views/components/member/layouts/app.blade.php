<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,400;0,700&display=swap"
        rel="stylesheet">

    <!-- link css -->
    <link rel="stylesheet" href="{{ asset('RTS/asset/css/style.css') }}">

    <!-- Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

    <!-- Feather Icons -->
    <script src="https://unpkg.com/feather-icons"></script>
</head>

<body class="font-poppins">

    @if (Auth::check())
        @include('components.member.includes.navbar-auth')
    @else
        @include('components.member.includes.navbar')
    @endif
    @yield('content')

    @include('components.member.includes.footer')

    <!-- Feather Icons -->
    <script>
        feather.replace()
    </script>

    <!-- import script -->
    <script src="https://unpkg.com/@themesberg/flowbite@1.1.1/dist/flowbite.bundle.js"></script>

    <!-- script untuk mengirimkan pesan -->
    <script>
        function sendEmail() {
            // Get values from the input fields
            const emailField = document.getElementById('email').value;
            const messageField = document.getElementById('message').value;

            // Construct mailto link
            const mailtoLink =
                `mailto:test@gmail.com?subject=Pesan dari ${encodeURIComponent(emailField)}&body=${encodeURIComponent(messageField)}`;

            // Redirect to mailto link
            window.location.href = mailtoLink;
        }
    </script>

    <script>
        // Dropdown toggle functionality
        document.getElementById('profile-button-mobile').addEventListener('click', function() {
            const dropdownMenu = document.getElementById('dropdown-menu-mobile');
            dropdownMenu.classList.toggle('hidden'); // Toggle the 'hidden' class to show/hide the dropdown
        });

        // Optional: Close dropdown when clicking outside
        document.addEventListener('click', function(event) {
            const dropdownMenu = document.getElementById('dropdown-menu-mobile');
            const profileButton = document.getElementById('profile-button-mobile');

            // Check if the clicked element is not the dropdown or the button
            if (!dropdownMenu.contains(event.target) && !profileButton.contains(event.target)) {
                dropdownMenu.classList.add('hidden'); // Hide dropdown
            }
        });
    </script>
    <script>
        // Function to open the modal
        function openModal(productId) {
            const modal = document.getElementById(`modal-${productId}`);
            modal.classList.remove('hidden'); // Show modal
            modal.classList.add('flex'); // Make it visible as flex
        }

        // Function to close the modal
        function closeModal(productId) {
            const modal = document.getElementById(`modal-${productId}`);
            modal.classList.remove('flex'); // Hide modal
            modal.classList.add('hidden'); // Keep it hidden
        }

        const price = document.getElementById('price-modal').value

        // Function to dynamically update the total price based on the quantity
        document.querySelectorAll('input[type="number"]').forEach(input => {
            input.addEventListener('input', function() {
                const productId = this.id.split('-')[1];
                const quantity = this.value;
                const total = price * quantity;
                document.getElementById('price-modal').value = total;
                document.getElementById(`total-${productId}`).textContent = `IDR ${total.toLocaleString()}`;
            });
        });
    </script>


    <!-- script js index -->
    <script src="{{ asset('RTS/asset/js/script.js') }}"></script>
</body>

</html>
