@extends('layouts.app')
@section('content')
<a href="#" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#passwordAddModal">Dodaj hasło</a>
<table class="table" id="passwordTable">
    <thead>
        <tr>
            <th scope="col">id</th>
            <th scope="col">nazwa</th>
            <th scope="col">nazwa użytkownika</th>
            <th scope="col">hasło</th>

        </tr>
    </thead>
    <tbody>
        @foreach($user->passwords as $password)
        <tr id="sid{{$password->id}}">
            <td>{{$password->id}}</td>
            <td>{{$password->site_name}}</td>
            <td>{{$password->login}}</td>
            <td>{{$password->hashed_password}}</td>

        </tr>
        @endforeach
    </tbody>
</table>



<div class="modal fade" id="passwordAddModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Dodaj nowe hasło</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <form id="passwordAddForm">
                    @csrf
                    <div class="form-group">
                        <label for="site_name">nazwa</label>
                        <input id="site_name" class="form-control" type="text" required>
                        <span id="site_name" style="color:red;"><span>
                    </div>
                    <div class="form-group">
                        <label for="login">nazwa użytkownika</label>
                        <input id="login" class="form-control" type="text" required>
                    </div>
                    <div class="form-group">
                        <label for="nothashed_password">hasło</label>
                        <input id="nothashed_password" class="form-control" type="password" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
$("#passwordAddModal").submit(function(e) {
    e.preventDefault();

    let site_name = $("#site_name").val();
    let login = $("#login").val();
    let nothashed_password = $("#nothashed_password").val();
    let _token = $("input[name=_token]").val();

    $.ajax({
        url: "{!!route('password.add')!!}",
        type: "POST",
        headers: {
            'X-CSRF-TOKEN': _token
        },
        data: {
            site_name: site_name,
            login: login,
            nothashed_password: nothashed_password,
        },

        success: function(response) {

            $("#passwordTable tbody").append(
                '<tr id="sid' + response.id + '">' +
                '<td>'+
                response.id+ '</td>' +
                '<td>'+response.site_name+'</td>' +
                '<td>'+response.login+'</td>' +
                '<td>'+response.hashed_password+'</td>' +

                '</tr>');
            $("#passwordForm")[0].reset();
            $("#passwordAddModal").modal('toggle');

        },
        error: function(response) {
            //$("#name").text(response.responseJSON.errors.firstname[0]);
            console.log(response);

            //console.log(response.responseJSON.errors.firstname[0]);
        }
    })
});
</script>
@endsection
