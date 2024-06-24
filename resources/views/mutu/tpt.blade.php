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
                        Nilai penerimaan konsumen terhadap rasa durian dengan lama penyimpanan <span id="store"></span> bulan diprediksi memiliki nilai <span id="percentage"></span>.  Batas nilai aman untuk Total Padatan Terlarut ditetapkan sebesar 29,49.
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
            type: "scatter",
            data: {
                // labels: [9,10,11,25],
                datasets: [
                    {
                        label: "TPT (Brix)",
                        // data: [32.5,33,32,28.5],
                        data: [
                            { x: 9, y: 32.5 },
                            { x: 10, y: 33 },
                            { x: 11, y: 32 },
                            { x: 25, y: 28.5 },
                        ],
                        backgroundColor: "#337ab7",
                        borderColor: "#337ab7",
                        borderWidth: 1,
                        showLine: true,
                    },
                ],
            },
            options : {
                scales: {
                    y: {
                        beginAtZero: false,
                        grace: '20%',
                        ticks: {
                            stepSize: 0.01,
                        }
                    },
                    x: {
                        beginAtZero: true,
                        grace: '20%',
                        ticks: {
                            stepSize: 1,
                        }
                    }
                },
                plugins: {
                    annotation: {
                        annotations: {
                            label1: {
                                type: 'label',
                                xValue: 8,
                                yValue: 28,
                                backgroundColor: 'rgba(245,245,245)',
                                content: ['y = -0,2852x + 35,351', 'R² = 0,9698'],
                                font: {
                                    size: 18
                                }
                            }
                        }
                    }
                }
            },
        });

        document.getElementById("search").addEventListener("click", function() {
            
            event.preventDefault(); // prevent form submission

            const tanggal = document.getElementById("tanggal").value;
            const dt_input = new Date(tanggal); // get the month number
            let diff = Math.abs(new Date() - dt_input);
            diff = diff / (1000 * 60 * 60 * 24 * 30);
            const month = Math.round(diff);

            // const labels = [9,10,11,25];
            // const data = [32.5,33,32,28.5];
            const data = [
                { x: 9, y: 32.5 },
                { x: 10, y: 33 },
                { x: 11, y: 32 },
                { x: 25, y: 28.5 },
            ];

            let isMonthExist = data.some(label => label.x === month);
            if (isMonthExist) {
                if (window.myChart) {
                    window.myChart.destroy();
                }
                // Set the point background and border colors based on the selected month
                const pointBackgroundColors = data.map(label => label.x === month ? 'red' : '#337ab7');
                const pointBorderColors = data.map(label => label.x === month ? 'red' : '#337ab7');
                const pointBorderWidth = data.map(label => label.x === month ? 3 : 0.5);

                window.myChart = new Chart(ctx, {
                    type: "scatter",
                    data: {
                        // labels: labels,
                        datasets: [
                            {
                                label: "TPT (Brix)",
                                data: data,
                                borderWidth: 1,
                                pointBackgroundColor: pointBackgroundColors,
                                pointBorderColor: pointBorderColors,
                                pointBorderWidth: pointBorderWidth,
                                showLine: true,
                            },
                        ],
                    },
                    options : {
                        scales: {
                            y: {
                                beginAtZero: false,
                                grace: '20%',
                                ticks: {
                                    stepSize: 0.01,
                                }
                            },
                            x: {
                                beginAtZero: true,
                                grace: '20%',
                                ticks: {
                                    stepSize: 1,
                                }
                            }
                        },
                        plugins: {
                            annotation: {
                                annotations: {
                                    label1: {
                                        type: 'label',
                                        xValue: 8,
                                        yValue: 28,
                                        backgroundColor: 'rgba(245,245,245)',
                                        content: ['y = -0,2852x + 35,351', 'R² = 0,9698'],
                                        font: {
                                            size: 18
                                        }
                                    }
                                }
                            }
                        }
                    },
                });
            } else{
                if (window.myChart) {
                    window.myChart.destroy();
                }

                window.myChart = new Chart(ctx, {
                    type: "scatter",
                    data: {
                        // labels: [9,10,11,25],
                        datasets: [
                            {
                                label: "TPT (Brix)",
                                // data: [32.5,33,32,28.5],
                                data: [
                                    { x: 9, y: 32.5 },
                                    { x: 10, y: 33 },
                                    { x: 11, y: 32 },
                                    { x: 25, y: 28.5 },
                                ],
                                backgroundColor: "#337ab7",
                                borderColor: "#337ab7",
                                borderWidth: 1,
                                showLine: true,
                            },
                        ],
                    },
                    options : {
                        scales: {
                            y: {
                                beginAtZero: false,
                                grace: '20%',
                                ticks: {
                                    stepSize: 0.01,
                                }
                            },
                            x: {
                                beginAtZero: true,
                                grace: '20%',
                                ticks: {
                                    stepSize: 1,
                                }
                            }
                        },
                        plugins: {
                            annotation: {
                                annotations: {
                                    label1: {
                                        type: 'label',
                                        xValue: 8,
                                        yValue: 28,
                                        backgroundColor: 'rgba(245,245,245)',
                                        content: ['y = -0,2852x + 35,351', 'R² = 0,9698'],
                                        font: {
                                            size: 18
                                        }
                                    }
                                }
                            }
                        }
                    },
                });
            }

            // Get the x and y values
            // const x = month;
            // const y = data[labels.indexOf(month)];
            let y = -0.2852 * month + 35.351;

            let condition = 'NORMAL';
            if (y < 29.493625) {
                condition = 'DILUAR BATAS AMAN';
            }

            // Update the elements
            document.getElementById('card').classList.remove('d-none');
            document.getElementById('condition').textContent = condition;
            document.getElementById('store').textContent = month;
            document.getElementById('percentage').textContent = y * 100;
        });
    </script>
@endsection