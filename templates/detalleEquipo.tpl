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