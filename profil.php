<?php
session_start();

// Cek apakah pengguna sudah login
if (!isset($_SESSION['email'])) {
    header("Location: login.php");
    exit();
}

$email = $_SESSION['email'];
?>

<!DOCTYPE html>
<html>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <title>Halaman Profil</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#logoutLink").click(function(event) {
                event.preventDefault();
                $.ajax({
                    type: "POST",
                    url: "logout.php",
                    success: function() {
                        window.location.href = "login.php";
                    }
                });
            });
        });
    </script>
    <style>
        .carousel-item img {
            border-radius: 10px; 
        }
        .dark-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.2); 
            border-radius: 10px;
        }
    </style>
</head>
<body>
    <?php include('header.php'); ?> 

    <div style="text-align: center; margin-top: 20px; color: #424242;">
        <h1>Selamat Datang!<br>FILKOM Library</h1>
    </div>

    <div id="carouselExample" class="carousel slide" style="width: 600px; position: relative; margin: auto; margin-top: 30px;">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="img1.jpg" class="d-block w-100" alt="foto">
                <div class="dark-overlay"></div> 
            </div>
            <div class="carousel-item">
                <img src="img2.jpg" class="d-block w-100" alt="foto">
                <div class="dark-overlay"></div> 
            </div>
            <div class="carousel-item">
                <img src="img3.jpg" class="d-block w-100" alt="foto">
                <div class="dark-overlay"></div> 
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <?php include('footer.php'); ?> 
</body>
</html>
