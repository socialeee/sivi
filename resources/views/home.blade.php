@extends('layouts.app')
@section('title')
    Dashboard
@endsection
 
@section('content')
    <div id="container">
 
    </div>
<br>
    <div id="chart-pelanggan">
 
    </div>
@endsection
 
@section('js')
<script src="https://code.highcharts.com/highcharts.src.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>
@if($this_month == 2)
<script>
    Highcharts.chart('container', {
        title: {
            text: 'Grafik Aktivasi Mingguan'
        },
        xAxis: {
            categories: ['minggu 1', 'minggu 2', 'minggu 3', 'minggu 4']
        },
        yAxis: {
            min: 0,
            title : { text : 'data masuk mingguan' }
        },
        plotOptions: {
        line: {
            dataLabels: {
                enabled: true
            },
            enableMouseTracking: false
            }
        },
        series: [{
            type: 'line',
            name: 'pelanggan',
            data: [{!! $dataw[$start] !!}, {!! $dataw[$start+1] !!}, {!! $dataw[$start+2] !!}, {!! $dataw[$start+3] !!}],
            marker: {
                enabled: false
            },
            // states: {
            //     hover: {
            //         lineWidth: 0
            //     }
            // },
            // enableMouseTracking: false
        // }, {
        //     type: 'scatter',
        //     name: 'Observations',
        //     data: [1, 1.5, 2.8, 3.5, 3.9, 4.2],
        //     marker: {
        //         radius: 4
        //     }
        }]
    });
</script>
@else
<script>
    Highcharts.chart('container', {
        title: {
            text: 'Grafik Aktivasi Mingguan'
        },
        xAxis: {
            categories: ['minggu 1', 'minggu 2', 'minggu 3', 'minggu 4', 'minggu 5', 'minggu 6']
        },
        yAxis: {
            min: 0,
            title : { text : 'data masuk mingguan' }
        },
        plotOptions: {
        line: {
            dataLabels: {
                enabled: true
            },
            enableMouseTracking: false
            }
        },
        series: [{
            type: 'line',
            name: 'pelanggan',
            data: [{!! $dataw[$start] !!}, {!! $dataw[$start+1] !!}, {!! $dataw[$start+2] !!}, {!! $dataw[$start+3] !!}, {!! $dataw[$start+4] !!}, {!! $dataw[$start+5] !!}],
            marker: {
                enabled: false
            },
            // states: {
            //     hover: {
            //         lineWidth: 0
            //     }
            // },
            // enableMouseTracking: false
        // }, {
        //     type: 'scatter',
        //     name: 'Observations',
        //     data: [1, 1.5, 2.8, 3.5, 3.9, 4.2],
        //     marker: {
        //         radius: 4
        //     }
        }]
    });
</script>
@endif
<script>
    Highcharts.chart('chart-pelanggan', {
    chart: {
        type: 'line'
    },
    title: {
        text: 'Grafik Aktivasi {{$tahun}}'
    },
    xAxis: {
        categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Banyak Data Masuk'
        }
    },
    plotOptions: {
        line: {
            dataLabels: {
                enabled: true
            },
            enableMouseTracking: false
        }
    },
    series: [{
        name: 'Pelanggan',
        data: [{!! $datam['1'] !!}, {!! $datam['2'] !!}, {!! $datam['3'] !!}, {!! $datam['4'] !!}, {!! $datam['5'] !!}, {!! $datam['6'] !!}, {!! $datam['7'] !!}, {!! $datam['8'] !!}, {!! $datam['9'] !!}, {!! $datam['10'] !!}, {!! $datam['11'] !!}, {!! $datam['12'] !!}]
    }]
});
</script>
@endsection