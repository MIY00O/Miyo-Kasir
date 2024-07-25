<div class="row">
    <div class="col-md-3">
        <div class="card shadow">
            <div class="card-header">
                <strong class="card-title">Pilih yang akan dijual</strong>
            </div>
            <form action="<?= base_url('backend/penjualan/addtemp') ?>" method="post">
                <div class="card-body">
                    <div class="form-group">
                        <label>Pelanggan Name</label>
                        <input name="id_pelanggan" type="hidden" class="form-control" value="<?= $id_pelanggan; ?>" readonly>
                        <input type="text" class="form-control" value="<?= $nama_pelanggan; ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label>Product</label>
                        <select class="form-control" name="id_produk" id="">
                            <?php foreach ($produk as $as) { ?>
                                <option value="<?= $as['id_produk'] ?>"><?= $as['nama'] ?> - <?= $as['kode_produk'] ?> (<?= $as['stok'] ?>)</option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Count</label>
                        <input name="jumlah" type="number" class="form-control" placeholder="Count to sell">
                    </div>
                </div>
                <div class="card-footer d-flex justify-content-end">
                    <button class="btn btn-primary" type="submit">Save as Wishlist</button>
                </div>
            </form>
        </div>
    </div>
    <div class="col-md-9">
        <div class="card shadow">
            <div class="card-header">
                <strong class="card-title">Pilih yang akan dijual</strong>
            </div>
            <table class="table datatables dataTable no-footer" id="dataTable-1" role="grid" aria-describedby="dataTable-1_info">
                <thead>
                    <tr role="row">
                        <th class="sorting" tabindex="0" aria-controls="dataTable-1" rowspan="1" colspan="1">#</th>
                        <th class="sorting" tabindex="0" aria-controls="dataTable-1" rowspan="1" colspan="1">Product Code</th>
                        <th class="sorting" tabindex="0" aria-controls="dataTable-1" rowspan="1" colspan="1">Product</th>
                        <th class="sorting" tabindex="0" aria-controls="dataTable-1" rowspan="1" colspan="1">Count</th>
                        <th class="sorting" tabindex="0" aria-controls="dataTable-1" rowspan="1" colspan="1">Price</th>
                        <th class="sorting" tabindex="0" aria-controls="dataTable-1" rowspan="1" colspan="1">Total</th>
                        <th class="sorting" tabindex="0" aria-controls="dataTable-1" rowspan="1" colspan="1">Action</th>
                    </tr>
                </thead>
                <tbody class="">
                    <?php
                    $cek = 0;
                    $total = 0;
                    $no = 1;
                    foreach ($temp as $as) { ?>
                        <tr role="row" class="odd">
                            <td><?= $no++; ?></td>
                            <td><?= $as['kode_produk'] ?></td>
                            <td><?= $as['nama'] ?></td>
                            <td><?= $as['jumlah'] ?>
                                <?php if ($as['jumlah'] > $as['stok']) {
                                    echo "<span class='badge badge-pill badge-warning'>Stok tidak mencukupi!</span>";
                                    $cek = 1;
                                } ?></td>
                            <td>Rp. <?= number_format($as['harga']) ?></td>
                            <td>Rp. <?= number_format($as['jumlah'] * $as['harga']) ?></td>
                            <td>
                                <button class="btn btn-sm dropdown-toggle more-horizontal" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <span class="text-muted sr-only">Action</span>
                                </button>
                                <div class="dropdown-menu dropdown-menu-left">
                                    <button type="button" class="btn btn-primary dropdown-item" data-toggle="modal" data-target="#deleteform<?= $as['id_temp'] ?>">Remove</button>
                                </div>
                            </td>
                        </tr>
                    <?php $total = $total + $as['jumlah'] * $as['harga'];
                    } ?>
                </tbody>
                <tbody>
                    <tr>
                        <td colspan="4"></td>
                        <td colspan="1">Total Price</td>
                        <td>Rp. <?= number_format($total) ?></td>
                        <form action="<?= base_url('backend/penjualan/bayar') ?>" method="post">
                            <input type="hidden" name="id_pelanggan" value="<?= $id_pelanggan ?>">
                            <?php if ($temp == NULL) { ?>
                                <td>
                                    <button class="btn btn-secondary disabled" type="button">Pay</button>
                                </td>

                            <?php } elseif ($cek == 1) { ?>
                                <td>
                                    <button class="btn btn-warning disabled" type="button">Pay</button>
                                </td>
                            <?php } else { ?>
                                <td>
                                    <button class="btn btn-primary" type="submit">Pay</button>
                                </td>
                            <?php } ?>
                        </form>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modal -->

<?php foreach ($temp as $as) { ?>
    <div class="modal fade" id="deleteform<?= $as['id_temp'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Delete Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?= base_url('backend/penjualan/Hapus/' . $as['id_temp'])  ?>" method="post">
                        <label>Apakah kamu yakin akan menghapus keranjang ini?</label>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php } ?>