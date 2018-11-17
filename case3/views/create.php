<?php include 'components/header.php' ?>
    <p><a href="/">&larr; Kembali</a></p>
    <form action="/" method="POST">
        <div class="form-group">
            <label for="">Max</label>
            <input type="text" name="_max" class="form-control">
        </div>
        <div class="form-group">
            <label for="">Min</label>
            <input type="text" name="_min" class="form-control">
        </div>
        <div class="form-group">
            <input type="submit" name="store" class="btn btn-success" value="Tambahkan">
        </div>
    </form>
<?php include 'components/footer.php' ?>