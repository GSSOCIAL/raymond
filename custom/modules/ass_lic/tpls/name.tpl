{if $ReadOnly == "readonly"}
    {if !$fields.name.hidden}
        {counter name="panelFieldCount" print=false}

        {if strlen($fields.name.value) <= 0}
            {assign var="value" value=$fields.name.default_value }
        {else}
            {assign var="value" value=$fields.name.value }
        {/if}
        <span class="sugar_field" id="{$fields.name.name}">{$fields.name.value}</span>
    {/if}
{else}
    {counter name="panelFieldCount" print=false}

    {if strlen($fields.name.value) <= 0}
        {assign var="value" value=$fields.name.default_value }
    {else}
        {assign var="value" value=$fields.name.value }
    {/if}
    <input type='text' name='{$fields.name.name}'
           id='{$fields.name.name}' size='30'
           maxlength='8'
           value='{$value}' title=''      >
{/if}
