<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>404 Error | Quimicamente</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="../css/style.css"/>
	<link rel="stylesheet" href="../css/css_sobre.css"/>
	<link rel="stylesheet" href="../assets/bootstrap/css/bootstrap2.css">
	<link rel="stylesheet" href="../assets/font-awesome/css/font-awesome.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script src="../js/java.js"></script>
	<link rel="shortcut icon" href="../imagens/logo.ico">
   
</head>
<body>
<script src="http://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script> 
<div id="particles-js">
<div class="page-404">
    <div class="outer">
        <div class="middle">
            <div class="inner">
                <center><a href="#"><img src="../imagens/logo.png"/></a> </center>
                <span class="inner-status">Oops!</span><br>
                <span class="inner-detail" style="color:#f6f6f6;">
<?php
                	if(isset($mensagem)){
?>
                    	<p class="white-color"><?php echo $mensagem ?><p>
<?php 				
					}else{
?>
						<p class="white-color">A página não foi encontrada<p>
<?php
					}

?>                </span>
            </div>
        </div>
    </div>
    <div class="outer">
        <div class="page-button">
            <input type="button" href="/index" class="special big total" value="Ir para página inicial"/>
        </div>
    </div>
</div>
</div>

<script src="http://netdna.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script type="text/javascript">
	
particlesJS("particles-js", {
    "particles": {
		"number": {
			"value": 80,
			"density": {
				"enable": true,
				"value_area": 800
			}
		},
		"color": {
			"value": "#4fffbc"
		},
		"shape": {
			"type": "circle",
			"stroke": {
				"width": 0,
				"color": "#fff"
			},
			"polygon": {
				"nb_sides": 5
			},
			"image": {
				"src": "img/github.svg",
				"width": 100,
				"height": 100
			}
		},
		"opacity": {
			"value": 0.5,
			"random": false,
			"anim": {
				"enable": false,
				"speed": 1,
				"opacity_min": 0.1,
				"sync": false
			}
		},
		"size": {
			"value": 3,
			"random": true,
			"anim": {
				"enable": false,
				"speed": 40,
				"size_min": 0.1,
				"sync": false
			}
		},
		"line_linked": {
			"enable": true,
			"distance": 150,
			"color": "#4fffbc",
			"opacity": 0.4,
			"width": 1
		},
		"move": {
			"enable": true,
			"speed": 6,
			"direction": "none",
			"random": false,
			"straight": false,
			"out_mode": "out",
			"bounce": false,
			"attract": {
				"enable": false,
				"rotateX": 600,
				"rotateY": 1200
			}
		}
	},
	"interactivity": {
		"detect_on": "canvas",
		"events": {
			"onhover": {
				"enable": true,
				"mode": "grab"
			},
			"onclick": {
				"enable": true,
				"mode": "push"
			},
			"resize": true
		},
		"modes": {
			"grab": {
				"distance": 140,
				"line_linked": {
					"opacity": 1
				}
			},
			"bubble": {
				"distance": 400,
				"size": 40,
				"duration": 2,
				"opacity": 8,
				"speed": 3
			},
			"repulse": {
				"distance": 200,
				"duration": 0.4
			},
			"push": {
				"particles_nb": 4
			},
			"remove": {
				"particles_nb": 2
			}
		}
	},
	"retina_detect": true
});
</script>

<?php include 'templates/footer.php'; ?>

</body>
</html>