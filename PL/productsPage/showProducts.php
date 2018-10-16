<style>
.invisible{
    display: none;
}
</style>
<li class="product-wrapper">
    
					<div class="product">
						<div class="product-main">
							<div class="product-photo">
								<img src="categoryImages/5.png" alt="">
                                                                <div class="product-preview">
                                                                    <form method="POST">
                                                                            <input type='submit' name='addToCart' value='Add to Cart'></a>
                                                                    <input type='text' name='ProductIdTb' class='invisible' value=<?php
                                                                    print_r($Proid);
                                                                    
                                                                    ?>
                                                                           >
                                                                    </form>
                                                                </div>
							</div>
							<div class="product-text">
								<h2 class="product-name"><?php
                                                                    print_r($Proname);
                                                                ?></h2>
								<p><?php
                                                                    print_r($Prodescription);
                                                                ?></p>
							</div>
						</div>
						<div class="product-details-wrap">						
							<div class="product-details">
								<span class="product-price">
									<b><?php
                                                                    print_r($Proprice);
                                                                ?></b>
									<small>euros</small>
								</span>
							</div>
						</div>
					</div>
                                                                        
				</li>