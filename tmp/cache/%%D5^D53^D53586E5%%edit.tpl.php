<?php /* Smarty version 2.6.18, created on 2013-12-18 22:42:34
         compiled from ../templates/default/system_defaults/edit.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'htmlsafe', '../templates/default/system_defaults/edit.tpl', 3, false),)), $this); ?>
<form name="frmpost" action="index.php?module=system_defaults&amp;view=save" method="post" onsubmit="return frmpost_Validator(this)">

<h3><?php echo $this->_tpl_vars['LANG']['edit']; ?>
 <?php echo ((is_array($_tmp=$this->_tpl_vars['description'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
</h3>

<table align="center">

        <tr>
                <td><br /></td>
        </tr>
        <tr>
        <td class="details_screen"><?php echo ((is_array($_tmp=$this->_tpl_vars['description'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
</td><td><?php echo $this->_tpl_vars['value']; ?>
</td>
        </tr>
        <tr>
                <td><br /></td>
        </tr>

</tr>
</tr>
</table>
<!-- </div> -->
<table class="buttons" align="center">
    <tr>
        <td>
            <button type="submit" class="positive" name="submit" value="<?php echo $this->_tpl_vars['LANG']['save']; ?>
">
                <img class="button_img" src="./images/common/tick.png" alt="" /> 
                <?php echo $this->_tpl_vars['LANG']['save']; ?>

            </button>
			<input type="hidden" name="name" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['default'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
">
            <input type="hidden" name="op" value="update_system_defaults" />
        
            <a href="./index.php?module=system_defaults&view=manage" class="negative">
                <img src="./images/common/cross.png" alt="" />
                <?php echo $this->_tpl_vars['LANG']['cancel']; ?>

            </a>
    
        </td>
    </tr>
 </table>
 	

</form>