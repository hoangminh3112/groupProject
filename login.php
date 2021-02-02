<?php
    session_start();
    include './inc/PostRequest.php';
    include './database.php';

    if (isset($_POST['username'])) {
        $username = PostRequest::get('username');
        $password = PostRequest::get('password');
        $sql = "SELECT * FROM users WHERE username = '{$username}' and password = '{$password}' LIMIT 1";
        $result = $conn->query($sql);
        $result->setFetchMode(PDO::FETCH_OBJ);
        $user = $result->fetch();
        if (!$user) {
            $loginFail = true;
        } else {
            $_SESSION['user'] = $user;
            return header('location: index.php');
        }

    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Latest compiled and minified CSS & JS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

</head>
<body>

    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <form action="" method="POST" role="form">
                    <?php if (isset($loginFail) && $loginFail): ?>
                        <div class="alert alert-danger">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <strong>Lỗi</strong> Tài khoản hoặc mật khẩu không chính xác
                        </div>
                    <?php endif ?>
                    <legend>Login</legend>
                    <div class="form-group">
                        <label for="">Username</label>
                        <input type="text" name="username" class="form-control" id="">
                    </div>

                    <div class="form-group">
                        <label for="">Password</label>
                        <input type="password" name="password" class="form-control" id="">
                    </div>

                    <button type="submit" class="btn btn-primary">Login</button>
                </form>
            </div>
        </div>
    </div>



    <script src="//code.jquery.com/jquery.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
</body>
</html>
