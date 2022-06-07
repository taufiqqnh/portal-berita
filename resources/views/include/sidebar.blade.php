<div class="sidebar sidebar-style-2">			
    <div class="sidebar-wrapper scrollbar scrollbar-inner">
        <div class="sidebar-content">
            <div class="user">
                <div class="avatar-sm float-left mr-2">
                    <img src="../back/img/profile.png" alt="..." class="avatar-img rounded-circle">
                </div>
                <div class="info">
                    <a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
                        <span>
                            <span>{{ Auth::user()->name }}</span>
                            <span class="user-level">Administrator</span>
                            <span class="caret"></span>
                        </span>
                    </a>
                    <div class="clearfix"></div>
                    <div class="collapse in" id="collapseExample">
                        <ul class="nav">
                            <li>
                                <a href="{{route('profile.index')}}">
                                    <span class="link-collapse">My Profile</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{route('profile.edit', Auth::user()->id)}}"> 
                                    <span class="link-collapse">Edit Profile</span>
                                </a>
                            </li>
                            {{-- <li>
                                <a href="#settings">
                                    <span class="link-collapse">Settings</span>
                                </a>
                            </li> --}}
                            {{-- <li>
                                <a class="link-collapse" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                  document.getElementById('logout-form').submit();">
                                     {{ __('Logout') }}
                                 </a>
                
                                 <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                     @csrf
                                 </form>
                            </li> --}}
                        </ul>
                    </div>
                </div>
            </div>
            <ul class="nav nav-primary">
                <li class="nav-item dashboard">
                    <a href="/dashboard" class="collapsed" >
                        <i class="fas fa-home"></i>
                        <p>Dashboard</p>
                        
                    </a>
                </li>
                <li class="nav-section">
                    <span class="sidebar-mini-icon">
                        <i class="fa fa-ellipsis-h"></i>
                    </span>
                    <h4 class="text-section">MENU</h4>
                </li>
                <li class="nav-item kategori">
                    <a data-toggle="collapse" href="#kategori">
                        <i class="fas fa-bookmark"></i>
                        <p>Kategori</p>
                        {{-- <span class="caret"></span> --}}
                    </a>
                    <div class="collapse" id="kategori">
                        <ul class="nav nav-collapse">
                            <li>
                                <a href="{{route('kategori.index')}}">
                                    <i class="fas fa-table"></i>
                                    <p>Data Kategori</p>
                                </a>
                            </li>
                            <li>
                                <a href="{{route('kategori.create')}}">
                                    <i class="fas fa-plus-square"></i>
                                    <p>Tambah Kategori</p>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                {{-- <li class="nav-item kategori">
                    <a href="{{route('kategori.index')}}">
                        <i class="fas fa-bookmark"></i>
                        <p>Kategori</p>
                    </a>
                </li> --}}
                <li class="nav-item artikel">
                    <a data-toggle="collapse" href="#artikel">
                        <i class="fas fa-file-alt"></i>
                        <p>Artikel</p>
                        {{-- <span class="caret"></span> --}}
                    </a>
                    <div class="collapse" id="artikel">
                        <ul class="nav nav-collapse">
                            <li>
                                <a href="{{route('artikel.index')}}">
                                    <i class="fas fa-table"></i>
                                    <p>Data Artikel</p>
                                </a>
                            </li>
                            <li>
                                <a href="{{route('artikel.create')}}">
                                    <i class="fas fa-plus-square"></i>
                                    <p>Tambah Artikel</p>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

                {{-- <li class="nav-item playlist">
                    <a data-toggle="collapse" href="#playlist">
                        <i class="fas fa-video"></i>
                        <p>Playlist</p>
                        
                    </a>
                    <div class="collapse" id="playlist">
                        <ul class="nav nav-collapse">
                            <li>
                                <a href="{{route('playlist.index')}}">
                                    <i class="fas fa-table"></i>
                                    <p>Data Playlist</p>
                                </a>
                            </li>
                            <li>
                                <a href="{{route('playlist.create')}}">
                                    <i class="fas fa-plus-square"></i>
                                    <p>Tambah Playlist</p>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="nav-item materi">
                    <a data-toggle="collapse" href="#materi">
                        <i class="fas fa-film"></i>
                        <p>Materi</p>
                        
                    </a>
                    <div class="collapse" id="materi">
                        <ul class="nav nav-collapse">
                            <li>
                                <a href="{{route('materi.index')}}">
                                    <i class="fas fa-table"></i>
                                    <p>Data Materi</p>
                                </a>
                            </li>
                            <li>
                                <a href="{{route('materi.create')}}">
                                    <i class="fas fa-plus-square"></i>
                                    <p>Tambah Materi</p>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li> --}}

                <li class="nav-item slide">
                    <a data-toggle="collapse" href="#slide">
                        <i class="fas fa-sliders-h"></i>
                        <p>Slide Banner</p>
                        {{-- <span class="caret"></span> --}}
                    </a>
                    <div class="collapse" id="slide">
                        <ul class="nav nav-collapse">
                            <li>
                                <a href="{{route('slide.index')}}">
                                    <i class="fas fa-table"></i>
                                    <p>Data Slide</p>
                                </a>
                            </li>
                            <li>
                                <a href="{{route('slide.create')}}">
                                    <i class="fas fa-plus-square"></i>
                                    <p>Tambah Slide</p>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
  
                <li class="nav-item iklan">
                    <a data-toggle="collapse" href="#iklan">
                        <i class="fab fa-adversal"></i>
                        <p>Iklan</p>
                        {{-- <span class="caret"></span> --}}
                    </a>
                    <div class="collapse" id="iklan">
                        <ul class="nav nav-collapse">
                            <li>
                                <a href="{{route('iklan.index')}}">
                                    <i class="fas fa-table"></i>
                                    <p>Data Iklan</p>
                                </a>
                            </li>
                            <li>
                                <a href="{{route('iklan.create')}}">
                                    <i class="fas fa-plus-square"></i>
                                    <p>Tambah Iklan</p>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                {{-- <li class="nav-item">
                    <a href="#">
                        <i class="fas fa-desktop"></i>
                        <p>Widgets</p>
                        <span class="badge badge-success">4</span>
                    </a>
                </li> --}}
                {{-- <li class="nav-item">
                    <a href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                                  document.getElementById('logout-form').submit();">
                        <i class="fas fa-undo"></i>
                     {{ __('Logout') }}
                 </a>

                 <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                     @csrf
                 </form>
                </li> --}}
            </ul>
        </div>
    </div>
</div>