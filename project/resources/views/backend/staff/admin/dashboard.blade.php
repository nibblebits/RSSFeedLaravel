@section('title', 'Dashboard')
@include('backend/include/header')



<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{url('home')}}">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            @if(session('success'))
            <div class="alert alert-success" role="alert">
                <h1>{{session('success')}}</h1>
            </div>
            @endif
            <div class="card">
                <div class="card-body">

                    <div class="row">
                        <div class="col-md-6">
                            <h1>Dashboard</h1>
                            <div id="pull_chart">
                               
                            </div>


                        </div>
                    </div>

    </section>
    <!-- /.content -->
</div>


@include('backend/include/footer')

<!--Load the AJAX API-->
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
    // Load the Visualization API and the corechart package.
    google.charts.load('current', {
        'packages': ['corechart']
    });

    // Set a callback to run when the Google Visualization API is loaded.
    google.charts.setOnLoadCallback(drawChart);

    // Callback that creates and populates a data table,
    // instantiates the pie chart, passes in the data and
    // draws it.
    function drawChart() {

        // Create the data table.
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'News Extracted');
        data.addColumn('number', 'Total');
        data.addRows([
            @foreach($rss_feeds as $rss_feed)
            ['{{addslashes($rss_feed->name)}}', {{$rss_feed->total_news_extracted}}],
            @endforeach
    
        ]);

        // Set chart options
        var options = {
            'title': 'RSS Feed Extracted News',
            'width': 800,
            'height': 600
        };

        // Instantiate and draw our chart, passing in some options.
        var chart = new google.visualization.PieChart(document.getElementById('pull_chart'));
        chart.draw(data, options);
    }
</script>