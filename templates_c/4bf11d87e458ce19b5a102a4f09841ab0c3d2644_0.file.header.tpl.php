<?php
/* Smarty version 3.1.39, created on 2021-10-09 04:34:21
  from 'C:\xampp\htdocs\test\TPE1\templates\header.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_6160ffadf118c3_61146155',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '4bf11d87e458ce19b5a102a4f09841ab0c3d2644' => 
    array (
      0 => 'C:\\xampp\\htdocs\\test\\TPE1\\templates\\header.tpl',
      1 => 1633746860,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6160ffadf118c3_61146155 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <base href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
">
    <link rel="stylesheet" href="styles/pageStyle.css">
    <?php echo '<script'; ?>
 src="https://kit.fontawesome.com/728f81b46c.js" crossorigin="anonymous"><?php echo '</script'; ?>
>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</title>
</head>

<body>

    <header id="header">
        <h1 id="title">fichajes</h1>
        <div>
        <?php if ($_smarty_tpl->tpl_vars['SESSION']->value == null) {?>
            <h4>iniciar sesión</h4>
            <form action="login" method="POST" id="form">
                <label for="username">usuario:</label>
                <input type="text" name="username" id="inputLogin">
                <label for="password">contraseña:</label>
                <input type="text" name="password" id="inputLogin">
                <input type="submit" value="Login">
            </form>
            <p id="register"><span id="loginError"><?php echo $_smarty_tpl->tpl_vars['loginError']->value;?>
</span>no tienes una cuenta? Registrate <a href="register">aquí</a></p>
        <?php }?>
        <?php if ($_smarty_tpl->tpl_vars['SESSION']->value != null) {?>
            <form action="logout" method="POST" id="form">
                <input type="submit" value="Logout">
            </form>
        <?php }?>
        </div>
    </header><?php }
}
