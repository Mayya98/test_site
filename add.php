<?php
$page_title = "Product Add";
require_once "layout_header.php";
?>

<header>
    <div>
        <span class="header_title">
            Product Add
        </span>
        <div class="buttons">
            <input type="submit" form = "product_form" name="submit" class="left-button" id="save-submit" value="SAVE">
            <a href='index.php'><button class="right_button" name="cancel" value="cancel" align="center">Cancel</button></a>
            </span>
        </div>
    </div>
    <hr size="2" width="100%" align="center" noshade>
</header>

<body>


    <form id="product_form" action="index.php" method="POST">

        <div class="line">
            <label class="label">
                <span class="title">SKU</span>
                <input name="SKU" id="sku" class="inp">
            </label>
        </div>

        <div class="line">
            <label class="label">
                <span class="title">Name</span>
                <input name="name" id="name" class="inp">
            </label>
        </div>

        <div class="line">
            <label class="label">
                <span class="title">Price ($)</span>
                <input name="price" id="price" class="inp">
            </label>
        </div>

        <div class="line">
            <label class="label">
                <span class="title">Type Switcher</span>
                <select name="Type Switcher" id="productType" class="inp" onchange="setTextField(this)">
                    <option value='' selected> Type Switcher </option>
                    <option value="DVD"> DVD </option>
                    <option value="Book"> Book </option>
                    <option value="Furniture"> Furniture </option>
                    <input id="make_text" type = "hidden" name = "make_text" value = "" />
                </select>
            </label>
        </div>

        <div class="furniture_form" style="display:none">
            <div class="description" align="center">Please, provide dimensions</div>
            <div class="line">
                <label class="label">
                    <span class="title">Height (CM)</span>
                    <input name="height" id="height" class="inp">
                </label>
            </div>

            <div class="line">
                <label class="label">
                    <span class="title">Width (CM)</span>
                    <input name="width" id="width" class="inp">
                </label>
            </div>

            <div class="line">
                <label class="label">
                    <span class="title">Length (CM)</span>
                    <input name="length" id="length" class="inp">
                </label>
            </div>
        </div>

        <div class="dvd_form" style="display:none;">
            <div class="description">Please, provide size</div>
            <div class="line">
                <label class="label">
                    <span class="title">Size (MB)</span>
                    <input name="size" id="size" class="inp">
                </label>
            </div>
        </div>


        <div class="book_form" style="display: none;">
            <div class="description">Please, provide weight</div>
            <div class="line">
                <label class="label">
                    <span class="title">Weight (KG)</span>
                    <input name="weight" id="weight" class="inp">
                </label>
            </div>
        </div>
        <div class="line">
            <!--<input type="submit" name="submit" class="btn-app" value="SUBMIT">-->
            <input type="reset" class="btn-reset" name="reset" value="RESET" align="center">
        </div>
    </form>
<script type="text/javascript">
function setTextField(ddl) {
    document.getElementById('make_text').value = ddl.options[ddl.selectedIndex].text;
}
</script>
<?php
require_once "layout_footer.php";
?>