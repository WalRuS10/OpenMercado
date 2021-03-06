<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="./css/estilo.css" />
        <meta HTTP-EQUIV = "content-type"  CONTENT="text/html charset=iso-8859-1" />
        <title>Principal</title>
    </head>
    <body>
        <div class="cabecera">
            <div class="logo">
                <a href="../proyecto/inicio">
                    Inicio
                </a>
            </div>
            <div class="usuario">
                <? if ($_SESSION['logueado']) { ?>
                    <spam class="nomusuario">
                        <?= $_SESSION['nombre'] ?>
                    </spam>
                    <a href="../proyecto/publicar">
                        Agregar Publicacion
                    </a>    
                    <a href="../proyecto/miscompras">
                        Mis Compras
                    </a>    
                    <a href="../proyecto/misventas">
                        Mis Ventas
                    </a>    
                    <a href="../proyecto/salir">
                        Salir
                    </a>     
                <? } else { ?>
                    <spam class="nomusuario">
                        Invitado
                    </spam>
                    <a href="../proyecto/login">
                        Ingresar
                    </a>     
                    <a href="../proyecto/registro">
                        Registrarse
                    </a>     
                <? } ?>

            </div>
        </div>
        <div class="busqueda">
            <form action="../proyecto/buscar" method="POST">
                <table style="width:100%">
                    <tr>
                        <td style="width: 90%">
                            <input class="cuadrotextobusqueda" type="text" name="txtbusqueda" />    
                        </td>
                        <td>

                        </td>
                        <td>
                            <input class="boton" type="submit" name="buscar" value='Buscar'/>                            
                        </td>
                    </tr>
                </table>
            </form>
        </div>
        <div class="areatitulopagina">
            Ultimas publicaciones
        </div>
        <div class="bloqueprincipal">            
            <?
            if (isset($this->listaUltimas)) {
                foreach ($this->listaUltimas as $aux_pub) {
                    ?>
                    <div class="publicacion">
                        <p>
                            <?= $aux_pub['titulo'] ?>
                        </p>
                        <p style="text-align: right">
                            <?= number_format($aux_pub['precio'], 2, ",", "") ?>$
                        </p>
                    </div>

                    <div class="opciones">
                        <table>
                            <tr>
                                <td>
                                    <a href="../proyecto/detalle-<?= $aux_pub['idpublicacion'] ?>">
                                        Ver
                                    </a>
                                </td>
                            </tr>
                        </table>
                    </div>
                <?
                }
            }
            ?>
        </div>
    </body>
</html>
