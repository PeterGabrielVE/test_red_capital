<ul class="navbar-nav bg-white sidebar sidebar-uft accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center mb-4 mt-2" href="{{ route('home') }}">
                <div class="row text-center">
                    <div class="col-12 mt-4">
                        <div class="sidebar-brand-icon">
                            <img class="img-profile rounded-circle" src="{{URL::asset('img/logo.png')}}" alt="Logo" height="70" width="70">
                        </div>
                    </div>
                    <div class="col-12 pt-2">
                        <div class="sidebar-brand-text row text-uft">RC</div>
                    </div>
                </div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            @foreach($menus as $m)
            <li class="nav-item active">
                <a class="nav-link text-uft collapsed" @if($m->id == 2)href="{{ route('documents.index')}}" @else href="#" @endif @if($m->submenu() > 0) data-toggle="collapse" data-target="#collapseUtilities"
                    aria-expanded="true" aria-controls="collapseUtilities" @endif><i class="fas fa-fw fa-tachometer-alt"></i>
                <span>{{ $m->name ?? null }}</span></a>
                @if($m->submenu() > 0)
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-uft  py-2 collapse-inner rounded">
                    @foreach($submenus as $s)
                            @if($m->id === $s->id_menu)
                            <a class="collapse-item" href="{{ url($s->name)}}"> {{ $loop->iteration }}. {{ $s->name }}</a>
                            @endif
                    @endforeach  
                    </div>
                </div>
                @endif


                
            </li>
            <hr class="sidebar-divider">
            @endforeach
            <!-- Nav Item - Pages Collapse Menu -->
        </ul>


