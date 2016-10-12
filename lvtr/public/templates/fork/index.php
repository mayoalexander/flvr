<?php
	include '../../../header.php';
	include '../../../config/templates/zoom.php';
	$site = new Config();
	$zoom = new Zoom();
	$posts = $site->get_user_media('admin', 0);
?>
<link rel="stylesheet" href="fonts/font-awesome-4.3.0/css/font-awesome.min.css">
<link rel="stylesheet" href="css/all.css">
<link href='http://fonts.googleapis.com/css?family=Montserrat:400,700|Source+Sans+Pro:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
<style type="text/css">
	#wrapper {
		margin-top:2em;
	}
</style>
<div id="wrapper">
	<section class="visual">
		<div class="container">
			<div class="text-block">
				<div class="heading-holder">
					<h1><?php echo $site->title; ?></h1>
				</div>
				<p class="tagline"><?php echo $site->description; ?></p>
				<span class="info"><?php echo $site->description_long; ?></span>
			</div>
		</div>
		<img src="images/img-decor-01.jpg" alt="" class="bg-stretch">
	</section>
	<section class="main">
		<div class="container">
			<div id="cta">
				<a href="http://tympanus.net/codrops/?p=23525" class="btn btn-primary rounded">Try For Free Now</a>
				<p>Unlimited 24-Hour Trial Period</p>
			</div>
			<div class="row">
				<div class="text-box col-md-offset-1 col-md-10">
					<h2>Revolutionary editor</h2>
					<p>Aenean cursus imperdiet nisl id fermentum. Aliquam pharetra dui laoreet vulputate dignissim. Sed id metus id quam auctor molestie eget ut augue. </p>
					<div class="social-placeholder"><img src="images/img-social-placeholder-01.png" height="26" width="365" alt=""></div>
				</div>
			</div>
		</div>
	</section>
	<section class="area">
		<div class="container">
			<div class="row">
				<div class="col-md-5">
					<h2 class="visible-xs visible-sm text-primary">&lt;Here is what you get&gt;</h2>
					<ul class="visual-list">
						<li>
							<div class="img-holder">
								<img src="images/graph-04.svg" width="110" alt="">
							</div>
							<div class="text-holder">
								<h3>Created to Make A Better Web</h3>
								<p>Aenean cursus imperdiet nisl id fermentum. Aliquam pharetra dui laoreet vulputate dignissim. Sed id metus id quam auctor molestie eget ut augue. </p>
							</div>
						</li>
						<li>
							<div class="img-holder">
								<img class="pull-left" src="images/graph-03.svg" width="90" alt="">
							</div>
							<div class="text-holder">
								<h3>Infinite Customization</h3>
								<p>Maecenas eu dictum felis, a dignissim nibh. Mauris rhoncus felis odio, ut volutpat massa placerat ac. Curabitur dapibus iaculis mi gravida luctus. Aliquam erat volutpat. </p>
							</div>
						</li>
						<li>
							<div class="img-holder">
								<img src="images/graph-02.svg" height="84" alt="">
							</div>
							<div class="text-holder">
								<h3>Experimental Features</h3>
								<p>Maecenas eu dictum felis, a dignissim nibh. Mauris rhoncus felis odio, ut volutpat massa placerat ac. Curabitur dapibus iaculis mi gravida luctus. Aliquam erat volutpat. </p>
							</div>
						</li>
						<li>
							<div class="img-holder">
								<img src="images/graph-01.svg" height="71" alt="">
							</div>
							<div class="text-holder">
								<h3>Time-Saving Power Tools</h3>
								<p>Maecenas eu dictum felis, a dignissim nibh. Mauris rhoncus felis odio, ut volutpat massa placerat ac. Curabitur dapibus iaculis mi gravida luctus. Aliquam erat volutpat. </p>
							</div>
						</li>
					</ul>
				</div>
				<div class="col-md-7">
					<div class="slide-holder">
						<h2 class="hidden-xs hidden-sm text-primary">&lt;Here is what you get&gt;</h2>
						<div class="img-slide scroll-trigger"><img src="images/img-01.png" height="624" width="1184" alt=""></div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section class="visual-container">
		<div class="visual-area">
			<div class="container">
				<h2>People Are Talking About Fork</h2>
			</div>
			<img src="images/img-decor-02.jpg" height="764" width="1380" alt="" class="bg-stretch">
		</div>
		<div class="visual-area">
			<div class="container">
				<h2>Fork Subscription Pricing</h2>
				<div class="pricing-tables">
					<div class="plan">
		                <div class="head">
		                    <h3>Students</h3>
		                </div>
		                <div class="price">
		                    <span class="price-main"><span class="symbol">$</span>8</span>
		                    <span class="price-additional">per month</span>
		                </div>
		                <ul class="item-list">
		                    <li>Personal License</li>
		                </ul>
		                <button type="button" class="btn btn-default rounded">purchase</button>
		            </div>
		            <div class="plan">
		                <div class="head">
		                    <h3>professional</h3> </div>
		                <div class="price">
		                    <span class="price-main"><span class="symbol">$</span>19</span>
		                    <span class="price-additional">per month</span>
		                </div>
		                    <ul class="item-list">
		                       <li>Professional License</li>
		                       <li>Email Support</li>
		                    </ul>
		                <button type="button" class="btn btn-default rounded">purchase</button>
		            </div>
		            <div class="plan recommended">
		                <div class="head">
		                    <h3>agency</h3> </div>
		                <div class="price">
		                    <span class="price-main"><span class="symbol">$</span>49</span>
		                    <span class="price-additional">per month</span>
		                </div>
		                    <ul class="item-list">
		                        <li>1-12 Team Members</li>
		                        <li>Phone Support</li>
		                    </ul>
		                <button type="button" class="btn btn-default rounded">purchase</button>
		            </div>
		            <div class="plan">
		                <div class="head">
		                    <h3>enterprise</h3> </div>
		                <div class="price">
		                    <span class="price-main"><span class="symbol">$</span>79</span>
		                    <span class="price-additional">per month</span>
		                </div>
		                <ul class="item-list">
		                    <li>Unlimited Team Members</li>
		                    <li>24/ 7 Phone Support</li>
		                </ul>
		                <button type="button" class="btn btn-default rounded">purchase</button>
		            </div>
				</div>
				<p class="silent">Duis lobortis arcu sed arcu tincidunt feugiat. Nulla nisi mauris, facilisis vitae aliquet id, imperdiet quis nibh. Donec eget elit eu libero tincidunt consequat nec elementum orci. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. </p>
			</div>
			<img src="images/img-decor-03.jpg" height="1175" width="1380" alt="" class="bg-stretch">
		</div>
	</section>
	<section class="area">
		<div class="container">
			<div class="subscribe">
				<h3>Subscribe to Our Newsletter</h3>
				<form class="form-inline">
					<button type="submit" class="btn btn-primary rounded">Subscribe</button>
					<div class="form-group">
						<input type="email" class="form-control rounded" id="exampleInputEmail2" placeholder="Email...">
					</div>
				</form>
			</div>
		</div>
	</section>
</div>
<script src="js/jquery-1.11.2.min.js"></script>
<script src="js/bootstrap.js"></script>
<script src="js/jquery.main.js"></script>