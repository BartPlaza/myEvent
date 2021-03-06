
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

Vue.component('show-place', require('./components/Maps/ShowPlace.vue'));
Vue.component('find-place', require('./components/Maps/FindPlace.vue'));
Vue.component('events-editor', require('./components/Events/EventEditor.vue'));
Vue.component('event-row', require('./components/Events/EventRow.vue'));
Vue.component('events-table', require('./components/Events/EventsTable.vue'));
Vue.component('message-component', require('./components/Message.vue'));
Vue.component('chat-wrapper', require('./components/Chat/ChatWrapper.vue'));
Vue.component('chat-comment', require('./components/Chat/ChatComment.vue'));
Vue.component('invitations-panel', require('./components/Invitations/InvitationsPanel.vue'));


window.eventBus = new Vue();

const app = new Vue({
    el: '#app',
});

