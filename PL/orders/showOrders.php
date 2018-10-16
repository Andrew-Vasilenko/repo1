
    
    <?php
    /*echo $Shipid;
    echo $Shipstaff_id;
    echo $Shipfinal_cost;
    echo $Shipshipping_status;
    echo $Shippayment_status;
    echo $Shiptracking_number;
    echo $Shipcomment_label;*/
    ?>
<li class="product-wrapper" class="f2b">
						<div class="product-main">
							<div class="product-text">
                                                            <h2 class="produvt-name">Order id: <?php print_r($Shipid); ?></h2>
								<h2 class="produvt-name">
                                                                    Shipping status: <?php print_r($Shipshipping_status); ?> </h2><form method="POST"> 
                                                                        <p>Tracking number: <?php print_r($Shiptracking_number); ?></p><input type='submit' value='Cancel order' name='deleteOrder'>
                                                                <input type="text" name='idTB' class="invisible" value=<?php print_r($Shipid); ?>>
                                                                <input type="text" name='staff_idTB' class="invisible" value=<?php print_r($Shipstaff_id); ?>>
                                                            </form>
                                                            <p>in case of cancelling the order you will pay: <?php print_r($Shipreturn_cost) ?> euros</p>
                                                            <p>in case you have some problems or questions contact us: <?php print_r($Shipreturn_cost) ?> euros</p>
								
								
							</div>
						</div>
						<div class="product-details-wrap">						
							<div class="product-details">
								<span class="product-price">
									<b><?php
                                                                                print_r($Shipfinal_cost);
                                                                        ?></b>
									<small>euros</small>
								</span>
							</div>
						</div>
				</li>


