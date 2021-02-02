<?php
session_start();
    if (isset($_POST['custumer_names'])) {
        include 'database.php';
        $custumer_names = $_POST['custumer_names'];
        $gender = $_POST['gender'];
        $date_of_birth = $_POST['date_of_birth'];
        $contact = $_POST['contact'];
        $status = $_POST['status'];
        $payment_status = $_POST['payment_status'];
        $address = $_POST['address'];

        $sql = 'INSERT INTO custumers(custumer_names, gender, date_of_birth, contact, status, payment_status, address) VALUES (:custumer_names, :gender, :date_of_birth, :contact, :status, :payment_status, :address)';

        try {
            $statment = $conn->prepare($sql);
            $statment->bindParam(':custumer_names', $custumer_names);
            $statment->bindParam(':gender', $gender);
            $statment->bindParam(':date_of_birth', $date_of_birth);
            $statment->bindParam(':contact', $contact);
            $statment->bindParam(':status', $status);
            $statment->bindParam(':payment_status', $payment_status);
            $statment->bindParam(':address', $address);

            $statment->execute();
            header('location: index.php');
        } catch (Exception $e) {
            echo "Đã có lỗi xảy ra";
        }
    }

    include_once 'inc/header.php';
?>

    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <form action="" method="POST" role="form">
                    <div class="form-group">
                        <label for="">Custumer Names</label>
                        <input type="text" name="custumer_names" class="form-control" id="" placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="">Contact</label>
                        <input type="text" name="contact" class="form-control" id="" placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="">Date of birth(YYYY-MM-DD)</label>
                        <input type="text" name="date_of_birth" class="form-control" id="" placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="">Status</label>
                        <input type="text" name="status" class="form-control" id="" placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="">Payment Status</label>
                        <input type="text" name="payment_status" class="form-control" id="" placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="">Address</label>
                        <input type="text" name="address" class="form-control" id="" placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="">Gender</label>
                        <div class="radio">
                            <label>
                                <input type="radio" name="gender" id="input" value="1" checked="checked">
                                Nam
                            </label>
                        </div>
                        <div class="radio">
                            <label>
                                <input type="radio" name="gender" id="input" value="2" >
                                Nữ
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
