<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Utama</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <?php
    session_start();
    if (isset($_SESSION['username'])) {
        $username = $_SESSION['username'];
        echo "<header>
                <h1>Gamer's Haven</h1>
                <nav>
                    <ul>
                        <li><a href='#'>Home</a></li>
                        <li><a href='logout.php'>Logout</a></li>
                    </ul>
                </nav>
                <p>Selamat Datang, $username!</p>
              </header>";
    } else {
        echo "<header>
                <h1>Gamer's Haven</h1>
                <nav>
                    <ul>
                        <li><a href='#'>Home</a></li>
                        <li><a href='login.html'>Login</a></li>
                        <li><a href='register.html'>Register</a></li>
                    </ul>
                </nav>
              </header>";
    }
    ?>
    <main>
        <h2>Daftar Item Barang</h2>
        <div class="container">
            <div class="row">
                <div class="item">
                    <img src="assets/Mouse Corsair Ironclaw.jpg" alt="Mouse Gaming">
                    <h3>Mouse Gaming</h3>
                    <p>Harga: $59,99</p>
                    <button onclick="beli()">Beli</button>
                </div>
                <div class="item">
                    <img src="assets/keyboard corsair k70.jpg" alt="Keyboard Mechanik">
                    <h3>Keyboard Mechanik</h3>
                    <p>Harga: $130</p>
                    <button onclick="beli()">Beli</button>
                </div>
                <div class="item">
                    <img src="assets/Wireless Gaming Headset G733.jpg" alt="Headset Gaming">
                    <h3>Headset Gaming</h3>
                    <p>Harga: $99,99</p>
                    <button onclick="beli()">Beli</button>
                </div>
                <div class="item">
                    <img src="assets/mousepad gaming.jpg" alt="Mousepad Gaming">
                    <div class="item-info">
                        <h3>Mousepad Gaming</h3>
                        <p>Harga : $19,99</p>
                        <button onclick="Beli()">Beli</button>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <footer>
        <p>&copy; 2024 Toko Gaming. All rights reserved.</p>
    </footer>
</body>
</html>
