@extends('frontend.layout.layout')
@section('sidebar', view('account.layout.sidebar')->with('current', 'inc'))
@section('content')
<section class="col-md-9 statistic-page" id="content-account">
    <h1 class="title">Thống Kê</h1>
    <div class="row" id="statistic-filter">
        <form action="" method="post">
            <div class="col-md-2">
                <label for="sale">Bán tài liệu</label>
                <input id="sale" type="checkbox" name="type[]" value="sale">
            </div>
            <div class="col-md-2">
                <label for="rfd">RFD</label>
                <input id="rfd" type="checkbox" name="type[]" value="rfd">
            </div>
            <div class="col-md-2">
                <label for="upload">Đăng tài liệu</label>
                <input id="upload" type="checkbox" name="type[]" value="upload">
            </div>
            <div class="col-md-4">
                <input type="text" name="datefilter" value="" />
            </div>
            <div class="col-md-2">
                <input type="submit" value="Áp Dụng">
            </div>
        </form>
    </div>
    <script type="text/javascript" src="{{asset('common/js/highcharts.js')}}"></script>
    <div id="highcharts" style="height: 300px"></div>
    <script type="text/javascript">
        $('input[name=datefilter]').daterangepicker(
            {
                "ranges": {
                    "Hôm nay": [moment(), moment()],
                    "Hôm qua": [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                    "Tuần này": [moment().startOf('week'), moment().endOf('week')],
                    "Tháng này": [moment().startOf('month'), moment().endOf('month')],
                    "7 ngày trước": [moment().subtract(6, 'days'), moment()],
                    "30 ngày trước": [moment().subtract(29, 'days'), moment()],
                    "Tháng trước": [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')],
                    "3 tháng trước": [moment().subtract(3, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')],
                    "6 tháng trước": [moment().subtract(6, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
                },
                "alwaysShowCalendars": true,
                locale: {
                    firstDay: 1,
                    applyLabel: "Áp dụng",
                    cancelLabel: "Hủy",
                    customRangeLabel: "Tùy chọn"
                },
                showWeekNumbers: true
            },
            function (start, end, label) {
                //            $('#reportrange span').html(start.format('DD/MM/YYYY') + ' - ' + end.format('DD/MM/YYYY'));
                //            $('#reportrange input[name="date_from"]').val(start.format('YYYY-MM-DD'));
                //            $('#reportrange input[name="date_to"]').val(end.format('YYYY-MM-DD'));
            }
        );
        $(function () {
            $('#highcharts').highcharts({
                title: {
                    text: 'Fruit Consumption'
                },
                xAxis: {
                    categories: ['Apples', 'Bananas', 'Oranges']
                },
                yAxis: {
                    title: {
                        text: 'Fruit eaten'
                    }
                },
                series: [
                    {
                        name: 'Jane',
                        data: [1, 0, 4]
                    },
                    {
                        name: 'John',
                        data: [5, 7, 3]
                    }
                ]
            });
        });
    </script>
</section>
@endsection