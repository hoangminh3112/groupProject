<?php
session_start();
include_once 'inc/header.php';
include_once 'inc/GetRequest.php';
include_once 'database.php';

$id = GetRequest::get('id');
$sql = 'SELECT * FROM custumers where id =  '. $id;
$query = $conn->query($sql);
$query->setFetchMode(PDO::FETCH_OBJ);
$custumer = $query->fetch();

if (!$custumer) {
    die('custumer is not in our system');
}

?>

<div class="container">
    <div class="row">
        <div class="col-md-6">
            <form action="store.php" method="POST" role="form">
                <input type="hidden" name="id" value="<?= $id ?>">
                <div class="form-group">
                    <label for="">Custumer Name</label>
                    <input type="text" name="custumer_names" class="form-control" value="<?= $custumer ->custumer_names ?>" id="" placeholder="">
                </div>

                <div class="form-group">
                    <label for="">Custumer Contact</label>
                    <input type="text" name="contact" class="form-control" value="<?= $custumer->contact ?>" id="" placeholder="">
                </div>
                <div class="form-group">
                    <label for="">Address</label>
                    <input type="text" name="address" value="<?= $custumer->address ?>" class="form-control" id="" placeholder="">
                </div>
                <div class="form-group">
                    <label for="">Gender</label>
                    <div class="radio">
                        <label>
                            <input type="radio" name="gender" id="input" value="1"
                                <?= $custumer->gender == 1 ? 'checked' : '' ?>
                            >
                            Male
                        </label>
                    </div>
                    <div class="radio">
                        <label>
                            <input type="radio" name="gender" id="input" value="2"
                                <?= $custumer->gender == 2 ? 'checked' : '' ?>
                            >
                            Female
                        </label>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Save</button>
            </form>
        </div>
    </div>
</div>

<?php
include_once 'inc/footer.php';
?>
