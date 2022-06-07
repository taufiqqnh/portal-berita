  <!-- Footer -->
 <br>
 <footer class="text-center text-lg-start bg-primary text-light">
    <!-- Section: Links  -->
    <section class="d-flex justify-content-center justify-content-lg-between p-1 border-bottom ">
      <div class="container text-center text-md-start mt-1 ">
        <!-- Grid row -->
        <div class="row mt-3">
          <!-- Grid column -->
          <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-2">
            <!-- Content -->
              <h6 class="text-uppercase fw-bold mb-4">
                UDB NEWS
              </h6>
              <p>
                Global Enterpreneur University
              </p>
          </div>
          <!-- Grid column -->
  
          <!-- Grid column -->
          <div class="col-md-4 col-lg-2 col-xl-2 mx-auto mb-2">
              <!-- Links -->
              <h6 class="text-uppercase fw-bold mb-4">
                Artikel Populer
              </h6>
              @foreach ($postfooter as $row)
              <div class="row g-0">
                  <div class="col-md-6">
                    <img src="{{asset('uploads/' .$row->image)}}"  alt="...">
                  </div>
                  <div class="col-md-6">
                    <div class="card-body">
                      <h6 class="card-title">{{ Str::limit(strip_tags($row->judul), 20) }}</h6>
                      {{-- <p class="card-text"><small class="text-muted">{{$row->users->name}}</small></p> --}}
                    </div>
                  </div>
              </div>
              @endforeach 
          </div>
          <!-- Grid column -->
  
          <!-- Grid column -->
          <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-2">
            <!-- Links -->
            <h6 class="text-uppercase fw-bold mb-4">
              iklan
            </h6>
            @foreach ($iklanfooter as $row)
            <div class="detail-sidebar-iklan">
              <h4>{{$row->judul_iklan}}</h4> 
              <a href="">
                  <img src="{{asset('uploads/' .$row->image)}}" width="350" alt="">
              </a>
          </div>
          @endforeach
          </div>
          <!-- Grid column -->
        </div>
        <!-- Grid row -->
      </div>
    </section>
    <!-- Section: Links  -->
  
    <!-- Copyright -->
    <div class="text-center p-3" >
      © 2022 Copyright :
      <a class="text-reset fw-bold" href="#" target="__blank">Taufiq, Irvani & Mega</a>
    </div>
    <!-- Copyright -->
  </footer>
  <!-- Footer -->