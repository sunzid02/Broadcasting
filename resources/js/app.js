
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

// for auto scroll
import Vue from 'vue'
import VueChatScroll from 'vue-chat-scroll'
Vue.use(VueChatScroll)

// //for user notification chat,
import Toaster from 'v-toaster'
// You need a specific loader for CSS files like https://github.com/webpack/css-loader
import 'v-toaster/dist/v-toaster.css'

// optional set default imeout, the default is 10000 (10 seconds).
Vue.use(Toaster, { timeout: 5000 })


Vue.component('message', require('./components/message.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    created(){
        Echo.private('testChannel')
            .listen('TaskEvent', (e) => {
                console.log(e);
                // alert('proof');
            });
    },


    data:{
        message:'',
        chat:{
            message:[],
            user:[],
            color:[],
            time:[],

        },
        typing:'',
        numberOfusers: 0,
    },



    watch: {
        message() {
            Echo.private('chat')
                .whisper('typing', {
                    name: this.message
                });
        }
    },
    
    methods: {
        send() {
            if (this.message.length != 0) 
            {
                    this.chat.message.push(this.message);
                    this.chat.color.push('success');
                    this.chat.user.push('you');
                    this.chat.time.push(this.getTime());

                    axios.post('/send', {
                        message: this.message,
                    })

                    .then(response => {
                        console.log(response);
                        this.message = ''
                    })

                    .catch(error => {
                        console.log(error);
                    });                    
            }
        },

        getTime() {
            let time = new Date();
            return time.getHours() + ':' + time.getMinutes();
        },

    },

    //receive
    mounted() {
        Echo.private('chat')
            .listen('ChatEvent', (e) => {
                this.chat.message.push(e.message);
                this.chat.user.push(e.user);
                this.chat.color.push('warning');
                this.chat.time.push(this.getTime());

                console.log(e);
            })



            .listenForWhisper('typing', (e) => {
                if (e.name != '') {
                    this.typing = 'typing...'
                } else {
                    this.typing = ''
                }
            });


            //user join leave
        Echo.join(`chat`)
            .here((users) => {
                this.numberOfusers = users.length;
                // console.log(users);
            })
            .joining((user) => {
                this.numberOfusers += 1;
                this.$toaster.success(user.name+' is active now');
                // console.log(user.name);
            })
            .leaving((user) => {
                this.numberOfusers -= 1;
                this.$toaster.error(user.name + ' has left');

                // console.log(user.name);
            });
    }

});
