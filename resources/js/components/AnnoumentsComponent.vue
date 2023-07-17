<template>
    <div class="card mb-4">
        <div class="card-body">
            <h3><i class="fas fa-bullhorn"></i> Ogłoszenia</h3>
            <div class="row">
                <div class="col-md-6" v-for="ann in annouments" :key="annouments.id">
                    <div class="card bg-dark border border-1 mt-3">
                        <div class="card-body">
                            <h5 class="d-flex font-weight-semibold flex-nowrap my-1">
                                <a :href="'./ogloszenie/' + ann.id" class="text-default mr-2" data-abc="true">{{ ann.title }}</a>
                            </h5>
                            <ul class="list-inline text-muted mb-0">
                                <li class="list-inline-item">Autor: <a href="#" class="text-muted" data-abc="true">{{ ann.user }}</a></li>
                                <li class="list-inline-item">Dodano: {{ formatDate(ann.created_at) }}</li>
                            </ul>
                            <p class="mt-1 h5 pb-2">
                                <span v-for="item in ann.tags" class="badge rounded-pill text-dark me-1" :style="{ backgroundColor: item.color }">{{ item.name }}</span>
                            </p>
                            <p class="mt-2" v-html="$options.filters.truncate(ann.text, 150) ">

                            </p>
                            <a :href="'./ogloszenie/' + ann.id" class="btn btn-primary"><i class="fas fa-eye"></i> Zobacz więcej</a>
                        </div>
                    </div>
                </div>
            </div>
            <LoadingComponent :loading="loading" />
        </div>
    </div>

</template>

<script>
    import LoadingComponent from './LoadingComponent.vue';
    import dayjs from 'dayjs';

    export default {
        Mounted() {
            console.log('Component mounted.')
        },
        data() {
            return {
                annouments: [],
                loading: false,
            }
        },
        components: {
            LoadingComponent
        },
        filters: {
            truncate: function (text, length) {
                if (text.length > length) {
                    return text.substring(0, length) + '...'
                } else {
                    return text
                }
            },
        },
        methods:{
            formatDate(dateString) {
                const date = dayjs(dateString);
                    // Then specify how you want your dates to be formatted
                return date.format('DD.MM.YYYY HH:mm:ss');
            },

            getAnnouments(){

                this.loading = true;
                axios.post('/api/ogloszenia/get').then((response) =>{
                    this.loading = false;
                    this.annouments = response.data.annouments
                    //console.log(this.annouments)
                }).catch((e)=>{
                    this.loading = false;
                    //this.$toastr.e("Cannot load annouments", "Error");
                    console.log(e)
                })
            },
        },
        created(){
            this.annouments = this.getAnnouments();
        },
    }
</script>
