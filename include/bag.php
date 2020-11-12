<aside id="sidebar-cart">
    <main>
        <a href="#" class="close-button"><span class="close-icon">X</span></a>
        <!-- <h2>My Bag <span class="count">1</span></h2> -->
        <h2>My Bag</h2>
        <ul class="products">
            <?php
			$total=0;
			if(!empty($_SESSION["cart_item"])){
			foreach ($_SESSION["cart_item"] as $item){ 
				$sub=$item['QTY']*$item['PRICE'];
                $total+=$sub;
                $url='store-detail.php?code='.$item['CODE'];

			?>

            <li class="product">
                <form method='POST'>
                    <a href="#!" class="product-link">
                        <span class="product-image">
                            <img src="<?php echo ROOT_URL.'/images/product/'.$item['IMAGE'].'?var='.rand()?>"
                                alt="Product Photo" style='width:60px'>
                        </span>

                        <span class="product-details">
                            <h3><?php echo $item['PRODUCT']?></h3>
                            <span class="qty-price">


                                <span class="price">Qty : <?php echo $item['QTY']?></span>
                                <span class="price">Size : <?php echo $confSize[$item['SIZE']]?></span>
                                <span class="price">Rp <?php echo number_format($sub)?></span>
                            </span>
                        </span>
                    </a>
					<?php
					$s='&';
					if($cpage=='store') { $s='?';}
					?>
                    <a href="<?php echo $_SERVER['REQUEST_URI'].$s?>act=remove&rcode=<?php echo $item['CODE'].'-'.$item['SIZE']?>"
                        class="remove-button">
                        <span class="remove-icon">X</span></a>
                </form>
            </li>

            <?php }} ?>
            <li>
                <a class="btn btn-block" href="<?php echo ROOT_URL?>/store?act=empty"
                    style='border-top:1px solid #ddd;background:#ea2a2a;color:#fff;font-size:12px'>EMPTY CHART</a>
            </li>
        </ul>

        <div class="totals">
            <div class="subtotal">
                <span class="label">Total:</span> <span class="amount">Rp. <?php echo number_format($total)?></span>
            </div>
        </div>
        <div class="action-buttons">

            <a class="checkout-button" href="<?php echo ROOT_URL?>/profile.php">Checkout</a>
        </div>
    </main>
</aside>
<div id="sidebar-cart-curtain"></div>