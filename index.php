<!DOCTYPE html>
<html lang="ru">
	<head>
		<meta charset="UTF-8">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
		<title>ATM machine</title>
		<script type="text/javascript" src="jquery-3.5.1.min.js"></script>
		<script type="text/javascript" src="form.js"></script>		
	</head>
	<body >
		<div class="container">
			<div class="row">
				<div >	
					<h1>Банкомат</h1>					 
					<form action="form.php" method="post">
						<p>Номинал в наличии:</p>
						<p><input type="text" name="nominal" value="5, 10, 20, 50, 100, 200"></p>
						<p>Ваша сумма:</p>
						<p><input type="text" name="amount" value=""></p>
						<p><input type="submit" value="Send"></p>
					</form>
					<div id="message"></div>	
				</div>
			</div>
		</div>		
	</body>
</html>