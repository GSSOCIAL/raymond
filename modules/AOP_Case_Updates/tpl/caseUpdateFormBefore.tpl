{literal}
    <style type="text/css">
    div#S99hl1Ib_float_buttons{
        position: absolute;
        z-index: 2;
        left: -250px;
        top:60px;
        width: auto;
        max-width: 216px;
        display:none;
    }
    div#S99hl1Ib_float_buttons div.rail_inside{
        display: flex;
        flex-direction: column;
    }
    div#S99hl1Ib_float_buttons:not(.panel-fixed) div.rail_inside{
        padding-top:0px !important;
    }
    div#S99hl1Ib_float_buttons button{
        float: none;
        clear: both;
        max-width: 100%;
    }
    div#S99hl1Ib_float_buttons button:last-child{
        margin-bottom:0px;
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
            window.panelS99hl1Ibdata = {
                panel:panelS99hl1Ib,
                offset:0,
                rail:$("#aop_case_updates_threaded_span").parent()
            };
            $(window).on("resize",function(){
                window.panelS99hl1Ibdata.offset = $("#S99hl1Ib_float_buttons").closest(".detail-view-row-item").find(".col-1-label").eq(0).outerHeight();
                $("#S99hl1Ib_float_buttons").css({
                    "width":$("#S99hl1Ib_float_buttons").closest(".detail-view-row-item").find(".col-1-label").eq(0).width()+"px"
                });
            });
            $(window).on("scroll",function(){
                if(window.panelS99hl1Ibdata.rail.get(0).getBoundingClientRect().top - $("#toolbar").height() <= 0 || window.panelS99hl1Ibdata.rail.get(0).getBoundingClientRect().top - window.innerHeight > 0){
                    //Calculate offset
                    if(window.innerHeight - window.panelS99hl1Ibdata.rail.get(0).getBoundingClientRect().bottom <= 0){
                        window.panelS99hl1Ibdata.panel.addClass("panel-fixed").find(".rail_inside").css({
                            "padding-top":-1*(window.panelS99hl1Ibdata.rail.get(0).getBoundingClientRect().top - $("#toolbar").height())+"px"
                        });
                    }
                }else{
                    window.panelS99hl1Ibdata.panel.removeClass("panel-fixed");
                }
            });
            //Display panel
            $("#S99hl1Ib_float_buttons").show();
            $(window).resize();
        }
    });
    </script>
{/literal}