<div class="row">
    <div class="col-12">
        <h4>Dziennik serwisowy</h4>
        <div class="table-responsive mb-3">
            <table class="table table-dark table-striped table-hover text- mb-0" style="width: 100%;">
                <thead>
                    <tr>
                        <th class="">Data</th>
                        <th>Mechanik</th>
                        <th class="">Informacje</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($users as $key => $row)
                        <tr>
                            <td>
                                20.09.2022
                            </td>
                            <td>
                                Pan Paweł
                            </td>
                            <td>
                                Dodano zdjęcie pojazdu
                            </td>
                        </tr>
                    @empty
                        <tr class="">
                            <td colspan="4" class="text-center bg-dark">
                                <i class="fas fa-exclamation-triangle"></i> Brak Danych!
                            </td>  
                        </tr>  
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    <!--table-->
    
</div>