{literal}  
    <section id="comentarios-detalle">
        <div v-for="comentario in comentarios">
            <div class="comentarios-detalle">
                <h4>{{comentario.username}}</h4>
                <p class="p_coment">{{comentario.comentario}}</p>
             </div>
        </div>
    </section>    
{/literal}
