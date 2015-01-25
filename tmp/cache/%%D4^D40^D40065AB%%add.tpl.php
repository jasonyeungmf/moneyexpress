<?php /* Smarty version 2.6.18, created on 2014-03-03 23:21:47
         compiled from ../templates/default/accounts/add.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'htmlsafe', '../templates/default/accounts/add.tpl', 14, false),array('function', 'html_options', '../templates/default/accounts/add.tpl', 93, false),)), $this); ?>

<?php if ($_POST['customer_no'] != "" && $_POST['submit'] != null): ?> 
	<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "../templates/default/accounts/save.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php else: ?>
<script language="javascript" type="text/javascript" src="/include/china_city.js"  charset="utf-8"></script>
<body onload = initprovcity()>
<form name="frmpost" id="frmpost" action="index.php?module=accounts&amp;view=add" method="post">
<br />
<table align="center">
	<tr> 
		<td class="details_screen"><?php echo $this->_tpl_vars['LANG']['customer_no']; ?>
</td>
		<td><input type="text" name="customer_no" value="<?php echo ((is_array($_tmp=$_POST['customer_no'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
" size="120" AUTOCOMPLETE="OFF" class="validate[required]" /></td>
	</tr>
	<tr>
		<td class="details_screen"><?php echo $this->_tpl_vars['LANG']['name']; ?>
</td>
		<td><input type="text" name="name" value="<?php echo ((is_array($_tmp=$_POST['name'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
" size="120" AUTOCOMPLETE="OFF" /></td>
	</tr>
	</tr>
	<tr>
		<td class="details_screen"><?php echo $this->_tpl_vars['LANG']['payee']; ?>
</td>
		<td><input type="text" name="payee" value="<?php echo ((is_array($_tmp=$_POST['payee'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
" size="120" AUTOCOMPLETE="OFF" class="validate[required]"/></td>
	</tr>
	<tr>
		<td class="details_screen"><?php echo $this->_tpl_vars['LANG']['bank']; ?>
</td>
		<td>
			<select name="selectbank" id="selectbank" onChange=setbank()>
			    <option value="">Bank</option>
			    <option value="农业银行">农业银行</option>
			    <option value="工商银行">工商银行</option>
			    <option value="中国银行">中国银行</option>
			    <option value="建设银行">建设银行</option>
			    <option value="交通银行">交通银行</option>
			    <option value="招商银行">招商银行</option>
			    <option value="邮政储蓄">邮政储蓄</option>
			    <option value="信用合作社">信用合作社</option>
			    <option value="农村商业银行">农村商业银行</option>
			    <option value="广发银行">广发银行</option>
			    <option value="平安银行">平安银行</option>
			    <option value="浦东发展">浦东发展</option>
			    <option value="民生银行">民生银行</option>
			    <option value="兴业银行">兴业银行</option>
			    <option value="中信银行">中信银行</option>
		    </select>

		    <Select onChange=setcity() name="prv" id="prv">
			    <OPTION value="">Province</OPTION>
			    <OPTION value=广东>广东</OPTION>
			    <OPTION value=广西>广西</OPTION>
			    <OPTION value=海南>海南</OPTION>
			    <OPTION value=四川>四川</OPTION>    
			    <OPTION value=北京>北京</OPTION>
			    <OPTION value=上海>上海</OPTION>
			    <OPTION value=重庆>重庆</OPTION>
			    <OPTION value=天津>天津</OPTION>
			    <OPTION value=福建>福建</OPTION>
			    <OPTION value=甘肃>甘肃</OPTION>
			    <OPTION value=安徽>安徽</OPTION>
			    <OPTION value=贵州>贵州</OPTION>
			    <OPTION value=河北>河北</OPTION>
			    <OPTION value=黑龙江>黑龙江</OPTION>
			    <OPTION value=河南>河南</OPTION>
			    <OPTION value=湖北>湖北</OPTION>
			    <OPTION value=湖南>湖南</OPTION>
			    <OPTION value=江苏>江苏</OPTION>
			    <OPTION value=江西>江西</OPTION>
			    <OPTION value=吉林>吉林</OPTION>
			    <OPTION value=辽宁>辽宁</OPTION>
			    <OPTION value=内蒙古>内蒙古</OPTION>
			    <OPTION value=宁夏>宁夏</OPTION>
			    <OPTION value=青海>青海</OPTION>
			    <OPTION value=山东>山东</OPTION>
			    <OPTION value=山西>山西</OPTION>
			    <OPTION value=陕西>陕西</OPTION>
			    <OPTION value=新疆>新疆</OPTION>
			    <OPTION value=西藏>西藏</OPTION>
			    <OPTION value=云南>云南</OPTION>
			    <OPTION value=浙江>浙江</OPTION>
		  </Select>
			<Select onChange=setbank() name="city" id="city"></Select>

			<input type="text" name="bank" id="bank" value="<?php echo ((is_array($_tmp=$_POST['bank'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
" size="80" AUTOCOMPLETE="OFF" class="validate[required]"/>
		</td>
	</tr>
	<tr>
		<td class="details_screen"><?php echo $this->_tpl_vars['LANG']['account_no']; ?>
</td>
		<td><input type="text" name="account_no" value="<?php echo ((is_array($_tmp=$_POST['account_no'])) ? $this->_run_mod_handler('htmlsafe', true, $_tmp) : htmlsafe($_tmp)); ?>
" size="120" AUTOCOMPLETE="OFF" class="validate[required]"/></td>
	</tr>
	<tr>
		<td class="details_screen"><?php echo $this->_tpl_vars['LANG']['enabled']; ?>
</td>
		<td>
			<?php echo smarty_function_html_options(array('name' => 'enabled','options' => $this->_tpl_vars['enabled'],'selected' => 1), $this);?>

		</td>
	</tr>
	</div>
	</div>
	</div>
	</tbody>
</table>
<br />
<table class="buttons" align="center">
    <tr>
        <td>
            <button type="submit" class="positive" name="submit" value="<?php echo $this->_tpl_vars['LANG']['insert_account']; ?>
">
                <img class="button_img" src="./images/common/tick.png" alt="" /> 
                <?php echo $this->_tpl_vars['LANG']['save']; ?>

            </button>

            <input type="hidden" name="op" value="insert_account" />
        
            <a href="./index.php?module=accounts&amp;view=manage" class="negative">
                <img src="./images/common/cross.png" alt="" />
                <?php echo $this->_tpl_vars['LANG']['cancel']; ?>

            </a>
    
        </td>
    </tr>
</table>
</form>
</body>
<?php endif; ?>