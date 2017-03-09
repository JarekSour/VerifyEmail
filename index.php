<!DOCTYPE html>
<html lang="en">
<head>
  <title>Validador de correos : InboxShot</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script type="text/javascript" src="js/bootstrap-filestyle.min.js"> </script>
  <link rel="stylesheet" href="css/stylePieChar.css">
  <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
	<script src="js/jquery.easypiechart.min.js"></script>
  <style>
  	button[name="btnStart"] {
    	margin-top:30px;
	} 
	table{
		margin-top:30px;
	}
	.white{
		color:#FFF;
	}
	.bb-alert{
		position: fixed;
		bottom: 25%;
		right: 0;
		margin-bottom: 0;
		font-size: 1.2em;
		padding: 1em 1.3em;
		z-index: 2000;
	}
	.alert{
		margin-top:80px;
		}
  </style>
  <script>
	$(function() {
		$('.chart1').easyPieChart({
			easing: 'easeOutBounce',
			scaleLength:11,
        	size:140,
			lineWidth:18,
			lineCap: 'butt',
        	barColor:'#4FCE30',
			onStep: function(from, to, percent) {
				$(this.el).find('.percent').text(Math.round(percent));
			}
		});
		
		$('.chart2').easyPieChart({
			easing: 'easeOutBounce',
			scaleLength:11,
        	size:140,
			lineWidth:18,
			lineCap: 'butt',
        	barColor:'#FF4747',
			onStep: function(from, to, percent) {
				$(this.el).find('.percent').text(Math.round(percent));
			}
		});
	});
	</script>
</head>
<body>
<div class="bb-alert alert alert-success fade" id="myModal">
  <span>Validando correos<br>Espere por favor<br><p id="dvProgress">0%</p></span>
</div>
	<h2 class="text-center">Validador de correos</h2> 
	<div class="col-md-10 col-md-offset-1">  
		<input type="file" class="filestyle" id="fileinput">
        <p id="stat" class="fade text-danger">Error al leer el archivo</p>
   		<button type="button" class="btn btn-primary btn-block" name="btnStart" disabled>Comenzar a verificar</button>  
        <button type="button" class="btn btn-success btn-block" name="btnExcel" style="display:none">Exportar correos validos</button>
        
        <div style="margin-top: 21px;">
        	<div class="col-md-2">
            </div>
        	<div class="col-md-2">
            	<center>
                    <span class="chart1" data-percent="0">
						<span class="percent" style="font-size: 30px;color: gray;margin-left: 34px;position:absolute;margin-top: 4px;"></span>
					</span>
                    <p>Correos validos <span id="numValidos">0</span></p>
				</center>
            </div>
            <div class="col-md-4">
            	<div class="alert alert-success" style="margin-top: 27px;height: 90px;">
                	<div class="col-md-4">
  						<i class="fa fa-envelope fa-4x "></i>
                    </div>
                    <div class="col-md-8">
                    	<strong style="font-size:19px"><span id="tot">0</span> correos</strong><br> a verificar
                    </div>
				</div>
            </div>
            <div class="col-md-2">
            	<center>
                	<span class="chart2" data-percent="0">
						<span class="percent" style="font-size: 30px;color: gray;margin-left: 34px;position:absolute;margin-top: 4px;"></span>
					</span>
                    <p>Correos invalidos <span id="numInvalidos">0</span></p>
				</center>
            </div>
        </div>        

  		<table class="table table-hover table-striped">
    		<thead>
      			<tr>
        			<th>Correo eléctronico</th>
        			<th>Estado</th>
                    <th>Detalle</th>
      			</tr>
    		</thead>
    		<tbody>
            
    		</tbody>
  		</table>
        <div class="alert alert-info col-md-8 col-md-offset-2">
  			<strong>Información!</strong> <br>* Agrege sus correos eléctronicos desde un archivo csv o txt.<br>* Es probable que no todos los correos ingresados sean verificados.
		</div>
  	</div>
</div>

<script src="js/home.js"></script>
<script>
document.getElementById('fileinput').addEventListener('change', readSingleFile, false);
$(":file").filestyle({iconName: "fa fa-folder-open"});
$(":file").filestyle('buttonText', '&nbsp;&nbsp;Cargar archivo');
</script>
</body>
</html>
