<div class="left-sidebar">
						
						<div class="brands_products"><!--brands_products-->
							<h2>Brands</h2>
							<div class="brands-name">
								<ul class="nav nav-pills nav-stacked">

									<?php
									$ans=$obj->show_brands();
									// echo "<pre>";
									// print_r($ans);
									// echo "</pre>";

									if(is_array($ans)):
										foreach($ans as $value):
									?>
									<li><a href="#"> <span class="pull-right">(50)</span>
											<?php
											echo $value["br_name"];
											?>
									</a></li>
									<?php
										endforeach;
									endif;
									?>
									
								</ul>
							</div>
						</div><!--/brands_products-->

						<div class="brands_products"><!--brands_products-->
							<h2>CATAGORIES</h2>
							<div class="brands-name">
								<ul class="nav nav-pills nav-stacked">

									<?php
									$ans=$obj->show_categories();
									// echo "<pre>";
									// print_r($ans);
									// echo "</pre>";

									if(is_array($ans)):
										foreach($ans as $value):
									?>
									<li>
<a href="filter_category.php?id=<?php echo $value['ca_id']?>"> <span class="pull-right">(50)</span>
											<?php
											echo $value["ca_name"];
											?>
									</a></li>
									<?php
										endforeach;
									endif;
									?>
									
								</ul>
							</div>
						</div><!--/brands_products-->
						
						<div class="price-range"><!--price-range-->
							<h2>Price Range</h2>
							<div class="well text-center">
								 <input type="text" class="span2" value="" data-slider-min="0" data-slider-max="600" data-slider-step="5" data-slider-value="[250,450]" id="sl2" ><br />
								 <b class="pull-left">$ 0</b> <b class="pull-right">$ 600</b>
							</div>
						</div><!--/price-range-->
						
						<div class="shipping text-center"><!--shipping-->
							<img src="../assets/images/home/shipping.jpg" alt="" />
						</div><!--/shipping-->
					
					</div>