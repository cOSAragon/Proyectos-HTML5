<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>FLISoL Aragón</title>

<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="bootstrap/css/bootstrap.css" rel="stylesheet" media="screen">
<link href="bootstrap/css/bootstrap-responsive.css" rel="stylesheet">
</head>

<body>

<div class="container">

	<!-- ------------------inicio header----------------- -->
  <div class="header">
  <table width="100%" border="0" cellspacing="0">
  <tr>
  <td>
  		<div align="center">
  <a href="#">
  <img src="img/cabecera5.png" alt="logo flisol" name="Insert_logo" id="logo" width="50%" height="50%" />
        </a>
        </div>
       
  </td>
  <td align="left">
 <label class="nav-collapse collapse">S&iacute;guenos:</label>
 <a href="https://www.facebook.com/FlisolFesAragon?fref=ts"><img src="img/facebook.png" width="30%" height="30%"></a>
 <a href="https://twitter.com/FLISoL_Aragon"><img src="img/twitter.png" width="30%" height="30%"></a>
  </td>
  </tr> 
  </table>
  
    
    <!-- ------------ aqui empieza la navbar responsiva ----------- -->
    <div class="navbar">
  		<div class="navbar-inner" >
    		<div class="container">
            <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            	<span class="icon-bar"></span>
        		<span class="icon-bar"></span>
        		<span class="icon-bar"></span>
            </a> 
            <a class="brand" href="/">FLISoL</a>
            	<div class="nav-collapse collapse">
    				<ul class="nav">  				
      					<li><a href="/que_es_flisol">&iquest;Qu&eacute; es el FLISoL?</a></li>
      					<li class="active"><a href="/actividades">Actividades</a></li>
                		<li><a href="/contacto">Contacto</a></li>
                		<li><a href="/registro">Registro</a></li>
    				</ul>
            	</div>
            </div>
  		</div>
	</div>
    <!-- ------------ aqui termina la navbar responsiva ----------- -->
  
   </div>
   <!-- ------------------fin de header--------------------- -->
   
   <!-- -------------------inicio content -------------------------- -->
  <div class="content">
 
   
   <!-- -----contenido conferencias ----------- -->
   <div class="span12" align="center" id="#conferencias">
   	<div class="row-fluid">
    
    <h1 align="left">Conferencias</h1>
    <br> 
    <?php
      @require_once('bases.php');
      if (!conectar())
        die();
      $qconferencias = mysql_query("SELECT * FROM eventos WHERE taller = 0");
      if (mysql_num_rows($qarray) > 0) {
        while ($qarray = mysql_fetch_assoc($qconferencias)) {
          $hash = md5(trim(strtolower($qarray['correo'])));
          $ponente = mysql_fetch_field(mysql_query("SELECT nombre FROM usuarios WHERE id = {$qarray['ponente']}"));
          $hora = sprintf("De las %s:%s a las %s:%s en el %s.", substr($qarray['fecha'], 0, 2), substr($qarray['fecha'], 2, 2), substr($qarray['fecha'], 4, 2), substr($qarray['fecha'], 6, 2), $qarray['ubicacion']);
          echo <<<ASC
    <div class="span5" style="color:#FFF; background-color:#FC8830">
      <div class="span12"></div>
       <div class=" span4">
        <img src="http://gravatar.com/$hash.jpg?s=200&d=identicon" alt="$ponente" width="60%" height="20px">
       </div>
       <div class="span7">
      <p align="center"><strong>{$qarray['nombre']}</strong></p>
        <p align="center"><em>$ponente</em></p>
       </div>      
      <div class="span12">
       <p align="right"><a href="#{$qarray['alias']}" data-toggle="modal" style="color:#FFF"><strong>Ver más...</strong></a></p>
       </div>
    </div>

    <div id="{$qarray['alias']}" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h3 id="myModalLabel">{$qarray['nombre']}</h3>
  </div>
  <div class="modal-body">
  <div class="span2">
    <img src="http://gravatar.com/$hash.jpg?s=200&d=identicon" alt="$ponente" width="60%" height="20%">
    </div>
    <p>{$qarray['descripcion']}</p>
    <p>$hora</p>
  </div>
ASC;
        }
      }
    ?>
   <!-- -----fin contenido conferencias ----------- -->
   
   
   <!-- -----contenido talleres ----------- -->
   <div class="span12" align="center" id="#taller">
   	<div class="row-fluid show-grid">
    
    <h1 align="left">Talleres</h1> 
    <br>
    
   <?php
      $qtalleres = mysql_query("SELECT * FROM eventos WHERE taller = 1");
      if (mysql_num_rows($qarray) > 0) {
        while ($qarray = mysql_fetch_assoc($qtalleres)) {
          $hash = md5(trim(strtolower($qarray['correo'])));
          $ponente = mysql_fetch_field(mysql_query("SELECT nombre FROM usuarios WHERE id = {$qarray['ponente']}"));
          $hora = sprintf("De las %s:%s a las %s:%s en el %s.", substr($qarray['fecha'], 0, 2), substr($qarray['fecha'], 2, 2), substr($qarray['fecha'], 4, 2), substr($qarray['fecha'], 6, 2), $qarray['ubicacion']);
          echo <<<ASC
    <div class="span5" style="color:#FFF; background-color:#FC8830">
      <div class="span12"></div>
       <div class=" span4">
        <img src="http://gravatar.com/$hash.jpg?s=200&d=identicon" alt="$ponente" width="60%" height="20px">
       </div>
       <div class="span7">
      <p align="center"><strong>{$qarray['nombre']}</strong></p>
        <p align="center"><em>$ponente</em></p>
       </div>      
      <div class="span12">
       <p align="right"><a href="#{$qarray['alias']}" data-toggle="modal" style="color:#FFF"><strong>Ver más...</strong></a></p>
       </div>
    </div>

    <div id="{$qarray['alias']}" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h3 id="myModalLabel">{$qarray['nombre']}</h3>
  </div>
  <div class="modal-body">
  <div class="span2">
    <img src="http://gravatar.com/$hash.jpg?s=200&d=identicon" alt="$ponente" width="60%" height="20%">
    </div>
    <p>{$qarray['descripcion']}</p>
    <p>$hora</p>
  </div>
ASC;
        }
      }
    ?>
    </div> 
   </div>
   <!-- -----fin contenido talleres ----------- -->
   
  </div>
  <!-- ---------------------- fin content ---------------------------- -->
  
  <!-- --------------------- inicio footer -------------------------- -- 
  <div class="modal-footer navbar-fixed-bottom" style="background-color:#F90">
   
   <p>Lo que tenga que venir aqui</p>
   
   </div>
   <!-- ------------------------- fin footer ------------------------- -->
    
    <!-- -------------- aqui van las descripciones de los talleres/conferencias en forma de popup ------------ -->
    
  </div>
  <script src="bootstrap/js/jquery.js"></script>
  <script src="bootstrap/js/bootstrap.js"></script>
</body>
</html>