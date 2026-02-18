<style>
    /* Custom Font Imports if not already in app.css */
    @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700;900&family=Cairo:wght@400;600;700;900&display=swap');

    .font-montserrat {
        font-family: 'Montserrat', sans-serif;
    }

    .font-cairo {
        font-family: 'Cairo', sans-serif;
    }

    /* Animation Utilities */
    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(20px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .animate-fade-in-up {
        animation: fadeInUp 0.8s ease-out forwards;
    }
</style>
