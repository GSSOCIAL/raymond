
<button id="addFileButton" class="button primary" type="button">{$MOD.LBL_ADD_CASE_FILE}</button>
{literal}
<script>
    $(document).ready(function(){
        var docCount = 0;
        $(document).on('change','.caseDocumentTypeSelect',function(){
            var wrapper = $(this).closest('.caseDocumentWrapper');
            if($(this).val() == 'internal'){
                wrapper.find('#file_upload').hide();
                wrapper.find('.internalCaseDocumentWrapper').show();
            }else{
                wrapper.find('#file_upload').show();
                wrapper.find('.internalCaseDocumentWrapper').hide();
            }

        });

        $('#addFileButton').click(function(e){
            var template = $('#updateFileRowTemplate').html();
            template = template.replace(/case_document_name/g, 'case_update_name_'+docCount);
            template = template.replace(/case_document_id/g, 'case_update_id_'+docCount);
            $(e.target).before(template);
            if(typeof sqs_objects == 'undefined'){
                sqs_objects = new Array;
            }
            sqs_objects['{/literal}{$ViewType}{literal}_case_document_name_'+docCount]={
                "form":"{/literal}{$ViewType}{literal}",
                "method":"query",
                'modules': 'Documents',
                "field_list":["name","id"],
                "populate_list":["case_document_name_"+docCount,"case_document_id_"+docCount],
                "required_list":["case_document_id_"+docCount],
                "conditions":[{"name":"name","op":"like_custom","end":"%","value":""}],
                "limit":"30",
                "no_match_text":"No Match"};
            SUGAR.util.doWhen(
                    "typeof(sqs_objects) != 'undefined' && typeof(sqs_objects['{/literal}{$ViewType}{literal}_case_document_name_"+docCount+"']) != 'undefined'",
                    enableQS
            );

            $('.caseDocumentTypeSelect').change();
            docCount++;
        });
        $(document).on('click','button.removeFileButton',function(e){
            $(e.target).closest('span').remove();
        });
        $(document).on('change', '.caseDocumentWrapper input.upload_file', function(e) {
            if ( this.files.length > 0 ) {
                $(this.parentNode.parentNode).find('#file_name').html(this.files[0].name);
            }
        });
    });
</script>
<style type="text/css">
    .caseDocumentWrapper .upload_file {
        width: 0.1px;
        height: 0.1px;
        opacity: 0;
        overflow: hidden;
        position: absolute;
        z-index: -1;
    }
</style>
{/literal}
<script id="updateFileRowTemplate"  type="text/template">
    <span class="caseDocumentWrapper">
        <select class="caseDocumentTypeSelect">
            <option value="internal">{$MOD.LBL_SELECT_INTERNAL_CASE_DOCUMENT}</option>
            <option value="external" selected>{$MOD.LBL_SELECT_EXTERNAL_CASE_DOCUMENT}</option>
        </select>
        <span id="file_upload">
            <label class="removeFileButton" style="margin-left: 0">
                Choose file
                <input type="file" id="case_update_file[]" name="case_update_file[]" class='upload_file'>
            </label>
            <span id="file_name">no files selected</span>
        </span>
        <span class="internalCaseDocumentWrapper">
            <input type="text" name="case_document_name" class="sqsEnabled" tabindex="0" id="case_document_name" size="" value="" title='' autocomplete="off">
            <input type="hidden" name="case_document_id" id="case_document_id" value="">

            <span class="id-ff multiple">
                <button type="button" name="btn_case_document_name" id="btn_case_document_name" tabindex="0" title="{$MOD.LBL_SELECT_CASE_DOCUMENT}" class="button firstChild" value="{$MOD.LBL_SELECT_CASE_DOCUMENT}"
                        {literal}
                        onclick='open_popup(
                                "Documents",
                                600,
                                400,
                                "",
                                true,
                                false,
                                {"call_back_function":"set_return","form_name":"{/literal}{$FormName}{literal}","field_to_name_array":{"id":"case_document_id","name":"case_document_name"}},
                                "single",
                                true
                                );' >
                        {/literal}
                <img src="themes/default/images/id-ff-select.png"></button>
                <button type="button" name="btn_clr_case_document_name"
                        id="btn_clr_case_document_name" tabindex="0" title="{$MOD.LBL_CLEAR_CASE_DOCUMENT}"  class="button lastChild"
                        onclick="SUGAR.clearRelateField(this.form, 'case_document_name', 'case_document_id');"  value="{$MOD.LBL_CLEAR_CASE_DOCUMENT}" ><img src="themes/default/images/id-ff-clear.png"></button>
            </span>
        </span>

<button class="removeFileButton" type="button">{$MOD.LBL_REMOVE_CASE_FILE}</button><br>
    </span>

</script>




