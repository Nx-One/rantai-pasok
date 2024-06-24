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
                        Nilai penerimaan konsumen terhadap rasa durian dengan lama penyimpanan <span id="store"></span> bulan diprediksi memiliki nilai <span id="percentage"></span>.  Batas nilai aman untuk total asam ditetapkan sebesar 0,64%.
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
                // labels: [9,10,11,12,24],
                datasets: [
                    {
                        label: "Total Asam Tertitrasi",
                        // data: [0.3775,0.445,0.51,0.43,0.69],
                        data: [
                            { x: 9, y: 0.3775 },
                            { x: 10, y: 0.445 },
                            { x: 11, y: 0.51 },
                            { x: 12, y: 0.43 },
                            { x: 24, y: 0.69 },
                        ],
                        backgroundColor: "#337ab7",
                        borderColor: "#337ab7",
                        borderWidth: 1,
                        showLine: true,
                    },
                ],
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: false,
                        grace: '20%',
                        ticks: {
                            stepSize: 0.1,
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
                                yValue: 0.60,
                                backgroundColor: 'rgba(245,245,245)',
                                content: ['y = 0,0186x + 0,245', 'R² = 0,8888'],
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

            // const labels = [9,10,11,12,24];
            // const data = [0.3775,0.445,0.51,0.43,0.69];
            const data = [
                { x: 9, y: 0.3775 },
                { x: 10, y: 0.445 },
                { x: 11, y: 0.51 },
                { x: 12, y: 0.43 },
                { x: 24, y: 0.69 },
            ];

            // check if there's any month in the data
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
                                label: "Total Asam Tertitrasi",
                                data,
                                borderWidth: 1,
                                pointBackgroundColor: pointBackgroundColors,
                                pointBorderColor: pointBorderColors,
                                pointBorderWidth: pointBorderWidth,
                                showLine: true,
                            },
                        ],
                    },
                    options: {
                        scales: {
                            y: {
                                beginAtZero: false,
                                grace: '20%',
                                ticks: {
                                    stepSize: 0.1,
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
                                        yValue: 0.60,
                                        backgroundColor: 'rgba(245,245,245)',
                                        content: ['y = 0,0186x + 0,245', 'R² = 0,8888'],
                                        font: {
                                            size: 18
                                        }
                                    }
                                }
                            }
                        }
                    },
                });
            } else {
                if (window.myChart) {
                    window.myChart.destroy();
                }

                window.myChart = new Chart(ctx, {
                    type: "scatter",
                    data: {
                        // labels: [9,10,11,12,24],
                        datasets: [
                            {
                                label: "Total Asam Tertitrasi",
                                // data: [0.3775,0.445,0.51,0.43,0.69],
                                data,
                                backgroundColor: "#337ab7",
                                borderColor: "#337ab7",
                                borderWidth: 1,
                                showLine: true,
                            },
                        ],
                    },
                    options: {
                        scales: {
                            y: {
                                beginAtZero: false,
                                grace: '20%',
                                ticks: {
                                    stepSize: 0.1,
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
                                        yValue: 0.60,
                                        backgroundColor: 'rgba(245,245,245)',
                                        content: ['y = 0,0186x + 0,245', 'R² = 0,8888'],
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

            let y = 0.0186 * month + 0.245;

            let condition = 'NORMAL';
            if (month > 21.25) {
                condition = 'DILUAR BATAS AMAN';
            }

            // Update the elements
            document.getElementById('card').classList.remove('d-none');
            document.getElementById('condition').textContent = condition;
            document.getElementById('store').textContent = month;
            document.getElementById('percentage').textContent = y.toFixed(2);
        });
    </script>
@endsection