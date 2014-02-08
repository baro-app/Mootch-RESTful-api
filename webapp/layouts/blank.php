<html>
<head>
<?php if($js) echo $js."\n"; ?>
<?php if($css) echo $css."\n"; ?>
<title><?php echo $title; ?></title>
<link rel="icon" type="image/ico" href="/images/favicon.ico">

<link rel="stylesheet" type="text/css" href="/css/blastoff.css">
<link rel="stylesheet" type="text/css" href="http://code.jquery.com/ui/1.10.3/themes/cupertino/jquery-ui.css">
<link href='http://fonts.googleapis.com/css?family=Roboto+Condensed' rel='stylesheet' type='text/css'><!-- <link rel="stylesheet" type="text/css" href="/css/bootstrap.min.css"> -->
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script type="text/javascript" src="http://malsup.github.io/min/jquery.form.min.js"></script>
<script type="text/javascript" src="/js/global.js"></script>
<script type="text/javascript" src="https://js.stripe.com/v2/"></script>
<script type="text/javascript" src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
<script type="text/javascript" src="/js/datetimepicker.js"></script>
<script type="text/javascript" src="/js/blastoff.js"></script>

<script>
</script>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>

<?php echo $content."\n"; ?>

<!--footer>
	<div class="foot-container">
		<img src="/images/google.png" style="width:90px;position:relative;top:6px;">
		<img src="/images/icloud.png">
		<img src="/images/csv.png" style="width:90px;position:relative;top:5px;">
	</div>
</footer-->
</body>
</html>
