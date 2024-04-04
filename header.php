<nav class="navbar navbar-expand-lg navbar-light " style="box-shadow: rgba(0, 0, 0, 0.300) 0px 0px 20px;">
  <div class="container-fluid container">
    <a class="navbar-brand" style="color: #134A85; font-weight: bold;" href="#">FILKOM Library</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" style="color: #134A85;" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" style="color: #134A85;" href="#">Profil</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="color: #134A85;">
            Dropdown
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="#" style="color: #134A85;">Action</a></li>
            <li><a class="dropdown-item" href="#" style="color: #134A85;">Another action</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#" style="color: #134A85;">Something else here</a></li>
          </ul>
        </li>
      </ul>
      <p class="nav-item mx-2 mb-2 mb-lg-0" style="font-weight: 500;"><?php echo $email; ?></p>
      <button href="#" id="logoutLink" class="btn" style="background-color: #134A85; color: white;">Logout</button>
      
      
    </div>
  </div>
</nav>
