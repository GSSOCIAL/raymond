class BeanServer{
    /**
     * Setup a new bean server
     * @param {string} module Module name
     * @param {string} id record id 
     */
    constructor(module,id){
        this.module_name = module;
        this.id = id;
        return this;
    }
    /**
     * Performs export request
     * @param {string} to_type Type export format [JSON/XML/DOCX]
     */
    export(to_type="JSON"){
        var frame = document.createElement("iframe");
        frame.style.display = "none";
        document.body.appendChild(frame);
        frame.src = "index.php?module=Home&action=beanServer&method=export&to_pdf=true&mod="+this.module_name+"&record="+this.id+"&to_format="+to_type;
        return true;
    }
    __input(a){
        var b = [];
        if(Array.isArray(a)){
            return a;
        }
        b[0] = a;
        return b;
    }
}
$(document).ready(function(){
    if(window.document.forms['DetailView']){
        window.bean_server = new BeanServer((function(){
            if(typeof(window.document.forms['DetailView'])=='undefined'){return'';}else{if(typeof(window.document.forms['DetailView'].elements['subpanel_parent_module'])!='undefined'&&window.document.forms['DetailView'].elements['subpanel_parent_module'].value!=''){return window.document.forms['DetailView'].elements['subpanel_parent_module'].value;}return window.document.forms['DetailView'].elements['module'].value;}
        }()),window.document.forms['DetailView'].elements['record'].value);
    }
});