<template>
    <div class="text-center" v-if="loading">
        <div class="spinner-border mt-5 mb-5" style="width: 5rem; height:5rem" role="status">
            <span class="visually-hidden">Loading...</span>
        </div>
        <!-- <b-spinner variant="info" class="mt-5 mb-5" style="width: 5rem; height:5rem" lable="text-center"></b-spinner> -->
    </div>

</template>

<script>
    export default{
        props:{
            loading: Boolean
        }
    }
</script>
