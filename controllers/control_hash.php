<?php
	include_once('../models/model_recuperacao.php');

	Model_recuperacao::gerarhash($_POST['email']);
?>
