<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="ico/favicon.ico">
    
    <title>SIME</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="css/plugins/metisMenu/metisMenu.min.css" rel="stylesheet">

 	<!-- DataTables CSS -->
    <link href="css/plugins/dataTables.bootstrap.css" rel="stylesheet">

	<!-- Custom CSS -->
    <link href="css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome-4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->


<script type="text/javascript"> 
    
	function modalon(){
		$('#myModal').modal("show");
	}
		


    </script>

</head>

<body>

<?php
	
require "libreria.php";	

$cn=fnconect();

  	$_session["id_personal"]=17;
  	$_session["nombres"]="Irwin Mendoza";
	
	$id_personal=$_session["id_personal"];

?>

    <div id="wrapper">

        <!-- Navigation -->
        

<!-- Navigation -->
        <nav class="navbar navbar-default navbar-fixed-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html"><img src="ico/favicon.ico">MIPREPAGO.COM</a>
            </div>
            <!-- /.navbar-header -->











            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                    
                        <li class="sidebar-search">
                            <div class="input-group custom-search-form">
                                <input type="text" class="form-control" placeholder="Buscar...">
                                <span class="input-group-btn">
                                <button class="btn btn-default" type="button">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                            </div>
                            <!-- /input-group -->
                        </li>
                        
                        
                        <li>
                            <a  href="main.php"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                        </li>
                        <li>
                            <a class="active" href="empresas.php"><i class="fa fa-building fa-fw"></i> Empresas</a>
                        </li>
                        <li>
                            <a href="contactos.php"><i class="fa fa-male fa-fw"></i> Contactos</a>
                        </li>
                        <li>
                            <a href="citas.php"><i class="fa fa-archive fa-fw"></i> Citas</a>
                        </li>
                        <li>
                            <a href="proyectos.php"><i class="fa fa-tasks fa-fw"></i> Proyectos</a>
                        </li>
                        
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->


        </nav>
		<!-- Navigation -->




        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                     </br>  
                    <h1 class="page-header"> </h1>
                  </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            Consultar Equipos
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <form role="form" method="post" action="#">

                                        <div class="form-group">
                                         <div class="row">
                                         <div class="col-sm-10">
                                         
                                                  <div class="input-group">
                                                      <input type="text" name="nombre1" class="form-control" placeholder="Escriba la Marca o el modelo" >
                                            
                                                      <div class="input-group-btn">
                                                        <button class="btn btn-default" type="submit"><i class="fa fa-search"></i></button>
                                                      </div>
                                                      
                                                  </div>
                                                  <?php 
							  
	if(isset($_POST["nombre1"])){
		$nombre1=$_POST["nombre1"];
		if(strlen($nombre1)>=3){
			$rs=fn_buscar_empresa($nombre1);
			$rows=mysql_num_rows($rs);
		   echo "<p class='help-block'><i class='fa fa-search'></i> ".$rows." resultados para : ".$nombre1."</p>\n";
		}
	}
												  ?>
                                                  
                                          </div>
                                          </div>
                                          </div>
                                        
                                     </form>
                                 </div>
                             </div>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                    
                    <div class="col-lg-12">
          <div class="list-group">
<?php 

if(isset($_POST["nombre1"])){
	$nombre1=$_POST["nombre1"];
	if(strlen($nombre1)>=3){

		for($i=0;$i<=($rows-1);$i++){
			echo "<a href='empresa_dsb.php?p=".mysql_result($rs,$i,0)."' class='list-group-item'>\n";
            echo "<h4 class='list-group-item-heading text-primary'>".mysql_result($rs,$i,1)."\n";
			echo "<span class='pull-right text-muted'>\n";
			echo "<em>".mysql_result($rs,$i,4)." <i class='fa fa-male'></i></em>\n";
			echo "</span></h4>\n";
            echo "<p class='list-group-item-text text-muted'><i class='fa fa-building'></i> ".mysql_result($rs,$i,2)." - ".mysql_result($rs,$i,3)."</p>\n";
            echo "</a>\n";
			}
		}
	}

?>

            
          </div>
        </div><!-- /.col-sm-4 -->
                    
                    
                    <hr>
                    
                    <button class="btn btn-danger btn-circle" type="button" data-toggle="modal" data-target="#myModal"><i class="fa fa-eraser"></i></button>
                    
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
			
            
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
    
    <!-- Modal -->
      <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only"></span></button>
            <h4 class="modal-title" id="myModalLabel">Lo sentimos <img src="ico/loading.gif" width="20" height="20"></h4>
          </div>
          
          <div class="modal-body">
            <p>No se encontraron equipos para la marca ingresada</p>
            
            
          </div>
          <div class="modal-footer">
            
            <!--<a href="citas.php" class="btn btn-default btn-success">Aceptar</a>-->
            <button type="button" class="btn btn-default" data-dismiss="modal">Aceptar</button>
    
            <!--<button type="button" class="btn btn-primary">Save changes3</button>-->
          </div>
        </div>
      </div> 
    </div> <!-- Modal -->
    
    

    <!-- jQuery Version 1.11.0 -->
    <script src="js/jquery-1.11.0.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="js/plugins/metisMenu/metisMenu.min.js"></script>

	<!-- DataTables JavaScript -->
    <script src="js/plugins/dataTables/jquery.dataTables.js"></script>
    <script src="js/plugins/dataTables/dataTables.bootstrap.js"></script>


    <!-- Custom Theme JavaScript -->
    <script src="js/sb-admin-2.js"></script>
    
        <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
    $(document).ready(function() {
        $('#dataTables-example').dataTable();
    });
    </script>

</body>

</html>
