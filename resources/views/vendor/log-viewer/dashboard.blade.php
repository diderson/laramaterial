@extends('log-viewer::_template.master')

@section('content')
    <div class="container-fluid">
        <div class="block-header">
            <h2>DASHBOARD</h2>
        </div>

        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card" style="min-height: 600px">
                    <div class="header text-uppercase">
                        <h2>
                            List of Users
                        </h2>
                    </div>
                    <div class="body">
                        <div class="col-md-3">
                            <canvas id="stats-doughnut-chart" height="300"></canvas>
                        </div>
                        <div class="col-md-9">
                            <div class="row">
                                @foreach($percents as $level => $item)
                                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                        <div class="info-box-3 hover-zoom-effect level level-{{ $level }} {{ $item['count'] === 0 ? 'level-empty' : '' }}"
                                             style="height: 90px">
                                            <div class="icon">
                                                {!! log_styler()->icon($level) !!}
                                            </div>
                                            <div class="content">
                                                <div class="text text-uppercase">{{ $item['name'] }}</div>
                                                <div class="number count-to" data-from="0"
                                                     data-to="{{ $item['count'] }}" data-speed="1000"
                                                     data-fresh-interval="20">
                                                    {{ $item['count'] }} <span class="font-18">({!! $item['percent'] !!}
                                                        %)</span>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="/libs/adminbsb-materialdesign/plugins/jquery-countto/jquery.countTo.js"></script>
    <script>
        //        $('.count-to').countTo();

        $(function () {
            new Chart($('canvas#stats-doughnut-chart'), {
                type: 'doughnut',
                data: {!! $chartData !!},
                options: {
                    legend: {
                        position: 'bottom'
                    }
                }
            });
        });
    </script>
@endsection
