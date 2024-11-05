<html>
    <meta name="csrf-token" content="{{ csrf_token() }}">

</html>

<style>
    /* Styling untuk card label */
.card-select {
    display: block;
    cursor: pointer;
    border: 2px solid transparent; /* Border default */
    border-radius: 14.68px;
    padding: 10px;
    text-align: center;
    transition: border-color 0.3s ease;
}

/* Styling untuk card content */
.card-content {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    background-color: white;
    padding: 15px;
    border-radius: 14.68px;
}

/* Styling untuk image di dalam card */
.card-img {
    max-height: 200px;
    object-fit: cover;
    border-radius: 10px;
    margin-bottom: 15px;
}

/* Styling untuk text di dalam card */
.card-text h5 {
    font-size: 18px;
    color: #333;
}

.card-text p {
    font-size: 16px;
    color: #666;
}

/* Border yang muncul ketika card dipilih */
input[type="radio"]:checked + .card-content {
    border: 2px solid #7551FF;
    box-shadow: 0px 0px 10px rgba(117, 81, 255, 0.5);
}

/* Hilangkan input radio dari tampilan */
input[type="radio"] {
    display: none;
}

</style>

<script>
    // Optional: Tambah animasi atau efek saat kartu dipilih
document.querySelectorAll('input[type="radio"]').forEach((radio) => {
    radio.addEventListener('change', function() {
        document.querySelectorAll('.card-select').forEach((card) => {
            card.classList.remove('selected'); // Hilangkan class selected dari semua card
        });
        if (this.checked) {
            this.closest('.card-select').classList.add('selected'); // Tambah class selected ke card yang dipilih
        }
    });
});

</script>