<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

	<title>AnonyMailer</title>

	<style type="text/css">
		
		body{
			background-color: lightgrey;
			margin: 5px;
			padding: 5px;
		}

		.h1text{
			height: 720px;
			text-align:center;
			background-color: white;
		}

		h1{
			position: relative;
			top: 50%;
			font-size: 50px;
		}

		p{
			position: relative;
			top: 50%;
			left: 25%;
		}

		#mailform{
			border: 2px solid beige;
			padding: 25px;
		}

		#mailform form{
			position: relative;
			top: 15%;
		}

		form input[type=button]{
			width: 100%;
		}

	</style>

	<script>
		$(document).ready(function(){
			$('#submit').click(function (){
				var email = $('#email').val();
				var subject = $('#subject').val();
				var emailbody = $('#emailbody').val();
				var link = $('#link').val();
				$.ajax({
					url : 'sendmail.php',
					type : 'post',
					data : {email:email, emailbody:emailbody, subject:subject, link:link}
				}).done( function(result){
						$('#result').html(result);
				});
			});
		});
	</script>


</head>
<body>

	<div class="container">
		<div class="row">
			<div class="col">
				<div class="h1text"><h1>A<u>nony<span style="color: greenyellow;">Mailer</span></u></h1>
					<p>Mail Anyone, Anywhere, Anonymously </p>
				</div>
			</div>
			<div class="col" id="mailform">
				<form action="sendmail.php" method="post">
					<h3>Hello, <span style="background-color: greenyellow;"><b><?php session_start(); echo $_SESSION['email'] ?></b></span></h3>
					<input class="form-control" type="email" name="email" id="email" placeholder="To Email Address" required autocomplete="on"><br>
					<input class="form-control" type="text" name="subject" id="subject" placeholder="Subject" required autocomplete="on"><br>
					<input class="form-control" type="text" name="emailbody" id="emailbody" placeholder="Email Body" required autocomplete="on"><br>
					<input class="form-control" type="file" name="file" id="file" placeholder="Attachments" autocomplete="on"><br>
					<input class="form-control" type="text" name="link" id="link" placeholder="Embedd any Link" autocomplete="on"><br>
					<span id="result"></span>
					<input class="btn btn-dark" type="button" id="submit" value="Send Mail">
				</form>
			</div>
		</div>
	</div>

</body>
</html>