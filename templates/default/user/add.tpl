{*
* Script: add.tpl
* 	Biller add template
*
* Last edited:
* 	 2008-08-25
*
* License:
*	 GPL v3 or above
*}


{if $smarty.post.email != null && $smarty.post.submit != null } 
	{include file="../templates/default/user/save.tpl"}
{else}
<form name="frmpost" action="index.php?module=user&amp;view=add" method="post" id="frmpost">
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
		<td><input type="text" name="email" id="email" value="{$smarty.post.email|htmlsafe}" autocomplete="off" size="50" class="validate[required]" /></td>
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
			<select name="role" id="role">
				{foreach from=$roles item=role}
					<option  value="{$role.id|htmlsafe}">{$role.name|htmlsafe}</option>
				{/foreach}
			</select>
		</td>
	</tr>
	<tr>
		<td class="details_screen">{$LANG.password}</td>
		<td><input type="password" name="password_field" id="password_field" value="{$smarty.post.password_field|htmlsafe}" autocomplete="off" size="50" class="validate[required]" /></td>
	</tr>
	<tr>
		<td class="details_screen">{$LANG.name}</td>
		<td><input type="text" name="name" id="name" value="{$smarty.post.name|htmlsafe}" autocomplete="off" size="50" class="validate[required]" /></td>
	</tr>
	<tr>
		<td class="details_screen">{$LANG.street}</td>
		<td><input type="text" name="street_address" id="street_address" value="{$smarty.post.street_address|htmlsafe}" autocomplete="off" size="50" class="validate[required]" /></td>
	</tr>
	<tr>
		<td class="details_screen">{$LANG.street2}</td>
		<td><input type="text" name="street_address2" id="street_address2" value="{$smarty.post.street_address2|htmlsafe}" autocomplete="off" size="50" /></td>
	</tr>
	<tr>
		<td class="details_screen">{$LANG.city}</td>
		<td><input type="text" name="city" id="city" value="{$smarty.post.city|htmlsafe}" autocomplete="off" size="50" /></td>
	</tr>
	<tr>
		<td class="details_screen">{$LANG.state}</td>
		<td><input type="text" name="state" id="state" value="{$smarty.post.state|htmlsafe}" autocomplete="off" size="50" /></td>
	</tr>
	<tr>
		<td class="details_screen">{$LANG.zip}</td>
		<td><input type="text" name="zip_code" id="zip_code" value="{$smarty.post.zip_code|htmlsafe}" autocomplete="off" size="50" /></td>
	</tr>
	<tr>
		<td class="details_screen">{$LANG.country}</td>
		<td><input type="text" name="country" id="country" value="{$smarty.post.country|htmlsafe}" autocomplete="off" size="50" /></td>
	</tr>
	<tr>
		<td class="details_screen">{$LANG.phone}</td>
		<td><input type="text" name="phone" id="phone" value="{$smarty.post.phone|htmlsafe}" autocomplete="off" size="50" class="validate[required]" /></td>
	</tr>
	<tr>
		<td class="details_screen">{$LANG.mobile_phone}</td>
		<td><input type="text" name="mobile_phone" id="mobile_phone" value="{$smarty.post.mobile_phone|htmlsafe}" autocomplete="off" size="50" /></td>
	</tr>
	<tr>
		<td class="details_screen">{$LANG.fax}</td>
		<td><input type="text" name="fax" id="fax" value="{$smarty.post.fax|htmlsafe}" autocomplete="off" size="50" /></td>
	</tr>
	<tr>
		<td class="details_screen">{$LANG.website}</td>
		<td><input type="text" name="website" id="website" value="{$smarty.post.website|htmlsafe}" autocomplete="off" size="50" /></td>
	</tr>
	<tr>
		<td class="details_screen">{$LANG.logo_file} 
			<a
				class="cluetip"
				href="#"
				rel="index.php?module=documentation&amp;view=view&amp;page=help_insert_user_text"
				title="{$LANG.Logo_File}"
			> 
			<img src="./images/common/help-small.png" alt="" /> </a>
			</td>
		<td>
			{html_options name=logo output=$files values=$files selected=$files[0] }
		</td>
	</tr>
	<tr>
		<td class="details_screen">{$LANG.notes}</td>
		<td>
			<textarea
				input type="text" class="editor" name="notes" id="notes" rows="8" cols="50">{$smarty.post.notes|htmlsafe}
			</textarea>
		</td>
	</tr>
	<tr>
		<td class="details_screen">{$LANG.enabled}</td>
		<td>{html_options name=enabled options=$enabled selected=1}</td>
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
            <button type="submit" class="positive" name="submit" value="Insert User">
                <img class="button_img" src="./images/common/tick.png" alt="" /> 
                {$LANG.save}
            </button>

            <input type="hidden" name="op" value="insert_user" />
        
            <a href="./index.php?module=user&view=manage" class="negative">
                <img src="./images/common/cross.png" alt="" />
                {$LANG.cancel}
            </a>
    
        </td>
    </tr>
</table>
</form>
{/if}
