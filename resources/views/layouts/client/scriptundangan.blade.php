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

    
    function validateKuantitas(input) 
    {
        const value = input.value;
        const errorElement = document.getElementById('kuantitasError');
        
        if (value < 100) 
        {
            errorElement.style.display = 'block';
        } 
        
        else 
        {
            errorElement.style.display = 'none';
        }
    }
    
    @if(session()->has('cart') && isset(session('cart')['undangan']))
        var hargaBase = {{ session('cart')['undangan']['harga'] }};
    @else
        var hargaBase = 0; 
    @endif
    

    function updateUndanganTotal() {
        var bahan = document.getElementById('bahan_undangan').value;
        var kuantitas = document.getElementById('kuantitas_undangan').value;
        var hargaBaru = hargaBase;

        if (bahan === "aster200gr") 
        {
            hargaBaru += 200;
        } 
        else if (bahan === "amplopaster") 
        {
            hargaBaru += 1000;
        } 
        else if (bahan === "bchardcover") 
        {
            hargaBaru += 2000;
        } 
        else if (bahan === "amplopjasmine") 
        {
            hargaBaru += 7200;
        }
        
        var totalUndangan = hargaBaru * kuantitas;

        document.getElementById('harga_undangan').innerHTML = new Intl.NumberFormat('id-ID').format(hargaBaru);
        document.getElementById('undangan_total').innerHTML = new Intl.NumberFormat('id-ID').format(totalUndangan);

        calculateGrandTotal();
    }
    
    function calculateGrandTotal() 
    {
        let grandTotal = 0;

        document.querySelectorAll('input[name="selected_items[]"]:checked').forEach(function(checkbox) {
            let itemRow = checkbox.closest('tr');  
            let itemTotalElement = itemRow.querySelector('span[id$="_total"]');  
            let itemTotal = parseInt(itemTotalElement.innerText.replace(/\D/g, ''));  
            grandTotal += itemTotal; 
        });

        document.getElementById('grand_total').innerText = grandTotal.toLocaleString();  
        document.getElementById('grand_total_input').value = grandTotal;  
    }

    window.onload = calculateGrandTotal;

    document.querySelectorAll('input[name="selected_items[]"], #kuantitas_undangan').forEach(function(element) {
        element.addEventListener('change', calculateGrandTotal);
    });
    
    // Fungsi untuk menyimpan keranjang ke cookie
function saveCartToCookie() {
    let cartItems = [];

    // Loop melalui item yang dipilih dan ambil data
    document.querySelectorAll('input[name="selected_items[]"]:checked').forEach(function(checkbox) {
        let itemRow = checkbox.closest('tr');
        let item = {
            id: checkbox.value,  // ID item
            nama: itemRow.querySelector('td:nth-child(3)').innerText,  // Nama item
            kategori: itemRow.querySelector('td:nth-child(4)').innerText,  // Kategori item
            kuantitas: itemRow.querySelector('input[name="kuantitas"]').value,  // Kuantitas item
            harga: itemRow.querySelector('span[id$="_total"]').innerText.replace(/\D/g, '')  // Harga item
        };
        cartItems.push(item);
    });

    // Set cookie dengan masa berlaku 7 hari
    let d = new Date();
    d.setTime(d.getTime() + (7 * 24 * 60 * 60 * 1000)); // 7 hari
    let expires = "expires=" + d.toUTCString();
    document.cookie = "cart=" + JSON.stringify(cartItems) + ";" + expires + ";path=/";
}

// Fungsi untuk membaca cookie
function getCookie(name) {
    let value = "; " + document.cookie;
    let parts = value.split("; " + name + "=");
    if (parts.length === 2) return parts.pop().split(";").shift();
}

// Fungsi untuk memuat keranjang dari cookie
function loadCartFromCookie() {
    let cartCookie = getCookie("cart");
    if (cartCookie) {
        let cartItems = JSON.parse(cartCookie);

        // Loop melalui item dan tambahkan ke tampilan keranjang
        cartItems.forEach(function(item) {
            // Cari checkbox yang sesuai berdasarkan ID atau nama
            let checkbox = document.querySelector(`input[name="selected_items[]"][value="${item.id}"]`);
            if (checkbox) {
                checkbox.checked = true;
                let itemRow = checkbox.closest('tr');
                
                // Set nama, kategori, kuantitas, dan harga
                itemRow.querySelector('td:nth-child(3)').innerText = item.nama;
                itemRow.querySelector('td:nth-child(4)').innerText = item.kategori;
                itemRow.querySelector('input[name="kuantitas"]').value = item.kuantitas;
                itemRow.querySelector('span[id$="_total"]').innerText = parseInt(item.harga).toLocaleString();
            }
        });

        // Hitung ulang Grand Total
        calculateGrandTotal();
    }
}

    // Panggil fungsi ini saat halaman dimuat
    window.onload = function() 
    {
        loadCartFromCookie();  // Memuat keranjang dari cookie
        calculateGrandTotal();  // Hitung total harga berdasarkan item yang dimuat
    };

    // Panggil fungsi untuk menyimpan data ke cookie setiap kali ada perubahan
    document.querySelectorAll('input[name="selected_items[]"], #kuantitas_undangan').forEach(function(element) 
    {
        element.addEventListener('change', function() {
            saveCartToCookie();  // Simpan perubahan ke cookie
            calculateGrandTotal();  // Hitung ulang Grand Total
        });
    });

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
