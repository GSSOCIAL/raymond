{*Updated licenses generator application. Vue.js required*}
{literal}
<style type="text/css">
    .generator-form{
        position: relative;
    }
    .generator-form .lock-overlay{
        position: absolute;
        top: 0px;
        right: 0px;
        bottom: 0px;
        left: 0px;
        background: rgba(255,255,255,0.6);
        cursor: default;
        z-index: 10;
    }
    .generator-form .fields-row{
        display: inline-block;
        width:100%;
        margin-bottom: 10px;
        grid-gap: 15px;
    }
    .generator-form .generator-layout{
        box-sizing: border-box;
        padding: 30px;
        border: 1px solid #d2e8f9;
        border-radius: 10px;
        background: #fff;
        display: inline-block;
        width: 100%;
    }
    .generator-form .generator-layout section{
        border-bottom: 1px solid #d2e8f9;
        padding: 20px 0px 10px;
        display: inline-block;
        width:100%; 
        float: left;
        clear: both;
    }
    .generator-form .generator-layout section:last-child{
        border-bottom-color:transparent;
    }
    .generator-form .generator-layout section .section-title{
        margin:0px 0px 20px;
    }

    .generator-form .section-title{
        color: rgb(27 47 63);
        font-size: 26px;
        line-height: normal;
        margin: 10px 0px 10px;
    }
    .generator-form .field-actions{
        width: 100%;
        display: flex;
        flex-direction: row;
        margin: 10px 0px 0px;
    }
    .generator-form .field-wrapper{
        width:100%;
    }
    .generator-form .field-wrapper > label{
        
    }
    .generator-form .field-wrapper > .input-wrapper{
        position: relative;
    }
    .generator-form .field-wrapper > .input-wrapper input[type="text"],.generator-form .field-wrapper > .input-wrapper input[type="password"],.generator-form .field-wrapper > .input-wrapper input[type="number"],.generator-form .field-wrapper > .input-wrapper select,.generator-form .field-wrapper > .input-wrapper textarea{
        width: 100%;
        resize: vertical;
        height: initial;
        background: #fff;
        font-size: 14px;
        border: 1px solid #ddd;
        border-radius: 4px;
        padding: 10px 12px;
        line-height: normal;
    }
    .generator-form .field-wrapper.checkbox-field-wrapper{
        display: flex;
        flex-direction: row;
        align-items: center;
    }
    .generator-form .field-wrapper.checkbox-field-wrapper label{
        margin:0px;
    }
    .generator-form .field-wrapper.checkbox-field-wrapper > *:first-child{
        margin-right:5px;
    }

    .generator-form .fields-row.row-columns-5{
        display: grid;
        grid-template-columns: repeat(5,1fr);
    }
    .generator-form .fields-row.row-columns-4{
        display: grid;
        grid-template-columns: repeat(4,1fr);
    }
    .generator-form .fields-row.row-columns-2{
        display: grid;
        grid-template-columns: repeat(2,1fr);
    }

    .generator-form .radio-group{
        
    }
    .generator-form .radio-group > .radio-wrapper{
        background: rgb(232 243 252);
        margin-bottom: 2px;    
        display: flex;
        align-items: center;
        padding:10px;
    }
    .generator-form .radio-group > .radio-wrapper .radio-button{
        float: left;
        width: 16px;
        height: 16px;
        border-radius: 100%;
        border: 3px solid transparent;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        background: #fff;
        margin-right:5px;
    }
    .generator-form .radio-group > .radio-wrapper.checked .radio-button{
        border-color:#03a9f4;
    }
    .generator-form .radio-group > .radio-wrapper .radio-button .pipe{

    }
    .generator-form .radio-group > .radio-wrapper label{
        margin:0px;
    }
    .generator-form .fields-row.section-fields{
        padding: 10px 10px 0px;
        float: left;
    }
    .generator-form .fields-row.section-fields > .field-wrapper{
        border-bottom: 1px solid #d2e8f9;
        display: flex;
        flex-direction: row;
        padding: 10px 0px;
    }
    .generator-form .fields-row.section-fields > .field-wrapper .field-label{
        width: 30%;
        font-size: 16px;
    }
    .generator-form .fields-row.section-fields > .field-wrapper .fields-wrapper{
        width:100%;
        flex:1;
    }
    .generator-form .fields-row.section-fields > .field-wrapper .fields-wrapper > .field-wrapper{
        display: flex;
        flex-direction: row;
        align-items: center;
        margin-bottom: 10px;
    }
    .generator-form .fields-row.section-fields > .field-wrapper .fields-wrapper > .field-wrapper > label{
        width: 200px;
    }
    .generator-form .fields-row.section-fields > .field-wrapper .fields-wrapper > .field-wrapper > .input-wrapper{
        width: 100%;
        flex: 1;
    }
    .generator-form .fields-row.section-fields > .field-wrapper .fields-wrapper > .field-wrapper .field-wrapper{
        display: flex;
        flex-direction: row;
        align-items: center;
    }
    .generator-form .fields-row.section-fields > .field-wrapper .fields-wrapper > .field-wrapper .field-wrapper > label{
        margin: 0px 10px 0px 0px;
    }
    .generator-form .fields-row.section-fields > .field-wrapper:last-child{
        border-bottom-color: transparent;
    }
    .generator-form .field-wrapper > .input-wrapper .calendar-wrapper{
        min-width: 40px;
        position: absolute;
        top: 1px;
        right: 1px;
        bottom: 1px;
        background: #fff;
        display: flex;
        align-items: center;
        justify-content: flex-end;
        flex-direction: row;
    }
    .field-wrapper > .description,.input-wrapper > .description{
        letter-spacing: 0px;
        margin-left: 10px;
        font-size: 14px;
        color:#9e9e9e;
    }
    .input-wrapper.checkbox-field{
        display: flex;
        flex-direction: row;
    }
    .input-wrapper.simple-field{
        display: flex;
        flex-direction: row;
        align-items: center;
    }

    textarea.manual{
        min-height: 50vh;
    }
    .vue-component{
        position:relative;
    }
    .vue-component *{
        position:relative;
        box-sizing: border-box;
    }
    .vue-component.tumbler{
        width:36px;
        height:20px;
        cursor: pointer;
    }
    .vue-component .component-fill{
        position: absolute;
        z-index: 1;
        top:0;
        right:0;
        bottom:0;
        left:0;
        background:rgb(236 236 236);
        border-radius: 3px;
    }
    .vue-component.tumbler > .pipe{
        background: #9e9e9e;
        width: 16px;
        height: 16px;
        z-index: 3;
        top:2px;
        left:2px;
        border-radius: 3px;
        transition: .4s cubic-bezier(0.075, 0.82, 0.165, 1);
    }
    .vue-component.tumbler.checked{
        
    }
    .vue-component.checked .component-fill{
        background:rgb(210 232 249);
    }
    .vue-component.tumbler.checked > .pipe{
        background: #03a9f4;
        left:18px;
    }
    /*Calendar*/ 
    .vue-component.calendar{
        border: 0px;
    }
    .vue-component.calendar > .calendar-icon{
        width: 40px;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        position: absolute;
        top: 0px;
        bottom: 0px;
        right: 0px;
        
    }
    .vue-component.calendar > .calendar-icon svg{
        fill:#85a0ad;
        max-width: 14px;
    }
    .vue-component.calendar > .calendar-container{
        background: #fff;
        z-index: 3;
        position: absolute;
        right: 0px;
        min-width: 300px;
        box-shadow: 0px 1px 2px 0px rgb(0 0 0,0.4);
        border-radius: 10px;
    }
    .vue-component.calendar > .calendar-container .calendar-header-container{
        padding: 20px 0px;
    }
    .vue-component.calendar > .calendar-container .calendar-header{
        display: flex;
        flex-direction: row;
        align-items: center;
        position: absolute;
        left: 0px;
        right: 0px;
        top: 0px;
        bottom: 0px;
    }
    .vue-component.calendar > .calendar-container .calendar-header .calendar-button{
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    .vue-component.calendar > .calendar-container .calendar-header .calendar-button > svg{
       fill: #b5b7bc;
    }
    .vue-component.calendar > .calendar-container .calendar-header .calendar-button:hover > svg{
       fill: #263238;
    }
    .vue-component.calendar > .calendar-container .calendar-header .calendar-header-title{
        justify-self: center;
        text-transform: uppercase;
        font-family: Roboto, Helvetica, Arial, sans-serif;
        text-align: center;
        font-size: 14px;
        line-height: normal;
        letter-spacing: 1px;
        color: #0b1022;
        width: 100%;
        flex: 1;
        font-weight: bold;
    }
    .vue-component.calendar > .calendar-container .calendar-header .calendar-header-title span{
        cursor: pointer;
    }
    .vue-component.calendar > .calendar-container .calendar-body{

    }
    .vue-component.calendar > .calendar-container .calendar-body .calendar-view{

    }
    .vue-component.calendar .calendar-view-dow,.vue-component.calendar .calendar-view-days{
        display: grid;
        grid-template-columns: repeat(7,1fr);
    }
    .vue-component.calendar .calendar-view-dow .day,.vue-component.calendar .calendar-view-days .day{
        display: flex;
        align-items: center;
        justify-content: center;
    }
    .vue-component.calendar .calendar-view-dow .day span,.vue-component.calendar .calendar-view-days .day span{
        
    }
    .vue-component.calendar .calendar-view-dow{

    }
    .vue-component.calendar .calendar-view-days{

    }
    .vue-component.calendar .calendar-view-dow .day{

    }
    .vue-component.calendar .calendar-view-days .day, .vue-component.calendar .calendar-view-months .month, .vue-component.calendar .calendar-view-decades .decade{
        cursor: pointer;
    }
    .vue-component.calendar .calendar-view-days .day:before, .vue-component.calendar .calendar-view-months .month:before, .vue-component.calendar .calendar-view-decades .decade:before{
        content:"";
        display: block;
        padding-top: 100%;
        width:100%;
    }
    .vue-component.calendar .calendar-view-days .day > .inside, .vue-component.calendar .calendar-view-months .month > .inside, .vue-component.calendar .calendar-view-decades .decade > .inside{
        position: absolute;
        top:0;
        right:0;
        bottom:0;
        left:0;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    .vue-component.calendar .calendar-view-days .day:not(.current-view-month) span{
       color:#a8bac3;
    }
    .vue-component.calendar .calendar-view-days .day.current-view-month span{
       
    }
    .vue-component.calendar .calendar-view-days .day.current-month span{
       
    }
    .vue-component.calendar .calendar-view-days .day.current-day span{
       color: #03a9f4;
    }
    .vue-component.calendar .calendar-view-days .day.selected > .inside{
        background-color: #03a9f4;
        top: 10%;
        right: 10%;
        bottom: 10%;
        left: 10%;
        border-radius: 100%;
    }
    .vue-component.calendar .calendar-view-days .day.selected span{
       color: #fff;
    }
    .vue-component.calendar .calendar-view-months{
        display: grid;
        grid-template-columns: repeat(3,1fr);
    }
    .vue-component.calendar .calendar-view-months .month:hover{
        background: #f5f5f5;
    }
    .vue-component.calendar .calendar-view-months .month.current span{
       color: #03a9f4;
    }
    .vue-component.calendar .calendar-view-decades{
        display: grid;
        grid-template-columns: repeat(4,1fr);
    }
    .vue-component.calendar .calendar-view-decades .decade:hover{
        background: #f5f5f5;
    }
    .vue-component.calendar > .calendar-container .calendar-header .calendar-header-title span.view-decade > span{
        cursor: default;
    }
    .vue-component.calendar .calendar-view-decades .decade.current span{
       color: #03a9f4;
    }
    .vue-component.tabs{
        width: 100%;
        margin-top: 30px;
    }
    .vue-component.tabs > .tabs-header{
        width: 100%;
        border-bottom: 2px solid #e8f3fc;
        display: inline-block;
    }
    .vue-component.tabs > .tabs-header > .tab{
        float: left;
        cursor: pointer;
        border-bottom: 2px solid transparent;
        padding: 0px 10px;
        font-size: 16px;
        height: 26px;
        bottom: -2px;
    }
    .vue-component.tabs > .tabs-header > .tab.selected{
        border-bottom-color: #03a9f4;
    }
    /*Анимации*/
    .opacity-enter-active{
        animation:opacity cubic-bezier(0.075, 0.82, 0.165, 1) .3s;
    }
    .opacity-leave-active{
        animation:opacity cubic-bezier(0.075, 0.82, 0.165, 1) .3s reverse;
    }
    .bounce-enter-active {
        animation: bounce .3s;
    }
    .bounce-leave-active {
        animation: bounce .3s reverse;
    }

    .bouncesimple-enter-active, .bouncesimple-leave-active{
        transition: 0.3s cubic-bezier(0.075, 0.82, 0.165, 1) transform !important;
    }
    .bouncesimple-enter, .bouncesimple-leave-to{
        transform:scale(0) !important;
    }
    .opacitysimple-enter-active, .opacitysimple-leave-active{
        transition: 0.3s cubic-bezier(0.075, 0.82, 0.165, 1) !important;
    }
    .opacitysimple-enter, .opacitysimple-leave-to{
        opacity:0 !important;
    }
    .drop-rightsimple-enter-active, .drop-rightsimple-leave-active{
        transition: 0.3s cubic-bezier(0.075, 0.82, 0.165, 1) transform, 0.4s ease-in-out opacity !important;
    }
    .drop-rightsimple-enter, .drop-rightsimple-leave-to{
        transform: translateX(100%) !important;
        opacity:0 !important;
    }
    .element-focus{
        z-index: 2;
        box-shadow: 0 0px 3px 0px #2e4378 !important;
    }
    @keyframes opacity{
        0%{
            opacity:0;
        }
        100%{
            opacity:1;
        }
    }
    @keyframes bounce{
        0% {
            transform: scale(0);
        }
        50% {
            transform: scale(1.1);
        }
        100% {
            transform: scale(1);
        }
    }
    .input-error{
        display: block;
        width: 100%;
        background: #f44336;
        color: #fff;
        font-size: 12px;
        padding: 4px;
        border-radius: 4px;
        margin-top: 2px;
    }
    .vue-modal{
        
    }
    .vue-modal *{
        position:relative;
    }
    .vue-modal > .overlay{
        position: fixed;
        top:0px;
        right:0px;
        bottom:0px;
        left:0px;
        z-index:111000;
        background: rgba(255,255,255,0.6);
        -webkit-backdrop-filter: saturate(180%) blur(10px);
        backdrop-filter: saturate(180%) blur(10px);
    }
    .vue-modal .modal-window-wrapper{
        position: fixed;
        top:0px;
        right:0px;
        bottom:0px;
        left:0px;
        z-index:111001;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    .vue-modal .modal-window-wrapper .modal-window{

    }
    .vue-modal .modal-window-wrapper .modal-window > .modal-window-actions{
        display: inline-block;
        width: 100%;
    }
    .vue-modal .modal-window-wrapper .modal-window > .modal-window-actions .action-close{
        float: right;
        cursor: pointer;
        display: flex;
        flex-direction: row;
        align-items: center;
    }
    .vue-modal .modal-window-wrapper .action-icon{
        width:30px;
        margin-left: 7px;
    }
    .vue-modal .modal-window-wrapper .action-icon:before{
        content:"";
        display: block;
        padding-top: 100%;
    }
    .vue-modal .modal-window-wrapper .action-icon .icon-wrapper{
        position: absolute;
        top:0px;
        right:0px;
        bottom:0px;
        left:0px;
        background: #fff;
        border-radius: 100%;
        box-shadow: 0px 2px 3px rgb(0 0 0 / 10%);
        display: flex;
        align-items: center;
        justify-content: center;
    }
    .vue-modal .modal-window-wrapper .action-icon .icon-wrapper:before,
    .vue-modal .modal-window-wrapper .action-icon .icon-wrapper:after{
        content:"";
        background: #534d64;
        position: absolute;
        border-radius: 6px;
    }
    .vue-modal .action-close .action-icon .icon-wrapper:before,
    .vue-modal .action-close .action-icon .icon-wrapper:after{
        width: 12px;
        height: 3px;
    }
    .vue-modal .action-close .action-icon .icon-wrapper:before{
        transform:rotate(45deg);
    }
    .vue-modal .action-close .action-icon .icon-wrapper:after{
        transform:rotate(-45deg);
    }
    .vue-modal .action-close > span{
        opacity:0;
        left:100%;
        transition: 0.3s ease-in-out opacity,0.4s cubic-bezier(0.075, 0.82, 0.165, 1) left;
    }
    .vue-modal .action-close:hover > span{
        opacity:1;
        left:0%;
    }
    .vue-modal .modal-window-wrapper .modal-window .modal-window-popup{
        background: #fff;
        border-radius: 14px;
        box-shadow: 0px 2px 3px rgb(0 0 0 / 10%);    
        max-width: 600px;
    }
    .vue-modal .modal-window-popup .modal-title{
        padding: 30px 30px 10px;
        font-size: 24px;    
        font-weight: 600;
    }
    .vue-modal .modal-window-popup .modal-title .title-icon{
        width:40px;
        margin-bottom: 7px;
    }
    .vue-modal .modal-window-popup .modal-title .title-icon:before{
        content: "";
        padding-top:100%;
        display: block;
    }
    .vue-modal .modal-window-popup .modal-title .title-icon .icon-wrapper{
        position: absolute;
        top:0px;
        right: 0px;
        bottom: 0px;
        left: 0px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 100%;
    }
    .vue-modal .modal-window-popup .modal-title .title-icon.success .icon-wrapper{
        background: #4caf50;
    }
    .vue-modal .modal-window-popup .modal-title .title-icon.fault .icon-wrapper{
        background: #f44336;
    }
    .vue-modal .modal-window-popup .modal-title .title-icon .icon-wrapper:before,
    .vue-modal .modal-window-popup .modal-title .title-icon .icon-wrapper:after{
        content:"";    
        background: #fff;
        height: 4px;
        border-radius: 4px;
        position: absolute;
    }
    .vue-modal .modal-window-popup .modal-title .title-icon.success .icon-wrapper:before{
        width: 10px;
        transform: rotate(45deg);
        top: 21px;
        left: 10px;
    }
    .vue-modal .modal-window-popup .modal-title .title-icon.success .icon-wrapper:after{
        width: 18px;
        transform: rotate(132deg);
        top: 18px;
        left: 14px;
    }
    .vue-modal .modal-window-popup .modal-title .title-icon.fault .icon-wrapper:before{
        width: 18px;
        transform: rotate(45deg);
    }
    .vue-modal .modal-window-popup .modal-title .title-icon.fault .icon-wrapper:after{
        width: 18px;
        transform: rotate(-45deg);
    }

    .vue-modal .modal-window-popup .modal-context{
        padding: 0px 30px 20px;
        font-size: 15px;
        word-break: break-word;
        white-space: pre-wrap;
    }
</style>
{/literal}
<div id="license_generator_container">
    <span v-if="false">Generator requires vue.js</span>
    <div v-if="true" class="generator-form" {literal}:class="{'loading':lock}"{/literal}>
        <div class="fields-row row-columns-5">
            <div class="field-wrapper" style="display:none;">
                <label>Hardware id</label>
                <div class="input-wrapper">
                    <input type="text" maxlength="255" title="hardware identifier" v-model="values.hid"/>
                </div>
            </div>
            <div class="field-wrapper" style="display:none;">
                <label>Serial</label>
                <div class="input-wrapper">
                    <input type="text" v-model="values.serial"/>
                </div>
            </div>
            <div class="field-wrapper">
                <label>Start date</label>
                <div class="input-wrapper">
                    <calendar :value="values.start_date" ref="calendar_start_date" @change="calculateIAT($refs.calendar_start_date.str_date);values.start_date = $refs.calendar_start_date.str_date"></calendar>
                </div>
            </div>
            <div class="field-wrapper">
                <label>Days</label>
                <div class="input-wrapper">
                    <input type="number" min="1" step="1" v-model="values.days" @change="$refs.calendar_days.diff = values.days"/>
                    <div class="calendar-wrapper">
                        <calendar 
                        :display_field="false" 
                        :now_date="diff_from"
                        value="{$OFFSET_DATE}" 
                        ref="calendar_days" 
                        @change="calculateEXP($refs.calendar_days.str_date);values.days = $refs.calendar_days.diff"></calendar>
                    </div>
                </div>
            </div>
            <div class="field-wrapper" style="display:none;">
                <label>Platform</label>
                <div class="input-wrapper">
                    <select v-model="values.router.platform" title="router platform type">
                        <option value="standalone">Standalone</option>
                        <option value="gcp">Gcp</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="fields-row" style="display:none">
            <div class="section-title">Product</div>
            <div class="radio-group">
                <div class="radio-wrapper" {literal}:class="{'checked':values.product == 'rapid'}"{/literal}>
                    <div class="radio-button" @click="values.product = 'rapid'"><div class="pipe"></div></div>
                    <label>Rapid counter</label>
                </div>
                <div class="radio-wrapper" {literal}:class="{'checked':values.product == 'router'}"{/literal}>
                    <div class="radio-button" @click="values.product = 'router'"><div class="pipe"></div></div>
                    <label>Unifier</label>
                </div>
                <div class="radio-wrapper" {literal}:class="{'checked':values.product == 'editor'}"{/literal}>
                    <div class="radio-button" @click="values.product = 'editor'"><div class="pipe"></div></div>
                    <label>Dicom editor</label>
                </div>
            </div>
        </div>
        <tabs
        selected="form"
        {literal}:tabs="{'form':'Form','manual':'Manual'}"{/literal}
        >
            <template v-slot:form>
                <div class="generator-layout" v-if="values.product == 'rapid'">
                    <!--DICOM-->
                    <section>
                        <div class="section-title">Dicom</div>
                        <div class="fields-row">
                            <div class="field-wrapper checkbox-field-wrapper">
                                <label>Granted</label>
                                <div class="input-wrapper">
                                    <tumbler v-model="values.router.dicom.granted" title="Rapid engine is granted"></tumbler>
                                </div>
                            </div>
                        </div>
                        <div class="fields-row row-columns-2">
                            <div class="field-wrapper" style="display:none">
                                <label>Iat</label>
                                <div class="input-wrapper">
                                    <input type="text" title="Issued at date-time" v-model="values.router.dicom.iat"/>
                                </div>
                            </div>
                            <div class="field-wrapper" style="display:none">
                                <label>Exp</label>
                                <div class="input-wrapper">
                                    <input type="text" title="Expiration date-time" v-model="values.router.dicom.exp"/>
                                </div>
                            </div>
                        </div>
                        <div class="fields-row section-fields" v-show="values.router.dicom.granted == true">
                            <div class="field-wrapper">
                                <div class="field-label">SCP</div>
                                <div class="fields-wrapper">
                                    <div class="field-wrapper">
                                        <label>Max</label>
                                        <input-field min="1" max="1000" type="number" title="Maximum number of rapid receivers" v-model="values.router.dicom.scp.max"></input-field>
                                        <div class="description">Maximum number of rapid receivers</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
                <div class="generator-layout" v-if="values.product == 'router'">
                    <!--Platform-->
                    <section>
                        <div class="section-title">Platform</div>
                        <div class="fields-row section-fields">
                            <div class="field-wrapper">
                                <div class="field-label">Platform</div>
                                <div class="fields-wrapper">
                                    <div class="field-wrapper">
                                        <label></label>
                                        <div class="input-wrapper">
                                            <select name="" v-model="values.router.platform" title="router platform type">
                                                <option value="standalone">Standalone</option>
                                                <option value="gcp">Gcp</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <!--Storage-->
                    <section>
                        <div class="section-title">Storage</div>
                        <div class="fields-row section-fields">
                            <div class="field-wrapper">
                                <div class="field-label">Max</div>
                                <div class="fields-wrapper">
                                    <div class="field-wrapper">
                                        <label></label>
                                        <input-field min="1" max="100" type="number" title="Maximum number of storages" v-model="values.router.storage.max"></input-field>
                                        <div class="description">Maximum number of storages</div>
                                    </div>
                                </div>
                            </div>
                            <!--<div class="field-wrapper">
                                <div class="field-label">Quota</div>
                                <div class="fields-wrapper">
                                    <div class="field-wrapper">
                                        <label>Size</label>
                                        <div class="input-wrapper">
                                            <div class="field-wrapper">
                                                <label>Max</label>
                                                <input-field min="1" type="number" title="Maximum storage capacity" v-model="values.router.storage.quota.size.max"></input-field>
                                                <div class="description">Maximum storage capacity</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="field-wrapper">
                                        <label>Study</label>
                                        <div class="input-wrapper">
                                            <div class="field-wrapper">
                                                <label>Max</label>
                                                <input-field min="1" type="number" title="Maximum number of studies" v-model="values.router.storage.quota.study.max"></input-field>
                                                <div class="description">Maximum number of studies</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="field-wrapper">
                                        <label>Hl7</label>
                                        <div class="input-wrapper">
                                            <div class="field-wrapper">
                                                <label>Max</label>
                                                <input-field min="1" type="number" title="Maximum number of hl7 messages" v-model="values.router.storage.quota.hl7.max"></input-field>
                                                <div class="description">Maximum number of hl7 messages</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="field-wrapper">
                                        <label>Order</label>
                                        <div class="input-wrapper">
                                            <div class="field-wrapper">
                                                <label>Max</label>
                                                <input-field min="1" type="number" title="Maximum number of dicom worklist orders" v-model="values.router.storage.quota.order.max"></input-field>
                                                <div class="description">Maximum number of dicom worklist orders</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="field-wrapper">
                                        <label>Dynamic</label>
                                        <div class="input-wrapper">
                                            <div class="field-wrapper">
                                                <label>Granted</label>
                                                <div class="input-wrapper checkbox-field">
                                                    <tumbler v-model="values.router.storage.quota.dynamic.granted" title="Grant dynamic quota service"></tumbler>
                                                    <div class="description">Grant dynamic quota service</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="field-wrapper">
                                <div class="field-label">Retention</div>
                                <div class="fields-wrapper">
                                    <div class="field-wrapper">
                                        <label>Study</label>
                                        <div class="input-wrapper">
                                            <div class="field-wrapper">
                                                <label>Max</label>
                                                <input-field min="3600" type="number" title="Maximum retention period for dicom study" v-model="values.router.storage.retention.study.max"></input-field>
                                                <div class="description">Maximum retention period for dicom study</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="field-wrapper">
                                        <label>Hl7</label>
                                        <div class="input-wrapper">
                                            <div class="field-wrapper">
                                                <label>Max</label>
                                                <input-field min="3600" type="number" title="Maximum retention period for hl7 message" v-model="values.router.storage.retention.hl7.max"></input-field>
                                                <div class="description">Maximum retention period for hl7 message</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="field-wrapper">
                                        <label>Order</label>
                                        <div class="input-wrapper">
                                            <div class="field-wrapper">
                                                <label>Max</label>
                                                <input-field min="3600" type="number" title="Maximum retention period for dicom worklist order" v-model="values.router.storage.retention.order.max"></input-field>
                                                <div class="description">Maximum retention period for dicom worklist order</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>-->
                        </div>
                    </section>
                    <!--DICOM-->
                    <section>
                        <div class="section-title">Dicom</div>
                        <div class="fields-row">
                            <div class="field-wrapper checkbox-field-wrapper">
                                <label>Granted</label>
                                <div class="input-wrapper checkbox-field">
                                    <tumbler v-model="values.router.dicom.granted" title="Dicom engine is granted"></tumbler>
                                    <div class="description">Dicom engine is granted</div>
                                </div>
                            </div>
                        </div>
                        <div class="fields-row row-columns-2">
                            <div class="field-wrapper" style="display:none">
                                <label>Iat</label>
                                <div class="input-wrapper">
                                    <input type="text" title="Issued at date-time" v-model="values.router.dicom.iat"/>
                                </div>
                            </div>
                            <div class="field-wrapper" style="display:none">
                                <label>Exp</label>
                                <div class="input-wrapper">
                                    <input type="text" title="Expiration date-time" v-model="values.router.dicom.exp"/>
                                </div>
                            </div>
                        </div>
                        <div class="fields-row section-fields" v-show="values.router.dicom.granted == true">
                            <div class="field-wrapper">
                                <div class="field-label">SCP</div>
                                <div class="fields-wrapper">
                                    <div class="field-wrapper">
                                        <label>Max</label>
                                        <div class="input-wrapper simple-field">
                                            <input-field min="1" max="1000" type="number" title="Maximum number of dicom receivers" v-model="values.router.dicom.scp.max"></input-field>
                                            <div class="description">Maximum number of dicom receivers</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="field-wrapper">
                                <div class="field-label">SCU</div>
                                <div class="fields-wrapper">
                                    <div class="field-wrapper">
                                        <label>Max</label>
                                        <div class="input-wrapper simple-field">
                                            <input-field min="1" max="10000" type="number" title="Maximum number of registered remote dicom devices" v-model="values.router.dicom.scu.max"></input-field>
                                            <div class="description">Maximum number of registered remote dicom devices</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="field-wrapper">
                                <div class="field-label">Router</div>
                                <div class="fields-wrapper">
                                    <div class="field-wrapper">
                                        <label>Granted</label>
                                        <div class="input-wrapper checkbox-field">
                                            <tumbler v-model="values.router.dicom.router.granted" title="Dicom router is granted"></tumbler>
                                            <div class="description">Dicom router is granted</div>
                                        </div>
                                    </div>
                                    <div class="field-wrapper" v-show="values.router.dicom.router.granted">
                                        <label>Max</label>
                                        <div class="input-wrapper simple-field">
                                            <input-field min="1" max="10000" type="number" title="Maximum number of dicom router rules" v-model="values.router.dicom.router.max"></input-field>
                                            <div class="description">Maximum number of dicom router rules</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="field-wrapper">
                                <div class="field-label">Transform</div>
                                <div class="fields-wrapper">
                                    <div class="field-wrapper">
                                        <label>Granted</label>
                                        <div class="input-wrapper checkbox-field">
                                            <tumbler v-model="values.router.dicom.transform.granted" title="Dicom object transformation is granted"></tumbler>
                                            <div class="description">Dicom object transformation is granted</div>
                                        </div>
                                    </div>
                                    <div class="field-wrapper" v-show="values.router.dicom.transform.granted">
                                        <label>Max</label>
                                        <div class="input-wrapper simple-field">
                                            <input-field min="1" max="10000" type="number" title="Maximum number of dicom transformation rules" v-model="values.router.dicom.transform.max"></input-field>
                                            <div class="description">Maximum number of dicom transformation rules</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="field-wrapper">
                                <div class="field-label">Proxy</div>
                                <div class="fields-wrapper">
                                    <div class="field-wrapper">
                                        <label>Granted</label>
                                        <div class="input-wrapper checkbox-field">
                                            <tumbler v-model="values.router.dicom.proxy.granted" title="Dicom proxy is granted"></tumbler>
                                            <div class="description">Dicom proxy is granted</div>
                                        </div>
                                    </div>
                                    <div class="field-wrapper" v-show="values.router.dicom.proxy.granted">
                                        <label>Max</label>
                                        <div class="input-wrapper simple-field">
                                            <input-field min="1" max="10000" type="number" title="Maximum number of dicom proxy rules" v-model="values.router.dicom.proxy.max"></input-field>
                                            <div class="description">Maximum number of dicom proxy rules</div>
                                        </div>
                                    </div>
                                    <div class="field-wrapper" v-show="false && values.router.dicom.proxy.granted" style="display:none">
                                        <label>Query</label>
                                        <div class="field-wrapper">
                                            <label>Granted</label>
                                            <div class="input-wrapper checkbox-field">
                                                <tumbler v-model="values.router.dicom.proxy.query.granted" title="Dicom c-find proxy is granted"></tumbler>
                                                <div class="description">Dicom c-find proxy is granted</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="field-wrapper" v-show="false && values.router.dicom.proxy.granted" style="display:none">
                                        <label>Dmwl</label>
                                        <div class="field-wrapper">
                                            <label>Granted</label>
                                            <div class="input-wrapper checkbox-field">
                                                <tumbler v-model="values.router.dicom.proxy.dmwl.granted" title="Dicom worklist proxy is granted"></tumbler>
                                                <div class="description">Dicom worklist proxy is granted</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="field-wrapper" v-show="false && values.router.dicom.proxy.granted" style="display:none">
                                        <label>Retrieve</label>
                                        <div class="field-wrapper">
                                            <label>Granted</label>
                                            <div class="input-wrapper checkbox-field">
                                                <tumbler v-model="values.router.dicom.proxy.retrieve.granted" title="Dicom c-move/c-get proxy is granted"></tumbler>
                                                <div class="description">Dicom c-move/c-get proxy is granted</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="field-wrapper">
                                <div class="field-label">Priors</div>
                                <div class="fields-wrapper">
                                    <div class="field-wrapper">
                                        <label>Granted</label>
                                        <div class="input-wrapper checkbox-field">
                                            <tumbler v-model="values.router.dicom.priors.granted" title="Dicom prior engine is granted"></tumbler>
                                            <div class="description">Dicom prior engine is granted</div>
                                        </div>
                                    </div>
                                    <div class="field-wrapper" v-show="values.router.dicom.priors.granted">
                                        <label>Max</label>
                                        <div class="input-wrapper simple-field">
                                            <input-field min="1" max="10000" type="number" title="Maximum number of dicom prior rules" v-model="values.router.dicom.priors.max"></input-field>
                                            <div class="description">Maximum number of dicom prior rules</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <!--HL7-->
                    <section>
                        <div class="section-title">Hl7</div>
                        <div class="fields-row">
                            <div class="field-wrapper checkbox-field-wrapper">
                                <label>Granted</label>
                                <div class="input-wrapper checkbox-field">
                                    <tumbler v-model="values.router.hl7.granted" title="Hl7 engine is granted"></tumbler>
                                    <div class="description">Hl7 engine is granted</div>
                                </div>
                            </div>
                        </div>
                        <div class="fields-row row-columns-2">
                            <div class="field-wrapper" style="display:none">
                                <label>Iat</label>
                                <div class="input-wrapper">
                                    <input type="text" title="Issued at date-time" v-model="values.router.hl7.iat"/>
                                </div>
                            </div>
                            <div class="field-wrapper" style="display:none">
                                <label>Exp</label>
                                <div class="input-wrapper">
                                    <input type="text" title="Expiration date-time" v-model="values.router.hl7.exp"/>
                                </div>
                            </div>
                        </div>
                        <div class="fields-row section-fields" v-show="values.router.hl7.granted == true">
                            <div class="field-wrapper">
                                <div class="field-label">SCP</div>
                                <div class="fields-wrapper">
                                    <div class="field-wrapper">
                                        <label>Max</label>
                                        <div class="input-wrapper simple-field">
                                            <input-field min="1" max="1000" type="number" title="Maximum number of hl7 receivers" v-model="values.router.hl7.scp.max"></input-field>
                                            <div class="description">Maximum number of hl7 receivers</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="field-wrapper">
                                <div class="field-label">SCU</div>
                                <div class="fields-wrapper">
                                    <div class="field-wrapper">
                                        <label>Max</label>
                                        <div class="input-wrapper simple-field">
                                            <input-field min="1" max="10000" type="number" title="Maximum number of hl7 remote device records" v-model="values.router.hl7.scu.max"></input-field>
                                            <div class="description">Maximum number of hl7 remote device records</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <!--VNA-->
                    <section>
                        <div class="section-title">Vna</div>
                        <div class="fields-row">
                            <div class="field-wrapper checkbox-field-wrapper">
                                <label>Granted</label>
                                <div class="input-wrapper checkbox-field">
                                    <tumbler v-model="values.router.vna.granted" title="Vendor neutral archive is granted"></tumbler>
                                    <div class="description">Vendor neutral archive is granted</div>
                                </div>
                            </div>
                        </div>
                        <div class="fields-row row-columns-2">
                            <div class="field-wrapper" style="display:none">
                                <label>Iat</label>
                                <div class="input-wrapper">
                                    <input type="text" title="Issued at date-time" v-model="values.router.vna.iat"/>
                                </div>
                            </div>
                            <div class="field-wrapper" style="display:none">
                                <label>Exp</label>
                                <div class="input-wrapper">
                                    <input type="text" title="Expiration date-time" v-model="values.router.vna.exp"/>
                                </div>
                            </div>
                        </div>
                    </section>
                    <!--FHIR-->
                    <section>
                        <div class="section-title">FHIR</div>
                        <div class="fields-row">
                            <div class="field-wrapper checkbox-field-wrapper">
                                <label>Granted</label>
                                <div class="input-wrapper checkbox-field">
                                    <tumbler v-model="values.router.fhir.granted" title=""></tumbler>
                                    <div class="description"></div>
                                </div>
                            </div>
                        </div>
                        <div class="fields-row row-columns-2"></div>
                    </section>
                    <!--Workflow-->
                    <section>
                        <div class="section-title">Workflow</div>
                        <div class="fields-row section-fields">
                            <div class="field-wrapper checkbox-field-wrapper">
                                <label>Granted</label>
                                <div class="input-wrapper checkbox-field">
                                    <tumbler v-model="values.router.workflow.granted" title=""></tumbler>
                                    <div class="description"></div>
                                </div>
                            </div>
                        </div>
                        <div class="fields-row section-fields" v-show="values.router.workflow.granted == true">
                            <div class="field-wrapper">
                                <div class="field-label">Max</div>
                                <div class="fields-wrapper">
                                    <div class="field-wrapper">
                                        <label></label>
                                        <input-field min="1" type="number" title="" v-model="values.router.workflow.max"></input-field>
                                        <div class="description"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <!--Cluster-->
                    <section>
                        <div class="section-title">Cluster</div>
                        <div class="fields-row">
                            <div class="field-wrapper checkbox-field-wrapper">
                                <label>Granted</label>
                                <div class="input-wrapper checkbox-field">
                                    <tumbler v-model="values.router.cluster.granted" title=""></tumbler>
                                    <div class="description"></div>
                                </div>
                            </div>
                        </div>
                        <div class="fields-row row-columns-2">
                            <div class="field-wrapper" style="display:none">
                                <label>Iat</label>
                                <div class="input-wrapper">
                                    <input type="text" title="Issued at date-time" v-model="values.router.cluster.iat"/>
                                </div>
                            </div>
                            <div class="field-wrapper" style="display:none">
                                <label>Exp</label>
                                <div class="input-wrapper">
                                    <input type="text" title="Expiration date-time" v-model="values.router.cluster.exp"/>
                                </div>
                            </div>
                        </div>
                    </section>
                    <!--Worklist-->
                    <section>
                        <div class="section-title">Worklist</div>
                        <div class="fields-row">
                            <div class="field-wrapper checkbox-field-wrapper">
                                <label>Granted</label>
                                <div class="input-wrapper checkbox-field">
                                    <tumbler v-model="values.router.worklist.granted" title=""></tumbler>
                                    <div class="description"></div>
                                </div>
                            </div>
                        </div>
                        <div class="fields-row row-columns-2">
                            <div class="field-wrapper" style="display:none">
                                <label>Iat</label>
                                <div class="input-wrapper">
                                    <input type="text" title="Issued at date-time" v-model="values.router.worklist.iat"/>
                                </div>
                            </div>
                            <div class="field-wrapper" style="display:none">
                                <label>Exp</label>
                                <div class="input-wrapper">
                                    <input type="text" title="Expiration date-time" v-model="values.router.worklist.exp"/>
                                </div>
                            </div>
                        </div>
                    </section>
                    
                </div>
                <div class="generator-layout" v-if="values.product == 'editor'">
                    <!--PRO-->
                    <section>
                        <div class="section-title">Pro</div>
                        <div class="fields-row">
                            <div class="field-wrapper checkbox-field-wrapper">
                                <label>Granted</label>
                                <div class="input-wrapper checkbox-field">
                                    <tumbler v-model="values.editor.pro.granted" title="License for this product is granted"></tumbler>
                                    <div class="description">License for this product is granted</div>
                                </div>
                            </div>
                        </div>
                        <div class="fields-row row-columns-2">
                            <div class="field-wrapper" style="display:none">
                                <label>Iat</label>
                                <div class="input-wrapper">
                                    <input type="text" title="Issued at date-time" v-model="values.editor.pro.iat"/>
                                </div>
                            </div>
                            <div class="field-wrapper" style="display:none">
                                <label>Exp</label>
                                <div class="input-wrapper">
                                    <input type="text" title="License expiration date/time" v-model="values.editor.pro.exp"/>
                                </div>
                            </div>
                        </div>
                        <div class="fields-row section-fields" v-show="values.editor.pro.granted == true">
                            <div class="field-wrapper">
                                <div class="field-label">Wsi</div>
                                <div class="fields-wrapper">
                                    <div class="field-wrapper">
                                        <label>Granted</label>
                                        <div class="input-wrapper checkbox-field">
                                            <tumbler v-model="values.editor.pro.wsi.granted" title="Wsi handling is granted"></tumbler>
                                            <div class="description">Wsi handling is granted</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </template>
            <template v-slot:manual>
                <div class="field-wrapper">
                    <div class="input-wrapper">
                        <textarea v-model="manual" class="manual" ref="manual_textarea" @change="parseManual"></textarea>
                    </div>
                </div>
            </template>
        </tabs>
        <div class="fields-row field-actions">
            <!--<div class="button primary" @click="save">Save</div>-->
            <div class="button secondary" @click="generate">Generate License</div>
        </div>
        <div v-if="lock" class="lock-overlay"></div>
    </div>
    <div class="vue-modal">
        <transition name="opacity">
        <div class="overlay" v-if="modal"></div>
        </transition>
        <transition name="bounce">
        <div class="modal-window-wrapper" v-if="modal">
            <div v-show="modal" class="modal-window">
                <div class="modal-window-actions">
                    <div class="action-close" @click="modal=false">
                        <span>Close</span>
                        <div class="action-icon"><div class="icon-wrapper"></div></div>
                    </div>
                </div>
                <div class="modal-window-popup">
                    <div class="modal-title">
                        <div class="title-icon"{literal}:class="{'success':modal_type=='success','fault':modal_type=='error'}"{/literal}>
                            <div class="icon-wrapper"></div>
                        </div>
                        <span v-html="modal_title"></span>
                    </div>
                    <div class="modal-context" v-html="modal_description"></div>
                </div>
            </div>
        </div>
        </transition>
    </div>
</div>
{literal}
   <script type="text/javascript">
        if("jQuery" in window){
            jQuery(document).ready(()=>{
                if("Vue" in window){
                    Vue.component("calendar",{
                        data(){
                            return {
                                /**Flag shows that calendar container is displayed*/
                                state_open:false,
                                id:null,
                                /**Calendar current view [month|year]*/
                                view:"month",
                                /**Days of week*/
                                dow:[
                                    {
                                        short:"Mon",
                                        full:"Monday"
                                    },
                                    {
                                        short:"Tue",
                                        full:"Tuesday"
                                    },
                                    {
                                        short:"Wed",
                                        full:"Wednesday"
                                    },
                                    {
                                        short:"Thu",
                                        full:"Thursday"
                                    },
                                    {
                                        short:"Fri",
                                        full:"Friday"
                                    },
                                    {
                                        short:"Sat",
                                        full:"Saturday"
                                    },
                                    {
                                        short:"Sun",
                                        full:"Sunday"
                                    },
                                ],
                                months:[
                                    "January","February","March","April","May","June","July","August","September","October","November","December"
                                ],
                                /**Selected date*/
                                date:{
                                    day:null,
                                    month:null,
                                    year:null
                                },
                                /**Now (today) date*/
                                today:{
                                    day:null,
                                    month:null,
                                    year:null
                                },
                                /**Now date - it will use to count offsets*/
                                now:{
                                    day:null,
                                    month:null,
                                    year:null
                                },
                                /**User view date*/
                                view_date:{
                                    month:null,
                                    year:null
                                }
                            };
                        },
                        props:{
                            value:{
                                type:"String",
                                required:false,
                                default:null
                            },
                            now_date:{
                                type:"String",
                                required:false,
                                default:null
                            },
                            display_field:{
                                type:"Boolean",
                                default:true
                            }
                        },
                        methods:{
                            nextMonth(){
                                var d = new Date();
                                d.setYear(this.view_date.year);
                                d.setMonth(this.view_date.month);
                                d.setDate(1);

                                if(d.getMonth()==11){
                                    this.view_date.year+=1;
                                    this.view_date.month=0;
                                }else{
                                    this.view_date.month += 1;
                                }
                            },
                            prevMonth(){
                                var d = new Date();
                                d.setYear(this.view_date.year);
                                d.setMonth(this.view_date.month);
                                d.setDate(0);
                                
                                this.view_date.year = d.getFullYear();
                                this.view_date.month = d.getMonth();
                            },
                            select(day){
                                this.date.year = day.year;
                                this.date.month = day.month;
                                this.date.day = day.day;
                                
                                this.$emit("change",this.str_date);
                            }
                        },
                        computed:{
                            /**Days in selected month*/
                            days(){
                                var dates = [],
                                current_month = new Date(),
                                prev_month = new Date(),
                                next_month = new Date();

                                current_month.setYear(this.view_date.year);
                                current_month.setMonth(this.view_date.month);
                                current_month.setDate(1);

                                prev_month = new Date(current_month.getTime());
                                prev_month.setDate(0);

                                next_month = new Date(current_month.getTime());
                                if(current_month.getMonth()==11){
                                    next_month.setYear(current_month.getFullYear()+1);
                                    next_month.setMonth(0);
                                }else{
                                    next_month.setMonth(current_month.getMonth()+1);
                                }

                                //Чтобы узнать количество дней - получим следующий месяц и сместим на день назад.
                                var ldim = new Date(next_month.getTime());
                                ldim.setDate(0);

                                //Fill prev month days
                                var i = prev_month.getDay();
                                while(i>0){
                                    dates.push({
                                        day:prev_month.getDate()-i,
                                        month:prev_month.getMonth(),
                                        year:prev_month.getFullYear()
                                    });
                                    i-=1;
                                }
                                //Fill days from current month
                                var i = 0;
                                while(i<ldim.getDate()){
                                    dates.push({
                                        day:i+1,
                                        month:ldim.getMonth(),
                                        year:ldim.getFullYear()
                                    });
                                    i+=1;
                                }
                                //Fill days from next month

                                return dates;
                            },
                            str_date(){
                                var year = this.date.year;
                                var month = this.date.month;
                                var day = this.date.day;
                                month += 1;

                                if(month < 10) month = "0"+month;
                                if(day < 10) day = "0"+day;

                                return year+"-"+month+"-"+day;
                            },
                            diff:{
                                get(){
                                    var today = new Date();
                                    var selected = new Date();
                                    today.setFullYear(this.today.year);
                                    today.setMonth(this.today.month);
                                    today.setDate(this.today.day);
                                    if(this.now){
                                        today.setFullYear(this.now.year);
                                        today.setMonth(this.now.month);
                                        today.setDate(this.now.day);
                                    }
                                    selected.setFullYear(this.date.year);
                                    selected.setMonth(this.date.month);
                                    selected.setDate(this.date.day);

                                    var diffTime = Math.abs(selected - today);
                                    return  Math.ceil(diffTime / (1000 * 60 * 60 * 24));
                                },
                                set(offset){
                                    var d = new Date();
                                    d.setFullYear(this.today.year);
                                    d.setMonth(this.today.month);
                                    d.setDate(this.today.day);

                                    if(this.now){
                                        d.setFullYear(this.now.year);
                                        d.setMonth(this.now.month);
                                        d.setDate(this.now.day);
                                    }

                                    d.setDate(d.getDate()+parseInt(offset));
                                    this.date.year = d.getFullYear();
                                    this.date.month = d.getMonth();
                                    this.date.day = d.getDate();
                                } 
                            },
                            
                        },
                        model: {
                            prop: 'str_date',
                            event: 'change'
                        },
                        watch:{
                            now_date(){
                                if(this.now_date){
                                    var now = new Date(this.now_date);
                                    if(now){
                                        var offset = this.diff;
                                        this.now.year = now.getFullYear();
                                        this.now.month = now.getMonth();
                                        this.now.day = now.getDate();
                                        this.diff = offset;
                                        this.$emit("change",this.str_date);
                                    }
                                }
                            },
                        },
                        mounted(){
                            var d = new Date();
                            this.id = randomString();
                            if(this.value){
                                var dd = new Date(this.value);
                                if(dd){
                                    this.date.year = dd.getFullYear();
                                    this.date.month = dd.getMonth();
                                    this.date.day = dd.getDate();
                                }
                            }
                            if(this.now_date){
                                var now = new Date(this.now_date);
                                if(now){
                                    this.now.year = now.getFullYear();
                                    this.now.month = now.getMonth();
                                    this.now.day = now.getDate();
                                }
                            }

                            if(!this.date.year) this.date.year = d.getFullYear();
                            if(!this.date.month) this.date.month = d.getMonth();

                            this.today.year = d.getFullYear();
                            this.today.month = d.getMonth();
                            this.today.day = d.getDate();

                            if(!this.now.year){
                                this.now.year = this.today.year;
                                this.now.month = this.today.month;
                                this.now.day = this.today.day;
                            }

                            this.view_date.year = this.date.year;
                            this.view_date.month = this.date.month;

                            $(window).on("mousedown",(Event)=>{
                                if(this.state_open){
                                    if(Event.target && $(Event.target).closest(".vue-component[data-id='"+this.id+"']").length==0){
                                        this.state_open = false;
                                    }
                                }
                            });
                        },
                        template:`
                        <div class="vue-component calendar" :class="{'open':state_open}" :data-id="id">
                            <div class="field-wrapper">
                                <div class="input-wrapper">
                                    <input v-show="display_field" type="text" v-model="str_date" readonly />
                                </div>
                            </div>
                            <div class="calendar-icon" @click="state_open = !state_open">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path d="M12 192h424c6.6 0 12 5.4 12 12v260c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V204c0-6.6 5.4-12 12-12zm436-44v-36c0-26.5-21.5-48-48-48h-48V12c0-6.6-5.4-12-12-12h-40c-6.6 0-12 5.4-12 12v52H160V12c0-6.6-5.4-12-12-12h-40c-6.6 0-12 5.4-12 12v52H48C21.5 64 0 85.5 0 112v36c0 6.6 5.4 12 12 12h424c6.6 0 12-5.4 12-12z"/></svg>
                            </div>
                            <transition tag="template" name="bounce" appear>
                                <div class="calendar-container" v-show="state_open">
                                    <transition-group tag="div" class="calendar-header-container" name="bouncesimple" appear>
                                        <div v-if="view=='month'" class="calendar-header" key="month">
                                            <div class="calendar-button" @click="prevMonth()">
                                                <svg data-v-03f08d5d="" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path data-v-03f08d5d="" fill-rule="evenodd" clip-rule="evenodd" d="M10.4142 12L15.7071 17.2929C16.0976 17.6834 16.0976 18.3166 15.7071 18.7071C15.3166 19.0976 14.6834 19.0976 14.2929 18.7071L8.29289 12.7071C7.90237 12.3166 7.90237 11.6834 8.29289 11.2929L14.2929 5.29289C14.6834 4.90237 15.3166 4.90237 15.7071 5.29289C16.0976 5.68342 16.0976 6.31658 15.7071 6.70711L10.4142 12Z"></path></svg>
                                            </div>
                                            <div class="calendar-header-title">
                                                <span class="calendar-view view-month" @click="view='year'">
                                                    <span v-html="months[view_date.month]"></span>
                                                    <span v-html="view_date.year"></span>
                                                </span>
                                            </div>
                                            <div class="calendar-button" @click="nextMonth()">
                                                <svg data-v-03f08d5d="" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path data-v-03f08d5d="" fill-rule="evenodd" clip-rule="evenodd" d="M8.29289 17.2929C7.90237 17.6834 7.90237 18.3166 8.29289 18.7071C8.68342 19.0976 9.31658 19.0976 9.70711 18.7071L15.7071 12.7071C16.0976 12.3166 16.0976 11.6834 15.7071 11.2929L9.70711 5.29289C9.31658 4.90237 8.68342 4.90237 8.29289 5.29289C7.90237 5.68342 7.90237 6.31658 8.29289 6.70711L13.5858 12L8.29289 17.2929Z"></path></svg>
                                            </div>
                                        </div>
                                        <div v-if="view=='year'" class="calendar-header" key="year">
                                            <div class="calendar-button" @click="view_date.year--">
                                                <svg data-v-03f08d5d="" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path data-v-03f08d5d="" fill-rule="evenodd" clip-rule="evenodd" d="M10.4142 12L15.7071 17.2929C16.0976 17.6834 16.0976 18.3166 15.7071 18.7071C15.3166 19.0976 14.6834 19.0976 14.2929 18.7071L8.29289 12.7071C7.90237 12.3166 7.90237 11.6834 8.29289 11.2929L14.2929 5.29289C14.6834 4.90237 15.3166 4.90237 15.7071 5.29289C16.0976 5.68342 16.0976 6.31658 15.7071 6.70711L10.4142 12Z"></path></svg>
                                            </div>
                                            <div class="calendar-header-title">
                                                <span class="calendar-view view-year" @click="view='decade'">
                                                    <span v-html="view_date.year"></span>
                                                </span>
                                            </div>
                                            <div class="calendar-button" @click="view_date.year++">
                                                <svg data-v-03f08d5d="" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path data-v-03f08d5d="" fill-rule="evenodd" clip-rule="evenodd" d="M8.29289 17.2929C7.90237 17.6834 7.90237 18.3166 8.29289 18.7071C8.68342 19.0976 9.31658 19.0976 9.70711 18.7071L15.7071 12.7071C16.0976 12.3166 16.0976 11.6834 15.7071 11.2929L9.70711 5.29289C9.31658 4.90237 8.68342 4.90237 8.29289 5.29289C7.90237 5.68342 7.90237 6.31658 8.29289 6.70711L13.5858 12L8.29289 17.2929Z"></path></svg>
                                            </div>
                                        </div>
                                        <div v-if="view=='decade'" class="calendar-header" key="decade">
                                            <div class="calendar-button" @click="view_date.year = view_date.year - 10">
                                                <svg data-v-03f08d5d="" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path data-v-03f08d5d="" fill-rule="evenodd" clip-rule="evenodd" d="M10.4142 12L15.7071 17.2929C16.0976 17.6834 16.0976 18.3166 15.7071 18.7071C15.3166 19.0976 14.6834 19.0976 14.2929 18.7071L8.29289 12.7071C7.90237 12.3166 7.90237 11.6834 8.29289 11.2929L14.2929 5.29289C14.6834 4.90237 15.3166 4.90237 15.7071 5.29289C16.0976 5.68342 16.0976 6.31658 15.7071 6.70711L10.4142 12Z"></path></svg>
                                            </div>
                                            <div class="calendar-header-title">
                                                <span class="calendar-view view-decade">
                                                    <span>{{view_date.year}} - {{view_date.year + 10}}</span>
                                                </span>
                                            </div>
                                            <div class="calendar-button" @click="view_date.year = view_date.year + 10">
                                                <svg data-v-03f08d5d="" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path data-v-03f08d5d="" fill-rule="evenodd" clip-rule="evenodd" d="M8.29289 17.2929C7.90237 17.6834 7.90237 18.3166 8.29289 18.7071C8.68342 19.0976 9.31658 19.0976 9.70711 18.7071L15.7071 12.7071C16.0976 12.3166 16.0976 11.6834 15.7071 11.2929L9.70711 5.29289C9.31658 4.90237 8.68342 4.90237 8.29289 5.29289C7.90237 5.68342 7.90237 6.31658 8.29289 6.70711L13.5858 12L8.29289 17.2929Z"></path></svg>
                                            </div>
                                        </div>
                                    </transition-group>
                                    <transition-group tag="div" class="calendar-body" name="bounce" appear>
                                        <div v-if="view=='month'" class="calendar-view view-month" key="month">
                                            <div class="calendar-view-dow">
                                                <div v-for="(day,index) in dow" class="day">
                                                    <span v-html="day.short"></span>
                                                </div>
                                            </div>
                                            <div class="calendar-view-days">
                                                <div v-for="(day,index) in days" class="day" :class="{
                                                    'current-view-month':day.year==view_date.year && day.month == view_date.month,
                                                    'current-month':day.year==today.year && day.month == today.month,
                                                    'current-day':day.year==today.year && day.month == today.month && day.day == today.day,
                                                    'selected':day.year==date.year && day.month == date.month && day.day == date.day,
                                                }"
                                                @click="select(day)"
                                                >
                                                    <div class="inside">
                                                        <span v-html="day.day">
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div v-if="view=='year'" class="calendar-view view-year" key="year">
                                            <div class="calendar-view-months">
                                                <div v-for="(month,index) in months" class="month" :class="{'current':view_date.year==today.year&&index==today.month}" @click="view_date.month=index;view='month'">
                                                    <div class="inside">
                                                        <span v-html="month"></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div v-if="view=='decade'" class="calendar-view view-decade" key="decade">
                                            <div class="calendar-view-decades">
                                                <div v-for="n in 3" class="decade" :class="{'current':view_date.year-(4-n)==today.year}" @click="view_date.year=view_date.year-(4-n);view='year'">
                                                    <div class="inside">
                                                        <span v-html="view_date.year-(4-n)"></span>
                                                    </div>
                                                </div>
                                                <div v-for="n in 11" class="decade" :class="{'current':view_date.year+(n-1)==today.year}" @click="view_date.year=view_date.year+(n-1);view='year'">
                                                    <div class="inside">
                                                        <span v-html="view_date.year+(n-1)"></span>
                                                    </div>
                                                </div>
                                                <div v-for="n in 2" class="decade" :class="{'current':view_date.year+(n+10)==today.year}" @click="view_date.year=view_date.year+(n+10);view='year'">
                                                    <div class="inside">
                                                        <span v-html="view_date.year+(n+10)"></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </transition-group>
                                </div>
                            </transition>
                        </div>
                        `
                    });
                    Vue.component("tabs",{
                        data(){
                            return {
                                tab_selected:null
                            };
                        },
                        props:{
                            tabs:{
                                type:"Object",
                                default:{},
                                required:false
                            },
                        },
                        computed:{
                            selected:{
                                get(){

                                },
                                set(tab_name){
                                }
                            }
                        },
                        mounted(){
                            if(!this.tab_selected){
                                this.tab_selected = Object.keys(this.tabs)[0];
                            }
                        },
                        template:`
                        <div class="vue-component tabs">
                            <div class="tabs-header">
                                <div v-for="(tab,tab_name) in tabs" class="tab" :class="{'selected':tab_name==tab_selected}" @click="tab_selected=tab_name">
                                    <span v-html="tab"></span>
                                </div>
                            </div>
                            <div class="tabs-container">
                                <div v-for="(tab,tab_name) in tabs" class="tab" v-show="tab_name==tab_selected">
                                    <slot :name="tab_name"></slot>
                                </div>
                            </div>
                        </div>
                        `
                    });
                    Vue.component("tumbler",{
                        data(){
                            return {};
                        },
                        model: {
                            prop: 'checked',
                            event: 'change'
                        },
                        props:{
                            checked:{
                                type:"Boolean",
                                default:false
                            },
                        },
                        watch:{
                            checked(){
                                this.$emit('change',this.checked)
                            }
                        },
                        template:`
                        <div class="vue-component tumbler" :class="{'checked':checked}" @click="checked = !checked">
                            <input type="checkbox" style="display:none;" name="" v-model="checked"/>
                            <div class="component-fill"></div>
                            <div class="pipe" :style="{}"></div>
                        </div>
                        `
                    });
                    Vue.component("input-field",{
                        data(){
                            return {
                                error:false
                            };
                        },
                        model: {
                            prop: 'value',
                            event: 'change'
                        },
                        props:{
                            value:"",
                            min:{
                                type:"Number",
                                default:null,
                                required:false
                            },
                            max:{
                                type:"Number",
                                default:null,
                                required:false
                            },
                            type:{
                                type:"String",
                                default:"number",
                                required:false
                            },
                            title:{
                                type:"String",
                                default:"",
                                required:false
                            },
                        },
                        watch:{
                            value(){
                                if(this.value){
                                    if(this.type == "number"){
                                        if(this.min && parseInt(this.value) < parseInt(this.min)){
                                            this.value = this.min;
                                            this.error = true;
                                            console.warn({
                                                min:this.min,
                                                value:this.value
                                            });
                                            setTimeout(()=>{this.error=false;},1000);
                                        }else if(this.max && parseInt(this.value) > parseInt(this.max)){
                                            this.value = this.max;
                                            this.error = true;
                                            console.warn({
                                                max:this.max,
                                                value:this.value
                                            });
                                            setTimeout(()=>{this.error=false;},1000);
                                        }
                                    }
                                }
                                console.log(this.value);
                            }
                        },
                        template:`
                        <div class="input-wrapper">
                            <input :type="type" v-model="value" :title="title" @change="$emit('change',$event.target.value)"/>
                            <transition name="opacity">
                                <span v-if="error" class="input-error">
                                    <template v-if="min && max">Value must be between {{min}} and {{max}}</template>
                                    <template v-if="min && !max">Value must be between greater than {{min}}</template>
                                    <template v-if="!min && max">Value must be between less than {{max}}</template>
                                </span>
                            </transition>
                        </div>
                        `
                    });
                    window.LicensesGeneratorController = new Vue({
                        "el":"#license_generator_container",
                        data(){
                            return{
                                id:"{/literal}{$RECORD_ID}{literal}",
                                lock:false,
                                values:{
                                    hid:"{/literal}{$HARDWARE_ID}{literal}",
                                    serial:"{/literal}{$SERIAL}{literal}",
                                    version:"jwt.v2",
                                    start_date:"{/literal}{$CURRENT_DATE}{literal}",
                                    days:365,
                                    product:null,
                                    platform:"standalone",
                                    router:{
                                        platform:"standalone",
                                        storage:{
                                            max:100,
                                            /*
                                            quota:{
                                                size:{
                                                    max:1,
                                                },
                                                study:{
                                                    max:1,
                                                },
                                                hl7:{
                                                    max:1,
                                                },
                                                order:{
                                                    max:1,
                                                },
                                                dynamic:{
                                                    granted:false,
                                                },
                                            },
                                            retention:{
                                                study:{
                                                    max:3600,
                                                },
                                                hl7:{
                                                    max:3600,
                                                },
                                                order:{
                                                    max:3600,
                                                },
                                            }*/
                                        },
                                        dicom:{
                                            iss:"Dicom Systems",
                                            iat:"{/literal}{$CURRENT_DATE}{literal}",
                                            exp:"{/literal}{$OFFSET_DATE}{literal}",
                                            granted:false,
                                            scp:{
                                                max:1000
                                            },
                                            scu:{
                                                max:10000
                                            },
                                            router:{
                                                granted:false,
                                                max:10000
                                            },
                                            transform:{
                                                granted:false,
                                                max:10000
                                            },
                                            proxy:{
                                                granted:false,
                                                max:10000,
                                                query:{
                                                    granted:true,
                                                },
                                                dmwl:{
                                                    granted:true,
                                                },
                                                retrieve:{
                                                    granted:true,
                                                },
                                            },
                                            priors:{
                                                granted:false,
                                                max:10000
                                            },
                                        },
                                        hl7:{
                                            iss:"Dicom Systems",
                                            iat:"{/literal}{$CURRENT_DATE}{literal}",
                                            exp:"{/literal}{$OFFSET_DATE}{literal}",
                                            granted:false,
                                            scp:{
                                                max:1000
                                            },
                                            scu:{
                                                max:10000
                                            }
                                        },
                                        vna:{
                                            iss:"Dicom Systems",
                                            iat:"{/literal}{$CURRENT_DATE}{literal}",
                                            exp:"{/literal}{$OFFSET_DATE}{literal}",
                                            granted:false, 
                                        },
                                        fhir:{
                                            granted:false
                                        },
                                        workflow:{
                                            granted:false,
                                            max:5
                                        },
                                        cluster:{
                                            iat:"{/literal}{$CURRENT_DATE}{literal}",
                                            exp:"{/literal}{$OFFSET_DATE}{literal}",
                                            granted:false,
                                        },
                                        worklist:{
                                            iat:"{/literal}{$CURRENT_DATE}{literal}",
                                            exp:"{/literal}{$OFFSET_DATE}{literal}",
                                            granted:false,
                                        },
                                    },
                                    editor:{
                                        iss:"Dicom Systems",
                                        pro:{
                                            iat:"{/literal}{$CURRENT_DATE}{literal}",
                                            exp:"{/literal}{$OFFSET_DATE}{literal}",
                                            granted:false,
                                            wsi:{
                                                granted:false
                                            }
                                        },
                                    }
                                },
                                diff_from:"",
                                modal:false,
                                modal_type:"success",
                                modal_title:"",
                                modal_description:"",
                                modal_actions:[]
                            };
                        },
                        methods:{
                            calculateIAT(date){
                                this.values.router.dicom.iat = this.values.router.hl7.iat = this.values.router.vna.iat = this.values.editor.pro.iat = this.values.dicom.cluster.iat = this.values.dicom.worklist.iat = date;
                                this.diff_from = date;
                            },
                            calculateEXP(date){
                                this.values.router.dicom.exp = this.values.router.hl7.exp = this.values.router.vna.exp = this.values.editor.pro.exp = this.values.dicom.cluster.exp = this.values.dicom.worklist.exp = date;
                            },
                            generateContent(key,section){
                                var values = [];
                                for(var i in section){
                                    var prefix = ""+key+"."+i;
                                    switch(typeof section[i]){
                                        case 'object':
                                        case 'array':
                                            values = values.concat(this.generateContent(prefix,section[i]));
                                        break;
                                        default:
                                            var value = section[i];
                                            //For date fields
                                            if([
                                                ".editor.pro.exp",
                                                ".editor.pro.iat",
                                                ".router.dicom.exp",
                                                ".router.dicom.iat",
                                                ".router.hl7.exp",
                                                ".router.hl7.iat",
                                                ".router.vna.exp",
                                                ".router.vna.iat",
                                                ".start_date",
                                                ".router.cluster.iat",
                                                ".router.cluster.iat",
                                                ".router.worklist.iat",
                                                ".router.worklist.iat",
                                            ].indexOf(prefix)>-1){
                                                var d = new Date(value);
                                                if(d){
                                                    value = d.toISOString();
                                                }
                                            }
                                            switch(prefix){
                                                case ".product":
                                                    continue;
                                                break;
                                                case "router.storage.quota.dynamic.granted":
                                                case ".router.storage.quota.hl7.max":
                                                case ".router.storage.quota.order.max":
                                                case ".router.storage.quota.size.max":
                                                case ".router.storage.quota.study.max":
                                                case ".router.storage.retention.hl7.max":
                                                case ".router.storage.retention.order.max":
                                                case ".router.storage.retention.study.max":
                                                    continue;
                                                break;
                                            }
                                            values.push(prefix+"="+value);
                                        break;
                                    }
                                }
                                return values;
                            },
                            /**Decode manual contents to editor*/
                            parseManual(contents=null){
                                setTimeout(()=>{
                                    var decoded = contents!==null&&typeof contents == "string"?contents.split("\n"):this.$refs.manual_textarea.value.split("\n");
                                    for(var i in decoded){
                                        if(decoded[i][0]=="."){
                                            decoded[i] = decoded[i].substring(1);
                                            var line = decoded[i].split("=");
                                            if(line.length==2){
                                                var value = "'"+line[1]+"'";
                                                if(line[1]=='false'||line[1]=='true'){
                                                    value = line[1]==true||line[1]=='true';
                                                }
                                                if(typeof value == 'string' && value.trim().length==0){
                                                    value = "''";
                                                }
                                                var key = line[0].replace("&quot;","");
                                                if(typeof eval("window.LicensesGeneratorController.values."+key) != "undefined"){
                                                    eval("window.LicensesGeneratorController.values."+key+"="+value);
                                                }
                                            }
                                        }
                                    }
                                },100);
                                
                            },
                            save(){
                                this.lock = true;
                                fetch(window.location.origin+"/index.php?module=ass_hardware&action=update_license&record="+this.id,{
                                    method:"POST",
                                    body:JSON.stringify(this.manual)
                                }).then(response=>response.json()).then((response)=>{
                                    this.lock = false;
                                    if(response.result == true){
                                        this.modal_type = "success";
                                        this.modal_title = "License saved";
                                        this.modal_description = "";
                                        this.modal = true;
                                    }else{
                                        this.modal_type = "error";
                                        this.modal_title = "Failed to save license";
                                        this.modal_description = "";
                                        this.modal = true;
                                    }
                                }).catch((error)=>{
                                    this.lock = false;
                                    this.modal_type = "error";
                                    this.modal_title = "Failed to save license";
                                    this.modal_description = "";
                                    this.modal = true;
                                });
                            },
                            generate(){
                                this.lock = true;
                                fetch(window.location.origin+"/index.php?module=ass_hardware&action=generate_license&record="+this.id+"&days="+this.values.days+"&start_date="+this.values.start_date,{
                                    method:"POST",
                                    body:JSON.stringify(this.manual)
                                }).then(response=>response.json()).then((response)=>{
                                    this.lock = false;
                                    if(response.result == true){
                                        this.modal_type = "success";
                                        this.modal_title = "License generated";
                                        this.modal_description = "License generated successfully. You can find generated license located at panel 'licences'";
                                        this.modal = true;
                                        window["update_licenses_list"]();
                                    }else{
                                        this.modal_type = "error";
                                        this.modal_title = "Failed to generate license";
                                        this.modal_description = response.description?response.description:"";
                                        this.modal = true;
                                    }
                                }).catch((error)=>{
                                    this.lock = false;
                                    this.modal_type = "error";
                                    this.modal_title = "Failed to generate license";
                                    this.modal_description = "";
                                    this.modal = true;
                                });
                            }
                        },
                        computed:{
                            manual:{
                                get(){
                                    var contents = this.generateContent("",this.values);
                                    contents.sort();
                                    return contents.join("\n");
                                },
                            }
                        },
                        mounted(){
                            var license = "{/literal}{$LICENSE}{literal}";
                            if(license.toString().trim().length>0){
                                this.parseManual(license);
                            }
                            var type = "{/literal}{$HDTYPE}{literal}";
                            var rapid = "{/literal}{$RAPID}{literal}";
                            if(type == "dicom"){
                                this.values.product = 'editor';
                            }else{
                                if(rapid == '1'){
                                    this.values.product = 'rapid';
                                }else{
                                    this.values.product = 'router';
                                }
                            }
                        }
                    });
                }
            });
        }
        /**
        * генерирует случайную строку
        * @param {int} length Длина строки
        */
        function randomString(length=6){
            var result           = '';
            var characters       = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
            var charactersLength = characters.length;
            for ( var i = 0; i < length; i++ ) {
            result += characters.charAt(Math.floor(Math.random() * charactersLength));
            }
            return result;
        }
   </script> 
{/literal}