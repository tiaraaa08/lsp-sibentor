<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Struk</title>
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
    <style>
        @media print{
            .divider {
                height: 0;
                border-top: 3px solid black;
                margin: 10px 0;
            }

            body {
                width: 80mm;
            }
        }
    </style>
</head>

<body class="mx-auto d-block">
    <img src="{{ asset('logo.png') }}" alt="" style="width: 20%;" class="justify-content-center align-items-center d-flex">
    <h5>SIBENTOR - TIARA</h5>
    <div class="divider"></div>
    <h4>Bukti Transaksi</h4>
    <div class="divider"></div>
    <table>
        <tr>
            <td class="w-50">Tanggal Transaksi</td>
            <td class="w-50">: {{ $struk->tanggal_transaksi }}</td>
        </tr>
        <tr>
            <td class="w-50">Nama Pelanggan</td>
            <td class="w-50">: {{ $struk->pelanggan->nama_pelanggan }}</td>
        </tr>
    </table>
    <div class="divider"></div>
    <table>
        <tr>
            <td>Layanan</td>
            <td>:</td>
            <td>
                <table>
                    <tr>
                        <td>{{ $struk->layanan->nama_layanan }}</td>
                    </tr>
                    <tr>
                        <td>
                            {{ implode(', ', $struk->layanan->desk_layanan) }}
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
    <script src="{{ asset('bootstrap/js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>