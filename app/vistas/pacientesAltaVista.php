<?php include_once("encabezado.php"); ?>
<script src="<?php print RUTA; ?>js/pacientesAltaVista.js"></script>
<h1 class="text-center">
  <?php
  if (isset($datos["subtitulo"])) {
    print $datos["subtitulo"];
  }
  ?>
</h1>
<div class="card p-4 bg-light">
  <form enctype="multipart/form-data" action="<?php print RUTA; ?>pacientes/alta/" method="POST">

    <div class="form-group text-left">
      <label for="nombre">* Nombre:</label>
      <input type="text" name="nombre" class="form-control" required
      placeholder="Escribe el nombre del paciente."
      value="<?php 
      print isset($datos['data']['nombre'])?$datos['data']['nombre']:''; 
      ?>"
      <?php
      if (isset($datos["baja"])) {
        print "disabled ";
      }
      ?>
      >
    </div>
    <div class="form-group text-left">
      <label for="content">* Apellidos:</label>
      <input type="text" name="apellidos" class="form-control" required
      placeholder="Escribe los apellidos del paciente."
      value="<?php 
      print isset($datos['data']['apellidos'])?$datos['data']['apellidos']:''; 
      ?>"
      <?php
      if (isset($datos["baja"])) {
        print "disabled ";
      }
      ?>
      >
    </div>

    <div class="form-group text-left">
      <label for="correo">* Correo electrónico:</label>
      <input type="email" name="correo" class="form-control" required
      placeholder="Escribe el correo electrónico del paciente"
      value="<?php 
      print isset($datos['data']['correo'])?$datos['data']['correo']:''; 
      ?>"
      <?php
      if (isset($datos["baja"])) {
        print " disabled ";
      }
      ?>
      >
    </div>

    <div class="form-group text-left">
      <label for="direccion">Dirección:</label>
      <input type="text" name="direccion" class="form-control" 
      placeholder="Escribe la direccion del paciente"
      value="<?php 
      print isset($datos['data']['direccion'])?$datos['data']['direccion']:''; 
      ?>"
      <?php
      if (isset($datos["baja"])) {
        print " disabled ";
      }
      ?>
      >
    </div>

    <div class="form-group text-left">
      <label for="telefono">* Teléfono:</label>
      <input type="text" name="telefono" class="form-control" required 
      placeholder="Escribe el teléfono del paciente"
      value="<?php 
      print isset($datos['data']['telefono'])?$datos['data']['telefono']:''; 
      ?>"
      <?php
      if (isset($datos["baja"])) {
        print " disabled ";
      }
      ?>
      >
    </div>

    <div class="form-group text-left">
      <label for="genero">* Género:</label>
      <select class="form-control" name="genero" id="genero" 
      <?php
      if (isset($datos["baja"])) {
        print " disabled ";
      }
      ?>
      >
        <option value="void">---Selecciona el género---</option>
        <?php
          for ($i=0; $i < count($datos["genero"]); $i++) { 
            print "<option value='".$datos["genero"][$i]["indice"]."'";
              if(isset($datos["data"]["genero"]) && $datos["data"]["genero"]==$datos["genero"][$i]["indice"]){
                print " selected ";
              }
            print ">".$datos["genero"][$i]["cadena"]."</option>";
          } 
        ?>
      </select>
    </div>

    <div class="form-group text-left">
      <label for="fechaNacimiento">* Fecha de nacimiento:</label>
      <input type="date" name="fechaNacimiento" class="form-control" required
      placeholder="Escribe la fecha de nacimiento del paciente"
      value="<?php 
      print isset($datos['data']['fechaNacimiento'])?$datos['data']['fechaNacimiento']:''; 
      ?>"
      <?php
      if (isset($datos["baja"])) {
        print " disabled ";
      }
      ?>
      >
    </div> 

    <div class="form-group text-left">
      <label for="edad">Edad:</label>
      <input type="text" name="edad" class="form-control" 
      placeholder="Escribe el edad del paciente"
      value="<?php 
      print isset($datos['data']['edad'])?$datos['data']['edad']:''; 
      ?>"
      <?php
      if (isset($datos["baja"])) {
        print " disabled ";
      }
      ?>
      >
    </div>  



    <div class="form-group text-left">
      <label for="dni">DNI:</label>
      <input type="text" name="dni" class="form-control" 
      placeholder="Escribe el identificador del paciente"
      value="<?php 
      print isset($datos['data']['dni'])?$datos['data']['dni']:''; 
      ?>"
      <?php
      if (isset($datos["baja"])) {
        print " disabled ";
      }
      ?>
      >
    </div>



    




    <div class="form-group text-left">
      <input type="hidden" name="id" id="id" value="
      <?php
        if (isset($datos['data']['id'])) {
          print $datos['data']['id'];
        } else {
          print "";
        }
      ?>
      ">
      <?php
      if (isset($datos["baja"])) { 
        if ($datos["numCitas"]>0) {
          print '<h3 class="text-center">No puede eliminar al paciente porque tiene '.$datos["numCitas"].' citas pendientes</h3>';
        } else {
          print '<p class="text-center"><b>Advertencia: una vez borrado el registro, no podrá recuperar la información</b></p>';
          print '<a href="'.RUTA.'pacientes/bajaLogica/'.$datos['data']['id'].'" class="btn btn-danger">Borrar</a>';
        }
        print '<a href="'.RUTA.'pacientes" class="btn btn-danger">Regresar</a>';
      ?>
      <?php } else { ?> 
      <input type="submit" value="Enviar" class="btn btn-success">
      <a href="<?php print RUTA; ?>pacientes" class="btn btn-info">Regresar</a>
    <?php } ?> 
    </div>
  </form>
</div><!--card-->
<?php include_once("piepagina.php"); ?>