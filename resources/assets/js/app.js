/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

window.moment = require('moment');

window.events = new Vue();

//Flash(my new message)
window.flash = function (message){
	window.events.$emit('flash', message);
};
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

import { Datetime } from 'vue-datetime';

Vue.component('datetime', Datetime);

Vue.component('node-welcome', require('./components/Node/Welcome.vue'));
Vue.component('node-footer', require('./components/Node/Footer.vue'));
Vue.component('node-logo', require('./components/Node/Logo.vue'));
Vue.component('node-image-rotater', require('./components/Node/ImageRotater.vue'));
Vue.component('node-media-player', require('./components/Node/MediaPlayer.vue'));
Vue.component('screen-content-item', require('./components/ScreenContentItem.vue'));
Vue.component('content-item', require('./components/ContentItem.vue'));
Vue.component('screen-list-item', require('./components/ScreenListItem.vue'));
Vue.component('active-button', require('./components/ActiveButton.vue'));
Vue.component('flash', require('./components/Flash.vue'));

Vue.component('nav-menu', require('./components/NavMenu.vue'));
Vue.component('screen-item', require('./components/ScreenItem.vue'));

const app = new Vue({
    el: '#app'
});