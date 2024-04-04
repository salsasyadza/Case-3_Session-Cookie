<?php
session_start();

// Cek apakah pengguna sudah login
if (isset($_SESSION['email'])) {
    header("Location: profil.php");
    exit();
}

// Ambil email dari cookie jika ada
$email = isset($_COOKIE['email']) ? $_COOKIE['email'] : '';
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Login</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {
            $("#loginForm").submit(function(event) {
                event.preventDefault();
                var email = $("#email").val();
                var password = $("#password").val();

                // Validasi email dan password di sisi client
                if (!validateEmail(email) || !validatePassword(password)) {
                    $('#errorModal').modal('show');
                    return;
                }

                // Kirim data ke server menggunakan AJAX
                $.ajax({
                    type: "POST",
                    url: "cekLogin.php",
                    data: {email: email, password: password},
                    success: function(response) {
                        if (response == "success") {
                            // Simpan email dalam cookie jika checkbox "Remember Me" dicentang
                            if ($("#rememberMe").is(":checked")) {
                                var expirationDate = new Date();
                                expirationDate.setDate(expirationDate.getDate() + 1); // 1 hari
                                document.cookie = "email=" + email + "; expires=" + expirationDate.toUTCString();
                            }
                            window.location.href = "profil.php";
                        } else {
                            $('#errorModal').modal('show');
                        }
                    }
                });
            });

            function validateEmail(email) {
                var re = /\S+@\S+\.\S+/;
                return re.test(email);
            }

            function validatePassword(password) {
                var re = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[!@#$%^&*]).{8,}$/;
                return re.test(password);
            }

            function showDialog(message) {
                alert(message);
            }
        });
    </script>
    <style>
        .custom-container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        body{
            background-image: url('img3.jpg');
            background-size: cover;
            background-position: center;
        }
        .overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5); 
        }
    </style>
</head>
<body>
<div class="overlay"></div>
<div class="container custom-container">
            <div class="card" style="box-shadow: black 0px 0px 10px; border-radius: 20px; padding: 20px;">
                <h2 class="card-title text-center">Selamat Datang di FILKOM Library!</h2>
                <h6 class="text-center">silahkan login untuk melanjutkan</h3>
                <form id="loginForm">
                    <div class="mb-3">
                        <label for="email" class="form-label">Email:</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">Password:</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>

                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="rememberMe" name="rememberMe">
                        <label class="form-check-label" for="rememberMe">Ingat Saya</label>
                    </div>

                    <button type="submit" class="btn" style="background-color: #134A6E; color: white">Login</button>
                </form>
            </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="errorModal" tabindex="-1" aria-labelledby="errorModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="errorModalLabel">Terjadi Kesalahan <font style="color: red;">!!!</font></h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <p>email/password salah atau tidak valid</p>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn" data-bs-dismiss="modal" style="background-color: #134A6E; color: white;">Mengerti</button>
        </div>
        </div>
    </div>
    </div>

</body>
</html>
