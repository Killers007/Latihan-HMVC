<!DOCTYPE html>
<html>
<head>
	<title>Warning !!!</title>
	<style type="text/css">
	@import 'https://fonts.googleapis.com/css?family=Inconsolata';

	html {
		min-height: 100%;
	}

	body {
		box-sizing: border-box;
		height: 100%;
		background-color: #000000;
		background-image: radial-gradient(#11581E, #041607);
		font-family: 'Inconsolata', Helvetica, sans-serif;
		font-size: 1.5rem;
		color: rgba(128, 255, 128, 0.8);
		text-shadow:
		0 0 1ex rgba(51, 255, 51, 1),
		0 0 2px rgba(255, 255, 255, 0.8);
	}

	.overlay {
		pointer-events: none;
		position: absolute;
		width: 100%;
		height: 100%;
		background:
		repeating-linear-gradient(
			180deg,
			rgba(0, 0, 0, 0) 0,
			rgba(0, 0, 0, 0.3) 50%,
			rgba(0, 0, 0, 0) 100%);
		background-size: auto 4px;
		z-index: 99;
	}

	.overlay::before {
		content: "";
		pointer-events: none;
		position: absolute;
		display: block;
		top: 0;
		left: 0;
		right: 0;
		bottom: 0;
		width: 100%;
		height: 100%;
		background-image: linear-gradient(
			0deg,
			transparent 0%,
			rgba(32, 128, 32, 0.2) 2%,
			rgba(32, 128, 32, 0.8) 3%,
			rgba(32, 128, 32, 0.2) 3%,
			transparent 100%);
		background-repeat: no-repeat;
		animation: scan 7.5s linear 0s infinite;
	}

	@keyframes scan {
		0%        { background-position: 0 -100vh; }
		35%, 100% { background-position: 0 100vh; }
	}

	.terminal {
		box-sizing: inherit;
		position: absolute;
		height: 100%;
		width: 1000px;
		max-width: 100%;
		padding: 4rem;
		text-transform: uppercase;
	}

	.output {
		color: rgba(128, 255, 128, 0.8);
		text-shadow:
		0 0 1px rgba(51, 255, 51, 0.4),
		0 0 2px rgba(255, 255, 255, 0.8);
	}

	/*.output::before {
		content: "> ";
	}*/

/*
.input {
  color: rgba(192, 255, 192, 0.8);
  text-shadow:
      0 0 1px rgba(51, 255, 51, 0.4),
      0 0 2px rgba(255, 255, 255, 0.8);
}

.input::before {
  content: "$ ";
}
*/

a {
	color: #fff;
	text-decoration: none;
}

a::before {
	content: "[";
}

a::after {
	content: "]";
}

.errorcode {
	color: white;
}
</style>
</head>
<body>
	<?php 

	$ip='36.82.234.107';//$_SERVER['REMOTE_ADDR'];
	$location=json_decode(file_get_contents("http://ipinfo.io/{$ip}/json"))?json_decode(file_get_contents("http://ipinfo.io/{$ip}/json")):json_decode('{"ip":" Not Found ","city":" Not Found ","region":" Not Found ","country":" Not Found ","loc":" Not Found ","org":" Not Found "} ');
	// print_r($location);// $location;
	

	?>
	<div class="overlay"></div>
	<div class="terminal">
		<h1>Error <span class="errorcode"><?php echo $heading ?></span></h1>
		<p class="output"><?php echo $message ?></p>
			<p class="output">Your IP Address : <span class="errorcode"><?php echo $location->ip; ?></span></p>
			<p class="output">Your Address : <span class="errorcode"><?php echo $location->city; ?></span></p>
			<p class="output">Your Region : <span class="errorcode"><?php echo $location->region; ?></span></p>
			<p class="output">Your Country : <span class="errorcode"><?php echo $location->country; ?></span></p>
			<p class="output">Your LOC : <span class="errorcode"><a href="https://www.google.com/maps/@<?php echo $location->loc; ?>,16z"> View In Google Maps</a></span></p>
			<p class="output">Your ISP : <span class="errorcode"><?php echo $location->org; ?></span></p>
		</div>
	</body>
	</html>