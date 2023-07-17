@extends('layouts.blog')

@section('title')
    Strona Główna
@endsection

@section('custom-style')
    #intro {
        height: 400px;
        /* Margin to fix overlapping fixed navbar */
        margin-top: 58px;
    }
    @media (max-width: 991px) {
        #intro {
            /* Margin to fix overlapping fixed navbar */
            margin-top: 45px;
        }
    }
@endsection

@section('header')
    <div id="intro" class="pt-5 text-center bg-image shadow-1-strong" style="background-image: url('{{ asset('img/zdjecie.png') }}');">
        
        <div class="d-flex justify-content-center align-items-center h-100">
            <div class="text-white px-4">
                <h1 class="mb-3 h2">Wirtualne Pomorze</h1>
                <?php $header = true;?>
                @if($header)
                <p class="mb-3">Zostań kierowcą wirtualnego autobusu!</p>
                <a class="btn btn-primary m-2" href="" role="button" rel="nofollow">Dołącz do nas</a>
                <a class="btn btn-secondary m-2" href="" role="button">Dowiedz się więcej</a>
                @endif
            </div>
        </div>
        
    </div>
@endsection

@section('content')
    <link rel="stylesheet" href="https://mdbcdn.b-cdn.net/wp-content/themes/mdbootstrap4/docs-app/css/dist/mdb5/plugins/standard/organization-chart.min.css">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <section class="pb-4">
                    <div class="bg-dark border rounded-5">
                        <section class="p-4 d-flex justify-content-center w-100">
                            <div id="advancedChartExample">
                                <table class="organization-chart-table">
                                    <tbody>
                                        <tr class="organization-chart-content">
                                            <td colspan="8">
                                                <div class="card organization-card">
                                                    <div class="card-header text-white bg-primary">CIO</div>
                                                    <div class="card-body">
                                                        <img src="https://mdbootstrap.com/img/new/avatars/1.webp" alt="">
                                                        <p class="card-text">Walter White</p>
                                                    </div>
                                                    <a><i class="fas fa-chevron-down"></i></a>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr class="organization-chart-lines-top">
                                            <td colspan="8">
                                                <div></div>
                                            </td>
                                        </tr>
                                        <tr class="organization-chart-lines">
                                            <td class="organization-chart-line" style="border-top: none;"></td>
                                            <td class="organization-chart-line" style="border-right-color: transparent;"></td>
                                            <td class="organization-chart-line"></td>
                                            <td class="organization-chart-line" style="border-right-color: transparent;"></td>
                                            <td class="organization-chart-line"></td>
                                            <td class="organization-chart-line" style="border-right-color: transparent;"></td>
                                            <td class="organization-chart-line"></td>
                                            <td class="organization-chart-line" style="border-right-color: transparent; border-top: none;"></td>
                                        </tr>
                                        <tr class="organization-chart-children">
                                            <td colspan="2">
                                                <table class="organization-chart-table">
                                                    <tbody>
                                                        <tr class="organization-chart-content">
                                                            <td colspan="2">
                                                                <div class="card organization-card">
                                                                    <div class="card-body">
                                                                        <img src="https://cdn.discordapp.com/avatars/467020104555560972/89147b4b8234d9dd45ab6da3e0d95ea1.webp?size=32" alt="">
                                                                        <p class="card-text mb-0">mateusz</p>
                                                                        <p class="card-text">programista</p>
                                                                    </div>
                                                                    <a><i class="fas fa-chevron-down"></i></a>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr class="organization-chart-lines-top">
                                                            <td colspan="2">
                                                                <div style="height: 40px;"></div>
                                                            </td>
                                                        </tr>
                                                        <tr class="organization-chart-lines"></tr>
                                                        <tr class="organization-chart-children">
                                                            <td colspan="2">
                                                                <table class="organization-chart-table">
                                                                    <tbody>
                                                                        <tr class="organization-chart-content">
                                                                            <td>
                                                                                <div class="card organization-card">
                                                                                    <div class="card-header text-white bg-primary">SE</div>
                                                                                    <div class="card-body">
                                                                                        <img src="https://mdbootstrap.com/img/new/avatars/9.webp" alt="">
                                                                                        <p class="card-text">Britney Morgan</p>
                                                                                    </div>
                                                                                </div>
                                                                            </td>
                                                                        </tr>
                                                                        <tr class="organization-chart-lines-top"></tr>
                                                                        <tr class="organization-chart-lines"></tr>
                                                                        <tr class="organization-chart-children"></tr>
                                                                    </tbody>
                                                                </table>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                            <td colspan="2">
                                                <table class="organization-chart-table">
                                                    <tbody>
                                                        <tr class="organization-chart-content">
                                                            <td colspan="2">
                                                                <div class="card organization-card">
                                                                    <div class="card-header text-white bg-primary">Director</div>
                                                                    <div class="card-body">
                                                                        <img src="https://mdbootstrap.com/img/new/avatars/3.webp" alt="">
                                                                        <p class="card-text">Jimmy McGill</p>
                                                                    </div>
                                                                    <a><i class="fas fa-chevron-down"></i></a>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr class="organization-chart-lines-top">
                                                            <td colspan="2">
                                                                <div style="height: 40px;"></div>
                                                            </td>
                                                        </tr>
                                                        <tr class="organization-chart-lines"></tr>
                                                        <tr class="organization-chart-children">
                                                            <td colspan="2">
                                                                <table class="organization-chart-table">
                                                                    <tbody>
                                                                        <tr class="organization-chart-content">
                                                                            <td colspan="4">
                                                                                <div class="card organization-card">
                                                                                    <div class="card-header text-white bg-primary">PM</div>
                                                                                    <div class="card-body">
                                                                                        <img src="https://mdbootstrap.com/img/new/avatars/7.webp" alt="">
                                                                                        <p class="card-text">Phoebe Buffay</p>
                                                                                    </div>
                                                                                    <a><i class="fas fa-chevron-down"></i></a>
                                                                                </div>
                                                                            </td>
                                                                        </tr>
                                                                        <tr class="organization-chart-lines-top">
                                                                            <td colspan="4">
                                                                                <div></div>
                                                                            </td>
                                                                        </tr>
                                                                        <tr class="organization-chart-lines">
                                                                            <td class="organization-chart-line" style="border-top: none;"></td>
                                                                            <td class="organization-chart-line" style="border-right-color: transparent;"></td>
                                                                            <td class="organization-chart-line"></td>
                                                                            <td class="organization-chart-line" style="border-right-color: transparent; border-top: none;"></td>
                                                                        </tr>
                                                                        <tr class="organization-chart-children" style="transition: all 0.2s ease-out 0s;">
                                                                            <td colspan="2">
                                                                                <table class="organization-chart-table">
                                                                                    <tbody>
                                                                                        <tr class="organization-chart-content">
                                                                                            <td>
                                                                                                <div class="card organization-card">
                                                                                                    <div class="card-header text-white bg-primary">Operations</div>
                                                                                                    <div class="card-body">
                                                                                                        <img src="https://mdbootstrap.com/img/new/avatars/4.webp" alt="">
                                                                                                        <p class="card-text">Kim Wexler</p>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr class="organization-chart-lines-top"></tr>
                                                                                        <tr class="organization-chart-lines"></tr>
                                                                                        <tr class="organization-chart-children"></tr>
                                                                                    </tbody>
                                                                                </table>
                                                                            </td>
                                                                            <td colspan="2">
                                                                                <table class="organization-chart-table">
                                                                                    <tbody>
                                                                                        <tr class="organization-chart-content">
                                                                                            <td>
                                                                                                <div class="card organization-card">
                                                                                                    <div class="card-header text-white bg-primary">Development</div>
                                                                                                    <div class="card-body">
                                                                                                        <img src="https://mdbootstrap.com/img/new/avatars/6.webp" alt="">
                                                                                                        <p class="card-text">Rachel Green</p>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr class="organization-chart-lines-top"></tr>
                                                                                        <tr class="organization-chart-lines"></tr>
                                                                                        <tr class="organization-chart-children"></tr>
                                                                                    </tbody>
                                                                                </table>
                                                                            </td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                            <td colspan="2">
                                                <table class="organization-chart-table">
                                                    <tbody>
                                                        <tr class="organization-chart-content">
                                                            <td colspan="4">
                                                                <div class="card organization-card">
                                                                    <div class="card-header text-white bg-primary">Manager</div>
                                                                    <div class="card-body">
                                                                        <img src="https://mdbootstrap.com/img/new/avatars/8.webp" alt="">
                                                                        <p class="card-text">Michael Scott</p>
                                                                    </div>
                                                                    <a><i class="fas fa-chevron-down"></i></a>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr class="organization-chart-lines-top">
                                                            <td colspan="4">
                                                                <div></div>
                                                            </td>
                                                        </tr>
                                                        <tr class="organization-chart-lines">
                                                            <td class="organization-chart-line" style="border-top: none;"></td>
                                                            <td class="organization-chart-line" style="border-right-color: transparent;"></td>
                                                            <td class="organization-chart-line"></td>
                                                            <td class="organization-chart-line" style="border-right-color: transparent; border-top: none;"></td>
                                                        </tr>
                                                        <tr class="organization-chart-children">
                                                            <td colspan="2">
                                                                <table class="organization-chart-table">
                                                                    <tbody>
                                                                        <tr class="organization-chart-content">
                                                                            <td>
                                                                                <div class="card organization-card">
                                                                                    <div class="card-header text-white bg-primary">SA</div>
                                                                                    <div class="card-body">
                                                                                        <img src="https://mdbootstrap.com/img/new/avatars/5.webp" alt="">
                                                                                        <p class="card-text">Pam Beasly</p>
                                                                                    </div>
                                                                                </div>
                                                                            </td>
                                                                        </tr>
                                                                        <tr class="organization-chart-lines-top"></tr>
                                                                        <tr class="organization-chart-lines"></tr>
                                                                        <tr class="organization-chart-children"></tr>
                                                                    </tbody>
                                                                </table>
                                                            </td>
                                                            <td colspan="2">
                                                                <table class="organization-chart-table">
                                                                    <tbody>
                                                                        <tr class="organization-chart-content">
                                                                            <td>
                                                                                <div class="card organization-card">
                                                                                    <div class="card-header text-white bg-primary">SP</div>
                                                                                    <div class="card-body">
                                                                                        <img src="https://mdbootstrap.com/img/new/avatars/14.webp" alt="">
                                                                                        <p class="card-text">Alex Morgan</p>
                                                                                    </div>
                                                                                </div>
                                                                            </td>
                                                                        </tr>
                                                                        <tr class="organization-chart-lines-top"></tr>
                                                                        <tr class="organization-chart-lines"></tr>
                                                                        <tr class="organization-chart-children"></tr>
                                                                    </tbody>
                                                                </table>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                            <td colspan="2">
                                                <table class="organization-chart-table">
                                                    <tbody>
                                                        <tr class="organization-chart-content">
                                                            <td>
                                                                <div class="card organization-card">
                                                                    <div class="card-header text-white bg-primary">R&amp;D</div>
                                                                    <div class="card-body">
                                                                        <img src="https://mdbootstrap.com/img/new/avatars/10.webp" alt="">
                                                                        <p class="card-text">Fran Kirby</p>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr class="organization-chart-lines-top"></tr>
                                                        <tr class="organization-chart-lines"></tr>
                                                        <tr class="organization-chart-children"></tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </section>
                        <div class="p-4 text-center border-top mobile-hidden">
                            <a class="btn btn-link px-3" data-mdb-toggle="modal" role="button" aria-expanded="false" aria-controls="example2" data-ripple-color="hsl(0, 0%, 67%)" data-mdb-target="#apiRestrictedModal" type="button">
                            <i class="fas fa-code me-md-2"></i>
                            <span class="d-none d-md-inline-block">
                            Show code
                            </span>
                            </a>
                            <a class="btn btn-link px-3 " data-ripple-color="hsl(0, 0%, 67%)">
                            <i class="fas fa-file-code me-md-2 pe-none"></i>
                            <span class="d-none d-md-inline-block export-to-snippet pe-none">
                            Edit in sandbox
                            </span>
                            </a>
                        </div>
                    </div>
                </section>
            </div>
        </div>
        <!--Grid row-->
        <div class="row">
            <!--Grid column-->
            <div class="col-md-9 mb-4">
                <!--Section: Content-->
                <section>
                    <div class="row">
                        
                        <div class="col-md-8 mb-4">
                            <h5>Jakie funkcje oferuje Panel Wirtualnego Pomorza?</h5>
                            <p>
                                Panel posiada szereg funkcji, które umożliwiają użytkownikom komunikowanie się, 
                                dzielenie się treściami i nawiązywanie nowych znajomości. 
                                Oto niektóre z najważniejszych funkcji Panelu:
                            </p>
                            <ul>
                                <li><b>Profil:</b> każdy użytkownik może stworzyć swój własny profil, w którym może przedstawiać się i udostępniać informacje o sobie.</li>
                                <li><b>News Feed:</b> jest to strona główna użytkownika, na której wyświetlane są aktualności i posty od znajomych.</li>
                                <li><b>Wiadomości:</b> umożliwiają one wysyłanie i otrzymywanie prywatnych wiadomości od innych użytkowników.</li>
                                <li><b>Grupy:</b> pozwalają na tworzenie i dołączanie do grup tematycznych, w których użytkownicy mogą dyskutować i dzielić się informacjami.</li>
                                <li><b>Strony:</b> umożliwiają tworzenie i dołączanie do stron związanych z różnymi tematami, takimi jak marki, produkty, muzyka i wiele innych.</li>
                                <li><b>Wydarzenia:</b> pozwalają na tworzenie i uczestniczenie w wydarzeniach, takich jak imprezy, koncerty i wydarzenia społeczne.</li>
                                <li><b>Marketplace:</b> umożliwia sprzedawanie i kupowanie produktów i usług w lokalnej społeczności.</li>
                                <li><b>Reklamy:</b> pozwalają na promowanie produktów i usług do wybranej grupy odbiorców.</li>
                            </ul>
                            <p>Te funkcje i wiele innych sprawiają, że Panel jest jednym z najbardziej popularnych i uniwersalnych narzędzi społecznościowych na świecie.</p>
                            <button type="button" class="btn btn-primary">Read</button>
                        </div>
                        
                    </div>
                    <!-- Post -->
                    <div class="row">
                        <div class="col-md-4 mb-4">
                            <div class="bg-image hover-overlay shadow-1-strong rounded ripple" data-mdb-ripple-color="light">
                                <img src="https://media.discordapp.net/attachments/793476074281500672/922110025328123974/unknown.png?width=1163&height=657" class="img-fluid" />
                                <a href="#!">
                                <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-8 mb-4">
                            <h5>Co dalej z Wirtualnym Pomorzem?</h5>
                            <p>
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatibus ratione
                                necessitatibus itaque error alias repellendus nemo reiciendis aperiam quisquam
                                minus ipsam reprehenderit commodi ducimus, in dicta aliquam eveniet dignissimos
                                magni.
                            </p>
                            <button type="button" class="btn btn-primary">Read</button>
                        </div>
                    </div>
                </section>
                <!--Section: Content-->
            </div>
            <!--Grid column-->

            <!--Grid column-->
            <div class="col-md-3 mb-4">
                <!--Section: Sidebar-->
                <section class="sticky-top" style="top: 80px;">
                    <?php $sidebar = false;?>
                    @if($sidebar)
                    <!--Section: stats-->
                    <section class="text-center border-bottom pb-4 mb-4">
                        <h3 class="mb-4">Statystyki</h3>
                        <p class="text-center"><i class="far fa-calendar-plus"></i> Dzisiaj jest: <b>03.10.2021</b></p>
                        <p class="text-center"><i class="far fa-id-card"></i> Wykonaliśmy łącznie: <b>675 służb</b></p>
                        <p class="text-center"><i class="fa fa-car" aria-hidden="true"></i> Przejechaliśmy łącznie: <b>13166 km</b></p>
                        <p class="text-center"><i class="fas fa-users"></i> Aktualnie pracuje u nas: <b>77 osób</b></p>
                        <p class="text-center"><i class="far fa-id-badge"></i> Ilość osób oczekujących na zatrudnienie: <b>0</b></p>
                        <p class="text-center"><i class="fas fa-user-plus"></i> Ilość osób przyjętych po 1 etapie rekrutacji: <b>3</b></p>
                    </section>
                    <!--Section: stats-->
                    @endif
                </section>
                <!--Section: Sidebar-->
            </div>
            <!--Grid column-->
        </div>
        <!--Grid row-->
        <?php $pagination = false;?>
        @if($pagination)
        <!-- Pagination -->
        <nav class="my-4" aria-label="...">
            <ul class="pagination pagination-circle justify-content-center">
                <li class="page-item">
                    <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
                </li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item active" aria-current="page">
                    <a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>
                </li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item">
                    <a class="page-link" href="#">Next</a>
                </li>
            </ul>
        </nav>
        @endif
    </div>
@endsection
