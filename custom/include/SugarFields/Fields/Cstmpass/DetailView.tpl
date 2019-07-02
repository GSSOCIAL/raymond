
{if strlen({{sugarvar key='value' string=true}}) <= 0}
{assign var="value" value={{sugarvar key='default_value' string=true}} }
{else}
{assign var="value" value={{sugarvar key='value' string=true}} }
{/if} 
<span class="sugar_field" id="{{sugarvar key='name'}}" data-clipboard-target="#{{sugarvar key='name'}}" onclick="$('#coopied_to_clipboard_{{sugarvar key='name'}}').show();">{{sugarvar key='value'}}</span>
<span id="coopied_to_clipboard_{{sugarvar key='name'}}" style="display:none; color:#CCC;">copied to clipboard</span>
<script src="custom/include/SugarFields/Fields/Cstmpass/clipboard.min.js"></script>
<script>
    new Clipboard("#{{sugarvar key='name'}}");
</script>
{{if !empty($displayParams.enableConnectors)}}
{if !empty($value)}
{{sugarvar_connector view='DetailView'}}
{/if}
{{/if}}