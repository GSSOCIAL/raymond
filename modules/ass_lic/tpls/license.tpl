{literal}
<script src="custom/modules/ass_lic/license.js"></script>
<style type="text/css">
    #top-panel-0 div.detail-view-row-item>div.label{
        display:none;
    }
    #top-panel-0 div.detail-view-row-item>div.detail-view-field{
        background-color: transparent;
        width: 100%;
        padding: 0px;
    }
    div.license-container-wrapper{
        position:relative;
    }
    div.license-container-wrapper div.main-container{
        display: flex;
        flex-direction: row;
    }
    div.license-container-wrapper div.container{

    }
    div.license-container-wrapper #license_type_select{
        display: flex;
        flex-direction: row;
        height: 100%;
    }
    div.license-container-wrapper #license_type_select select{
        height:100%;
        width: 100%;
        padding: 0px;
    }
    div.license-container-wrapper #license_type_select>div:last-child{
        padding-left:15px;
        flex:0;
    }
    div.license-container-wrapper #licenses_list{
        height: 140px;
        display: flex;
        align-items: flex-start;
        flex-direction: row;
    }
    div.license-container-wrapper #licenses_list #lic_list{
        float:left;
        width:calc(100% - 200px);
        height:inherit;
        padding:0px;
    }
    div.license-container-wrapper #licenses_list div.action-buttons-wrapper{
        width:200px;
        float:left;
        display: flex;
        flex-direction: column;
        padding-left:15px;
        height: 100%;
        justify-content: space-between;
    }
    div.license-container-wrapper #licenses_list div.action-buttons-wrapper input{
        width:100%;
        margin-bottom: 4px !important;
        margin-right: 4px !important;
    }
    div.license-container-wrapper div.col-1-label{
        float:left;
        width:130px;
    }
    div.license-container-wrapper div.col-value{
        padding: 12px 0px;
        width: calc(100% - 130px);
        float: left;
    }
    div.license-container-wrapper div.col-value > input{
        width:100%;
    }
    div.license-container-wrapper fieldset#type_list{
        width: 100%;
        outline: 0px;
        margin: 0px;
    }
    div.license-container-wrapper fieldset#type_list > *{
        padding:5px 0px;
    }
    div.license-container-wrapper fieldset#type_list > * input{
        margin-right:10px;
    }
    div.license-container-wrapper fieldset#type_list > *:first-child{
        padding-top:0px;
    }
    div.license-container-wrapper fieldset#type_list > *:last-child{
        padding-bottom:0px;
    }
    div.license-container-wrapper #licenses_list select{
        background: none;
    }
    div.license-container-wrapper #licenses_list select::-ms-expand {
        display: none;
        background: none;
    }
</style>
{/literal}
{if $display}
<div class="license-container-wrapper">
    <div class="col-xs-12 main-container">
        <div class="container col-xs-3">
            {if $ACL_EDIT}
            <div class="col-xs-12">
                <div class="label col-1-label">
                    {$fields.end_date.label}:
                </div>
                <div class="col-value">
                    <input type="date" name="license[end_date]"/>
                </div>
            </div>
            <div class="col-xs-12">
                <div class="label col-1-label">
                    {$fields.license_expires.label}:
                </div>
                <div class="col-value">
                    <input type="number" min="0" max="" step="1" name="license[expires]"/>
                </div>
            </div>
            {/if}
        </div>
        <div class="container col-xs-4">
            {if $ACL_EDIT}
            <div class="col-xs-12" id="license_type_select">
                <div class="col-xs-12">
                    <fieldset id="type_list">
                        {foreach from=$fields.lic_type.list key=key item=label}
                        <div class="input-wrapper">
                            <input type="checkbox" name="license[type][]" value="{$key}" label="{$label}"/>{$label}
                        </div>
                        {/foreach}
                    </fieldset>
                </div>
                <div class="col-xs-12">
                    <input type="button" id="generate_license" value="Generate"/>
                </div>
            </div>
            {/if}
        </div>
        <div class="container col-xs-5">
            <div class="col-xs-12" id="licenses_list">
                <select id="lic_list" size="{if $licenses|@count lt 3}2{else}{$licenses|@count}{/if}" tabindex="">
                    {foreach from=$licenses key=key item=item}
                        <option label="{$item.name}" value="{$item.id}" data-delete="{$item.access.delete}" data-export="{$item.access.export}">{$item.name}</option>
                    {/foreach}
                </select>
                <div class="action-buttons-wrapper">
                    <input type="button" id="action_copy" value="Copy" disabled/>
                    <input type="button" id="action_download" value="Download" disabled/>
                    <input type="button" id="action_delete" value="Delete" disabled/>

                    <input type="button" id="action_log" value="Log"/>
                </div>
            </div>
        </div>
    </div>
</div>
{else}
No access
{literal}
<script type="text/javascript">
    $("#license_generator_span").closest(".panel").remove();
</script>
{/literal}
{/if}
{literal}
<script type="text/javascript">
    //Send generate request.
    $(document).on("click","#generate_license",function(event){
        //Create new License interface and call generate
        var t_license = new LicenseServer();
        t_license.generate({
            "name":$("div[field='name']").text(),
            "id":$("div[field='hard_id']").text(),
            "end_date":$("#generate_license").closest(".license-container-wrapper").find("input[name$='end_date]']").val(),
            "type":(function(inputs){
                var list = [];
                inputs.each(function(){
                    if($(this).is(":checked")){
                        list.push($(this).attr("value"));
                    }
                });
                return list;
            }($("input[name='license[type][]']"))),
            "duraction":$("#generate_license").closest(".license-container-wrapper").find("input[name$='expires]']").val(),
            "hardware_id":document.forms.DetailView.record.value
        },function(response){
            //Callback function
            response = JSON.parse(response);
            if(response.status == true){
                //License created - create new dropdown option dynamically
                var option = $(document.createElement("option"));
                option.text(response.body.name);
                option.attr("label",response.body.name);
                option.attr("value",response.body.id);
                option.get(0).dataset["delete"] = response.body.access.delete;
                option.get(0).dataset["export"] = response.body.access.export;
                $("#lic_list").prepend(option);
            }else{
                var errors = "";
                for(var error in response.errors){
                    errors += response.errors[error]+";\n";
                }
                alert(response.message+"\n"+errors);
            }
        });
    });
    //Utils
    $(document).on("click","#licenses_list input[type='button']",function(event){
        var ids = [];
        //Get selected licenses id-s
        if(data = $(event.target).closest("#licenses_list").find("select").val()){
            ids = data;
        }
        var License = new LicenseServer();
        switch($(event.target).closest("input").attr("id").toLowerCase()){
            case "action_copy":
                if(!data || data.length==0) return;
                License.get(ids,function(response){
                    if(response.status){
                        var summary = "";
                        for(var id in response.body){
                            summary += response.body[id].key+"\n-------\n";
                        }
                        var node = document.createElement('textarea');
                        node.style.position = "absolute";
                        node.style["z-index"] = "-999999";
                        node.value = summary;
                        document.body.appendChild(node);
                        node.select();
                        document.execCommand('copy');
                        document.body.removeChild(node);

                        //Display message 
                        $(event.target).closest("input").attr('title', 'Copied').tooltip({
                            content: 'Copied',
                            position: {my: 'top - 15px', at: 'top center'},
                            disabled: true,
                            close: function(E,ui){
                                $(E.target).tooltip('disable');
                            },
                            open:function(E,ui){
                                setTimeout(function(){
                                    $(E.target).tooltip('close');
                                }, 1000);}
                        }).tooltip('enable').tooltip('open').off('focusout').off('mouseleave');
                    }
                    
                });
            break;
            case "action_download":
                if(!data || data.length==0) return;
                License.id = ids;
                License.download();
            break;
            case "action_delete":
                if(!data || data.length==0) return;
                window.accLicdialog = new YAHOO.widget.SimpleDialog("deleteLicensesDialog",{
                    width: "300px",
                    draggable: false,
                    close: true,
                    constraintoviewport: true,
                    modal: true,
                    zIndex:15031,
                    fixedcenter: true,
                    loadingText: "loading",
                    buttons:[
                        {
                            text:"Delete",
                            handler: function(){
                                var self =this;
                                License.remove(ids,function(response){
                                    if(response.status){
                                        for(var id in response.request.input.ids){
                                            $("#lic_list").find("option[value='"+response.request.input.ids[id]+"']").remove();
                                        }  
                                    }
                                    $("div.mask#deleteLicensesDialog_mask").remove();
                                    self.destroy();
                                });
                            }
                        },
                        {
                            text:"Cancel",
                            handler:function(){
                                $("div.mask#deleteLicensesDialog_mask").remove();
                                this.destroy();
                            },
                            isDefault:true
                        }
                    ]
	            });
                window.accLicdialog.setBody("Are you sure you want to delete license file?");
                window.accLicdialog.setHeader("Delete license");
                window.accLicdialog.render(document.body);
            break;
            case "action_log":
                var frame = document.createElement("iframe");
                frame.style.display = "none";
                document.body.appendChild(frame);
                frame.src = "index.php?module=ass_lic&action=api&to_pdf=true&method=download_log&license="+ids;
                return true;
            break;
        }
    });
    $(document).on("blur","div.license-container-wrapper input",function(e){
        switch($(e.target).closest("input").attr("name")){
            case "license[end_date]":
            case "license[expires]":
                var data = {
                    end_date:$(e.target).closest("div.license-container-wrapper").find("input[name$='[end_date]']").val(),
                    duraction:$(e.target).closest("div.license-container-wrapper").find("input[name$='[expires]']").val(),
                    focus:$(e.target).closest("input").attr("name")=="license[end_date]"?"end_date":"expires"
                }
                if(data.focus == "expires" && (parseInt(data.duraction)==0 || data.duraction.toString().length==0)){
                    return false;
                }
                var xhr = new XMLHttpRequest();
                xhr.open('POST','index.php?module=ass_lic&action=api&to_pdf=true&method=calc_end_date',false);
                xhr.onloadend = function(res){
                    if(res.target.status == 200){
                        var response = JSON.parse(res.target.responseText);
                        switch(response.status){
                            case true:
                                switch(response.body.type){
                                    case "end_date":
                                        $(e.target).closest("div.license-container-wrapper").find("input[name$='[expires]']").val(response.body.duraction);
                                    break;
                                    case "expires":
                                        $(e.target).closest("div.license-container-wrapper").find("input[name$='[end_date]']").val(response.body.date);
                                    break;
                                }
                            break;
                            case false:
                                alert(response.message);
                            break;
                        }
                    }
                }
                xhr.send(JSON.stringify(data));
            break;
        }
    });
    //
    $(document).on("change","select#lic_list",function(){
        var option = $(this).find("option").eq(this.selectedIndex);
        $(this).closest("#licenses_list").find("#action_delete").prop("disabled",!(option.data("delete") && option.data("delete")=="1"));
        $(this).closest("#licenses_list").find("#action_download").prop("disabled",!(option.data("export") && option.data("export")=="1"));
        $(this).closest("#licenses_list").find("#action_copy").prop("disabled",!(option.data("export") && option.data("export")=="1"));
        $(this).closest("#licenses_list").find("#action_log").prop("disabled",!(option.data("export") && option.data("export")=="1"));
    });
</script>
{/literal}