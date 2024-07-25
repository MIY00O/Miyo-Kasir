<div class="col-md-12">
    <div class="card shadow">
        <div class="card-body">
            <!-- table -->
            <div id="dataTable-1_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                <div class="row">
                    <div class="col-sm-6">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambahpenjualan">
                            <i class="fe fe-plus fe-16"></i> Sales
                        </button>
                    </div>
                    <div class="col-sm-6 d-flex justify-content-end align-items-center">

                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-sm-12">
                        <table class="table datatables dataTable no-footer" id="dataTable-1" role="grid" aria-describedby="dataTable-1_info">
                            <thead>
                                <tr role="row">
                                    <th tabindex="0" aria-controls="dataTable-1" rowspan="1" colspan="1">#</th>
                                    <th tabindex="0" aria-controls="dataTable-1" rowspan="1" colspan="1">Pelanggan</th>
                                    <th tabindex="0" aria-controls="dataTable-1" rowspan="1" colspan="1">Nominal</th>
                                    <th tabindex="0" aria-controls="dataTable-1" rowspan="1" colspan="1">Invoice</th>
                                    <th tabindex="0" aria-controls="dataTable-1" rowspan="1" colspan="1">Action</th>
                                </tr>
                            </thead>

                            <tbody class="">
                                <?php $no = 1;
                                $total = 0;
                                foreach ($penjualan as $as) { ?>

                                    <tr role="row" class="odd">
                                        <td><?= $no++; ?></td>
                                        <td><?= $as['nama'] ?></td>
                                        <td>Rp. <?= number_format($as['total_harga']) ?></td>
                                        <td><?= $as['kode_penjualan'] ?></td>
                                        <td><button class="btn btn-sm dropdown-toggle more-horizontal" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <span class="text-muted sr-only">Action</span>
                                            </button>
                                            <div class="dropdown-menu dropdown-menu-left">
                                                <a href="<?= base_url('Backend/Penjualan/invoice/' . $as['kode_penjualan']); ?>" class="btn btn-primary dropdown-item">Check</a>
                                            </div>
                                        </td>
                                    </tr>
                                <?php $total = $total + $as['total_harga'];
                                } ?>

                                <tr>
                                    <td>Total</td>
                                    <td></td>
                                    <td>Rp. <?= number_format($total) ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="tambahpenjualan" tabindex="-1" role="dialog" aria-labelledby="modal1Label" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal1Label">Pilih Pelanggan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('backend/Pelanggan/Simpan') ?>" method="post">
                    <table class="table datatables dataTable no-footer" id="dataTable-1" role="grid" aria-describedby="dataTable-1_info">
                        <thead>
                            <tr role="row">
                                <th name="" class="sorting" tabindex="0" aria-controls="dataTable-1" rowspan="1" colspan="1" aria-label="#: activate to sort column ascending">#</th>
                                <th name="" class="sorting_desc" tabindex="0" aria-controls="dataTable-1" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending" aria-sort="descending">Name</th>
                                <th name="" class="sorting" tabindex="0" aria-controls="dataTable-1" rowspan="1" colspan="1" aria-label="Department: activate to sort column ascending">Telp</th>
                                <th name="" class="sorting" tabindex="0" aria-controls="dataTable-1" rowspan="1" colspan="1" aria-label="Company: activate to sort column ascending">Action</th>
                            </tr>
                        </thead>
                        <?php $no = 1;

                        foreach ($pelanggan as $as) { ?>
                            <tbody class="">
                                <tr role="row" class="odd">
                                    <td><?= $no++; ?></td>
                                    <td><?= $as['nama'] ?></td>
                                    <td><?= $as['telp'] ?></td>
                                    <td>
                                        <a href="<?= base_url('Backend/Penjualan/transaksi/' . $as['id_pelanggan']) ?>" class="btn btn-primary">Select</a>
                                    </td>
                                </tr>
                            </tbody>
                        <?php } ?>
                    </table>
                </form>
            </div>
        </div>
    </div>
</div>


<?php foreach ($pelanggan as $as) { ?>
    <div class="modal fade" id="transaksi<?= $as['id_pelanggan'] ?>" tabindex="-1" role="dialog" aria-labelledby="modal2Label" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title " id="modal2Label">Transaksi Penjualan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                </div>
            </div>
        </div>
    </div>
<?php } ?>

<!-- Script -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.4.1/chart.min.js"></script>