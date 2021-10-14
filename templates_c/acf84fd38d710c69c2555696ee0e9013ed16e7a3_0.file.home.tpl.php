<?php
/* Smarty version 3.1.39, created on 2021-10-14 02:19:36
  from 'C:\xampp\htdocs\test\TPE1\templates\home.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_616777986cff55_47284896',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'acf84fd38d710c69c2555696ee0e9013ed16e7a3' => 
    array (
      0 => 'C:\\xampp\\htdocs\\test\\TPE1\\templates\\home.tpl',
      1 => 1634170758,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_616777986cff55_47284896 (Smarty_Internal_Template $_smarty_tpl) {
?><h2> tabla de equipos y divisiones</h2>
    <section  id="tabla"class="tabla_section">
        <div class="section-filtro">
            <form method="POST" action="filtrar">
                <select name="division">
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['division']->value, 'item');
$_smarty_tpl->tpl_vars['item']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->do_else = false;
?>
                        <option><?php echo $_smarty_tpl->tpl_vars['item']->value->division;?>
</option>
                    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                </select>
                <input type="submit" value="FILTRAR">
            </form>
            </div>
        <table>
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Division</th>
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
