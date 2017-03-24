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
                    <li>预约咨询</li>
                    <li class="active">我的预约</li>
                    <!--	<li class="active">Dashboard</li>-->
                </ul>
                <!-- /.breadcrumb -->
            </div>

            <!-- /section:basics/content.breadcrumbs -->
            <div class="page-content">
                <div class="page-content-area">
                    <div class="row">
                        <!--必须整体包含在这里-->
                        <div class="col-md-12">
                            <div class="row">
                                <!--正文-->
                                <div class="col-md-12">
                                    {!! Form::open(['route'=>['permissions.create'],'class'=>'form-horizontal','method'=>'get']) !!}
                                        <div class="form-group">
                                            {!! Form::label('date','预约日期',['class'=>'col-md-3 control-label'] )!!}
                                            <div class="col-md-2">
                                                <div class="input-group date" id="dateSelect">
                                                    {!! Form::text('dateSelect',null,['class'=>'form-control']) !!}
                                                    <span class="input-group-addon">
                                                            <span class="glyphicon glyphicon-calendar"></span>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            {!! Form::label('namelist','咨询师',['class'=>'col-md-3 control-label'] )!!}
                                            <div class="col-md-2">
                                                {!! Form::select('namelist',$role_manage) !!}
                                            </div>

                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-8 text-center">
                                                <input type="submit" value="预约" class="btn btn-info">
                                            </div>
                                        </div>
                                    {!! Form::close() !!}

                                </div>
                                <div class="col-xs-12 col-sm-6 widget-container-col ui-sortable">
                                    <div class="widget-box ui-sortable-handle" style="min-height:250px">
                                        <!-- #section:custom/widget-box.options -->
                                        <div class="widget-header">
                                            <h5 class="widget-title bigger lighter">
                                                未通过审核的预约
                                            </h5>
                                        </div>

                                        <!-- /section:custom/widget-box.options -->
                                        <div class="widget-body">
                                            <div class="widget-main no-padding">
                                                <table id="warning" class="table table-striped table-bordered table-hover">
                                                    <thead class="thin-border-bottom">
                                                    <tr>
                                                        <th>
                                                            序号
                                                        </th>
                                                        <th>
                                                            登录名
                                                        </th>
                                                        <th>
                                                           咨询师名
                                                        </th>
                                                        <th>预约日期</th>
                                                        <th class="hidden-480">状态</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php $i=1; ?>
                                                    @foreach($noorder as $value)
                                                    <tr>
                                                        <td>{{ $i++ }}</td>
                                                        <td>{{ $value->user_name }}</td>
                                                        <td>{{ $value->order_name }}</td>
                                                        <td>{{ $value->date }}</td>
                                                        <td>未审核</td>
                                                    </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-6 widget-container-col ui-sortable">
                                    <div class="widget-box ui-sortable-handle" style="min-height:250px">
                                        <!-- #section:custom/widget-box.options -->
                                        <div class="widget-header">
                                            <h5 class="widget-title bigger lighter">
                                               通过审核的预约
                                            </h5>
                                        </div>

                                        <!-- /section:custom/widget-box.options -->
                                        <div class="widget-body">
                                            <div class="widget-main no-padding">
                                                <table id="warning" class="table table-striped table-bordered table-hover">
                                                    <thead class="thin-border-bottom">
                                                    <tr>
                                                        <th>
                                                            序号
                                                        </th>
                                                        <th>
                                                            登录名
                                                        </th>
                                                        <th>
                                                            咨询师名
                                                        </th>
                                                        <th>预约日期</th>
                                                        <th class="hidden-480">状态</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php $i=1; ?>
                                                    @foreach($yesorder as $value)
                                                        <tr>
                                                            <td>{{ $i++ }}</td>
                                                            <td>{{ $value->user_name }}</td>
                                                            <td>{{ $value->order_name }}</td>
                                                            <td>{{ $value->date }}</td>
                                                            <td>已审核</td>
                                                        </tr>
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
            <script src="../assets/js2/date-time/bootstrap-datepicker.min.js"></script>
            <script src="../assets/js2/date-time/locales/bootstrap-datepicker.zh-CN.js"></script>
            <script src="../assets/js2/bootstrapValidator.min.js"></script>
            <script>
                $(function () {
                    var $dateSelect = $("#dateSelect");
                    if ($dateSelect.type !== 'date') { //if browser doesn't support "date" input
                        $dateSelect.datepicker({
                            autoclose: true,
                            todayHighlight: true,
                            language: 'zh-CN',
                            startDate: new Date()
                        });
                    }
                    $('#date').bootstrapValidator({
                        fields: {
                            dateSelect: {
                                validators: {
                                    notEmpty: {
                                        message: '日期不能为空'
                                    }
                                }
                            }
                        }
                    });
                    $dateSelect.on('hide', function (e) {
                        $('#date').data('bootstrapValidator').updateStatus('dateSelect', 'NOT_VALIDATED', null).validateField('dateSelect');
                    });

                    $($(".light-blue")[1]).on("click",function(){
                        window.location="index.html";
                    }); 
                });
            </script>

            <!-- ace scripts -->
            <script src="../assets/js2/ace-elements.min.js"></script>
            <script src="../assets/js2/ace.min.js"></script>

</html>