<br />
<form  id="crfid" action="#" method="post" accept-charset="utf-8">
	<input type="{if isset($dados)}text{else}hidden{/if}" name="rfi_id" {if isset($dados)}readonly=""{/if} value="{if isset($dados)}{$dados.rfi_id}{else}{$idrfid}{/if}" id="rfi_id">
	<label for="rfi_os">OS: </label><input type="text" name="rfi_os" value="{if isset($dados)}{$dados.rfi_os}{/if}" id="rfi_os">
	<label for="rfi_oc">OC: </label><input type="text" name="rfi_oc" value="{if isset($dados)}{$dados.rfi_oc}{/if}" id="rfi_oc">
	<label for="rfi_nf">NF: </label><input type="text" name="rfi_nf" value="{if isset($dados)}{$dados.rfi_nf}{/if}" id="rfi_nf">
	{if isset($dados)}	<input type="hidden" name="edit" value="edit" id="edit">{/if}
	<input type="submit" value="Salvar">
</form>
<br />