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
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 15px;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #495057;
            color: white;
        }
        input[type="text"], input[type="number"], input[type="tel"], select {
            border: none;
            outline: none;
            width: 100%;
            font-size: 14px; 
            padding: 8px;  
            border: 1px solid #ced4da;
            border-radius: 5px;
        }
        input[type="text"]:focus, input[type="number"]:focus, input[type="tel"]:focus, select:focus {
            border-color: #495057; 
        }
        .btn-custom {
            background-color: #343a40;
            color: white;
        }
        .btn-custom:hover {
            background-color: #495057; 
        }
        .btn-success {
            background-color: #28a745;
        }
        .btn-success:hover {
            background-color: #218838; 
        }
        .btn-danger {
            background-color: #dc3545;
        }
        .btn-danger:hover {
            background-color: #c82333;
        }
        @media (max-width: 768px) {
            body {
                margin: 5px;
            }
            h1 {
                font-size: 1.2rem; 
            }
            h2 {
                font-size: 1rem;
            }
            table {
                font-size: 12px;
            }
        }
    </style>
</head>
<body>
    <header>
        <div class="d-flex justify-content-between align-items-center">
            <h1 class="m-0"><a href="{{ route('main') }}" class="text-white"><b>Admin - {{ Auth::user()->name }}</b></a></h1>
            <a href="{{ route('logout') }}" class="btn btn-danger btn-sm">Logout</a>
        </div>
    </header>

    <form action="{{ route('editteacher', $teachers->id) }}" method="POST" class="mb-3" style="display: flex; justify-content: center; flex-direction: column;margin-top:10px;">
        @csrf
        <h2 class="text-center">Edit Teacher</h2>
        <table>
            <tr>
                <th><label for="t_name">Teacher Name</label></th>
                <td>
                    <input type="text" id="t_name" name="t_name" value="{{ $teachers->t_name }}" placeholder="Teacher Name" required>
                    @error('t_name')
                        <span style="color:red;">{{ $message }}</span>
                    @enderror
                </td>
            </tr>
            <tr>
                <th><label for="age">Teacher Age</label></th>
                <td>
                    <input type="number" id="age" name="age" value="{{ $teachers->age }}" placeholder="Teacher Age" required>
                    @error('age')
                        <span style="color:red;">{{ $message }}</span>
                    @enderror
                </td>
            </tr>
            <tr>
                <th><label>Gender</label></th>
                <td>
                    <input type="radio" name="gender" id="male" value="Male" {{ $teachers->gender == 'Male' ? 'checked' : '' }} required>
                    <label for="male" class="me-2">Male</label>
                    <input type="radio" name="gender" id="female" value="Female" {{ $teachers->gender == 'Female' ? 'checked' : '' }} required>
                    <label for="female">Female</label>
                </td>
            </tr>
            <tr>
                <th><label for="phone">Phone Number</label></th>
                <td>
                    <input type="tel" name="phone" placeholder="Phone Number" value="{{ $teachers->phone }}" required>
                    @error('phone')
                        <span style="color:red;">{{ $message }}</span>
                    @enderror
                </td>
            </tr>
            <tr>
                <th><label for="subject_id">Subject</label></th>
                <td>
                    <select name="subject_id" id="subject_id">
                        @foreach ($subjects as $subject)
                            <option value="{{ $subject->id }}" {{ $subject->id == $teachers->subject_id ? 'selected' : '' }}>{{ $subject->subject }}</option>
                        @endforeach
                    </select>
                </td>
            </tr>
        </table>

        <div class="text-center mt-2">
            <button type="submit" class="btn btn-success btn-sm" style="width: 150px;">Edit Success</button>
            <a href="{{ route('deleteteacher', $teachers->id) }}" class="btn btn-danger btn-sm" style="width: 100px; margin-left: 10px;">Delete</a>
        </div>
    </form>
</body>
</html>
