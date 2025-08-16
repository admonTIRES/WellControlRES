document.getElementById('calculadoraDiv').addEventListener('click', function() {
    window.location.href = '/Calculator';
});

document.getElementById('hojasDiv').addEventListener('click', function() {
    window.location.href = '/Killsheet';
});

document.getElementById('evaluacionesDiv').addEventListener('click', function() {
    window.location.href = '/Evaluation';
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







