@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Панель администратора</div>

                    <div class="card-body">
                        @role('admin')

                        <h3>Вы администратор и можете редактировать и добавлять новые роли</h3></br>


                        @php /** @var \Illuminate\Support\ViewErrorBag $errors */ @endphp
                        @if($errors->any())
                            <div class="row justify-content-center">
                                <div class="col-md-11">
                                    <div class="alert alert-danger" role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        @php //**  {!! dd($errors->all(':message')) !!} */ @endphp
                                        {{$errors->first()}}
                                    </div>
                                </div>
                            </div>

                        @endif
                        @if(session('success'))
                            <div class="row justify-content-center">
                                <div class="col-md-11">
                                    <div class="alert alert-success" role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        {{ session()->get('success')}}
                                    </div>
                                </div>
                            </div>
                        @endif


                        <div class="container">
                              <table class="table table-striped" border="1" cellpadding="7" cellspacing="0">
                                <thead>
                                <tr>
                                    <th>id</th>
                                    <th>name</th>
                                    <th>email</th>
                                    <th>role</th>
                                    <th>Назначить роль</th>
                                    <th>Убрать роль</th>
                                </tr>
                                </thead>
                                <tbody>
                                <h1>Администраторы</h1>

                                @foreach($roleAdmin as $value)
                                    <tr>
                                        <td>{{$value['id']}}</td>
                                        <td width="28%" align="center">{{$value['name']}}</td>
                                        <td width="28%" align="center">{{$value['email']}}</td>
                                        <td width="28%" align="center">
{{--                                        {{$value['roles']['0']['name']}}--}}
                                            @foreach($value['roles'] as $val)
                                                {{$val['name']}}
                                                @endforeach
                                        </td>
                                        <td>
                                            <form method="POST" action="{{route('role.update', $value['id'])}}">
                                                @csrf
                                                @method('PATCH')
                                                <input type="submit" class="btn btn-warning" value="Назначить"></input>
                                            </form>
                                        <td>
                                            <form method="POST" action="{{route('role.destroy', $value['id'])}}">
                                                @csrf
                                                @method('DELETE')
                                                <input type="submit" class="btn btn-success" value="Убрать"></input>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>



                        <div class="container">
                            <table class="table table-striped" border="1" cellpadding="7" cellspacing="0">
                                <thead>
                                <tr>
                                    <th>id</th>
                                    <th>name</th>
                                    <th>email</th>
                                    <th>role</th>

                                </tr>
                                </thead>
                                <tbody>
                                <h1>Все пользователи</h1>

                                @foreach($item as $value)
                                    <tr>
                                        <td>{{$value['id']}}</td>
                                        <td width="28%" align="center">{{$value['name']}}</td>
                                        <td width="28%" align="center">{{$value['email']}}</td>

                                        <td>
                                            <form method="POST" action="{{route('role.update', $value['id'])}}">
                                                @csrf
                                                @method('PATCH')
                                                <input type="submit" class="form-control btn btn-warning" value="Назначить"></input>
                                            </form>

                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        @else
                            Обратитесь к администратору, чтобы вам дали права на редактирование и добавление фотографий в фотогалерею...
                            @endrole
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
