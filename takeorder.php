<html>
<head lang="en">
    <link rel="stylesheet" href="css/main.css?<?php echo time(); ?>" />
    <!-- CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">    <!--This is the CDN to connect with BootstrapCDN CSS-->
    <!-- JS AND JQUERY -->
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>    <meta charset="UTF-8">
    <!-- CDN FOR ICONS CART -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- CDN JS FUNCTIONS -->
    <script src="js/functions.js?<?php echo time(); ?>"></script>
    <title>Store</title>
</head>
<body>
<?php
if(isset($_COOKIE["products"]))
{
    $address = $_POST['address'];
    $bought = $_COOKIE["products"];
    $seleccionados = explode(',',$bought);
    $num = count($seleccionados);
    for($i = 0; $i < $num; $i++) {
        if($seleccionados[$i] != '') {
            list($key, $amountProduct) = explode(':', $seleccionados[$i]);
            $img = "";
            if($key == 1){ $img = "abocado.jpg"; $value = "abocado"; }
            if($key == 2){ $img = "aji.jpg"; $value = "aji"; }
            if($key == 3){ $img = "apple.jpg"; $value = "apple"; }
            if($key == 4){ $img = "bananas.jpg"; $value = "bananas"; }
            if($key == 5){ $img = "blueberrys.jpg"; $value = "blueberrys"; }
            if($key == 6){ $img = "cherry.jpg"; $value = "cherry"; }
            if($key == 7){ $img = "granada.jpg"; $value = "granada"; }
            if($key == 8){ $img = "peachs.jpg"; $value = "peachs"; }
            if($key == 9){ $img = "strawberry.jpg"; $value = "strawberry"; }
            ?>
            <div class="col-md-4 descriptionProduct" id="KeyProduct<?php echo $key; ?>">
                <?php echo "SHIPPING ADDRESS: ".$address; ?>
                <div class="card mb-4 box-shadow">
                    <img class="card-img-top" data-src="sources/images/<?php echo $img; ?>" alt="Thumbnail [100%x225]" style="height: 225px; width: 100%; display: block;" src="sources/images/<?php echo $img; ?>" data-holder-rendered="true">
                    <div class="card-body">
                        <p class="card-text descriptionProduct"><?php echo "PRODUCTO: ".$value." CANTIDAD: ".$amountProduct; ?></p>
                    </div>
                </div>
            </div>
        <?php
        }
    }
}
else
{
    echo "No products";
}
?>
</body>
</html>