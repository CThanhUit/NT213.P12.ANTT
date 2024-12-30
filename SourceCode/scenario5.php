<?php
	header("Content-Security-Policy: script-src 'unsafe-eval' https://cdnjs.cloudflare.com/ ; object-src 'none' ; report-uri /csp-report-endpoint.php;");
?>
<!DOCTYPE html>
<html lang="en">
	<head>
    	<title>CSP Bypass</title>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="styles.css" />		
	</head>
	<body>
		<nav>
			<a href="index.php">Content Security Policy</a>
			<a href="scenario1.php">Scenario 1</a>
			<a href="scenario2.php">Scenario 2</a>
			<a href="scenario3.php">Scenario 3</a>
			<a href="scenario4.php">Scenario 4</a>
			<a href="scenario5.php">Scenario 5</a>
			<a href="scenario6.php">Scenario 6</a>
		</nav>
		<div class="container">
			<h1>Scenario 5</h1>
			<br>
			<h2>
				Kích hoạt XSS từ trang tài nguyên CDN của CloudFlare
				<h4>
					Content-Security-Policy: script-src 'unsafe-eval' https://cdnjs.cloudflare.com/ ; object-src 'none' ; report-uri /csp-report-endpoint.php;
				</h4>
			</h2>
			<br>
			<?php
				$payload = $_GET["input"] ?? '';
			?>
			<form action="#" method="get">
				<input type="text" name="input" id="input" />
				<button type="submit">Submit</button>
			</form>
			<br>
			<p>Your payload is: </p>
			<div id="output">
				<?php
					echo $payload
				?>
			</div>
		</div>
	</body>
</html>
