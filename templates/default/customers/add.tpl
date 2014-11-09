{if $smarty.post.name != "" && $smarty.post.name != null } 
	{include file="../templates/default/customers/save.tpl"}

{else}
{if $smarty.post.id !=null} 
{*
		<div class="validation_alert"><img src="./images/common/important.png" alt="" />
		You must enter a description for the Customer</div>
		<hr />
*}
{/if}	
<form name="frmpost" action="index.php?module=customers&amp;view=add" method="post" id="frmpost" onsubmit="return checkForm(this);">
<br />
<table align="center">
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
		<td><input type="text" name="name" id="name" value="{$smarty.post.name|htmlsafe}" size="100" AUTOCOMPLETE="OFF" class="validate[required]" /></td>
	</tr>
	</tr>
		<td class="details_screen">{$LANG.attention_short}
		<a
			rel="index.php?module=documentation&amp;view=view&amp;page=help_customer_contact"
			href="#"
			class="cluetip"
			title="{$LANG.customer_contact}"
		>
		<img src="./images/common/help-small.png" alt="" />
		</a>
		</td>
		<td><input type="text" name="attention" value="{$smarty.post.attention|htmlsafe}" size="100" AUTOCOMPLETE="OFF"/></td>
	</tr>
	<tr>
		<td class="details_screen">{$LANG.id_document}
			<a
				rel="index.php?module=documentation&amp;view=view&amp;page=help_id_document"
				href="#"
				class="cluetip"
				title="{$LANG.id_document}"
			>
		 	<img src="./images/common/help-small.png" alt="" />
		 </a>
		 </td>
		<td><input type="text" name="id_document" value="{$smarty.post.id_document|htmlsafe}" size="100" AUTOCOMPLETE="OFF"/></td>
	</tr>
	<tr>
		<td class="details_screen">{$LANG.id_no}</td>
		<td><input type="text" name="id_no" value="{$smarty.post.id_no|htmlsafe}" size="100" AUTOCOMPLETE="OFF"/></td>
	</tr>
	<tr>
		<td class="details_screen">{$LANG.phone}</td>
		<td><input type="text" name="phone" value="{$smarty.post.phone|htmlsafe}" size="100" AUTOCOMPLETE="OFF"/></td>
	</tr>
	<tr>
		<td class="details_screen">{$LANG.mobile_phone}</td>
		<td><input type="text" name="mobile_phone" value="{$smarty.post.mobile_phone|htmlsafe}" size="100" AUTOCOMPLETE="OFF"/></td>
	</tr>
	<tr>
		<td class="details_screen">{$LANG.fax}</td>
		<td><input type="text" name="fax" value="{$smarty.post.fax|htmlsafe}" size="100" AUTOCOMPLETE="OFF"/></td>
	</tr>
	<tr>
		<td class="details_screen">{$LANG.email}</td>
		<td><input type="text" name="email" value="{$smarty.post.email|htmlsafe}" size="100" AUTOCOMPLETE="OFF"/></td>
	</tr>
	<tr>
		<td class="details_screen">{$LANG.website}</td>
		<td><input type="text" name="website" value="{$smarty.post.website|htmlsafe}" size="100" AUTOCOMPLETE="OFF"/></td>
	</tr>
	<tr>
		<td class="details_screen">{$LANG.street}</td>
		<td><input type="text" name="street_address" value="{$smarty.post.street_address|htmlsafe}" size="100" AUTOCOMPLETE="OFF"/></td>
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
		<td><input type="text" name="street_address2" value="{$smarty.post.street_address2|htmlsafe}" size="100" AUTOCOMPLETE="OFF"/></td>
	</tr>
	<tr>
		<td class="details_screen">{$LANG.city}</td>
		<td><input type="text" name="city" value="{$smarty.post.city|htmlsafe}" size="100" AUTOCOMPLETE="OFF"/></td>
	</tr>
	<tr>
		<td class="details_screen">{$LANG.state}</td>
		<td><input type="text" name="state" value="{$smarty.post.state|htmlsafe}" size="100" AUTOCOMPLETE="OFF"/></td>
	</tr>
	<tr>
		<td class="details_screen">{$LANG.zip}</td>
		<td><input type="text" name="zip_code" value="{$smarty.post.zip_code|htmlsafe}" size="100" AUTOCOMPLETE="OFF"/></td>
	</tr>
	<tr>
		<td class="details_screen">{$LANG.country}</td>
		<td><input type="text" name="country" value="{$smarty.post.country|htmlsafe}" size="100" AUTOCOMPLETE="OFF"/></td>
	</tr>
	<tr>
		<td class="details_screen">{$LANG.notes}</td>
		<td><textarea  name="notes" rows="5" cols="85">{$smarty.post.notes|outhtml}</textarea></td>
	</tr>
	<tr>
		<td class="details_screen">{$LANG.enabled}</td>
		<td>
			{html_options name=enabled options=$enabled selected=1}
		</td>
	</tr>

</table>
<br />
<table class="buttons" align="center">
    <tr>
        <td>
            <button type="submit" class="positive" name="id" value="{$LANG.save}">
                <img class="button_img" src="./images/common/tick.png" alt="" /> 
                {$LANG.save}
            </button>
		</td>
		<td>
            <input type="hidden" name="op" value="insert_customer" />
        
            <a href="./index.php?module=customers&amp;view=manage" class="negative">
                <img src="./images/common/cross.png" alt="" />
                {$LANG.cancel}
            </a>
    
        </td>
    </tr>
</table>
</form>
{/if}
