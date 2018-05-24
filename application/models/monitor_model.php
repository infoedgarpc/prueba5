<?php
               //extendemos CI_Model
class monitor_model extends CI_Model{
    public function __construct() {
        //llamamos al constructor de la clase padre
        parent::__construct(); 
         
        //cargamos la base de datos
        $this->load->database();
    }
     
    public function ver(){
        //Hacemos una consulta
        $consulta=$this->db->query("SELECT * FROM monitores;");
         
        //Devolvemos el resultado de la consulta
        return $consulta->result();
    }
     
    public function add($nombres,$apellidos,$programa,$semestre,$cedula,$email){
        $consulta=$this->db->query("SELECT cedula FROM monitores WHERE cedula LIKE '$cedula'");
        if($consulta->num_rows()==0){
            $consulta=$this->db->query("INSERT INTO monitores VALUES(NULL,'$nombres','$apellidos','$programa','$semestre','$cedula',$email);");
            if($consulta==true){
              return true;
            }else{
                return false;
            }
        }else{
            return false;
        }
    }
     
    public function mod($Id_monitor,$modificar="NULL",$nombres="NULL",$apellidos="NULL",$programa="NULL",$semestre="NULL",$cedula="NULL",$email="NULL"){
        if($modificar=="NULL"){
            $consulta=$this->db->query("SELECT * FROM monitores WHERE Id_monitor=$Id_monitor");
            return $consulta->result();
        }else{
          $consulta=$this->db->query("
              UPDATE monitores SET nombres='$nombres', apellidos='$apellidos',
              programa='$programa', semestre='$semestre', cedula=$cedula, email=$email WHERE Id_monitor=$Id_monitor;
                  ");
          if($consulta==true){
              return true;
          }else{
              return false;
          }
        }
    }
     
    public function eliminar($Id_monitor){
       $consulta=$this->db->query("DELETE FROM monitores WHERE Id_monitor=$Id_monitor");
       if($consulta==true){
           return true;
       }else{
           return false;
       }
    }
 
 
}
?>