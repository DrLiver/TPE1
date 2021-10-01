<?php
/* Smarty version 3.1.39, created on 2021-10-01 21:21:23
  from 'C:\xampp\htdocs\trabajo especial\TPE1\templates\header.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_61575fb3cc0779_05263560',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '98c09557adb6bdec3fc575e33e77657a42f4f158' => 
    array (
      0 => 'C:\\xampp\\htdocs\\trabajo especial\\TPE1\\templates\\header.tpl',
      1 => 1633116079,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_61575fb3cc0779_05263560 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <base href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
">
    <link rel="stylesheet" href="styles/pageStyle.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</title>
</head>

<body>

    <header id="header">
        <h1 id="title">fichajes</h1>
        <div>
            <?php echo $_smarty_tpl->tpl_vars['loginForm']->value;?>

        </div>
    </header><?php }
}
