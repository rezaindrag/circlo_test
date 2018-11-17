<?php include 'components/header.php' ?>
    <p><a href="/">&larr; Kembali</a></p>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Tanggal</th>
                <th><?php echo $berat->tanggal ?></th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Max</td>
                <td><?php echo $berat->_max ?></td>
            </tr>
            <tr>
                <td>Min</td>
                <td><?php echo $berat->_min ?></td>
            </tr>
            <tr>
                <td>Perbedaan</td>
                <td><?php echo ($berat->_max - $berat->_min)?></td>
            </tr>
        </tbody>
    </table>
<?php include 'components/footer.php' ?>