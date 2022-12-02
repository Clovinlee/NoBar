<main style="margin-top:58px">
    <div class="container pt-4" id="manager">
      <section class="mb-4">
        <h1 style="color: black">Master Karyawan</h1>
        <table border="1px">
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
                    <td><button>Active</button></td>
                </tr>
            @empty
                
            @endforelse
        </table>
        {{-- action="{{ url('/manager/register_admin') }}" --}}
        <button type="submit"><a href="{{ url('/manager/formAdmin') }}">Add Karyawan</a></button>
      </section> 
    </div>
  </main>