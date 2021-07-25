            @extends('layouts.app')
            @push('css')
            <style>
                .highcharts-figure,
                .highcharts-data-table table {
                    min-width: 360px;
                    max-width: 1300px;
                    margin: 1em auto;
                }

                .highcharts-data-table table {
                    font-family: Verdana, sans-serif;
                    border-collapse: collapse;
                    border: 1px solid #EBEBEB;
                    margin: 10px auto;
                    text-align: center;
                    width: 100%;
                    max-width: 800px;
                }

                .highcharts-data-table caption {
                    padding: 1em 0;
                    font-size: 1.2em;
                    color: #555;
                }

                .highcharts-data-table th {
                    font-weight: 600;
                    padding: 0.5em;
                }

                .highcharts-data-table td,
                .highcharts-data-table th,
                .highcharts-data-table caption {
                    padding: 0.5em;
                }

                .highcharts-data-table thead tr,
                .highcharts-data-table tr:nth-child(even) {
                    background: #f8f8f8;
                }

                .highcharts-data-table tr:hover {
                    background: #f1f7ff;
                }

            </style>
            @endpush

            @section('content')
            <div class="row">
                <div class="col-md-3">
                    <div class="panel panel-inverse">
                        <div class="panel-heading">Filter Data Plant</div>
                        <div class="panel-body">
                            <form class="form-horizontal form-bordered" action="#" id="frm-filter">
                                @csrf
                                <div class="form-group row bg-green">
                                    {{-- <label class="col-md-4 col-form-label">Bootstrap Combobox</label> --}}
                                    <div class="col-md-12">
                                        <select class="default-select2 form-control" name="plant">
                                            <option value="">Plant ID</option>
                                            @foreach ($plants as $value)
                                            <option value="{{ $value }}" @if(request('plant')==$value) selected @endif>
                                                {{ $value }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row bg-green">
                                    {{-- <label class="col-md-4 col-form-label">Bootstrap Combobox</label> --}}
                                    <div class="col-md-12">
                                        <select class="default-select2 form-control" name="tipe_barang">
                                            @foreach ($tipe_barang as $item)
                                            <option value="{{$item}}">{{$item}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row bg-green">
                                    {{-- <label class="col-md-4 col-form-label">Default Date Ranges</label> --}}
                                    <div class="col-md-12">
                                        <div class="input-group" id="default-daterange">
                                            <input type="text" class="form-control"
                                                placeholder="click to select the date range" />
                                            <span class="input-group-append">
                                                <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                            </span>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row bg-green">
                                    <div class="col-md-12">
                                        <button type="button"
                                            class="btn btn-inverse m-r-5 m-b-5 col-md-12" id="filter_data">Filter</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="panel-heading">Weigbridge All Plant</div>
                        <div class="panel-body">
                            <div class="widget widget-stats bg-green">
                                <div class="vertical-box">
                                    <!-- begin event-list -->
                                    <div class="vertical-box-column p-r-35 d-none d-lg-table-cell" style="width: 235px">
                                        <div id="external-events" class="fc-event-list">
                                            <h5 class="text-center m-t-0 m-b-15">TRANSAKSI HARIAN</h5>
                                            <b>
                                                <div class="fc-event" data-color="#00acac">
                                                    <div class="fc-event-icon"><i
                                                            class="fas fa-circle fa-fw f-s-15 text-success"></i><span>
                                                            120</span></div> BENGKULU
                                                </div>
                                            </b>
    
                                        </div>
                                    </div>
    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="panel panel-inverse">
                        <div class="panel-heading">
                            <div class="panel-heading-btn">
    
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success"
                                    data-click="panel-reload"><i class="fa fa-redo"></i></a>
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning"
                                    data-click="panel-collapse"><i class="fa fa-minus"></i></a>
    
                            </div>
                            <h4 class="panel-title" id="title">Grafik</h4>
                        </div>
                        <div class="panel-body">
                            <canvas id="line-chart" data-render="chart-js"></canvas>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="panel panel-inverse">
                        <div class="panel-heading">User</div>
                        <div class="panel-body">
                            <div class="widget widget-stats bg-primary">
                                <div class="stats-icon"><i class="fa fa-users"></i></div>
                                <div class="stats-info">
                                    <h4 class="text-black">User</h4>
                                    <p>{{ App\Models\User::count() ?? '0' }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="panel-heading">Transaksi WB</div>
                        <div class="panel-body">
                            <div class="widget widget-stats bg-green">
                                <div class="stats-icon"><i class="fa fa-truck"></i></div>
                                <div class="stats-info">
                                    <h4 class="text-black">TRUCK ANTRI</h4>
                                    {{-- <p>{{ App\Models\User::count() ?? '0' }}</p> --}}
                                    <p>25</p>
                                </div>
                            </div>
                            <div class="widget widget-stats bg-orange">
                                <div class="stats-icon"><i class="fa fa-truck"></i></div>
                                <div class="stats-info">
                                    <h4 class="text-black">TRUCK IN</h4>
                                    <p>20</p>
                                </div>
                            </div>
                            <div class="widget widget-stats bg-red">
                                <div class="stats-icon"><i class="fa fa-truck"></i></div>
                                <div class="stats-info">
                                    <h4 class="text-black">TRUCK OUT</h4>
                                    <p>20</p>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <div class="col-lg-2">
                
            </div>

            @endsection

            @push('js')
            {{-- <script src="https://code.highcharts.com/highcharts.js"></script> --}}
            {{-- <script src="{{asset('assets/js/highcharts.js')}}"></script> --}}
            {{-- <script src="https://code.highcharts.com/highcharts.js"></script> --}}
            {{-- <script src="https://code.highcharts.com/modules/exporting.js"></script> --}}
            <script src="../assets/plugins/chart-js/Chart.min.js"></script>
            <script>
                $(function(){
                    let start, end;
                    $('#default-daterange').daterangepicker({
                        timePicker: false,
                        startDate: moment().startOf('hour'),
                        endDate: moment().startOf('hour').add(32, 'hour'),
                    });
                    $('#default-daterange').on('apply.daterangepicker', function(ev, picker) {
                        start = picker.startDate.format('YYYY-MM-DD');
                        end = picker.endDate.format('YYYY-MM-DD');
                        // console.log(picker.startDate.format('YYYY-MM-DD'));
                        // console.log(picker.endDate.format('YYYY-MM-DD'));
                    });

                    $('#filter_data').on('click',function(){
                        let frm = $('#frm-filter').serializeArray();
                        let data_post = frm.concat([{start,end}]);
                        // callback
                        req_data(data_post,function(a){
                                const dataset =  a.map(function(v,i) {
                                    return {
                                        lcl:parseFloat(v.LCL).toFixed(2),
                                        ucl:parseFloat(v.UCL).toFixed(2),
                                        variance:parseFloat(v.Variance).toFixed(2),
                                        date:v.date
                                    }
                                });
                            const dd = [
                                    {
                                        label: 'LCL',
                                        borderWidth: 2,
                                        borderColor: COLOR_PURPLE,
                                        backgroundColor: COLOR_PURPLE_TRANSPARENT_3,
                                        data:dataset.map(function(a){ return a.lcl })
                                    },
                                    {
                                        label: 'UCL',
                                        borderWidth: 2,
                                        borderColor: COLOR_YELLOW,
                                        backgroundColor: COLOR_YELLOW_TRANSPARENT_3,
                                        data:dataset.map(function(a){ return a.ucl })
                                    },
                                    {
                                        label: 'VARIANCE',
                                        borderWidth: 2,
                                        borderColor: COLOR_RED,
                                        backgroundColor: COLOR_RED_TRANSPARENT_3,
                                        data:dataset.map(function(a){ return a.variance })
                                    }
                            ]
                            const label = 'Data Sheet tanggal '+start+' s/d '+end;
                            $('#title').html(label)
                            const dateLabel = dataset.map(function(a){ return a.date })
                            generate_chart(dateLabel,dd)
                        });
                    });
                });

                // request function
                let req_data = function(d,callback) {
                    $.ajax({
                                type: "POST",
                                url: "/admin/dashboard/post_filter",
                                data: {
                                        "_token": "{{ csrf_token() }}",
                                        d
                                },
                                // dataType: 'json',
                                success: function (response) {
                                    callback(response)
                                    // console.log(response)
                                },
                                error:function(a)
                                {
                                    alert('error');
                                }
                            });
                }

                // end jquery
                let generate_chart = function(label,dd)
                {
                    // console.log('data chart', lineChartData)
                    var ctx = document.getElementById('line-chart').getContext('2d');
                    var lineChart = new Chart(ctx, {
                        type: 'line',
                        data: {
                                labels: label,
                                datasets: dd
                            }
                    });
                }
                

            </script>
            @endpush
