<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="ico/favicon.ico">
    
    <title>Empresa</title>

   <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="css/plugins/metisMenu/metisMenu.min.css" rel="stylesheet">

	<link rel="stylesheet" type="text/css" href="css/bootstrap-select.css">

 	<!-- DataTables CSS -->
    <link href="css/plugins/dataTables.bootstrap.css" rel="stylesheet">

	<!-- Custom CSS -->
    <link href="css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome-4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">


    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>
 <?php 


require "libreria.php";


$id_personal=17;
 
if(isset($_GET["p"])){
	 $id_empresa=$_GET["p"];
}else{
	 $id_empresa=0;
}

if($id_empresa<>0){
	
	$rs=fn_mostrar_empresa($id_empresa);
	$rows=mysql_num_rows($rs);	
	$txt="Modificar Empresa";
	$id_condicion=1;
	$id_estado=1;
	$id_sector=mysql_result($rs,0,6);
	$id_tipo=mysql_result($rs,0,7);
	$id_dist=124;
	$ruc=mysql_result($rs,0,1);
	$nombre1=mysql_result($rs,0,2);
	$nombre2=mysql_result($rs,0,3);
	$direccion=mysql_result($rs,0,8);
	$telefono=mysql_result($rs,0,5);
	$ciiu1=mysql_result($rs,0,4);
	$comentarios=mysql_result($rs,0,9);
	
}else{
	$txt="Reserva de Equipo";
	$id_condicion=1;
	$id_estado=1;
	$id_sector=1;
	$id_tipo=3;
	$id_dist=124;
	$ruc="";
	$nombre1="";
	$nombre2="";
	$direccion="";
	$telefono="";
	$ciiu1="";
	$comentarios="";
}
 
 ?> 



<nav class="navbar navbar-default navbar-fixed-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="empresass.php"><img src="ico/favicon.ico">Miprepago.com</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-archive fa-fw"></i>  
                        <i class="fa fa-caret-down"></i>
                        
                    </a>
                    <ul class="dropdown-menu dropdown-messages">
<?php

$rs=fntop3visita($id_personal);
$rows=mysql_num_rows($rs);
for($i=0;$i<=($rows-1);$i++)
	{
	echo "<li>\n";
    echo "<a href='cita.php?c=".mysql_result($rs,$i,"id_cita")."'>\n";
    echo "<div>\n";
    echo "<strong> ".mysql_result($rs,$i,"nombres")."</strong>\n";
    echo "<span class='pull-right text-muted'>\n";
    echo "<em>".mysql_result($rs,$i,"fecha")."</em>\n";
    echo "</span>\n";
    echo "</div>\n";
    echo "<div> ".mysql_result($rs,$i,"motivo")."</div>\n";
    echo "</a>\n";
    echo "</li>\n";
    echo "<li class='divider'></li>\n";
	}

?>                        
                        
                        <li>
                            <a class="text-center" href="citas.php">
                                <strong>Ver todas las Citas</strong>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a class="text-center" href="cita.php?c=0">
                                <strong>Registrar Nueva Cita</strong>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </li>
                    </ul>
                    <!-- /.dropdown-messages -->
                    
                </li>
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-tasks fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-tasks">
                    
<?php

$rs=fntop3proyecto($id_personal);
$rows=mysql_num_rows($rs);
for($i=0;$i<=($rows-1);$i++)
	{
		echo "<li>";
        echo "<a href='#'>";
		//mysql_result($rs,$i,"id_proyecto")
        echo "<div>\n";
        echo "<p>\n";
		echo "<strong> ".mysql_result($rs,$i,"nombre")."</strong>\n";
		echo "<span class='pull-right text-muted'>".mysql_result($rs,$i,"prob")."%</span>\n";
		echo "</p>\n";
		echo "<div> ".mysql_result($rs,$i,"nombre1")." <i class='fa fa-money fa-fw'> </i><strong>".mysql_result($rs,$i,"monto")."</strong></div>\n";
		echo "<div class='progress progress-striped active'>\n";
		echo "<div class='progress-bar progress-bar-success' role='progressbar' aria-valuenow='40' aria-valuemin='0' aria-valuemax='100' style='width: ".mysql_result($rs,$i,"prob")."%'>\n";
		echo "<span class='sr-only'>40% Complete (success)</span>\n";
		echo "</div>\n";
		echo "</div>\n";
		echo "</div>\n";
		echo "</a>\n";
		echo "</li>\n";
		echo "<li class='divider'></li>\n";
	}
?>                    

                        <li>
                            <a class="text-center" href="#">
                                <strong>Ver todos mis proyectos</strong>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </li>
                    </ul>
                    <!-- /.dropdown-tasks -->
                </li>
                <!-- /.dropdown -->
                
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-bell fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-alerts">
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-comment fa-fw"></i> New Comment
                                    <span class="pull-right text-muted small">4 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-twitter fa-fw"></i> 3 New Followers
                                    <span class="pull-right text-muted small">12 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-envelope fa-fw"></i> Message Sent
                                    <span class="pull-right text-muted small">4 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-tasks fa-fw"></i> New Task
                                    <span class="pull-right text-muted small">4 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-upload fa-fw"></i> Server Rebooted
                                    <span class="pull-right text-muted small">4 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a class="text-center" href="#">
                                <strong>Ver todas las alertas</strong>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </li>
                    </ul>
                    <!-- /.dropdown-alerts -->
                </li>
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#"><i class="fa fa-user fa-fw"></i> Perfil</a>
                        </li>
                        <li><a href="#"><i class="fa fa-gear fa-fw"></i> Administar</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="login.html"><i class="fa fa-sign-out fa-fw"></i> Salir</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

		</div>
        </nav>


    <div class="container">

      <div class="row-offcanvas-right">

        <div class="col-md-6">
            <p>&nbsp;</p>
            <p>&nbsp;</p>
            <p>&nbsp;</p>

          <div class="jumbotron">
            <h2><?php echo $txt;?></h2>
            <p>&nbsp;</p>
            <form role="form" method="post" action="#">
            
            <div class="form-group">
            <div class="row">
            <div class="col-sm-6">
              <input type="text" name="ruc" placeholder="Marca" value="<?php echo $ruc;?>" class="form-control">
            </div>
            </div>
            </div>
            
            
            <div class="form-group">
              <input type="text" name="nombre1" placeholder="Modelo" class="form-control" value="<?php echo $nombre1;?>">
            </div>
            

            
			<div class="form-group">
              <input type="text" name="telefono" placeholder="Proveedor" value="<?php echo $telefono;?>" class="form-control">
            </div>
            
            
	<div class="form-group">
            <div class="row">
            <div class="col-sm-6">
              <input type="text" name="ruc3" placeholder="Cantidad" value="<?php echo $ruc;?>" class="form-control">
            </div>
            </div>
            </div>


<div class="form-group">
            <div class="row">
            <div class="col-sm-6">
              <input type="text" name="ruc4" placeholder="Codigo de reserva" value="<?php echo $ruc;?>" class="form-control">
            </div>
            </div>
            </div>
            
            
<div class="form-group">
            <div class="row">
            <div class="col-sm-6">
              <input type="text" name="ruc5" placeholder="Correo electronico" value="<?php echo $ruc;?>" class="form-control">
            </div>
            </div>
            </div>
            
  
			<div class="form-group">
            	<button type="reset" class="btn btn-success">Eviar correo</button>
            	<!--<a href="empresas.php" class="btn btn-default btn-success">Reservar</a>-->
            	<!--<button id="btnguardar" type="submit" class="btn btn-success">Cancelar</button>-->
            </div>
            
          </form>
          </div> <!--/jumbotron-->
          
        </div><!--/col-xs-12-->


      </div><!--/row-->

<?php

if (isset($_POST["ruc"]) && isset($_POST["nombre1"])){

$id_condicion=1;
$id_estado=1;
$id_sector=$_POST["id_sector"];
$id_tipo=$_POST["id_tipo"];
$id_dist=124;
$ruc=$_POST["ruc"];
$nombre1=$_POST["nombre1"];
$nombre2=$_POST["nombre2"];
$direccion=$_POST["direccion"];
$telefono=$_POST["telefono"];
$ciiu1=$_POST["ciiu1"];
$ciiu2="";
$id_user=$id_personal;
$descripcion="";
$comentarios=$_POST["comentarios"];

if($ruc!=""){
	$rs=fn_mnt_tempresa($id_empresa, $id_condicion, $id_estado, $id_sector, $id_tipo, $id_dist, $ruc, $nombre1, $nombre2, $direccion, $telefono, $ciiu1, $ciiu2, $id_user, $descripcion, $comentarios);

if($rs==1){
	msg2("Datos almacenados");
	}else{
	msg1("Datos no insertados");}
}else{
	msg1("Ingrese un numero RUC valido");
}



}


?>
      
      </div><!--/container-->


      <hr>

      <footer>
        <p>&copy; Powered by So@cat12</p>
      </footer>

    </div><!--/.container-->



<!-- Button trigger modal -->
<!--<button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
  Modal ON!
</button>-->

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only"></span></button>
        <h4 class="modal-title" id="myModalLabel">Mensaje</h4>
      </div>
      <div class="modal-body">
        Los daros fueron almacenados
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close2</button>
        <button type="button" class="btn btn-primary">Save changes3</button>
      </div>
    </div>
  </div> 
</div> <!-- Modal -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
 <!-- jQuery Version 1.11.0 -->
    <script src="js/jquery-1.11.0.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="js/plugins/metisMenu/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="js/sb-admin-2.js"></script>
    
    <script type="text/javascript" src="js/bootstrap-select.js"></script>

    <script src="js/offcanvas.js"></script>
    
    <script type="text/javascript" src="js/moment.js"></script>

    <script type="text/javascript" src="js/ru.js"></script>
    
    
  </body>
</html>
