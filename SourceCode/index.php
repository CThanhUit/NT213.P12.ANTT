<?php

header("Content-Security-Policy: default-src 'self' 'unsafe-inline'");

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
      <h1>Content Security Policy (CSP)</h1>
    </div>
  </body>
</html>
