<?php /* Smarty version 2.6.18, created on 2014-02-13 21:59:41
         compiled from ../templates/default/invoices_tt/delete.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'htmlsafe', '../templates/default/invoices_tt/delete.tpl', 4, false),array('modifier', 'urlencode', '../templates/default/invoices_tt/delete.tpl', 7, false),)), $this); ?>
<?php if ($_GET['stage'] == 1): ?>

	<br />
	<?php echo $this->_tpl_vars['LANG']['confirm_delete']; ?>
 <?php echo ((is_array($_tmp=$this->_tpl_vars['preference']['pref_inv_wording'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
 <?php echo ((is_array($_tmp=$this->_tpl_vars['invoice']['id'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>

    <br />
    <br />
        <form name="frmpost" action="index.php?module=invoices_tt&amp;view=delete&amp;stage=2&amp;id=<?php echo ((is_array($_tmp=$_GET['id'])) ? $this->_run_mod_handler('urlencode', true, $_tmp) : urlencode($_tmp)); ?>
" method="post">
        <table class="buttons" align="center">
            <tr>
                <td>
                    <button type="submit" class="positive" name="submit">
                        <img class="button_img" src="./images/common/tick.png" alt="" /> 
                        <?php echo $this->_tpl_vars['LANG']['yes']; ?>

                    </button>

                    <input type="hidden" name="doDelete" value="y" />
                
                    <a href="./index.php?module=invoices_tt&amp;view=manage" class="negative">
                        <img src="./images/common/cross.png" alt="" />
                        <?php echo $this->_tpl_vars['LANG']['cancel']; ?>

                    </a>
            
                </td>
            </tr>
        </table>
        </form>	
		</table>

<?php endif; ?>

<?php if ($_GET['stage'] == 2): ?>

	<div id="top"></b></div>
	<br /><br />
	<?php echo ((is_array($_tmp=$this->_tpl_vars['preference']['pref_inv_wording'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
 <?php echo ((is_array($_tmp=$this->_tpl_vars['id'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
 <?php echo $this->_tpl_vars['LANG']['deleted']; ?>

	<br /><br />

<?php endif; ?>