<!DOCTYPE html>
<html>
	<head>
            <link rel="stylesheet" type="text/css" href="./css/estilo.css" />
            <meta HTTP-EQUIV = "content-type"  CONTENT="text/html charset=iso-8859-1" />
            <title>Error</title>
	</head>
	
	<body>
            <div class='bloqueprincipal'>
                <h1>
                    Error
                </h1>
                <p>
                    <?=$this->listaerrores[$this->numero_error]?>
                </p>
                <p>
                    <a href="../proyecto/inicio">
                        Volver
                    </a>                    
                </p>
            </div>
	</body>
</html>