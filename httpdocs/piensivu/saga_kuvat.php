<!--Kotisivut Riikka/Hevoset, draft 1; /piensivu/saga_kuvat.php-->

<?php $rel = "../"; ?>


<html>
<head>

<?php include $rel."skeleton/metas.php" ?>

<title>
	Kuvia: Saga
</title>

<?php include $rel."skeleton/styles.php" ?>

</head>


<body>
<?php include $rel."skeleton/header.php" ?>

<div class="nav">
		<?php
			createLink("punainen", 	"../?s=5db6#otsikko1", 	"", 				"Takaisin"		);
			createLink("s_sininen", "./", 									"thispage", "Kuvia: Saga"	);
		?>
		
	<hr class="header" id="">
</div>
<div class="content"><br>
	<h2>Kouluratsastuskuvia</h2><br>
	<div class="img_legacy"><img class="content" src="http://s25.postimg.org/e25991kzz/Kouluratsastus1.jpg"> <img class="content" src="http://s25.postimg.org/q2qp9rsen/Kouluratsastus2.jpg"></div><br>

	<h2>Maastoestekuvia</h2><br>
	<div class="img_legacy"><img class="content" src="http://s25.postimg.org/tvet38xan/Maastoeste_R1_I3.jpg"> <img class="content" src="http://s25.postimg.org/tjxcqhgun/Maastoeste_R2_I3.jpg"></div><br>
	<div class="img_legacy"><img class="content" src="http://s25.postimg.org/nzkvfuhzj/Maastoeste_R1_I2.jpg"> <img class="content" src="http://s25.postimg.org/vea7883v3/Maastoeste_R2_I1.jpg"> <img class="content" src="http://s25.postimg.org/nk9lmtw27/Maastoeste_R2_I2.jpg"></div><br>
	<div class="img_legacy"><img class="content" src="http://s25.postimg.org/4lk1g5qj3/Maastoeste_R3_I1.jpg"> <img class="content" src="http://s25.postimg.org/mykmqq0zz/Maastoeste_R3_I2.jpg"> <img class="content" src="http://s25.postimg.org/mabs7s2a7/Maastoeste_R3_I3.jpg"></div><br>
	<div class="img_legacy"><img class="content" src="http://i.imgur.com/IQ7yoHy.jpg"> <img class="content" src="http://i.imgur.com/fh2pgfr.jpg"> <img class="content" src="http://i.imgur.com/Ibtg6BU.jpg"></div>
</div>
<?php include $rel."skeleton/footer.php" ?>
</body>
<html>
