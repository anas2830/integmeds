<footer class="footer-area">
	<div class="container">
		<div class="row">
			<div class="col-lg-3 col-md-6">
				<div class="footer-info">
					<div class="Footer-logo">
						<a href="#">
                            <img class="img-fluid" src="{{asset('web_assets/images/logo/footer-logo.png')}}" alt="" title="">
                        </a>
					</div>
					<address>
						<p> We help patients identify the root cause of their health condition and regain perfect health with proper nutrition, evidence based functional alternative</p>
						<a href="mailto: contact@integmeds.com">contact@integmeds.com</a>
						<a href="tel:+13463460732">+13463460732</a>
					</address>
				</div>
			</div>
			<div class="col-lg-3 col-md-6 d-flex justify-content-lg-center justify-content-start ">
				<div class="footer-info">
					<h5>Account</h5>
					<ul>
						<li><a href="login.php">My Account</a></li>
						<li><a href="{{route('cart')}}">Cart</a></li>
						<li><a href="wishlist.php">Wishlist</a></li>
						<li><a href="{{route('category')}}">Shop</a></li>
					</ul>
				</div>
			</div>
			<div class="col-lg-3 col-md-6 d-flex justify-content-lg-center justify-content-start">
				<div class="footer-info">
					<h5>Quick link</h5>
					<ul>
						<li><a href="{{route('privacy-policy')}}">Privacy Policy</a></li>
						<li><a href="{{route('terms-condition')}}">Terms Of Use</a></li>
						<li><a href="{{route('contact')}}">Contact</a></li>
						<li><a href="bundle.php">Bundle</a></li>
					</ul>
				</div>
			</div>
			<div class="col-lg-3 col-md-6 d-flex justify-content-lg-end justify-content-start">
				<div class="footer-info">
					<h5>Subscribe us</h5>
					<p>Sign up for offers and exclusive discounts.</p>
                    <div class="subcription">
						<form id="newsletterForm" action="{{ route('newsletter.subscribe') }}" method="POST">
							@csrf
							<div class="subscription-fill">
								<input type="email" name="email" id="newsletterEmail" class="form-control" placeholder="Email Address" required maxlength="100">
								<span id="newsletterMessage"></span>
							</div>
							<button class="btn mt-2" id="newsletterSubmit" type="button">Submit</button>
						</form>						
                    </div>
                    
				</div>
			</div>
		</div>
	</div>
	<div class="footer-bottom">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="copy-right">
						<p href="#">&copy; Copyright 2025. All right reserved <a href="#">integmeds.com </a>Designed & Developed by <a href="#">WesoftBD</a></p>
					</div>
				</div>
			</div>
		</div>
	</div>
</footer>