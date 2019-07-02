/**
 * License Utils 
*/
class LicenseServer{
    /**
     * Retrieve a new license
     * @param {string} id record id 
     */
    constructor(id){
        this.id = id;
        return this;
    }
    /**
     * Make request for license file download
     */
    download(){
        var frame = document.createElement("iframe");
        frame.style.display = "none";
        document.body.appendChild(frame);
        frame.src = "index.php?module=ass_lic&action=download&to_pdf=true&method=download&record="+this.id;
        return true;
    }
    /**
     * Clone license to clipboard
     */
    to_clipboard(){
        var xhr = new XMLHttpRequest();
        if(this.requests.push("get-license",xhr)){
            var self = this;
            xhr.open('GET','index.php?module=ass_lic&action=download&to_pdf=true&method=get&record='+this.id,false);
            xhr.onloadend = function(res){
                self.requests.delete("get-license");
                if(res.target.status == 200){
                    var response = JSON.parse(res.target.responseText);
                    switch(response.status){
                        case true:
                            var node = document.createElement('textarea');
                            node.style.position = "absolute";
                            node.style["z-index"] = "-999999";
                            node.value = response.body;
                            document.body.appendChild(node);
                            node.select();
                            document.execCommand('copy');
                            document.body.removeChild(node);
                            alert("License keys copyied to clipboard");
                        break;
                        case false:
                            alert(response.message);
                        break;
                    }
                }
            }
            xhr.send();
        }
        return xhr;
    }
    /**
     * Making request for generate new license file
     * @param Object options License Options. Required.
     * @param Function cb Callback function. Will pass response as argument
     * @return String license url
     */
    generate(options,cb){
        if(typeof(options.type)=="undefined" || typeof(options.type)=="undefined" || typeof(options.type)=="undefined") return false;
        var xhr = new XMLHttpRequest();
        var self = this;
        xhr.open("POST","index.php?module=ass_lic&action=generate&to_pdf=true",true);
        xhr.onloadend = function(res){
            switch(res.target.status){
                case 200:
                break;
                default:
                break;
            }
            if(typeof cb == "function"){
                cb.call(this,res.target.responseText);
                return true;
            }
        }
        xhr.send(JSON.stringify(options));
    }
    /**
     * Delete license
     * @param Array ids Array of ids to delete
     * @param Function cb Callback function
     * @return Boolean result
     */
    remove(ids,cb){
        var ids = this.__input(ids);
        var request = this.__send("delete",{ids:ids},cb);
        return true;
    }
    /**
     * Get license content
     * @param Array ids Array of ids to delete
     * @param Function cb Callback function
     * @return Boolean result
     */
    get(ids,cb){
        var ids = this.__input(ids);
        var request = this.__send("get",{ids:ids},cb);
        return true;
    }
    /**
     * Performs an api request
     * @param String method 
     * @param Object data 
     * @param Function cb Callback function
     */
    __send(method,data,cb){
        var xhr = new XMLHttpRequest();
        if(this.requests.push(method,xhr)){
            var self = this;
            xhr.open("POST","index.php?module=ass_lic&action=api&to_pdf=true&method="+method,false);
            xhr.onloadend = function(res){
                self.requests.delete(method);
                if(typeof cb == "function"){

                    cb.call(this,JSON.parse(res.target.responseText));
                }
            }
            xhr.send(JSON.stringify(data));
        }
    }
    __input(a){
        var b = [];
        if(Array.isArray(a)){
            return a;
        }
        b[0] = a;
        return b;
    }
    /**
     * record id
     */
    get id(){
        return this._id;
    }
    set id(id){
        this._id = id;
    }
    get requests(){
        if(typeof this.__requests == "undefined" || !this.__requests){
            this.__requests = {
                list:{},
                push:function(name,xhr){
                    if(this.list[name]){
                        return false;
                    }
                    this.list[name] = xhr;
                    return this.list;
                },
                delete:function(name){
                    if(!this.list[name]) return true;
                    return delete this.list[name];
                }
            };
        }
        return this.__requests;
    }
}
$(document).ready(function(){
    if(window.document.forms['DetailView']){
        window.license = new LicenseServer(window.document.forms['DetailView'].elements['record'].value);
    }
});