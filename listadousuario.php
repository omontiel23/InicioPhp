<?php include('header.php'); ?>
<?php
include('core/connection.php');
$dbconn = getConnection();

// prepare statement for select calls
$stmt = $dbconn->query('SELECT * FROM v_usuarios');
// execute the statement
$irags = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="form-group row">

                 <div class="col-sm-8">
                 <h1 class="h3 mb-2 text-gray-800">Usuarios</h1>
<p class="mb-4">Lista de Usuarios del sistema</p>
                 </div>

                 <div class="col-sm-2 ">
                     <a href="./usuario.php"> 
                         <button class="btn btn-dark btn-user btn-block" >
                             <i class="fas fa-plus" >
                                 Nuevo Usuario
                             </i>
                         </button>
                    </a>               
                </div>
                 
               </div>


<!-- Page Heading -->

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-dark">Responsable: <?php echo $_SESSION['nombre'] ?> </h6>
    <h6 class="m-0 font-weight-bold text-dark">Fecha: <?php echo date('Y-m-d h:i:s',time()) ?>  </h6>
  </div>
  <div class="card-body" style="font-size: 13px">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
        <tr class="bg-dark" style="font-size: 16px; color:white; text-align:center; white-space:pre;">
           <th style="text-align:center;">Id del registro</th>
           <th style="text-align:center;">N° de cédula</th>
           <th style="text-align:center;">Nombre</th>
           <th style="text-align:center;">Rol</th>
           <th style="text-align:center;">Email</th>
           <th style="text-align:center;">Estado</th>
           <th style="text-align:center;">Accion</th>
         </tr>
        </thead>
        <tfoot>
     
        </tfoot>
        <tbody id="tbody">
      <?php foreach ($irags as $call) { ?>
          <tr id="<?= $call['id']; ?>">
            <td><?= $call['id']; ?></td>
            <td><?= $call['cedula']; ?></td>
            <td><?= $call['nombre']; ?></td>
            <td><?= $call['rol']; ?></td>
            <td><?= $call['email']; ?></td>
            <td><?= $call['estado']== 2 ? "Inactivo" : "Activo"; ?></td>
            <td style="text-align:center;">
           
            <button onclick="update(<?= $call['id']; ?>);"  class="btn btn-warning btn-sm"><b><i class="fas fa-user-edit"></i></b></button>
              <button type="button" id="btneliminar" data-nombre="<?php echo $call['nombre']?>" data-id="<?php echo $call['id']; ?>" class="btn btn-secondary  btn-sm .eliminar" data-toggle="modal" data-target="#exampleModal">
              <b><i class="fas fa-user-lock "></i></b></button>


            </td>
            
           
           
          </tr>
          
      <?php } ?>
      
        </tbody>
      </table>
    </div>
    <div id="error" style="display: none"><br>
                            <div class='alert alert-danger' role='alert'>
                                <strong>Error!</strong> <span id="error_message"></span>
                            </div>
                        </div>
                        <div id="success" style="display: none"><br>
                            <div class='alert alert-success' role='alert'>
                                <strong>Éxito!</strong> <span id="success_message"></span>
                            </div>
                        </div>
                                <hr>
  </div>
</div>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<form id="form" class="user">
    <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="exampleModalLabel">Estado del Usuario</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
        
	      </div>
	      <div class="modal-footer">
        <input type="hidden" name="accion" value="btnupdate">
	        <button type="button" id="btnupdate" class="btn btn-success" data-dismiss="modal">Activado</button>
          <input type="hidden" name="accion" value="btneliminar">
                       
          <button id ="btneliminar" type="submit" data-dismiss="modal" class="btn btn-danger">Desactivado</button>
	      </div>
	    </div>
	  </div>
</form>
	</div>
<?php include('footer.php'); ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="./public/js/bootstrap.min.js"></script>
<script src="./public/js/modificar_usuario.js"></script>
