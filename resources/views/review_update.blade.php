@extends('shop_layout')

@section('title')
Редактировать тзывы
@endsection

@section('main_content')
<div class="container">
  <h2>Форма редактирования отзыва</h2>

  @if ($errors->any())
  <div class="alert alert-danger">
    <ul>
      @foreach ($errors->all() as $error)
      <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
  @endif
  {{__FILE__}}
  <form method="post" action="{{ URL('update-data/'.$reviews->id)}}">
    @csrf
      @method('PUT')
    <input type="email" name="email" id="email" value="{{$reviews->email}}" class="form-control"><br>
    <input type="text" name="subject" id="subject" value="{{$reviews->subject}}" class="form-control"><br>
    <textarea name="message" id="message" class="form-control"
      placeholder="Текст сообщения">{{$reviews->message}}</textarea><br>
    <button type="submit" class="btn btn-success">Сохранить</button>
  </form>
  <br>
  {{-- <h1>Все отзывы</h1>
  <div class="alert alert-warning">
    @foreach($reviews as $element)
    <h3>{{$element->subject}}</h3>
    <b>{{$element->email}}</b><br>
    <b>Создано: {{$element->created_at}}</b><br>
    <b>Изменено: {{$element->updated_at}}</b><br>
    <b>ID: {{$element->id}}</b><br>
    <p>{{$element->message}}</p><br>
    <a href="{{$element->id}}"><button class="btn btn-warning">Редактировать</button></a>
    <hr>
    @endforeach

  </div> --}}
</div>
@endsection
