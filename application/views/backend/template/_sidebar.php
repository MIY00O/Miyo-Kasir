<aside class="sidebar-left border-right bg-white shadow" id="leftSidebar" data-simplebar>
    <a href="#" class="btn collapseSidebar toggle-btn d-lg-none text-muted ml-2 mt-3" data-toggle="toggle">
        <i class="fe fe-x"><span class="sr-only"></span></i>
    </a>
    <nav class="vertnav navbar navbar-light">
        <!-- nav bar -->
        <div class="w-100 mb-4 d-flex">
            <a class="navbar-brand mx-auto mt-2 flex-fill text-center" href="./index.html">
                <svg id="logo" class="navbar-brand-img brand-sm" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 120 120" xml:space="preserve">
                    <g>
                        <polygon class="st0" points="78,105 15,105 24,87 87,87 	" />
                        <polygon class="st0" points="96,69 33,69 42,51 105,51 	" />
                        <polygon class="st0" points="78,33 15,33 24,15 87,15 	" />
                    </g>
                </svg>
            </a>
        </div>

        <?php $halaman = $this->uri->segment(2, 0); ?>
        <?php $halaman2 = $this->uri->segment(2, 0); ?>
        <ul class="navbar-nav flex-fill w-100 mb-2">
            <li class="nav-item w-100 <?php if ($halaman2 == 'Home') {
                                            echo "active";
                                        } ?>">
                <a class="nav-link" href="<?= base_url('home') ?>">
                    <i class="fe fe-home fe-16"></i>
                    <span class="ml-3 item-text">Dashboard</span>
                </a>
            </li>
        </ul>


        <?php if ($this->session->userdata('username') == NULL) { ?>
        <?php } else { ?>
            <p class="text-muted nav-heading mt-4 mb-1">
                <span>kasir</span>
            </p>
            <?php if ($this->session->userdata('level') == "Admin") { ?>
                <ul class="navbar-nav flex-fill w-100 mb-2">
                    <!-- <li class="nav-item w-100 <?php if ($halaman2 !== 'home' and $halaman !== 'Suara') {
                                                        echo "";
                                                    } elseif ($halaman == 'Suara') {
                                                        echo "active";
                                                    } ?>">
                        <a class="nav-link" href="<?= base_url('Backend/Suara') ?>">
                            <i class="fe fe-volume-2 fe-16"></i>
                            <span class="ml-3 item-text">Suara</span>
                        </a>
                    </li> -->
                </ul>
                <ul class="navbar-nav flex-fill w-100 mb-2">
                    <li class="nav-item w-100 <?php if ($halaman2 !== 'home' and $halaman !== 'Penjualan') {
                                                    echo "";
                                                } elseif ($halaman == 'Penjualan') {
                                                    echo "active";
                                                } ?>">
                        <a class="nav-link" href="<?= base_url('Backend/Penjualan') ?>">
                            <i class="fe fe-shopping-cart fe-16"></i>
                            <span class="ml-3 item-text">Sales</span>
                        </a>
                    </li>
                </ul>
                <ul class="navbar-nav flex-fill w-100 mb-2">
                    <li class="nav-item w-100 <?php if ($halaman2 !== 'home' and $halaman !== 'Produk') {
                                                    echo "";
                                                } elseif ($halaman == 'Produk') {
                                                    echo "active";
                                                } ?>">
                        <a class="nav-link" href="<?= base_url('Backend/Produk') ?>">
                            <i class="fe fe-shopping-bag fe-16"></i>
                            <span class="ml-3 item-text">Products</span>
                        </a>
                    </li>
                </ul>
                <ul class="navbar-nav flex-fill w-100 mb-2">
                    <li class="nav-item w-100 <?php if ($halaman2 !== 'home' and $halaman !== 'Pelanggan') {
                                                    echo "";
                                                } elseif ($halaman == 'Pelanggan') {
                                                    echo "active";
                                                } ?>">
                        <a class="nav-link" href="<?= base_url('Backend/Pelanggan') ?>">
                            <i class="fe fe-user-check fe-16"></i>
                            <span class="ml-3 item-text">Customers</span>
                        </a>
                    </li>
                </ul>
                <ul class="navbar-nav flex-fill w-100 mb-2">
                    <li class="nav-item w-100 <?php if ($halaman2 !== 'home' and $halaman !== 'Pengguna') {
                                                    echo "";
                                                } elseif ($halaman == 'Pengguna') {
                                                    echo "active";
                                                } ?>">
                        <a class="nav-link" href="<?= base_url('Backend/Pengguna') ?>">
                            <i class="fe fe-user fe-16"></i>
                            <span class="ml-3 item-text">Users</span>
                        </a>
                    </li>
                </ul>
            <?php } else { ?>
                <ul class="navbar-nav flex-fill w-100 mb-2">
                    <li class="nav-item w-100 <?php if ($halaman2 !== 'home' and $halaman !== 'Penjualan') {
                                                    echo "";
                                                } elseif ($halaman == 'Penjualan') {
                                                    echo "active";
                                                } ?>">
                        <a class="nav-link" href="<?= base_url('Backend/Penjualan') ?>">
                            <i class="fe fe-shopping-cart fe-16"></i>
                            <span class="ml-3 item-text">Sales</span>
                        </a>
                    </li>
                </ul>
                <ul class="navbar-nav flex-fill w-100 mb-2">
                    <li class="nav-item w-100 <?php if ($halaman2 !== 'home' and $halaman !== 'Produk') {
                                                    echo "";
                                                } elseif ($halaman == 'Produk') {
                                                    echo "active";
                                                } ?>">
                        <a class="nav-link" href="<?= base_url('Backend/Produk') ?>">
                            <i class="fe fe-shopping-bag fe-16"></i>
                            <span class="ml-3 item-text">Products</span>
                        </a>
                    </li>
                </ul>
                <ul class="navbar-nav flex-fill w-100 mb-2">
                    <li class="nav-item w-100 <?php if ($halaman2 !== 'home' and $halaman !== 'Pelanggan') {
                                                    echo "";
                                                } elseif ($halaman == 'Pelanggan') {
                                                    echo "active";
                                                } ?>">
                        <a class="nav-link" href="<?= base_url('Backend/Pelanggan') ?>">
                            <i class="fe fe-user-check fe-16"></i>
                            <span class="ml-3 item-text">Customers</span>
                        </a>
                    </li>
                </ul>
            <?php } ?>
        <?php } ?>
    </nav>
</aside>