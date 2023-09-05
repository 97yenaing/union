<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Import Export Excel </title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <style>
    table {
      border-collapse: collapse;
      font-size: 12px;
    }

    th, td {
      border: 2px solid black;
      height:50px;
    }
  </style>
</head>

<body>
    <div class="container mt-5 text-center">
       
          <form action="exporting"  method="POST" >
            @csrf
            <h1>Patients</h1>
            <table>
              <thead>
         
                <tr>
                  <th style="background-color:#a6a6a6;">Name</th>
                  <th style="background-color:#a6a6a6;">Phone</th>
                  <th style="background-color:#a6a6a6;">Email</th>
                  <th style="background-color:#a6a6a6;">Age</th>
                  <th style="background-color:#a6a6a6;">Address</th>
                  <th style="background-color:#a6a6a6;">Township</th>
                  
                 
                </tr>
              </thead>

              <tbody>
                @foreach($export_data as $index => $value)
                <tr>
               
                      <td style="width:100px;">{{ $export_data[$index]['name'] }}</td>
                      <td style="width:100px;">{{ $export_data[$index]['phone'] }}</td>
                      <td style="width:100px;">{{ $export_data[$index]['email'] }}</td>
                      <td style="width:100px;">{{ $export_data[$index]['age'] }}</td>
                      <td style="width:100px;">{{ $export_data[$index]['address'] }}</td>
                      <td style="width:100px;">{{ $export_data[$index]['township'] }}</td>
                      
                </tr>
                @endforeach
              </tbody>
            </table>





        </form>
    </div>
</body>

</html>
