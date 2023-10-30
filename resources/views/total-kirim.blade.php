<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Total Data Dikirim</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap4.min.css">
    <style>
        h1 {
            background-color: #751c1c;
            /* Dark red background */
            color: #f0f0f0;
            /* White text */
            padding: 20px;
            text-align: center
        }

        #history {
            margin-top: 20px;
        }

        .error {
            border: 1px solid red;
        }

        .menu {
            background-color: #751c1c;
            /* Dark red background */
            color: #f0f0f0;
            /* White text */
            padding: 10px 20px;
            border: none;
            cursor: pointer;
            border-radius: 3px;
            margin-top: 10px;
            text-align: center;
        }

        .menu a {
            color: #f0f0f0;
            text-decoration: none;
            margin-right: 10px;
        }

        .menu a:hover {
            color: white;
            font-weight: bold
        }

        .menu a.active {
            color: white;
            font-weight: bold
        }
    </style>

</head>

<body>
    <h1>Hitung Akar Kuadrat API</h1>
    {{-- menu --}}
    <div class="menu">
        <a class="{{ request()->is('/') ? 'active' : '' }}" href="/">Home</a>
        <a class="{{ request()->is('total-kirim') ? 'active' : '' }}" href="/total-kirim">Total Kirim</a>
    </div>


    <div id="history">
        <h3 class="text-center">Data Total Banyak Kirim Tiap Nomor</h3>

        <!-- <button id="clear-history-button" onclick="clearHistory()">Clear History</button> -->
        <div class="container ">
            <div class="row my-5">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Fastest Data (ms)</h5>
                            <p class="card-text">{{ $fastest->execution_time }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Slowest Data (ms)</h5>
                            <p class="card-text">{{ $slowest->execution_time }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Total Data</h5>
                            <p class="card-text">{{ $total }}</p>
                        </div>
                    </div>
                </div>
            </div>
            <table class="table table-striped table-bordered" id="history-table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Angka</th>
                        <th>Jumlah</th>
                    </tr>
                </thead>
                <tbody id="history-list">
                    @foreach ($jumlah as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->angka }}</td>
                            <td>{{ $item->jumlah }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    {{-- // datatable cdn --}}
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap4.min.js"></script>
    {{-- // datatable cdn --}}
    <script>
        $(document).ready(function() {
            $('#history-table').DataTable();
        });
    </script>
</body>

</html>
