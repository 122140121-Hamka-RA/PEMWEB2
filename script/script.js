// Form validation code (keeping your existing validation)
document.getElementById('userForm').addEventListener('submit', function(e) {
    let isValid = true;
    
    // Mendapatkan nilai input dari form
    const username = document.getElementById('username').value;
    const email = document.getElementById('email').value;
    const experience = document.querySelector('input[name="experience"]:checked');
    const gameTypes = document.querySelectorAll('input[name="gameTypes[]"]:checked');

    // Validasi username
    if (username.length < 3) {
        document.getElementById('usernameError').textContent = 'Callsign must be at least 3 characters';
        isValid = false;
    } else {
        document.getElementById('usernameError').textContent = '';
    }

    // Validasi email
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailRegex.test(email)) {
        document.getElementById('emailError').textContent = 'Please enter a valid email address';
        isValid = false;
    } else {
        document.getElementById('emailError').textContent = '';
    }

    // Validasi pengalaman
    if (!experience) {
        document.getElementById('experienceError').textContent = 'Please select your experience level';
        isValid = false;
    } else {
        document.getElementById('experienceError').textContent = '';
    }

    // Validasi jenis permainan
    if (gameTypes.length === 0) {
        document.getElementById('gameTypesError').textContent = 'Please select at least one game type';
        isValid = false;
    } else {
        document.getElementById('gameTypesError').textContent = '';
    }

    // Mencegah submit jika validasi gagal
    if (!isValid) {
        e.preventDefault();
    }
});

// Cookie Management Functions
function setCookie(name, value, days) {
    const expires = new Date();
    expires.setTime(expires.getTime() + (days * 24 * 60 * 60 * 1000));
    document.cookie = name + '=' + encodeURIComponent(value) + ';expires=' + expires.toUTCString() + ';path=/';
    showCookie(name); // Show the cookie immediately after setting
}

function getCookie(name) {
    const nameEQ = name + "=";
    const ca = document.cookie.split(';');
    for(let i = 0; i < ca.length; i++) {
        let c = ca[i];
        while (c.charAt(0) === ' ') c = c.substring(1, c.length);
        if (c.indexOf(nameEQ) === 0) return decodeURIComponent(c.substring(nameEQ.length, c.length));
    }
    return null;
}

function deleteCookie(name) {
    document.cookie = name + '=;expires=Thu, 01 Jan 1970 00:00:01 GMT;path=/';
    document.getElementById('cookieDisplay').textContent = 'Cookie deleted';
}

function showCookie(name) {
    const cookieValue = getCookie(name);
    const displayElement = document.getElementById('cookieDisplay');
    if (cookieValue) {
        displayElement.textContent = `Cookie value: ${cookieValue}`;
    } else {
        displayElement.textContent = 'No cookie found';
    }
}

// Local Storage Functions
function saveToLocalStorage() {
    const callsign = document.getElementById('storageCallsign').value;
    if (callsign) {
        localStorage.setItem('userCallsign', callsign);
        showFromLocalStorage();
    }
}

function showFromLocalStorage() {
    const callsign = localStorage.getItem('userCallsign');
    const displayElement = document.getElementById('storageDisplay');
    if (callsign) {
        displayElement.textContent = `Stored callsign: ${callsign}`;
    } else {
        displayElement.textContent = 'No callsign stored';
    }
}

function clearLocalStorage() {
    localStorage.removeItem('userCallsign');
    document.getElementById('storageDisplay').textContent = 'Storage cleared';
    document.getElementById('storageCallsign').value = '';
}

// Load members function
function loadMembers() {
    fetch('php/get_members.php')
        .then(response => response.json())
        .then(data => {
            const table = document.createElement('table');
            table.className = 'table';
            table.innerHTML = `
                <thead>
                    <tr>
                        <th>Callsign</th>
                        <th>Email</th>
                        <th>Experience</th>
                        <th>Game Types</th>
                        <th>Browser</th>
                        <th>IP Address</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            `;
            
            const tbody = table.querySelector('tbody');
            
            data.forEach(member => {
                const row = document.createElement('tr');
                row.innerHTML = `
                    <td>${member.username}</td>
                    <td>${member.email}</td>
                    <td><span class="badge ${member.experience.toLowerCase()}">${member.experience}</span></td>
                    <td>${
                        member.game_types
                            .split(',')
                            .map(type => `<span class="badge ${type.trim().toLowerCase()}">${type.trim()}</span>`)
                            .join(' ')
                    }</td>
                    <td>${member.browser}</td>
                    <td>${member.ip_address}</td>
                `;
                tbody.appendChild(row);
            });
            
            const tableContainer = document.getElementById('userTable');
            tableContainer.innerHTML = '';
            tableContainer.appendChild(table);
        })
        .catch(error => {
            console.error('Error loading members:', error);
            document.getElementById('userTable').innerHTML = '<p class="error">Error loading members data</p>';
        });
}

// Initialize page
document.addEventListener('DOMContentLoaded', function() {
    loadMembers();
    showFromLocalStorage(); // Show any stored callsign
    showCookie('demoKey'); // Show any existing demo cookie
});