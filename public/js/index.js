document.getElementById("logout").addEventListener('click', function(event) {
    event.preventDefault(); 
    event.stopPropagation();

    Swal.fire({
        title: '¿Estás seguro?',
        text: "Quieres cerrar sesión",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Sí, cerrar sesión',
        cancelButtonText: 'Cancelar',
        reverseButtons: true
    }).then((result) => {
        if (result.isConfirmed) {
            document.getElementById('logout-form').submit();
        }
    });
});

document.addEventListener("DOMContentLoaded", function() {
    const navItems = document.querySelectorAll(".nav-item");
    const tooltip = document.getElementById("tooltip");

    navItems.forEach(item => {
        item.addEventListener("mouseenter", function(event) {
            const title = item.getAttribute("data-title");

            // Evitar mostrar tooltip si el elemento tiene la clase 'no-tooltip'
            if (title && !item.classList.contains("no-tooltip")) {
                tooltip.textContent = title;
                tooltip.style.display = "block";
                const rect = item.getBoundingClientRect();
                tooltip.style.top = `${rect.bottom + window.scrollY + 5}px`;
                tooltip.style.left = `${rect.left + rect.width / 2}px`;
            }
        });

        item.addEventListener("mouseleave", function() {
            tooltip.style.display = "none";
        });

        item.addEventListener("click", function(event) {
            event.preventDefault();
            window.location.href = item.href;
        });
    });
 
});