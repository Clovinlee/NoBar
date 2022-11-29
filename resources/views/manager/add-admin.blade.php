<main style="margin-top:58px">
    <div class="container pt-4" id="manager">
      <section class="mb-4">
        <h1 style="color: black">Tambah Karyawan</h1>
        <form action="/manager/register_admin" method="post">
            @csrf
            Nama : <input type="text" name="name" id=""><br>
            @error('name')
            <div class="invalid-feedback" style="color: red"> 
                {{ $message }}
            </div>
            @enderror
            Email : <input type="text" name="email" id=""><br>
            @error('email')
            <div class="invalid-feedback" style="color: red"> 
                {{ $message }}
            </div>
            @enderror
            Password : <input type="password" name="password" id=""><br>
            @error('password')
            <div class="invalid-feedback" style="color: red"> 
                {{ $message }}
            </div>
            @enderror
            Confirm Password : <input type="password" name="confirm_password" id=""><br>
            @error('confirm_password')
            <div class="invalid-feedback" style="color: red"> 
                {{ $message }}
            </div>
            @enderror

            Role : <input type="radio" name="kasir" id="">Kasir <input type="radio" name="admin" id="">Admin<br>
            @error('confirm_password')
            <div class="invalid-feedback" style="color: red"> 
                {{ $message }}
            </div>
            @enderror
            <button type="submit">Register</button>
        </form>
      </section> 
    </div>
  </main>