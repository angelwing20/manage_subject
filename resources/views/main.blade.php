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
        .header {
            background-color: #343a40;
            color: #ffffff;
            padding: 10px 20px;
            border-radius: 5px;
        }
        .form-container {
            margin-bottom: 10px;
        }
        .table thead {
            background-color: #495057;
            color: white;
        }
        .table tbody tr:nth-child(even) {
            background-color: #e9ecef; 
        }
        .table tbody tr:hover {
            background-color: #ced4da; 
        }
        .btn-custom {
            background-color: #343a40; 
            color: white;
        }
        .btn-custom:hover {
            background-color: #495057; 
        }
        input[type="text"],
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
    </style>
</head>
<body>
    <header class="header d-flex justify-content-between align-items-center">
        <h1 class="m-0"><a href="{{ route('main') }}" class="text-white"><b>Admin - {{ Auth::user()->name }}</b></a></h1>
        <a href="{{ route('logout') }}" class="btn btn-danger">Logout</a>
    </header>
    
    <h2 style="margin-top: 10px">Subject Management</h2>
    <div class="form-container">
        <form action="{{ route('addsubject') }}" method="POST" class="d-flex align-items-center">
            @csrf
            <label for="subject" class="me-2">Add New Subject:</label>
            <input type="text" id="subject" name="subject" placeholder="Subject Name" required class="form-control me-2" style="max-width: 300px;">
            <input type="submit" value="Add Subject" class="btn btn-success">
        </form>
    </div>
    
    <div>
        <a href="{{ route('addteacherpage') }}" class="btn btn-success" style="margin: 5px">Add New Teacher</a>
        <a href="{{ route('addstudentpage') }}" class="btn btn-success" style="margin: 5px">Add New Student</a>
        <div class="form-container d-flex align-items-center" style="margin: 5px;">
            <h3 class="m-0 me-2">Teacher:</h3>
            @foreach ($teachers as $teacher)
                <a href="{{ route('viewteacher', $teacher->id) }}">
                    <button type="button" class="btn btn-primary me-2"><b>{{ $teacher->t_name }}</b></button>
                </a>
            @endforeach
        </div>
    </div>

    <form action="{{ route('main') }}" method="GET" class="mb-3" style="margin-top: 10px">
        <div class="input-group">
            <input type="text" name="search" id="search" placeholder="Search Subject" class="form-control">
            <button type="submit" class="btn btn-warning">Search</button>
        </div>
    </form>
    
    <table class="table table-bordered">
        <thead>
            <tr>
                <th style="border:none;background-color: #495057;color: white;">Subject Name</th>
                <th style="border:none;background-color: #495057;color: white;">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($subjects as $subject)
                <form action="{{ route('editsubject', $subject->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <tr>
                        <td style="border:none;background:linear-gradient(to right, rgba(255, 255, 255, 0.901), #909ba5)">
                            <input type="text" name="subject" value="{{ $subject->subject }}" id="subject_{{ $subject->id }}" style="outline: none; border: none; width: 100%; height:100%; font-size: 20px;" readonly>
                            @error('subject')
                                <span style="color:red">{{ $message }}</span>
                            @enderror
                        </td>
                        <td style="border:none;background:linear-gradient(to right, #909ba5, #32373d)">
                            <a href="{{ route('viewsubject', $subject->id) }}" class="btn btn-primary" style="min-width: 100px">View</a>            
                            <button type="button" class="btn btn-warning" id="edit_{{ $subject->id }}" onclick="editSubject({{ $subject->id }})" style="min-width: 100px">Edit</button>
                            <button type="submit" class="btn btn-success" id="success_{{ $subject->id }}" style="display:none;min-width: 100px">Save</button>
                            <a href="{{ route('deletesubject',$subject->id) }}" class="btn btn-danger" style="min-width: 100px">Delete</a>         
                        </td>
                    </tr>
                </form>
            @endforeach
        </tbody>
    </table>
</body>
</html>

<script>
    $(document).ready(function(){
        window.editSubject = function(id) {
            let input = $("#subject_" + id);
            input.removeAttr("readonly").focus();
            $("#edit_" + id).hide();
            $("#success_" + id).show();
        };
    });
</script>
