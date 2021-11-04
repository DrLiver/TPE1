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
                        <input type="number" id="id_usuario" value="{$usuario->id_usuario}" hidden>  
                        <input type="number" id="id_equipo"  placeholder="{$equipo->id_equipo}" value="{$equipo->id_equipo}" hidden >  
                    </form>
                    {else}
                         <button class="enviar" hidden></button>
                {/if}    
                   
                </section>
               
                <div >
                        {foreach from=$comentarios item=$comentario}
                        <section class="comentarios-detalle">

                           
                            <h4 >{$comentario->username}</h4>
                             <p class="p_coment">{$comentario->comentario}</p>
    
                         </section>
                        {/foreach}
    
      
        </div>
        </div>
       
    <script src="scripts/comentarios.js"></script>
     
</body>
</html>