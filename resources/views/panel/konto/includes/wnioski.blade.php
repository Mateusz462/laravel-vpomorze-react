<div class="row">
    <div class="col-12">
        <h4>Ostatnie wnioski</h4>
        <div class="table-responsive mb-3">
            <table class="table table-dark table-striped table-hover text- mb-0" style="width: 100%;">
                <thead>
                    <tr>
                        <th class="">Nr</th>
                        <th>Wniosek o</th>
                        <th class="">Data</th>
                        <th class="text-center">Status</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($wnioski as $key => $row)
                        <tr>
                            <td>
                                Casual Leave
                            </td>
                            <td>
                                10 Jan 2019
                            </td>
                            <td>
                                11 Jan 2019
                            </td>
                            <td class="text-center">
                                <div class="dropdown action-label">
                                    <a class="btn btn-dark btn-sm btn-rounded dropdown-toggle" href="#" data-toggle="dropdown" aria-expanded="false">
                                        <?php if ($key % 2): ?>
                                            <i class="far fa-dot-circle text-success me-2"></i>Approved
                                        <?php elseif ($key == 4): ?>
                                            <i class="far fa-dot-circle text-secondery me-2"></i>New
                                        <?php elseif ($key % 3): ?>
                                            <i class="far fa-dot-circle text-info me-2"></i>Pending
                                        <?php else: ?>
                                            <i class="far fa-dot-circle text-danger me-2"></i>Declined
                                        <?php endif; ?>
                                    </a>
                                </div>
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