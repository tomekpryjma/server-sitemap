<template> 
    <article class="card contact my-3">
        <div class="card-body">

            <div class="name-tag p-2 px-2 px-lg-4 text-center text-lg-left">
                <h4 class="h6 font-weight-bold">{{ this.contactParsed.name }}</h4>
            </div>

            <ul class="list-group mt-3">

                <li class="list-group-item">
                    <span class="font-weight-bold text-capitalise">Email</span>
                    <a :href="'mailto:' + this.contactParsed.email" class="d-block">{{ this.contactParsed.email }}</a>
                </li>

                <li class="list-group-item">
                    <span class="font-weight-bold text-capitalise">Phone</span>
                    <a :href="'tel:' + this.contactParsed.phone" class="d-block">{{ this.contactParsed.phone }}</a>
                </li>

            </ul>
        </div>
    </article>
</template>

<script>
    export default {
        props: ['contact'],

        data: function() {
            return {
                contactParsed: this.contact
            }
        }
    }
</script>