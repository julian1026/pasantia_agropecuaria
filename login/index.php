<?php
session_start();
if(isset($_SESSION['S_iduser'])){
	header('location: ../View/index.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login V14</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">		
			<!-- <h3 class="h3 left-0">Gestion Agricola Del Patia</h3> -->
			<div class="wrap-login100 p-l-85 p-r-85 p-t-55 p-b-55">
				
					<span class="login100-form-title p-b-32">
						Iniciar Sesi&Oacute;n
					</span>

					<span class="txt1 p-b-11">
						Usuario
					</span>
					<div class="wrap-input100 validate-input m-b-36" data-validate = "Usuario requerido">
						<input class="input100" type="text" name="usuario" id='txt_usu' placeholder="escriba usuario" >
						<span class="focus-input100"></span>
					</div>
					
					<span class="txt1 p-b-11">
						Contrase&ntilde;a
					</span>
					<div class="wrap-input100 validate-input m-b-12" data-validate = "Contrasena requerida">
						<span class="btn-show-pass">
							<i class="fa fa-eye"></i>
						</span>
						<input class="input100" type="password" name="contrasena" id='txt_con' placeholder="escriba la contrase&ntilde;a"  >
						<span class="focus-input100"></span>
					</div>
					
					<div class="flex-sb-m w-full p-b-48">
						<div class="contact100-form-checkbox">
							<input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me" >
							<label class="label-checkbox100" for="ckb1">
								Recordar
							</label>
						</div>

						<div>
							<a href="#" class="txt3">
								Se te olvido la contrase&ntilde;a?
							</a>
						</div>
					</div>

					<div class="container-login100-form-btn">
						<button class="login100-form-btn" onclick='verificarUsuario();' >
							Ingresar
						</button>
					</div>

			
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>
	


	<script src="vendor/sweetalert2/sweetalert2.js"></script>
<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>
	<script src="../js/usuarios.js" ></script>

	<!-- <script>
		Swal.fire({
		icon: 'error',
		title: 'Oops...',
		text: 'Something went wrong!',
		footer: '<a href>Why do I have this issue?</a>'
		})
	</script> -->

</body>
</html>