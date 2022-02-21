<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container">
        <a class="navbar-brand" href="#">Shop</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
                <a class="nav-link " aria-current="page" href="dashboard">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Categories</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Items</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="members">Members</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Statistics</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Logs</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <?= $_SESSION['username'] ?>
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="edit_profile">Edit profile</a></li>
                    <li><a class="dropdown-item" href="settings">Setting</a></li>
                    <li><a class="dropdown-item" href="logout">Logout</a></li>
                </ul>
            </li>
        </ul>
        </div>
    </div>
</nav>