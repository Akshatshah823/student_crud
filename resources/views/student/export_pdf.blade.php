<!DOCTYPE html>
<html>
<head>
    <title>Students PDF Export</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
            padding: 6px;
            text-align: left;
        }
    </style>
</head>
<body>
    <h2>Student List</h2>
    <table>
        <thead>
            <tr>
                <th>Sr. No.</th>
                <th>Name</th>
                <th>Unique ID</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Course</th>
                <th>GPA</th>
            </tr>
        </thead>
        <tbody>
            {{$i = 1}}
            @foreach($students as $student)
                <tr>
                    <td>{{ $i }}</td>
                    <td>{{ $student->name }}</td>
                    <td>{{ $student->unique_id }}</td>
                    <td>{{ $student->email }}</td>
                    <td>{{ $student->phone }}</td>
                    <td>{{ $student->course->course_name ?? 'N/A' }}</td>
                    <td>{{ $student->gpa }}</td>
                </tr>
                {{$i++ }}
            @endforeach
        </tbody>
    </table>
</body>
</html>
