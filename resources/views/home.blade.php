@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Панель администратора</div>

                <div class="card-body">
                    @role('admin')

                    <h3>Вы администратор и можете редактировать и добавлять новые фотографии</h3></br>


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
                        <h2>
                            <button onclick="location.href = '{{route('home.create')}}'" class="btn-link">Новый пост</button>
                            <button onclick="location.href = '{{route('role.index')}}'" class="btn-link">Добавить роль</button>
                        </h2>
                        <table class="table table-striped" border="1" cellpadding="7" cellspacing="0">
                            <thead>
                            <tr>
                                <th>id</th>
                                <th>title</th>
                                <th>alt</th>
                                <th>preview</th>
                                <th>Опубликовано</th>
                                <th>редактировать</th>
                                <th>удалить</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($item as $value)
                            <tr>
                                <td>{{$value->id}}</td>
                                <td width="28%" align="center">{{$value->title}}</td>
                                <td width="28%" align="center">{{$value->alt}}</td>
                                <td width="28%" align="center"><img src="{{$value->url}}" alt="{{$value->alt}}" width="40%"></td>
                                <td width="28%" align="center">
                                    @if($value->published === 1)
                                        Опубликовано
                                    @else
                                        Не опубликовано
                                    @endif
                                </td>
                                <td>
                                    <a class="btn btn-warning" href="{{route('home.edit', $value->id)}}">Редактировать</a> </td>
                                <td>
                                    <form method="POST" action="{{route('home.destroy', $value->id)}}">
                                        @csrf
                                        @method('DELETE')
                                            <input type="submit" class="btn btn-success" value="Удалить"></input>
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
