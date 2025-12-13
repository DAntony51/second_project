<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<h1> Данные студента: {{$student->name}} </h1>

{{--<a--}}
{{--    href={{ route('students.index') }} > ◀ Вернуться к списку студентов--}}
{{--</a>--}}
<form action="{{ route('students.index') }}" method="get" >
    <button type="submit"> ◀ Вернуться к списку студентов</button>
</form>

<hr>
<div> Имя: {{$student->name}} </div>
<div>Возраст: {{$student->age}}</div>
<div>Специальность: {{$student->major}}</div>
<div>Курс: {{$student->year}}</div>
<div>Система оплаты: {{$student->resident}}</div>
<div>Created_at: {{$student->created_at}}</div>
<div>Updated_at: {{$student->updated_at}}</div>
<hr>
{{--<form--}}
{{--    action="{{ route('students.index') }}" >--}}
{{--    <button type="submit">◀ Вернуться к списку студентов</button>--}}
{{--<a--}}
{{--    href={{ route('students.index') }} > ◀ Вернуться к списку студентов--}}
{{--</a>--}}
<form action="{{ route('students.edit', $student->id) }}" method="GET" >
    <button type="submit">Редактировать</button>
</form>
<div>
    <form
        action="{{ route('students.destroy', $student->id) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit">Удалить</button>
    </form>
</div>





</body>

</html>











