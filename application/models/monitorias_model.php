<?php
               //extendemos CI_Model
class monitorias_model extends CI_Model{
    public function __construct() {
        //llamamos al constructor de la clase padre
        parent::__construct(); 
         
        //cargamos la base de datos
        $this->load->database();
    }
     
     


    public function ver(){
        //Hacemos una consulta
        $consulta=$this->db->query("SELECT * FROM monitorias;");
         
        //Devolvemos el resultado de la consulta
        return $consulta->result();
    }
     
    public function add($materia,$monitor,$fecha,$salon){
        $consulta=$this->db->query("SELECT salon FROM monitorias WHERE salon LIKE '$salon'");
        if($consulta->num_rows()==0){
            $consulta=$this->db->query("INSERT INTO monitorias VALUES(NULL,'$materia','$monitor','$fecha','$salon');");
            if($consulta==true){
              return true;
            }else{
                return false;
            }
        }else{
            return false;
        }
    }
     
    public function mod($Id_monitorias,$modificar="NULL",$materia="NULL",$monitor="NULL",$fecha="NULL",$salon="NULL"){
        if($modificar=="NULL"){
            $consulta=$this->db->query("SELECT * FROM monitorias WHERE Id_monitorias=$Id_monitorias");
            return $consulta->result();
        }else{
          $consulta=$this->db->query("
              UPDATE monitorias SET materia='$materia', monitor='$monitor',
              fecha='$fecha', salon='$salon' WHERE Id_monitorias=$Id_monitorias;
                  ");
          if($consulta==true){
              return true;
          }else{
              return false;
          }
        }
    }
     
    public function eliminar($Id_monitorias){
       $consulta=$this->db->query("DELETE FROM monitorias WHERE Id_monitorias=$Id_monitorias");
       if($consulta==true){
           return true;
       }else{
           return false;
       }
    }
 
 
}



?>