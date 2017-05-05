<textarea id="lic_key" name="lic_key" rows="4" cols="20" title="" tabindex=""></textarea><br />
<button value="Generate License Keys" onclick="generateLicense();" class="button lastChild" title="Generate License Keys" type="button">Generate License Keys</button>
<script>
    {literal}
    function generateLicense(){
        var serial = $('#name');
        var hard_id = $('#hard_id');
        var lic_type = $('#lic_type');
        var end_date = $('#end_date');

        var lic_keys = $('#lic_key');

        var field_name = {
            serial: 'Serial',
            hard_id: 'Hardware ID',
            lic_type: 'License Types',
            end_date: 'Licenses end date',
        }


        var data = {
            serial: serial.val(),
            hard_id: hard_id.val(),
            lic_type: lic_type.val(),
            end_date: end_date.val(),
        };

        $.ajax({
            url: 'index.php?module=ass_lic&action=genLic&to_pdf=1',
            type: "POST",
            data : data,
            async: false,
            success: function (data)
            {
//                lic_keys.val(data);
                data = jQuery.parseJSON(data);
                if (data.error === 1) {
                    alert('Fill "'+field_name[data.text]+'" field');
                } else if (data.error === 0) {
                    lic_keys.val(data.text);
                } else if (data.error === 2) {
                    alert(data.text);
                }
            }
        });
    }
    {/literal}
</script>