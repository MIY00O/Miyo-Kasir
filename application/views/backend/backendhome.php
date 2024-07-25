<div class="row">
    <div class="col-md-8 mt-4">
        <div class="row">
            <div class="col-md-6">
                <div class="card shadow">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col">
                                <?php if ($this->session->userdata('username') == NULL) { ?>
                                    <h5 class="mb-0"><span class="text-muted">Rp. XXXXX</span></h5>
                                <?php } else { ?>
                                    <h5 class="mb-0"><span class="text-muted">Rp. <?= number_format($hari_ini) ?></span></h5>
                                <?php } ?>
                                <strong class="card-title">Today Sales</strong>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card shadow">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col">
                                <?php if ($this->session->userdata('username') == NULL) { ?>
                                    <h5 class="mb-0"><span class="text-muted">Rp. XXXXX</span></h5>
                                <?php } else { ?>
                                    <h5 class="mb-0"><span class="text-muted">Rp. <?= number_format($bulan_ini) ?></span></h5>
                                <?php } ?>
                                <strong class="card-title">Monthly Sales</strong>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 mt-4">
                <div class="card shadow">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-10">
                                <?php if ($this->session->userdata('username') == NULL) { ?>
                                    <h5 class="mb-0"><span class="text-muted">Rp. XXXXX</span></h5>
                                <?php } else { ?>
                                    <h5 class="mb-0"><span class="text-muted"><?= number_format($transaksi_hari_ini) ?></span></h5>
                                <?php } ?>
                                <strong class="card-title">Today Transactions</strong>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 mt-4">
                <div class="card shadow">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-10">
                                <?php if ($this->session->userdata('username') == NULL) { ?>
                                    <h5 class="mb-0"><span class="text-muted">XXXXX</span></h5>
                                <?php } else { ?>
                                    <h5 class="mb-0"><span class="text-muted"><?= number_format($produk) ?></span></h5>
                                <?php } ?>
                                <strong class="card-title">Products</strong>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card shadow mt-4">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col-12 d-flex justify-content-center ">
                        <?php
                        $bulan = array();
                        $nama = array();
                        $totals = array();
                        $colors = array();

                        for ($i = 0; $i < 6; $i++) {
                            $bulan[$i] = date('Y-m', strtotime("-$i Months"));
                            $nama[$i] = date('M', strtotime("-$i Months"));

                            $this->db->select('sum(total_harga) as total');
                            $this->db->from('penjualan')->where("DATE_FORMAT(tanggal,'%Y-%m')", $bulan[$i]);
                            $total = $this->db->get()->row()->total;
                            $total = ($total == NULL) ? 0 : $total;
                            $totals[] = $total;

                            if ($i > 0) {
                                if ($totals[$i] > $totals[$i - 1]) {
                                    $colors[] = 'blue';
                                } elseif ($totals[$i] < $totals[$i - 1]) {
                                    $colors[] = 'red';
                                } else {
                                    $colors[] = 'grey';
                                }
                            } else {
                                $colors[] = 'grey';
                            }
                        }
                        ?>
                        <canvas id="myChart" style="width:100%;max-width:600px"></canvas>
                        <script>
                            const xValues = ["<?= implode('", "', array_reverse($nama)) ?>"];
                            <?php if ($this->session->userdata('username') == NULL) { ?>
                                const yValues = [0, 0, 0, 0, 0, 0];
                            <?php } else { ?>
                                const yValues = [<?= implode(', ', array_reverse($totals)) ?>];
                            <?php } ?>
                            const barColors = ["<?= implode('", "', array_reverse($colors)) ?>"];

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
                                        text: "Last 5 months sales"
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
                    <h5>5 Best Seller Products</h5>
                    <?php foreach ($produk_terlaris as $as) { ?>
                        <div class="card shadow mt-4">
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col-10">
                                        <?php if ($this->session->userdata('username') == NULL) { ?>
                                            <h6 class="mb-0"><span class="text-muted">Terjual sebanyak XXXXX</span></h6>
                                            <strong class="card-title">XXXXX</strong>
                                        <?php } else { ?>
                                            <h6 class="mb-0"><span class="text-muted">Terjual sebanyak <?= $as['total_terjual'] ?></span></h6>
                                            <strong class="card-title"><?= $as['nama'] ?></strong>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>