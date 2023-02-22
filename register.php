<?php SESSION_START(); ?>
<?php 
    if(isset($_SESSION['login_hoyegese'])){
        header('location:login.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Register</title>
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
                        <h3>Register Form</h3>
                    </div>
                    <div class="card-body">
                        <form action="register_post.php" method="POST" enctype="multipart/form-data" >
                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" name="name" class="form-control" id="name" value="<?= (isset($_SESSION['name_value'])) ? $_SESSION['name_value'] : ''; ?>">

                                <strong class="text-danger">
                                <?php
                                    if(isset($_SESSION['name_err'])){
                                        echo $_SESSION['name_err'];
                                    }
                                ?>
                                </strong>
                                
                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="text" name="email" class="form-control" id="email" value="<?= (isset($_SESSION['email_value'])) ? $_SESSION['email_value'] : ''; ?>">

                                <strong class="text-danger">
                                    <?php
                                        if(isset($_SESSION['email_err'])){
                                            echo $_SESSION['email_err'];
                                        }else if(isset($_SESSION['email_valid'])){
                                            echo $_SESSION['email_valid'];
                                        }else if(isset($_SESSION['email_exists'])){
                                            echo $_SESSION['email_exists'];
                                        }
                                    ?>
                                </strong>
                            </div>

                            <div class="mb-3 pass_field">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" name="password" class="form-control" id="password">
                                <i class="fa fa-eye" onclick="showpass()" ></i>

                                <strong class="text-danger">
                                    <?php
                                        if(isset($_SESSION['pass_err'])){
                                            echo $_SESSION['pass_err'];
                                        }else if(isset($_SESSION['password_small'])){
                                            echo $_SESSION['password_small'];
                                        }else if(isset($_SESSION['upper'])){
                                            echo $_SESSION['upper'];
                                        }else if(isset($_SESSION['lower'])){
                                            echo $_SESSION['lower'];
                                        }else if(isset($_SESSION['special'])){
                                            echo $_SESSION['special'];
                                        }
                                    ?>
                                </strong>
                            </div>
                            
                            <div class="mb-3 pass_field">
                                <label for="confirm_password" class="form-label">Confirm Password</label>
                                <input type="password" name="confirm_password" class="form-control" id="confirm_password">
                                <i class="fa fa-eye" onclick="showpassconfirm()" ></i>
                                <strong class="text-danger">
                                    <?php
                                        if(isset($_SESSION['con_pass_err'])){
                                            echo $_SESSION['con_pass_err'];
                                        }else if(isset($_SESSION['password_not_match'])){
                                            echo $_SESSION['password_not_match'];
                                        }
                                    ?>
                                </strong>
                            </div>

                            <div class="mb-3">
                                <label for="image" class="form-label">Your Image</label>
                                <input type="file" name="image" class="form-control" id="image" onchange="document.getElementById('jaga').src = window.URL.createObjectURL(this.files[0])" >

                                <div class="my-3">
                                    <img src="" id="jaga" alt="" height="100" width="auto" >
                                </div>

                                <strong class="text-danger">
                                    <?php
                                        if(isset($_SESSION['image_err'])){
                                            echo $_SESSION['image_err'];
                                        }else if(isset($_SESSION['image_formet'])){
                                            echo $_SESSION['image_formet'];
                                        }else if(isset($_SESSION['image_size'])){
                                            echo $_SESSION['image_size'];
                                        }
                                    ?>
                                </strong>
                            </div>

                            <div class="text-center">
                                <button type="submit" class="btn btn-primary">Register</button>
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
        function showpassconfirm(){
            var inputta = document.getElementById('confirm_password');

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
    unset($_SESSION['name_err']);
    unset($_SESSION['name_value']);
    unset($_SESSION['email_err']);
    unset($_SESSION['email_value']);
    unset($_SESSION['email_valid']);
    unset($_SESSION['pass_err']);
    unset($_SESSION['con_pass_err']);
    unset($_SESSION['password_not_match']);
    unset($_SESSION['password_small']);
    unset($_SESSION['upper']);
    unset($_SESSION['lower']);
    unset($_SESSION['special']);
    unset($_SESSION['image_err']);
    unset($_SESSION['image_formet']);
    unset($_SESSION['image_size']);
    unset($_SESSION['register_success']);
    unset($_SESSION['email_exists']);
    unset($_SESSION['login_hoyegese']);
?>