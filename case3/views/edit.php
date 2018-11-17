<?php include 'components/header.php' ?>
    <p><a href="/">&larr; Kembali</a></p>
    <form action="/" method="POST">
        <div class="form-group">
            <label for="">Max</label>
            <input type="text" name="_max" class="form-control" value="<?php echo $berat->_max ?>">
        </div>
        <div class="form-group">
            <label for="">Min</label>
            <input type="text" name="_min" class="form-control" value="<?php echo $berat->_min ?>">
        </div>
        <div class="form-group">
            <input type="hidden" name="id" value="<?php echo $berat->id ?>">
            <input type="submit" name="update" class="btn btn-success" value="Update">
        </div>
    </form>
<?php include 'components/footer.php' ?>