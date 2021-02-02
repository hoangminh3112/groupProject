<?php
session_start();
include_once 'database.php';
include_once 'inc/Auth.php';

if (!Auth::check()) {
    return header('location: login.php');
}
include 'inc/header.php';
try {
    $sql = 'SELECT * FROM custumers ORDER BY ID DESC';
    $custumerQuery = $conn->query($sql);
    $custumerQuery->setFetchMode(PDO::FETCH_OBJ);
    $custumers = $custumerQuery->fetchAll();
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>
    <div class="container">
        <div class="row">
            <a href="insert_one.php" class="btn btn-success">Add custumer</a>
        </div>
        <div class="row">
            <div class="col-md-12">


                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>id</th> 
                            <th>Custumers</th>
                            <th>Gender</th>
                            <th>Date of birth(YYYY-MM-DD)</th>
                            <th>Contact</th>
                            <th>Status</th>
                            <th>Payment Status</th>
                            <th>Address</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($custumers as $custumer): ?>
                            <tr>
                                <td><?= $custumer->id ?></td>
                                <td><?= $custumer->custumer_names ?></td>
                                <td><?= $custumer->gender ?></td>
                                <td><?= $custumer->date_of_birth ?></td>
                                <td><?= $custumer->contact ?></td>
                                <td><?= $custumer->status ?></td>
                                <td><?= $custumer->payment_status ?></td>
                                <td><?= $custumer->address ?></td>

                                <td>
                                    <a href="delete.php?id=<?= $custumer->id ?>" class="btn btn-danger btn-delete">Delete</a>
                                    <a href="edit.php?id=<?= $custumer->id ?>" class="btn btn-warning">Edit</a>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
<?php
include 'inc/footer.php';
