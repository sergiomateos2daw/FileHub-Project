<?php
    
    session_start();
    //Llamada al modelo
    $space_name = $_GET['space_name'];
    $space_id = $_GET['space_id'];
    $user_id = $_SESSION['user_id'];

    

    require_once("../models/filesOfSpaces_model.php");
    require_once("../db/conexion.php");

    $filesOfSpaces=new filesOfSpaces_model();
    

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

        echo '<div class="row py-5 cabecera">
        <div class="col-lg-12 mx-auto rounded bg-light">
          <h1 class="display-6">'.$space_name .' </h1>
          <p class="lead">Contiene '.$num_files2.' archivos.</p>
        </div>
      </div>';
    }

    $GLOBALS["num_files"] = 0;

    function mostarFichero($user_id, $space_id){
        $GLOBALS["num_files"] = 0;
        $path = "../Spaces/$user_id/$space_id";
        if ($handler = opendir($path)) {
            while (false !== ($file = readdir($handler))) {
                if($file != '.' && $file != '..'){

                    $GLOBALS["num_files"] = $GLOBALS["num_files"]+1;

                    $file_info = array();
                    $pathinfo = pathinfo($file);
                    $file_info['filename'] = $pathinfo['filename'];
                    
                    $file_info['extension'] = strtolower($pathinfo['extension']);
                    
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
                        echo '<div class="col-xl-2 col-lg-4 col-md-6 mb-4">
                                <div class="bg-white rounded shadow-sm"><img src="'.$file_info['image'].'" src2="'.$ruta.'" alt="" class="img-fluid card-img-top">
                                    <div class="p-4">
                                        <h5> <p  class="text-dark">'.$file_info['filename'].'</p></h5>
                                        <p class="small text-muted mb-0">Formato: '.$file_info['extension'].'</p>
                                    </div>
                                    <div class="d-flex align-items-center justify-content-between rounded-pill bg-light px-3 py-2">
                                        <button class="badge badge-success px-3 rounded-pill font-weight-normal botonVer" onclick="verImagen("")"><i class="fa-solid fa-magnifying-glass"></i></button>
                                        <a class="badge badge-primary px-3 rounded-pill font-weight-normal" href="../controllers/download_controller.php?space_id='.$space_id.'&file='.$file.'"><i class="fa-solid fa-download"></i></a>
                                        <button class="badge badge-danger px-3 rounded-pill font-weight-normal"><i class="fa-solid fa-trash"></i></button>
                                    </div>
                                </div>
                            </div>
                            ';
                    }else{
                        echo '<div class="col-xl-2 col-lg-4 col-md-6 mb-4">
                                <div class="bg-white rounded shadow-sm"><img src="'.$file_info['image'].'" src2="'.$ruta.'" alt="" class="img-fluid card-img-top">
                                    <div class="p-4">
                                        <h5> <p  class="text-dark">'.$file_info['filename'].'</p></h5>
                                        <p class="small text-muted mb-0">Formato: '.$file_info['extension'].'</p>
                                    </div>
                                    <div class="d-flex align-items-center justify-content-between rounded-pill bg-light px-3 py-2">
                                        <a class="badge badge-primary px-3 rounded-pill font-weight-normal" href="../controllers/download_controller.php?space_id='.$space_id.'&file='.$file.'"><i class="fa-solid fa-download"></i></a>
                                        <button class="badge badge-danger px-3 rounded-pill font-weight-normal"><i class="fa-solid fa-trash"></i></button>
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