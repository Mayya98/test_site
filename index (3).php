<?php
$page_title = "Product List";
require_once "layout_header.php";
?>

<header>
    <div>
        <span class="header_title">
            Product List
        </span>
        <div class="buttons">
            <a href='add.php'><button class='left_button' id="adding_product">ADD</button></a>
            <button class="right_button" id="delete-product-btn" name="mass_delete" value="mass_delete">MASS DELETE</button>
            </span>
        </div>
    </div>
    <hr size="2" width="100%" align="center" noshade>
</header>

<?php
include_once 'database.php';
include_once 'product.php';

$database = new Database();
$db = $database->getConnection();

$product = new Product($db);
if ($_POST) {
    $host = "localhost";
	$username = "m081098";
	$password = "m098066arsL";
	$db_name = "mayya098";

	$product->SKU = $_POST['SKU'];
	$product->Name = $_POST['name'];
	$product->Price = $_POST['price'];
    $product->Type = $_POST['make_text'];
	$product->Size = $_POST['size'];
	$product->Weight = $_POST['weight'];
	$product->Dimension = $_POST['height'] . 'x' . $_POST['width'] . 'x' . $_POST['length'];

    if ($product->Type=='' and $product->Size==0 and $product->Weight==0 and $product->Dimension=='xx') {
		!($product->create());
    }


	if ($product->create()) {
		echo "<div class='alert alert-success' style='display:none;'>Product was added successfully.</div>";
    }
    
	else {
		echo "<div class='alert alert-danger'> Product is impossible to create.</div>";
	}
}

$info1 = [];
if ($query1 = $db->query("SELECT SKU, Name, Price, Dimension FROM products  WHERE Dimension != 'xx'")) {
	$info1 = $query1->fetchAll(PDO::FETCH_ASSOC);
} else {
	print_r($db->errorInfo());
}

$info2 = [];
if ($query2 = $db->query("SELECT SKU, Name, Price, Size FROM products WHERE Size != 0")) {
	$info2 = $query2->fetchAll(PDO::FETCH_ASSOC);
} else {
	print_r($db->errorInfo());
}

$info3 = [];
if ($query3 = $db->query("SELECT SKU, Name, Price, Weight FROM products WHERE Weight != 0")) {
	$info3 = $query3->fetchAll(PDO::FETCH_ASSOC);
} else {
	print_r($db->errorInfo());
}
?>

<div class="container">
    <?php foreach ($info1 as $data): ?>
    <div class="item">
        <input class="delete-checkbox" type="checkbox"></input>
        <div class="prod_SKU"><?= $data['SKU'];?></div>
        <div class="prod_name"><?=$data['Name'];?></div>
        <div class="prod_price">
            <?= $data['Price'];?>$</div>

        <div class="row">
            <div class="col-xs-5 dt">Dimension:</div>
            <div class="col-xs-7 dd"><?= $data['Dimension'];?></div>
        </div>
    </div>
    <?php endforeach; ?>

    <?php foreach ($info2 as $data): ?>
    <div class="item">
        <input class="delete-checkbox" type="checkbox"></input>
        <div class="prod_SKU"><?= $data['SKU'];?></div>
        <div class="prod_name"><?=$data['Name'];?></div>
        <div class="prod_price">
            <?= $data['Price'];?>$</div>

        <div class="row">
            <div class="col-xs-5 dt">Size:</div>
            <div class="col-xs-7 dd"><?= $data['Size'];?> MB</div>
        </div>
    </div>
    <?php endforeach; ?>

        <?php foreach ($info3 as $data): ?>
        <div class="item">
            <input class="delete-checkbox" type="checkbox"></input>
            <div class="prod_SKU"><?= $data['SKU'];?></div>
            <div class="prod_name"><?=$data['Name'];?></div>
            <div class="prod_price">
                <?= $data['Price'];?>$</div>

            <div class="row">
                <div class="col-xs-5 dt">Weight:</div>
                <div class="col-xs-7 dd"><?= $data['Weight'];?> KG</div>
            </div>
        </div>
        <?php endforeach; ?>
</div>
<script src="http://code.jquery.com/jquery-1.4.4.min.js"></script>
<script>

$('#delete-product-btn').click(function() {
if (!$(".delete-checkbox").is(":checked")) {
    alert("Choose items");
}
else{
$('.item:has(input[class=delete-checkbox]:checked)').remove();
}
});
</script>

<?php 
require_once "layout_footer.php";
?>