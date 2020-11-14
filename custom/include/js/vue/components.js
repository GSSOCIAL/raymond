if("Vue" in window){
    /**
     * Выпадающая панель
     */
    Vue.component("dropdown-panel",{
        data(){
            return{
                /**
                 * Флаг отображает открыта панели или нет
                 */
                visible:false,
                /**
                 * Показывает что сейчас активна анимация (нужно для багфиксов стилей)
                 */
                transition_active:false
            };
        },
        props:{
            /**
             * Лейбл кнопки
             */
            label:{
                type:"String",
                default:`<span class="dropdown-dots"><span></span><span></span><span></span></span>`
            }
        },
        methods:{
            /**
             * Скрывает панель
             */
            hide(){
                this.visible = false;
            }
        },
        watch:{
            visible(o,n){
                if(!o){
                    setTimeout(()=>{
                        this.transition_active = this.visible;
                    },1000);
                }else{
                    this.transition_active = true;
                }
            }
        },
        template:`
        <div :class="{'dropdown-panel':true,'active':visible,'still-active':transition_active}">
        <div class="action-button button" v-html="label" @click="visible=!visible"></div>
        <transition name="opacity">
            <div class="overlay-container" v-if="visible" @click="visible=false"></div>
        </transition>
        <transition name="bounce">
            <div class="dropdown-container" v-if="visible">
                <slot :close="hide" :visible="visible">no data available</slot>
            </div>
        </transition>
        </div>
        `
    });

    var input_mixins = {
        props:{
            name:{
                type:"String",
                value:null
            },
            label:{
                type:"String",
                value:null
            },
            value:{
                type:"String",
                value:null
            },
            placeholder:{
                type:"String",
                value:null
            },
            type:{
                type:"String",
                value:"text"
            },
        },
        mounted(){
            
        }
    };
    Vue.component("switch-field",{
        data(){
            return{};
        },
        props:{
            checked:{
                type:"Boolean",
                default:false
            },
        },
        methods:{
            toggle(){
                this.checked = !this.checked;
            }
        },
        watch:{
            checked(){
                this.value=this.checked;
            },
        },
        mixins:[input_mixins],
        template:`
        <div class="input-container switch-field" :class="{'enabled':checked}">
            <div v-if="label" class="label-wrapper">
                <label v-html="label"></label>
                <p v-if="placeholder" v-html="placeholder"></p>
            </div>
            <div class="input-wrapper">
                <input style="display:none;" v-model="value" :name="name" />
                <div class="pipe-component" @click="toggle()">
                    <div class="fill">
                        <div class="pipe"></div>
                    </div>
                </div>
            </div>
        </div>
        `
    });
}