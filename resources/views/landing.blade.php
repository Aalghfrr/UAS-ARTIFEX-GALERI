<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Artifex Gallery — Where Art Comes Alive</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: 'Poppins', sans-serif;
      background: linear-gradient(135deg, #f8f9ff 0%, #f0f2ff 100%);
      min-height: 100vh;
      overflow-x: hidden;
      position: relative;
    }

    /* Dynamic Background Grid */
    .grid-bg {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      z-index: -2;
      background-image: 
        linear-gradient(rgba(94, 53, 177, 0.03) 1px, transparent 1px),
        linear-gradient(90deg, rgba(94, 53, 177, 0.03) 1px, transparent 1px);
      background-size: 40px 40px;
      transform: perspective(600px) rotateX(45deg);
      animation: gridMove 20s linear infinite;
    }

    @keyframes gridMove {
      0% { background-position: 0 0; }
      100% { background-position: 40px 40px; }
    }

    /* Floating Art Dots */
    .floating-dots {
      position: fixed;
      width: 100%;
      height: 100%;
      z-index: -1;
      pointer-events: none;
    }

    .dot {
      position: absolute;
      width: 4px;
      height: 4px;
      border-radius: 50%;
      opacity: 0.4;
      animation: floatUp 15s infinite linear;
    }

    .dot:nth-child(1) { 
      top: 20%; left: 10%; 
      background: #FF6B6B; 
      animation-delay: 0s; 
      width: 6px; height: 6px;
    }
    .dot:nth-child(2) { 
      top: 60%; left: 85%; 
      background: #4ECDC4; 
      animation-delay: -3s; 
    }
    .dot:nth-child(3) { 
      top: 80%; left: 15%; 
      background: #FFD166; 
      animation-delay: -6s; 
      width: 8px; height: 8px;
    }
    .dot:nth-child(4) { 
      top: 30%; left: 90%; 
      background: #7C4DFF; 
      animation-delay: -9s; 
    }
    .dot:nth-child(5) { 
      top: 85%; left: 70%; 
      background: #06D6A0; 
      animation-delay: -12s; 
      width: 5px; height: 5px;
    }

    @keyframes floatUp {
      0% {
        transform: translateY(0) rotate(0deg);
        opacity: 0.2;
      }
      50% {
        opacity: 0.6;
      }
      100% {
        transform: translateY(-100vh) rotate(360deg);
        opacity: 0.2;
      }
    }

    /* Main Container */
    .hero-container {
      display: flex;
      min-height: 100vh;
      align-items: center;
      justify-content: center;
      padding: 40px 20px;
      position: relative;
    }

    /* Left Art Preview Section */
    .art-preview {
      flex: 1;
      max-width: 500px;
      padding-right: 60px;
      position: relative;
    }

    .art-grid {
      display: grid;
      grid-template-columns: repeat(3, 1fr);
      gap: 15px;
      transform: rotate(-2deg);
    }

    .art-card {
      border-radius: 16px;
      overflow: hidden;
      box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
      transition: all 0.5s cubic-bezier(0.175, 0.885, 0.32, 1.275);
      position: relative;
      cursor: pointer;
      background: white;
      height: 180px;
    }

    .art-card:nth-child(1) { 
      grid-column: 1 / 3; 
      background: linear-gradient(135deg, #FF6B6B, #FF8E8E);
      transform: rotate(-3deg);
    }
    .art-card:nth-child(2) { 
      grid-column: 3; 
      background: linear-gradient(135deg, #4ECDC4, #06D6A0);
      transform: rotate(2deg);
      margin-top: 30px;
    }
    .art-card:nth-child(3) { 
      grid-column: 1; 
      background: linear-gradient(135deg, #FFD166, #FFB347);
      transform: rotate(4deg);
      margin-top: -20px;
    }
    .art-card:nth-child(4) { 
      grid-column: 2 / 4; 
      background: linear-gradient(135deg, #7C4DFF, #5E35B1);
      transform: rotate(-5deg);
      margin-top: 20px;
    }

    .art-card:hover {
      transform: scale(1.05) rotate(0deg) !important;
      z-index: 10;
      box-shadow: 0 25px 50px rgba(0, 0, 0, 0.2);
    }

    .art-card::before {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      background: linear-gradient(to bottom, transparent 50%, rgba(0,0,0,0.1));
      opacity: 0;
      transition: opacity 0.3s;
    }

    .art-card:hover::before {
      opacity: 1;
    }

    /* Right Content Section */
    .content-section {
      flex: 1;
      max-width: 500px;
      position: relative;
      z-index: 10;
    }

    .logo-section {
      text-align: center;
      margin-bottom: 40px;
    }

    .logo-icon {
      font-size: 64px;
      margin-bottom: 20px;
      position: relative;
      display: inline-block;
    }

    .logo-icon i {
      color: #5E35B1;
      text-shadow: 0 10px 20px rgba(94, 53, 177, 0.3);
      animation: paletteSpin 8s infinite linear;
    }

    @keyframes paletteSpin {
      0% { transform: rotate(0deg) scale(1); }
      50% { transform: rotate(180deg) scale(1.1); }
      100% { transform: rotate(360deg) scale(1); }
    }

    .logo-section h1 {
      font-size: 48px;
      font-weight: 800;
      background: linear-gradient(135deg, #5E35B1 0%, #FF6B6B 50%, #4ECDC4 100%);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      margin-bottom: 10px;
      letter-spacing: -0.5px;
    }

    .logo-section .tagline {
      font-size: 18px;
      color: #666;
      font-weight: 400;
      letter-spacing: 1px;
    }

    .description {
      font-size: 16px;
      line-height: 1.8;
      color: #555;
      margin-bottom: 50px;
      text-align: center;
      padding: 0 20px;
    }

    /* Action Buttons */
    .action-buttons {
      display: flex;
      flex-direction: column;
      gap: 20px;
      margin-bottom: 40px;
    }

    .btn {
      padding: 20px 40px;
      border-radius: 16px;
      text-decoration: none;
      font-weight: 600;
      font-size: 18px;
      display: flex;
      align-items: center;
      justify-content: center;
      gap: 15px;
      transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
      position: relative;
      overflow: hidden;
      border: none;
      cursor: pointer;
    }

    .btn::before {
      content: '';
      position: absolute;
      top: 0;
      left: -100%;
      width: 100%;
      height: 100%;
      background: linear-gradient(90deg, transparent, rgba(255,255,255,0.4), transparent);
      transition: 0.5s;
    }

    .btn:hover::before {
      left: 100%;
    }

    .btn-login {
      background: linear-gradient(135deg, #5E35B1 0%, #7C4DFF 100%);
      color: white;
      box-shadow: 0 15px 30px rgba(94, 53, 177, 0.3);
    }

    .btn-login:hover {
      transform: translateY(-8px);
      box-shadow: 0 25px 40px rgba(94, 53, 177, 0.4);
    }

    .btn-register {
      background: white;
      color: #2f2f52;
      box-shadow: 0 10px 25px rgba(0, 0, 0, 0.08);
      border: 2px solid transparent;
      background-clip: padding-box;
      position: relative;
    }

    .btn-register::after {
      content: '';
      position: absolute;
      top: -2px;
      left: -2px;
      right: -2px;
      bottom: -2px;
      background: linear-gradient(135deg, #FF6B6B, #FFD166, #4ECDC4, #7C4DFF);
      border-radius: 18px;
      z-index: -1;
      opacity: 0;
      transition: opacity 0.3s;
    }

    .btn-register:hover {
      transform: translateY(-8px);
      box-shadow: 0 20px 35px rgba(0, 0, 0, 0.15);
    }

    .btn-register:hover::after {
      opacity: 1;
    }

    /* Features */
    .features {
      display: grid;
      grid-template-columns: repeat(3, 1fr);
      gap: 15px;
      margin-top: 40px;
    }

    .feature {
      background: rgba(255, 255, 255, 0.8);
      backdrop-filter: blur(10px);
      border-radius: 12px;
      padding: 20px 15px;
      text-align: center;
      transition: all 0.3s;
      border: 1px solid rgba(255, 255, 255, 0.5);
    }

    .feature:hover {
      transform: translateY(-5px);
      background: white;
      box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
    }

    .feature i {
      font-size: 24px;
      margin-bottom: 10px;
      display: block;
    }

    .feature:nth-child(1) i { color: #FF6B6B; }
    .feature:nth-child(2) i { color: #4ECDC4; }
    .feature:nth-child(3) i { color: #7C4DFF; }

    .feature span {
      font-size: 14px;
      font-weight: 500;
      color: #555;
    }

    /* Footer Note */
    .footer-note {
      text-align: center;
      margin-top: 40px;
      font-size: 14px;
      color: #888;
      padding-top: 20px;
      border-top: 1px solid rgba(0, 0, 0, 0.05);
    }

    /* Responsive */
    @media (max-width: 1024px) {
      .hero-container {
        flex-direction: column;
        gap: 60px;
      }
      
      .art-preview {
        padding-right: 0;
        max-width: 100%;
      }
      
      .content-section {
        max-width: 100%;
        padding: 0 20px;
      }
      
      .logo-section h1 {
        font-size: 40px;
      }
    }

    @media (max-width: 768px) {
      .art-grid {
        grid-template-columns: repeat(2, 1fr);
        gap: 12px;
      }
      
      .features {
        grid-template-columns: 1fr;
        gap: 12px;
      }
      
      .btn {
        padding: 18px 30px;
        font-size: 16px;
      }
      
      .logo-section h1 {
        font-size: 36px;
      }
      
      .description {
        font-size: 15px;
      }
    }

    @media (max-width: 480px) {
      .art-grid {
        grid-template-columns: 1fr;
      }
      
      .art-card {
        height: 150px;
      }
      
      .logo-section h1 {
        font-size: 32px;
      }
      
      .logo-icon {
        font-size: 48px;
      }
      
      .description {
        font-size: 14px;
        padding: 0;
      }
    }

    /* Particle Animation */
    @keyframes pulse {
      0%, 100% { opacity: 0.3; }
      50% { opacity: 0.6; }
    }
  </style>
</head>
<body>
  <!-- Background Elements -->
  <div class="grid-bg"></div>
  
  <div class="floating-dots">
    <div class="dot"></div>
    <div class="dot"></div>
    <div class="dot"></div>
    <div class="dot"></div>
    <div class="dot"></div>
  </div>

  <div class="hero-container">
    <!-- Left: Art Preview Grid -->
    <div class="art-preview">
      <div class="art-grid">
        <div class="art-card"></div>
        <div class="art-card"></div>
        <div class="art-card"></div>
        <div class="art-card"></div>
      </div>
    </div>

    <!-- Right: Main Content -->
    <div class="content-section">
      <div class="logo-section">
        <div class="logo-icon">
          <i class="fas fa-palette"></i>
        </div>
        <h1>Artifex Gallery</h1>
        <div class="tagline">WHERE ART COMES ALIVE</div>
      </div>

      <p class="description">
        Temukan keindahan dalam setiap piksel. Jelajahi karya seni digital eksklusif, 
        koneksi dengan seniman berbakat, dan miliki bagian dari kreativitas tak terbatas.
      </p>

      <div class="action-buttons">
        <a href="{{ route('login') }}" class="btn btn-login">
          <i class="fas fa-sign-in-alt"></i>
          <span>Masuk ke Galeri</span>
        </a>
        
        <a href="{{ route('register') }}" class="btn btn-register">
          <i class="fas fa-user-plus"></i>
          <span>Bergabung Sekarang</span>
        </a>
      </div>

      <div class="features">
        <div class="feature">
          <i class="fas fa-paint-brush"></i>
          <span>Koleksi Eksklusif</span>
        </div>
        <div class="feature">
          <i class="fas fa-bolt"></i>
          <span>Real-time Interaksi</span>
        </div>
        <div class="feature">
          <i class="fas fa-shopping-cart"></i>
          <span>Beli & Koleksi</span>
        </div>
      </div>

      <div class="footer-note">
        <p>© 2024 Artifex Gallery. Setiap karya adalah cerita yang menunggu untuk ditemukan.</p>
      </div>
    </div>
  </div>

  <script>
    // Interactive art cards
    document.querySelectorAll('.art-card').forEach(card => {
      card.addEventListener('mouseenter', function() {
        this.style.zIndex = '100';
      });
      
      card.addEventListener('mouseleave', function() {
        this.style.zIndex = '1';
      });
    });

    // Dynamic dot creation
    function createFloatingDots(count) {
      const container = document.querySelector('.floating-dots');
      
      for (let i = 0; i < count; i++) {
        const dot = document.createElement('div');
        dot.className = 'dot';
        
        // Random properties
        const size = Math.random() * 8 + 2;
        const colors = ['#FF6B6B', '#4ECDC4', '#FFD166', '#7C4DFF', '#06D6A0'];
        const color = colors[Math.floor(Math.random() * colors.length)];
        
        dot.style.width = `${size}px`;
        dot.style.height = `${size}px`;
        dot.style.background = color;
        dot.style.left = `${Math.random() * 100}%`;
        dot.style.top = `${Math.random() * 100}%`;
        dot.style.animationDelay = `${Math.random() * -20}s`;
        dot.style.animationDuration = `${Math.random() * 10 + 10}s`;
        
        container.appendChild(dot);
      }
    }
    
    // Create more dots
    createFloatingDots(15);

    // Button hover effect enhancement
    document.querySelectorAll('.btn').forEach(btn => {
      btn.addEventListener('mouseenter', function() {
        this.style.transform = 'translateY(-8px)';
      });
      
      btn.addEventListener('mouseleave', function() {
        if(this.classList.contains('btn-login')) {
          this.style.transform = 'translateY(0)';
        }
      });
    });

    // Background grid animation
    const gridBg = document.querySelector('.grid-bg');
    let angle = 45;
    
    window.addEventListener('mousemove', (e) => {
      const x = (e.clientX / window.innerWidth) * 10;
      const y = (e.clientY / window.innerHeight) * 10;
      
      gridBg.style.transform = `perspective(600px) rotateX(${45 + y}deg) rotateY(${x}deg)`;
    });
  </script>
</body>
</html>