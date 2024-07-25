<button style="display: none;" class="flash-data-error" value="<?= $this->session->flashdata('flash-error'); ?>"></button>
<button style="display: none;" class="flash-data-success" value="<?= $this->session->flashdata('flash-success'); ?>"></button>
<div class="col-md-12">
    <div class="card shadow">
        <div class="card-body">
            <!-- table -->
            <div id="dataTable-1_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                <div class="row">
                    <div class="col-sm-12">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#plusform">
                            <i class="fe fe-plus fe-16"></i> Customers</button>
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
                                    <th name="" class="sorting" tabindex="0" aria-controls="dataTable-1" rowspan="1" colspan="1" aria-label="Phone: activate to sort column ascending">Address</th>
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
                                        <td><?= $as['alamat'] ?></td>
                                        <td><?= $as['telp'] ?></td>
                                        <td><button class="btn btn-sm dropdown-toggle more-horizontal" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <span class="text-muted sr-only">Action</span>
                                            </button>
                                            <div class="dropdown-menu dropdown-menu-left">
                                                <button type="button" class="btn btn-primary dropdown-item" data-toggle="modal" data-target="#editform<?= $as['id_pelanggan'] ?>">Edit</button>
                                                <button type="button" class="btn btn-primary dropdown-item" data-toggle="modal" data-target="#deleteform<?= $as['id_pelanggan'] ?>">Remove</button>
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
                <h5 class="modal-title" id="exampleModalLabel">Tambah Pelanggan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('backend/Pelanggan/Simpan') ?>" method="post">
                    <div class="row mb-4">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Name</label>
                                <input name="nama" type="text" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Telp</label>
                                <input name="telp" type="number" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Address</label>
                        <textarea name="alamat" class="form-control" id="" cols="30" rows="3"></textarea>
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

<?php foreach ($pelanggan as $as) { ?>
    <div class="modal fade" id="editform<?= $as['id_pelanggan'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?= base_url('backend/Pelanggan/Update') ?>" method="post">
                        <div class="row mb-4">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Name</label>
                                    <input name="nama" type="text" class="form-control" value="<?= $as['nama'] ?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Telp</label>
                                    <input name="telp" type="number" class="form-control" value="<?= $as['telp'] ?>">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Address</label>
                            <textarea name="alamat" class="form-control" id="" cols="30" rows="3"><?= $as['alamat'] ?></textarea>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <input type="hidden" name="id_pelanggan" value="<?= $as['id_pelanggan'] ?>">
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                </div>
                </form>
            </div>
        </div>
    </div>
<?php } ?>

<?php foreach ($pelanggan as $as) { ?>
    <div class="modal fade" id="deleteform<?= $as['id_pelanggan'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Delete Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?= base_url('backend/Pelanggan/Hapus/' . $as['id_pelanggan']) ?>" method="post">
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