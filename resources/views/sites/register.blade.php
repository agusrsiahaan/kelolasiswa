@extends('layouts.frontend.master')
@section('content')
<!-- start banner Area -->
<section class="banner-area relative about-banner" id="home">	
	<div class="overlay overlay-bg"></div>
	<div class="container">				
		<div class="row d-flex align-items-center justify-content-center">
			<div class="about-content col-lg-12">
				<h1 class="text-white">
					Pendaftaran Siswa				
				</h1>	
				<p class="text-white link-nav"><a href="/">Home </a>  <span class="lnr lnr-arrow-right"></span>  <a href="/register"> Register</a></p>
			</div>	
		</div>
	</div>
</section>
<!-- End banner Area -->
		
<!-- Start search-course Area -->
<section class="search-course-area relative" style="background-image: none;">
	<div class="container">
		<div class="row justify-content-between align-items-center">
			<div class="col-lg-6 col-md-6 search-course-left">
				<h1 class="mb-10">
					Segera Bergabung <br>
					dengan Kami!
				</h1>
			</div>
			<div class="col-lg-6 col-md-6 search-course-right section-gap">
				{!! Form::open(['url' => '/postregister', 'class' => 'form-wrap']) !!}
					<h4 class="text-white pb-20 text-center mb-30">Form Pendaftaran</h4>
					{!!Form::text('nama_depan','',['class' => 'form-control', 'placeholder' => 'Nama Depan'])!!}		
					{!!Form::text('nama_belakang','',['class' => 'form-control', 'placeholder' => 'Nama Belakang'])!!}		
					<div class="form-select" id="service-select">
						{!!Form::select('agama', ['' => 'Pilih Agama', 'I' => 'Islam', 'KP' => 'Kristen Protestan', 'KK' => 'Kristen Katolik','H' => 'Hindu', 'B' => 'Budha', 'K' => 'Kong Hu Cu'], ['style' => 'display: none;'])!!}
					</div>	
					{!!Form::textarea('alamat','',['class' => 'form-control', 'placeholder' => 'Alamat'])!!}		
					
					<div class="form-select" id="service-select">
						{!!Form::select('jenis_kelamin', ['' => 'Pilih Jenis Kelamin', 'L' => 'Laki-laki', 'P' => 'Perempuan'], ['style' => 'display: none;'])!!}
					</div>

					{!!Form::email('email','',['class' => 'form-control', 'placeholder' => 'Email'])!!}
					{!!Form::password('password', ['class' => 'form-control', 'placeholder' => 'Password'])!!}
					<input type="submit" class="primary-btn text-uppercase" value="Kirim" style="text-align: center;">
				{!!Form::close()!!}
			</div>
		</div>
</section>
<!-- End search-course Area -->

			
<!-- start footer Area -->		
<footer class="footer-area section-gap">
	<div class="container">
		<div class="row">
			<div class="col-lg-2 col-md-6 col-sm-6">
				<div class="single-footer-widget">
					<h4>Top Products</h4>
					<ul>
						<li><a href="#">Managed Website</a></li>
						<li><a href="#">Manage Reputation</a></li>
						<li><a href="#">Power Tools</a></li>
						<li><a href="#">Marketing Service</a></li>
					</ul>								
				</div>
			</div>
			<div class="col-lg-2 col-md-6 col-sm-6">
				<div class="single-footer-widget">
					<h4>Quick links</h4>
					<ul>
						<li><a href="#">Jobs</a></li>
						<li><a href="#">Brand Assets</a></li>
						<li><a href="#">Investor Relations</a></li>
						<li><a href="#">Terms of Service</a></li>
					</ul>								
				</div>
			</div>
			<div class="col-lg-2 col-md-6 col-sm-6">
				<div class="single-footer-widget">
					<h4>Features</h4>
					<ul>
						<li><a href="#">Jobs</a></li>
						<li><a href="#">Brand Assets</a></li>
						<li><a href="#">Investor Relations</a></li>
						<li><a href="#">Terms of Service</a></li>
					</ul>								
				</div>
			</div>
			<div class="col-lg-2 col-md-6 col-sm-6">
				<div class="single-footer-widget">
					<h4>Resources</h4>
					<ul>
						<li><a href="#">Guides</a></li>
						<li><a href="#">Research</a></li>
						<li><a href="#">Experts</a></li>
						<li><a href="#">Agencies</a></li>
					</ul>								
				</div>
			</div>																		
			<div class="col-lg-4  col-md-6 col-sm-6">
				<div class="single-footer-widget">
					<h4>Newsletter</h4>
					<p>Stay update with our latest</p>
					<div class="" id="mc_embed_signup">
						 <form target="_blank" action="https://spondonit.us12.list-manage.com/subscribe/post?u=1462626880ade1ac87bd9c93a&amp;id=92a4423d01" method="get">
						  <div class="input-group">
						    <input type="text" class="form-control" name="EMAIL" placeholder="Enter Email Address" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Email Address '" required="" type="email">
						    <div class="input-group-btn">
						      <button class="btn btn-default" type="submit">
						        <span class="lnr lnr-arrow-right"></span>
						      </button>    
						    </div>
						    	<div class="info"></div>  
						  </div>
						</form> 
					</div>
				</div>
			</div>											
		</div>
		<div class="footer-bottom row align-items-center justify-content-between">
			<p class="footer-text m-0 col-lg-6 col-md-12"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
			<div class="col-lg-6 col-sm-12 footer-social">
				<a href="#"><i class="fa fa-facebook"></i></a>
				<a href="#"><i class="fa fa-twitter"></i></a>
				<a href="#"><i class="fa fa-dribbble"></i></a>
				<a href="#"><i class="fa fa-behance"></i></a>
			</div>
		</div>						
	</div>
</footer>	
<!-- End footer Area -->
@endsection	