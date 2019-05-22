/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
require('../../node_modules/select2/dist/js/select2');
const feather = require('../../node_modules/feather-icons/dist/feather');

window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

Vue.component('example-component', require('./components/ExampleComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
});

// Feather icons replace via data attr.
feather.replace();

$(document).ready(function() {
    $('select').select2({
        width: '100%'
    });
});

$('[id*="form-delete-site"]').submit(function(event) {
    event.preventDefault();
    var form = $(this);
    var siteID = form.data('site');
    var serialisedData = form.serialize();
    var formCard = form.parent().parent();

    $.ajax({
        url: '/sites/delete/' + siteID,
        method: 'post',
        data: serialisedData,
        success: function() {
            formCard.remove();
        },
        error: function() {
            console.error("Could not remove site.");
        }
    })
})