@session('message')
    <script>
        alert("{{ session('message') }}")
    </script>
@endsession

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin - Subject Management</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa; 
            color: #343a40;
            margin: 20px;
        }
        header {
            background-color: #343a40;
            color: #ffffff;
            padding: 10px 20px;
            border-radius: 5px;
        }
        .form-container {
            margin-bottom: 10px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid #000000;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #495057;
            color: white;
        }
        .form-container input[type="text"],
        input[type="number"],
        input[type="tel"],
        select {
            border: 1px solid #ced4da;
            border-radius: 5px;
            padding: 8px;
            width: 100%;
            outline: none;
        }
        input[type="text"]:focus,
        input[type="number"]:focus,
        input[type="tel"]:focus,
        select:focus {
            border-color: #495057;
        }
        .btn-custom {
            background-color: #343a40;
            color: white;
        }
        .btn-custom:hover {
            background-color: #495057;
        }
        .btn-warning {
            background-color: #ffc107;
            color: black;
        }
        .btn-warning:hover {
            background-color: #e0a800;
        }
    </style>
</head>
<body>
    <header>
        <div class="d-flex justify-content-between align-items-center">
            <h1 class="m-0"><a href="{{ route('main') }}" class="text-white"><b>Admin - {{ Auth::user()->name }}</b></a></h1>
            <a href="{{ route('logout') }}" class="btn btn-danger">Logout</a>
        </div>
    </header>
    
    <div style="display: flex;flex-direction:column;">
        <h2 style="margin-top: 10px">Teacher - {{ $teacher->t_name }}</h2>
        <a href="{{ route('editteacherpage', $teacher->id) }}" class="btn btn-warning mb-2">Edit</a>
    </div>
    

    <table>
        <thead>
            <tr>
                <th>Age:</th>
                <th>Gender:</th>
                <th>Phone</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ $teacher->age }}</td>
                <td>{{ $teacher->gender }}</td>
                <td><a href="{{ asset('wa.me/'.$teacher->phone) }}">{{ $teacher->phone }}</a></td>
            </tr>
        </tbody>
    </table>
    <hr>

    <div class="form-container">
        <h3>Students:</h3>
    </div>

    <form action="{{ route('viewteacher',$teacher->id) }}" method="GET" class="mb-3">
        <div class="input-group">
            <input type="text" name="search" id="search" placeholder="Search Student" class="form-control">
            <button type="submit" class="btn btn-warning">Search</button>
        </div>
    </form>

    <table>
        <thead>
            <tr>
                <th>Student Name</th>
                <th>Subject</th>
                <th>Age</th>
                <th>Gender</th>
                <th>Phone</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($students as $list)
                <tr>
                    <td>{{ $list->s_name }}</td>
                    <td><a href="{{ route('viewsubject', $list->subject->id) }}">{{ $list->subject->subject ? $list->subject->subject : 'N/A' }}</a></td>
                    <td>{{ $list->age }}</td>
                    <td>{{ $list->gender }}</td>
                    <td><a href="{{ asset('wa.me/'.$list->phone) }}">{{ $list->phone }}</a></td>
                    <td>
                        <a href="{{ route('editstudentpage', $list->id) }}" class="btn btn-warning" style="width: 100px;">Edit</a>
                        <a href="{{ route('deletestudent', $list->id) }}" class="btn btn-danger" style="width: 100px;">Delete</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
