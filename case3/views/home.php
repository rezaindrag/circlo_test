<?php include 'components/header.php' ?>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Tanggal</th>
                <th>Max</th>
                <th>Min</th>
                <th>Perbedaan</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 0; $max_rate = 0; $min_rate = 0; $range_rate = 0; ?>
            <?php if ($beratList): foreach ($beratList as $berat): ?>
                <tr>
                    <td><a href="?detail&id=<?php echo $berat->id ?>"><?php echo $berat->tanggal ?></a></td>
                    <td><?php echo $berat->_max ?></td>
                    <td><?php echo $berat->_min ?></td>
                    <td><?php echo $range = ($berat->_max - $berat->_min) ?></td>
                    <td>
                        <a href="?edit&id=<?php echo $berat->id ?>">Edit</a>&nbsp;
                        <a href="?delete&id=<?php echo $berat->id ?>" onclick="return confirm('Are you sure?')">Hapus</a>
                    </td>
                </tr>
                <?php $max_rate += $berat->_max; $min_rate += $berat->_min; $i++; $range_rate += $range; ?> 
                <?php endforeach ?>
                <tr>
                    <td><strong>Rata-rata</strong></th>
                    <td><strong><?php echo round($max_rate/$i) ?></strong></th>
                    <td><strong><?php echo round($min_rate/$i) ?></strong></th>
                    <td><strong><?php echo round($range_rate/$i) ?></strong></th>
                    <td></td>
                </tr>
            <?php else: ?>
                <tr>
                    <td colspan="5">Data Kosong</td>
                </tr>
            <?php endif ?>
        </tbody>
    </table>
    <a href="?create">+ Tambah</a>
<?php include 'components/footer.php' ?>