<?php
    
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
    if(!isset($_SESSION['email'])) {
        header("Location: ../index.php");
        exit();
    }
    //Llamada al modelo
    $space_name = $_GET['space_name'];
    $space_id = $_GET['space_id'];
    $user_id = $_SESSION['user_id'];

    

    require_once("../models/filesOfSpaces_model.php");
    require_once("../db/conexion.php");

    $filesOfSpaces=new filesOfSpaces_model();
    
    $path = "../Spaces/$user_id/$space_id";
    $espacio_usado = calcularPesoSpace($path);

    $porcentaje_usado = obtenerPorcentaje($espacio_usado, 5368709120);
    
    
    function calcularPesoSpace($dir)
    {
        clearstatcache();
        $cont = 0;
        if (is_dir($dir)) {
            if ($gd = opendir($dir)) {
                while (($archivo = readdir($gd)) !== false) {
                    if ($archivo != "." && $archivo != "..") {
                        if (is_dir($archivo)) {
                            $cont += calcularPesoSpace($dir . "/" . $archivo);
                        } else {
                            $cont += sprintf("%u", filesize($dir . "/" . $archivo));
                        }
                    }
                }
                closedir($gd);
            }
        }
        return $cont;
    }

    function formatBytes($bytes) {
        if ($bytes > 0) {
            $i = floor(log($bytes) / log(1024));
            $sizes = array('B', 'KB', 'MB', 'GB', 'TB', 'PB', 'EB', 'ZB', 'YB');
            return sprintf('%.02F', round($bytes / pow(1024, $i),1)) * 1 . ' ' . @$sizes[$i];
        } else {
            return 0;
        }
    }
    
    function obtenerPorcentaje($cantidad, $total) {
        $porcentaje = ((float)$cantidad * 100) / $total; // Regla de tres
        $porcentaje = round($porcentaje, 0);  // Quitar los decimales
        return $porcentaje;
    }

    function mostrarCabecera($space_id, $space_name, $user_id){

        $num_files2 = 0;
        $path = "../Spaces/$user_id/$space_id";
        if ($handler = opendir($path)) {
            while (false !== ($file = readdir($handler))) {
                if($file != '.' && $file != '..'){
                    $num_files2 = $num_files2 + 1;
                }
            }
            
            closedir($handler);
        }

        $espacio_usado = calcularPesoSpace($path);

        
    
        $porcentaje_usado = obtenerPorcentaje($espacio_usado, 5368709120);

        echo '<div class="row py-5">
        <div class="col-lg-12  bg-white rounded shadow-sm">
        <br>
          <h1 class="display-6 title">'.$space_name .' </h1>';
        if($espacio_usado>0){
            echo '
            <p class="lead">Contiene '.$num_files2.' archivos.</p>
            <p class="lead">Espacio usado <b>'.formatBytes($espacio_usado).'</b> de <b>5 GB</b>.</p>';
            
            if($porcentaje_usado>=80){
                echo '<div class="text-dark progress-bar rounded bg-danger" role="progressbar" style="width: '.$porcentaje_usado.'%;" aria-valuenow="'.$porcentaje_usado.'" aria-valuemin="0" aria-valuemax="100">'.$porcentaje_usado.'%</div><br>';
            }elseif($porcentaje_usado>=50){
                echo '<div class="text-dark progress-bar rounded bg-warning text-dark" role="progressbar" style="width: '.$porcentaje_usado.'%;" aria-valuenow="'.$porcentaje_usado.'" aria-valuemin="0" aria-valuemax="100">'.$porcentaje_usado.'%</div><br>';
            }else{
                echo '<div class="text-dark progress-bar rounded" role="progressbar" style="width: '.$porcentaje_usado.'%;" aria-valuenow="'.$porcentaje_usado.'" aria-valuemin="0" aria-valuemax="100">'.$porcentaje_usado.'%</div><br>';
            }
        }else{
            echo 'Este espacio está vacío.<br><br>';
        }
      echo '</div>
      </div>';
    }

    $GLOBALS["num_files"] = 0;

    function mostarFichero($user_id, $space_id, $space_name){
        
        $GLOBALS["num_files"] = 0;
        $path = "../Spaces/$user_id/$space_id";
        if ($handler = opendir($path)) {
            while (false !== ($file = readdir($handler))) {
                if($file != '.' && $file != '..'){

                    $GLOBALS["num_files"] = $GLOBALS["num_files"]+1;

                    $file_info = array();
                    $pathinfo = pathinfo($file);
                    $file_info['filename'] = $pathinfo['filename'];

                    if (!array_key_exists("extension",$file_info))
                    {
                        $file_info['extension'] = '';
                    }else{
                        
                    }

                    if(!array_key_exists("extension",$pathinfo)){

                    }else{
                        $file_info['extension'] = strtolower($pathinfo['extension']);
                    }

                    
                    
                    switch($file_info['extension']){
                        default:
                        case '':
                            $file_info['image'] = "../images/icon-files/file.png";
                            break;
                        case 'ai':
                            $file_info['image'] = "../images/icon-files/ai.png";
                            break;
                        case 'avi':
                            $file_info['image'] = "../images/icon-files/avi.png";
                            break;
                        case 'mp4':
                            $file_info['image'] = "../images/icon-files/mp4.png";
                            break;
                        case 'bmp':
                            $file_info['image'] = "../images/icon-files/bmp.png";
                            break;
                        case 'cad':
                            $file_info['image'] = "../images/icon-files/cad.png";
                            break;
                        case 'cdr':
                            $file_info['image'] = "../images/icon-files/cdr.png";
                            break;
                        case 'css':
                            $file_info['image'] = "../images/icon-files/css.png";
                            break;
                        case 'dll':
                            $file_info['image'] = "../images/icon-files/dll.png";
                            break;
                        case 'doc':
                        case 'odt':
                        case 'docx':
                        case 'docm':
                            $file_info['image'] = "../images/icon-files/doc.png";
                            break;
                        case 'eps':
                            $file_info['image'] = "../images/icon-files/eps.png";
                            break;
                        case 'fla':
                            $file_info['image'] = "../images/icon-files/fla.png";
                            break;
                        case 'flv':
                            $file_info['image'] = "../images/icon-files/flv.png";
                            break;
                        case 'gif':
                            $file_info['image'] = "../images/icon-files/gif.png";
                            break;
                        case 'html':
                            $file_info['image'] = "../images/icon-files/html.png";
                            break;
                        case 'iso':
                            $file_info['image'] = "../images/icon-files/iso.png";
                            break;
                        case 'jpg':
                        case 'jpeg':
                            $file_info['image'] = "../images/icon-files/jpg.png";
                            break;
                        case 'js':
                            $file_info['image'] = "../images/icon-files/js.png";
                            break;
                        case 'mov':
                            $file_info['image'] = "../images/icon-files/mov.png";
                            break;
                        case 'mp3':
                            $file_info['image'] = "../images/icon-files/mp3.png";
                            break;
                        case 'mpg':
                            $file_info['image'] = "../images/icon-files/mpg.png";
                            break;
                        case 'pdf':
                            $file_info['image'] = "../images/icon-files/pdf.png";
                            break;
                        case 'php':
                            $file_info['image'] = "../images/icon-files/php.png";
                            break;
                        case 'png':
                            $file_info['image'] = "../images/icon-files/png.png";
                            break;
                        case 'ppt':
                            $file_info['image'] = "../images/icon-files/ppt.png";
                            break;
                        case 'psd':
                            $file_info['image'] = "../images/icon-files/psd.png";
                            break;
                        case 'raw':
                            $file_info['image'] = "../images/icon-files/raw.png";
                            break;
                        case 'sql':
                            $file_info['image'] = "../images/icon-files/sql.png";
                            break;
                        case 'svg':
                            $file_info['image'] = "../images/icon-files/svg.png";
                            break;
                        case 'tif':
                            $file_info['image'] = "../images/icon-files/tif.png";
                            break;
                        case 'txt':
                            $file_info['image'] = "../images/icon-files/txt.png";
                            break;
                        case 'wmv':
                            $file_info['image'] = "../images/icon-files/wmv.png";
                            break;
                        case 'xls':
                            $file_info['image'] = "../images/icon-files/xls.png";
                            break;
                        case 'xml':
                            $file_info['image'] = "../images/icon-files/xml.png";
                            break;
                        case 'zip':
                        case 'rar':
                        case 'RAR5':
                        case '7z':
                            $file_info['image'] = "../images/icon-files/zip.png";
                            break;
                    }
                    $ruta = "../Spaces/$user_id/$space_id/$file";
                    if($file_info['extension']=='png' || $file_info['extension']=='jpg' || $file_info['extension']=='webp' || $file_info['extension']=='bmp' || $file_info['extension']=='gif' || $file_info['extension']=='tiff' ||$file_info['extension']=='svg'){
                        $animation_class = 'file-animation';
                        echo '<div class="col-xl-2 col-lg-4 col-md-6 mb-4 ' . $animation_class . '">
                                <div class="bg-white rounded shadow-sm"><img src="' . $file_info['image'] . '" src2="' . $ruta . '" alt="" class="img-fluid card-img-top">
                                    <div class="p-4">
                                        <div class="labelContainer"><span>' . $file_info['filename'] . '</span></div>
                                        <p class="small text-muted mb-0">Formato: ' . $file_info['extension'] . '</p>
                                    </div>
                                    <div class="d-flex align-items-center justify-content-between rounded-pill bg-light px-2 py-2">
                                        <button class="badge badge-success px-3 rounded-pill font-weight-normal botonVer" onclick="verImagen("")"><i class="fa-solid fa-magnifying-glass"></i></button>
                                        <a class="badge badge-primary px-3 rounded-pill font-weight-normal" href="../controllers/download_controller.php?space_id=' . $space_id . '&file=' . $file . '"><i class="fa-solid fa-download"></i></a>
                                        <a class="badge badge-warning px-3 rounded-pill font-weight-normal" href="../controllers/createSharedFile_controller.php?space_name='.$space_name.'&space_id=' . $space_id . '&file=' . $file . '"><i class="fa-solid fa-share-alt"></i></a>
                                        <a class="badge badge-danger px-3 rounded-pill font-weight-normal" href="../controllers/removeFile_controller.php?space_id=' . $space_id . '&file=' . $file . '&space_name=' . $space_name . '"><i class="fa-solid fa-trash"></i></a>
                                    </div>
                                </div>
                            </div>
                            ';
                    }else{
                        $animation_class = 'file-animation';
                        echo '<div class="col-xl-2 col-lg-4 col-md-6 mb-4 ' . $animation_class . '">
                                <div class="bg-white rounded shadow-sm"><img src="' . $file_info['image'] . '" src2="' . $ruta . '" alt="" class="img-fluid card-img-top">
                                    <div class="p-4">
                                        <div class="labelContainer"><span>' . $file_info['filename'] . '</span></div>
                                        <p class="small text-muted mb-0">Formato: ' . $file_info['extension'] . '</p>
                                    </div>
                                    <div class="d-flex align-items-center justify-content-between rounded-pill bg-light px-3 py-2">
                                        <a class="badge badge-primary px-3 rounded-pill font-weight-normal" href="../controllers/download_controller.php?space_id=' . $space_id . '&file=' . $file . '"><i class="fa-solid fa-download"></i></a>
                                        <a class="badge badge-warning px-3 rounded-pill font-weight-normal" href="../controllers/createSharedFile_controller.php?space_name='.$space_name.'&space_id=' . $space_id . '&file=' . $file . '"><i class="fa-solid fa-share-alt"></i></a>
                                        <a class="badge badge-danger px-3 rounded-pill font-weight-normal" href="../controllers/removeFile_controller.php?space_id=' . $space_id . '&file=' . $file . '&space_name=' . $space_name . '"><i class="fa-solid fa-trash"></i></a>
                                    </div>
                                </div>
                            </div>
                            ';
                    }
                    
                }
            }
            
            closedir($handler);
        }

    }
    
    
    //Llamada a la vista
    require_once("../views/filesOfSpaces_view.php");
    $filesOfSpaces->update_num_files($space_id, $GLOBALS["num_files"]);
?>