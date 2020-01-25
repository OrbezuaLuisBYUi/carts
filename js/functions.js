function addProduct(key)
{
    var amount = $("#amountProduct"+key).val();
    $.post('index.php', { operation: 'addProduct',key:key,amount:amount }, function(data){
        $("#amountTotal").html(" "+data);
        alert("Product Added!");
    });
}
function deleteProduct(key)
{
    $.post('index.php', { operation: 'deleteProduct',key:key }, function(data){
        $("#amountTotal").html(" "+data);

        $( "#KeyProduct"+key ).fadeOut( "slow", function() {
            alert("Product Deleted!");
        });
    });


}
function showProducts()
{
    $.post('index.php', { operation: 'showProducts' }, function(data){
        $("#productsAdded").html(data);
    });
}
