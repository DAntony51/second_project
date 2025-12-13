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

   <h1>СПИСОК СТУДЕНТОВ:</h1>
    <hr>
   <a href={{ route('students.create') }} > Добавить студента
   </a>
   <hr>
   @foreach($students as $student)


        <div> Имя: {{$student->name}} </div>
        <div>Возраст: {{$student->age}}</div>
        <div>Специальность: {{$student->major}}</div>
        <div>Курс: {{$student->year}}</div>
        <div>Система оплаты: {{$student->resident}}</div>

        <a href="{{ route('students.show', $student->id) }}" class="action-button">
            Просмотр
        </a>
        <hr>

    @endforeach
</body>
</html>
