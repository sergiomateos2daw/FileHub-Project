<?php
class removeSpace_model{
    private $db;
 
    public function __construct(){
        $this->db=Conectar::conexion();
    }

    public function remove_space($space_id, $user_id){
        //Saneamos los datos del formulario Filter_sanitize
        
        $query = "delete from spaces where id = '$space_id'";

        $this->db=Conectar::conexion();

        $stmt = $this->db->prepare($query);
        $stmt->execute();

        $path = '../Spaces/'.$user_id.'/'.$space_id;
        $this->delete_directory($path);        
        
        header('Location: ../index.php');
        exit();
    }


    function delete_directory($dir) {
        $files = scandir($dir);
        array_shift($files);    // remove '.' from array
        array_shift($files);    // remove '..' from array
       
        foreach ($files as $file) {
            $file = $dir . '/' . $file;
            if (is_dir($file)) {
                $this->delete_directory($file);
                rmdir($file);
            } else {
                unlink($file);
            }
        }
        rmdir($dir);
    }
    

}
?>