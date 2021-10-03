<h2> tabla de equipos y divisiones</h2>
    <section  id="tabla"class="tabla_section">
        <div class="section-filtro">
            <form method="POST" action="filtrar">
                <select name="division">
                    {foreach from=$division item=$item}
                        <option>{$item->division}</option>
                    {/foreach}
                </select>
                <input type="submit" value="FILTRAR">
            </form>
            </div>
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
                        <td class="td-equipo"><a href="equipo/{$item->id_equipo}">{$item->nombre}</a></td>
                         <td>{$item->division}</td>
                        <!--<td><a href="eliminarEntrada/{$item->entrada_id}"><button class="btn"><i class="fas fa-trash-alt"></i></button></a></td>-->
                    </tr>	
                    {/foreach}
			</tbody>
        </table>
    </section>
</body>

</html>