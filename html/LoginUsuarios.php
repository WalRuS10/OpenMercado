<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="./css/estilo.css" />
        <meta HTTP-EQUIV = "content-type"  CONTENT="text/html charset=iso-8859-1" />
        <title>Login</title>
    </head>
    <body>
        <div class="bloqueprincipal">
            <form action="../proyecto/login" method="post">
                <table>
                    <tr>
                        <td>
                            Nombre:  
                        </td>
                        <td>
                            <input type="text" name="nombre" />
                        </td>
                        <td>
                            Password:  
                        </td>
                        <td>
                            <input type="password" name="password" />
                        </td>
                        <td>
                            <input class='boton' type="submit" name="logueo" value='Ingresar'/>
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </body>
</html>
