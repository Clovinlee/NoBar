<main style="margin-top:58px">
    <div class="container pt-4" id="branch">
      <section class="mb-4">
        <h1>Branch</h1>
        <button class="btn btn-primary"  data-mdb-toggle="modal" data-mdb-target="#staticBackdrop">Add new Schedule here!</button>
        <div class="accordion accordion-flush" id="accordionFlushExample">
          <div class="accordion-item">
            <h2 class="accordion-header" id="flush-headingOne">
              <button
                class="accordion-button collapsed"
                type="button"
                data-mdb-toggle="collapse"
                data-mdb-target="#flush-collapseOne"
                aria-expanded="false"
                aria-controls="flush-collapseOne"
              >
              Ciputra World
              </button>
            </h2>
            <div
              id="flush-collapseOne"
              class="accordion-collapse collapse"
              aria-labelledby="flush-headingOne"
              data-mdb-parent="#accordionFlushExample"
            >
              <div class="accordion-body">
                <a href="/admin/{branch}/studio">Add new Studio here!</a>
                <div class="container-fluid">
                  Studio 1
                </div>
                <div class="container-fluid">
                  Studio 2
                </div>
              </div>
            </div>
          </div>
          <div class="accordion-item">
            <h2 class="accordion-header" id="flush-headingTwo">
              <button
                class="accordion-button collapsed"
                type="button"
                data-mdb-toggle="collapse"
                data-mdb-target="#flush-collapseTwo"
                aria-expanded="false"
                aria-controls="flush-collapseTwo"
              >
                Galaxy Mall
              </button>
            </h2>
            <div
              id="flush-collapseTwo"
              class="accordion-collapse collapse"
              aria-labelledby="flush-headingTwo"
              data-mdb-parent="#accordionFlushExample"
            >
              <div class="accordion-body">
                <a href="/admin/{branch}/studio">Add new Studio here!</a>
                <div class="container-fluid">
                  Studio 1
                </div>
                <div class="container-fluid">
                  Studio 2
                </div>
              </div>
            </div>
          </div>
        </div>
      </section> 
    </div>
  </main>
  <div class="modal" tabindex="-1" id="modaladdbranch">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Add new Branch</h5>
          <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="" method="post">
          @csrf
          <div class="modal-body">
            <div class="form-outline mb-4">
              <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}"/>
              <label class="form-label">Nama branch</label>
              @error('name')
                  <div class="invalid-feedback"> 
                      {{ $message }}
                  </div>
                @enderror
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Add branch</button>
          </div>
        </form>
      </div>
    </div>
  </div>