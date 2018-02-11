
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('workspace-navigation', require('./components/WorkspaceNavigation.vue'));
Vue.component('my-events', require('./components/MyEvents.vue'));
Vue.component('show-place', require('./components/Maps/ShowPlace.vue'));
Vue.component('find-place', require('./components/Maps/FindPlace.vue'));
Vue.component('events-component', require('./components/Events/EventController.vue'));
Vue.component('events-editor', require('./components/Events/EventEditor.vue'));
Vue.component('message-component', require('./components/Message.vue'));


window.eventBus = new Vue();

const app = new Vue({
    el: '#app',
});

