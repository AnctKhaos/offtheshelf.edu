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

  if (pass === "PLMCN25") {
    alert("Admin login successful.");
    window.location.href = "Dashboard.html"; // go to Admin Dashboard
  } else {
    document.getElementById("adminMsg").textContent = "Incorrect passcode.";
  }
}