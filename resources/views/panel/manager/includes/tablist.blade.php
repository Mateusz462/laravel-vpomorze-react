<ul class="nav nav-tabs nav-justified mb-3" id="ex1" role="tablist">
    <li class="nav-item" role="presentation">
        <a class="nav-link {{ Route::is('manager.index') ? 'active' : ''  }}" id="tab-zarzad" href="{{ route('manager.index')}}" role="tab" aria-controls="tabs-admin" aria-selected="false">
            <h6 class="m-0 font-weight-bold">Zarząd</h6>
        </a>
    </li>
    <li class="nav-item" role="presentation">
        <a class="nav-link {{ Route::is('manager.admin') ? 'active' : ''  }}" id="tab-admin" href="{{ route('manager.admin')}}" role="tab" aria-controls="tabs-admin" aria-selected="false">
            <h6 class="m-0 font-weight-bold">Administracja</h6>
        </a>
    </li>
    <li class="nav-item" role="presentation">
        <a class="nav-link {{ Route::is('manager.transport-department') ? 'active' : ''  }}" id="tab-przewozy" href="{{ route('manager.transport-department')}}" role="tab" aria-controls="tabs-przewozy" aria-selected="false">
            <h6 class="m-0 font-weight-bold">Dział przewozów</h6>
        </a>
    </li>
    <li class="nav-item" role="presentation">
        <a class="nav-link {{ Route::is('manager.staff') ? 'active' : ''  }}" id="tab-kadry" href="{{ route('manager.staff')}}" role="tab" aria-controls="tabs-kadry" aria-selected="false">
            <h6 class="m-0 font-weight-bold">Dział Kadr</h6>
        </a>
    </li>
    <li class="nav-item" role="presentation">
        <a class="nav-link {{ Route::is('manager.traffic-supervision') ? 'active' : ''  }}" id="tab-nr" href="{{ route('manager.traffic-supervision')}}" role="tab" aria-controls="tabs-kadry" aria-selected="false">
            <h6 class="m-0 font-weight-bold">Nadzór Ruchu</h6>
        </a>
    </li>
    <li class="nav-item" role="presentation">
        <a class="nav-link {{ Route::is('manager.control-room') ? 'active' : ''  }}" id="tab-dyspozytornia" href="{{ route('manager.control-room')}}" role="tab" aria-controls="tabs-dyspozytornia" aria-selected="false">
            <h6 class="m-0 font-weight-bold">Dyspozytornia</h6>
        </a>
    </li>
    <li class="nav-item" role="presentation">
        <a class="nav-link {{ Route::is('manager.workshop') ? 'active' : ''  }}" id="tab-warsztat" href="{{ route('manager.workshop')}}" role="tab" aria-controls="tabs-warsztat" aria-selected="false">
            <h6 class="m-0 font-weight-bold">Warsztat</h6>
        </a>
    </li>
</ul>
