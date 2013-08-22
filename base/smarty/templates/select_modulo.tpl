<div id="sel_modulo">Alterar Módulo:
	<select name="modulo" id="modulo" >
		<option value="0"><strong>Selecione o módulo</strong></option>
		<option value="cliente"
		{if $modulosel=="cliente"}
		selected='selected'
		{/if}
		><strjong>Cliente</strong></option>
		<option value="armazem"
		{if $modulosel=="armazem"}
		selected='selected'
		{/if}
		><strjong>Armazém</strong></option>
		<option value="enderecamento"
		{if $modulosel=="enderecamento"}
		selected='selected'
		{/if}
		><strjong>Endereçamento</strong></option>
	</select>
</div>