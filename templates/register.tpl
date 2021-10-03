<article id="registerDiv">
    <form action="registerError" method="post">
        <h3>Registrate</h3>
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