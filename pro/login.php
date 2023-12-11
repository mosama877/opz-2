
<?php include 'inc/header.php'; ?>
<?php 
if(isset($_SESSION['auth'])){
    header('location:index.php');
    die;
}

?>
<?php include 'inc/nav.php'; ?>
<div class="container">
        <div class="row">
            <div class="col-8 mx-auto">
            <?php if (isset($_SESSION['errors']['error'])) : ?>
            <div class="alert alert-danger">
            <?php
            echo $_SESSION['errors']['error'];
            unset($_SESSION['errors']['error']);
            ?>
            </div>
        <?php endif; ?>
                <h1> login </h1>

                <form action="handelers/handelLogin.php" method="POST" class="border p-3 my-5" enctype="multipart/form-data">
                    
                    <div class="mb-3">
                        <label for="email"> Email</label>
                        <input type="email" name="email" class="form-control">
                        <?php if (isset($_SESSION['errors']['error_email'])) : ?>
            <div class="alert alert-danger">
            <?php
            echo $_SESSION['errors']['error_email'];
            unset($_SESSION['errors']['error_email']);
            ?>
            </div>
        <?php endif; ?>
                    </div>
                    <div class="mb-3">
                        <label for="Password"> Password</label>
                        <input type="Password" name="Password" class="form-control">
                        <?php if (isset($_SESSION['errors']['error_Password'])) : ?>
            <div class="alert alert-danger">
            <?php
            echo $_SESSION['errors']['error_Password'];
            unset($_SESSION['errors']['error_Password']);
            ?>
            </div>
        <?php endif; ?>
                    </div>
                    <div class="mb-3">
                        <input type="submit" class="form-control bg-primary" value="login">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php include 'inc/footer.php'; ?>