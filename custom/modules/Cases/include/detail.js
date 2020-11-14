if("Vue" in window){
    //Контроллер для кнопок DV
    new Vue({
        el:"#formDetailView",
        data:{},
        methods:{
            export_document(type){
                var with_internals = false;
                if(typeof this.$refs.with_internals != "undefined" && this.$refs.with_internals.value) with_internals = this.$refs.with_internals.value;
                window.bean_server.export(type,with_internals);
            }
        }
    });
}