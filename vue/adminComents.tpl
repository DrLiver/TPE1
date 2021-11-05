{literal}  
    <section id="comentarios-detalle">
        <div v-for="comentario in comentarios">
            <div class="comentarios-detalle">
                <h4>{{comentario.username}}</h4>
                <p class="p_coment">{{comentario.comentario}}</p>
                 <div v-if="comentario.comentario">
                <button class="btn_eliminar" v-bind:id="comentario.id_comentario" @click="Evento">Eliminar</button>
                </div>
            </div>
        </div>
    </section>    
{/literal}

 