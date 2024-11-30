// Fungsi untuk menangani login
function submitLogin() {
    // Ambil nilai dari input username dan password
    const username = document.getElementById("username").value;
    const password = document.getElementById("password").value;

    // Validasi jika kolom kosong
    if (username === "" || password === "") {
        alert("Harap isi semua kolom!");
    } else if (username.toLowerCase() !== "admin") {
        // Validasi username (case insensitive)
    } else if (password !== "1234") {
        // Validasi password
    } else {
        // Login berhasil, arahkan ke halaman index.html
        alert(`Login berhasil untuk user: ${username}`);
        window.location.href = "index.html"; // Redirect ke halaman index
    }
}
