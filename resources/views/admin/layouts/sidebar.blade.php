<div class="page-wrap">
    <div class="app-sidebar colored">
        <div class="sidebar-header">
            <a class="header-brand" href="index.html">

                <span class="text">Przychodnia</span>
            </a>
            <button type="button" class="nav-toggle"><i data-toggle="expanded" class="ik ik-toggle-right toggle-icon"></i></button>
            <button id="sidebarClose" class="nav-close"><i class="ik ik-x"></i></button>
        </div>

        <div class="sidebar-content">
            <div class="nav-container">
                <nav id="main-menu-navigation" class="navigation-main">
                    <div class="nav-lavel">Nawigacja</div>
                    @if(Auth::user()->role->name=="Administrator")
                    <div class="nav-item has-sub">
                        <a href="javascript:void(0)"><i class="ik ik-layers"></i><span>Lekarze</span></a>
                        <div class="submenu-content">
                            <a href="{{route('doctor.index')}}" class="menu-item">Lista lekarzy</a>
                            <a href="{{route('doctor.create')}}" class="menu-item">Dodaj lekarza</a>
                        </div>
                    </div>
                    <div class="nav-item has-sub">
                        <a href="javascript:void(0)"><i class="ik ik-layers"></i><span>Godziny przyjęć</span></a>
                        <div class="submenu-content">
                            <a href="{{route('appointment.index')}}" class="menu-item">Lista wizyt</a>
                            <a href="{{route('appointment.create')}}" class="menu-item">Utwórz na pojedynczy dzień</a>
                            <a href="{{route('weekly_appointment.create')}}" class="menu-item">Utwórz na najbliższe tygodnie</a>
                        </div>
                    </div>
                    <div class="nav-item has-sub">
                        <a href="javascript:void(0)"><i class="ik ik-layers"></i><span>Pacjenci</span></a>
                        <div class="submenu-content">
                            <a href="{{route('patient.index')}}" class="menu-item">Lista pacjentów</a>
                            <a href="" class="menu-item">Recepty</a>
                            <a href="" class="menu-item">Historia wizyt</a>
                        </div>
                    </div>
                    <div class="nav-item has-sub">
                        <a href="javascript:void(0)"><i class="ik ik-layers"></i><span>Wizyty</span></a>
                        <div class="submenu-content">
                            <a href="{{route('booking.index')}}" class="menu-item">Akceptuj zgłoszenia</a>
                            <a href="{{route('generate.index')}}" class="menu-item">Generuj listę pacjentów</a>
                        </div>
                    </div>

                    @elseif(Auth::user()->role->name=="Doktor")

                        <div class="nav-item ">
                            <a href="{{route('doctor.home')}}"><i class="ik ik-layers"></i><span>Home</span></a>
                        </div>

                        <div class="nav-item ">
                            <a href="{{route('doctor.home.index')}}"><i class="ik ik-layers"></i><span>Lista pacjentow</span></a>
                        </div>

                        <div class="nav-item ">
                            <a href="{{route('doctor.home.show')}}"><i class="ik ik-layers"></i><span>Ukonczone wizyty</span></a>
                        </div>


                    @endif
                    @if(Auth::user()->role->name=="Doktor")
                        <div class="nav-item has-sub">
                            <a href="javascript:void(0)"><i class="ik ik-layers"></i><span>Pacjenci</span></a>
                            <div class="submenu-content">
                                <a href="{{route('doctor.index')}}" class="menu-item">Lista pacjentów</a>
                            </div>
                        </div>
                        <div class="nav-item">
                            <a href=""><i class="ik ik-layers"></i><span>Dzisiejsze wizyty</span></a>
                        </div>

                    @endif

                </nav>
            </div>
        </div>
    </div>
