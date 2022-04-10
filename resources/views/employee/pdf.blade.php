<!DOCTYPE html>
<html>
<head>
    
<title>{{$title}}}}</title>
</head>
<body>
        <h1>Daftar Perusahaan</h1>
    <table>
        <tr>
            <td>ID</td>
            <td>Nama karyawan</td>
            <td>Email</td>
            <td>Perusahaan</td>
        </tr>
        @foreach($employees as $employee)
        <tr>
            <td>{{$employee->id }}</td>
            <td>{{$employee->nama }}</td>
            <td>{{$employee->email }}</td>
            <td>{{$employee->company->nama }}</td>
        </tr>
       @endforeach
    </table>

</body>
</html>