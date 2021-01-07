<div class="row align-items-center">
    <div class="mx-auto  col-12 mb-2">
        <div class="card rounded shadow" style="zoom:85%">
            <h5 class="text-dark ml-2 text-center mt-1 pt-1">Data Pesanan</h5>
            <table width="100%" class="text-wrap mb-0 tb table table-borderless table-striped table-hover ">
                <thead class="">
                    <tr>
                        <th class="w-1">#</th>
                        <th class="w-1">ID Pesanan</th>
                        <th class="w-1">Paket</th>
                        <th class="w-1">Jumlah</th>
                        <th class="w-1">Sudah Bayar</th>
                        <th class="w-1">Sisa</th>
                        <th class="w-1">Status Pesanan</th>
                        <th data-priority="1"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($data['pemesanan'] as $v => $k): ?>
                    <tr>
                        <td>
                            <?php echo $v + 1; ?>
                        </td>
                        <td>
                            <?php echo $k->idpemesanan; ?>
                            <div class="text-muted">Tanggal Pesan:
                                <?php echo $k->tgl_pesan; ?>
                            </div>
                             <div class="text-muted">
                                  <strong>Tanggal Acara:
                              <?php echo $k->tgl_acara; ?></strong>
                            </div>
                             <div class="">
                                  <strong>Oleh:
                              <?php echo $k->nama; ?> <span class="text-muted">[<?php echo $k->iduser; ?>]</span></strong>
                            </div>

                        </td>

                        <td>
                            <?php echo $k->nama_paket; ?> <strong>[Rp.
                                <?php echo number_format($k->harga); ?>]</strong>
                            <ul>
                                <?php foreach ($k->tambahan as $k2): ?>
                                <li>
                                    <?php echo $k2->nama_pt; ?> [
                                    <?php echo $k2->qty; ?>] - <strong>Rp.
                                        <?php echo number_format($k2->jum); ?></strong></li>
                                <?php endforeach;?>
                            </ul>
                        </td>
                        <td>
                            Rp.<?php echo number_format($k->total); ?>
                        </td>
                        <td>
                            Rp.<?php echo number_format($k->totalbayar); ?>
                        </td>
                         <td>
                            <?php if ($k->sisa < 0): ?>
                            Rp.<?php echo number_format(0); ?>

                                <?php else: ?>
                            Rp.<?php echo number_format($k->sisa); ?>

                            <?php endif;?>

                        </td>
                        <td><?php echo $k->status; ?></td>
                        <td class="text-right ">
                            <a href="?hal=KPesanan&key=<?php echo $k->idpemesanan; ?>" class="btn btn-warning btn-sm">kelola Pesanan</a>
                        </td>
                    </tr>
                    <?php endforeach;?>
                </tbody>
                <tfoot>
                    <tr>
                        <th colspan="3">Grand Total</th>
                        <th colspan="">Rp.<?php echo number_format($data['pemesanan']->sum('total')); ?></th>
                        <th colspan="">Rp.<?php echo number_format($data['pemesanan']->sum('totalbayar')); ?></th>
                        <?php if ($data['pemesanan']->sum('sisa') < 0): ?>
                        <th colspan="">Rp.<?php echo number_format(0); ?></th>

                            <?php else: ?>
                        <th colspan="">Rp.<?php echo number_format($data['pemesanan']->sum('sisa')); ?></th>

                        <?php endif;?>
                        <th colspan="">
                            <?php foreach ($data['pemesanan']->groupBy('status') as $k => $v): ?>

                            <div ><?php echo $k; ?> : <?php echo $v->count(); ?></div>
                            <?php endforeach;?>

                        </th>
                        <th></th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>