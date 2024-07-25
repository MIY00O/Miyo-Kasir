<div class="col-md-12">
    <div class="card shadow">
        <div class="card-body">
            <!-- table -->
            <div id="dataTable-1_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                <div class="row">
                    <div class="col-sm-12">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#plusform">
                            <i class="fe fe-plus fe-16"></i> Products</button>
                        <!-- <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#plusexcel">
                            <i class="fe fe-plus fe-16"></i> Excel</button> -->
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-sm-12">
                        <table class="table datatables dataTable no-footer" id="dataTable-1" role="grid" aria-describedby="dataTable-1_info">
                            <thead>
                                <tr role="row">
                                    <th name="" class="sorting" tabindex="0" aria-controls="dataTable-1" rowspan="1" colspan="1" aria-label="#: activate to sort column ascending">#</th>
                                    <th name="" class="sorting_desc" tabindex="0" aria-controls="dataTable-1" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending" aria-sort="descending">Name</th>
                                    <th name="" class="sorting" tabindex="0" aria-controls="dataTable-1" rowspan="1" colspan="1" aria-label="Phone: activate to sort column ascending">Product Code</th>
                                    <th name="" class="sorting" tabindex="0" aria-controls="dataTable-1" rowspan="1" colspan="1" aria-label="Department: activate to sort column ascending">Stock</th>
                                    <th name="" class="sorting" tabindex="0" aria-controls="dataTable-1" rowspan="1" colspan="1" aria-label="Department: activate to sort column ascending">Price</th>
                                    <th name="" class="sorting" tabindex="0" aria-controls="dataTable-1" rowspan="1" colspan="1" aria-label="Company: activate to sort column ascending">Action</th>
                                </tr>
                            </thead>
                            <?php $no = 1;
                            foreach ($produk as $as) { ?>
                                <tbody class="">
                                    <tr role="row" class="odd">
                                        <td><?= $no++; ?></td>
                                        <td><?= $as['nama'] ?></td>
                                        <td><?= $as['kode_produk'] ?></td>
                                        <td><?= $as['stok'] ?></td>
                                        <td>Rp.<?= number_format($as['harga']) ?></td>
                                        <td><button class="btn btn-sm dropdown-toggle more-horizontal" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <span class="text-muted sr-only">Action</span>
                                            </button>
                                            <div class="dropdown-menu dropdown-menu-left">
                                                <button type="button" class="btn btn-primary dropdown-item" data-toggle="modal" data-target="#editform<?= $as['id_produk'] ?>">Edit</button>
                                                <button type="button" class="btn btn-primary dropdown-item" data-toggle="modal" data-target="#deleteform<?= $as['id_produk'] ?>">Remove</button>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            <?php } ?>
                        </table>
                         
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Modal -->

<div class="modal fade" id="plusform" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Produk</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('backend/Produk/Simpan') ?>" method="post">
                    <div class="form-group">
                        <label>Name</label>
                        <input name="nama" type="text" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Price</label>
                        <input name="harga" type="number" class="form-control">
                    </div>
                    <div class="row mb-4">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Stock</label>
                                <input name="stok" type="number" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Product Code</label>
                                <input name="kode_produk" type="text" class="form-control">
                            </div>
                        </div>

                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="plusexcel" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Import Excel</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('Backend/Produk/import') ?>" method="post">
                    <div class="form-group">
                        <label>Import from Excel</label>
                        <input type="file" class="form-control" id="file" name="file" accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel" required>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" id="btnUpload">Import</button>
            </div>
            </form>
        </div>
    </div>
</div>

<?php foreach ($produk as $as) { ?>
    <div class="modal fade" id="editform<?= $as['id_produk'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?= base_url('backend/Produk/Update') ?>" method="post">
                        <div class="form-group">
                            <label>Name</label>
                            <input name="nama" type="text" class="form-control" value="<?= $as['nama'] ?>">
                        </div>
                        <div class="form-group">
                            <label>Price</label>
                            <input name="harga" type="number" class="form-control" value="<?= $as['harga'] ?>">
                        </div>
                        <div class="row mb-4">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Stock</label>
                                    <input name="stok" type="number" class="form-control" value="<?= $as['stok'] ?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Product Code</label>
                                    <input name="kode_produk" type="text" class="form-control" value="<?= $as['kode_produk'] ?>">
                                </div>
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <input type="hidden" name="id_produk" value="<?= $as['id_produk'] ?>">
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                </div>
                </form>
            </div>
        </div>
    </div>
<?php } ?>

<?php foreach ($produk as $as) { ?>
    <div class="modal fade" id="deleteform<?= $as['id_produk'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Delete Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?= base_url('backend/Produk/Hapus/' . $as['id_produk']) ?>" method="post">
                        <label>Apakah kamu yakin akan menghapus data produk ini?</label>
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

<!-- Script -->

<script>
    $(document).ready(function() {
        $("body").on("submit", "#form-upload-user", function(e) {
            e.preventDefault();
            var data = new FormData(this);
            $.ajax({
                type: 'POST',
                url: "<?php echo base_url('user/import') ?>",
                data: data,
                dataType: 'json',
                contentType: false,
                cache: false,
                processData: false,
                beforeSend: function() {
                    $("#btnUpload").prop('disabled', true);
                    $(".user-loader").show();
                },
                success: function(result) {
                    $("#btnUpload").prop('disabled', false);
                    if ($.isEmptyObject(result.error_message)) {
                        $(".result").html(result.success_message);
                    } else {
                        $(".sub-result").html(result.error_message);
                    }
                    $(".user-loader").hide();
                }
            });
        });
    });
</script>x