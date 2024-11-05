<html>
    <meta name="csrf-token" content="{{ csrf_token() }}">

</html>

<nav class="navbar">
    <h2 style="margin-right: 300px;">Jelajahi</h2>
    <ul>
        <li><a href="{{ url('bookinggedung') }}" class="nav-link {{ Request::is('bookinggedung') ? 'active' : '' }}">Gedung</a></li>
        <li><a href="{{ url('bookingkatering') }}" class="nav-link {{ Request::is('bookingkatering') ? 'active' : '' }}">Katering</a></li>
        <li><a href="{{ url('bookingdekor') }}" class="nav-link {{ Request::is('bookingdekor') ? 'active' : '' }}">Dekorasi</a></li>
        <li><a href="{{ url('bookingdokumentasi') }}" class="nav-link {{ Request::is('bookingdokumentasi') ? 'active' : '' }}">Dokumentasi</a></li>
        <li><a href="{{ url('bookinghiburan') }}" class="nav-link {{ Request::is('bookinghiburan') ? 'active' : '' }}">Hiburan</a></li>
        <li><a href="{{ url('bookingbridalstyle') }}" class="nav-link {{ Request::is('bookingbridalstyle') ? 'active' : '' }}">MUA</a></li>
        <li><a href="{{ url('bookingsouvenir') }}" class="nav-link {{ Request::is('bookingsouvenir') ? 'active' : '' }}">Souvenir</a></li>
        <li><a href="{{ url('bookingundangan') }}" class="nav-link {{ Request::is('bookingundangan') ? 'active' : '' }}">Undangan</a></li>
    </ul>
</nav>

<style>
body {
    font-family: Arial, sans-serif;
}

.navbar {
    margin-top: 100px;
    background-color: #F4F7FE;
}

.navbar ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
}

.navbar ul li {
    float: left;
    
}

.navbar ul li a {
    display: block;
    color: #7551FF;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
}

.navbar ul li a:hover {
    background-color: #7551FF;
    color: #F4F7FE;
    border-radius: 77.57px;
}

/* This class is for the active link */
.navbar ul li a.active {
    background-color: #7551FF;
    color: #F4F7FE;
    border-radius: 77.57px;
}
</style>

<script>

const navLinks = document.querySelectorAll('.nav-link');

// Add a click event listener to each nav link
navLinks.forEach(link => {
    link.addEventListener('click', function() {
        // Remove 'active' class from all links
        navLinks.forEach(link => link.classList.remove('active'));

        // Add 'active' class to the clicked link
        this.classList.add('active');
    });
});

</script>