<?php
/* Smarty version 3.1.30, created on 2016-09-28 15:08:35
  from "E:\phpleague\Grace\GuangjuliStand\Ads\Menu\Views\Widget\Breadcrumb.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_57eb6c73859318_89966584',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '257761ceaf59623292e56167a3c4591387f93811' => 
    array (
      0 => 'E:\\phpleague\\Grace\\GuangjuliStand\\Ads\\Menu\\Views\\Widget\\Breadcrumb.tpl',
      1 => 1474452765,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_57eb6c73859318_89966584 (Smarty_Internal_Template $_smarty_tpl) {
?>
<ol class="breadcrumb">
    <?php if ($_smarty_tpl->tpl_vars['menu_breadcrumb']->value['top']) {?>
        <li><span class="<?php echo $_smarty_tpl->tpl_vars['menu_breadcrumb']->value['top']['icon'];?>
"></span> <a href="<?php echo $_smarty_tpl->tpl_vars['menu_breadcrumb']->value['top']['path'];?>
"><?php echo $_smarty_tpl->tpl_vars['menu_breadcrumb']->value['top']['title'];?>
</a></li>
    <?php }?>
    <?php if ($_smarty_tpl->tpl_vars['menu_breadcrumb']->value['parent']) {?>
        <li><span class="<?php echo $_smarty_tpl->tpl_vars['menu_breadcrumb']->value['parent']['icon'];?>
"></span> <a href="<?php echo $_smarty_tpl->tpl_vars['menu_breadcrumb']->value['parent']['path'];?>
"><?php echo $_smarty_tpl->tpl_vars['menu_breadcrumb']->value['parent']['title'];?>
</a></li>
    <?php }?>
    <?php if ($_smarty_tpl->tpl_vars['menu_breadcrumb']->value['menu']) {?>
        <li class="active"><span class="<?php echo $_smarty_tpl->tpl_vars['menu_breadcrumb']->value['menu']['icon'];?>
"></span> <a ><?php echo $_smarty_tpl->tpl_vars['menu_breadcrumb']->value['menu']['title'];?>
</a></li>
    <?php }?>
</ol><?php }
}
