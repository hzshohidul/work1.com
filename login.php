<?php
    SESSION_START();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Login</title>
    <style>
        .pass_field{
            position: relative;
        }
        .pass_field i {
            position: absolute;
            top: 47%;
            right: 0px;
            cursor: pointer;
            background: teal;
            color: #fff;
            padding: 10px;
            border-radius: 0px 4px 4px 26px;
        }
    </style>
</head>
<body style="background-color:#130f40">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6 m-auto">
                <div class="card mt-5">
                    <div class="card-header bg-primary">
                        <h3>Login Form</h3>
                    </div>
                    <strong class="text-danger px-3">
                        <?php
                            if(isset($_SESSION['email_not_found'])){
                                echo $_SESSION['email_not_found'];
                            }else if(isset($_SESSION['pass_not_matching'])){
                                echo $_SESSION['pass_not_matching'];
                            }else if(isset($_SESSION['field_blank'])){
                                echo $_SESSION['field_blank'];
                            }
                        ?>
                    </strong>
                    <div class="card-body">
                        <form action="login_post.php" method="POST">
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="text" name="email" id="email" class="form-control" value="<?= (isset($_SESSION['email'])) ? $_SESSION['email'] : '' ?>" <?= (isset($_SESSION['email'])) ? 'readonly' : '' ?> >
                            </div>
                            <div class="mb-3 pass_field">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" name="password" class="form-control" id="password" >
                                <i class="fa fa-eye" onclick="showpass()" ></i>
                            </div>
                            
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary">Login</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="assets/js/sweetalert2v11.7.0.js"></script>
<?php
    if(isset($_SESSION['register_success'])){
?>
    <script>
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
            })

            Toast.fire({
            icon: 'success',
            title: '<?= $_SESSION['register_success']; ?>',
        })
    </script>
<?php
    }
?>
    <script>
        function showpass(){
            var inputta = document.getElementById('password');
            if(inputta.type === 'password'){
                inputta.type = 'text';
            }else{
                inputta.type = 'password';
            }
        }
    </script>
</body>
</html>
<?php
    unset($_SESSION['email']);
    unset($_SESSION['register_success']);
    unset($_SESSION['email_not_found']);
    unset($_SESSION['pass_not_matching']);
    unset($_SESSION['field_blank']);
?>