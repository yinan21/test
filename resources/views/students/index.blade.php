<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Student Portal</title>
</head>
<body>

<h1>Student List</h1>

<form method="GET" action="{{ route('students.index') }}">
    <label for="course">Course:</label>
    <input type="text" id="course" name="course" value="{{ request('course') }}">

    <label for="year">Year:</label>
    <input type="number" id="year" name="year" value="{{ request('year') }}">

    <button type="submit">Apply</button>
</form>

<table border="1">
    <thead>
    <tr>
        <th><a href="?sort=id&direction=asc">ID</a></th>
        <th>Name</th>
        <th>Course</th>
        <th>Year</th>
    </tr>
    </thead>
    <tbody>
    @forelse ($students as $student)
        <tr>
            <td>{{ $student['id'] }}</td>
            <td>{{ $student['name'] }}</td>
            <td>{{ $student['course'] }}</td>
            <td>{{ $student['year'] }}</td>
        </tr>
    @empty
        <tr>
            <td colspan="4">No results found</td>
        </tr>
    @endforelse
    </tbody>
</table>


</body>
</html>
