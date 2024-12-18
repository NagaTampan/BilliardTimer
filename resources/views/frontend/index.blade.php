<html>
 <head>
  <title>
   Billiard Club Landing Page
  </title>
  <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
  <link rel="stylesheet" href="style.css">
  <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
 </head>
 <body class="bg-[#FDF7F4] text-[#0000]">
 
  <!-- Navbar -->
<nav class="bg-gray-900 p-4 shadow-lg">
    <div class="container mx-auto flex justify-between items-center">
        <!-- Logo -->
        <a class="navbar-brand text-2xl font-bold text-white flex items-center space-x-2" href="#home">
            <img src="img/logo.png" alt="Billiard Club Logo" class="h-8 w-8"> <!-- Your logo -->
            <span>Billiard Club</span>
        </a>

        <!-- Desktop Navigation Links -->
        <div class="hidden md:flex space-x-6">
            <a class="nav-link text-white hover:text-yellow-500 transition duration-300" href="#home">
                <i class="fas fa-home"></i> Home
            </a>
            <a class="nav-link text-white hover:text-yellow-500 transition duration-300" href="#about">
                <i class="fas fa-info-circle"></i> About
            </a>
            <a class="nav-link text-white hover:text-yellow-500 transition duration-300" href="#services">
                <i class="fas fa-cogs"></i> Services
            </a>
            <a class="nav-link text-white hover:text-yellow-500 transition duration-300" href="#testimoni">
                <i class="fas fa-image"></i> Testimonials
            </a>
            <a class="nav-link text-white hover:text-yellow-500 transition duration-300" href="#contact">
                <i class="fas fa-envelope"></i> Contact
            </a>
        </div>

        <!-- Navigasi Autentikasi -->
        @if (Route::has('login'))
        <div class="hidden md:flex space-x-4">
            @auth
                <!-- Dashboard -->
                <a href="{{ url('/dashboard') }}" 
                   class="nav-link text-white hover:text-yellow-500 transition duration-300">
                    <i class="fas fa-tachometer-alt"></i> Dashboard
                </a>
            @else
                <!-- Login -->
                <a href="{{ route('login') }}" 
                   class="nav-link text-white hover:text-yellow-500 transition duration-300">
                    <i class="fas fa-sign-in-alt"></i> Log in
                </a>
                
                <!-- Register
                @if (Route::has('register'))
                    <a href="{{ route('register') }}" 
                       class="nav-link text-white hover:text-yellow-500 transition duration-300">
                        <i class="fas fa-user-plus"></i> Register
                    </a>
                @endif
            @endauth
        </div>
        @endif -->

        <!-- Mobile Hamburger Icon -->
        <div class="md:hidden">
            <button class="text-white focus:outline-none">
                <i class="fas fa-bars"></i>
            </button>
        </div>
    </div>
</nav>


<!-- Header Section -->
<header id="home" class="relative overflow-hidden h-screen">
    <div id="carousel" class="relative h-full">
        <!-- Slide 1: Billiard Table -->
        <div class="carousel-slide absolute inset-0" data-aos="fade-in">
            <img src="img/banner1.jpg" 
                 class="w-full h-full object-cover" 
                 alt="Billiard Table"/>
            <div class="absolute inset-0 bg-black bg-opacity-50 flex items-center justify-center">
                <div class="text-center text-white">
                    <h2 class="text-5xl font-bold mb-4">
                        <i class="fas fa-table mr-4 text-green-400"></i>
                        Premium Billiard Tables
                    </h2>
                    <p class="text-xl mb-4">Experience world-class gaming environment</p>
                </div>
            </div>
        </div>

        <!-- Slide 2: Tournament -->
        <div class="carousel-slide absolute inset-0 hidden" data-aos="fade-in">
            <img src="img/banner2.jpg" 
                 class="w-full h-full object-cover" 
                 alt="Billiard Tournament"/>
            <div class="absolute inset-0 bg-black bg-opacity-50 flex items-center justify-center">
                <div class="text-center text-white">
                    <h2 class="text-5xl font-bold mb-4">
                        <i class="fas fa-trophy mr-4 text-yellow-400"></i>
                        Exciting Tournaments
                    </h2>
                    <p class="text-xl">Compete with players from around the region</p>
                </div>
            </div>
        </div>

        <!-- Slide 3: Club Interior -->
        <div class="carousel-slide absolute inset-0 hidden" data-aos="fade-in">
            <img src="img/banner4.jpg" 
                 class="w-full h-full object-cover" 
                 alt="Club Interior"/>
            <div class="absolute inset-0 bg-black bg-opacity-50 flex items-center justify-center">
                <div class="text-center text-white">
                    <h2 class="text-5xl font-bold mb-4">
                        <i class="fas fa-building mr-4 text-blue-400"></i>
                        Modern Club Facilities
                    </h2>
                    <p class="text-xl">State-of-the-art gaming environment</p>
                </div>
            </div>
        </div>

        <!-- Slide 4: Community -->
        <div class="carousel-slide absolute inset-0 hidden" data-aos="fade-in">
            <img src="img/banner3.jpg" 
                 class="w-full h-full object-cover" 
                 alt="Billiard Community"/>
            <div class="absolute inset-0 bg-black bg-opacity-50 flex items-center justify-center">
                <div class="text-center text-white">
                    <h2 class="text-5xl font-bold mb-4">
                        <i class="fas fa-users mr-4 text-purple-400"></i>
                        Vibrant Community
                    </h2>
                    <p class="text-xl">Connect with passionate billiard enthusiasts</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Book Now Button (Visible on all slides) -->
    <div class="absolute bottom-44 left-1/2 transform -translate-x-1/2 z-20">
        <a href="https://www.instagram.com/yourprofile" target="_blank" class="inline-flex items-center justify-center bg-green-800 text-white px-6 py-2 rounded-full transition-all duration-300 ease-in-out hover:bg-green-700 hover:scale-105 animate-wiggle">
            <i class="fab fa-instagram mr-2 text-2xl"></i>
            Book Now!
        </a>
    </div>

    <!-- Navigation Buttons -->
    <button id="prevSlide" class="absolute left-4 top-1/2 transform -translate-y-1/2 
                                   bg-white/30 hover:bg-white/50 p-4 rounded-full z-10 transition-all duration-300 ease-in-out 
                                   hover:scale-110">
        <i class="fas fa-chevron-left text-white text-2xl hover:text-gray-200"></i>
    </button>
    <button id="nextSlide" class="absolute right-4 top-1/2 transform -translate-y-1/2 
                                   bg-white/30 hover:bg-white/50 p-4 rounded-full z-10 transition-all duration-300 ease-in-out 
                                   hover:scale-110">
        <i class="fas fa-chevron-right text-white text-2xl hover:text-gray-200"></i>
    </button>

    <!-- Slide Indicators -->
    <div class="absolute bottom-8 left-1/2 transform -translate-x-1/2 flex space-x-4">
        <button class="slide-indicator w-3 h-3 bg-white rounded-full opacity-50 hover:opacity-100 transition duration-200" data-slide="0"></button>
        <button class="slide-indicator w-3 h-3 bg-white rounded-full opacity-50 hover:opacity-100 transition duration-200" data-slide="1"></button>
        <button class="slide-indicator w-3 h-3 bg-white rounded-full opacity-50 hover:opacity-100 transition duration-200" data-slide="2"></button>
        <button class="slide-indicator w-3 h-3 bg-white rounded-full opacity-50 hover:opacity-100 transition duration-200" data-slide="3"></button>
    </div>
</header>


<!-- Services Section -->
<section id="about" class="container mx-auto mt-16 px-4">
  <div class="grid grid-cols-1 md:grid-cols-2 gap-12">
    <!-- Left Side (Text Section) -->
    <div class="flex flex-col justify-center">
      <!-- h1 with more height and adjusted vertical spacing -->
      <h1 data-aos="fade-down" data-aos-duration="1000" class="text-5xl font-bold text-black mb-6 leading-tight">
        Our Services
      </h1>

      <!-- Expanded h3 with more explanatory text -->
      <h3 data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200" class="text-xl text-gray-600 mb-8">
        Explore our range of services tailored to enhance your billiard experience. From top-tier table rentals to professional coaching, we are committed to providing you with a premium experience. Our services are designed for players of all levels, whether you're a seasoned professional or just starting. Book a table, receive personalized training, or join our exciting tournaments to take your game to the next level.
      </h3>

      <p data-aos="fade-up" data-aos-duration="1200" class="text-lg text-gray-700">
        Whether you're here for a quick game or to learn new skills, our services are designed to provide an exceptional experience, from professional-grade table rentals to exclusive training sessions and tournaments.
      </p>
    </div>

    <!-- Right Side (Card Grid) -->
    <div class="grid grid-cols-1 sm:grid-cols-2 gap-8">
      <!-- Table Rentals -->
      <div data-aos="zoom-in" data-aos-delay="100" data-aos-duration="800" 
           class="p-6 rounded-xl shadow-lg relative group transform transition-all hover:scale-105 hover:shadow-2xl cursor-pointer overflow-hidden" 
           style="background-image: url('img/service1.jpg'); background-size: cover; background-position: center;">
        <div class="absolute inset-0 bg-black opacity-40 group-hover:opacity-30 transition-opacity"></div>

        <div class="relative z-10">
          <div class="flex justify-between items-center mb-4">
            <i data-aos="zoom-in" data-aos-duration="800" class="fas fa-table text-4xl text-white transition-transform group-hover:scale-110"></i>
            <div class="bg-white/20 p-2 rounded-full">
              <span class="text-white text-sm">01</span>
            </div>
          </div>

          <h3 data-aos="fade-up" data-aos-duration="800" class="text-2xl font-bold text-white mb-3">Table Rentals</h3>
          <p data-aos="fade-up" data-aos-duration="1000" class="text-blue-100 mb-4">
            Rent our professional-grade tables by the hour or choose from our exclusive packages.
          </p>

          <div class="flex items-center text-white">
            <span class="mr-2">Book Now</span>
            <i class="fas fa-arrow-right transition-transform group-hover:translate-x-2"></i>
          </div>
        </div>

        <div class="absolute bottom-0 left-0 w-full h-1 bg-gradient-to-r from-blue-500 to-blue-300 origin-left scale-x-0 group-hover:scale-x-100 transition-transform duration-300"></div>
      </div>

      <!-- Training -->
      <div data-aos="zoom-in" data-aos-delay="200" data-aos-duration="800" 
           class="p-6 rounded-xl shadow-lg relative group transform transition-all hover:scale-105 hover:shadow-2xl cursor-pointer overflow-hidden" 
           style="background-image: url('img/service2.jpg'); background-size: cover; background-position: center;">
        <div class="absolute inset-0 bg-black opacity-40 group-hover:opacity-30 transition-opacity"></div>

        <div class="relative z-10">
          <div class="flex justify-between items-center mb-4">
            <i data-aos="zoom-in" data-aos-duration="800" class="fas fa-chalkboard-teacher text-4xl text-white transition-transform group-hover:scale-110"></i>
            <div class="bg-white/20 p-2 rounded-full">
              <span class="text-white text-sm">02</span>
            </div>
          </div>

          <h3 data-aos="fade-up" data-aos-duration="800" class="text-2xl font-bold text-white mb-3">Training</h3>
          <p data-aos="fade-up" data-aos-duration="1000" class="text-teal-100 mb-4">
            Receive expert coaching whether you're a beginner or an advanced player.
          </p>

          <div class="flex items-center text-white">
            <span class="mr-2">Learn More</span>
            <i class="fas fa-arrow-right transition-transform group-hover:translate-x-2"></i>
          </div>
        </div>

        <div class="absolute bottom-0 left-0 w-full h-1 bg-gradient-to-r from-teal-500 to-teal-300 origin-left scale-x-0 group-hover:scale-x-100 transition-transform duration-300"></div>
      </div>

      <!-- Tournaments -->
      <div data-aos="zoom-in" data-aos-delay="300" data-aos-duration="800" 
           class="p-6 rounded-xl shadow-lg relative group transform transition-all hover:scale-105 hover:shadow-2xl cursor-pointer overflow-hidden" 
           style="background-image: url('img/service3.jpg'); background-size: cover; background-position: center;">
        <div class="absolute inset-0 bg-black opacity-40 group-hover:opacity-30 transition-opacity"></div>

        <div class="relative z-10">
          <div class="flex justify-between items-center mb-4">
            <i data-aos="zoom-in" data-aos-duration="800" class="fas fa-trophy text-4xl text-white transition-transform group-hover:scale-110"></i>
            <div class="bg-white/20 p-2 rounded-full">
              <span class="text-white text-sm">03</span>
            </div>
          </div>

          <h3 data-aos="fade-up" data-aos-duration="800" class="text-2xl font-bold text-white mb-3">Tournaments</h3>
          <p data-aos="fade-up" data-aos-duration="1000" class="text-orange-100 mb-4">
            Compete in local competitions and leagues hosted at our club.
          </p>

          <div class="flex items-center text-white">
            <span class="mr-2">Join Tournament</span>
            <i class="fas fa-arrow-right transition-transform group-hover:translate-x-2"></i>
          </div>
        </div>

        <div class="absolute bottom-0 left-0 w-full h-1 bg-gradient-to-r from-orange-500 to-orange-300 origin-left scale-x-0 group-hover:scale-x-100 transition-transform duration-300"></div>
      </div>

      <!-- Event Hosting -->
      <div data-aos="zoom-in" data-aos-delay="400" data-aos-duration="800" 
           class="p-6 rounded-xl shadow-lg relative group transform transition-all hover:scale-105 hover:shadow-2xl cursor-pointer overflow-hidden" 
           style="background-image: url('img/service4.jpg'); background-size: cover; background-position: center;">
        <div class="absolute inset-0 bg-black opacity-40 group-hover:opacity-30 transition-opacity"></div>

        <div class="relative z-10">
          <div class="flex justify-between items-center mb-4">
            <i data-aos="zoom-in" data-aos-duration="800" class="fas fa-glass-cheers text-4xl text-white transition-transform group-hover:scale-110"></i>
            <div class="bg-white/20 p-2 rounded-full">
              <span class="text-white text-sm">04</span>
            </div>
          </div>

          <h3 data-aos="fade-up" data-aos-duration="800" class="text-2xl font-bold text-white mb-3">Event Hosting</h3>
          <p data-aos="fade-up" data-aos-duration="1000" class="text-red-100 mb-4">
            Host private parties or corporate events in our unique venue.
          </p>

          <div class="flex items-center text-white">
            <span class="mr-2">Book Venue</span>
            <i class="fas fa-arrow-right transition-transform group-hover:translate-x-2"></i>
          </div>
        </div>

        <div class="absolute bottom-0 left-0 w-full h-1 bg-gradient-to-r from-red-500 to-red-300 origin-left scale-x-0 group-hover:scale-x-100 transition-transform duration-300"></div>
      </div>
    </div>
  </div>
</section>


<section id="services" class="container mx-auto px-4">
  <!-- Discover Section -->
  <div class="mt-[100px]">
      <div data-aos="fade-up" class="text-center mb-12">
          <h2 class="text-4xl font-bold text-black mb-4">
              Why Choose Our Club?
          </h2>
          <p class="text-xl text-gray-600">
              Explore the unique features that make our club exceptional
          </p>
      </div>

      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
          <!-- Card 1: Rich History -->
          <div data-aos="zoom-in" data-aos-delay="100" 
               class="card-hover bg-gradient-to-br from-blue-900 to-blue-700 
                      p-6 rounded-xl shadow-lg relative group cursor-pointer 
                      transform transition-all hover:scale-105">
              <div class="absolute inset-0 bg-black opacity-10 group-hover:opacity-20 transition-opacity"></div>
              
              <div class="relative z-10">
                  <div class="flex justify-between items-center mb-4">
                      <i class="fas fa-history text-4xl text-white 
                                transition-transform group-hover:scale-110"></i>
                      <div class="bg-white/20 p-2 rounded-full">
                          <span class="text-white text-sm">01</span>
                      </div>
                  </div>

                  <h3 class="text-2xl font-bold text-white mb-3">
                      Rich History
                  </h3>
                  <p class="text-blue-100 mb-4">
                      Experience the legacy and tradition of our esteemed billiard club.
                  </p>

                  <div class="flex items-center text-white">
                      <span class="mr-2">Learn More</span>
                      <i class="fas fa-arrow-right transition-transform group-hover:translate-x-2"></i>
                  </div>
              </div>

              <div class="absolute bottom-0 left-0 w-full h-1 
                          bg-gradient-to-r from-blue-500 to-blue-300 
                          origin-left scale-x-0 group-hover:scale-x-100 
                          transition-transform duration-300"></div>
          </div>

          <!-- Card 2: Professional Tables -->
          <div data-aos="zoom-in" data-aos-delay="200" 
               class="card-hover bg-gradient-to-br from-teal-700 to-teal-500 
                      p-6 rounded-xl shadow-lg relative group cursor-pointer 
                      transform transition-all hover:scale-105">
              <div class="absolute inset-0 bg-black opacity-10 group-hover:opacity-20 transition-opacity"></div>
              
              <div class="relative z-10">
                  <div class="flex justify-between items-center mb-4">
                      <i class="fas fa-table text-4xl text-white 
                                transition-transform group-hover:scale-110"></i>
                      <div class="bg-white/20 p-2 rounded-full">
                          <span class="text-white text-sm">02</span>
                      </div>
                  </div>

                  <h3 class="text-2xl font-bold text-white mb-3">
                      Professional Tables
                  </h3>
                  <p class="text-teal-100 mb-4">
                      Play on top-quality tables used by professionals worldwide.
                  </p>

                  <div class="flex items-center text-white">
                      <span class="mr-2">Explore Tables</span>
                      <i class="fas fa-arrow-right transition-transform group-hover:translate-x-2"></i>
                  </div>
              </div>

              <div class="absolute bottom-0 left-0 w-full h-1 
                          bg-gradient-to-r from-teal-500 to-teal-300 
                          origin-left scale-x-0 group-hover:scale-x-100 
                          transition-transform duration-300"></div>
          </div>

          <!-- Card 3: Competitive Leagues -->
          <div data-aos="zoom-in" data-aos-delay="300" 
               class="card-hover bg-gradient-to-br from-orange-600 to-orange-400 
                      p-6 rounded-xl shadow-lg relative group cursor-pointer 
                      transform transition-all hover:scale-105">
              <div class="absolute inset-0 bg-black opacity-10 group-hover:opacity-20 transition-opacity"></div>
              
              <div class="relative z-10">
                  <div class="flex justify-between items-center mb-4">
                      <i class="fas fa-trophy text-4xl text-white 
                                transition-transform group-hover:scale-110"></i>
                      <div class="bg-white/20 p-2 rounded-full">
                          <span class="text-white text-sm">03</span>
                      </div>
                  </div>

                  <h3 class="text-2xl font-bold text-white mb-3">
                      Competitive Leagues
                  </h3>
                  <p class="text-orange-100 mb-4">
                      Join our leagues and test your skills against the best players.
                  </p>

                  <div class="flex items- center text-white">
                      <span class="mr-2">Join Now</span>
                      <i class="fas fa-arrow-right transition-transform group-hover:translate-x-2"></i>
                  </div>
              </div>

              <div class="absolute bottom-0 left-0 w-full h-1 
                          bg-gradient-to-r from-orange-500 to-orange-300 
                          origin-left scale-x-0 group-hover:scale-x-100 
                          transition-transform duration-300"></div>
          </div>

          <!-- Card 4: Exclusive Events -->
          <div data-aos="zoom-in" data-aos-delay="400" 
               class="card-hover bg-gradient-to-br from-purple-600 to-purple-400 
                      p-6 rounded-xl shadow-lg relative group cursor-pointer 
                      transform transition-all hover:scale-105">
              <div class="absolute inset-0 bg-black opacity-10 group-hover:opacity-20 transition-opacity"></div>
              
              <div class="relative z-10">
                  <div class="flex justify-between items-center mb-4">
                      <i class="fas fa-calendar-alt text-4xl text-white 
                                transition-transform group-hover:scale-110"></i>
                      <div class="bg-white/20 p-2 rounded-full">
                          <span class="text-white text-sm">04</span>
                      </div>
                  </div>

                  <h3 class="text-2xl font-bold text-white mb-3">
                      Exclusive Events
                  </h3>
                  <p class="text-purple-100 mb-4">
                      Attend special events and tournaments hosted at our club.
                  </p>

                  <div class="flex items-center text-white">
                      <span class="mr-2">See Events</span>
                      <i class="fas fa-arrow-right transition-transform group-hover:translate-x-2"></i>
                  </div>
              </div>

              <div class="absolute bottom-0 left-0 w-full h-1 
                          bg-gradient-to-r from-purple-500 to-purple-300 
                          origin-left scale-x-0 group-hover:scale-x-100 
                          transition-transform duration-300"></div>
          </div>
      </div>
  </section>
</div>
   

  
<!-- Section Testimonals -->
<section id="testimoni" class="container mx-auto px-4 py-16 mt-12 relative overflow-hidden">
  <!-- Animated Background Elements -->
  <h2 
      class="text-5xl font-extrabold text-center mb-16 text-black relative z-10"
      data-aos="zoom-in"
      data-aos-duration="1000">
      What Our <span class="text-blue-600">Clients Say</span>
  </h2>

  <!-- Testimonial Grid -->
  <div class="grid md:grid-cols-3 gap-8 relative z-10">
      <!-- Testimonial 1 -->
      <div 
          class="testimonial-gradient testimonial-card p-8 rounded-3xl shadow-xl bg-gray-200 text-center group"
          data-aos="flip-left"
          data-aos-easing="ease-out-cubic"
          data-aos-duration="1000"
      >
          <div class="relative mb-6">
              <img 
                  src="https://randomuser.me/api/portraits/women/44.jpg" 
                  class="client-image w-32 h-32 rounded-full mx-auto border-4 border-blue-500 shadow-lg group-hover:rotate-6 transition-transform"
              >
              <i class="fas fa-quote-left absolute top-0 left-1/2 transform -translate-x-1/2 -translate-y-1/2 text-blue-500 text-4xl opacity-20"></i>
          </div>
          
          <p class="text-gray-700 italic mb-6 text-lg">
              "Our partnership has been transformative. Their innovative approach exceeded all expectations."
          </p>
          
          <div>
              <h4 class="font-bold text-xl text-gray-800 mb-2 group-hover:text-blue-600 transition">Sarah Johnson</h4>
              <p class="text-gray-500 text-sm flex items-center justify-center">
                  <i class="fas fa-briefcase mr-2 text-blue-500"></i>
                  CEO, Tech Innovations
              </p>
          </div>
      </div>

      <!-- Testimonial 2 -->
      <div 
          class="testimonial-gradient testimonial-card p-8 rounded-3xl shadow-xl bg-gray-200 text-center group"
          data-aos="flip-left"
          data-aos-easing="ease-out-cubic"
          data-aos-duration="1200"
          data-aos-delay="200"
      >
          <div class="relative mb-6">
              <img 
                  src="https://randomuser.me/api/portraits/men/32.jpg" 
                  class="client-image w-32 h-32 rounded-full mx-auto border-4 border-green-500 shadow-lg group-hover:rotate-6 transition-transform"
              >
              <i class="fas fa-quote-left absolute top-0 left-1/2 transform -translate-x-1/2 -translate-y-1/2 text-green-500 text-4xl opacity-20"></i>
          </div>
          
          <p class="text-gray-700 italic mb-6 text-lg">
              "Incredible service that truly understands the complexity of modern business challenges."
          </p>
          
          <div>
              <h4 class="font-bold text-xl text-gray-800 mb-2 group-hover:text-green-600 transition">Michael Chen</h4>
              <p class="text-gray-500 text-sm flex items-center justify-center">
                  <i class="fas fa-rocket mr-2 text-green-500"></i>
                  Founder, Global Solutions
              </p>
          </div>
      </div>

      <!-- Testimonial 3 -->
      <div 
          class="testimonial-gradient testimonial-card p-8 rounded-3xl shadow-xl bg-gray-200text-center group"
          data-aos="flip-left"
          data-aos-easing="ease-out-cubic"
          data-aos-duration="1400"
          data-aos-delay="400"
      >
          <div class="relative mb-6">
              <img 
                  src="https://randomuser.me/api/portraits/women/65.jpg" 
                  class="client-image w-32 h-32 rounded-full mx-auto border-4 border-purple-500 shadow-lg group-hover:rotate-6 transition-transform"
              >
              <i class="fas fa-quote-left absolute top-0 left-1/2 transform -translate-x-1/2 -translate-y-1/2 text-purple-500 text-4xl opacity-20"></i>
          </div>
          
          <p class="text-gray-700 italic mb-6 text-lg">
              "A game-changing partnership that elevated our entire organizational strategy."
          </p>
          
          <div>
              <h4 class="font-bold text-xl text-gray-800 mb-2 group-hover:text-purple-600 transition">Emma Rodriguez</h4>
              <p class="text-gray-500 text-sm flex items-center justify-center">
                  <i class="fas fa-chart-line mr-2 text-purple-500"></i>
                  Marketing Director
              </p>
          </div>
      </div>
  </div>
</section>

 <!-- Contact Section -->
 <section id="contact" class="container mx-auto  px-12 py-16">
  <div class="grid md:grid-cols-2 gap-12 items-center">
      <!-- Contact Information -->
      <div class="relative bg-gradient-to-br from-blue-600 to-purple-600 
                  text-white rounded-3xl p-10 mt-14 shadow-2xl overflow-hidden">

          <!-- Content -->
          <div class="relative z-10">
              <h2 class="text-4xl font-extrabold mb-8 
                         bg-clip-text text-transparent 
                         bg-gradient-to-r from-white to-blue-200">
                  Contact Information
              </h2>
              <div class="space-y-7">
                  <div class="flex items-center group">
                      <div class="bg-white/20 p-4 rounded-full mr-6 
                                  group-hover:bg-white/30 transition-all duration-300">
                          <i class="fas fa-map-marker-alt text-2xl"></i>
                      </div>
                      <div>
                          <h3 class="font-semibold text-lg mb-1">Our Location</h3>
                          <p class="text-gray-100 text-sm">
                              123 Billiard Club Street, City, Country
                          </p>
                      </div>
                  </div>
                  <div class="flex items-center group">
                      <div class="bg-white/20 p-4 rounded-full mr-6 
                                  group-hover:bg-white/30 transition-all duration-300">
                          <i class="fas fa-phone text-2xl"></i>
                      </div>
                      <div>
                          <h3 class="font-semibold text-lg mb-1">Phone Number</h3>
                          <p class="text-gray-100 text-sm">+123 456 7890</p>
                      </div>
                  </div>
                  <div class="flex items-center group">
                      <div class="bg-white/20 p-4 rounded-full mr-6 
                                  group-hover:bg-white/30 transition-all duration-300">
                          <i class="fas fa-envelope text-2xl"></i>
                      </div>
                      <div>
                          <h3 class="font-semibold text-lg mb-1">Email Address</h3>
                          <p class="text-gray-100 text-sm">info@billiardclub.com</p>
                      </div>
                  </div>
              </div>
              
              <!-- Social Media Links -->
              <div class="mt-10 flex space-x-5">
                  <a href="#" class="bg-white/20 p-3 rounded-full 
                                     hover:bg-white/30 transition-all duration-300 
                                     transform hover:-translate-y-1">
                      <i class="fab fa-facebook-f text-xl"></i>
                  </a>
                  <a href="#" class="bg-white/20 p-3 rounded-full 
                                     hover:bg-white/30 transition-all duration-300 
                                     transform hover:-translate-y-1">
                      <i class="fab fa-twitter text-xl"></i>
                  </a>
                  <a href="#" class="bg-white/20 p-3 rounded-full 
                                     hover:bg-white/30 transition-all duration-300 
                                     transform hover:-translate-y-1">
                      <i class="fab fa-instagram text-xl"></i>
                  </a>
                  <a href="#" class="bg-white/20 p-3 rounded-full 
                                     hover:bg-white/30 transition-all duration-300 
                                     transform hover:-translate-y-1">
                      <i class="fab fa-linkedin-in text-xl"></i>
                  </a>
              </div>
          </div>
      </div>

      <!-- Contact Form -->
      <div>
          <h2 class="text-4xl font-extrabold mb-8 
                     text-transparent bg-clip-text 
                     bg-gradient-to-r from-blue-600 to-purple-600">
              Get in Touch
          </h2>
          <form class="space-y-6 bg-gray-50 p-8 rounded-3xl shadow-lg">
              <div class="grid md:grid-cols-2 gap-6">
                  <div>
                      <label class="block mb-2 text-gray-700 font-medium" for="firstName">
                          First Name
                      </label>
                      <input 
                          type="text" 
                          id="firstName" 
                          class="w-full p-3 border-2 border-gray-300 rounded-lg 
                                 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 
                                 transition duration-300"
                          placeholder="Enter your first name"
                      >
                  </div>
                  <div>
                      <label class="block mb-2 text-gray-700 font-medium" for="lastName">
                          Last Name
                      </label>
                      <input 
                          type="text" 
                          id="lastName" 
                          class="w-full p-3 border-2 border-gray-300 rounded-lg 
                                 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 
                                 transition duration-300"
                          placeholder="Enter your last name"
                      >
                  </div>
              </div>

              <div>
                  <label class="block mb-2 text-gray-700 font-medium" for="email">
                      Email Address
                  </label>
                  <input 
                      type="email" 
                      id="email" 
                      class="w-full p-3 border-2 border-gray-300 rounded-lg 
                             focus:border-blue-500 focus:ring-2 focus:ring-blue-200 
                             transition duration-300"
                      placeholder="Enter your email address"
                  >
              </div>

              <div>
                  <label class="block mb-2 text-gray-700 font-medium" for="message">
                      Your Message
                  </label>
                  <textarea 
                      id="message" 
                      rows="4" 
                      class="w-full p-3 border-2 border-gray-300 rounded-lg 
                             focus:border-blue-500 focus:ring-2 focus:ring-blue-200 
                             transition duration-300"
                      placeholder="Type your message here..."
                  ></textarea>
              </div>

              <button 
                  type="submit" 
                  class="w-full py-4 bg-gradient-to-r from-blue-600 to-purple-600 
                         text-white rounded-lg font-semibold 
                         hover:opacity-90 transition duration-300 
                         transform hover:scale-105 
                         focus:outline-none focus:ring-2 focus:ring-blue-500 ```html
                  ">
                  Send Message
              </button>
          </form>
      </div>
  </div>
</section>
  </main>
  
 <!-- Footer Section -->
<footer class="bg-gradient-to-br from-gray-900 to-gray-800 text-white py-16">
  <div class="container mx-auto px-4">
      <div class="grid md:grid-cols-4 gap-8">
          <!-- Company Logo and Description -->
          <div class="md:col-span-1">
              <div class="flex items-center mb-6">
                  <img src="img/logo.png" alt="Company Logo" class="h-10 mr-4">
                  <h2 class="text-2xl font-bold text-white">Your Company</h2>
              </div>
              <p class="text-gray-300 mb-6">
                  Empowering designers and teams to create amazing digital experiences with innovative tools and collaborative solutions.
              </p>
              
              <!-- Social Media Icons -->
              <div class="flex space-x-4">
                  <a href="#" class="text-white hover:text-blue-400 transition">
                      <i class="fab fa-facebook-f text-xl"></i>
                  </a>
                  <a href="#" class="text-white hover:text-blue-400 transition">
                      <i class="fab fa-twitter text-xl"></i>
                  </a>
                  <a href="#" class="text-white hover:text-blue-400 transition">
                      <i class="fab fa-instagram text-xl"></i>
                  </a>
                  <a href="#" class="text-white hover:text-blue-400 transition">
                      <i class="fab fa-linkedin-in text-xl"></i>
                  </a>
              </div>
          </div>

          <!-- Use Cases -->
          <div class="md:col-span-1">
              <h3 class="text-xl font-semibold mb-6 text-white">Use Cases</h3>
              <ul class="space-y-3">
                  <li>
                      <a href="#" class="text-gray-300 hover:text-white transition flex items-center">
                          <i class="fas fa-chevron-right mr-2 text-sm text-blue-400"></i>
                          UI Design
                      </a>
                  </li>
                  <li>
                      <a href="#" class="text-gray-300 hover:text-white transition flex items-center">
                          <i class="fas fa-chevron-right mr-2 text-sm text-blue-400"></i>
                          Web Design
                      </a>
                  </li>
                  <li>
                      <a href="#" class="text-gray-300 hover:text-white transition flex items-center">
                          <i class="fas fa-chevron-right mr-2 text-sm text-blue-400"></i>
                          Prototyping
                      </a>
                  </li>
                  <li>
                      <a href="#" class="text-gray-300 hover:text-white transition flex items-center">
                          <i class="fas fa-chevron-right mr-2 text-sm text-blue-400"></i>
                          Wireframing
                      </a>
                  </li>
              </ul>
          </div>

          <!-- Explore -->
          <div class="md:col-span-1">
              <h3 class="text-xl font-semibold mb-6 text-white">Explore</h3>
              <ul class="space-y-3">
                  <li>
                      <a href="#" class="text-gray-300 hover:text-white transition flex items-center">
                          <i class="fas fa-chevron-right mr-2 text-sm text-blue-400"></i>
                          Design
                      </a>
                  </li>
                  <li>
                      <a href="#" class="text-gray-300 hover:text-white transition flex items-center">
                          <i class="fas fa-chevron-right mr-2 text-sm text-blue-400"></i>
                          Collaboration
                      </a>
                  </li>
                  <li>
                      <a href="#" class="text-gray-300 hover:text-white transition flex items-center">
                          <i class="fas fa-chevron-right mr-2 text-sm text-blue-400"></i>
                          Remote Design
                      </a>
                  </li>
                  <li>
                      <a href="#" class="text-gray-300 hover:text-white transition flex items-center">
                          <i class="fas fa-chevron-right mr-2 text-sm text-blue-400"></i>
                          Design Systems
                      </a>
                  </li>
              </ul>
          </div>

          <!-- Newsletter -->
          <div class="md:col-span-1">
              <h3 class="text-xl font-semibold mb-6 text-white">Stay Updated</h3>
              <p class="text-gray-300 mb-4">Subscribe to our newsletter for the latest updates and insights.</p>
              <div class="flex">
                  <input 
                      type="email" 
                      placeholder="Enter your email" 
                      class="w-full p-3 rounded-l-lg bg-gray-700 text-white focus:outline-none focus:ring-2 focus:ring-blue-500"
                  >
                  <button 
                      class="bg-blue-500 text-white px-4 rounded-r-lg hover:bg-blue-600 transition"
                  >
                      <i class="fas fa-paper-plane"></i>
                  </button>
              </div>
          </div>
      </div>

      <!-- Footer Bottom -->
      <div class="mt-12 pt-8 border-t border-gray-700 text-center">
          <p class="text-gray-400">
              &copy; 2023 Your Company. All Rights Reserved.
              <span class="mx-2">|</span>
              <a href="#" class="hover:text-white transition">Privacy Policy</a>
              <span class="mx-2">|</span>
              <a href="#" class="hover:text-white transition">Terms of Service</a>
          </p>
      </div>
  </div>
</footer>
 </body>
 <script>

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
 </script>
 <style>
    @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700&display=swap');
html{
scroll-behavior: smooth;
}
@keyframes pulse {
    0%, 100% {
        opacity: 1;
    }
    50% {
        opacity: 0;
    }
} /* Custom Hover Effects */
.card-hover {
    transition: all 0.3s ease-in-out;
    position: relative;
    overflow: hidden;
}

.card-hover::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(
        120deg, 
        transparent, 
        rgba(255,255,255,0.3), 
        transparent
    );
    transition: all 0.6s ease;
}

.card-hover:hover::before {
    left: 100%;
}

.card-hover:hover {
    transform: translateY(-10px) rotate(2deg);
    box-shadow: 0 20px 25px -5px rgba(0,0,0,0.2), 
                0 10px 10px -5px rgba(0,0,0,0.1);
}

.card-hover .hover-overlay {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0,0,0,0.1);
    opacity: 0;
    transition: opacity 0.3s ease;
}

.card-hover:hover .hover-overlay {
    opacity: 1;
}

.card-hover .hover-content {
    position: absolute;
    bottom: -100%;
    left: 0;
    width: 100%;
    background: rgba(0,0,0,0.7);
    color: white;
    padding: 10px;
    transition: bottom 0.3s ease;
    text-align: center;
}

.card-hover:hover .hover-content {
    bottom: 0;
} @keyframes pulse-border {
    0% {
        transform: scale(1);
        opacity: 0.7;
    }
    50% {
        transform: scale(1.05);
        opacity: 1;
    }
    100% {
        transform: scale(1);
        opacity: 0.7;
    }
}

.animate-pulse-border {
    animation: pulse-border 2s infinite;
}    /* Enhanced Hover and Transition Effects */
.testimonial-card {
    transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
}
.testimonial-card:hover {
    transform: scale(1.05) rotate(2deg);
    box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
}
.testimonial-card:hover .client-image {
    transform: scale(1.1) rotate(-5deg);
}
.testimonial-gradient {
    background: linear-gradient(
        145deg, 
        rgba(59, 130, 246, 0.05) 0%, 
        rgba(147, 51, 234, 0.05) 100%
    );
}
  /* Custom styles for the navbar */
  .nav-link {
    transition: color 0.3s ease, transform 0.3s ease;
}
.nav-link:hover {
    color: #A0AEC0; /* Gray-400 */
    transform: translateY(-2px);
}
.navbar-brand {
    transition: color 0.3s ease;
}
.navbar-brand:hover {
    color: #A0AEC0; /* Gray-400 */
}
.icon {
    transition: transform 0.3s ease;
}
.icon:hover {
    transform: scale(1.2);
}
.cta{
    background: url("cta.jpg");
}    @keyframes wiggle {
    0% { transform: translateX(0); }
    25% { transform: translateX(-5px); }
    50% { transform: translateX(5px); }
    75% { transform: translateX(-5px); }
    100% { transform: translateX(0); }
}
.animate-wiggle {
    animation: wiggle 1s ease-in-out infinite;
} 
 </style>
  <!-- Swiper JS -->
  <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
</html>