<?php session_start(); ?>
<?php
if(!file_exists("products.json")){
    $data = file_get_contents("https://fakestoreapi.com/products");
    file_put_contents("products.json", $data);
}
$data = file_get_contents("products.json");
$data = json_decode($data , true);
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>php</title>
  </head>



  <body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php">project</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="test.php">Home</a>
        </li>
        
        
        
        <li class="nav-item">
          <a class="nav-link" href="cart.php">cart</a>
        </li>
        
        
      </ul>
    
    </div>
  </div>
</nav>
    <div class="container">
    <?php
  if(isset($_SESSION["add"]))  : ?>
    <div class="alert alert-success">
    <?php
        echo $_SESSION['add'];
        unset($_SESSION['add'])
    ?>
    </div>
    <?php endif ?>
        <div class="row">
            <div class="col-12">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>
                            id
                            </th>
                            <th>
                            title
                            </th>
                            <th>
                            price
                            </th>
                            <th>
                            description
                            </th>
                            <th>
                                image
                            </th>
                            <th>
                                add to cart
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($data as $product):?>
                            <tr>
                                <td><?php echo $product['id']; ?></td>
                                <td><?php echo $product['title']; ?></td>
                                <td><?php echo $product['price']; ?></td>
                                <td><?php echo $product['description']; ?></td>
                                <td><img src="<?php echo $product['image']; ?>" alt=""width="100px"height="100px"></td>
                                <td>
                                    <a href="add-to-cart.php?id=<?php echo $product['id'] ?>" class="btn btn-primary" >add</a>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

      <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
  </body>
</html>