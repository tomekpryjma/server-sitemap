<template>
    <div>
        <h1 class="page-title h2">
            <strong>{{ this.clientParsed.name }}</strong>'s details
        </h1>


        <client-details
            :name="this.clientParsed.name"
            :website="this.clientParsed.website"
            :notes="this.clientParsed.notes"/>

        <template v-if="this.clientParsed.contacts">
            <key-contacts
                :contacts="this.clientParsed.contacts"/>
        </template>

        <template v-else>
            <add-key-contact/>
        </template>

    </div>
</template>

<script>
    import './ClientDetails';
    import './KeyContacts';
    import './AddKeyContact';

    export default {
        props: ['client'],

        data: function() {
            return {
                clientParsed: JSON.parse(this.client)
            }
        },

        mounted: function() {
            console.log(this.clientParsed)
        }
    }
</script>
