<?php
/* Smarty version 3.1.39, created on 2021-10-01 20:32:20
  from 'C:\xampp\htdocs\test\TPE1\templates\header.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_6157543461b5e4_52515143',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '4bf11d87e458ce19b5a102a4f09841ab0c3d2644' => 
    array (
      0 => 'C:\\xampp\\htdocs\\test\\TPE1\\templates\\header.tpl',
      1 => 1633113139,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6157543461b5e4_52515143 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
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
