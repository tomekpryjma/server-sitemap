<template>
    <div class="row mt-5">
        <div class="col-12">
            <section>
                <h3>Contacts within the client's company</h3>

                <hr>

                <div class="card-deck mt-5 flex-lg-wrap justify-content-md-between">

                    <template v-for="contact in this.contactsParsed">
                        <single-contact
                            :key="contact.name"
                            :contact="contact"/>
                    </template>

                    <add-key-contact/>
                    
                </div>
            </section>
        </div>
    </div>
</template>

<script>
    import './SingleContact';
    import './AddKeyContact';

    export default {
        props: ['contacts'],

        data: function() {
            return {
                contactsParsed: JSON.parse(this.contacts)
            }
        },

        mounted: function() {
            console.log(this.contactsParsed)
        }
    }
</script>