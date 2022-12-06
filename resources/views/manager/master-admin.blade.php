<main style="margin-top:58px">
    <div class="container pt-4" id="manager">
      <section class="mb-4">
        <h1 style="color: black">Master Karyawan</h1>
        <div id="containerkaryawan" style="width: 100%">
          <table border="1px" class="table table-striped">
              <tr>
                  <th>Nama Karyawan</th>
                  <th>Email Karyawan</th>
                  <th>Register at</th>
                  <th>Role</th>
                  <th>Action</th>
              </tr>
              @forelse ($admins as $item)
                  <tr>
                      <td>{{$item->name}}</td>
                      <td>{{$item->email}}</td>
                      <td>{{$item->created_at}}</td>
                      <td>{{$item->role}}</td>
                      <td><button data-mdb-toggle="modal" value="{{ $item->id }}" data-mdb-target="#modaldeletekaryawan" class="delusers btn btn-danger" onclick="deleteusers({{$item->id}})">Delete</button></td>
                  </tr>
              @empty
                  
              @endforelse
          </table>
        </div>
        <br>
        {{-- action="{{ url('/manager/register_admin') }}" --}}
        <button class="btn btn-primary"  data-mdb-toggle="modal" data-mdb-target="#modaladdKaryawan">Add Karyawan!</button>
      </section> 
    </div>
  </main>

  <div class="modal" tabindex="-1" id="modaldeletekaryawan">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" style="color: black;">Non-aktifkan karyawan</h5>
          <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
        </div>
          <div class="modal-body">
            <div class="form-outline mb-4">
              <input type='hidden' id='delete_id_user' value=''>
              <h1 id="hapusstudioh1" style="color: black; font-size: 20px;">Yakin mau menonaktifkan karyawan ini?</h1>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-primary" data-mdb-dismiss="modal">No</button>
            <button type="button" class="btn btn-danger" data-mdb-dismiss="modal" id="DeleteUsers">Yes</button>
          </div>
      </div>
    </div>
  </div>

  <div class="modal" tabindex="-1" id="modaladdKaryawan">
    <div class="modal-dialog">
        <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" style='color: black;'>Add new Karyawan</h5>
                <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <div class='row'>
                  <div class='col-md-1'>&nbsp;</div>
                  <div class='col-md-10'>
                    
                      <input type='text' class='form-control' placeholder='Nama Karyawan'  id="nama_karyawan_add"   name="name"><br>
                      <input type='text' class='form-control' placeholder='Email Karyawan' id="email_karyawan_add"  name="email"><br>
                      <input type='text' class='form-control' placeholder='Password' id="password_karyawan_add"  name="password"><br>
                      <input type='text' class='form-control' placeholder='confirm Password' id="cpassword_karyawan_add"  name="cpassword"><br>
                      
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" data-mdb-dismiss="modal"id="AddKaryawan">Add Karyawan</button>
              </div>
        </div>
    </div>
   </div>

