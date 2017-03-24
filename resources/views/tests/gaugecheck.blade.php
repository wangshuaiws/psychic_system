<!DOCTYPE html>
<html lang="zh-CN">

@include('common/_head')
        <!--侧边栏-->
@include('common/_left')
        <!-- /.nav-list -->

        <!-- 主体 -->
        <div class="main-content">
            <!-- #section:basics/content.breadcrumbs -->
            <div class="breadcrumbs" id="breadcrumbs">
                <script type="text/javascript">
                    try {
                        ace.settings.check('breadcrumbs', 'fixed')
                    } catch (e) {}
                </script>
                <!--路径导航-->
                <ul class="breadcrumb">
                    <li>
                        <i class="ace-icon fa fa-home home-icon"></i>
                        <a href="{{ url('/home') }}">首页</a>
                    </li>
                    <li class="active">查看测试结果</li>
                    <!--	<li class="active">Dashboard</li>-->
                </ul>
                <!-- /.breadcrumb -->
            </div>

            <!-- /section:basics/content.breadcrumbs -->
            <div class="page-content">
                <div class="page-content-area">
                    <div class="row">
                        <!--必须整体包含在这里-->
                        <div class="col-xs-12">
                            <div class="row">
                                <!--正文-->
                                <div class="col-sm-12">
                                    <div class="tabbable">
                                        <h5>已作答记录</h5>
                                        <div class="tab-content">
                                            <div class="tab-pane in active" id="answered">
                                                <table class="table table-striped table-bordered table-hover" id="answered">
                                                    <thead>
                                                        <tr>
                                                            <th>序号</th>
                                                            <th>登录名</th>
                                                            <th>量表名</th>
                                                            <th>完成时间</th>
                                                            <th>结果</th>
                                                        </tr>
                                                    </thead>
                                                        <tbody>
                                                        <?php $i = 1; ?>
                                                        @foreach($scales as $scale)
                                                            @if($scale->completed == 1)
                                                            @if($scale->is_remove == 0)
                                                                <tr>
                                                                    <td>{{ $i++ }}</td>
                                                                    <td>{{ $scale->name }}</td>
                                                                    <td>{{  $scale->title  }}</td>
                                                                    <td>{{ $scale->updated_at }}</td>
                                                                    <td>{{ $scale->total }}</td>
                                                                </tr>
                                                            @endif
                                                            @endif
                                                        @endforeach
                                                        </tbody>
                                                </table>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <!--/.row-->

                        </div>
                        <!-- /.page-content-area -->
                    </div>
                    <!-- /.page-content -->
                </div>
                <div style="width: 30%">
                <canvas id="lineChart" width="500" height="300"></canvas>
                    </div>
                <!-- /.main-content -->
                @include('common/_footer')


                <a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
                    <i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
                </a>
            </div>
            <!-- /.main-container -->

            <!-- basic scripts -->

            <!--[if !IE]> -->
            <script type="text/javascript">
                window.jQuery || document.write("<script src='../assets/js2/jquery.min.js'>" + "<" + "/script>");
            </script>

            <!-- <![endif]-->

            <!--[if IE]>
<script type="text/javascript">
 window.jQuery || document.write("<script src='../assets/js2/jquery1x.min.js'>"+"<"+"/script>");
</script>
<![endif]-->
            <script type="text/javascript">
                if ('ontouchstart' in document.documentElement) document.write("<script src='../assets/js2/jquery.mobile.custom.min.js'>" + "<" + "/script>");
            </script>
            <script src="../assets/js2/bootstrap.min.js"></script>

            <script src="{{ asset('Chart.min.js') }}"></script>
            <script>
                $(document).ready(function () {
                    var ctxline = $('#lineChart');
                    var data = {
                        labels: ["焦虑化", "体重", "认知障碍", "日夜变化", "迟缓", "睡眠障碍", "绝望感"],
                        datasets: [
                            {
                                label: "测试结果",
                                fill: false,
                                lineTension: 0.1,
                                backgroundColor: "rgba(75,192,192,0.2)",
                                borderColor: "rgba(75,192,192,1)",
                                borderCapStyle: 'butt',
                                borderDash: [],
                                borderDashOffset: 0.0,
                                borderJoinStyle: 'miter',
                                pointBorderColor: "rgba(75,192,192,1)",
                                pointBackgroundColor: "#fff",
                                pointBorderWidth: 1,
                                pointHoverRadius: 5,
                                pointHoverBackgroundColor: "rgba(75,192,192,1)",
                                pointHoverBorderColor: "rgba(220,220,220,1)",
                                pointHoverBorderWidth: 2,
                                pointRadius: 1,
                                pointHitRadius: 10,
                                data: [{{ $a }},{{ $b }},{{ $c }},{{ $d }},{{ $e }},{{ $f }},{{ $g }}],
                                spanGaps: false,
                            },
                            {
                                label: "标准线",
                                fill: false,
                                lineTension: 0.1,
                                backgroundColor: "rgba(112,128,144,0.2)",
                                borderColor: "rgba(112,128,144,1)",
                                borderCapStyle: 'butt',
                                borderDash: [],
                                borderDashOffset: 0.0,
                                borderJoinStyle: 'miter',
                                pointBorderColor: "rgba(112,128,144,1)",
                                pointBackgroundColor: "#fff",
                                pointBorderWidth: 1,
                                pointHoverRadius: 5,
                                pointHoverBackgroundColor: "rgba(112,128,144,1)",
                                pointHoverBorderColor: "rgba(112,128,144,1)",
                                pointHoverBorderWidth: 2,
                                pointRadius: 1,
                                pointHitRadius: 10,
                                data: [5,0,6,0,2,1,2],
                                spanGaps: false,
                            },
                        ]

                    };

                    var lineChart = new Chart(ctxline, {
                        type: 'line',
                        data: data
                    });
                })
            </script>


            <!-- page specific plugin scripts -->

            <!--[if lte IE 8]>
		  <script src="../assets/js2/excanvas.min.js"></script>
		<![endif]-->
            <script src="../assets/js2/jquery-ui.custom.min.js"></script>
            <script src="../assets/js2/jquery.ui.touch-punch.min.js"></script>
            <script src="../assets/js2/jquery.easypiechart.min.js"></script>
            <script src="../assets/js2/jquery.sparkline.min.js"></script>
            <script src="../assets/js2/flot/jquery.flot.min.js"></script>
            <script src="../assets/js2/flot/jquery.flot.pie.min.js"></script>
            <script src="../assets/js2/flot/jquery.flot.resize.min.js"></script>

            <!-- ace scripts -->
            <script src="../assets/js2/ace-elements.min.js"></script>
            <script src="../assets/js2/ace.min.js"></script>
            <!--<script>
                $(function(){
                    $($(".light-blue")[1]).on("click",function(){
                        window.location="index.html";
                    }); 
                });
            </script>-->

</html>