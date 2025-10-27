  // Handle back/forward cache and force redirect to intro.html
    window.addEventListener("pageshow", function(event) {
        if (event.persisted || (window.performance && window.performance.navigation.type === 2)) {
            window.location.href = "intro.html";
        }
    });

    // Auto-logout client-side after inactivity
    let timeoutSeconds = 900; // 900 for 15 minutes
    function logout() {
        alert("Session expired due to inactivity.");
        window.location.href = "intro.html";
    }

    // Start timer
    let logoutTimer = setTimeout(logout, timeoutSeconds * 1000);

    // Reset timer on user activity
    function resetTimer() {
        clearTimeout(logoutTimer);
        logoutTimer = setTimeout(logout, timeoutSeconds * 1000);
    }

    document.addEventListener("mousemove", resetTimer);
    document.addEventListener("keydown", resetTimer);
    document.addEventListener("scroll", resetTimer);
    document.addEventListener("click", resetTimer);