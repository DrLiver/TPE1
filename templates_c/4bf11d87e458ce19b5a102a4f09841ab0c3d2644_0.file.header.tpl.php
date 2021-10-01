<?php
/* Smarty version 3.1.39, created on 2021-10-01 21:16:52
  from 'C:\xampp\htdocs\test\TPE1\templates\header.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_61575ea45073d4_56751176',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '4bf11d87e458ce19b5a102a4f09841ab0c3d2644' => 
    array (
      0 => 'C:\\xampp\\htdocs\\test\\TPE1\\templates\\header.tpl',
      1 => 1633115811,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_61575ea45073d4_56751176 (Smarty_Internal_Template $_smarty_tpl) {
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
