<!DOCTYPE html>
<html>
<head>
    <title>Membuat Laporan PDF Dengan DOMPDF Laravel</title>
</head>
<body>
    <style type="text/css">
        table tr td,
        table tr th{
                font-size: 9pt;
        }
    </style>
            <h5>Laporan Artikel</h4>            
    <table class='table table-bordered'>
            <thead>
                <tr>
                    <th>No</th>
                    <th>status</th>
                    <th>Total</th>
                    <th>Tanggal</th>
                </tr>
        </thead>
        <tbody>
            @foreach($transaksi as $a)
            <tr>
                <td>{{ $loop->id_transaksi }}</td>
                <td>{{$a->Status}}</td>
                <td>{{$a->Total}}</td>
                <td>{{$a->Tanggal}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    
</body>
</html>
        