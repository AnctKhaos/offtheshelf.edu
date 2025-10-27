<?php
session_start();
include 'db_connect.php'; // only if this page needs database access
?>

<!DOCTYPE html> 
<html lang="en">
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width,initial-scale=1" />
<title>Log In — Off the Shelf</title>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700;800&display=swap" rel="stylesheet" />
<style>
  :root {
    --gold: #f1d687ff;
    --maroon: #8A0808;
    --green: #2E6F4A;
    --bg: #fbfbfb;
    --card: #ffffff;
    --muted: #59606a;
    --maxw: 1200px;
    font-family: "Inter", system-ui, -apple-system, "Segoe UI", Roboto, "Helvetica Neue", Arial;
  }

  body {
    margin: 0;
    background: var(--bg);
    color: #0f1724;
    line-height: 1.6;
  }

  /* ===== HEADER ===== */
  .site-header {
    background: linear-gradient(90deg, #2e6f4a 40%, #f1d687ff 100%);
    color: white;
    padding: 18px 24px;
    box-shadow: 0 5px 18px rgba(10, 10, 10, 0.15);
  }
  .site-header .inner {
    max-width: var(--maxw);
    margin: 0 auto;
    display: flex;
    align-items: center;
    gap: 16px;
  }
  .brand {
    display: flex;
    gap: 14px;
    align-items: center;
  }
  .brand img {
    height: 56px;
    width: 56px;
    object-fit: contain;
    border-radius: 8px;
    padding: 6px;
  }
  .brand h1 {
    margin: 0;
    font-size: 20px;
    color: var(--gold);
  }
  .brand p {
    margin: 0;
    font-size: 12px;
    color: rgba(255, 255, 255, 0.9);
  }

  nav {
    margin-left: auto;
    display: flex;
    gap: 8px;
  }
  nav a {
    color: white;
    text-decoration: none;
    padding: 8px 12px;
    border-radius: 8px;
    font-weight: 600;
    font-size: 14px;
  }
  nav a:hover {
    background: rgba(255, 255, 255, 0.06);
  }

  /* ===== VIDEO SECTION ===== */
  .video-container {
    position: relative;
    width: 100%;
    height: 300px;
    overflow: hidden;
  }

  .video-container video {
    width: 100%;
    height: 300px;
    object-fit: cover;
    display: block;
  }

  .overlay-text {
    position: absolute;
    bottom: 0;
    left: 0;
    width: 100%;
    z-index: 2;
    color: white;
    text-align: left;
    padding: 20px 40px;
    pointer-events: none;
    user-select: none;
    display: flex;
    align-items: center;
    gap: 20px;
    background: linear-gradient(to top, rgba(0,0,0,0.6), transparent);
    box-sizing: border-box;
  }

  .overlay-text img {
    width: 150px;
    height: 150px;
    object-fit: cover;
    border-radius: 12px;
    flex-shrink: 1;
    transition: all 0.3s ease;
  }

  .overlay-text .text-content {
    display: flex;
    flex-direction: column;
    flex: 1 1 auto;
    margin-right: 60px;
    transition: margin 0.3s ease;
  }

  .overlay-text h2 {
    font-size: 32px;
    color: var(--gold);
    margin: 0 0 10px 0;
  }

  .overlay-text p {
    color: #f0e68c;
    font-size: 16px;
    margin: 0;
  }

  /* ===== LOGIN CARD (from reference code) ===== */
    .login-container {
      flex: 1;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      padding: 50px 0;
    }

    .login-card {
      background: white;
      padding: 32px;
      border-radius: 16px;
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.12);
      width: 100%;
      max-width: 350px;
      text-align: center;
      border: 2px solid #0c5b2f;
    }

    .login-card img {
      height: 70px;
      margin-bottom: 14px;
    }

    .login-card h1 {
      color: #0c5b2f;
      font-size: 20px;
      margin-bottom: 6px;
    }

    .login-card p {
      font-size: 14px;
      color: #555;
      margin-bottom: 24px;
    }

    .login-card input {
      width: 100%;
      padding: 12px 14px;
      border: 1px solid #ccc;
      border-radius: 10px;
      margin-bottom: 14px;
      font-size: 14px;
    }

    .login-card button {
      position: relative;
      width: 100%;
      padding: 5px;
      border: none;
      border-radius: 5px;
      background-color: transparent;
      color: #2E6F4A;
      font-weight: bold;
      cursor: pointer;
      font-size: 15px;
      display: flex;
      align-items: center;
      justify-content: center;
      gap: 8px;
      box-shadow: 0 6px 12px rgba(242, 201, 76, 0.25);
      overflow: hidden;
      transition: color 0.3s ease;
      z-index: 1;
    }

    .login-card button::before {
      content: "";
      position: absolute;
      top: 0;
      left: -100%;
      width: 100%;
      height: 100%;
      background: linear-gradient(to right, #2E6F4A, #8dc63f, #f1d687ff);
      transition: left 0.4s ease;
      z-index: 0;
    }

    .login-card button:hover::before {
      left: 0;
    }

    .login-card button:hover {
      color: #fff;
    }

    .login-card button img {
      position: relative;
      z-index: 1;
    }

    .login-card .muted {
      font-size: 13px;
      margin-top: 14px;
      color: #777;
    }

    .button-group {
      display: flex;
      justify-content: center;
      gap: 40px;
      margin: 25px 0;
    }

    .login-option {
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      width: 120px;
      height: 120px;
      border-radius: 50%;
      background: transparent;
      border: 3px solid white;
      cursor: pointer;
      transition: transform 0.2s ease;
      color: white;
      position: relative;
      overflow: hidden;
    }

    .login-option img {
      height: 60px;
      width: auto;
      margin-bottom: 8px;
      z-index: 2;
      position: relative;
    }

    .login-option:hover img {
      filter: brightness(0) saturate(100%) invert(18%) sepia(81%) saturate(437%) hue-rotate(87deg) brightness(92%) contrast(96%);
      transition: filter 0.3s ease;
    }

    .login-option span {
      background-color: #509a47;
      padding: 4px 10px;
      border-radius: 6px;
      color: white;
      font-weight: 600;
      font-size: 14px;
      z-index: 2;
      position: relative;
      transition: all 0.3s ease;
    }

    .login-option:hover span {
      background-color: #ffffff;
      color: #0c5b2f;
    }
  /* ===== FOOTER ===== */
  .site-footer {
    background: var(--green);
    margin: 0;
    padding: 18px 24px;
    box-shadow: 0 6px 20px rgba(10, 10, 10, 0.04);
    border-top: 6px solid var(--gold);
    color: white;
  }
  .site-footer .inner {
    max-width: var(--maxw);
    margin: 0 auto;
    display: flex;
    gap: 12px;
    justify-content: space-between;
    align-items: center;
  }
  .site-footer .brandline {
    display: flex;
    gap: 10px;
    align-items: center;
  }
  .site-footer img {
    height: 40px;
    width: 40px;
    object-fit: cover;
    border-radius: 6px;
  }

  /* Loader Overlay */
    #loader {
      position: fixed;
      inset: 0;
      display: none;
      align-items: center;
      justify-content: center;
      background: url("plm-campus.jpg") no-repeat center center/cover;
      z-index: 9999;
    }

    /* Tint Overlay for loader */
    #loader::before {
      content: "";
      position: absolute;
      inset: 0;
      background: rgba(20, 83, 45, 0.40); 
    }

    .loader-container {
      position: relative;
      width: 150px;
      height: 150px;
      display: flex;
      align-items: center;
      justify-content: center;
      z-index: 1;
    }

    .loader-container img {
      width: 80px;
      height: 80px;
      border-radius: 50%;
      animation: pulse 2s infinite;
    }

    @keyframes pulse {
      0%, 100% { transform: scale(1); opacity: 1; }
      50% { transform: scale(1.1); opacity: 0.7; }
    }

    .ring {
      position: absolute;
      border: 1.5px solid green;
      border-radius: 50%;
      border-top-color: transparent;
      border-left-color: transparent;
    }

    .ring:nth-child(2) {
      width: 115px;
      height: 115px;
      border-color: gold;
      border-top-color: transparent;
      border-left-color: transparent;
      animation: spin 2s linear infinite;
    }

    .ring:nth-child(3) {
      width: 100px;
      height: 100px;
      animation: spin 3s linear infinite;
    }

    .ring:nth-child(4) {
      width: 130px;
      height: 130px;
      animation: spin 4s linear infinite;
    }

    @keyframes spin {
      0% { transform: rotate(0deg); }
      100% { transform: rotate(360deg); }
    }
</style>
</head>
<body>

<header class="site-header">
  <div class="inner">
    <div class="brand">
      <img src="cnlogo.png" alt="PLM CN Logo"/>
      <div>
        <h1>Off the Shelf - Log In</h1>
        <p>Pamantasan ng Lungsod ng Maynila, College of Nursing</p>
      </div>
    </div>
    <nav>
      <a href="Intro.html">Return</a>
    </nav>
  </div>
</header>

<section class="video-container">
  <video autoplay loop muted playsinline>
    <source src="Video display 2.mov" type="video/mp4" />
    Your browser does not support the video tag.
  </video>
  <section class="overlay-text">
    <img src="logo-only.png" alt="Logo"/>
    <div>
      <h2>Off the Shelf</h2>
      <p>Off the Shelf is a digital repository of first-year nursing students in Pamantasan ng Lungsod ng Maynila. It serves as a collection of demonstration videos, lecture lessons and case studies covering subjects in the first-year nursing curriculum.</p>
    </div>
  </section>
</section>

<!-- ✅ LOGIN CARD (replaced with reference version) -->
<div class="login-container">
  <div class="login-card" id="loginCard">
    <img src="cn-logo.png" alt="PLM CN Logo">
    <h1>College of Nursing</h1>
    <p>Off the Shelf — E-Learning Repository</p>

    <div class="button-group">
      <button class="login-option" onclick="location.href='login.php?role=admin'">
        <img src="admin-logo.png" alt="Admin Logo">
        <span>Admin</span>
      </button>
      <button class="login-option" onclick="location.href='login.php?role=student'">
        <img src="student-logo.png" alt="Student Logo">
        <span>Student</span>
      </button>
    </div>

    <div class="muted">Click above if you are an Admin or Student to log-in.</div>
  </div>
</div>

<footer class="site-footer">
  <div class="inner">
    <div class="brandline">
      <img src="cnlogo.png" alt="PLM CN Logo" />
      <div>
         <div style="font-weight:600; color:var(--gold); font-size: 16px">Pamantasan ng Lungsod ng Maynila</div>
        <div style="font-size: 12px;">College of Nursing — Off the Shelf Project</div>
      </div>
    </div>
    <div style= "font-size: 12px;">Prototype version — created by PLM Nursing Developers</div>
  </div>
</footer>

<!-- Loader -->
<div id="loader">
  <div class="loader-container">
    <div class="ring"></div>
    <div class="ring"></div>
    <div class="ring"></div>
    <div class="ring"></div>
    <img src="cnlogo.png" alt="Loading" />
  </div>
</div>

<script>
  // Loader function
  function startLoading(targetPage) {
    const loader = document.getElementById("loader");
    loader.style.display = "flex";
    setTimeout(() => {
      window.location.href = targetPage;
    }, 3000);
  }

  // Apply loader to all nav links
  document.querySelectorAll("nav a").forEach(link => {
    link.addEventListener("click", function(e) {
      e.preventDefault();
      const target = this.getAttribute("href");
      startLoading(target);
    });
  });
</script>
</body>
</html>
