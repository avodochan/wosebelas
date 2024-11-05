<script>
    
    function updateHarga(harga_paket_maincourse) 
    {
        var paket = document.getElementById("nama_paket_maincourse").value;
        var hargaBaru = harga_paket_maincourse;

        if (paket === "bronze") {
            hargaBaru = harga_paket_maincourse; 
        } 
        else if (paket === "silver") {
            hargaBaru = harga_paket_maincourse + 5000;
        } 
        else if (bahan === "gold") {
            hargaBaru = harga_paket_maincourse + 10000;
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
    
    function updateDeskripsiPaket() 
    {
        const selectedPaket = document.getElementById("nama_paket_maincourse").value;
        const deskripsiP = document.getElementById("deksripsi_paket_maincourse");
        let deskripsi;
        if (selectedPaket === "bronze") {
            deskripsi = document.getElementById("deskripsi_bronze").value;
        } else if (selectedPaket === "silver") {
            deskripsi = document.getElementById("deskripsi_silver").value;
        } else if (selectedPaket === "gold") {
            deskripsi = document.getElementById("deskripsi_gold").value;
        }
        
        deskripsiP.textContent = deskripsi;
    }
    
    const packageLimits = {
        bronze: { karbohidrat: 1, laukPauk: 2, tumisan: 1, acar: 1, dishes: 2 },
        silver: { karbohidrat: 1, laukPauk: 3, tumisan: 2, acar: 1, dishes: 3 },
        gold: { karbohidrat: 2, laukPauk: 5, tumisan: 3, acar: 2, dishes: 4 }
    };

    function updateLimits() {
        const selectedPackage = document.getElementById('package').value;
        const limits = packageLimits[selectedPackage];


        setCheckboxLimit('karbohidrat', limits.karbohidrat);
        setCheckboxLimit('laukPauk', limits.laukPauk);
        setCheckboxLimit('tumisan', limits.tumisan);
        setCheckboxLimit('acar', limits.acar);
        setCheckboxLimit('dishes', limits.dishes);
    }
    function setCheckboxLimit(category, limit) {
        const checkboxes = document.querySelectorAll(`.${category}-checkbox`);
        const warning = document.getElementById(`warning-${category}`);

        checkboxes.forEach(checkbox => {
            checkbox.addEventListener('change', () => {
                const checkedCount = document.querySelectorAll(`.${category}-checkbox:checked`).length;

                if (checkedCount >= limit) {
                    checkboxes.forEach(cb => {
                        if (!cb.checked) cb.disabled = true;
                    });
                    warning.style.display = 'block'; g
                } else {
                    checkboxes.forEach(cb => cb.disabled = false); 
                    warning.style.display = 'none'; 
                }
            });
        });
    }

    document.getElementById('package').addEventListener('change', updateLimits);
    document.addEventListener('DOMContentLoaded', updateLimits);



</script>
