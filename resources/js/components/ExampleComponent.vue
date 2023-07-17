<template>
    <div class="row mt-4">
        <div class="col-md-6">
            <div class="card mb-4">
                <div class="card-body">
                    <div class="row mt-3">
                        <div class="col-md-7">
                            <h3 class="job-list-title">Kierowca</h3>
                            <h4 class="text-muted">Grupa Akcent</h4>
                        </div>
                        <div class="col-md-5 mt-xs-4 text-end">
                            <button class="btn btn-outline-warning">Wybierz</button>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <i class="fas fa-map-signs"></i> Ostaszewo &nbsp
                    <i class="far fa-money-bill-alt"></i> 15zł/h &nbsp
                    <i class="fas fa-clock"></i> 2 dni temu &nbsp
                </div>
            </div>
        </div>
        <div class="col-6">
            <div class="card mb-4">
                <div class="card-body">
                    <div class="row mt-3">
                        <div class="col-md-7">
                            <h3 class="job-list-title">Kierowca Doświadczony</h3>
                            <h4 class="text-muted">Grupa Akcent</h4>
                        </div>
                        <div class="col-md-5 mt-xs-4 text-end">
                            <button class="btn btn-outline-warning">Wybierz</button>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <i class="fas fa-map-signs"></i> Ostaszewo &nbsp
                    <i class="far fa-money-bill-alt"></i> 18zł/h &nbsp
                    <i class="fas fa-clock"></i> 2 dni temu &nbsp
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        Mounted() {
            console.log('Component mounted.')
        }
    }
</script>
