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
                                                                    <form id ='ccccc' method="POST">
                                                                            <input type='submit' name='catRequest' class='pseudobutton' method='POST' value='Watch'>
                                                                    <input type='text' name='categoryIdTb' class='invisible' value=<?php
                                                                    print_r($Catid);
                                                                    ?>
                                                                           >
                                                                    </form>
                                                                </div>
							</div>
							<div class="product-text">
								<h2 class="product-name"><?php
                                                                    print_r($Catname);
                                                                ?></h2>
								<p><?php
                                                                    print_r($Catdescription);
                                                                ?></p>
							</div>
						</div>
					</div>
                                                                        
				</li>
                                         