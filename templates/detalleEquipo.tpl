<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="../styles/pageStyle.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{$titulo}</title>
</head>

<body>

    <header id="header">
        <h1 id="title">fichajes</h1>
        <div>
            <h4>iniciar sesión</h4>
            <form action="" method="post" id="form">
                <label for="username">usuario:</label>
                <input type="text" name="username" id="inputLogin">
                <label for="password">contraseña:</label>
                <input type="text" name="password" id="inputLogin">

                <input type="submit" value="Login">
            </form>
        </div> 
    </header>
    <nav id="nav">
        <ul>
            <a href="../home"><li>home</li></a>
        </ul>
    </nav>

<h2 class="titulo-detalle"> tabla de equipos y divisiones</h2>
    <section  id="tabla"class="tabla-detalle detalles">
    
        <table class="equipoDetalle">
            <thead>
                <tr>
                    <th>nombre</th>
                    <th>division</th>
                    <th>posicion</th>
                </tr>
            </thead>
           <tbody>
                    <tr >
                        <td >{$equipo->nombre}</td>
                       
                        <td >{$equipo->division}</td>
                        <td >{$equipo->posicion}</td>
                    </tr>	
                   
			</tbody>

        </table>
         <table class="descripcion">
            <thead>
                <tr>
                     <th>descripcion</th>
                </tr>
            </thead>
           <tbody>
                    <tr >
                         <td >{$equipo->descripcion}</td>
                    </tr>	
                   
			</tbody>

        </table>

        

    </section>
        
</body>

</html>