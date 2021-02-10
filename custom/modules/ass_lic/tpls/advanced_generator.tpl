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
    }
    .generator-form .generator-layout section{
        border-bottom: 1px solid #d2e8f9;
        padding: 20px 0px 10px;
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
        background:rgb(210 232 249);
        border-radius: 3px;
    }
    .vue-component.tumbler > .pipe{
        background: #03a9f4;
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
    .vue-component.tumbler.checked > .pipe{
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
</style>
{/literal}
<div id="license_generator_container">
    <span v-if="false">Generator requires vue.js</span>
    <div v-if="true" class="generator-form" {literal}:class="{'loading':lock}"{/literal}>
        <div class="fields-row row-columns-5">
            <div class="field-wrapper">
                <label>Hardware id</label>
                <div class="input-wrapper">
                    <input type="text" maxlength="255" title="hardware identifier" v-model="values.hid"/>
                </div>
            </div>
            <div class="field-wrapper">
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
            <div class="field-wrapper">
                <label>Platform</label>
                <div class="input-wrapper">
                    <select v-model="values.router.platform" title="router platform type">
                        <option value="standalone">Standalone</option>
                        <option value="gcp">Gcp</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="fields-row">
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
        :selected="form"
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
                                    <tumbler v-model="values.rapid.dicom.granted" title="Rapid engine is granted"></tumbler>
                                </div>
                            </div>
                        </div>
                        <div class="fields-row row-columns-2">
                            <div class="field-wrapper">
                                <label>Iat</label>
                                <div class="input-wrapper">
                                    <input type="text" title="Issued at date-time" v-model="values.rapid.dicom.iat"/>
                                </div>
                            </div>
                            <div class="field-wrapper">
                                <label>Exp</label>
                                <div class="input-wrapper">
                                    <input type="text" title="Expiration date-time" v-model="values.rapid.dicom.exp"/>
                                </div>
                            </div>
                        </div>
                        <div class="fields-row section-fields" v-show="values.rapid.dicom.granted == true">
                            <div class="field-wrapper">
                                <div class="field-label">SCP</div>
                                <div class="fields-wrapper">
                                    <div class="field-wrapper">
                                        <label>Max</label>
                                        <div class="input-wrapper">
                                            <input min="1" max="1000" type="number" title="Maximum number of rapid receivers" v-model="values.rapid.dicom.scp.max"/>
                                        </div>
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
                                        <div class="input-wrapper">
                                            <input min="1" max="100" type="number" title="Maximum number of storages" v-model="values.router.storage.max"/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="field-wrapper">
                                <div class="field-label">Quota</div>
                                <div class="fields-wrapper">
                                    <div class="field-wrapper">
                                        <label>Size</label>
                                        <div class="input-wrapper">
                                            <div class="field-wrapper">
                                                <label>Max</label>
                                                <input type="number" min="1" title="Maximum storage capacity" v-model="values.router.storage.quota.size.max"/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="field-wrapper">
                                        <label>Study</label>
                                        <div class="input-wrapper">
                                            <div class="field-wrapper">
                                                <label>Max</label>
                                                <input type="number" min="1" title="Maximum number of studies" v-model="values.router.storage.quota.study.max"/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="field-wrapper">
                                        <label>Hl7</label>
                                        <div class="input-wrapper">
                                            <div class="field-wrapper">
                                                <label>Max</label>
                                                <input type="number" min="1" title="Maximum number of hl7 messages" v-model="values.router.storage.quota.hl7.max"/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="field-wrapper">
                                        <label>Order</label>
                                        <div class="input-wrapper">
                                            <div class="field-wrapper">
                                                <label>Max</label>
                                                <input type="number" min="1" title="Maximum number of dicom worklist orders" v-model="values.router.storage.quota.order.max"/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="field-wrapper">
                                        <label>Dynamic</label>
                                        <div class="input-wrapper">
                                            <div class="field-wrapper">
                                                <label>Granted</label>
                                                <div class="input-wrapper">
                                                    <tumbler v-model="values.router.storage.quota.dynamic.granted" title="Grant dynamic quota service"></tumbler>
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
                                                <input type="number" min="3600" title="Maximum retention period for dicom study" v-model="values.router.storage.retention.study.max"/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="field-wrapper">
                                        <label>Hl7</label>
                                        <div class="input-wrapper">
                                            <div class="field-wrapper">
                                                <label>Max</label>
                                                <input type="number" min="3600" title="Maximum retention period for hl7 message" v-model="values.router.storage.retention.hl7.max"/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="field-wrapper">
                                        <label>Order</label>
                                        <div class="input-wrapper">
                                            <div class="field-wrapper">
                                                <label>Max</label>
                                                <input type="number" min="3600" title="Maximum retention period for dicom worklist order" v-model="values.router.storage.retention.order.max"/>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <!--DICOM-->
                    <section>
                        <div class="section-title">Dicom</div>
                        <div class="fields-row">
                            <div class="field-wrapper checkbox-field-wrapper">
                                <label>Granted</label>
                                <div class="input-wrapper">
                                    <tumbler v-model="values.router.dicom.granted" title="Dicom engine is granted"></tumbler>
                                </div>
                            </div>
                        </div>
                        <div class="fields-row row-columns-2">
                            <div class="field-wrapper">
                                <label>Iat</label>
                                <div class="input-wrapper">
                                    <input type="text" title="Issued at date-time" v-model="values.router.dicom.iat"/>
                                </div>
                            </div>
                            <div class="field-wrapper">
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
                                        <div class="input-wrapper">
                                            <input min="1" max="1000" type="number" title="Maximum number of dicom receivers" v-model="values.router.dicom.scp.max"/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="field-wrapper">
                                <div class="field-label">SCU</div>
                                <div class="fields-wrapper">
                                    <div class="field-wrapper">
                                        <label>Max</label>
                                        <div class="input-wrapper">
                                            <input min="1" max="10000" type="number" title="Maximum number of registered remote dicom devices" v-model="values.router.dicom.scu.max"/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="field-wrapper">
                                <div class="field-label">Router</div>
                                <div class="fields-wrapper">
                                    <div class="field-wrapper">
                                        <label>Granted</label>
                                        <div class="input-wrapper">
                                            <tumbler v-model="values.router.dicom.router.granted" title="Dicom router is granted"></tumbler>
                                        </div>
                                    </div>
                                    <div class="field-wrapper" v-show="values.router.dicom.router.granted">
                                        <label>Max</label>
                                        <div class="input-wrapper">
                                            <input min="1" max="10000" type="number" title="Maximum number of dicom router rules" v-model="values.router.dicom.router.max"/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="field-wrapper">
                                <div class="field-label">Transform</div>
                                <div class="fields-wrapper">
                                    <div class="field-wrapper">
                                        <label>Granted</label>
                                        <div class="input-wrapper">
                                            <tumbler v-model="values.router.dicom.transform.granted" title="Dicom object transformation is granted"></tumbler>
                                        </div>
                                    </div>
                                    <div class="field-wrapper" v-show="values.router.dicom.transform.granted">
                                        <label>Max</label>
                                        <div class="input-wrapper">
                                            <input min="1" max="10000" type="number" title="Maximum number of dicom transformation rules" v-model="values.router.dicom.transform.max"/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="field-wrapper">
                                <div class="field-label">Proxy</div>
                                <div class="fields-wrapper">
                                    <div class="field-wrapper">
                                        <label>Granted</label>
                                        <div class="input-wrapper">
                                            <tumbler v-model="values.router.dicom.proxy.granted" title="Dicom proxy is granted"></tumbler>
                                        </div>
                                    </div>
                                    <div class="field-wrapper" v-show="values.router.dicom.proxy.granted">
                                        <label>Max</label>
                                        <div class="input-wrapper">
                                            <input type="number" title="Maximum number of dicom proxy rules" v-model="values.router.dicom.proxy.max"/>
                                        </div>
                                    </div>
                                    <div class="field-wrapper" v-show="values.router.dicom.proxy.granted">
                                        <label>Query</label>
                                        <div class="field-wrapper">
                                            <label>Granted</label>
                                            <div class="input-wrapper">
                                                <tumbler v-model="values.router.dicom.proxy.query.granted" title="Dicom c-find proxy is granted"></tumbler>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="field-wrapper" v-show="values.router.dicom.proxy.granted">
                                        <label>Dmwl</label>
                                        <div class="field-wrapper">
                                            <label>Granted</label>
                                            <div class="input-wrapper">
                                                <tumbler v-model="values.router.dicom.proxy.dmwl.granted" title="Dicom worklist proxy is granted"></tumbler>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="field-wrapper" v-show="values.router.dicom.proxy.granted">
                                        <label>Retrieve</label>
                                        <div class="field-wrapper">
                                            <label>Granted</label>
                                            <div class="input-wrapper">
                                                <tumbler v-model="values.router.dicom.proxy.retrieve.granted" title="Dicom c-move/c-get proxy is granted"></tumbler>
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
                                        <div class="input-wrapper">
                                            <tumbler v-model="values.router.dicom.priors.granted" title="Dicom prior engine is granted"></tumbler>
                                        </div>
                                    </div>
                                    <div class="field-wrapper" v-show="values.router.dicom.priors.granted">
                                        <label>Max</label>
                                        <div class="input-wrapper">
                                            <input min="1" max="10000" type="number" title="Maximum number of dicom prior rules" v-model="values.router.dicom.priors.max"/>
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
                                <div class="input-wrapper">
                                    <tumbler v-model="values.router.hl7.granted" title="Hl7 engine is granted"></tumbler>
                                </div>
                            </div>
                        </div>
                        <div class="fields-row row-columns-2">
                            <div class="field-wrapper">
                                <label>Iat</label>
                                <div class="input-wrapper">
                                    <input type="text" title="Issued at date-time" v-model="values.router.hl7.iat"/>
                                </div>
                            </div>
                            <div class="field-wrapper">
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
                                        <div class="input-wrapper">
                                            <input type="number" title="Maximum number of hl7 receivers" v-model="values.router.hl7.scp.max"/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="field-wrapper">
                                <div class="field-label">SCU</div>
                                <div class="fields-wrapper">
                                    <div class="field-wrapper">
                                        <label>Max</label>
                                        <div class="input-wrapper">
                                            <input type="number" title="Maximum number of hl7 remote device records" v-model="values.router.hl7.scu.max"/>
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
                                <div class="input-wrapper">
                                    <tumbler v-model="values.router.vna.granted" title="Vendor neutral archive is granted"></tumbler>
                                </div>
                            </div>
                        </div>
                        <div class="fields-row row-columns-2">
                            <div class="field-wrapper">
                                <label>Iat</label>
                                <div class="input-wrapper">
                                    <input type="text" title="Issued at date-time" v-model="values.router.vna.iat"/>
                                </div>
                            </div>
                            <div class="field-wrapper">
                                <label>Exp</label>
                                <div class="input-wrapper">
                                    <input type="text" title="Expiration date-time" v-model="values.router.vna.exp"/>
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
                                <div class="input-wrapper">
                                    <tumbler v-model="values.editor.pro.granted" title="License for this product is granted"></tumbler>
                                </div>
                            </div>
                        </div>
                        <div class="fields-row row-columns-2">
                            <div class="field-wrapper">
                                <label>Iat</label>
                                <div class="input-wrapper">
                                    <input type="text" title="Issued at date-time" v-model="values.editor.pro.iat"/>
                                </div>
                            </div>
                            <div class="field-wrapper">
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
                                        <div class="input-wrapper">
                                            <tumbler v-model="values.editor.pro.wsi.granted" title="Wsi handling is granted"></tumbler>
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
            <div class="button primary" @click="save">Save</div>
            <div class="button secondary">Generate License</div>
        </div>
        <div v-if="lock" class="lock-overlay"></div>
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
                            }
                        },
                        mounted(){
                            var d = new Date();
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
                        },
                        template:`
                        <div class="vue-component calendar" :class="{'open':state_open}">
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
                    window.LicensesGeneratorController = new Vue({
                        "el":"#license_generator_container",
                        data(){
                            return{
                                id:"{/literal}{$RECORD_ID}{literal}",
                                lock:false,
                                values:{
                                    hid:"{/literal}{$HARDWARE_ID}{literal}",
                                    serial:"{/literal}{$SERIAL}{literal}",
                                    version:"",
                                    start_date:"{/literal}{$CURRENT_DATE}{literal}",
                                    days:365,
                                    product:null,
                                    platform:"standalone",
                                    rapid:{
                                        dicom:{
                                            granted:false,
                                            iat:"{/literal}{$CURRENT_DATE}{literal}",
                                            exp:"{/literal}{$OFFSET_DATE}{literal}",
                                            scp:{
                                                max:1000
                                            }
                                        },
                                    },
                                    router:{
                                        platform:"standalone",
                                        storage:{
                                            max:100,
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
                                            }
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
                                                    granted:false,
                                                },
                                                dmwl:{
                                                    granted:false,
                                                },
                                                retrieve:{
                                                    granted:false,
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
                                        }
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
                                diff_from:""
                            };
                        },
                        methods:{
                            calculateIAT(date){
                                this.values.rapid.dicom.iat = this.values.router.dicom.iat = this.values.router.hl7.iat = this.values.router.vna.iat = this.values.editor.pro.iat = date;
                                this.diff_from = date;
                            },
                            calculateEXP(date){
                                this.values.rapid.dicom.exp = this.values.router.dicom.exp = this.values.router.hl7.exp = this.values.router.vna.exp = this.values.editor.pro.exp = date;
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
                                                ".rapid.dicom.exp",
                                                ".rapid.dicom.iat",
                                                ".router.dicom.exp",
                                                ".router.dicom.iat",
                                                ".router.hl7.exp",
                                                ".router.hl7.iat",
                                                ".router.vna.exp",
                                                ".router.vna.iat",
                                                ".start_date",
                                            ].indexOf(prefix)>-1){
                                                var d = new Date(value);
                                                if(d){
                                                    value = d.toISOString();
                                                }
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
                                    var decoded = contents?contents.split("\n"):this.$refs.manual_textarea.value.split("\n");
                                    for(var i in decoded){
                                        if(decoded[i][0]=="."){
                                            decoded[i] = decoded[i].substring(1);
                                            var line = decoded[i].split("=");
                                            if(line.length==2){
                                                var value = "'"+line[1]+"'";
                                                if(line[1]==false||line[1]==true||line[1]=='false'||line[1]=='true'){
                                                    value = line[1]==true||line[1]=='true';
                                                }
                                                if(typeof value == 'string' && value.trim().length==0){
                                                    value = "''";
                                                }
                                                var key = line[0].replace("&quot;","");
                                                eval("window.LicensesGeneratorController.values."+key+"="+value);
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
                                        
                                    }
                                }).catch((error)=>{
                                    this.lock = false;
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
                                set(value){}
                            }
                        },
                        mounted(){
                            var license = "{/literal}{$LICENSE}{literal}";
                            if(license.toString().trim().length>0){
                                this.parseManual(license);
                            }
                        }
                    });
                }
            });
        }
   </script> 
{/literal}
{*

{
  "$schema": "http://json-schema.org/draft-07/schema#",
  "$id": "http://www.dcmsys.com/license",
  "title": "license",
  "description": "Dicom Systems License Schema",
  "required": [
    "version",
    "hid"
  ],
  "type": "object",
  "properties": {
    "hid": {
      "type": "string",
      "minLength": 6,
      "maxLength": 255,
      "description": "hardware identifier"
    },
    "router": {
      "type": "object",
      "description": "Dcmsys Router",
      "required": [
        "platform"
      ],
      "properties": {
        "platform": {
          "type": "string",
          "enum": [
            "standalone",
            "gcp"
          ],
          "default": "standalone",
          "description": "router platform type"
        },
        "storage": {
          "type": "object",
          "properties": {
            "max": {
              "type": "integer",
              "minimum": 1,
              "maximum": 100,
              "default": 100,
              "description": "maximum number of storages"
            },
            "quota": {
              "type": "object",
              "description": "storage quota parameters",
              "properties": {
                "size": {
                  "type": "object",
                  "properties": {
                    "max": {
                      "type": "integer",
                      "minimum": 1,
                      "description": "maximum storage capacity"
                    }
                  },
                  "description": "storage capacity"
                },
                "study": {
                  "type": "object",
                  "properties": {
                    "max": {
                      "type": "integer",
                      "minimum": 1,
                      "description": "maximum number of studies"
                    }
                  },
                  "description": "dicom studies"
                },
                "hl7": {
                  "type": "object",
                  "properties": {
                    "max": {
                      "type": "integer",
                      "minimum": 1,
                      "description": "maximum number of hl7 messages"
                    }
                  },
                  "description": "hl7 messages"
                },
                "order": {
                  "type": "object",
                  "properties": {
                    "max": {
                      "type": "integer",
                      "minimum": 1,
                      "description": "maximum number of dicom worklist orders"
                    }
                  },
                  "description": "dicom worklist"
                },
                "dynamic": {
                  "type": "object",
                  "properties": {
                    "granted": {
                      "type": "boolean",
                      "description": "grant dynamic quota service"
                    }
                  },
                  "description": "dynamic quota having pool zone for unrouted studies"
                }
              }
            },
            "retention": {
              "type": "object",
              "description": "limit storage data retention",
              "properties": {
                "study": {
                  "type": "object",
                  "properties": {
                    "max": {
                      "type": "integer",
                      "minimum": 3600,
                      "description": "maximum retention period for dicom study"
                    }
                  },
                  "description": "dicom study retention period"
                },
                "hl7": {
                  "type": "object",
                  "properties": {
                    "max": {
                      "type": "integer",
                      "minimum": 3600,
                      "description": "maximum retention period for hl7 message"
                    }
                  },
                  "description": "hl7 message retention period"
                },
                "order": {
                  "type": "object",
                  "properties": {
                    "max": {
                      "type": "integer",
                      "minimum": 3600,
                      "description": "maximum retention period for dicom worklist order"
                    }
                  },
                  "description": "dicom worklist order retention period"
                }
              }
            }
          },
          "description": "storage parameters"
        },
        "dicom": {
          "type": "object",
          "required": [
            "iat",
            "exp"
          ],
          "properties": {
            "iss": {
              "type": "string",
              "default": "Dicom Systems",
              "description": "issued by"
            },
            "iat": {
              "type": "string",
              "format": "date-time",
              "description": "issued at date-time"
            },
            "exp": {
              "type": "string",
              "format": "date-time",
              "description": "expiration date-time"
            },
            "granted": {
              "type": "boolean",
              "description": "dicom engine is granted"
            },
            "scp": {
              "type": "object",
              "properties": {
                "max": {
                  "type": "integer",
                  "minimum": 1,
                  "maximum": 1000,
                  "default": 1000,
                  "description": "maximum number of dicom receivers"
                }
              },
              "description": "dicom receiver"
            },
            "scu": {
              "type": "object",
              "properties": {
                "max": {
                  "type": "integer",
                  "minimum": 1,
                  "maximum": 10000,
                  "default": 10000,
                  "description": "maximum number of registered remote dicom devices"
                }
              },
              "description": "dicom remote device"
            },
            "router": {
              "type": "object",
              "properties": {
                "granted": {
                  "type": "boolean",
                  "description": "dicom router is granted"
                },
                "max": {
                  "type": "integer",
                  "minimum": 1,
                  "maximum": 10000,
                  "default": 10000,
                  "description": "maximum number of dicom router rules"
                }
              },
              "description": "dicom router"
            },
            "transform": {
              "type": "object",
              "properties": {
                "granted": {
                  "type": "boolean",
                  "description": "dicom object transformation is granted"
                },
                "max": {
                  "type": "integer",
                  "minimum": 1,
                  "maximum": 10000,
                  "default": 10000,
                  "description": "maximum number of dicom transformation rules"
                }
              },
              "description": "dicom object transformation"
            },
            "proxy": {
              "type": "object",
              "properties": {
                "granted": {
                  "type": "boolean",
                  "description": "dicom proxy is granted"
                },
                "max": {
                  "type": "integer",
                  "minimum": 1,
                  "maximum": 10000,
                  "default": 10000,
                  "description": "maximum number of dicom proxy rules"
                },
                "query": {
                  "type": "object",
                  "properties": {
                    "granted": {
                      "type": "boolean",
                      "description": "dicom c-find proxy is granted"
                    }
                  },
                  "description": "dicom c-find proxy"
                },
                "dmwl": {
                  "type": "object",
                  "properties": {
                    "granted": {
                      "type": "boolean",
                      "description": "dicom worklist proxy is granted"
                    }
                  },
                  "description": "dicom worklist proxy"
                },
                "retrieve": {
                  "type": "object",
                  "properties": {
                    "granted": {
                      "type": "boolean",
                      "description": "dicom c-move/c-get proxy is granted"
                    }
                  },
                  "description": "dicom c-move/c-get proxy"
                }
              },
              "description": "dicom proxy engine"
            },
            "priors": {
              "type": "object",
              "properties": {
                "granted": {
                  "type": "boolean",
                  "description": "dicom prior engine is granted"
                },
                "max": {
                  "type": "integer",
                  "minimum": 1,
                  "maximum": 10000,
                  "default": 10000,
                  "description": "maximum number of dicom prior rules"
                }
              },
              "description": "dicom prior engine"
            }
          },
          "description": "dicom engine"
        },
        "hl7": {
          "type": "object",
          "required": [
            "iat",
            "exp"
          ],
          "properties": {
            "iss": {
              "type": "string",
              "default": "Dicom Systems",
              "description": "issued by"
            },
            "iat": {
              "type": "string",
              "format": "date-time",
              "description": "issued at date-time"
            },
            "exp": {
              "type": "string",
              "format": "date-time",
              "description": "expiration date-time"
            },
            "granted": {
              "type": "boolean",
              "description": "hl7 engine is granted"
            },
            "scp": {
              "type": "object",
              "properties": {
                "max": {
                  "type": "integer",
                  "minimum": 1,
                  "maximum": 1000,
                  "default": 1000,
                  "description": "maximum number of hl7 receivers"
                }
              },
              "description": "hl7 receiver"
            },
            "scu": {
              "type": "object",
              "properties": {
                "max": {
                  "type": "integer",
                  "minimum": 1,
                  "maximum": 10000,
                  "default": 10000,
                  "description": "maximum number of hl7 remote device records"
                }
              },
              "description": "hl7 remote device records"
            }
          },
          "description": "hl7 engine"
        },
        "vna": {
          "type": "object",
          "required": [
            "iat",
            "exp"
          ],
          "properties": {
            "iss": {
              "type": "string",
              "default": "Dicom Systems",
              "description": "issued by"
            },
            "iat": {
              "type": "string",
              "format": "date-time",
              "description": "issued at date-time"
            },
            "exp": {
              "type": "string",
              "format": "date-time",
              "description": "expiration date-time"
            },
            "granted": {
              "type": "boolean",
              "description": "vendor neutral archive is granted"
            }
          },
          "description": "vendor neutral archive"
        }
      }
    },
    "editor": {
      "type": "object",
      "description": "Dcmsys DICOM Editor",
      "properties": {
        "iss": {
          "type": "string",
          "default": "Dicom Systems",
          "description": "issued by"
        },
        "pro": {
          "type": "object",
          "required": [
            "iat",
            "exp"
          ],
          "iat": {
            "type": "string",
            "format": "date-time",
            "description": "issued at date/time"
          },
          "exp": {
            "type": "string",
            "format": "date-time",
            "description": "license expiration date/time"
          },
          "granted": {
            "type": "bool",
            "description": "license for this product is granted"
          },
          "wsi": {
            "type": "object",
            "properties": {
              "granted": {
                "type": "boolean",
                "description": "wsi handling is granted"
              }
            },
            "description": "WSI features"
          },
          "description": "professional version of the dicom editor"
        }
      }
    }
  }
}

*}