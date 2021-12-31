 
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
                <i class="fas fa-gem me-3"></i>Portal Berita
              </h6>
              <p>
                Portal web adalah situs web yang menyediakan kemampuan tertentu yang dibuat sedemikian rupa mencoba menuruti selera para pengunjungnya. Kemampuan portal yang lebih spesifik adalah penyediaan kandungan informasi yang dapat diakses menggunakan beragam perangkat  
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
                      <h6 class="card-title">{{$row->judul}}</h6>
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
      © 2021 Copyright :
      <a class="text-reset fw-bold" href="https://instagram.com/taufiqqnh_" target="__blank">Taufiq NurHidayat</a>
    </div>
    <!-- Copyright -->
  </footer>
  <!-- Footer -->