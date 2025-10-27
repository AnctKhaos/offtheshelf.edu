<?php include 'protect_student.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width,initial-scale=1" />
<title>Off the Shelf — E-Learning Repository (PLM CN Style)</title>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700;800&display=swap" rel="stylesheet" />
<style>
/* ========== ROOT STYLES ========== */
:root {
  --gold: #f1d687ff;
  --maroon: #8A0808;
  --green: #2e6f4a;
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
  display: flex;
  flex-direction: column;
  min-height: 100vh;
}

/* ========== HEADER ========== */
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
  gap: 3px;
  align-items: center;
}
.brand img {
  height: 67px;
  width: 67px;
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

/* ===== Hero ===== */
  .hero{max-width:var(--maxw); margin:18px auto;}
  .hero .banner{
    flex:1; background: linear-gradient(180deg, rgba(255,255,255,0.02), rgba(0,0,0,0.02));
    border-radius:12px; padding:18px; display:flex; gap:14px; align-items:center;  box-shadow:0 6px 20px 10px rgba(0,0,0,0.10);
  }
  .banner img{width:170px; height:170px; object-fit:cover; border-radius:8px; flex-shrink:0; border:2px solid rgba(255,255,255,0.06)}
  .banner .text h2{margin:0; color:var(--green); font-size:20px}
  .banner .text p{margin:6px 0 0; color:var(--muted); font-size:14px}
/* ========== MAIN ========== */
main{max-width:var(--maxw); margin:12px auto 24px; display:grid; grid-template-columns: 300px 1fr; gap:18px; padding:0 12px; align-items: start;}

/* ========== LEFT SIDEBAR ========== */
.clock-section, .calendar-section {
  text-align: center;
  padding: 16px 0;
  border-bottom: 2px solid #f0f0f0;
  margin-bottom: 16px;
}

/* ========== RIGHT CARD ========== */
.right-card {
  background: #fff;
  border-radius: 12px;
  box-shadow: 0 4px 14px rgba(0,0,0,0.08);
  width: 100%;
  padding: 40px;
  overflow: auto;
}
.grid {
  display: grid;
  grid-template-columns: repeat(auto-fill, minmax(170px, 1fr));
  gap: 20px;
}
.image-card {
  position: relative;
  border-radius: 12px;
  overflow: hidden;
  box-shadow: 0 4px 10px rgba(0,0,0,0.1);
  cursor: pointer;
  transition: transform 0.2s ease, box-shadow 0.2s ease;
  background: #fff;
  height: 250px;
  display: flex;
  align-items: center;
  justify-content: center;
}
.image-card:hover {
  transform: translateY(-6px);
  box-shadow: 0 10px 25px rgba(0,0,0,0.15);
}
.image-card img {
  width: 100%;
  height: 140%;
  object-fit: cover;
  border-radius:12px;
}
.image-card .overlay {
  position: absolute;
  inset: 0;
  background: rgba(20,83,45,0.6);
  color: white;
  display: flex;
  align-items: center;
  justify-content: center;
  text-align: center;           /* centers multi-line text */
  padding: 0 10px;              /* adds space so text doesn’t touch edges */
  font-weight: 700;
  font-size: 14px;
  line-height: 1.3;             /* improves readability for wrapped text */
  opacity: 0;
  transition: opacity 0.3s ease;
  border-radius: 12px;
  word-wrap: break-word;        /* breaks long words instead of overflowing */
  overflow-wrap: break-word;    /* modern fallback */
}
.image-card:hover .overlay {
  opacity: 1;
}
/* ===== H3 Headings ===== */
.right-card h3 {
  color: var(--green);
  font-weight: 700;
  margin-bottom: 14px;
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
/* ========== RESPONSIVE ========== */
@media (max-width: 920px) {
  main {
    grid-template-columns: 1fr;
  padding:0 12px} .hero{flex-direction:column} .brand h1{font-size:18px} }

/* Align cards perfectly with the banner */
.hero,
main {
  max-width: var(--maxw);
  margin-left: auto;
  margin-right: auto;
  width: 100%;
  padding: 0;
}

/* Make the right-card align visually with the banner */
.right-card {
  background: #fff;
  border-radius: 12px;
  box-shadow: 0 4px 14px rgba(0,0,0,0.08);
  width: 100%;
  padding: 40px;
  overflow: auto;
  box-sizing: border-box;
}

/* Remove internal extra padding from main to line up edges */
main {
  padding: 0;
}
/* ===== MINI CALENDAR STYLING ===== */
#miniCalendar {
  display: flex;
  flex-direction: column;
  align-items: center;
  gap: 8px;
  background: #ffffff;
  border: 1px solid #e0e0e0;
  border-radius: 10px;
  padding: 12px;
  box-shadow: 0 3px 8px rgba(0,0,0,0.08);
  font-family: 'Inter', sans-serif;
  color: #333;
  width: 100%;
  max-width: 300px;
  margin: 0 auto;
  box-sizing: border-box;
}

.calendar-header {
  text-align: center;
  font-weight: 700;
  font-size: 0.95em;
  color: var(--green);
  margin-bottom: 6px;
}

.calendar-grid {
  display: grid;
  grid-template-columns: repeat(7, 1fr);
  gap: 4px;
  width: 100%;
  text-align: center;
}

.calendar-day {
  font-weight: 600;
  font-size: 0.75em;
  color: var(--green);
  padding: 4px 0;
  border-bottom: 1px solid #e8e8e8;
}

.calendar-date {
  font-size: 0.8em;
  padding: 6px 0;
  border-radius: 6px;
  transition: background 0.3s, color 0.3s;
}

.calendar-date.other-month {
  color: #ccc;
}

.calendar-date.today {
  background: var(--green);
  color: #fff;
  font-weight: 700;
  border-radius: 6px;
  box-shadow: 0 0 6px rgba(46,111,74,0.3);
}

.calendar-date:hover {
  background: rgba(46,111,74,0.15);
  color: var(--green);
  cursor: pointer;
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
      <img src="cnlogo.png" alt="PLM CN Logo" />
      <div>
        <h1>Off the Shelf — Home</h1>
        <p>Pamantasan ng Lungsod ng Maynila, College of Nursing</p>
      </div>
    </div>
    <nav>
      <a href="Repository.html">Repository</a>
      <a href="select_role.php">Log Out</a>
    </nav>
  </div>
</header>

<section class="hero" aria-hidden="false">
    <div class="banner" role="region" aria-label="project banner">
      <img src="profile.jpg" alt="Banner placeholder">
      <div class="text">
        <h2>Welcome, Future Nurse!</h2>
        <p class="muted">A curated e-learning repository of fundamental nursing concepts — lecture notes, return demos, videos, and nursing care plans, organized for PLM nursing students.</p>
        <div style="height:8px"></div>
        <div style="display:flex; gap:8px;">
        </div>
      </div>
    </div>
  </section>

<main>
  <!-- LEFT CARD -->
  <aside class="card" id="sidebarCard">
    <div class="clock-section">
      <div id="digitalClock" style="font-size: 1.8em; font-weight: bold; color: var(--green); font-family: 'Courier New', monospace; margin-bottom: 8px;">00:00:00</div>
      <div id="currentDate" style="color: var(--muted); font-size: 0.85em;">Loading...</div>
    </div>

    <div class="calendar-section">
      <h4 style="color: var(--green); margin-bottom: 12px; font-size: 1em;">Calendar</h4>
      <div id="miniCalendar" style="font-size: 0.8em;"></div>
    </div>

    <div style="text-align: center; margin-top: 20px;">
      <button onclick="window.location.href='repository.html'" style="width: 70%; padding: 12px 20px; background: var(--green); color: white; border: none; border-radius: 8px; font-size: 1em; cursor: pointer; font-weight: 600;">
        Upload Resource
      </button>
    </div>
  </aside>

  <!-- RIGHT CARD -->
  <section class="right-card">
    <h3>First Semester Courses</h3>
    <div class="grid">
      <div class="image-card" onclick="window.location.href='Anaphy.html'">
        <img src="ANAPHY.png" alt="Anatomy">
        <div class="overlay">Anatomy & Physiology</div>
      </div>
      <div class="image-card" onclick="window.location.href='theory.html'">
        <img src="TFN.png" alt="Theory">
        <div class="overlay">Theoretical Foundations in Nursing</div>
      </div>
    </div>

    <h3 style="margin-top: 20px;">Second Semester Courses</h3>
    <div class="grid">
      <div class="image-card" onclick="window.location.href='Bacon.html'">
        <img src="BACON.png" alt="BaCon">
        <div class="overlay">Basic Concepts in Nursing</div>
      </div>
      <div class="image-card" onclick="window.location.href='Health.html'">
        <img src="HA.png" alt="Ha">
        <div class="overlay">Health Assessment</div>
      </div>
      <div class="image-card" onclick="window.location.href='MicroPara.html'">
        <img src="MICROPARA.png" alt="MicroPara">
        <div class="overlay">Microbiology & Parasitology</div>
      </div>
      <div class="image-card" onclick="window.location.href='Values.html'">
        <img src="ETHICS.png" alt="VPE">
        <div class="overlay">Values & Professional Ethics</div>
      </div>
    </div>
  </section>
</main>

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
<div id="loader" style="display:none;">
  <div class="loader-container">
    <div class="ring"></div>
    <div class="ring"></div>
    <div class="ring"></div>
    <div class="ring"></div>
    <img src="cnlogo.png" alt="Loading" />
  </div>
</div>

<script>
    // Digital Clock
function updateClock() {
  const now = new Date();
  let hours = now.getHours();
  const minutes = String(now.getMinutes()).padStart(2, '0');
  const seconds = String(now.getSeconds()).padStart(2, '0');
  let ampm = "AM";

  if (hours >= 12) {
    ampm = "PM";
    if (hours > 12) hours -= 12;
  }
  if (hours === 0) {
    hours = 12; // midnight case
  }

  const timeString = `${hours}:${minutes}:${seconds} ${ampm}`;
  document.getElementById("digitalClock").textContent = timeString;

  // update date too
  const dateOptions = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
  document.getElementById("currentDate").textContent = now.toLocaleDateString(undefined, dateOptions);
}

setInterval(updateClock, 1000);
updateClock();

// Mini Calendar
function generateCalendar() {
  const now = new Date();
  const year = now.getFullYear();
  const month = now.getMonth();
  const today = now.getDate();
  
  const firstDay = new Date(year, month, 1).getDay();
  const daysInMonth = new Date(year, month + 1, 0).getDate();
  const daysInPrevMonth = new Date(year, month, 0).getDate();
  
  const monthNames = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
  
  let html = `<div class="calendar-header"><span>${monthNames[month]} ${year}</span></div><div class="calendar-grid">`;
  html += '<div class="calendar-day">Su</div><div class="calendar-day">Mo</div><div class="calendar-day">Tu</div><div class="calendar-day">We</div><div class="calendar-day">Th</div><div class="calendar-day">Fr</div><div class="calendar-day">Sa</div>';
  
  for (let i = firstDay - 1; i >= 0; i--) {
    html += `<div class="calendar-date other-month">${daysInPrevMonth - i}</div>`;
  }
  
  for (let day = 1; day <= daysInMonth; day++) {
    const isToday = day === today ? 'today' : '';
    html += `<div class="calendar-date ${isToday}">${day}</div>`;
  }
  
  const totalCells = firstDay + daysInMonth;
  const remainingCells = totalCells <= 35 ? 35 - totalCells : 42 - totalCells;
  for (let day = 1; day <= remainingCells; day++) {
    html += `<div class="calendar-date other-month">${day}</div>`;
  }
  
  html += '</div>';
  const calEl = document.getElementById('miniCalendar');
  if(calEl) calEl.innerHTML = html;
}

generateCalendar();
function adminSubmit() {
  const pass = document.getElementById("adminInput").value.trim();
}

/* Loader for navigation */
function startLoading(targetPage) {
  const loader = document.getElementById("loader");
  loader.style.display = "flex";
  setTimeout(() => { window.location.href = targetPage; }, 3000);
}
document.querySelectorAll("nav a").forEach(link => {
  link.addEventListener("click", e => {
    e.preventDefault();
    const target = link.getAttribute("href");
    startLoading(target);
  });
});

// Show loader before page content fully loads
document.onreadystatechange = function () {
  const loader = document.getElementById("loader");
  if (document.readyState !== "complete") {
    loader.style.display = "flex";
  } else {
    setTimeout(() => loader.style.display = "none", 1500); // hide after 2s
  }
};

</script>

<script src="session_timer.js"></script>

</body>
</html>
