<?php

//$_SESSION['NOME'];
//$_SESSION['ID'];
//include "buscaperguntas.php";

?>
<html lang="pt-br">
<body>	  
	<!--CONTEÚDO DA PÁGINA-->
	<div class="row">
		<div class="container col-md-12">			
			<div id="pergunta1" style="display: show">
				<div class="row">
					<div class="col-md-9">
						<?php echo perguntas[0]['perguntas'];?>
						<label class="radio-inline"><input type="radio" name="optradio" value="<?php echo $alternativas[0][0]['respostas'];?>">A - <?php echo $alternativas[0][0]['respostas'];?></label>
						<label class="radio-inline"><input type="radio" name="optradio" value="<?php echo $alternativas[0][1]['respostas'];?>">B - <?php echo $alternativas[0][1]['respostas'];?></label>
						<label class="radio-inline"><input type="radio" name="optradio" value="<?php echo $alternativas[0][2]['respostas'];?>">C - <?php echo $alternativas[0][2]['respostas'];?></label>
						<label class="radio-inline"><input type="radio" name="optradio" value="<?php echo $alternativas[0][3]['respostas'];?>">D - <?php echo $alternativas[0][3]['respostas'];?></label>
						<label class="radio-inline"><input type="radio" name="optradio" value="<?php echo $alternativas[0][4]['respostas'];?>">E - <?php echo $alternativas[0][4]['respostas'];?></label>						
					</div>
					<div class="col-md-3">
						<input type="button" class="btn btn-primary" value="PRÓXIMA" id="mostrar2">
					</div>					
				</div>
			</div>
			<div id="pergunta2" style="display: none">
				<div class="row">
					<div class="col-md-9">
						<?php echo $perguntas[1]['perguntas'];?>
						<label class="radio-inline"><input type="radio" name="optradio" value="<?php echo $alternativas[1][0]['respostas'];?>">A - <?php echo $alternativas[1][0]['respostas'];?></label>
						<label class="radio-inline"><input type="radio" name="optradio" value="<?php echo $alternativas[0][1]['respostas'];?>">B - <?php echo $alternativas[1][1]['respostas'];?></label>
						<label class="radio-inline"><input type="radio" name="optradio" value="<?php echo $alternativas[0][2]['respostas'];?>">C - <?php echo $alternativas[1][2]['respostas'];?></label>
						<label class="radio-inline"><input type="radio" name="optradio" value="<?php echo $alternativas[0][3]['respostas'];?>">D - <?php echo $alternativas[1][3]['respostas'];?></label>
						<label class="radio-inline"><input type="radio" name="optradio" value="<?php echo $alternativas[0][4]['respostas'];?>">E - <?php echo $alternativas[1][4]['respostas'];?></label>
					</div>
					<div class="col-md-3">
						<input type="button" class="btn btn-primary" value="PRÓXIMA" id="mostrar3">
					</div>					
				</div>
			</div>
			<div id="pergunta3" style="display: none">
				<div class="row">
					<div class="col-md-9">
						<?php echo $perguntas[2]['perguntas'];?>
						<label class="radio-inline"><input type="radio" name="optradio" value="<?php echo $alternativas[2][0]['respostas'];?>">A - <?php echo $alternativas[2][0]['respostas'];?></label>
						<label class="radio-inline"><input type="radio" name="optradio" value="<?php echo $alternativas[2][1]['respostas'];?>">B - <?php echo $alternativas[2][1]['respostas'];?></label>
						<label class="radio-inline"><input type="radio" name="optradio" value="<?php echo $alternativas[2][2]['respostas'];?>">C - <?php echo $alternativas[2][2]['respostas'];?></label>
						<label class="radio-inline"><input type="radio" name="optradio" value="<?php echo $alternativas[2][3]['respostas'];?>">D - <?php echo $alternativas[2][3]['respostas'];?></label>
						<label class="radio-inline"><input type="radio" name="optradio" value="<?php echo $alternativas[2][4]['respostas'];?>">E - <?php echo $alternativas[2][4]['respostas'];?></label>
					</div>
					<div class="col-md-3">
						<input type="button" class="btn btn-primary" value="PRÓXIMA" id="mostrar4">
					</div>					
				</div>
			</div>
			<div id="pergunta4" style="display: none">
				<div class="row">
					<div class="col-md-9">
						<?php echo $perguntas[3]['perguntas'];?>
						<label class="radio-inline"><input type="radio" name="optradio" value="<?php echo $alternativas[3][0]['respostas'];?>">A - <?php echo $alternativas[3][0]['respostas'];?></label>
						<label class="radio-inline"><input type="radio" name="optradio" value="<?php echo $alternativas[3][1]['respostas'];?>">B - <?php echo $alternativas[3][1]['respostas'];?></label>
						<label class="radio-inline"><input type="radio" name="optradio" value="<?php echo $alternativas[3][2]['respostas'];?>">C - <?php echo $alternativas[3][2]['respostas'];?></label>
						<label class="radio-inline"><input type="radio" name="optradio" value="<?php echo $alternativas[3][3]['respostas'];?>">D - <?php echo $alternativas[3][3]['respostas'];?></label>
						<label class="radio-inline"><input type="radio" name="optradio" value="<?php echo $alternativas[3][4]['respostas'];?>">E - <?php echo $alternativas[3][4]['respostas'];?></label>
					</div>
					<div class="col-md-3">
						<input type="button" class="btn btn-primary" value="PRÓXIMA" id="mostrar5">
					</div>					
				</div>
			</div>
			<div id="pergunta5" style="display: none">
				<div class="row">
					<div class="col-md-9">
						<?php echo $perguntas[4]['perguntas'];?>
						<label class="radio-inline"><input type="radio" name="optradio" value="<?php echo $alternativas[4][0]['respostas'];?>">A - <?php echo $alternativas[4][0]['respostas'];?></label>
						<label class="radio-inline"><input type="radio" name="optradio" value="<?php echo $alternativas[4][1]['respostas'];?>">B - <?php echo $alternativas[4][1]['respostas'];?></label>
						<label class="radio-inline"><input type="radio" name="optradio" value="<?php echo $alternativas[4][2]['respostas'];?>">C - <?php echo $alternativas[4][2]['respostas'];?></label>
						<label class="radio-inline"><input type="radio" name="optradio" value="<?php echo $alternativas[4][3]['respostas'];?>">D - <?php echo $alternativas[4][3]['respostas'];?></label>
						<label class="radio-inline"><input type="radio" name="optradio" value="<?php echo $alternativas[4][4]['respostas'];?>">E - <?php echo $alternativas[4][4]['respostas'];?></label>
					</div>
					<div class="col-md-3">
						<input type="button" class="btn btn-danger" value="CONFERIR" id="conferir">
					</div>					
				</div>
			</div>
		</div>		
	</div>
	<!--FIM DO CONTEÚDO-->
		<!--..............REVER O CONTEÚDO DAS MATRIZES.....................-->
	<!--CHAMADA DOS SCRIPTS-->
	<script src="../../assets/bootstrap/js/jquery-3.2.1.js"></script>
    <script src="../../assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="../../assets/bootstrap/js/main.js"></script>
	<script src="../../assets/sweetalert/dist/sweetalert.min.js"></script>
	<script src="teste.js"></script>
	<script src="trocaperguntas.js"></script>
</body>
</html>