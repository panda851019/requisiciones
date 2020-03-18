<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<title>holi</title>
</head>
<body style="background-color: #FFFFFF ">

<!--Copia desde aquí-->
<table style="max-width: 600px; padding: 10px; margin:0 auto; border-collapse: collapse;">
	<tr>
		<td style="background-color: #FFFFFF; text-align: left; padding: 0">
			<a href="http://10.1.21.53/requisiciones/public/index.php">
				<img src="https://innovacion.finanzas.cdmx.gob.mx/sinpapel/imagenes/Logo_Generico.png" alt="Logo CDMX" width="70%" style="display:block; margin: 1.5% 3%">
			</a>
		</td>
	</tr>

	<tr>
		<td style="background-color: #FFFFFF">
			<div style="color: #34495e; margin: 4% 10% 2%; text-align: justify;font-family: sans-serif">
				<h2 style="color: #008F39; margin: 0 0 7px"style="text-transform:uppercase;">¡Administrador!</h2>
				<p style="margin: 2px; font-size: 15px">
					<br><br>En este momento yo, {!!strtoupper($array['nombre'])!!} {!!strtoupper($array['apaterno'])!!} {!!strtoupper($array['amaterno'])!!} me acabo de registrar, para comenzar a utilizar el sistema de Requisiciones del <strong>Gobierno de la Ciudad de México.</strong><br><br>
					<p style="margin: 2px; font-size: 15px">
					Mi información es la siguiente:

					<table width="100%" border="1">
			            <tr>
			            <td width="25%"><strong><center>NOMBRE COMPLETO</strong></td>
			            <td width="25%"><strong><center>EMAIL</strong></td>
			            <td width="25%"><strong><center>RFC</strong></td>
			            <td width="25%"><strong><center>AREA</strong></td>


			          </tr>

			          <tr width="100%">
			            <td><center>{!!strtoupper($array['nombre'])!!} {!!strtoupper($array['apaterno'])!!} {!!strtoupper($array['amaterno'])!!}</td>
			            <td><center>{!!$array['email']!!}</td>
			            <td><center>{!!strtoupper($array['rfc'])!!}</td>
			            <td><center>{!!$array['area']!!}</td>
			          </tr>

			        </table>
					<br>
				<p style="margin: 2px; font-size: 15px">
					Gracias por tu atención, saludos coordiales.<br><br>
				<div style="width: 100%;margin:20px 0; display: inline-block;text-align: center">
					<img style="padding: 0; width: 50px; margin: 5px" src="https://turismo.cdmx.gob.mx/storage/app/media/IMG_2019/logo_gobierno.png">
				</div>
				<div style="width: 100%; text-align: center">
					<a style="text-decoration: none; border-radius: 5px; padding: 11px 23px; color: white; background-color: #008F39" href="http://10.1.21.53/requisiciones/public/index.php">Ir a la página</a>
				</div>
				<p style="color: #b3b3b3; font-size: 12px; text-align: center;margin: 30px 0 0">© 2020 | Gobierno de la Ciudad de México</p>
			</div>
		</td>
	</tr>
</table>
<!--hasta aquí-->

</body>
</html>