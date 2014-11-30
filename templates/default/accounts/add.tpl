{* if bill is updated or saved.*}

{if $smarty.post.customer_no != "" && $smarty.post.submit != null } 
	{include file="../templates/default/accounts/save.tpl"}
{else}
{* if no biller name was inserted *}
<script language="javascript" type="text/javascript" src="/include/china_city.js"  charset="utf-8"></script>
<body onload = initprovcity()>
<form name="frmpost" id="frmpost" action="index.php?module=accounts&amp;view=add" method="post">
<br />
<table align="center">
	<tr> 
		<td class="details_screen">{$LANG.customer_no}</td>
		<td><input type="text" name="customer_no" value="{$smarty.post.customer_no|htmlsafe}" size="120" AUTOCOMPLETE="OFF" class="validate[required]" /></td>
	</tr>
	<tr>
		<td class="details_screen">{$LANG.name}</td>
		<td><input type="text" name="name" value="{$smarty.post.name|htmlsafe}" size="120" AUTOCOMPLETE="OFF" /></td>
	</tr>
	</tr>
	<tr>
		<td class="details_screen">{$LANG.payee}</td>
		<td><input type="text" name="payee" value="{$smarty.post.payee|htmlsafe}" size="120" AUTOCOMPLETE="OFF" class="validate[required]"/></td>
	</tr>
	<tr>
		<td class="details_screen">{$LANG.bank}</td>
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

			<input type="text" name="bank" id="bank" value="{$smarty.post.bank|htmlsafe}" size="80" AUTOCOMPLETE="OFF" class="validate[required]"/>
		</td>
	</tr>
	<tr>
		<td class="details_screen">{$LANG.account_no}</td>
		<td><input type="text" name="account_no" value="{$smarty.post.account_no|htmlsafe}" size="120" AUTOCOMPLETE="OFF" class="validate[required]"/></td>
	</tr>
	<tr>
		<td class="details_screen">{$LANG.enabled}</td>
		<td>
			{html_options name=enabled options=$enabled selected=1}
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
            <button type="submit" class="positive" name="submit" value="{$LANG.insert_account}">
                <img class="button_img" src="./images/common/tick.png" alt="" /> 
                {$LANG.save}
            </button>

            <input type="hidden" name="op" value="insert_account" />
        
            <a href="./index.php?module=accounts&amp;view=manage" class="negative">
                <img src="./images/common/cross.png" alt="" />
                {$LANG.cancel}
            </a>
    
        </td>
    </tr>
</table>
</form>
</body>
{/if}
