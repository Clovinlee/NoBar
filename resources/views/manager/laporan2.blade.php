{{-- note :
- Manager includes :
 + ChartJS
 + Laporan (5 minimal) - PDF
 + Filter and sort laporan --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Laporan 30 hari terakhir</h1>
    <canvas id="myChart" height="100px"></canvas>
    
    <hr>
    
</body>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" ></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script type="text/javascript">
    var labels =  {{ Js::from($labels) }};
    var htrans =  {{ Js::from($data) }};

    const data = {
        labels: labels,
        datasets: [{
        label: 'My First dataset',
        backgroundColor: 'rgb(255, 99, 132)',
        borderColor: 'rgb(255, 99, 132)',
        data: htrans,
        }]
    };

    const config = {
        type: 'bar',
        data: data,
        options: {}
    };

    const myChart = new Chart(
        document.getElementById('myChart'),
        config
    );
</script>

</html>