
document.addEventListener('DOMContentLoaded', function () {

    const calculadora = document.getElementById('calculadoraDiv');
    if (calculadora) {
        calculadora.addEventListener('click', function () {
            window.location.href = '/Calculator';
        });
    }

    const hojas = document.getElementById('hojasDiv');
    if (hojas) {
        hojas.addEventListener('click', function () {
            window.location.href = '/Killsheet';
        });
    }

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

const observerOptions = {
    threshold: 0.1,
    rootMargin: '0px 0px -50px 0px'
};

const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            entry.target.classList.add('animate-in');
        }
    });
}, observerOptions);

// Initialize animations when DOM is loaded
document.addEventListener('DOMContentLoaded', () => {
    // Observe all animated elements
    const animatedElements = document.querySelectorAll('.animate-on-scroll, .animate-slide-left, .animate-slide-right, .animate-fade-in, .animate-scale');
    animatedElements.forEach(el => observer.observe(el));

    // Add entrance animation to header
    setTimeout(() => {
        const headerText = document.querySelector('.header-text');
        if (headerText) {
            headerText.classList.add('animate-in');
        }
    }, 300);

    // Parallax effect for team image
    window.addEventListener('scroll', () => {
        const scrolled = window.pageYOffset;
        const teamImage = document.querySelector('.team-image img');
        if (teamImage) {
            teamImage.style.transform = `translateY(${scrolled * 0.1}px)`;
        }
    });

    // Add interactive effects
    const interactiveElements = document.querySelectorAll('.content-box, .card, .bottom-card, .left-card');
    interactiveElements.forEach(element => {
        element.addEventListener('mouseenter', () => {
            element.style.transition = 'all 0.3s cubic-bezier(0.34, 1.56, 0.64, 1)';
        });

        element.addEventListener('mouseleave', () => {
            element.style.transition = 'all 0.3s ease';
        });
    });

    // Smooth scroll behavior for links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                target.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        });
    });

    // Add loading animation
    document.body.style.opacity = '0';
    document.body.style.transition = 'opacity 0.5s ease';
    setTimeout(() => {
        document.body.style.opacity = '1';
    }, 100);
});

// Enhanced hover effects for cards
document.addEventListener('DOMContentLoaded', () => {
    document.querySelectorAll('.card').forEach(card => {
        card.addEventListener('mousemove', (e) => {
            const rect = card.getBoundingClientRect();
            const x = e.clientX - rect.left;
            const y = e.clientY - rect.top;
            
            const centerX = rect.width / 2;
            const centerY = rect.height / 2;
            
            const rotateX = (y - centerY) / 20;
            const rotateY = (centerX - x) / 20;
            
            card.style.transform = `translateY(-10px) scale(1.02) rotateX(${rotateX}deg) rotateY(${rotateY}deg)`;
        });
        
        card.addEventListener('mouseleave', () => {
            card.style.transform = 'translateY(0) scale(1) rotateX(0) rotateY(0)';
        });
    });
});


let position = 'top';

if (window.innerWidth > 768) {
    position = 'top';
}

if (typeof Swal !== 'undefined') {

    const Toast = Swal.mixin({
        toast: true,
        position: position,
        showConfirmButton: false,
        timerProgressBar: true,
        didOpen: (toast) => {
            toast.addEventListener('mouseenter', Swal.stopTimer);
            toast.addEventListener('mouseleave', Swal.resumeTimer);
        }
    });

    window.alertToast = function (
        msj = 'No ha seleccionado ningún registro',
        icon = 'error',
        timer = 3000
    ) {
        Toast.fire({
            icon: icon,
            title: msj,
            timer: timer
        });
    };

} else {

    window.alertToast = function (msj = 'No ha seleccionado ningún registro') {
        console.warn('SweetAlert2 no está cargado:', msj);
    };

}
