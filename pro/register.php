<?php include 'inc/header.php'; ?>
<?php include 'inc/nav.php'; ?>
    <div class="container">
        <div class="row">
            <div class="col-8 mx-auto">
                
                <h1> register </h1>
                <form action="handelers/handelRegister.php" method="POST" class="border p-3 my-5" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="name"> Name</label>
                        <input type="text" name="name" class="form-control">
                        <?php if (isset($_SESSION['errors']['error_name'])) : ?>
            <div class="alert alert-danger">
            <?php
            echo $_SESSION['errors']['error_name'];
            unset($_SESSION['errors']['error_name']);
            ?>
            </div>
        <?php endif; ?>
                    </div>
                    <div class="mb-3">
                        <label for="email"> Email</label>
                        <input type="email" name="email" class="form-control">
                        <?php if (isset($_SESSION['errors']['error_password'])) : ?>
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
                        <?php if (isset($_SESSION['errors']['error_password'])) : ?>
            <div class="alert alert-danger">
            <?php
            echo $_SESSION['errors']['error_password'];
            unset($_SESSION['errors']['error_password']);
            ?>
            </div>
        <?php endif; ?>
                    </div>
                    <div class="mb-3">
                        <input type="submit" class="form-control bg-primary" value="register">
                    </div>
                </form>
            </div>
        </div>
    </div>

    <?php include 'inc/footer.php'; ?>