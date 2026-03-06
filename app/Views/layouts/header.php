<nav class="app-header navbar navbar-expand bg-body">
    <div class="container-fluid">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-lte-toggle="sidebar" href="#" role="button">
                    <i class="bi bi-list"></i>
                </a>
            </li>
            <a href="<?= base_url('dashboard') ?>" class="nav-link <?= ($segment == 'dashboard') ? 'active' : '' ?>">Home</a></li>
            <a href="<?= base_url('students') ?>" class="nav-link <?= ($segment == 'students') ? 'active' : '' ?>">Student</a></li>
            <a href="<?= base_url('records') ?>" class="nav-link <?= ($segment == 'records') ? 'active' : '' ?>">Inventory Management</a></li>
            <li class="nav-item">
        </ul>
        <ul class="navbar-nav ms-auto">
            <li class="nav-item">
                <a class="nav-link" data-widget="navbar-search" href="#" role="button">
                    <i class="bi bi-search"></i>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#" data-lte-toggle="fullscreen">
                    <i data-lte-icon="maximize" class="bi bi-arrows-fullscreen"></i>
                    <i data-lte-icon="minimize" class="bi bi-fullscreen-exit" style="display: none"></i>
                </a>
            </li>
            <li class="nav-item dropdown user-menu">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                    <img src="<?= base_url('assets/images/avatar6.jfif') ?>" class="user-image rounded-circle shadow" alt="User Image" />
                    <span class="d-none d-md-inline"><?= $user['fullname'] ?? 'User' ?></span>
                </a>
                <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-end">
                    <li class="user-header text-bg-primary">
                        <img src="<?= base_url('assets/images/avatar6.jfif') ?>" class="rounded-circle shadow" alt="User Image" />
                        <p><?= $user['fullname'] ?? 'User' ?> - <?= $user['role'] ?? 'Member' ?><small>Member since Nov. 2023</small></p>
                    </li>
                    <li class="user-body">
                        <div class="row">
                            <div class="col-4 text-center"><a href="#">Followers</a></div>
                            <div class="col-4 text-center"><a href="#">Sales</a></div>
                            <div class="col-4 text-center"><a href="#">Friends</a></div>
                        </div>
                    </li>
                    <li class="user-footer">
                        <a href="#" class="btn btn-default btn-flat">Profile</a>
                        <a href="<?= base_url('logout') ?>" class="btn btn-default btn-flat float-end">Sign out</a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</nav>