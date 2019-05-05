<?php
session_start();
require_once("../../classes/control/ConexaoControl/RegistroConexao.php");
require_once("../../classes/model/Cliente.php");
require_once("../../classes/control/ClienteControl/ConsultaCliente.php");
require_once("../../classes/control/ClienteControl/CadastroCliente.php");
require_once("../../classes/control/ConexaoControl/Conexao.php");
$registrodeconexao = RegistroConexao::getInstancia();
$registrodeconexao->set('Connection', $conn);
if ($_SESSION['logado'] != 1) {
    ?>
    <script type="text/javascript">
        document.location.href = "../../index.php?erro=1";
    </script>
    <?php
} else {
    ?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
	    <meta charset="UTF-8">
	    <title>.::CooperTomate::.</title>
	    <link rel="stylesheet" type="text/css" href="css/style.css" media="all" />
			<!-- Bootstrap core CSS -->
			<link href="../../dist/css/bootstrap.min.css" rel="stylesheet">
			<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
			<link href="../../assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">
			<!-- Custom styles for this template -->
			<link href="../../assets/css/painel.css" rel="stylesheet">
			<!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
			<!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
			<script src="../../assets/js/ie-emulation-modes-warning.js"></script>
			<link href="../../asset/css/themify-icons.css" rel="stylesheet">
	    <link rel="shortcut icon" href="../../img/logo2.png" />
    </head>
    <body>
			<nav class="navbar navbar-inverse">
			  <div class="container-fluid">
				<div class="navbar-header">
				  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				  </button>
				  <a class="navbar-brand" href="#"></a>
				</div>
				<div class="collapse navbar-collapse" id="myNavbar">
				  <ul class="nav navbar-nav">
					<li><a href="listaprodutor.php" class="colorwhite">Produtor</a></li>
					<li><a href="../fazenda/listafazenda.php" class="colorwhite">Fazendas</a></li>
					<li><a href="../cliente/listacliente.php" class="colorwhite">Cadastro clientes</a></li>
					<li><a href="" class="colorwhite">Cadastro Lotes</a></li>
				  </ul>
				  <ul class="nav navbar-nav navbar-right">
					<li><a href="#"><span class="glyphicon glyphicon-user"></span></a></li>
					<li><a href="?acao=sair"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
				  </ul>
				</div>
			  </div>
			</nav>
      <div class="container">
				<h3 class="page-header">Cadastro de Cliente</h3>
				<form method="post" class="form-signin-fluid" name="frmLogin">
					<div class="form-row col-md-12">
						<div class="form-group col-md-6">
							<label for="inputPassword4">Cliente</label>
							<input type="text" name="cliente" class="form-control" placeholder="Cliente" required>
						</div>
					</div>
					<div class="form-row col-md-12">
						<div class="form-group col-md-3">
							<label for="inputPassword4">CNPJ</label>
							<input type="text" name="cnpj" class="form-control" placeholder="00000000000000" pattern="[0-9]+$" maxlength="14" required>
						</div>
						<div class="form-group col-md-3">
							<label for="inputPassword4">IE</label>
							<input type="text" name="ie" class="form-control" placeholder="00000000" pattern="[0-9]+$" maxlength="8" required>
						</div>
					</div>
					<div class="form-row col-md-12">
						<div class="form-group col-md-4">
							<label for="inputAddress">Endreço</label>
							<input type="text" name="endereco" class="form-control" placeholder="Rodovia BR 050" required>
						</div>
						<div class="form-group col-md-2">
							<label for="inputCity">Número</label>
							<input type="text" name="numero" class="form-control" placeholder="0000" required>
						</div>
						<div class="form-group col-md-2">
							<label for="inputCity">Bairro</label>
							<input type="text" name="bairro" class="form-control" placeholder="Floresta" required>
						</div>
						<div class="form-group col-md-2">
							<label for="inputCity">Complemento</label>
							<input type="text" name="complemento" class="form-control" placeholder="Apartamento" required>
						</div>
					</div>
					<div class="form-row col-md-12">
						<div class="form-group col-md-2">
							<label for="inputCity">Cidade</label>
							<input type="text" name="cidade" class="form-control" placeholder="Araguari" required>
						</div>
						<div class="form-group col-md-3">
							<label for="inputState">Estado</label>
							<select name="estado" class="form-control" required>
								<option selected>Selecione um estado...</option>
								<option>Acre</option>
								<option>Alagoas</option>
								<option>Amapá</option>
								<option>Amazonas</option>
								<option>Bahia</option>
								<option>Ceará</option>
								<option>Distrito Federal</option>
								<option>Espírito Santo</option>
								<option>Goiás</option>
								<option>Maranhão</option>
								<option>Mato Grosso</option>
								<option>Mato Grosso do Sul</option>
								<option>Minas Gerais</option>
								<option>Pará</option>
								<option>Paraíba</option>
								<option>Paraná</option>
								<option>Pernambuco</option>
								<option>Piauí</option>
								<option>Rio de Janeiro</option>
								<option>Rio Grande do Norte</option>
								<option>Rio Grande do Sul</option>
								<option>Rondônia</option>
								<option>Roraima</option>
								<option>Santa Catarina</option>
								<option>São Paulo</option>
								<option>Sergipe</option>
								<option>Tocantins</option>
							</select>
						</div>
						<div class="form-group col-md-3">
							<label for="inputZip">CEP</label>
							<input type="text" name="cep" class="form-control" placeholder="38443020" pattern="[0-9]+$" maxlength="8" required>
						</div>
					</div>
					<div class="form-row col-md-12">
						<div class="form-group col-md-3">
							<label for="inputZip">Email</label>
							<input type="text" name="email" class="form-control" placeholder="a@email.com" required>
						</div>
						<div class="form-group col-md-3">
							<label for="inputZip">Telefone</label>
							<input type="text" name="telefone" class="form-control" placeholder="0000000000" pattern="[0-9]+$" maxlength="11" required>
						</div>
					</div>
					<div class="form-row col-md-12">
						<div class="form-group col-md-3">
							<label for="inputZip">Latitude</label>
							<input type="text" name="latitude" class="form-control" placeholder="-18.646" pattern="([-0-9]+\.)[\d.]*" required>
						</div>
						<div class="form-group col-md-3">
							<label for="inputZip">Longitude</label>
							<input type="text" name="longitude" class="form-control" placeholder="-48.1938" pattern="([-0-9]+\.)[\d.]*" required>
						</div>
					</div>
					<div class="form-row col-md-12">
						<div class="nav navbar-nav navbar-right">
							<input type="submit" name="btnSubmit" value="Cadastrar" class="btn btn-danger"/> <td><a href="listacliente.php"  class="btn btn-default">Voltar</a></td>
						</div>
						<h3 class="page-header"></h3>
					</div>
				</form>
		</div>
		<footer class="footer">
				<p><center>&copy; CooperTomate.</center></p>
		</footer>

		<!-- Bootstrap core JavaScript
		================================================== -->
		<!-- Placed at the end of the document so the pages load faster -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
		<script>window.jQuery || document.write('<script src="assets/js/vendor/jquery.min.js"><\/script>')</script>
		<script src="dist/js/bootstrap.min.js"></script>
		<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
		<script src="assets/js/ie10-viewport-bug-workaround.js"></script>
    </body>
</html>
<?php
if (isset($_POST['btnSubmit'])) {
	//classe responsável por setar valores da entidade cliente
	$cliente = new Cliente();
	$cliente->setCliente($_POST['cliente']);
	$cliente->setCnpj($_POST['cnpj']);
	$cliente->setIe($_POST['ie']);
	$cliente->setEndereco($_POST['endereco']);
	$cliente->setNumero($_POST['numero']);
	$cliente->setBairro($_POST['bairro']);
	$cliente->setComplemento($_POST['complemento']);
	$cliente->setCidade($_POST['cidade']);
	$cliente->setEstado($_POST['estado']);
	$cliente->setCep($_POST['cep']);
	$cliente->setEmail($_POST['email']);
	$cliente->setTelefone($_POST['telefone']);
	$cliente->setLatitude($_POST['latitude']);
	$cliente->setLongitude($_POST['longitude']);
	//classe responsável por consultar se cliente existe ou não
		$consultacliente = new ConsultaCliente();
			if (!$consultacliente->consultarCliente($_POST['cnpj'])){
					//classe responsável por cadastrar cliente novo
					$cadastracliente = new CadastroCliente($cliente);
					$cadastracliente->cadastrarCliente();
		} else {
?>
<script>
	alert("Cliente já cadastrada.");
</script>
<?php
	}
}
		if (isset($_GET["acao"])) {

	    if ($_GET["acao"] == "sair") {
	        $_SESSION['logado'] = 0;
	        ?>
	        <script type="text/javascript">
	            document.location.href = "../../index.php?erro=2";
	        </script>
      <?php
    }
	}
}
?>
