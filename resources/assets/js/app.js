// Editor config here
let config = {
    toolbar: [
        'removeFormat', 'undo', '|', 'elements', 'fontName', 'fontSize', 'foreColor', 'backColor'
    ],
    fontName: [
        { val: 'arial black' },
        { val: 'times new roman' },
        { val: 'Courier New' }
    ],
    fontSize: ['12px', '14px', '16px', '18px', '0.8rem', '1.0rem', '1.2rem', '1.5rem', '2.0rem'],
    uploadUrl: ''
};

require('./bootstrap');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('Startups', require('./components/startups'));
Vue.component('manage-sessions-question', require('./components/admin/manage-sessions-question'));
Vue.component('apply', require('./components/apply'));

const app = new Vue({
    el: '#app'
});