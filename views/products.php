<?php
$products = array("1"=>"abocado","2"=>"aji","3"=>"apple","4"=>"bananas","5"=>"blueberrys","6"=>"cherry","7"=>"granada","8"=>"peachs","9"=>"strawberry");
?>
<!DOCTYPE html>
<html>
<head lang="en">
    <link rel="stylesheet" href="css/main.css?<?php echo time(); ?>" />
    <!-- CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">    <!--This is the CDN to connect with BootstrapCDN CSS-->
    <!-- JS AND JQUERY -->
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>    <meta charset="UTF-8">
    <!-- CDN FOR ICONS CART -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- CDN JS FUNCTIONS -->
    <script src="js/functions.js?<?php echo time(); ?>"></script>
    <title>Store</title>
</head>
<body class="margin">
<nav class="navbar navbar-expand-lg navbar-dark bg-success">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand" href="#">STORE</a>

    <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
            <li class="nav-item active">
                <a class="nav-link" href="#"> <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#"></a>
            </li>
            <li class="nav-item">
                <a class="nav-link disabled" href="#"></a>
            </li>
        </ul>
        <form method="post" action="<?php echo htmlspecialchars('takeorder.php'); ?>" class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-warning text-white my-2 my-sm-0" type="button" onclick="showProducts()" data-toggle="modal" data-target="#myModal">
                <a class="fa fa-cart-arrow-down" id="amountTotal">
                    <?php
                        if(isset($_COOKIE["products"]))
                        {
                            $cookie = $_COOKIE["products"];

                            $selected = explode(',',$cookie);
                            $amountTotal = count($selected);
                            if($amountTotal > 0)
                            {
                                echo $amountTotal;
                            }
                            else
                            {
                                echo 0;
                            }
                        }
                        else
                        {
                            echo 0;
                        }
                    ?>
                </a>
            </button>

            <!-- Modal -->
            <div class="modal fade" id="myModal" role="dialog">
                <div class="modal-dialog">

                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Products Added</h4>
                            <button type="button" class="close" data-dismiss="modal">Go to Cart</button>
                        </div>
                        <div class="modal-body" id="productsAdded">

                        </div>
                        <div class="modal-footer">
                            Address to recive: <br><input type="text" name="address" placeholder="Address" required>
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-success">Take Order</button>
                        </div>
                    </div>

                </div>
            </div>
        </form>
    </div>
</nav>

<div class="row">

    <?php
    foreach($products as $key => $value)
    {
        $img = "";
        if($key == 1){ $img = "abocado.jpg"; }
        if($key == 2){ $img = "aji.jpg"; }
        if($key == 3){ $img = "apple.jpg"; }
        if($key == 4){ $img = "bananas.jpg"; }
        if($key == 5){ $img = "blueberrys.jpg"; }
        if($key == 6){ $img = "cherry.jpg"; }
        if($key == 7){ $img = "granada.jpg"; }
        if($key == 8){ $img = "peachs.jpg"; }
        if($key == 9){ $img = "strawberry.jpg"; }
    ?>
        <div class="col-md-4">
            <div class="card mb-4 box-shadow">
                <img class="card-img-top" data-src="sources/images/<?php echo $img; ?>" alt="Thumbnail [100%x225]" style="height: 225px; width: 100%; display: block;" src="sources/images/<?php echo $img; ?>" data-holder-rendered="true">
                <div class="card-body">
                    <p class="card-text descriptionProduct"><?php echo $value; ?></p>
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="btn-group">
                            <input type="number" id="amountProduct<?php echo $key; ?>" value="0" class="col-sm-6 bg-success text-light">
                        </div>
                        <small class="text-muted">
                            <button class="btn btn-success" onclick="addProduct('<?php echo $key; ?>')">Add</button>
                        </small>
                    </div>
                </div>
            </div>
        </div>
    <?php
    }
    ?>
</div>
</body>
</html>