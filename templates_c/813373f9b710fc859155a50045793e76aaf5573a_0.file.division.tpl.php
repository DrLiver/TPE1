<?php
/* Smarty version 3.1.39, created on 2021-10-01 03:52:35
  from 'C:\xampp\htdocs\trabajo especial\TPE1\templates\division.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_615669e3024c96_82672235',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '813373f9b710fc859155a50045793e76aaf5573a' => 
    array (
      0 => 'C:\\xampp\\htdocs\\trabajo especial\\TPE1\\templates\\division.tpl',
      1 => 1633053126,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_615669e3024c96_82672235 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="./styles/pageStyle.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $_smarty_tpl->tpl_vars['titulo']->value;?>
</title>
</head>

<body>

    <header id="header">
        <h1 id="title">fichajes</h1>
        <div>
            <h4>iniciar sesión</h4>
            <form action="" method="post" id="form">
                <label for="username">usuario:</label>
                <input type="text" name="username" id="inputLogin">
                <label for="password">contraseña:</label>
                <input type="text" name="password" id="inputLogin">

                <input type="submit" value="Login">
            </form>
        </div>
    </header>
    <nav id="nav">
        <ul>
            <li>home</li>
        </ul>
    </nav>

<h2> tabla de equipos y divisiones</h2>
    <section  id="tabla"class="tabla_section">
    <form method="POST" action="verDetalle">
        <select>
            <option name="Primera" value="Primera">Primera</option>
            <option name="Primera B Nacional" value="Primera B Nacional">Primera B Nacional</option>
            
    </select>
     <input type="submit" value="Guardar"> 
    </form>
        <table>
            <thead>
                <tr>
                    <th>nombre</th>
                    
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
                        <td class="td-equipo"><?php echo $_smarty_tpl->tpl_vars['item']->value->nombre;?>
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
