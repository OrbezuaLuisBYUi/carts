<?php
require_once("controller/controllerProducts.php");

if(isset($_POST['operation']))
{
    if($_POST['operation'] == 'addProduct')
    {
        $key = $_POST["key"];
        $amount = $_POST["amount"];
        $respuesta=$pro->addItem($key,$amount);

        echo $respuesta;
    }
    else
    if($_POST['operation'] == 'deleteProduct')
    {
        $key = $_POST["key"];
        $respuesta=$pro->deleteItem($key);

        echo $respuesta;
    }
    else
    if($_POST['operation'] == 'showProducts')
    {
        if(isset($_COOKIE["products"]))
        {
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
                    <div class="col-md-10" id="KeyProduct<?php echo $key; ?>">
                        <div class="card mb-4 box-shadow">
                            <img class="card-img-top" data-src="sources/images/<?php echo $img; ?>" alt="Thumbnail [100%x225]" style="height: 225px; width: 100%; display: block;" src="sources/images/<?php echo $img; ?>" data-holder-rendered="true">
                            <div class="card-body">
                                <p class="card-text descriptionProduct"><?php echo "PRODUCTO: ".$value." CANTIDAD: ".$amountProduct; ?></p>
                            </div>
                            <button type="button" class="btn btn-success" onclick="deleteProduct('<?php echo $key; ?>')">DELETE</button>
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
    }
}
else
{
    require_once("views/products.php");
}
?>