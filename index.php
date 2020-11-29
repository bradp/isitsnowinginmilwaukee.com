<?php

/**
 * Get a random value from an array.
 *
 * @param array $choices
 *
 * @return mixed Value of random array key.
 */
function get_random( $choices ) {
	return $choices[ array_rand( $choices, 1 ) ];
}

/**
 * Return a text string depending on weather or not it is snowing.
 *
 * @return string Yeah/Naw
 */
function is_it_snowing() {
	$app_id  = file_get_contents( '../.env' );
	$weather = json_decode( file_get_contents( 'https://api.openweathermap.org/data/2.5/weather?q=milwaukee&units=imperial&APPID=' . $app_id ), true );

	if ( isset( $weather['snow'] ) ) {
		return get_random( [ 'Yup.', 'Yeah.', 'Yah.', 'Yes.' ] ) . '<p>Looks like some ' . lcfirst( $weather['weather']['description'] );
	}

	return get_random( [ 'Nope.', 'No.', 'Naw.' ] );
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">

	<title>Is it snowing in Milwaukee?</title>

	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link rel="shortcut icon" href="icon.png">

	<meta name="description" content="Easily check if it is snowing in Milwaukee, WI.">
	<meta name="generator" content="isitsnowinginmilwaukee">
	<meta property="og:url" content="https://isitsnowinginmilwaukee.com">
	<meta property="og:type" content="website">
	<meta property="og:title" content="Is it snowing in Milwaukee?">
	<meta property="og:description" content="Easily check if it is snowing in Milwaukee, WI.">
	<meta property="og:site_name" content="Is it snowing in Milwaukee?">
	<meta property="og:locale" content="en_US">
	<meta property="og:image" content="http://isitsnowinginmilwaukee.com/icon.png">

	<meta name="twitter:card" content="summary">
	<meta name="twitter:site" content="@bradparbs">
	<meta name="twitter:creator" content="@bradparbs">
	<meta name="twitter:url" content="https://isitsnowinginmilwaukee.com">
	<meta name="twitter:title" content="Is it snowing in Milwaukee?">
	<meta name="twitter:description" content="Easily check if it is snowing in Milwaukee, WI.">
	<meta name="twitter:image" content="http://isitsnowinginmilwaukee.com/icon.png">

	<style>
		html, body {
			font-family: "HelveticaNeue-Light", "Helvetica Neue Light", "Helvetica Neue", Helvetica, Arial, "Lucida Grande", sans-serif;
  			background: #f2f2f2;
		}

		main {
			min-height: 60vh;
			display: flex;
			justify-content: center;
			align-items: center;
		}

		div {
  			text-align: center;
  			font-size: 60px;
		}

		p {
			font-size: 20px;
   			margin-top: 20px;
		}

		a {
			position: absolute;
			right: 0;
			bottom: 0;
			color: grey;
   			text-decoration: none;
			font-size: 20px;
			padding: 15px;
		}
	</style>
</head>
<body>
	<main><div><?php echo is_it_snowing(); ?></div><main>
	<a href="http://bradparbs.com" class="credits">a brad parbs thing</a>
	<!-- https://github.com/bradp/isitsnowinginmilwaukee -->
</body>
