<div class="movie-item mb-50">
  <div class="movie-poster">
      <a href="{{ url('/movie/'.$slug) }}">
        <img style="object-fit: contain" width="303px" height="430px" src="{{ file_exists(public_path('assets/images/'.$img)) ? asset('assets/images/'.$img) : asset('assets/img/poster/ucm_poster02.jpg') }}" alt=""></a>
  </div>
  <div class="movie-content">
      <div class="top">
          <h5 class="title"><a href="{{ url('/movie/'.$slug) }}">{{ $slot }}</a></h5>
          {{-- <span class="date">2021</span> --}}
      </div>
      <div class="bottom">
          <ul>
              <li><span class="quality">4k</span></li>
              <li>
                  <span class="duration"><i class="far fa-clock"></i> 128 min</span>
                  {{-- <span class="rating"><i class="fas fa-thumbs-up"></i> 3.5</span> --}}
              </li>
          </ul>
      </div>
  </div>
</div>