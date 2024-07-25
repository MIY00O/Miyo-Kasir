<nav class="topnav navbar navbar-light">
    <button type="button" class="navbar-toggler text-muted mt-2 p-0 mr-3 collapseSidebar">
        <i class="fe fe-menu navbar-toggler-icon"></i>
    </button>
    <p class="mr-auto my-2"><?= $title; ?></p>
    <ul class="nav">
        <li class="nav-item">
            <?php if ($this->session->userdata('username') == NULL) { ?>
                <a class="my-2 btn mb-2 btn-outline-link" href="#" type="button" data-toggle="modal" data-target="#login">
                    Login
                </a>
            <?php } else { ?>
                <p class="my-2">Welcome, <?php if ($this->session->userdata('username') == NULL) { ?>
                        <?php } else { ?><?= $this->session->userdata('level') ?><?php } ?>
                        <a class="btn btn-primary" href="#" type="button" data-toggle="modal" data-target="#logout"><?= $this->session->userdata('nama') ?></a>
                </p>
            <?php } ?>
        </li>
        <li class="nav-item">
            <a class="nav-link text-muted my-2" href="#" id="modeSwitcher" data-mode="light">
                <i class="fe fe-sun fe-16"></i>
            </a>
        </li>
    </ul>
</nav>

<!-- MODAL -->
<div class="modal fade" id="logout" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Logout</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('Home/Logout') ?>" method="post">
                <div class="modal-body">
                    <label for="">Apakah anda ingin logout?</label>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger">Logout</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="login" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Login</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('Home/Login') ?>" method="post">
                    <div class="form-group">
                        <label for="firstname">Username</label>
                        <input name="username" type="text" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="inputEmail4">Password</label>
                        <input name="password" type="password" class="form-control">
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Login</button>
            </div>
            </form>
        </div>
    </div>
</div>
