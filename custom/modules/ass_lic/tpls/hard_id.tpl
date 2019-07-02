{if $ReadOnly == "readonly"}
    {if !$fields.hard_id.hidden}
        {counter name="panelFieldCount" print=false}

        {if strlen($fields.hard_id.value) <= 0}
            {assign var="value" value=$fields.hard_id.default_value }
        {else}
            {assign var="value" value=$fields.hard_id.value }
        {/if}
        <span class="sugar_field" id="{$fields.hard_id.name}">{$fields.hard_id.value}</span>
    {/if}
{else}
    {counter name="panelFieldCount" print=false}

    {if strlen($fields.hard_id.value) <= 0}
        {assign var="value" value=$fields.hard_id.default_value }
    {else}
        {assign var="value" value=$fields.hard_id.value }
    {/if}
    <input type='text' name='{$fields.hard_id.name}'
           id='{$fields.hard_id.name}' size='30'
           maxlength='255'
           value='{$value}' title=''      >
{/if}
