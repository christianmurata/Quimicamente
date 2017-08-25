<nav class="navbar navbar-default navbar-fixed-top" style="background-color: #ccc">        
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#"><img src="../imagens/logoQuim.png" width="200px"></a>
        </div>
		
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right" style="padding-right:10px;">
                <li class="active trap"><a href="#">Curso</a></li>
				<li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Menu<span class="caret"></span></a>
					<ul class="dropdown-menu">
						<li><a href="sala.php"><span class="glyphicon glyphicon-blackboard"></span>     Sala</a></li>
						<li><a href="#"><span class="glyphicon glyphicon-user"></span>     Perfil</a></li>
						<li><a href="#"><span class="glyphicon glyphicon-edit"></span>     Curso</a></li>
						<li><a href="#"><span class="glyphicon glyphicon-time"></span>     Competir</a></li>
						<li><a href="#"><span class="glyphicon glyphicon-cog"></span>     Sobre</a></li>
						<li><a href="#"><span class="glyphicon glyphicon-log-out"></span>     Sair</a></li>
					</ul>
				</li>
				<li class="trap"><a href="#">Sobre</a></li>
				<li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-user"></span><span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="#"><span class="glyphicon glyphicon-wrench"></span>     Editar perfil</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="#"><span class="glyphicon glyphicon-log-out"></span>     Sair</a></li>
                    </ul>
                </li>
            </ul>
        </div>
</nav>
<script>
    $(document).ready(function() {
        $('li.trap').click(function (e) {
            e.preventDefault();
            $('li.trap').removeClass('active');
            $(this).addClass('active');
        });
        /* javascript para navegação assíncrona */
        function carregar(pagina, t){
            $("#container").load(pagina);
            document.title = t;
        }
    });
</script>