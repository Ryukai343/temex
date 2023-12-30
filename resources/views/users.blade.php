@php use App\Http\Controllers\ProfileController; @endphp
@extends('layouts/app')
@section('header_text')
    Uživatelia
@endsection
@section('content')
<article>
    @if(session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
    <div class="container py-3">
        <table id="usersTable" class="table table-striped table-bordered table-sm">
            <thead>
            <tr>
                <th class="th-sm text-center">Meno</th>
                <th class="th-sm text-center">Priezvisko</th>
                <th class="th-sm text-center">Email</th>
                <th class="th-sm text-center">Rola</th>
                <th class="th-sm text-center">Spracovanie</th>
            </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
                <tr>
                    <td class="text-center">{{$user->name}}</td>
                    <td class="text-center">{{$user->surname}}</td>
                    <td class="text-center">{{$user->email}}</td>
                    <td class="text-center">{{$user->role}}</td>
                    <form method="POST" action="{{ route('user.changeRole', $user) }}">
                        @csrf
                        @if(ProfileController::roleCheck($user->role) )
                            <td class="text-center"><button type="submit" class="btn btn-danger btn-sm">Odobrať práva</button></td>
                        @else
                            <td class="text-center"><button  type="submit" class="btn btn-primary btn-sm">Pridať práva</button></td>
                        @endif
                    </form>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</article>
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script src="//cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
<script>
    let table = new DataTable('#usersTable');
</script>
@endsection
