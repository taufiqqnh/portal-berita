{{-- navbar --}}
<body class="bg-gray-100 h-screen antialiased leading-none font-sans">
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary ">
          <div class="container">
          <a class="navbar-brand" href="/"> 
            <img src="{{asset('back/img/udbnews.jpg')}}" width="120" height="30" class="d-inline-block align-top" alt="" >
          </a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="/">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" aria-current="page" href="#artikel">Artikel</a>
              </li>
              {{-- <li class="nav-item">
                <a class="nav-link" aria-current="page" href="">Video</a>
              </li> --}}
              {{-- @foreach ($kategori as $kat)
              <li class="nav-item active">
                <a class="nav-link" href="{{$kat ->slug}}">{{$kat ->nama_kategori}}</a>
              </li>
              @endforeach --}}
              {{-- <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Kategori
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                  @foreach ($kategori as $kat)
                  <li><a class="dropdown-item" href="{{$kat ->slug}}">{{$kat ->nama_kategori}}</a></li>
                  @endforeach
                </ul>
              </li> --}}
              {{-- <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                    data-bs-toggle="dropdown" aria-expanded="false">
                    Kategori
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                    
                    @foreach ($kategori as $kat)
                        <li><a class="dropdown-item" href="{{ $kat->slug }}">{{ $kat->nama_kategori }}</a>
                        </li>
                    @endforeach
                </ul>
            </li> --}}
        </ul>
        <form method="GET" action="{{ route('search') }}">
            <div class="d-flex">
                <input class="form-control me-2" name="search" id="search" type="search" placeholder="Search..." aria-label="Search">
                <button class="btn btn-outline-dark" type="submit">Search</button>
            </div>
        </form>
          </div>
      </div>
      </nav>
{{-- Endnavbar --}}