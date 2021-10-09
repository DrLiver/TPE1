<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <base href="{$BASE_URL}">
    <link rel="stylesheet" href="styles/pageStyle.css">
    <script src="https://kit.fontawesome.com/728f81b46c.js" crossorigin="anonymous"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{$title}</title>
</head>

<body>

    <header id="header">
        <h1 id="title">fichajes</h1>
        <div>
        {if $SESSION eq null}
            <h4>iniciar sesión</h4>
            <form action="login" method="POST" id="form">
                <label for="username">usuario:</label>
                <input type="text" name="username" id="inputLogin">
                <label for="password">contraseña:</label>
                <input type="text" name="password" id="inputLogin">
                <input type="submit" value="Login">
            </form>
            <p id="register"><span id="loginError">{$loginError}</span>no tienes una cuenta? Registrate <a href="register">aquí</a></p>
        {/if}
        {if $SESSION neq null}
            <form action="logout" method="POST" id="form">
                <input type="submit" value="Logout">
            </form>
        {/if}
        </div>
    </header>