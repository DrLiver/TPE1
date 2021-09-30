<?php
/* Smarty version 3.1.39, created on 2021-09-30 23:00:37
  from 'C:\xampp\htdocs\trabajo especial\TPE1\templates\home.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_61562575337d68_23465875',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ad41fa81c808acb5f184267c34a72f5cfd6d69c2' => 
    array (
      0 => 'C:\\xampp\\htdocs\\trabajo especial\\TPE1\\templates\\home.tpl',
      1 => 1633035635,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_61562575337d68_23465875 (Smarty_Internal_Template $_smarty_tpl) {
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
                        <td><?php echo $_smarty_tpl->tpl_vars['item']->value->nombre;?>
</td>
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
