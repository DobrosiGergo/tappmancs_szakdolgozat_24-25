@extends('layouts.app')

@section('content')
<form action="{{ route('role.shelterStore') }}" method="POST">
    @csrf
    <div>
        <button type="submit" name="role_shelter" value="shelterOwner">Tulajdonos</button>
        <button type="submit" name="role_shelter" value="shelterWorker">Dolgozó</button>
    </div>
</form>
@endsection