<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WeddingSebelas Navbar</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <nav class="navbar">
        <div class="navbar-logo">
            <img src="profile-image.jpg" alt="Profile" class="profile-image">
            <span>WeddingSebelas</span>
        </div>
        <ul class="navbar-links">
            <li><a href="home">Beranda</a></li>
            <li><a href="#">Projek</a></li>
            <li><a href="bookinggedung">Booking</a></li>
            <li><a href="#">Tentang Kami</a></li>
            <li><a href="#">Kontak Kami</a></li>
        </ul>
        <div class="navbar-icons">
            <a href="keranjang"><i class="fa fa-shopping-cart"></i></a>
            <a href="#"><i class="fa fa-search"></i></a>
            <div class="dropdown">
                <img src="profile-image.jpg" alt="Profile" class="profile-image" onclick="toggleDropdown()">
                <div class="dropdown-content" id="dropdownContent">
                    <a href="/datadiri">Profile</a>
                    <a href="/historiorder">Histori Order</a>
                    <a href="/logout">Logout</a>
                </div>
            </div>
        </div>
    </nav>

    <script src="script.js"></script>
</body>
</html>

<style>
    /* Global styles */
body {
    margin: 0;
    font-family: Arial, sans-serif;
}

/* Navbar styles */
.navbar {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 10px 20px;
    background-color: #f1f3ff;
    border-radius: 30px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}

.navbar-logo {
    display: flex;
    align-items: center;
}

.navbar-logo img {
    width: 40px;
    height: 40px;
    border-radius: 50%;
    margin-right: 10px;
}

.navbar-links {
    display: flex;
    list-style: none;
    margin: 0;
    padding: 0;
}

.navbar-links li {
    margin: 0 10px;
}

.navbar-links a {
    text-decoration: none;
    color: #4a4aff;
    font-weight: bold;
    padding: 10px 20px;
    border-radius: 30px;
    transition: background-color 0.3s ease;
}

.navbar-links a:hover {
    background-color: #e0e0ff;
}

.navbar-icons {
    display: flex;
    align-items: center;
}

.navbar-icons a {
    color: #4a4aff;
    margin: 0 10px;
    font-size: 20px;
}

.navbar-icons img {
    width: 40px;
    height: 40px;
    border-radius: 50%;
    margin-left: 10px;
}

.profile-image {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            cursor: pointer;
        }

        /* Container dropdown */
        .dropdown {
            position: relative;
            display: inline-block;
        }

        /* Isi dropdown */
        .dropdown-content {
            display: none; /* Sembunyikan dropdown secara default */
            position: absolute;
            right: 0;
            background-color: #f9f9f9;
            min-width: 160px;
            box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
            z-index: 1;
        }

        /* Link di dalam dropdown */
        .dropdown-content a {
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
        }

        /* Hover efek untuk link dropdown */
        .dropdown-content a:hover {
        background-color: #f1f1f1;
        }
</style>

<script>
    // Toggle dropdown saat gambar diklik
    function toggleDropdown() {
        const dropdownContent = document.getElementById("dropdownContent");
        dropdownContent.style.display = dropdownContent.style.display === "block" ? "none" : "block";
    }

    // Tutup dropdown saat klik di luar
    window.onclick = function(event) {
        const dropdownContent = document.getElementById("dropdownContent");
        if (!event.target.matches('.profile-image')) {
            dropdownContent.style.display = "none";
        }
    }
</script>