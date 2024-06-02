<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PDF</title>
    <style>
        .bg-warning-custom {
            background-color: #FFD809;
        }
        table, th, td {
            border: 1px solid;
        }
    </style>
</head>
<body>
    <div class="row">
        <h1>Mitigasi Risiko</h1>
    </div>
    <div class="row">
        <h2>Tipe: {{ $masterCategoryRisks->id == 2 ? "HOR 1" : "HOR 2" }}</h2>
    </div>
    <div class="row">
        <table class="table">
            <thead>
                <tr>
                    <th class="text-center">Code</th>
                    <th class="text-center">{{ $masterCategoryRisks->name }}</th>
                    <th class="text-center">{{ $masterCategoryRisks->description }}</th>
                    <th class="text-center">Sum {{ $masterCategoryRisks->description }}</th>
                    <th class="text-center">{{ $masterCategoryRisks->description }} kum</th>
                    <th class="text-center">Peringkat</th>
                </tr>
            </thead>
            <tbody>
                @foreach($mitigationResult as $key => $record)
                    <tr>
                        <td class="text-center {{ $record->cumulative < 80 ? 'bg-warning-custom' : '' }}">
                            {{ $record->mitigation_headers->code }}
                        </td>
                        <td class="{{ $record->cumulative < 80 ? 'bg-warning-custom' : '' }}">
                            {{ $record->mitigation_headers->description }}
                        </td>
                        <td class="text-center {{ $record->cumulative < 80 ? 'bg-warning-custom' : '' }}">
                            {{ $record->value }}
                        </td>
                        <td class="text-center {{ $record->cumulative < 80 ? 'bg-warning-custom' : '' }}">
                            {{ $record->sum }}
                        </td>
                        <td class="text-center {{ $record->cumulative < 80 ? 'bg-warning-custom' : '' }}">
                            {{ $record->cumulative }}%
                        </td>
                        <td class="text-center {{ $record->cumulative < 80 ? 'bg-warning-custom' : '' }}">
                            {{ $record->rank }}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>