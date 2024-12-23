<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Airsoft Fanclub Registration</title>
    <!-- Menyisipkan font dan CSS -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <!-- Header untuk bagian atas halaman -->
    <header class="header">
        <div class="container">
            <h1>🎯 Airsoft Fanclub Indonesia</h1>
            <p>Join the biggest airsoft community in Indonesia!</p>
        </div>
    </header>

    <div class="container">
        <!-- Menampilkan pesan sukses jika sesi 'success' di-set -->
        <?php if(isset($_SESSION['success'])): ?>
            <div class="success-message">
                <?php echo $_SESSION['success']; unset($_SESSION['success']); ?>
            </div>
        <?php endif; ?>

        <!-- Form pendaftaran anggota -->
        <div class="registration-form">
            <h2>Member Registration</h2>
            <!-- Aksi form diarahkan ke file 'process.php' -->
            <form id="userForm" action="php/process.php" method="POST">
                <div class="form-group">
                    <label for="username">Callsign (Username)</label>
                    <input type="text" class="form-control" id="username" name="username" required>
                    <!-- Untuk menampilkan error validasi -->
                    <span id="usernameError" class="error"></span>
                </div>

                <div class="form-group">
                    <label for="email">Email Address</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                    <span id="emailError" class="error"></span>
                </div>

                <!-- Pilihan tingkat pengalaman -->
                <div class="form-group">
                    <label>Experience Level</label>
                    <div class="radio-group">
                        <div class="radio-item">
                            <input type="radio" id="beginner" name="experience" value="beginner" required>
                            <label for="beginner">Beginner</label>
                        </div>
                        <div class="radio-item">
                            <input type="radio" id="intermediate" name="experience" value="intermediate">
                            <label for="intermediate">Intermediate</label>
                        </div>
                        <div class="radio-item">
                            <input type="radio" id="advanced" name="experience" value="advanced">
                            <label for="advanced">Advanced</label>
                        </div>
                    </div>
                    <span id="experienceError" class="error"></span>
                </div>

                <!-- Pilihan jenis permainan -->
                <div class="form-group">
                    <label>Preferred Game Types</label>
                    <div class="checkbox-group">
                        <div class="checkbox-item">
                            <input type="checkbox" id="cqb" name="gameTypes[]" value="cqb">
                            <label for="cqb">CQB</label>
                        </div>
                        <div class="checkbox-item">
                            <input type="checkbox" id="milsim" name="gameTypes[]" value="milsim">
                            <label for="milsim">MilSim</label>
                        </div>
                        <div class="checkbox-item">
                            <input type="checkbox" id="woodland" name="gameTypes[]" value="woodland">
                            <label for="woodland">Woodland</label>
                        </div>
                        <div class="checkbox-item">
                            <input type="checkbox" id="speedsoft" name="gameTypes[]" value="speedsoft">
                            <label for="speedsoft">Speedsoft</label>
                        </div>
                    </div>
                    <span id="gameTypesError" class="error"></span>
                </div>

                <!-- Tombol untuk submit form -->
                <button type="submit" class="btn">Join Fanclub</button>
            </form>
        </div>

        <!-- Demo penggunaan cookies dan localStorage -->
        <div class="storage-demo">
            <h2>Storage Demo</h2>
            
            <!-- Demo penggunaan cookie -->
            <div class="demo-section">
                <h3>🍪 Cookie Management</h3>
                <div class="form-group">
                    <input type="text" id="cookieValue" class="form-control" placeholder="Enter value to store">
                    <div class="button-group">
                        <button onclick="setCookie('demoKey', document.getElementById('cookieValue').value, 1)" class="btn btn-small">Set Cookie (1 day)</button>
                        <button onclick="showCookie('demoKey')" class="btn btn-small">Show Cookie</button>
                        <button onclick="deleteCookie('demoKey')" class="btn btn-small">Delete Cookie</button>
                    </div>
                </div>
                <div id="cookieDisplay" class="display-box"></div>
            </div>

            <!-- Demo penggunaan localStorage -->
            <div class="demo-section">
                <h3>💾 Local Storage</h3>
                <div class="form-group">
                    <input type="text" id="storageCallsign" class="form-control" placeholder="Enter your callsign">
                    <div class="button-group">
                        <button onclick="saveToLocalStorage()" class="btn btn-small">Save Callsign</button>
                        <button onclick="showFromLocalStorage()" class="btn btn-small">Show Callsign</button>
                        <button onclick="clearLocalStorage()" class="btn btn-small">Clear Storage</button>
                    </div>
                </div>
                <div id="storageDisplay" class="display-box"></div>
            </div>
        </div>

        <!-- Tabel untuk menampilkan anggota yang sudah terdaftar -->
        <div class="user-table">
            <h2>Current Members</h2>
            <div id="userTable"></div>
        </div>
    </div>

    <!-- Menyisipkan file JavaScript -->
    <script src="script/script.js"></script>
</body>
</html>
