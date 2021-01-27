<template>
    <div class="container">
        <div class="row mt-3">
            <div class="col-md-12">
                <managers></managers>
            </div>
            <div class="col-md-12">
                <store-keepers></store-keepers>
            </div>
            <div class="col-md-12">
                <cashiers></cashiers>
            </div>
        </div>
    </div>
</template>

<script>
import cashiers from "./subComponents/cashiers.vue"
import managers from './subComponents/managers.vue'

    export default {
        components: { cashiers, managers }
    }
</script>
