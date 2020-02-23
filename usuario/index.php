<?php

    require 'include/usuarios.php';

    $nombre = '';
    $apellido = '';
    $email = '';
    $telefono = '';
    $fecha = '1990-01-01';
    $color = '#0000C0';
    $sel_prov = 'sel';
    $sel_cat = 'ad01';

    $nombre_ok = true;
    $apellido_ok = true;
    $email_ok = true;
    $telefono_ok = true;
    $provincia_ok = true;
    $foto_ok = true;

    if ($_POST) {
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $email = $_POST['email'];
        $telefono = $_POST['telefono'];
        $fecha = $_POST['fecha'];
        $color = $_POST['color'];
        $sel_prov = $_POST['provincia'];
        $sel_cat = $_POST['categ'];

        if (isset($_FILES['foto'])) {
            $archivo = $_FILES['foto']['name'];
            if ($_FILES['foto']['error'] == UPLOAD_ERR_OK) {
                $ext = pathinfo($archivo, PATHINFO_EXTENSION);
                if ($ext != 'jpg' && $ext != 'jpeg' && $ext != 'png' && $ext != 'bmp') {
                    $foto_ok = false;
                } else {
                    $foto = $nombre . '-' . $apellido . '.' . $ext;
                    move_uploaded_file($_FILES['foto']['tmp_name'], 'img/usuarios/' . $foto);
                }
            } else if (trim($archivo) == '') {
                $foto = 'generico.jpg';
            } else {
                $foto_ok = false;
            }
        } else {
            $foto_ok = false;
        }

        $nombre_ok = (trim($nombre) != '');
        $apellido_ok = (trim($apellido) != '');
        $email_ok = filter_var($email, FILTER_VALIDATE_EMAIL);
        $telefono_ok = filter_var($telefono,
            FILTER_VALIDATE_REGEXP,
            array('options'=>array('regexp'=>'/(\d*)*[-\s]*(\d+)[-\s]*(\d+)/'))
        );
        $provincia_ok = ($sel_prov != 'sel');
        $todo_ok = $nombre_ok && $apellido_ok && $email_ok && $telefono_ok && $provincia_ok && $foto_ok;

        if ($todo_ok) {
            header('Location: listado.php');
            $nuevo_usuario = [
                'id' => 0,
                'nombre' => $nombre,
                'apellido' => $apellido,
                'email' => $email,
                'telefono' => $telefono,
                'fechaDeNacimiento' => $fecha,
                'colorPreferido' => $color,
                'provincia' => $sel_prov,
                'categoria' => $sel_cat,
                'fotoDePerfil' => $foto,
                'contraseña' => password_hash($nombre . '|' . $apellido . '|' . $fecha, PASSWORD_DEFAULT)
            ];
            guardar_usuario($nuevo_usuario);
        }
    }

    $titulo = 'Formulario de registración';
    $stylesheets = [
        'main.css',
        'index.css'
    ];

?>

<!DOCTYPE html>
<html lang="en">

<?php require 'include/head.php'; ?>

<body>
    <div class="container">
        <h2>Completá con tus datos</h2>
        <form action="index.php" method="POST" enctype="multipart/form-data">
            <div>
                <label for="nombre">nombre</label>
                <input type="text" name="nombre" id="nombre" value="<?= $nombre ?>" class="<?= $nombre_ok ? '' : 'valor-invalido' ?>">
                <?php if (!$nombre_ok) : ?>
                    <span class="texto-valor-invalido">Por favor complete este campo</span>
                <?php endif ?>
            </div>
            <div>
                <label for="apellido">apellido</label>
                <input type="text" name="apellido" id="apellido" value="<?= $apellido ?>" class="<?= $apellido_ok ? '' : 'valor-invalido' ?>">
                <?php if (!$apellido_ok) : ?>
                    <span class="texto-valor-invalido">Por favor complete este campo</span>
                <?php endif ?>
            </div>
            <div>
                <label for="email">email</label>
                <input type="text" name="email" id="email" value="<?= $email ?>" class="<?= $email_ok ? '' : 'valor-invalido' ?>">
                <?php if (!$email_ok) : ?>
                    <span class="texto-valor-invalido">El email ingresado no es válido</span>
                <?php endif ?>
            </div>
            <div>
                <label for="telefono">telefono</label>
                <input type="text" name="telefono" id="telefono" value="<?= $telefono ?>" class="<?= $telefono_ok ? '' : 'valor-invalido' ?>">
                <?php if (!$telefono_ok) : ?>
                    <span class="texto-valor-invalido">El número de telefono ingresado no es válido</span>
                <?php endif ?>
            </div>
            <div>
                <label for="fecha">fecha de nacimiento</label>
                <input type="date" name="fecha" id="fecha" value="<?= $fecha ?>">
            </div>
            <div>
                <label for="color">color favorito</label>
                <input type="color" name="color" id="color" value="<?= $color ?>">
            </div>
            <div>
                <label for="provincia">provincia</label>
                <select name="provincia" id="provincia" class="<?= $provincia_ok ? '' : 'valor-invalido' ?>">
                    <option value="sel" <?= $sel_prov == 'sel' ? 'selected' : '' ?>>(seleccioná)</option>
                    <option value="caba" <?= $sel_prov == 'caba' ? 'selected' : '' ?>>capital federal</option>
                    <option value="bsas" <?= $sel_prov == 'bsas' ? 'selected' : '' ?>>buenos aires</option>
                    <option value="entr" <?= $sel_prov == 'entr' ? 'selected' : '' ?>>entre rios</option>
                    <option value="stafe" <?= $sel_prov == 'stafe' ? 'selected' : '' ?>>santa fe</option>
                    <option value="cord" <?= $sel_prov == 'cord' ? 'selected' : '' ?>>córdoba</option>
                </select>
                <?php if (!$provincia_ok) : ?>
                    <span class="texto-valor-invalido">Por favor seleccione una provincia</span>
                <?php endif ?>
            </div>
            <div>
                <label>categoría</label>
                <input type="radio" name="categ" id="categ" value="ad01" <?= $sel_cat == 'ad01' ? 'checked' : '' ?>>
                <span> AD01 </span>
                <input type="radio" name="categ" id="categ" value="bf03" <?= $sel_cat == 'bf03' ? 'checked' : '' ?>>
                <span> BF03 </span>
                <input type="radio" name="categ" id="categ" value="ch06" <?= $sel_cat == 'ch06' ? 'checked' : '' ?>>
                <span> CH06 </span>
            </div>
            <div id="foto-perfil">
                <label for="foto">Foto del perfil</label>
                <input type="file" name="foto" id="foto" class="<?= $foto_ok ? '' : 'valor-invalido' ?>">
                <?php if (!$foto_ok) : ?>
                    <span class="texto-valor-invalido">La imagen no se pudo cargar</span>
                <?php endif ?>
            </div>
            <div>
                <input type="submit" value="enviar">
            </div>
        </form>
    </div>
</body>
</html>