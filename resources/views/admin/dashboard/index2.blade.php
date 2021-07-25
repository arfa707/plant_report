        @extends('layouts.app')
        @push('css')
        <style>
          #chartdiv {
            width: 100%;
            height: 500px;
          }
          
          </style>
        @endpush
        @section('content')
        <div class="col-lg-8">
          <div class="panel panel-inverse">
              <div class="panel-heading">
                  <div class="panel-heading-btn">
                    
                      <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
                      <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                  
                  </div>
                  <h4 class="panel-title">Roles</h4>
              </div>
              <div class="panel-body">
                <div id="chartdiv"></div>
                  </div>
              </div>
          </div>

        @endsection
        @push('js')
        <!-- Resources -->
        <script src="https://cdn.amcharts.com/lib/4/core.js"></script>
        <script src="https://cdn.amcharts.com/lib/4/charts.js"></script>
        <script src="https://cdn.amcharts.com/lib/4/themes/animated.js"></script>

        <!-- Chart code -->
        <script>
        am4core.ready(function() {

        // Themes begin
        am4core.useTheme(am4themes_animated);
        // Themes end

        var chart = am4core.create("chartdiv", am4charts.XYChart);
        chart.hiddenState.properties.opacity = 0; // this makes initial fade in effect

        chart.data = {!! $datarh !!};

        console.log(chart.data);


        var categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
        categoryAxis.renderer.grid.template.location = 0;
        categoryAxis.dataFields.category = "data";
        categoryAxis.renderer.minGridDistance = 40;

        var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());

        var series = chart.series.push(new am4charts.CurvedColumnSeries());
        series.dataFields.categoryX = "data";
        series.dataFields.valueY = "value";
        series.tooltipText = "{valueY.value}"
        series.columns.template.strokeOpacity = 0;
        series.columns.template.tension = 1;

        series.columns.template.fillOpacity = 0.75;

        var hoverState = series.columns.template.states.create("hover");
        hoverState.properties.fillOpacity = 1;
        hoverState.properties.tension = 0.8;

        chart.cursor = new am4charts.XYCursor();

        // Add distinctive colors for each column using adapter
        series.columns.template.adapter.add("fill", function(fill, target) {
          return chart.colors.getIndex(target.dataItem.index);
        });

        chart.scrollbarX = new am4core.Scrollbar();
        chart.scrollbarY = new am4core.Scrollbar();

        }); // end am4core.ready()
        </script>

        <!-- HTML -->

            
        @endpush



















        @extends('layouts.app')
@push('css')
<style>
  #chartdiv {
    width: 100%;
    height: 500px;
  }
  
  </style>
@endpush
@section('content')
<div class="col-lg-8">
  <div class="panel panel-inverse">
      <div class="panel-heading">
          <div class="panel-heading-btn">
            
              <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
              <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
          
          </div>
          <h4 class="panel-title">Roles</h4>
      </div>
      <div class="panel-body">
        <div id="container"></div>
          </div>
      </div>
  </div>

@endsection
@push('js')
<script src="https://code.highcharts.com/highcharts.js"></script>
<script type="text/javascript">
    $(function () { 
      var data_click = <?php echo $click; ?>;
        var data_netto = <?php echo $netto; ?>;

    $('#container').highcharts({
        chart: {
            type: 'column'
        },
        title: {
            text: 'Yearly Website Ratio'
        },
        xAxis: {
            categories: ['Senin','Selasa','Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu']
        },
        yAxis: {
            title: {
                text: 'Rate'
            }
        },
        series: [
          {
            name: 'Click',
            data: data_click
        }, 

        {
          name: 'data_netto',
          data: data_netto
        }]
    });
});
</script>

    
@endpush