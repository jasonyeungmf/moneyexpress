{if $smarty.get.action == 'view' }
<br />
<table align="center" border="1">
	<tr>
		<td colspan="2" align="center" class="align_center"><i>{$LANG.customer_details}</i></td>
		<td align="center" class="align_center">{$LANG.id_document}</td>
	</tr>

	<tr>
		<td>{$LANG.customer_no}</td>
		<td>{$customer.customer_no}</td>
		<td rowspan="18" align="center" class="align_left">
			<img src="images/id_document/{$customer.id_document}" width='100%' alt=""/> 
		</td>
	</tr>

	<tr>
		<td>{$LANG.name}</td>
		<td>{$customer.name}</td>
	</tr>

	<tr>
		<td>{$LANG.attention_short}
			<a
				rel="index.php?module=documentation&amp;view=view&amp;page=help_customer_contact"
				href="#"
				class="cluetip"
				title="{$LANG.customer_contact}"
			>
				<img src="./images/common/help-small.png" alt="" />
			</a>
		</td>
		<td>{$customer.attention|htmlsafe}</td>
	</tr>

	<tr>
		<td>{$LANG.id_no}</td>
		<td>{$customer.id_no}</td>
	</tr>

	<tr>
		<td>{$LANG.phone}</td>
		<td>{$customer.phone|htmlsafe}</td>
	</tr>

	<tr>
		<td>{$LANG.mobile_phone}</td>
		<td>{$customer.mobile_phone|htmlsafe}</td>
	</tr>

	<tr>
		<td>{$LANG.fax}</td>
		<td>{$customer.fax|htmlsafe}</td>
	</tr>

	<tr>
		<td>{$LANG.email}</td>
		<td>{$customer.email|htmlsafe}</td>
	</tr>

	<tr>
		<td>{$LANG.website}</td>
		<td>{$customer.website|htmlsafe}</td>
	</tr>

	<tr>
		<td>{$LANG.street_address}</td>
		<td>{$customer.street_address|htmlsafe}</td>
	</tr>

	<tr>
		<td>{$LANG.street_address2}
			<a
				class="cluetip"
				href="#"
				rel="index.php?module=documentation&amp;view=view&amp;page=help_street2"
				title="{$LANG.street2}"
			> 
				<img src="./images/common/help-small.png" alt="" />
			</a>
		</td>
		<td>{$customer.street_address2|htmlsafe}</td>
	</tr>

	<tr>
		<td>{$LANG.city}</td>
		<td>{$customer.city|htmlsafe}</td>
	</tr>

	<tr>
		<td>{$LANG.zip}</td>
		<td>{$customer.zip_code|htmlsafe}</td>
	</tr>

	<tr>
		<td>{$LANG.state}</td>
		<td>{$customer.state|htmlsafe}</td>
	</tr>

	<tr>
		<td>{$LANG.country}</td>
		<td>{$customer.country|htmlsafe}</td>
	</tr>

	<tr>
		<td>{$LANG.notes}</td>
		<td>{$customer.notes|htmlsafe}</td>
	</tr>

	<tr>
		<td>{$LANG.enabled}</td>
		<td>{$customer.wording_for_enabled|htmlsafe}</td>
	</tr>

	<tr>
		<td>{$LANG.customer_total}</td>
		<td>{$stuff.total|number_format:2}</td>
	</tr>
</table>
<br />

<table class="buttons" align="center">
    <tr>
        <td>
            <a href="./index.php?module=customers&amp;view=details&amp;customer_no={$customer.customer_no|urlencode}&amp;action=edit" class="positive">
                <img src="./images/common/tick.png" alt="" />
                {$LANG.edit}
            </a>
    
        </td>
    </tr>
</table>
{/if}

{if $smarty.get.action == 'edit' }

<form name="frmpost" action="index.php?module=customers&amp;view=save&amp;customer_no={$customer.customer_no|urlencode}" method="post" id="frmpost" onsubmit="return checkForm(this);">
<br />
<table align="center">
	<tr>
		<td class="details_screen">{$LANG.customer_no}</td>
		<td>{$customer.customer_no}</td>
	</tr>

	<tr>
		<td class="details_screen">{$LANG.name}
		<a 
				class="cluetip"
				href="#"
				rel="index.php?module=documentation&amp;view=view&amp;page=help_required_field"
				title="{$LANG.Required_Field}"
		>
		<img src="./images/common/required-small.png" alt="" /></a>
		</td>
		<td><input type="text" name="name" value="{$customer.name|htmlsafe}" size="100" class="validate[required]" AUTOCOMPLETE="OFF"/></td>
	</tr>
	<tr>
		<td class="details_screen">{$LANG.attention_short}
		<a
			rel="index.php?module=documentation&amp;view=view&amp;page=help_customer_contact"
			href="#"
			class="cluetip"
			title="{$LANG.customer_contact}"
		>
		 <img src="./images/common/help-small.png" alt="" /></a>
		</td>
		<td><input type="text" name="attention" value="{$customer.attention|htmlsafe}" size="100" AUTOCOMPLETE="OFF"/></td>
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
		 <td><input type="text" name="id_document" value="{$customer.id_document|htmlsafe}" size="100" AUTOCOMPLETE="OFF"/></td>
	</tr>
	
	<tr>
		<td class="details_screen">{$LANG.id_no}</td>
		<td><input type="text" name="id_no" value="{$customer.id_no|htmlsafe}" size="100" AUTOCOMPLETE="OFF"/></td>
	</tr>
	<tr>
		<td class="details_screen">{$LANG.phone}</td>
		<td><input type="text" name="phone" value="{$customer.phone|htmlsafe}" size="100" AUTOCOMPLETE="OFF"/></td>
	</tr>
	<tr>
		<td class="details_screen">{$LANG.mobile_phone}</td>
		<td><input type="text" name="mobile_phone" value="{$customer.mobile_phone|htmlsafe}" size="100" AUTOCOMPLETE="OFF"/></td>
	</tr>
	<tr>
		<td class="details_screen">{$LANG.fax}</td>
		<td><input type="text" name="fax" value="{$customer.fax|htmlsafe}" size="100" AUTOCOMPLETE="OFF"/></td>
	</tr>
	<tr>
		<td class="details_screen">{$LANG.email}</td>
		<td><input type="text" name="email" value="{$customer.email|htmlsafe}" size="100" AUTOCOMPLETE="OFF"/></td>
	</tr>
	<tr>
		<td class="details_screen">{$LANG.website}</td>
		<td><input type="text" name="website" value="{$customer.website|htmlsafe}" size="100" AUTOCOMPLETE="OFF"/></td>
	</tr>
	<tr>
		<td class="details_screen">{$LANG.street}</td>
		<td><input type="text" name="street_address" value="{$customer.street_address|htmlsafe}" size="100" AUTOCOMPLETE="OFF"/></td>
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
		<td><input type="text" name="street_address2" value="{$customer.street_address2|htmlsafe}" size="100" AUTOCOMPLETE="OFF"/></td>
	</tr>
	<tr>
		<td class="details_screen">{$LANG.city}</td>
		<td><input type="text" name="city" value="{$customer.city|htmlsafe}" size="100" AUTOCOMPLETE="OFF"/></td>
	</tr>
	<tr>
		<td class="details_screen">{$LANG.zip}</td>
		<td><input type="text" name="zip_code" value="{$customer.zip_code|htmlsafe}" size="100" AUTOCOMPLETE="OFF"/></td>
	</tr>
	<tr>
		<td class="details_screen">{$LANG.state}</td>
		<td><input type="text" name="state" value="{$customer.state|htmlsafe}" size="100" AUTOCOMPLETE="OFF"/></td>
	</tr>
	<tr>
		<td class="details_screen">{$LANG.country}</td>
		<td><input type="text" name="country" value="{$customer.country|htmlsafe}" size="100" AUTOCOMPLETE="OFF"/></td>
	</tr>
	<tr>
		<td class="details_screen">{$LANG.notes}</td>
		<td><textarea  name="notes"  rows="5" cols="85">{$customer.notes|outhtml}</textarea></td>
	</tr>
	{*
		{showCustomFields categorieId="2" itemId=$smarty.get.customer }
	*}
	<tr>
		<td class="details_screen">{$LANG.enabled}</td>
		<td>
			{html_options name=enabled options=$enabled selected=$customer.enabled}
		</td>
	</tr>
</table>


<br />

<table class="buttons" align="center">
    <tr>
        <td>
            <button type="submit" class="positive" name="save_customer" value="{$LANG.save_customer}">
                <img class="button_img" src="./images/common/tick.png" alt="" /> 
                {$LANG.save}
            </button>

            <input type="hidden" name="op" value="edit_customer">
        
            <a href="./index.php?module=customers&amp;view=manage" class="negative">
                <img src="./images/common/cross.png" alt="" />
                {$LANG.cancel}
            </a>
    
        </td>
    </tr>
</table>

</form>
{/if}
