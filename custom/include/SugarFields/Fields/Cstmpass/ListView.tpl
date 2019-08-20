<span id="clip_{$field_name}_{$record_id}" data-clipboard-target="#{$field_name}_{$record_id}" onclick="$('#coopied_to_clipboard_{$field_name}_{$record_id}').show();">{$star}</span>
<span id="coopied_to_clipboard_{$field_name}_{$record_id}" style="display:none; color:#CCC;"><br>copied to clipboard</span>
<span id="{$field_name}_{$record_id}" style="font-size: 0px;">{$pass}</span>

<script>
    new Clipboard("#clip_{$field_name}_{$record_id}");
</script>