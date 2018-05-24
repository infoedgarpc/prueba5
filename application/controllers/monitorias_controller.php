<?php
                        //extendemos CI_Controller
class monitorias_controller extends CI_Controller{
    public function __construct() {
        //llamamos al constructor de la clase padre
        parent::__construct(); 
         
        //llamo al helper url
        $this->load->helper("url");  
         
        //llamo o incluyo el modelo
        $this->load->model("monitorias_model");
         
        //cargo la libreria de sesiones
        $this->load->library("session");
    }
     
    //controlador por defecto
    public function index(){
        //array asociativo con la llamada al metodo
        //del modelo
        $monitorias["ver"]=$this->monitorias_model->ver();
         
        //cargo la vista y le paso los datos
        $this->load->view("monitorias_view",$monitorias);
    }
     
    //controlador para añadir
    public function add(){
         
        //compruebo si se a enviado submit
        if($this->input->post("submit")){
         
        //llamo al metodo add
        $add=$this->monitorias_model->add(
                $this->input->post("materia"),
                $this->input->post("monitor"),
                $this->input->post("fecha"),
                $this->input->post("curso")
                );
        }
        if($add==true){
            //Sesion de una sola ejecución
            $this->session->set_flashdata('correcto', 'Monitorias añadido correctamente');
        }else{
            $this->session->set_flashdata('incorrecto', 'Monitorias añadido correctamente');
        }
         
        //redirecciono la pagina a la url por defecto
        redirect(base_url());
    }
     
    //controlador para modificar al que 
    //le paso por la url un parametro
    public function mod($Id_monitorias){
        if(is_numeric($Id_monitorias)){
          $datos["mod"]=$this->monitorias_model->mod($Id_monitorias);
          $this->load->view("editar_view",$datos);
          if($this->input->post("submit")){
                $mod=$this->monitorias_model->mod(
                        $Id_monitorias,
                        $this->input->post("submit"),
                        $this->input->post("materia"),
                        $this->input->post("monitor"),
                        $this->input->post("fecha"),
                        $this->input->post("curso")
                        
                        );
                if($mod==true){
                    //Sesion de una sola ejecución
                    $this->session->set_flashdata('correcto', 'Monitorias modificado correctamente');
                }else{
                    $this->session->set_flashdata('incorrecto', 'Monitorias modificado correctamente');
                }
                redirect(base_url());
            }
        }else{
            redirect(base_url()); 
        }
    }
     
    //Controlador para eliminar
    public function eliminar($Id_monitorias){
        if(is_numeric($Id_monitorias)){
          $eliminar=$this->monitorias_model->eliminar($Id_monitorias);
          if($eliminar==true){
              $this->session->set_flashdata('correcto', 'Monitorias eliminado correctamente');
          }else{
              $this->session->set_flashdata('incorrecto', 'Monitorias eliminado correctamente');
          }
          redirect(base_url());
        }else{
          redirect(base_url());
        }
    }

}

?>