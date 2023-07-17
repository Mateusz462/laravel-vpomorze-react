<template>
    <LoadingComponent :loading="loading" />
    <div class="row" v-if="!loading">
        <div class="col">
            <h3>Witaj {{ login }} w Panelu Kierowcy !</h3>
            <p>Tutaj znajduje się niezbędnik każdego pracownika!
                <br> Strona automatycznie się dostosowywuje do potrzeb każdego pracownika
                <br> Sprawdź swój niezbędnik:
            </p>
        </div>
    </div>
    <div class="row" v-if="!loading">
        <div class="col-12">
            <div class="card mb-4" style="background-color:rgba(208, 53, 95, 0.71)">
                <div class="card-body">
                    W Panelu Wirtualnego Pomorza pojawiła się <b>ankieta do wypełnienia!</b><br>
                    <a class=""><i class="fas fa-eye"></i> Zobacz więcej</a>
                </div>
            </div>
            <button class="btn btn-secondary mb-3" @click="count++">
                Count is: {{ count }}
            </button>

        </div>
    </div>
    <div class="card mb-4">
        <!-- <div class="card-body">
            <h3><i class="far fa-calendar-times"></i> Grafik</h3>
            @role('Kierowca')
                <div class="card bg-dark border border-1 mt-3">
                    <div class="card-body">
                        <h4 class="d-flex font-weight-semibold flex-nowrap my-1 text-info">Masz dzisiaj służbę!</h4>
                        <div class="d-flex  justify-content-between">
                            <p class="mt-3">
                                <b>Służba: </b>34/1/A<br>
                                <b>Rodzaj służby:</b> Służba regularna dwuzmianowa <br><br>
                                <b>Dyspozytor: </b><span class="gdpr"><span class="name">mateusz</span></span> [AD-001]<br>
                                <b>Pojazd: </b> Solbus Urbino 13 Lions City
                            </p>
                            <div class="bg-image hover-overlay ripple">
                                <img src="https://media.discordapp.net/attachments/793476074281500672/929061032079556658/unknown.png?width=1156&height=657" class="img-fluid" width="450px"/>
                                <a href="#!">
                                    <div class="mask" style="background-color: rgba(57, 192, 237, 0.2);"></div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @else
                <p class="text-muted mb-0">Brak służby!</p>
            @endrole
        </div> -->
    </div>


    <AnnoumentsComponent />
    <ExampleComponent />
    <GraphComponent />
</template>

<script>
    import LoadingComponent from '../components/LoadingComponent.vue';
    import AnnoumentsComponent from '../components/AnnoumentsComponent.vue';
    import ExampleComponent from '../components/ExampleComponent.vue';
    import GraphComponent from '../components/GraphComponent.vue';
    export default {
        props: ['userlogin'],
        data() {
            return {
                user: this.userlogin, // throws the error
                count: 0,
                loading: true,
            }
        },
        components: {
            LoadingComponent,
            AnnoumentsComponent,
            ExampleComponent,
            GraphComponent,
        },
        methods:{
            search(){
                this.loading = true;
                axios.get('/search/user?s='+this.searchWord).then((response) =>{
                    this.loading = false;
                    this.annouments = response.data.annouments
                }).catch(() =>{
                    this.loading = false;
                    toast.fire({
                        icon: 'error',
                        title: "search failed"
                    })

                })
            },
            createMode(){
                this.editMode = false;
                $('#createUser').modal('show');
            },
            getAnnouments(){

                this.loading = true;
                axios.post('./ogloszenia/get').then((response) =>{
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
            this.login = this.userlogin, // safe
            this.loading = false
        },
    }
    // export default {
    //     //props: ['userInfo'],
    //     name: "MyComponent",
    //     data() {
    //         return {
    //             userInfo: [],
    //
    //             name: ''
    //         }
    //     }
    //     // Mounted() {
    //     //     console.log(this.userInfo)
    //     //     //userInfo: userInfo,
    //     // }
    //
    // }

</script>
