
<div class="col-md-12">
    <div class="card shadow">
        <div class="card-body">
            <!-- table -->
            <div id="dataTable-1_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                <div class="row">
                    <div class="col-sm-12">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#plusform">
                            <i class="fe fe-plus fe-16"></i> Users</button>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-sm-12">
                        <table class="table datatables dataTable no-footer" id="dataTable-1" role="grid" aria-describedby="dataTable-1_info">
                            <thead>
                                <tr role="row">
                                    <th name="" class="sorting" tabindex="0" aria-controls="dataTable-1" rowspan="1" colspan="1" aria-label="#: activate to sort column ascending" style="width: 7.7875px;">#</th>
                                    <th name="" class="sorting_desc" tabindex="0" aria-controls="dataTable-1" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending" style="width: 88.2375px;" aria-sort="descending">Name</th>
                                    <th name="" class="sorting" tabindex="0" aria-controls="dataTable-1" rowspan="1" colspan="1" aria-label="Phone: activate to sort column ascending" style="width: 61.3875px;">Username</th>
                                    <th name="" class="sorting" tabindex="0" aria-controls="dataTable-1" rowspan="1" colspan="1" aria-label="Department: activate to sort column ascending" style="width: 119.4px;">Level</th>
                                    <th name="" class="sorting" tabindex="0" aria-controls="dataTable-1" rowspan="1" colspan="1" aria-label="Company: activate to sort column ascending" style="width: 68.5875px;">Action</th>
                                </tr>
                            </thead>
                            <?php $no = 1;
                            foreach ($user as $as) { ?>
                                <tbody class="">
                                    <tr role="row" class="odd">
                                        <td><?= $no++; ?></td>
                                        <td><?= $as['nama'] ?></td>
                                        <td><?= $as['username'] ?></td>
                                        <td><?= $as['level'] ?></td>
                                        <td><button class="btn btn-sm dropdown-toggle more-horizontal" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <span class="text-muted sr-only">Action</span>
                                            </button>
                                            <div class="dropdown-menu dropdown-menu-left">
                                                <button type="button" class="btn btn-primary dropdown-item" data-toggle="modal" data-target="#editform<?= $as['id_user'] ?>">Edit</button>
                                                <button type="button" class="btn btn-primary dropdown-item" data-toggle="modal" data-target="#deleteform<?= $as['id_user'] ?>">Remove</button>
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
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('backend/Pengguna/Simpan') ?>" method="post">
                    <div class="form-group">
                        <label for="inputEmail4">Name</label>
                        <input name="nama" type="text" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="firstname">Username</label>
                        <input name="username" type="text" class="form-control">
                    </div>
                    <hr class="my-4">
                    <div class="row mb-4">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="inputPassword5">Password</label>
                                <input name="password" type="password" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="inputPassword6">Level</label>
                                <select name="level" class="form-control">
                                    <option value="Admin">Admin</option>
                                    <option value="Kasir">Kasir</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <p class="mb-2">Password requirements</p>
                            <p class="small text-muted mb-2">Untuk membuat password, anda perlu melihat beberapa aturan ini:</p>
                            <ul class="small text-muted pl-4 mb-0">
                                <li> Minimum 8 karakter </li>
                                <li> Maximum 15 karakter </li>
                            </ul>
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

<?php foreach ($user as $as) { ?>
    <div class="modal fade" id="editform<?= $as['id_user'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?= base_url('backend/Pengguna/Update') ?>" method="post">
                        <div class="form-group">
                            <label for="inputEmail4">Name</label>
                            <input value="<?= $as['nama'] ?>" name="nama" type="text" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="firstname">Username</label>
                            <input value="<?= $as['username'] ?>" name="username" type="text" class="form-control" readonly>
                        </div>
                        <div class="form-group">
                            <label for="inputPassword6">Level</label>
                            <select name="level" class="form-control">
                                <option value="Admin" <?php if ($as['level'] == 'Admin') {
                                                            echo "selected";
                                                        } ?>>Admin</option>
                                <option value="Kasir" <?php if ($as['level'] == 'Kasir') {
                                                            echo "selected";
                                                        } ?>>Kasir</option>
                            </select>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <input type="hidden" name="id_user" value="<?= $as['id_user'] ?>">
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                </div>
                </form>
            </div>
        </div>
    </div>
<?php } ?>

<?php foreach ($user as $as) { ?>
    <div class="modal fade" id="deleteform<?= $as['id_user'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Delete Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?= base_url('backend/Pengguna/Hapus/' . $as['id_user']) ?>" method="post">
                        <label>Apakah kamu yakin akan menghapus data user ini?</label>
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