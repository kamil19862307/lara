@extends('shop_layout')

@section('title')
Отзывы
@endsection

@section('main_content')
<div class="container">
  <h2>Форма добавления отзыва</h2>

  @if ($errors->any())
  <div class="alert alert-danger">
    <ul>
      @foreach ($errors->all() as $error)
      <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
  @endif

  <form method="post" action="/review/check">
    @csrf
    <input type="email" name="email" id="email" placeholder="Введите email" class="form-control"/><br>
    <input type="text" name="subject" id="subject" placeholder="Введите тему сообщения" class="form-control"/><br>
    <textarea name="message" id="message" class="form-control" placeholder="Введите сообщение"></textarea><br>
    <button type="submit" class="btn btn-success">Отправить</button>
  </form>
  <br>
  <h1>Все отзывы</h1>
  <div class="alert alert-warning">
    @foreach($reviews as $element)
    <h3>{{$element->subject}}</h3>
    <b>{{$element->email}}</b><br>
    <b>Создано: {{$element->created_at}}</b><br>
    <b>Изменено: {{$element->updated_at}}</b><br>
    <p>{{$element->message}}</p>
    {{-- <a href="/update?id={{$element->id}}"><button class="btn btn-warning">Изменить</a></button> --}}
    {{-- <a href="/update/{{$element->id}}" style="color: rgb(0, 0, 0)"><button --}}
    <a href="{{URL('update/'.$element->id)}}" style="color: rgb(0, 0, 0)">
        <button class="btn btn-warning">Изменить</button></a>
    или
    <a href="{{URL('delete/'.$element->id)}}" style="color: rgb(0, 0, 0)">
        <button class="btn btn-danger">Удалить</button></a>
    <hr>
    @endforeach
  </div>
</div>
@endsection
