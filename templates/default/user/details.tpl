{*
* Script: details.tpl
* 	Biller details template
*
* Last edited:
* 	 2008-08-25
*
* License:
*	 GPL v3 or above
*}
<form name="frmpost" action="index.php?module=user&view=save&id={$smarty.get.id|urlencode}" method="post" id="frmpost" onsubmit="return checkForm(this);">
{if $smarty.get.action== 'view' }
<br />
<table align="center">
	<tr>
		<td class="details_screen">{$LANG.email}</td>
		<td>{$user.email|htmlsafe}</td>
	</tr>
	<tr>
		<td class="details_screen">{$LANG.role}</td>
		<td>{$user.role_name|htmlsafe}</td>
	</tr>
	<tr>
		<td class="details_screen">{$LANG.password}</td>
		<td>*********</td>
	</tr>
	<tr>
		<td class="details_screen">{$LANG.name}</td>
		<td>{$user.name|htmlsafe}</td>
	</tr>
	<tr>
		<td class="details_screen">{$LANG.street_address}</td>
		<td>{$user.street_address|htmlsafe}</td>
	</tr>
	<tr>
		<td class="details_screen">{$LANG.street_address2}</td>
		<td>{$user.street_address2|htmlsafe}</td>
	</tr>
	<tr>
		<td class="details_screen">{$LANG.city}</td>
		<td>{$user.city|htmlsafe}</td>
	</tr>
	<tr>
		<td class="details_screen">{$LANG.state}</td>
		<td>{$user.state|htmlsafe}</td>
	</tr>
	<tr>
		<td class="details_screen">{$LANG.zip_code}</td>
		<td>{$user.zip_code|htmlsafe}</td>
	</tr>
	<tr>
		<td class="details_screen">{$LANG.country}</td>
		<td>{$user.country|htmlsafe}</td>
	</tr>
	<tr>
		<td class="details_screen">{$LANG.phone}</td>
		<td>{$user.phone|htmlsafe}</td>
	</tr>
	<tr>
		<td class="details_screen">{$LANG.mobile_phone}</td>
		<td>{$user.mobile_phone|htmlsafe}</td>
	</tr>
	<tr>
		<td class="details_screen">{$LANG.fax}</td>
		<td>{$user.fax|htmlsafe}</td>
	</tr>
	<tr>
		<td class="details_screen">{$LANG.website}</td>
		<td>{$user.website|htmlsafe}</td>
	</tr>
	<tr>
		<td class="details_screen">{$LANG.logo_file} 
		<a
			class="cluetip"
			href="#"
			rel="index.php?module=documentation&amp;view=view&amp;page=help_insert_user_text"
			title="{$LANG.Logo_File}"
		>
		<img src="./images/common/help-small.png" alt="" />
		</a>
		</td>
		<td>{$user.logo}</td>
	</tr>
	<tr>
		<td class="details_screen">{$LANG.notes}</td>
		<td>{$user.notes|htmlsafe}</td>
	</tr>
	<tr>
		<td class="details_screen">{$LANG.enabled}</td>
		<td>{$user.lang_enabled|htmlsafe}</td>
	</tr>
</table>
<br />
<table class="buttons" align="center">
    <tr>
        <td>
            <a href="./index.php?module=user&view=details&id={$user.id|urlencode}&action=edit" class="positive">
                <img src="./images/famfam/report_edit.png" alt="" />
                {$LANG.edit}
            </a>

            <a href="./index.php?module=user&view=manage" class="negative">
                <img src="./images/common/cross.png" alt="" />
                {$LANG.cancel}
            </a>
    
        </td>
    </tr>
 </table>
{/if}



{if $smarty.get.action== 'edit' }


<br />
<table align="center">
	<tr>
		<td class="details_screen">{$LANG.email} 
		<a 
				class="cluetip"
				href="#"
				rel="index.php?module=documentation&amp;view=view&amp;page=help_required_field"
				title="{$LANG.Required_Field}"
		>
		<img src="./images/common/required-small.png" alt="" />
		</a>	
		</td>
		<td><input type="text" name="email" autocomplete="off" value="{$user.email|htmlsafe}" size="35" id="email"  class="validate[required]"  /></td>
	</tr>
	<tr>
		<td class="details_screen">{$LANG.role} 
			<a
				class="cluetip"
				href="#"
				rel="index.php?module=documentation&amp;view=view&amp;page=help_user_role"
				title="{$LANG.role}"
			> 
			<img src="./images/common/help-small.png" alt="" />
			</a>
		</td>
		<td>
			<select name="role">
				{foreach from=$roles item=role}
					<option {if $role.id == $user.role_id} selected {/if} value="{$role.id|htmlsafe}">{$role.name|htmlsafe}</option>
				{/foreach}
			</select>
		</td>
	</tr>
	<tr>
		<td class="details_screen">
			{$LANG.new_password}
			<a
				class="cluetip"
				href="#"
				rel="index.php?module=documentation&amp;view=view&amp;page=help_new_password"
				title="{$LANG.new_password}"
			> 
			<img src="./images/common/help-small.png" alt="" />
			</a>
		</td>
		<td>
			<input type="password" name="password_field" value="" size="25" class="validate[required]" />
		</td>
	</tr>
	<tr>
		<td class="details_screen">{$LANG.name} 
		<a 
			class="cluetip"
			href="#"
			rel="index.php?module=documentation&amp;view=view&amp;page=help_required_field"
			title="{$LANG.Required_Field}"
		>
		<img src="./images/common/required-small.png" alt="" />
		</a>
		</td>
		<td><input type="text" name="name" id="name" value="{$user.name|htmlsafe}" autocomplete="off" size="50" class="validate[required]" /></td>
	</tr>
	<tr>
		<td class="details_screen">{$LANG.street}</td>
		<td><input type="text" name="street_address" id="street_address" value="{$user.street_address|htmlsafe}" autocomplete="off" size="50" class="validate[required]" /></td>
	</tr>
	<tr>
		<td class="details_screen">{$LANG.street2}
		<a
			class="cluetip"
			href="#"
			rel="index.php?module=documentation&amp;view=view&amp;page=help_street2"
			title="{$LANG.street2}"
		> 
		<img src="./images/common/help-small.png" alt="" />
		</a>
		</td>
		<td><input type="text" name="street_address2" id="street_address2" value="{$user.street_address2|htmlsafe}" autocomplete="off" size="50" /></td>
	</tr>
	<tr>
		<td class="details_screen">{$LANG.city}</td>
		<td><input type="text" name="city" id="city" value="{$user.city|htmlsafe}" autocomplete="off" size="50" /></td>
	</tr>
	<tr>
		<td class="details_screen">{$LANG.state}</td>
		<td><input type="text" name="state" id="state" value="{$user.state|htmlsafe}" autocomplete="off" size="50" /></td>
	</tr>
	<tr>
		<td class="details_screen">{$LANG.zip}</td>
		<td><input type="text" name="zip_code" id="zip_code" value="{$user.zip_code|htmlsafe}" autocomplete="off" size="50" /></td>
	</tr>
	<tr>
		<td class="details_screen">{$LANG.country}</td>
		<td><input type="text" name="country" id="country" value="{$user.country|htmlsafe}" autocomplete="off" size="50" /></td>
	</tr>
	<tr>
		<td class="details_screen">{$LANG.phone}</td>
		<td><input type="text" name="phone" id="phone" value="{$user.phone|htmlsafe}" autocomplete="off" size="50" class="validate[required]" /></td>
	</tr>
	<tr>
		<td class="details_screen">{$LANG.mobile_phone}</td>
		<td><input type="text" name="mobile_phone" id="mobile_phone" value="{$user.mobile_phone|htmlsafe}" autocomplete="off" size="50" /></td>
	</tr>
	<tr>
		<td class="details_screen">{$LANG.fax}</td>
		<td><input type="text" name="fax" id="fax" value="{$user.fax|htmlsafe}" autocomplete="off" size="50" /></td>
	</tr>
	<tr>
		<td class="details_screen">{$LANG.website}</td>
		<td><input type="text" name="website" id="website" value="{$user.website|htmlsafe}" autocomplete="off" size="50" /></td>
	</tr>
	<tr>
		<td class="details_screen">
		{$LANG.logo_file}
		<a
			class="cluetip"
			href="#"
			rel="index.php?module=documentation&amp;view=view&amp;page=help_insert_user_text"
			title="{$LANG.Logo_File}"
		>
		<img src="./images/common/help-small.png" alt="" />
		</a>
		</td>
		<td>{html_options name=logo output=$files values=$files selected=$user.logo}</td>
	</tr>
	<tr>
		<td class="details_screen">{$LANG.notes}</td>
		<td><textarea  name="notes" id="notes" class="editor" rows="8" cols="50">{$user.notes|htmlsafe}</textarea></td>
	</tr>
	<tr>
		<td class="details_screen">{$LANG.enabled}</td>
		<td>{html_options name=enabled options=$enabled selected=$user.enabled}</td>
	</tr>
</table>
<br />
<table class="buttons" align="center">
	<tr>
		<td>
			<button type="submit" class="positive" name="save_user">
			<img class="button_img" src="./images/common/tick.png" alt="" /> 
			{$LANG.save}
			</button>			<input type="hidden" name="op" value="edit_user" />
			<input type="hidden" name="id" value="{$user.id|htmlsafe}" />
		</td>
		<td>
			<a href="./index.php?module=user&view=manage" class="negative">
			<img src="./images/common/cross.png" alt="" />
			{$LANG.cancel}
			</a>
		</td>
	</tr>
</table>
{/if}
</form>
