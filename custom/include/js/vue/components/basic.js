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
    Vue.component("modal",{
        template:`
        <div class="vue-component modal"></div>
        `
    })
}