<div class="row justify-content-center">
    <div class="col-12 col-lg-10 col-xl-8">
        <div class="row align-items-center mb-4">
            <div class="col">
                <h2 class="h5 page-title"><small class="text-muted text-uppercase">Invoice</small><br><?= $nota ?></h2>
            </div>
            <div class="col-auto">
                <button type="button" class="btn btn-primary">Print</button>
            </div>
        </div>
        <div class="card shadow">
            <div class="card-body p-5">
                <div class="row mb-5">
                    <div class="col-12 text-center mb-4">
                        <h2 class="mb-0 text-uppercase">Invoice</h2>
                        <p class="text-muted"> MiyoKasir</p>
                    </div>
                    <div class="col-md-7">
                        <p class="small text-muted text-uppercase mb-2">Invoice from</p>
                        <p class="mb-4">
                            <strong><?= $this->session->userdata('username') ?></strong><br>Jl. Miniwati 69, Karanglawas<br>
                        </p>
                        <p>
                            <span class="small text-muted text-uppercase">Invoice #</span><br>
                            <strong><?= $nota ?></strong>
                        </p>
                    </div>
                    <div class="col-md-5">
                        <p class="small text-muted text-uppercase mb-2">Invoice to</p>
                        <p class="mb-4">
                            <strong><?= $penjualan->nama ?></strong><br> <?= $penjualan->alamat ?><br><?= $penjualan->telp ?><br>
                        </p>
                        <p>
                            <small class="small text-muted text-uppercase">Due date</small><br>
                            <?php $this->load->helper('date');
                            $datestring = '%d %F %Y';
                            $time = time();
                            $nice = mdate($datestring, $time);
                            ?>
                            <strong><?= $nice ?></strong>
                        </p>
                    </div>
                </div> <!-- /.row -->
                <table class="table table-borderless table-striped">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Product Code</th>
                            <th scope="col">Product</th>
                            <th scope="col">Count</th>
                            <th scope="col" class="text-right">Price</th>
                            <th scope="col" class="text-right">Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $total = 0;
                        $no = 1;
                        foreach ($detail as $as) { ?>

                            <tr>
                                <th scope="row"><?= $no++; ?></th>
                                <td><?= $as['kode_produk'] ?></td>
                                <td><?= $as['nama'] ?></td>
                                <td><?= $as['jumlah'] ?></td>
                                <td class="text-right">Rp. <?= number_format($as['harga']) ?></td>
                                <td class="text-right">Rp. <?= number_format($as['jumlah'] * $as['harga']) ?></td>
                            </tr>
                            <tr>
                            </tr>
                        <?php $total = $total + $as['jumlah'] * $as['harga'];
                        } ?>
                    </tbody>
                </table>
                <div class="row mt-5">
                    <div class="col-md-7"></div>
                    <div class="col-md-5">
                        <div class="text-right mr-2">
                            <p class="mb-2 h6">
                                <span class="text-muted">Total Price : </span>
                                <strong><?= number_format($total); ?></strong>
                            </p>
                            </p>
                        </div>
                    </div>
                </div>
                </thead>
                <tbody>
            </div> <!-- /.card-body -->
        </div> <!-- /.card -->
    </div> <!-- /.col-12 -->
</div>

