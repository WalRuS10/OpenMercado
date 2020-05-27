<!DOCTYPE html>
<html>
	<head>
            <link rel="stylesheet" type="text/css" href="./css/estilo.css" />
            <meta HTTP-EQUIV = "content-type"  CONTENT="text/html charset=iso-8859-1" />
            <title>Agregar Publicacion</title>
	</head>
	
        <body>
            <div class="bloqueprincipal">
                <form action="../proyecto/publicar" method="POST">
                    <table>
                        <tr>
                            <td>
                                <label for="titulo">
                                    Titulo
                                </label>
                            </td>
                            <td>
                                <input type="text" name="titulo" />
                            </td>
                         </tr>
                         <tr>
                             <td>
                                <label for="descripcion">
                                    Descripcion
                                </label>
                             </td>
                             <td>
                                <textarea name="descripcion">
                                </textarea>
                             </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="precio">
                                    Precio
                                </label>
                            </td>
                            <td>
                                <input type="text" name="precio" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <br />
                            </td>  
                        </tr>
                        <tr>
                            <td>
                                
                            </td>
                            <td>
                                <input class='boton' type="submit" name="guardar" value="Guardar"/>
                            </td>
                        </tr>
                    </table>
                </form>
            </div>
            
	</body>
</html>