@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="padding: 1%">Панель администратора</div> </br>
                    <div class="container">
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
                    </div>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-md-11">
                                <div class="container">
                                    <form method="POST" action="{{route('home.update', $item->id)}}">
                                        @csrf
                                        @method('PATCH')
                                        <div class="form-group row">
                                            <label for="id" class="col-3 col-form-label">id</label>
                                            <div class="col-9">
                                                <input type="text" class="form-control" id="id" name="id" value="{{$item->id}}" readonly>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="first_name" class="col-3 col-form-label">Название фото (title)</label>
                                            <div class="col-9">
                                                <input type="text" class="form-control" id="title" name="title" value="{{$item->title}}">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="alt" class="col-3 col-form-label">Альтернативный текст (alt)</label>
                                            <div class="col-9">
                                                <input type="text" class="form-control" id="alt" name="alt" value="{{$item->alt}}">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="published" class="col-3 col-form-label">Опубликовать (published)</label>
                                            <div class="col-9">
                                                <input type="text" class="form-control" id="published" name="published" value="{{$item->published}}">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="url" class="col-3 col-form-label">URL адрес изображения (url)</label>
                                            <div class="col-9">
                                                <input type="text" class="form-control" id="url" name="url" value="{{$item->url}}">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="offset-3 col-9">
                                                <a type="submit" class="btn btn-warning" href="/home">Назад</a>
                                                <button type="submit" class="btn btn-primary">Отправить</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
