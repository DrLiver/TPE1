{include file="templates/header.tpl"}
{include file="templates/nav.tpl"}
<h2 class="titulo-detalle"> Tabla de equipos y divisiones</h2>
    <section  id="tabla"class="tabla-detalle detalles">
        <table class="equipoDetalle">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Division</th>
                    <th>Posicion</th>
                </tr>
            </thead>
           <tbody>
                <tr class="td-equipo">
                    <td >{$equipo->nombre}</td>
                    <td >{$equipo->division}</td>
                    <td >{$equipo->posicion}</td>
                </tr>	   
			</tbody>
        </table>
         <table class="descripcion">
            <thead>
                <tr>
                     <th>Descripcion</th>
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