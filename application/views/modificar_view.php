<!DOCTYPE HTML>
<html lang="es">
    <head>
        <meta charset="UTF-8" />
        <title>Modificar monitores</title>
    </head>
    <body>
        <h2>Modificar usuario</h2>
        <form action="" method="POST">
            <?php foreach ($mod as $fila){ ?>
            <input type="nombre" name="nombres" value="<?=$fila->nombres?>"/>
            <input type="apellido" name="apellidos" value="<?=$fila->apellidos?>"/>
            <input type="text" name="programa" value="<?=$fila->programa?>"/>
            <input type="text"  name="semestre" value="<?=$fila->semestre?>"/>
            <input type="number" name="cedula" value="<?=$fila->cedula?>"/>
            <input type="email"  name="email" value="<?=$fila->email?>"/>
            <input type="submit" name="submit" value="Modificar"/>
            <?php } ?>
        </form>
        <a href="<?=base_url()?>">Volver</a>
    </body>
</html>