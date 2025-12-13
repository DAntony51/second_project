<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
<form action="{{ route('students.index') }}" method="GET" >
    <button type="submit"> ◀ Вернуться к списку</button>
</form>

<h1>Редактирование студента: {{ $student->name }}</h1>

<form action="{{ route('students.update', $student->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div>
   Имя:
        <input type="text" name="name" value="{{old('name', $student->name)}}">
        @error('name')
        <div>{{ $message }}</div>
        @enderror
    </div>

    <div>
Возраст:
        <input type="number" name="age" value="{{old('age', $student->age)}}">
        @error('age')
        <div>{{ $message }}</div>
        @enderror
    </div>

    <div>
Специальность:
        <input type="text" name="major" value="{{old('major', $student->major)}}">
        @error('major')
        <div>{{ $message }}</div>
        @enderror
    </div>

    <div>
    Курс:
        <input type="number" name="year" value="{{old('year', $student->year)}}">
        @error('year')
        <div>{{ $message }}</div>
        @enderror
    </div>

    <div>
        Система оплаты:
        <input type="number" name="resident" value="{{old('resident', $student->resident)}}">
        @error('resident')
        <div>{{ $message }}</div>
        @enderror
    </div>

    <button type="submit"> Сохранить изменения</button>
</form>
</body>
</html>
