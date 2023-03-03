<?php
    
    session_start();
    //Llamada al modelo
    $space_name = $_GET['space_name'];
    $space_id = $_GET['space_id'];
    $user_id = $_SESSION['user_id'];

    require_once("../models/filesOfSpaces_model.php");
    require_once("../db/conexion.php");

    function mostarFichero($user_id, $space_id){
        $path = "../Spaces/$user_id/$space_id";
        if ($handler = opendir($path)) {
            while (false !== ($file = readdir($handler))) {
                if($file != '.' && $file != '..'){
                    $file_info = array();
                    $pathinfo = pathinfo($file);
                    $file_info['filename'] = $pathinfo['filename'];
                    $file_info['extension'] = $pathinfo['extension'];
                    switch($file_info['extension']){
                        case 'txt':
                            $file_info['image'] = "../images/icon-files/txt.png";
                            break;
                        case 'JPG':
                            $file_info['image'] = "../images/icon-files/jpg.png";
                            break;
                        
                    }
                    echo '
                    <div class="col-xl-1">
                        <div class="bg-white rounded shadow-sm"><img src="'.$file_info['image'].'" alt="" class="img-fluid card-img-top">
                        <div class="p-4">
                            <h5> <p  class="text-dark">'.$file_info['filename'].'</p></h5>
                            <p class="small text-muted mb-0">Formato: '.$file_info['extension'].'</p>
                            </div>
                            <div class="d-flex align-items-center justify-content-between rounded-pill bg-light px-3 py-2">
                            <button class="badge badge-success px-3 rounded-pill font-weight-normal"><i class="fa-solid fa-magnifying-glass"></i></button>
                            <button class="badge badge-primary px-3 rounded-pill font-weight-normal"><i class="fa-solid fa-download"></i></button>
                            <button class="badge badge-danger px-3 rounded-pill font-weight-normal"><i class="fa-solid fa-trash"></i></button>
                        </div>
                        </div>
                    </div>
                    ';
                }
            }
            closedir($handler);
        }
    }

    class Archivo
    {

        

        public $name;
        public $type;
        public $image;

        public function __construct($name, $type, $image)
        {
            $this->name = $name;
            $this->type = $type;
            $this->image = $image;
        }


    }

    ////////////////////////////////////////////////
    
    
    ////////////////////////////////////////////////




    // $path = "../Spaces/$user_id/$space_id";
    // $files = scandir($path);
    // foreach ($files as $file){
    //     if($file != '.' && $file != '..') {
    //     $file_info = array();
    //     $pathinfo = pathinfo($file);
    //     $file_info['filename'] = $pathinfo['filename'];
    //     $file_info['extension'] = $pathinfo['extension'];
    //     if($file_info['extension'] == 'txt'){
    //         $file_info['image'] = '../images/file1.png';
    //     }else{
    //         $file_info['image'] = '../images/folder.png';
    //     }
    //     $archivo = new Archivo($file_info['filename'],$file_info['extension'],$file_info['image']);
    //     echo $archivo->image."<br />";
    //     }
    // }


    //Llamada a la vista
    require_once("../views/filesOfSpaces_view.php");
?>