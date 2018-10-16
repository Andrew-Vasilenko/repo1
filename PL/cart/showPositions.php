
    
    <?php
    /*echo $CartId;
    echo $CartProduct_id;
    echo $CartQuantity;
    echo $CartTotal_cost;
    echo $productName */ 
    ?>


<li class="product-wrapper" class="f2b">
						<div class="product-main">
							<div class="product-text">
								<h2 class="produvt-name">
                                                                    <?php print_r($productName); ?></h2>
                                                            <p>Quantity:<form method="POST"> <input type="text" name='quantityTB' value=<?php print_r($CartQuantity); ?>><input type='Submit' value='submit change' name='changeQuantity'>
                                                                <input type='submit' value='Delete position' name='deleteCart'>
                                                                <input type="text" name='idTB' class="invisible" value=<?php print_r($CartId); ?>>
                                                                <input type="text" name='priceTB' class="invisible" value=<?php print_r($productPrice); ?>>
                                                            </form></p>
								
							</div>
						</div>
						<div class="product-details-wrap">						
							<div class="product-details">
								<span class="product-price">
									<b><?php
                                                                                print_r($CartTotal_cost);
                                                                        ?></b>
									<small>euros</small>
								</span>
							</div>
						</div>
				</li>