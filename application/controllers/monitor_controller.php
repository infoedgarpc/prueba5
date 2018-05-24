<?php
                        //extendemos CI_Controller
class monitor_controller extends CI_Controller{
    public function __construct() {
        //llamamos al constructor de la clase padre
        parent::__construct(); 
         
        //llamo al helper url
        $this->load->helper("url");  
         
        //llamo o incluyo el modelo
        $this->load->model("monitor_model");
         
        //cargo la libreria de sesiones
        $this->load->library("session");
    }
     
    //controlador por defecto
    public function index(){
         
        //array asociativo con la llamada al metodo
        //del modelo
        $monitores["ver"]=$this->monitor_model->ver();
         
        //cargo la vista y le paso los datos
        $this->load->view("monitor_view",$monitores);
    }
     
    //controlador para añadir
    public function add(){
         
        //compruebo si se a enviado submit
        if($this->input->post("submit")){
         
        //llamo al metodo add
        $add=$this->monitor_model->add(
                $this->input->post("nombres"),
                $this->input->post("apellidos"),
                $this->input->post("programa"),
                $this->input->post("semestre"),
                $this->input->post("cedula"),
                $this->input->post("email")
                );
        }
        if($add==true){
            //Sesion de una sola ejecución
            $this->session->set_flashdata('correcto', 'Monitor añadido correctamente');
        }else{
            $this->session->set_flashdata('incorrecto', 'Monitor añadido correctamente');
        }
         
        //redirecciono la pagina a la url por defecto
        redirect(base_url());
    }
     
    //controlador para modificar al que 
    //le paso por la url un parametro
    public function mod($Id_monitor){
        if(is_numeric($Id_monitor)){
          $datos["mod"]=$this->monitor_model->mod($Id_monitor);
          $this->load->view("modificar_view",$datos);
          if($this->input->post("submit")){
                $mod=$this->monitor_model->mod(
                        $Id_monitor,
                        $this->input->post("submit"),
                        $this->input->post("nombres"),
                        $this->input->post("apellidos"),
                        $this->input->post("programa"),
                        $this->input->post("semestre"),
                        $this->input->post("cedula"),
                        $this->input->post("email")
                        );
                if($mod==true){
                    //Sesion de una sola ejecución
                    $this->session->set_flashdata('correcto', 'Monitor modificado correctamente');
                }else{
                    $this->session->set_flashdata('incorrecto', 'Monitor modificado correctamente');
                }
                redirect(base_url());
            }
        }else{
            redirect(base_url()); 
        }
    }
     
    //Controlador para eliminar
    public function eliminar($Id_monitor){
        if(is_numeric($Id_monitor)){
          $eliminar=$this->monitor_model->eliminar($Id_monitor);
          if($eliminar==true){
              $this->session->set_flashdata('correcto', 'Monitor eliminado correctamente');
          }else{
              $this->session->set_flashdata('incorrecto', 'Monitor eliminado correctamente');
          }
          redirect(base_url());
        }else{
          redirect(base_url());
        }
    }
}
?>