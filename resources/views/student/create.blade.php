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
<h1>Добавление нового студента:</h1>


    <a
        href={{ route('students.index') }} > ◀ Вернуться к списку студентов
    </a>
<hr>
<form
    action="{{route('students.store')}}"
    method="post">
    @csrf
    <input type="text" name="name" placeholder="введите имя студента">

    @error('name')
    <div>
        {{$message}}
    </div>
    @enderror
    <div>
        <input type="text" name="age" placeholder="введите возраст">
    </div>
    @error('age')
    <div>
        {{$message}}
    </div>
    @enderror
    <div>
        <input type="text" name="birthday" placeholder="дата рождения">
    </div>
    @error('birthday')
    <div>
        {{$message}}
    </div>
    @enderror
    <div>
        <input type="text" name="major" placeholder="введите специальность">
    </div>
    @error('major')
    <div>
        {{$message}}
    </div>
    @enderror
    <div>
        <input type="text" name="year" placeholder="курс">
    </div>
    @error('year')
    <div>
        {{$message}}
    </div>
    @enderror
    <div>
        <input type="text" name="resident" placeholder="1-бюджет, 0-контракт">
    </div>
    @error('resident')
    <div>
        {{$message}}
    </div>
    @enderror
    {{--    <a--}}
    {{--        href={{ route('students.index') }} > ◀ Вернуться к списку студентов--}}
    {{--    </a>--}}
    <hr>
    <input type="submit" value="сохранить" >
</form>
</body>
</html>

