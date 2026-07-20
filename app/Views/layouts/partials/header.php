<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
  <div class="container-fluid">
    <a class="navbar-brand text-success fw-bold" href="<?= site_url('/') ?>">Mobile Money</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNavbar" aria-controls="mainNavbar" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="mainNavbar">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" href="<?= site_url('/') ?>">Home</a>
        </li>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="operatorMenu" role="button" data-bs-toggle="dropdown" aria-expanded="false">Operator</a>
          <ul class="dropdown-menu" aria-labelledby="operatorMenu">
            <li><a class="dropdown-item" href="#">Dashboard</a></li>
            <li><a class="dropdown-item" href="#">Transactions</a></li>
            <li><a class="dropdown-item" href="#">Settings</a></li>
          </ul>
        </li>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="clientMenu" role="button" data-bs-toggle="dropdown" aria-expanded="false">Client</a>
          <ul class="dropdown-menu" aria-labelledby="clientMenu">
            <li><a class="dropdown-item" href="#">Profile</a></li>
            <li><a class="dropdown-item" href="#">Send Money</a></li>
            <li><a class="dropdown-item" href="#">History</a></li>
          </ul>
        </li>
      </ul>

      <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" href="#"><i class="bi bi-bell"></i></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#"><i class="bi bi-person-circle"></i> Account</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
