@if(auth()->user()->suspended)
<div class="p-3 text-center bg-danger">
    <h1 class="mb-3">Zostałeś zawieszony!</h1>
    <p><b>Powód:</b> Masz 48h od teraz (XX.XX.XXXX) na podanie prawdziwego imienia i nazwiska, należy je zmienić w ustawieniach panelu. Jeżeli tego nie zrobisz - zostaniesz zwolniony</p>
</div>
@else
@if(Route::is('index'))
<div class="p-3 text-center bg-info">
    <h1 class="mb-3">Wolne brygady!</h1>
    <p><b>Tylko dzisiaj:</b> Wolne brygady dla wybranych służb. Złóż teraz wniosek o Kurs z Wolnego, a otrzymasz promocję w postacji możliwości wybrania sobie autobusu! Spiesz się promocja trwa do końca dnia lub do wyczerpania zapasów.</p>
</div>
@endif
@endif