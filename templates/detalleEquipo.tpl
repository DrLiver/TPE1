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
     

    </section>  
    
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

        <div class="comentarios">
            <h2>Comentarios</h2>
                <section >            
                    {if $SESSION != null}
                        <form class="form_comentarios" method="post" >
                            <button type="submit" class="btn_coment enviar"value="insertarComentario">Enviar</button>
                            
                            <input type="text" id="comentario" class="input_coment"  placeholder="Comentario" >
                           
                            <input type="text" id="username" value="{$usuario->username}" hidden >  
                            <input type="number" id="id_equipo"  value="{$equipo->id_equipo}" hidden >  
                            <label class="p_coment">Puntaje</label>
                            <select id="puntuacion"  >
                            
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            </select>
                        </form>
                        {else}
                            <button class="enviar" hidden></button>
                            <input type="number" id="id_equipo"  value="{$equipo->id_equipo}" hidden >  
                        {/if}        
                </section>     
        <div>

      
            {include "vue/adminComents.tpl"}
         
                   
    
      
        
    <script src="https://cdn.jsdelivr.net/npm/vue@2/dist/vue.js"></script>
    <script src="scripts/comentarios.js"></script>
     
</body>
</html>