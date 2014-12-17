<?php /* Smarty version 2.6.18, created on 2014-12-13 01:00:22
         compiled from ../templates/default/invoices//header.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'htmlsafe', '../templates/default/invoices//header.tpl', 18, false),array('modifier', 'date_format', '../templates/default/invoices//header.tpl', 89, false),)), $this); ?>
<br />
<br />
<input type="hidden" name="action" value="insert" />
<table align="center" width="100%" border="1">
<tr>
<td>
<table align="center" width="100%" border="1">
	<tr>
        	<td class="details_screen"><?php echo $this->_tpl_vars['LANG']['trading_type']; ?>
</td>
		
                <td>
                <?php if ($this->_tpl_vars['trading_types'] == null): ?>
                	<p><em><?php echo $this->_tpl_vars['LANG']['no_trading_types']; ?>
</em></p>
                <?php else: ?>
                        <select name="trading_type_id" id="trading_type_id" class="trading_type_change" >
                            	<?php $_from = $this->_tpl_vars['trading_types']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['trading_type']):
?>
				    		<option <?php if ($this->_tpl_vars['trading_type']['id'] == $this->_tpl_vars['defaults']['trading_type']): ?> selected <?php endif; ?> 
					    		value="<?php echo ((is_array($_tmp=$this->_tpl_vars['trading_type']['id'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
"
						>
						<?php echo ((is_array($_tmp=$this->_tpl_vars['trading_type']['description'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>

						</option>
				<?php endforeach; endif; unset($_from); ?>
                        </select>
                <?php endif; ?>
                </td>
		
		<td class="details_screen">Summary:</td>
        </tr>
		       
               <tr>
                      <td class="details_screen">
                               <?php echo $this->_tpl_vars['LANG']['biller']; ?>

                       </td>
                       <td>
                           <?php if ($this->_tpl_vars['billers'] == null): ?>
                              <p><em><?php echo $this->_tpl_vars['LANG']['no_billers']; ?>
</em></p>
                           <?php else: ?>
                            <select name="biller_id" >
                            <?php $_from = $this->_tpl_vars['billers']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['biller']):
?>
                            <option <?php if ($this->_tpl_vars['biller']['id'] == $this->_tpl_vars['defaults']['biller']): ?> selected <?php endif; ?> value="<?php echo ((is_array($_tmp=$this->_tpl_vars['biller']['id'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['biller']['name'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
</option>
                            <?php endforeach; endif; unset($_from); ?>
                            </select>
                            <?php endif; ?>
                        </td>
			
			<td class="details_screen"><?php echo $this->_tpl_vars['LANG']['index_id']; ?>
</td>		
			<td>
				<input
					id="index_id" 
					name="index_id"
					type="text"
					class="validate[required]"
					size="54"
					<?php if ($_GET['index_id']): ?>
						 value="<?php echo $_GET['index_id']; ?>
"
					<?php else: ?>
						 value=""
					<?php endif; ?>
				/>
			</td>		
                </tr>
                <tr>
                    <td class="details_screen">
                        <?php echo $this->_tpl_vars['LANG']['customer']; ?>

                    </td>
                    <td>
                        <?php if ($this->_tpl_vars['customers'] == null): ?>
                        <em><?php echo $this->_tpl_vars['LANG']['no_customers']; ?>
</em>
                        <?php else: ?>
                            <select name="customer_id">
                            <?php $_from = $this->_tpl_vars['customers']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['customer']):
?>
                                <option <?php if ($this->_tpl_vars['customer']['customer_no'] == $this->_tpl_vars['defaultCustomerID']): ?> selected <?php endif; ?> value="<?php echo ((is_array($_tmp=$this->_tpl_vars['customer']['customer_no'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['customer']['customer_no'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
-<?php echo ((is_array($_tmp=$this->_tpl_vars['customer']['name'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
</option>
                            <?php endforeach; endif; unset($_from); ?>
                            </select>
                        <?php endif; ?>
                    </td>
		    
		    	<td class="details_screen"><?php echo $this->_tpl_vars['LANG']['date_time']; ?>
</td>
			<td wrap="nowrap">
		                <input
		    		type="text" 
		    		class="validate[required,custom[date],length[0,19]]" 
		    		size="54" 
		    		name="date" 
		    		id="date1" 
		    		<?php if ($_GET['date']): ?>
		    		    value="<?php echo $_GET['date']; ?>
"
		    		<?php else: ?>
		                        value="<?php echo ((is_array($_tmp=time())) ? $this->_run_mod_handler('date_format', true, $_tmp, "%Y-%m-%d %H:%M:%S") : smarty_modifier_date_format($_tmp, "%Y-%m-%d %H:%M:%S")); ?>
"
		    		<?php endif; ?> 
		    		/>   
		        </td>
                </tr>
       </table>
       </td></tr>
       <tr><td>