<section  id="tabla"class="tabla_section">
        <table>
            <thead>
                <tr>
                    <th>usuario</th>
                    <th>acción</th>
                </tr>
            </thead>
           <tbody class="filas">
                {foreach from=$users item=$user}
                    <tr>
                        <td class="td-equipo">{$user->username}</td>
                        <td>{$user->password}</td>
                    </tr>
                {/foreach}
			</tbody>
        </table>
</section>