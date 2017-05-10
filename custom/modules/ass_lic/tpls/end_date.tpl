{if $ReadOnly == "readonly"}
    {if !$fields.end_date.hidden}
        {counter name="panelFieldCount" print=false}


        {if strlen($fields.end_date.value) <= 0}
            {assign var="value" value=$fields.end_date.default_value }
        {else}
            {assign var="value" value=$fields.end_date.value }
        {/if}
        <span class="sugar_field" id="{$fields.end_date.name}">{$value}</span>
    {/if}
{else}
    {counter name="panelFieldCount" print=false}

    <span class="dateTime">
    {assign var=date_value value=$fields.end_date.value }
        <input class="date_input" autocomplete="off" type="text" name="{$fields.end_date.name}" id="{$fields.end_date.name}" value="{$date_value}" title=''  tabindex=''    size="11" maxlength="10" >
        {capture assign="other_attributes"}alt="{$APP.LBL_ENTER_DATE}" style="position:relative; top:6px" border="0" id="{$fields.end_date.name}_trigger"{/capture}
        {sugar_getimage name="jscalendar" ext=".gif" other_attributes="$other_attributes"}
    </span>
    <script type="text/javascript">
        Calendar.setup ({ldelim}
            inputField : "{$fields.end_date.name}",
            form : "EditView",
            ifFormat : "{$CALENDAR_FORMAT}",
            daFormat : "{$CALENDAR_FORMAT}",
            button : "{$fields.end_date.name}_trigger",
            singleClick : true,
            dateStr : "{$date_value}",
            startWeekday: {$CALENDAR_FDOW|default:'0'},
            step : 1,
            weekNumbers:false
            {rdelim}
        );
    </script>
{/if}
