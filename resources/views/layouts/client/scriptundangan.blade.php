<script>
    
    function updateHarga(harga_undangan) 
    {
        var bahan = document.getElementById("bahan_undangan").value;
        var hargaBaru = harga_undangan;

        if (bahan === "bcsoftcover") {
            hargaBaru = harga_undangan; 
        } 
        else if (bahan === "aster200gr") {
            hargaBaru = harga_undangan + 200;
        } 
        else if (bahan === "amplopaster") {
            hargaBaru = harga_undangan + 1000;
        }
        else if (bahan === "bchardcover") {
            hargaBaru = harga_undangan + 2000;
        }
        else if (bahan === "amplopjasmine") {
            hargaBaru = harga_undangan + 7200;
        }
        
        var hargaFormatted = new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR', minimumFractionDigits: 0 }).format(hargaBaru);
        document.getElementById("harga_dinamis").innerHTML = "Harga: " + hargaFormatted;
    }

    
    function validateKuantitas()
     {
        var kuantitasInput = document.getElementById('kuantitas');
        var kuantitasError = document.getElementById('kuantitasError');
        var kuantitas = parseInt(kuantitasInput.value) || 0;

        if (kuantitas < 100) {
            kuantitasError.style.display = 'block';
        } else {
            kuantitasError.style.display = 'none';
        }

        if (kuantitas >= 100) {
            updateUndanganTotal();
        }
    }

    
    @if(isset($undangans))        
        let hargaBase = {{ $undangans->harga_undangan }};
    @elseif(session()->has('cart') && isset(session('cart')['undangan']))
        let hargaBase = {{ session('cart')['undangan']['harga'] }};
    @else
        let hargaBase = 0;
    @endif

    function updateUndanganTotal() 
    {
        const bahan = document.getElementById('bahan_undangan') ? document.getElementById('bahan_undangan').value : '';
        const kuantitasElement = document.getElementById('kuantitas') || document.getElementById('kuantitas_undangan');
        const kuantitas = parseInt(kuantitasElement.value) || 0;

        let hargaTambahan = 0;

        switch (bahan) {
            case "aster200gr": hargaTambahan = 200; break;
            case "amplopaster": hargaTambahan = 1000; break;
            case "bchardcover": hargaTambahan = 2000; break;
            case "amplopjasmine": hargaTambahan = 7200; break;
        }

        // Hitung harga satuan dan total
        const hargaSatuan = hargaBase + hargaTambahan;
        const totalHarga = hargaSatuan * kuantitas;

        // Update elemen di halaman
        if (document.getElementById('harga_dinamis')) {
            document.getElementById('harga_dinamis').innerHTML = new Intl.NumberFormat('id-ID').format(hargaSatuan);
        }
        if (document.getElementById('undangan_total')) {
            document.getElementById('undangan_total').innerHTML = new Intl.NumberFormat('id-ID').format(totalHarga);
        }
    }
    
    document.addEventListener('DOMContentLoaded', updateUndanganTotal);

    
    document.addEventListener('DOMContentLoaded', function () {
    calculateGrandTotal();

    document.querySelectorAll('input[name="selected_items[]"], #kuantitas_undangan, #bahan_undangan').forEach(function(element) {
        element.addEventListener('change', calculateGrandTotal);
    });
    });

    function calculateGrandTotal() 
    {
        const checkboxes = document.querySelectorAll('input[name="selected_items[]"]:checked');
        let grandTotal = 0;

        checkboxes.forEach(checkbox => {
            const itemKey = checkbox.value;
            const hargaElement = document.getElementById(`${itemKey}_total`);

            if (hargaElement) {
                const hargaItem = parseInt(hargaElement.textContent.replace(/[^\d]/g, '')) || 0;
                grandTotal += hargaItem;
            }
        });
        
        document.getElementById('grand_total').innerHTML = 'Rp ' + new Intl.NumberFormat('id-ID').format(grandTotal);
        document.getElementById('grand_total_input').value = grandTotal;
    }



    // Fungsi untuk menghapus item dari keranjang
    function removeItemFromCart(itemId) 
    {
        let cartCookie = getCookie("cart");
        if (cartCookie) {
            let cartItems = JSON.parse(cartCookie);

            // Hapus item dari array berdasarkan ID
            cartItems = cartItems.filter(function(item) {
                return item.id !== itemId;
            });

            // Perbarui cookie dengan item baru
            let d = new Date();
            d.setTime(d.getTime() + (7 * 24 * 60 * 60 * 1000)); // 7 hari
            let expires = "expires=" + d.toUTCString();
            document.cookie = "cart=" + JSON.stringify(cartItems) + ";" + expires + ";path=/";

            // Perbarui tampilan dan total
            loadCartFromCookie();
            calculateGrandTotal();
        }
    }
    
</script>
