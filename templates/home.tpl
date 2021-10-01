<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="./styles/pageStyle.css">
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
            <li>home</li>
        </ul>
    </nav>

<h2> tabla de equipos y divisiones</h2>
    <section  id="tabla"class="tabla_section">
    
        <table>
            <thead>
                <tr>
                    <th>nombre</th>
                    <th>division</th>
                </tr>
            </thead>
           <tbody class="filas">

                {foreach from=$equipo item=$item}
                    <tr >
                        <td class="td-equipo">{$item->nombre}</td>
                         <td>{$item->division}</td>
                        <!--<td><a href="eliminarEntrada/{$item->entrada_id}"><button class="btn"><i class="fas fa-trash-alt"></i></button></a></td>-->
                    </tr>	
                    {/foreach}
			</tbody>

        </table>

    </section>
        
</body>

</html>