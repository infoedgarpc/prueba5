<!DOCTYPE HTML>
<html lang="es">
    <head>
        <meta charset="utf-8"/>
        <title>Monitorias</title>
    </head>
    <body>
        <h2>Listado de monitorias</h2>
        <?php
        //Si existen las sesiones flasdata que se muestren
            if($this->session->flashdata('correcto'))
                echo $this->session->flashdata('correcto');
             
            if($this->session->flashdata('incorrecto')) 
                echo $this->session->flashdata('incorrecto');
        ?>
<table border="1">
    <tr>
        <td>COD</td>
        <td>Materia</td>
        <td>Monitor</td>
        <td>Fecha</td>
        <td>Salon</td>
        
    </tr>
    <tr>
        <form action="<?=base_url("monitorias_controller/add");?>" method="post">
            <td></td>
            <td>
               <input type="text" name="materia" placeholder="Ingrese materia" />
            </td>
            <td>
              <select name="monitor">
<option value="none" selected="selected">------------Seleccionar Monitor------------</option>

<?php foreach($monitor as $monitor):?>
<option value="<?php echo $monitor->Id_monitor?>"><?php echo $monitor->monitor?></option>
<?php endforeach;?>
</select>
            </td>
            <td>
                <input type="date" name="Fecha" placeholder="Ingrese fecha " />
            </td>
            <td>
                <input type="text" name="salon" placeholder="Digite ingrese salon" />
            </td>
            
            <td>
                <input type="submit" name="submit" value="Crear Nueva monitorias" />
            </td>
        </form>
    </tr>
<?php
foreach($ver as $fila){
?>
    <tr>
        <td>
            <?=$fila->Id_monitorias;?>
        </td>
        <td>
            <?=$fila->materia;?>
        </td>
        <td>
            <?=$fila->monitor;?>
        </td>
        <td>
            <?=$fila->fecha;?>
        </td>
        <td>
            <?=$fila->salon;?>
        </td>
        
        <td>
            <a href="<?=base_url("monitorias_controller/mod/$fila->Id_monitorias")?>">Modificar</a>
            <a href="<?=base_url("monitorias_controller/eliminar/$fila->Id_monitorias")?>">Eliminar</a>
        </td>
    </tr>
<?php
    
}
?>
</table>
    </body>
</html>