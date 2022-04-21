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
    <!-- php set massaged start-->
    <?php
    $massaged = null;
    $massagedText = null;

    if (isset($_GET['submit']) && $_GET['submit'] == 'error') {
        $massaged = "error";
        $massagedText = "not found";
    }
    ?>
    <!-- php set massaged end->
  
   <!-- show front massage start -->
    <div class="container fixed-top ">
        <?php if ($massaged == 'error' && $massagedText !== null) { ?>
            <div class="alert alert-danger alert-dismissible">
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                <strong>Failed</strong>! <?php echo $massagedText; ?>
            </div>
        <?php } ?>
    </div>

    <!-- show front massage start -->

    <!-- form start -->
    <div class="container   ">
        <div class="row d-flex justify-content-center mt-5 ">
            <div class=" col-6 ">
                <div class="card ">
                    <div class="card-header"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-box-arrow-in-right" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M6 3.5a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-2a.5.5 0 0 0-1 0v2A1.5 1.5 0 0 0 6.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-8A1.5 1.5 0 0 0 5 3.5v2a.5.5 0 0 0 1 0v-2z" />
                            <path fill-rule="evenodd" d="M11.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H1.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z" />
                        </svg></div>
                    <div class="card-body">
                        <form action="../app/auth/loginform.php" method="POST" onsubmit="return ValidateLogin()">
                            <div class="mb-3 mt-3">
                                <label for="Usernamelogin" class="form-label">Username:</label>
                                <input type="text" name="username" class="form-control" id="Usernamelogin" onclick="document.getElementById('Usernamelogin').style.borderColor= 'lightblue'" placeholder="Enter email">
                            </div>
                            <div class="mb-3">
                                <label for="pwd" class="form-label">Password:</label>
                                <input type="password" name="password" class="form-control" id="pwd" onclick="document.getElementById('pwd').style.borderColor= 'lightblue'" placeholder="Enter password">
                            </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" name="submit" value="login" class="btn btn-primary">Login</button>
                        </form>
                        <a href="rejesterform.php" class="btn btn-secondary">SingUp</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- form end -->
    <script src="../app/auth/main.js"></script>
</body>

</html>