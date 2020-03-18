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
				<h2 style="color: #008F39; margin: 0 0 7px">{!!$data['name']!!}</h2>
				<p style="margin: 2px; font-size: 15px">
					En este momento se acaba de liberar una nueva requisicion del <strong>Gobierno de la Ciudad de México.</strong><br><br>
					Te invitamos a ingresar a la pagina de Requisiciones del Gobierno de la Ciudad de México; para realizar tu cotizacion sobre los productos, bienes y/o servicios que solicitamos.<br><br>
					<p style="margin: 2px; font-size: 15px">
					Requerimos un
						@if($requisicion[0]->tipo_req === 1)
							<strong>BIEN</strong>
					@elseif($requisicion[0]->tipo_req === 2)
							<strong>SERVICIO</strong>
					@elseif($requisicion[0]->tipo_req === 3)
							<strong>ARRENDAMIENTO</strong>
					@endif<br>

					<table width="100%" border="1">
			            <tr>
			            <td width="15%"><strong><center>ID</strong></td>
			            <td width="40%"><strong><center>DESCRIPCION DE LOS BIENES, SERVICIOS O ARRENDAMIENTO</strong></td>
			            <td width="40%"><strong><center>CARACTERISTICAS PARTICULARES</strong></td>
			            <td width="15%"><strong><center>CANTIDAD</strong></td>
			            <td width="15%"><strong><center>UNIDAD DE MEDIDA</strong></td>

			          </tr>
			          @foreach($requisicion as $value)
			          <tr width="100%">
			            <td><center>{{$value->id_req_bien}}</td>
			            <td><center>{{$value->ct_descripcion}}</td>
			            <td><center>{{$value->caracteristicas}}</td>
			            <td><center>{{$value->cantidad}}</td>
			            <td><center>{{$value->uni_des}}</td>
			            @if(!empty($value->cant_min) && !empty($value->cant_max))
			            <td><center>{{$value->cant_min}}</td>
			            <td><center>{{$value->cant_max}}</td>
			            @endif
			            @if(!empty($value->precio_min) && !empty($value->precio_max))
			        	<td><center>{{money_format('%.2n',$value->precio_min)}}</td>
			            <td><center>{{money_format('%.2n',$value->precio_max)}}</td>
			            @endif
			          </tr>
			          @endforeach
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