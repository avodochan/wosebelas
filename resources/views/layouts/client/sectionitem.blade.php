<style>
    
    .sections-container {
        position: relative;
        width: 100%;
    }

    .section {
        display: none;
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
    }

    .section.active {
        display: block;
    }

</style>

<script>
    const menuLinks = document.querySelectorAll('.menu-link');
    const sections = document.querySelectorAll('.section');

    menuLinks.forEach(link => {
        link.addEventListener('click', function () {
            const targetSection = this.getAttribute('data-section');

            sections.forEach(section => {
                section.classList.remove('active');
            });

            document.getElementById(targetSection).classList.add('active');
        });
    });
</script>
