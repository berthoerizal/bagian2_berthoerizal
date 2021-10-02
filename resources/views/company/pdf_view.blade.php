<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <title>{{$title}}</title>
    <style>
        table, td, th {
          border: 1px solid black;
        }

        table, td {
            padding-left: 10px;
        }
        
        table {
          width: 100%;
          border-collapse: collapse;
        }
        .center {
            margin: auto;
            width: 60%;
            padding: 10px;
            text-align: center;
        }
        .nomor {
            text-align: center;
        }
    </style>
  </head>
  <body>
    <div class="container">
        <div class="center">
            <h1>{{$title}}</h1>
            <h2>{{$sub_title}}</h2>
        </div>
        <hr>
        <br>
        <div class="row">
            <table>
                  <tr>
                    <th>No.</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Company</th>
                  </tr>
                    @php
                        $no = 0;
                    @endphp
                    @foreach ($emps as $emp)
                    <tr>
                        <td class="nomor">{{ ++$no }}.</td>
                        <td style="font-weight: bold;">{{ $emp->name }}</td>
                        <td>{{ $emp->email }}</td>
                        <td>{{$emp->company_name}}</td>
                      </tr>
                    @endforeach 
            </table>
        </div>
    </div>
  </body>
</html>