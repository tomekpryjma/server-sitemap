<template>
    <div class="row mt-5">
        <div class="col-12 col-md-8">

            <div class="card client">
                <div class="card-body">

                    <ul class="list-group">
                        <li class="list-group-item">
                            <strong>
                                Company name:
                            </strong>
                            {{ this.name }}
                        </li>
        
                        <li class="list-group-item">
                            <strong>
                                Website:
                            </strong>
                            <a :href="'//'+ this.website" target="_blank" rel="noreferrer noopener" class="site-link d-inline-block">
                                {{ this.website }}
                                <span class="d-inline-block link-icon">
                                    <i data-feather="external-link"></i>
                                </span>
                            </a>
                        </li>

                        <li class="list-group-item">
                            <strong>
                                Notes:
                            </strong>
                            <span>
                                {{ this.notes }}
                            </span>
                        </li>
                    </ul>
            
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['name', 'website', 'notes']
    }
</script>
