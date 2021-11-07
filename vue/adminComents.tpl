{if ($SESSION != '') && ($admin == 1)}
{literal} 
    <section id="comentarios-detalle">
        <h4 class="h4-puntaje"> <i class="far fa-star"></i>| {{puntaje}}</h4>
        <div v-for="comentario in comentarios">
            <div class="comentarios-detalle">
                <h4>{{comentario.username}} • <span class="hora">{{comentario.fecha}}</span> | <i class="far fa-star" title="puntaje"></i> {{comentario.puntaje}} </h4>
                <p class="p_coment">{{comentario.comentario}}</p>
                <div v-if="comentario.comentario">
                    <button class="btn_eliminar btn" v-bind:id="comentario.id_comentario" @click="Evento"><i class="fas fa-trash-alt"></i></button>
                </div>
            </div>
        </div>
    </section>    
{/literal}
    {else}
        {literal}      
            <section id="comentarios-detalle">
            <h4 class="h4-puntaje"> <i class="far fa-star"></i>| {{puntaje}}</h4>
                <div v-for="comentario in comentarios">
                    <div class="comentarios-detalle">
                        <h4>{{comentario.username}} • |  <i class="far fa-star" title="puntaje"></i> {{comentario.puntaje}}</h4>
                        <p class="p_coment">{{comentario.comentario}}</p>
                        </div>
                </div>
            </section>    
        {/literal}
{/if}

 