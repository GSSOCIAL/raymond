{literal}
    <style type="text/css">
    .toolbar > li.float_buttons{
        position: relative;
        height:22px;
    }
    div#S99hl1Ib_float_buttons{
        z-index: 2;
        width: auto;
        display:none;
        position: absolute;
        right: 0px;
        top: 0px;
        bottom: 0px;
    }
    div#S99hl1Ib_float_buttons div.rail_inside{
        flex-direction: column;
    }
    div#S99hl1Ib_float_buttons:not(.panel-fixed) div.rail_inside{
        padding-top:0px !important;
        padding-right: 15px;
        display: flex;
        flex-direction: row;
    }
    div#S99hl1Ib_float_buttons button{
        float: left;
        max-width: 100%;
    }
    div#S99hl1Ib_float_buttons button:last-child{
        margin-bottom:0px;
        margin-left:5px;
    }
    .ui-tooltip{
        z-index:15032;
    }
    </style>
{/literal}
{if isset($COPY_WEB_PASSWORD_BUTTON) || isset($COPY_ROOT_PASSWORD_BUTTON)}
<div id="S99hl1Ib_float_buttons">
    <div class="rail_inside">
        {if isset($COPY_WEB_PASSWORD_BUTTON)}
            {$COPY_WEB_PASSWORD_BUTTON}
        {/if}
        {if isset($COPY_ROOT_PASSWORD_BUTTON)}
            {$COPY_ROOT_PASSWORD_BUTTON}
        {/if}
    </div>
</div>
{/if}
{literal}
    <script type="text/javascript">
    $(document).ready(function(){
        if(panelS99hl1Ib = $("#S99hl1Ib_float_buttons")){
            
            //Display panel
            $(document.createElement("li")).addClass("float_buttons").append($("#S99hl1Ib_float_buttons")).insertBefore($("div.desktop-bar #quickcreatetop"));
            $("#S99hl1Ib_float_buttons").show();
        }
    });
    </script>
{/literal}