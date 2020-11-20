<!DOCTYPE html>
<html lang="en"> 
  
<head>

	<!-- Your Basic Site Informations -->
	<title>Yokohama</title>
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />
    
    
    <!-- Mobile Specific Meta -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    
    <!-- Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,300,700,900' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Raleway:400,300,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <!-- Stylesheets -->
    <link rel="stylesheet" href="/theme/css/bootstrap.min.css">
    <link rel="stylesheet" href="/theme/css/bootstrap-responsive.min.css">
    <link rel="stylesheet" href="/theme/css/font-awesome.min.css">
    <link rel="stylesheet" href="/theme/css/prettyPhoto.css" />
    <link rel="stylesheet" href="/theme/css/layout.css">
        
    <!-- Favicons -->
	<link rel="shortcut icon" href="/theme/images/logo.png">
	<link rel="apple-touch-icon" href="/theme/images/logo.png">
	<link rel="apple-touch-icon" sizes="72x72" href="/theme/images/logo.png">
  <link rel="apple-touch-icon" sizes="114x114" href="/theme/images/logo.png">
  
	<script type="text/javascript" src="/theme/js/jquery-1.10.2.min.js"></script>
    
    <!-- Modernizr -->
    <script type="text/javascript" src="/theme/js/modernizr.custom.js"></script>
    
</head>
<body>
<style>
    label{
        color:#ffffff;
        font-size: 18px;
    }
    .contact{
        letter-spacing: 5px;
    }
</style>
 

<section id="main-tabs">
    <div class="tab-content">
        <div class="tab-pane fade active in" id="our-portfolios">
            <div class="header">
                <h3>Our Gallery</h3>
                <p>See our latest Images</p>
                <div class="header-border"></div>
            </div>
            
            <div class="row">
			@foreach($images as $image)
                <div class="col-lg-3 col-md-4"> 
                    <div class="widget">
                        <div class="dotstheme_portfolio">
                           
                                    <img src="{{ URL::to('/') }}/Gallery/{{$image->image}}"
									alt="Image" style="width: 600px; height:300px;">
                         
                        </div>
                    </div>
                </div>
                
            @endforeach
          
              
            </div> 
        </div> <!-- End our-portfolios -->
        
    </div> <!-- End tab-content -->
</section> <!-- End main-tabs -->
    

    
    <footer class="footer-copyright">
    	<div class="container">
        	<p>© Copyright 2020 Yokohama.si All rights reserved.</p> <!-- copyright text -->
		</div> <!-- End container -->
	</footer> <!-- End footer-copyright -->
    
    <a href="#" class="scrollup" title="Back to Top!">Scroll</a> <!-- scroll up -->
    
  
    
	<script type="text/javascript" src="/theme/js/jquery-migrate-1.2.1.min.js"></script>
	<script type="text/javascript" src="/theme/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="/theme/js/jquery-easing.js"></script>
    <script type='text/javascript' src='/theme/js/detectmobilebrowser.js'></script>
    <script type="text/javascript" src="/theme/js/jquery.placeholder.min.js"></script>
	<script type="text/javascript" src="/theme/js/jquery.fitvids.min.js"></script>
	<script type="text/javascript" src="/theme/js/jquery.prettyPhoto.js"></script>
    <script type='text/javascript' src='/theme/js/jquery.parallax-1.1.3.js'></script>
    <script type="text/javascript" src="/theme/js/jquery.hoverdir.js"></script>
  <script type="text/javascript" src="/theme/js/main.js"></script>
  


  <script>
    
   
	$(function () {
		$('#verify_form').on('submit', function (event) {
			event.preventDefault();

			$.ajax({
				url: "{{ route('confirm_sno') }}",
				method: "POST",
				data: new FormData(this),
				contentType: false,
				cache: false,
				processData: false,
				dataType: "json",
				success: function (data) {
					console.log(data);
					var html = '';
					if (data.errors) {
				
						html = '<div class="alert alert-error"> <strong>' + data.errors + '</strong></div>';
					}
					if (data.success) {
						html = '<div class="alert alert-success"><strong>' + data.success +' '+data.serial_number +' </strong><br>'+data.description + '</div>';

					}
					$('#form_result').html(html);
					setTimeout(function () {
						$('#form_result').html('');
					}, 20000000);
				}
			});
		});
		$('#sendEmail').on('submit', function (event) {
			event.preventDefault();

            $('#send_button').text('Sending.......');
			$.ajax({
				url: "{{ route('Sendemail') }}",
				method: "POST",
				data: new FormData(this),
				contentType: false,
				cache: false,
				processData: false,
				dataType: "json",
				success: function (data) {
					console.log(data);
					var html = '';
					if (data.errors) {
				
						html = '<div class="alert alert-error"> <strong>' + data.errors + '</strong></div>';
					}
					if (data.success) {
						html = '<div class="alert alert-success"><strong>' + data.success + '</div>';

                            $('#send_button').text('Message Sent');
					}

					$('#email_result').html(html);
					setTimeout(function () {
                        
                        $('#send_button').text('Send Message');
						$('#email_result').html('');
					}, 6000);
				}
			});
		});

});

  </script>

</body>

</html>