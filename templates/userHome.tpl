<h2> Administrar equipos y divisiones</h2>
<h2 class="error"> {$error}</h2>
    <section  id="tabla"class="tabla_user">
         <table>
            <thead>
                <tr>
                    <th>nombre</th>
                    <th class="eliminar">Eliminar y Modificar</th>
                </tr>
            </thead>
           <tbody class="filas">
                {foreach from=$equipo item=$item}
                    <tr >
                        <td class="td-equipo"><a href="equipo/{$item->id_equipo}">{$item->nombre}</a></td>
                        <td><a href="eliminarEquipo/{$item->id_equipo}"><button class="btn"><i class="fas fa-trash-alt"></i></button></a></button></a><button type="button"class="btn"><i class="far fa-edit"></i></button></td>
                    </tr>	
                    {/foreach}
			</tbody>
        </table>
         <table>
            <thead>
                <tr>
                    <th>divisiones</th>
                    <th class="eliminar">Eliminar y Modificar</th>
                </tr>
            </thead>
           <tbody class="filas">
                {foreach from=$division item=$divisiones}
                    <tr>
                        <td class="td-equipo">{$divisiones->division}</a></td>                         
                        <td><a href="eliminarDivision/{$divisiones->id_division}"><button class="btn"><i class="fas fa-trash-alt"></i></button></a><button type="button"class="btn"><i class="far fa-edit"></i></button></td>   
                    </tr>	
                {/foreach}
			</tbody>
        </table>
        <form action="agregarEquipo" method="POST" class="form_agregar">
			<h1 class="suscribete_title">Agregar equipos</h1>
			<select  class="form_input" name="division">
				{foreach from=$division item=$item}
				<option>{$item->division}</option>
				{/foreach}
			</select>
			<input class="form_input " name="equipo" type="text" placeholder="equipo">
			<textarea class="form_input " name="descripcion" type="text" placeholder="descripcion"></textarea>
			<input class="form_input " name="posicion" type="number" placeholder="posicion" min="1" max=13  >
			<button name="btn-agregar" type="submit" class="btns">Agregar Equipo</button>
		</form>

            <form action="agregarDivision" method="POST" class="form_agregar">
                <h1 class="suscribete_title">Agregar divisiones</h1>
                <input class="form_input " name="division" type="text" placeholder="Division">
                <input class="form_input " name="cantidad" type="number" placeholder="Cantidad de equipos">
                <button name="btn-agregar" type="submit" class="btns">Agregar Division</button>
		    </form>
    </section>

    
</body>

</html>