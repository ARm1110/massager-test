<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

</head>
<style>
    body {
        background-color: #000
    }
</style>

<body>
    <!-- submit=error start -->
    <?php
    $massaged = null;
    $massagedText = null;

    if (isset($_GET['submit']) && $_GET['submit'] == 'error') {
        $massaged = "error";
        $massagedText = "This username already exists!";
    } elseif (isset($_GET['pass']) && $_GET['pass'] == 'error') {
        $massaged = "error";
        $massagedText = "Your password does not match!";
    } elseif (isset($_GET['submit']) && $_GET['submit'] == 'success') {
        $massaged = "success";
        $massagedText = "Registration was successful!";
    }
    if (isset($_GET['submit']) && $_GET['submit'] == 'NotFull') {
        $massaged = "error";
        $massagedText = "Inputs are empty please fill";
    }
    ?>
    <!-- submit=error end-->

    <!-- submit=error front start-->
    <div class="container fixed-top">
        <?php if ($massaged == 'error' && $massagedText !== null) { ?>
            <div class="alert alert-danger alert-dismissible">
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                <strong>Failed</strong>! <?php echo $massagedText; ?>
            </div>
        <?php
        } elseif ($massaged == 'success' && $massagedText !== null) { ?>
            <div class="alert alert-success alert-dismissible">
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                <strong>Success!</strong> <?php echo $massagedText; ?>
            </div>
        <?php } ?>
    </div>
    <!-- submit=error front end-->
    <!-- onclick="document.getElementById('username').style.borderColor= 'inherit;'" -->
    <!-- form singup  start-->
    <div class="container   ">
        <div class="row d-flex justify-content-center mt-5 ">
            <div class=" col-6 ">
                <div class="card ">
                    <div class="card-header"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-box-arrow-in-right" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M6 3.5a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-2a.5.5 0 0 0-1 0v2A1.5 1.5 0 0 0 6.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-8A1.5 1.5 0 0 0 5 3.5v2a.5.5 0 0 0 1 0v-2z" />
                            <path fill-rule="evenodd" d="M11.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H1.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z" />
                        </svg></div>
                    <div class="card-body">
                        <form action="../app/auth/rejesterform.php" method="POST" onsubmit="return validate()" enctype="multipart/form-data">
                            <div class="mb-3 mt-3">
                                <label for="email" class="form-label"> profile img (jpg) :</label>
                                <input type="file" name="uploadFile" class="form-control" id="file">
                            </div>
                            <div class="mb-3 mt-3">
                                <label for="email" class="form-label">Username:</label>
                                <input type="text" name="username" class="form-control" id="username" onclick="document.getElementById('username').style.borderColor= 'lightblue'" placeholder="Enter username">
                            </div>
                            <div class="mb-3 mt-3">
                                <label for="name" class="form-label">name :</label>
                                <input type="text" name="name" class="form-control" id="name" onclick="document.getElementById('name').style.borderColor= 'lightblue'" placeholder="Enter name ">
                            </div>
                            <div class="mb-3 mt-3">
                                <label for="email" class="form-label">Email:</label>
                                <input type="email" name="email" class="form-control" id="email" onclick="document.getElementById('email').style.borderColor= 'lightblue'" placeholder="Enter email">
                            </div>
                            <div class="mb-3">
                                <label for="pwd" class="form-label">Password:</label>
                                <input type="password" name="newpassword" class="form-control" id="pwd" onclick="document.getElementById('pwd').style.borderColor= 'lightblue'" placeholder="Enter password">
                            </div>

                    </div>
                    <div class="card-footer">
                        <button type="submit" name="SingUp" value="SingUp" class="btn btn-primary">SingUp</button>
                        </form>
                        <a href="loginform.php" type="submit" name="SingUp" value="SingUp" class="btn btn-secondary ">Return to
                            login
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- form singup end-->
    <script src="../app/auth/main.js"></script>
</body>

</html>