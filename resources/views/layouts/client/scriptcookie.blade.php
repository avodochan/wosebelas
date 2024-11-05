<script>
    
    function saveCartToCookie() 
    {
        let cartItems = [];
        document.querySelectorAll('input[name="selected_items[]"]:checked').forEach(function(checkbox) {
            let itemRow = checkbox.closest('tr');
            let item = {
                id: checkbox.value,
                nama: itemRow.querySelector('td:nth-child(3)').innerText, // Nama item
                kategori: itemRow.querySelector('td:nth-child(4)').innerText, // Kategori item
                kuantitas: itemRow.querySelector('input[name="kuantitas"]').value, // Kuantitas item
                harga: itemRow.querySelector('span[id$="_total"]').innerText.replace(/\D/g, '') // Harga item
            };
            cartItems.push(item);
        });

        // Atur cookie dengan masa berlaku 7 hari
        let d = new Date();
        d.setTime(d.getTime() + (7*24*60*60*1000)); // 7 hari
        let expires = "expires=" + d.toUTCString();
        
        document.cookie = "cart=" + JSON.stringify(cartItems) + ";" + expires + ";path=/";
    }


    document.querySelectorAll('input[name="selected_items[]"], #kuantitas_undangan').forEach(function(element) {
        element.addEventListener('change', saveCartToCookie);
    });
    
    function getCookie(name) 
    {
        let value = "; " + document.cookie;
        let parts = value.split("; " + name + "=");
        if (parts.length === 2) return parts.pop().split(";").shift();
    }

    function loadCartFromCookie() 
    {
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
        loadCartFromCookie();
        calculateGrandTotal();  // Hitung total dari item yang ada di cookie
    };
    
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
            document.cookie = "cart=" + JSON.stringify(cartItems) + ";path=/";

            // Perbarui tampilan dan total
            loadCartFromCookie();
            calculateGrandTotal();
        }
    }

</script>