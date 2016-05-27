<?php
/* Smarty version 3.1.29, created on 2016-05-03 21:18:23
  from "/var/www/multitheftauto.de/web/templates/menu.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_5728f97f4be344_54947882',
  'file_dependency' => 
  array (
    'be90f3bc44c147b00bf8e08c545a86d602cb2b45' => 
    array (
      0 => '/var/www/multitheftauto.de/web/templates/menu.tpl',
      1 => 1462303097,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5728f97f4be344_54947882 ($_smarty_tpl) {
?>

        <!-- Sidebar -->
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <li class="sidebar-brand">
                    <a href="#">
                        MTA Scripting Tutorial
                    </a>
                </li>

                <?php
$_from = $_smarty_tpl->tpl_vars['files']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_file_0_saved_item = isset($_smarty_tpl->tpl_vars['file']) ? $_smarty_tpl->tpl_vars['file'] : false;
$_smarty_tpl->tpl_vars['file'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['file']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['file']->value) {
$_smarty_tpl->tpl_vars['file']->_loop = true;
$__foreach_file_0_saved_local_item = $_smarty_tpl->tpl_vars['file'];
?>
                    <li>
                        <a href="/?page=<?php echo $_smarty_tpl->tpl_vars['file']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['file']->value;?>
</a>
                    </li>
                    
                <?php
$_smarty_tpl->tpl_vars['file'] = $__foreach_file_0_saved_local_item;
}
if ($__foreach_file_0_saved_item) {
$_smarty_tpl->tpl_vars['file'] = $__foreach_file_0_saved_item;
}
?>

                
            </ul>
        </div>
<?php }
}
