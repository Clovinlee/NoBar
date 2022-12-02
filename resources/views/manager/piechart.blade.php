<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Bar chart snack yang dipesan</h1>
    <canvas id="myChart" style="width: 100px;height:100px"></canvas>
</body>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script type="text/javascript">
        var snack =  {{ Js::from($bar) }};
        // console.log(snack);
        const data = {
        labels: [
        'Makanan',
        'Minuman',
        ],
        datasets: [{
        label: 'Data pembelian snack',
        data: snack,
        backgroundColor: [
            'rgb(255, 99, 132)',
            'rgb(54, 162, 235)'
        ],
        hoverOffset: 4
        }]
    };

    const config = {
        type: 'pie',
        data: data,
    };

    const myChart = new Chart(
            document.getElementById('myChart'),
            config
        );
    </script>
</html>




