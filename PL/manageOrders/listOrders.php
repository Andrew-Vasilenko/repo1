
    
    <?php
    /*$Shipid = FillingShipping_orderId($size, $usr);
        $Shipclient_id = FillingShipping_orderClient_id($size, $usr);
        $Shipfinal_cost = FillingShipping_orderFinal_cost($size, $usr);
        $Shipshipping_status = FillingShipping_orderShipping_status($size, $usr);
        $Shippayment_status = FillingShipping_orderPayment_status($size, $usr);
        $Shiptracking_number = FillingShipping_orderTracking_number($size, $usr);
        $Shipreturn_cost = FillingShipping_orderReturn_cost($size, $usr);
        $Shipcomment_label = FillingShipping_orderComment_label($size, $usr);*/
    ?>
<li class="product-wrapper" class="f2b">
						<div class="product-main">
							<div class="product-text">
                                                            <h2 class="produvt-name">Client id: <?php print_r($Shipclient_id); ?></h2>
                                                            <h2 class="produvt-name">Final cost: <?php print_r($Shipfinal_cost); ?></h2>
                                                            <form method="POST">
                                                                <input type="text" class="invisible" name="shipId" value=<?php print_r($Shipid); ?>>
                                                            <p>Shipping status: <?php print_r($Shipshipping_status);?> <input type="text" name="shipping_statusTB" value=''>
                                                            <input type="submit" name="change_shipping_status" value="Submit changes"></p>
                                                            
                                                            <p>Payment status: <?php print_r($Shippayment_status);?> <input type="text" name="payment_statusTB" value=''>
                                                            <input type="submit" name="change_payment_status" value="Submit changes"></p>
                                                            
                                                            <p>Tracking number: <?php print_r($Shiptracking_number);?> <input type="text" name="tracking_numberTB" value=''>
                                                            <input type="submit" name="change_tracking_number" value="Submit changes"></p>
                                                            
                                                            <p>Comment label: <?php print_r($Shipcomment_label);?> <input type="text" name="comment_labelTB" value=''>
                                                            <input type="submit" name="change_comment_label" value="Submit changes"></p>
                                                            <input type='submit' value='Delete order' name='deleteOrder'>
                                                            </form>
							</div>
						</div>
				</li>

