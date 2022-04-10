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
            <td>Nama Perusahaan</td>
            <td>Email</td>
            <td>Website</td>
        </tr>
        @foreach($companies as $company)
        <tr>
            <td>{{$company->id }}</td>
            <td>{{$company->nama }}</td>
            <td>{{$company->email }}</td>
            <td>{{$company->website }}</td>
        </tr>
       @endforeach
    </table>

</body>
</html>