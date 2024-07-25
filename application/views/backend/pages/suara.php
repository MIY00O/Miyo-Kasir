<button style="display: none;" class="flash-data" value="<?= $this->session->flashdata('flash'); ?>"></button>
<div class="row">
    <div class="col-md-4">
        <div class="card shadow">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col">
                        <h5 class="mb-0"><span class="text-muted"><?= number_format($suaraNo1) ?></span></h5>
                        <strong class="card-title">Pemilih No 01</strong>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card shadow">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col">
                        <h5 class="mb-0"><span class="text-muted"><?= number_format($suaraNo2) ?></span></h5>
                        <strong class="card-title">Pemilih No 02</strong>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card shadow">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col">
                        <h5 class="mb-0"><span class="text-muted"><?= number_format($suaraNo3) ?></span></h5>
                        <strong class="card-title">Pemilih No 03</strong>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-8 mt-4">
        <div class="card shadow">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col-12 d-flex justify-content-center ">
                        <?php
                        $pemilih01 = "No 01";
                        $pemilih02 = "No 02";
                        $pemilih03 = "No 03";
                        ?>
                        <canvas id="myChart" style="width:100%;max-width:600px"></canvas>
                        <script>
                            const xValues = ["<?= $pemilih01 ?>", "<?= $pemilih02 ?>", "<?= $pemilih03 ?>"];
                            const yValues = [<?= $suaraNo1 ?>, <?= $suaraNo2 ?>, <?= $suaraNo3 ?>];
                            const barColors = ["blue", "blue", "blue"];

                            new Chart("myChart", {
                                type: "bar",
                                data: {
                                    labels: xValues,
                                    datasets: [{
                                        backgroundColor: barColors,
                                        data: yValues
                                    }]
                                },
                                options: {
                                    legend: {
                                        display: false
                                    },
                                    title: {
                                        display: true,
                                        text: "Curva Pemilihan"
                                    }
                                }
                            });
                        </script>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="grid col-md-4 mt-4">
        <div class="card shadow">
            <div class="card-body">
                <div class="g-col-6">
                    <div class="card shadow">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-10">
                                    <h5 class="mb-0"><span class="text-muted"><?= number_format($totalSuara) ?></span></h5>
                                    <strong class="card-title">Total Suara Masuk</strong>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="g-col-6 mt-4">
                    <div class="card shadow">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-10">
                                    <h5 class="mb-0"><span class="text-muted"><?= number_format($totalSuaraSah) ?></span></h5>
                                    <strong class="card-title">Total Suara Sah</strong>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="g-col-6 mt-4">
                    <div class="card shadow">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-10">
                                    <h5 class="mb-0"><span class="text-muted"><?= number_format($totalSuaraTidakSah) ?></span></h5>
                                    <strong class="card-title">Total Suara Tidak Sah</strong>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-12 mt-4">
        <div class="card shadow">
            <div class="card-body">
                <!-- table -->
                <div id="dataTable-1_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                    <div class="row">
                        <div class="col-sm-12">
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#plusform">
                                <i class="fe fe-plus fe-16"></i> Suara</button>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-sm-12">
                            <table class="table datatables dataTable no-footer" id="dataTable-1" role="grid" aria-describedby="dataTable-1_info">
                                <thead>
                                    <tr role="row">
                                        <th name="" class="sorting" tabindex="0" aria-controls="dataTable-1" rowspan="1" colspan="1" aria-label="#: activate to sort column ascending">#</th>
                                        <th name="" class="sorting" tabindex="0" aria-controls="dataTable-1" rowspan="1" colspan="1" aria-label="#: activate to sort column ascending">Nama TPS</th>
                                        <th name="" class="sorting" tabindex="0" aria-controls="dataTable-1" rowspan="1" colspan="1" aria-label="#: activate to sort column ascending">Total Suara</th>
                                        <th name="" class="sorting" tabindex="0" aria-controls="dataTable-1" rowspan="1" colspan="1" aria-label="#: activate to sort column ascending">Total Suara Sah</th>
                                        <th name="" class="sorting" tabindex="0" aria-controls="dataTable-1" rowspan="1" colspan="1" aria-label="#: activate to sort column ascending">Total Suara Tidak Sah</th>
                                        <th name="" class="sorting" tabindex="0" aria-controls="dataTable-1" rowspan="1" colspan="1" aria-label="#: activate to sort column ascending">Pemilih no 1</th>
                                        <th name="" class="sorting" tabindex="0" aria-controls="dataTable-1" rowspan="1" colspan="1" aria-label="#: activate to sort column ascending">Pemilih no 2</th>
                                        <th name="" class="sorting" tabindex="0" aria-controls="dataTable-1" rowspan="1" colspan="1" aria-label="#: activate to sort column ascending">Pemilih no 3</th>
                                    </tr>
                                </thead>
                                <?php $no = 1;
                                foreach ($suara as $as) { ?>
                                    <tbody class="">
                                        <tr role="row" class="odd">
                                            <td><?= $no++ ?></td>
                                            <td><?= $as['nama_tps_10'] ?></td>
                                            <td><?= $as['total_suara_10'] ?></td>
                                            <td><?= $as['total_suara_sah_10'] ?></td>
                                            <td><?= $as['total_suara_tidak_sah_10'] ?></td>
                                            <td><?= $as['suara_no1_10'] ?></td>
                                            <td><?= $as['suara_no2_10'] ?></td>
                                            <td><?= $as['suara_no3_10'] ?></td>
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
</div>

<!-- Modal -->
<div class="modal fade" id="plusform" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Surat Suara TPS</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('Backend/Suara/Simpan') ?>" method="post">
                    <div class="form-group">
                        <label for="inputEmail4">Nama Tps</label>
                        <input name="nama_tps_10" type="text" class="form-control">
                    </div>
                    <hr class="my-4">
                    <div class="row mb-4">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="inputPassword5">Total Suara</label>
                                <input name="total_suara_10" type="number" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="inputPassword5">Total Suara Sah</label>
                                <input name="total_suara_sah_10" type="number" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="inputPassword5">Total Suara Tidak Sah</label>
                                <input name="total_suara_tidak_sah_10" type="number" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="inputPassword5">Pemilih no 01</label>
                                <input name="suara_no1_10" type="number" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="inputPassword5">Pemilih no 02</label>
                                <input name="suara_no2_10" type="number" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="inputPassword5">Pemilih no 03</label>
                                <input name="suara_no3_10" type="number" class="form-control">
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