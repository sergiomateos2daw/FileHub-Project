<?php

    if(!isset($_SESSION['email'])) {
        header("Location: ../index.php");
        exit();
    }
    //Llamada al modelo
    require_once("models/spaces_model.php");
    
    $per=new spaces_model();
    $datos=$per->get_spaces();
    $contador_espacios = 0;
    $porcentaje_usado = 0;
    
    foreach ($datos as $dato) {
        $path = 'Spaces/'.$dato["id_user"].'/'.$dato["id"];
        if (!file_exists($path)) {
            mkdir($path, 0777);
        }
        $contador_espacios += 1;
    }

    $per->update_num_spaces($dato["id_user"],$contador_espacios);
    
    function obtenerPorcentaje($cantidad, $total) {
        $porcentaje = ((float)$cantidad * 100) / $total; // Regla de tres
        $porcentaje = round($porcentaje, 0);  // Quitar los decimales
        return $porcentaje;
    }

    function generarModalEliminar($space_id, $user_id, $space_name){
        echo '<div class="modal fade" id="exampleModalCenter'.$space_id.'" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLongTitle">Eliminar espacio</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <b>
                <h5>¿Realmente deseas eliminar el espacio <b>'.$space_name.'</b>?</h5>
              </b>
              Una vez eliminado no podrás recuperar ninguno de los archivos que contenga.
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
              <a href="./controllers/removeSpace_controller.php?space_id='.$space_id.'&user_id='.$user_id.'" type="button" class="btn btn-danger">Eliminar espacio</a>
            </div>
          </div>
        </div>
      </div>';
    }

    $porcentaje_usado = obtenerPorcentaje($contador_espacios, 8);
    
    //Llamada a la vista
    require_once("views/spaces_view.php");
?>