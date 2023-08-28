<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>

<body>

    <div class="nav">
        <div class="logo">
            <h4>Faishal Amir</h4>
        </div>
        <div class="ul">
            <li class=" {{ $Title === 'Home' ? 'actif' : '' }}"><a href="/DaftarTamu">Daftar Tamu</a>
            </li>
            <li class="{{ $Title === 'Absen' ? 'actif' : '' }}"><a href="/Absen">Absen </a>
            <li class="{{ $Title === 'Profile' ? 'actif' : '' }}"><a href="/Profile">Profile</a>
            </li>
            <li class="{{ $Title === 'Profile' ? 'actif' : '' }}"><a href="/AktifitasTamu">Aktifitas Tamu</a>
            </li>
        </div>
        <a href="/LogOut"><button class="butten1">Log Out</button></a>
    </div>

    @if (Session::get('succes add data'))
        <div class="card">
            <div class="alert alert-success" role="alert">
                {{ Session::get('succes add data') }}
            </div>
        </div>
    @endif

    <h1 class="texttamu">Daftar Tamu</h1>

    <div class="border">
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Alamat</th>
                    <th>No_Hp</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>

                @foreach ($data as $Item)
                    <tr>
                        <td>{{ $Item->nama }}</td>
                        <td>{{ $Item->Alamat }}</td>
                        <td>{{ $Item->No_Hp }}</td>
                        <td class="td">

                            <form class="d-inline" action="{{ url('DaftarTamu/' . $Item->nama) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btntd"><i class="bi bi-trash"></i></button>
                            </form>

                            <button type="button" class="btn btn-info btntd"><i
                                    class="bi bi-chat-right-dots"></i></button>
                            <a href="{{ url('DaftarTamu/' . $Item->id . '/edit') }}"><button type="button"
                                    class="btn btn-secondary btntd"><i class="bi bi-pencil-square"></i></button></a>
                        </td>
                @endforeach

                </tr>
            </tbody>
        </table>
    </div>

    {{--  !! pagination  --}}

    <div class="next">
        {{ $data->links() }}
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>
</body>

</html>
