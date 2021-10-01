<?php
/* Smarty version 3.1.39, created on 2021-10-01 22:27:55
  from 'C:\xampp\htdocs\trabajo especial\TPE1\templates\home.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_61576f4bd6d889_75138439',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ad41fa81c808acb5f184267c34a72f5cfd6d69c2' => 
    array (
      0 => 'C:\\xampp\\htdocs\\trabajo especial\\TPE1\\templates\\home.tpl',
      1 => 1633120074,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_61576f4bd6d889_75138439 (Smarty_Internal_Template $_smarty_tpl) {
?><h2> tabla de equipos y divisiones</h2>
    <section  id="tabla"class="tabla_section">
    
        <table>
            <thead>
                <tr>
                    <th>nombre</th>
                    <th>division</th>
                </tr>
            </thead>
           <tbody class="filas">

                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['equipo']->value, 'item');
$_smarty_tpl->tpl_vars['item']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->do_else = false;
?>
                    <tr >
                        <td class="td-equipo"><a href="equipo/<?php echo $_smarty_tpl->tpl_vars['item']->value->id_equipo;?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value->nombre;?>
</a></td>
                         <td><?php echo $_smarty_tpl->tpl_vars['item']->value->division;?>
</td>
                        <!--<td><a href="eliminarEntrada/<?php echo $_smarty_tpl->tpl_vars['item']->value->entrada_id;?>
"><button class="btn"><i class="fas fa-trash-alt"></i></button></a></td>-->
                    </tr>	
                    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
			</tbody>

        </table>

    </section>
        
</body>

</html><?php }
}
