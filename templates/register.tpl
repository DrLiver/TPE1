{include file="templates/header.tpl"}
{include file="templates/nav.tpl"}
<article id="registerDiv">
    <form action="registerMesage" method="post">
        <h1>Registrate</h1>
        <div>
            <div id="registerLabels">
                <label for="username">usuario:</label>
                <label for="password">contraseña:</label>
            </div>
            <div id="registerInputs">
                <input type="text" name="registerUsername" id="username">
                <input type="text" name="registerPassword" id="password">
            </div>
        </div>
        <p class="errorMessage">{$message}</p>
        <input type="submit" value="Registrarse Ahora">
    </form>
</article>