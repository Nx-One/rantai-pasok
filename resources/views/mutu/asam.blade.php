@extends('layouts.mutu')

@section('contentPenurunanMutu')
    <div class="row my-4">
        <div class="col-7">
            <canvas id="myChart"></canvas>
        </div>
        <div id="card" class="col-5 d-none">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title fw-bold"><u>DURIAN DALAM KONDISI <span id="condition"></span></u></h5>
                    <p class="card-text">
                        Kadar air durian dengan lama penyimpanan <span id="store"></span> bulan diprediksi memiliki  kadar air <span id="percentage"></span> % . Batas kadar air durian ditetapkan sebesar 60 %
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div class="row mb-5">
        <form action="">
            <div class="row">
                <div class="col-md-5">
                    <div class="form-group">
                        <label class="fw-bold" for="tanggal">Masukkan Bulan Produksi Durian </label>
                        <input type="month" class="form-control" id="tanggal" name="tanggal">
                    </div>
                </div>
                <div class="col-md-5">
                    <button class="btn btn-yellow-custom mt-4" id="search">
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection

@section('scriptsPenurunanMutu')
    <script>
        const ctx = document.getElementById("myChart");
    
        window.myChart = new Chart(ctx, {
            type: "line",
            data: {
                labels: [9,12,24],
                datasets: [
                    {
                        label: "Kadar Air",
                        data: [0.64 ,0.62 ,0.59],
                        backgroundColor: "#337ab7",
                        borderColor: "#337ab7",
                        borderWidth: 1,
                    },
                ],
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true,
                    },
                },
            },
        });

        document.getElementById("search").addEventListener("click", function() {
            
            event.preventDefault(); // prevent form submission
            if (window.myChart) {
                window.myChart.destroy();
            }

            const tanggal = document.getElementById("tanggal").value;
            const month = new Date(tanggal).getMonth() + 1; // get the month number

            const labels = [9,10,11,12,24];
            const data = [0.3775,0.445,0.51,0.43,0.69];

            // Set the point background and border colors based on the selected month
            const pointBackgroundColors = labels.map(label => label === month ? 'red' : '#337ab7');
            const pointBorderColors = labels.map(label => label === month ? 'red' : '#337ab7');
            const pointBorderWidth = labels.map(label => label === month ? 3 : 0.5);

            window.myChart = new Chart(ctx, {
                type: "line",
                data: {
                    labels: labels,
                    datasets: [
                        {
                            label: "Kadar Air",
                            data: data,
                            borderWidth: 1,
                            pointBackgroundColor: pointBackgroundColors,
                            pointBorderColor: pointBorderColors,
                            pointBorderWidth: pointBorderWidth,
                        },
                    ],
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true,
                        },
                    },
                },
            });

            // Get the x and y values
            const x = month;
            const y = data[labels.indexOf(month)];

            let condition = 'NORMAL';
            if (x > 21.25 || y > 0.6) {
                condition = 'DILUAR BATAS AMAN';
            }

            // Update the elements
            document.getElementById('card').classList.remove('d-none');
            document.getElementById('condition').textContent = condition;
            document.getElementById('store').textContent = x;
            document.getElementById('percentage').textContent = y * 100;
        });
    </script>
@endsection