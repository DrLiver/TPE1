{include file="templates/header.tpl"}
{include file="templates/nav.tpl"}
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
                    <td><a href="eliminarUser/{$user->id_usuario}">Eliminar</a></td>
                </tr>
            {/foreach}
        </tbody>
    </table>
</section>