
    // Wait for the DOM to be fully loaded
    document.addEventListener('DOMContentLoaded', () => {
        // Initialize AOS
        AOS.init();

        // Carousel Logic
        const carousel = {
            slides: document.querySelectorAll('.carousel-slide'),
            prevBtn: document.getElementById('prevSlide'),
            nextBtn: document.getElementById('nextSlide'),
            currentSlide: 0,

            init() {
                // Ensure at least one slide exists
                if (this.slides.length === 0) {
                    console.error('No carousel slides found');
                    return;
                }

                // Initial setup
                this.showSlide(this.currentSlide);

                // Add event listeners
                this.nextBtn.addEventListener('click', () => this.nextSlide());
                this.prevBtn.addEventListener('click', () => this.prevSlide());
            },

            showSlide(index) {
                // Hide all slides
                this.slides.forEach(slide => {
                    slide.classList.add('hidden');
                    slide.classList.remove('active');
                });

                // Show current slide
                if (this.slides[index]) {
                    this.slides[index].classList.remove('hidden');
                    this.slides[index].classList.add('active');
                }
            },

            nextSlide() {
                this.currentSlide = (this.currentSlide + 1) % this.slides.length;
                this.showSlide(this.currentSlide);
            },

            prevSlide() {
                this.currentSlide = (this.currentSlide - 1 + this.slides.length) % this.slides.length;
                this.showSlide(this.currentSlide);
            }
        };

        // Initialize the carousel
        carousel.init();

        // Optional: Auto-slide functionality
        const autoSlideInterval = 5000; // 5 seconds
        let autoSlideTimer = setInterval(() => {
            carousel.nextSlide();
        }, autoSlideInterval);

        // Pause auto-slide on hover
        const carouselContainer = document.querySelector('header');
        carouselContainer.addEventListener('mouseenter', () => {
            clearInterval(autoSlideTimer);
        });

        carouselContainer.addEventListener('mouseleave', () => {
            autoSlideTimer = setInterval(() => {
                carousel.nextSlide();
            }, autoSlideInterval);
        });
    });

    document.addEventListener('DOMContentLoaded', function() {
        const text = "Number One Billiard Cafe";
        const typingElement = document.getElementById('typing-text');
        let index = 0;
    
        function typeText() {
            if (index < text.length) {
                typingElement.innerHTML += text.charAt(index);
                index++;
                setTimeout(typeText, 100); // Kecepatan mengetik (ms)
            } else {
                // Tambahkan efek cursor berkedip
                typingElement.innerHTML += '<span class="animate-pulse">|</span>';
            }
        }
    
        // Mulai animasi typing saat halaman dimuat
        typeText();
    });

    tailwind.config = {
        theme: {
            extend: {
                animation: {
                    pulse: 'pulse 1s cubic-bezier(0.4, 0, 0.6, 1) infinite'
                }
            }
        }
    }  // Optional: JavaScript untuk efek tambahan
    document.querySelectorAll('.card-hover').forEach(card => {
        card.addEventListener('mouseenter', () => {
            const icon = card.querySelector('i');
            icon.classList.add('animate-bounce');
        });

        card.addEventListener('mouseleave', () => {
            const icon = card.querySelector('i');
            icon.classList.remove('animate-bounce');
        });
    });

     document.getElementById('contactForm').addEventListener('submit', function(e) {
        e.preventDefault();
        
        // Basic form validation
        const firstName = document.getElementById('firstName').value.trim();
        const lastName = document.getElementById('lastName').value.trim();
        const email = document.getElementById('email').value.trim();
        const message = document.getElementById('message').value.trim();

        if (!firstName || !lastName || !email || !message) {
            alert('Please fill in all required fields');
            return;
        }

        // Here you would typically send the form data to a server
        // For this example, we'll just show a success message
        alert('Message sent successfully! We will get back to you soon.');
        this.reset();
    });
    const testimonials = [
        {
            image: "https://randomuser.me/api/portraits/women/44.jpg",
            quote: "Pelayanan luar biasa yang melebihi ekspektasi saya!",
            name: "Sarah Johnson",
            role: "CEO Perusahaan"
        },
        {
            image: "https://randomuser.me/api/portraits/men/32.jpg",
            quote: "Profesional dan sangat membantu!",
            name: "Michael Chen", 
            role: "Founder Startup"
        }
    ];

    let currentIndex = 0;

    function changeTestimonial(direction) {
        currentIndex += direction;
        
        if (currentIndex >= testimonials.length) {
            currentIndex = 0;
        }
        if (currentIndex < 0) {
            currentIndex = testimonials.length - 1;
        }

        const testimonial = testimonials[currentIndex];
        
        document.getElementById('clientImage').src = testimonial.image;
        document.getElementById('clientQuote').textContent = testimonial.quote;
        document.getElementById('clientName').textContent = testimonial.name;
        document.getElementById('clientRole').textContent = testimonial.role;
    }