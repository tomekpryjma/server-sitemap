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

const files = require.context('./', true, /\.vue$/i);
files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

// Vue.component('example-component', require('./components/ExampleComponent.vue').default);

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
    $('select.no-search').select2({
        width: '100%',
        minimumResultsForSearch: Infinity
    });

    $('select.with-search').select2({
        width: '100%'
    });

    $('[title]').tooltip();
});

$('#areYouSureModal .modal-form').submit(function(event) {
    event.preventDefault();
    var form = $(this);
    var relatedCard = form.data('related-id');
    var route = form.attr('action');
    var serialisedData = form.serialize();
    var formCard = form.parent().parent();

    $.ajax({
        url: route,
        method: 'post',
        data: serialisedData,
        success: function() {
            $('.card[data-card-for="'+ relatedCard +'"]').remove();
            $('#areYouSureModal').modal('hide');
        },
        error: function() {
            console.error("Could not remove site.");
        }
    })
})

// Are you sure? - modal
function handleAreYouSureModal() {
    var modal;
    var button;
    var name;
    var itemID;
    var route;
    var label;
    var ifIsServerDisclaimer;

    $('#areYouSureModal').on('show.bs.modal', function(e) {
        modal = $(this);
        button = $(e.relatedTarget);
        name = button.data('name');
        itemID = button.data('item-id');
        route = button.data('route');
        label = button.data('label');
        ifIsServerDisclaimer = $('#if-this-is-a-server');
        
        modal.find('.modal-form').attr('data-related-id', itemID);
        modal.find('.modal-form').attr('action', route);
        modal.find('#about-to-delete').text(name);
        modal.find('#this-is-a').text(label);
        modal.find('#button-delete-label').text(label);
    
        if(label == "server") {
            ifIsServerDisclaimer.text("Deleting this server will delete all sites associated with it!");
            ifIsServerDisclaimer.show();
        }
    })

    // Empty all elements
    $('#areYouSureModal').on('hidden.bs.modal', function() {
        modal.attr('data-related-id', '');
        modal.find('.modal-form').attr('action', '');
        modal.find('#about-to-delete').text('');
        modal.find('#this-is-a').text('');
        modal.find('#button-delete-label').text('');
        ifIsServerDisclaimer.text('');
        ifIsServerDisclaimer.hide();
    });
}

handleAreYouSureModal();
