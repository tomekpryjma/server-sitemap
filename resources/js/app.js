/**
 * First we will load all of this project's JavaScript dependencies which
 * includes React and other helpers. It's a great starting point while
 * building robust, powerful web applications using React + Laravel.
 */

require('./bootstrap');
require('../../node_modules/select2/dist/js/select2');
/**
 * Next, we will create a fresh React component instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

require('./components/App');


const feather = require('../../node_modules/feather-icons/dist/feather');

// Feather icons replace via data attr.
feather.replace();

$(document).ready(function() {
    $('select').select2({
        width: '100%'
    });
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
        route = button.data('route') + itemID;
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
