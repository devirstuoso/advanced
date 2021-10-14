<?php
	use yii\helpers\Html;
?>
<div style="display: inline-block;">
<?= Html::beginForm(['logout'], 'post') ?>
	<?= Html::submitButton('Logout', ['class' => 'btn logout']) ?>
<?= Html::endForm(); ?>
</div>

<!-- <div class="container"> -->
	<div class="row">
		<div class="col-sm-4 bg-red">
			<h2>Name: <?= $user->username; ?></h2>
		</div>
		<div class="col-sm-4 bg-blue">
			<h2>Email: <?= $user->email; ?></h2>
		</div>
		<div class="col-sm-4 bg-green">
			
		</div>
	</div>
	<div class="row">
		<div class="col bg-pink">
		</div>
	</div>
<!-- </div> -->


<?php

$css = <<<CS
	.bg-red {
		background: red;
		min-height : 30vh;
	}
	.bg-blue {
		background: blue;
		min-height : 30vh;
	}
	.bg-green {
		background: green;
		min-height : 30vh;
	}
	.bg-pink {
		background: pink;
		min-height : 30vh;

	}
CS;

$this->registerCss($css);
?>