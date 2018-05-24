<!DOCTYPE HTML>
<html lang="es">
    <head>
        <meta charset="utf-8"/>
        <title>Monitores</title>
    </head>
    <body>
        <h2>Listado de monitores</h2>
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
        <td>Nombres</td>
        <td>Apellidos</td>
        <td>Programa</td>
        <td>Semestre</td>
        <td>cedula</td>
        <td>E-mail</td>
    </tr>
    <tr>
        <form action="<?=base_url("monitor_controller/add");?>" method="post">
            <td></td>
            <td>
               <input type="text" name="nombres" placeholder="Ingrese nombres del monitor" />
            </td>
            <td>
               <input type="text" name="apellidos" placeholder="Ingrese apellido del monitor" />
            </td>
            <td>
                <input type="text" name="programa" placeholder="Ingrese nombre del programa" />
            </td>
            <td>
                <input type="text" name="semestre" placeholder="Digite semestre del monitor" />
            </td>
            <td>
                <input type="text" name="cedula" placeholder="Digite numero de cedula del monitor" />
            </td>
            <td>
                <input type="text" name="email" placeholder="Ingrese contacto@monitor" />
            </td>
            <td>
                <input type="submit" name="submit" value="Crear Nuevo Monitor" />
            </td>
        </form>
    </tr>
<?php
foreach($ver as $fila){
?>
    <tr>
        <td>
            <?=$fila->Id_monitor;?>
        </td>
        <td>
            <?=$fila->nombres;?>
        </td>
        <td>
            <?=$fila->apellidos;?>
        </td>
        <td>
            <?=$fila->programa;?>
        </td>
        <td>
            <?=$fila->semestre;?>
        </td>
        <td>
            <?=$fila->cedula;?>
        </td>
        <td>
            <?=$fila->email;?>
        </td>
        <td>
            <a href="<?=base_url("monitor_controller/mod/$fila->Id_monitor")?>">Modificar</a>
            <a href="<?=base_url("monitor_controller/eliminar/$fila->Id_monitor")?>">Eliminar</a>
        </td>
    </tr>
<?php
    
}
?>
</table>
    </body>
</html>