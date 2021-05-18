@extends('layouts.app')
@section('content')
<a href="#" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#passwordAddModal">Dodaj hasło</a>
<br>
<br>
<table class="table table-striped " id="passwordTable">
    <thead>
        <tr>
            <th scope="col">id</th>
            <th scope="col">nazwa</th>
            <th scope="col">nazwa użytkownika</th>
            <th scope="col">hasło</th>
            <th scope="col">akcje</th>

        </tr>
    </thead>
    <tbody>
        @foreach($user->passwords as $password)
        <tr id="sid{{$password->id}}">
            <td>{{$password->id}}</td>
            <td>{{$password->site_name}}</td>
            <td>{{$password->login}}</td>
            <td>{{$password->hashed_password}}
            <button class="btn btn-default btn-sm">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="blue" class="bi bi-eye" viewBox="0 0 16 16">
                    <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/>
                    <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/>
                </svg> 
            </button>
            </td>
            <!-- Akcje -->
            <td><button type="button" class ="btn btn-primary btn-sm">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                </svg>
            </button>
            <button type="button" class ="btn btn-danger btn-sm">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                </svg>
            </button></td>
            <!-- Akcje -->
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
                '<td>'+response.hashed_password +
                '<button class="btn btn-default btn-sm">' +
                '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="blue" class="bi bi-eye" viewBox="0 0 16 16">' +
                    '<path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/>' +
                    '<path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/>' +
                '</svg> </button></td>' +
                '<td> <button type="button" class ="btn btn-primary btn-sm">'+
                '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">'+
                '<path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>'+
                '<path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>'+
                '</svg></button>' +
                '<button type="button" class ="btn btn-danger btn-sm">' +
                '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">' +
                '<path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>' +
                '<path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>' +
                '</svg></button>' +
                '</td>'+
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
