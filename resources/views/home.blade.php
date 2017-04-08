<!DOCTYPE html>
<html lang="en">

@include('common/_head')

        <!--侧边栏-->
@include('common/_left')
        <!-- /.nav-list -->

<!-- /section:basics/sidebar -->
<div class="main-content">
    <!-- #section:basics/content.breadcrumbs -->
    <div class="breadcrumbs" id="breadcrumbs">
        <script type="text/javascript">
            try {
                ace.settings.check('breadcrumbs', 'fixed')
            } catch (e) {}
        </script>

        <ul class="breadcrumb">
            <li>
                <i class="ace-icon fa fa-home home-icon"></i>
                <a href="{{ url('/home') }}">首页</a>
            </li>
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
                        @role('user')
                        <div class="col-xs-12 col-sm-6 widget-container-col ui-sortable">
                            <div class="widget-box ui-sortable-handle" style="min-height:250px">
                                <!-- #section:custom/widget-box.options -->
                                <div class="widget-header">
                                    <h5 class="widget-title bigger lighter">
                                        未完成量表
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
                                                    量表名称
                                                </th>
                                                <th class="hidden-480">操作</th>
                                                <th>状态</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php $i = 1; ?>
                                            @foreach($scales as $scale)
                                                @if($scale->is_remove ==0)
                                                    @if($scale->completed ==0)
                                            <tr>
                                                <td>{{ $i++ }}</td>
                                                <td>{{ $scale->name }}</td>
                                                <td>{{  $scale->title  }}</td>
                                                <td><a href="{{ route('permissions.show',['id' => $scale->id])}}">测试</a>
                                                    <a href="{{ url('/delete').'?'.'id'.'='.$scale->id }}">删除</a>
                                                </td>
                                                <td>未完成</td>
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

                        <div class="col-xs-12 col-sm-6 widget-container-col ui-sortable">
                            <div class="widget-box ui-sortable-handle" style="min-height:250px">
                                <!-- #section:custom/widget-box.options -->
                                <div class="widget-header">
                                    <h5 class="widget-title bigger lighter">
                                        已完成量表
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
                                                    量表名称
                                                </th>
                                                <th class="hidden-480">操作</th>
                                                <th>状态</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php $i = 1; ?>
                                            @foreach($scales as $scale)
                                                @if($scale->is_remove ==0)
                                                    @if($scale->completed ==1)
                                                    <tr>
                                                        <td>{{ $i++ }}</td>
                                                        <td>{{ $scale->name }}</td>
                                                        <td>{{  $scale->title  }}</td>
                                                        <td><a href="{{ url('/gaugecheck').'?'.'id'.'='.$scale->id}}">查看结果</a>
                                                            <a href="{{ url('/delete').'?'.'id'.'='.$scale->id }}">删除</a>
                                                        </td>
                                                        <td>已完成</td>
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
                        @endrole
                        <!-- /.span -->
                        @role('role_manage')
                        <div class="col-xs-12 col-sm-6 widget-container-col ui-sortable">
                            <div class="widget-box ui-sortable-handle" style="min-height:250px">
                                <!-- #section:custom/widget-box.options -->
                                <div class="widget-header">
                                    <h5 class="widget-title bigger lighter">
                                        待处理预约
                                    </h5>

                                </div>
                                <!-- /section:custom/widget-box.options -->
                                <div class="widget-body">
                                    <div class="widget-main no-padding">
                                        <table id="appointment" class="table table-striped table-bordered table-hover">
                                            <thead class="thin-border-bottom">
                                            <tr>
                                                <th>
                                                    序号
                                                </th>
                                                <th>
                                                    预约人
                                                </th>
                                                <th>
                                                    预约时间
                                                </th>
                                                <th class="hidden-480">预约状态</th>
                                                <th>操作</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php $i=1; ?>
                                            @foreach($orders as $order)
                                                <tr>
                                                    <td>{{ $i++ }}</td>
                                                    <td>{{ $order->user_name }}</td>
                                                    <td>{{ $order->date }}</td>
                                                    <td>未审核</td>
                                                    <td><a href="{{ url('/order').'?'.'id'.'='.$order->id }}">审核</a></td>
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
                                        已处理预约
                                    </h5>

                                </div>
                                <!-- /section:custom/widget-box.options -->
                                <div class="widget-body">
                                    <div class="widget-main no-padding">
                                        <table id="appointment" class="table table-striped table-bordered table-hover">
                                            <thead class="thin-border-bottom">
                                            <tr>
                                                <th>
                                                    序号
                                                </th>
                                                <th>
                                                    预约人
                                                </th>
                                                <th>
                                                    预约时间
                                                </th>
                                                <th class="hidden-480">预约状态</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php $i=1; ?>
                                            @foreach($Doneorder as $order)
                                                <tr>
                                                    <td>{{ $i++ }}</td>
                                                    <td>{{ $order->user_name }}</td>
                                                    <td>{{ $order->date }}</td>
                                                    <td>已审核</td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endrole
                        <!-- /.span -->
                    </div>
                    <!-- /.row -->
                    <div class="row">
                        @role('admin')
                        <div class="col-xs-12 col-sm-6 widget-container-col ui-sortable">
                            <div class="widget-box ui-sortable-handle" style="min-height:250px">
                                <!-- #section:custom/widget-box.options -->
                                <div class="widget-header">
                                    <h5 class="widget-title bigger lighter">
                                        待审核成员
                                    </h5>

                                </div>

                                <!-- /section:custom/widget-box.options -->
                                <div class="widget-body">
                                    <div class="widget-main no-padding">
                                        <table id="examine" class="table table-striped table-bordered table-hover">
                                            <thead class="thin-border-bottom">
                                            <tr>
                                                <th>
                                                    序号
                                                </th>

                                                <th>
                                                    登录名
                                                </th>
                                                <th>
                                                    性别
                                                </th>
                                                <th>状态</th>
                                                <th>
                                                    <i class="ace-icon fa fa-clock-o"></i> 申请时间
                                                </th>
                                                <th class="hidden-480">操作</th>
                                            </tr>
                                            </thead>
                                             <?php $i=1; ?>
                                            <tbody>
                                                @foreach($applies as $apply)
                                                    <td>{{ $i++ }}</td>
                                                    <td>{{ $apply->name }}</td>
                                                    <td>{{  $apply->sex == 'man'? '男':'女' }}</td>
                                                    <td>未审核</td>
                                                    <td>{{ $apply->updated_at }}</td>
                                                    <td><a href="{{ url('/deal').'?'.'id'.'='.$apply->user_id }}">审核</a></td>
                                                    @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endrole
                        <!-- /.span -->
                        @role('user')
                        <div class="col-xs-12 col-sm-6 widget-container-col ui-sortable">
                            <div class="widget-box ui-sortable-handle" style="min-height:250px">
                                <!-- #section:custom/widget-box.options -->
                                <div class="widget-header">
                                    <h5 class="widget-title bigger lighter">
                                        问卷调查
                                    </h5>

                                </div>
                                <!-- /section:custom/widget-box.options -->
                                <div class="widget-body">
                                    <div class="widget-main no-padding">
                                        <table id="questionnaire" class="table table-striped table-bordered table-hover">
                                            <thead class="thin-border-bottom">
                                            <tr>
                                                <th>
                                                    序号
                                                </th>

                                                <th>
                                                    问卷标题
                                                </th>
                                                <th>
                                                    <i class="ace-icon fa fa-clock-o"></i> 分配时间
                                                </th>
                                                <th class="hidden-480">操作</th>
                                            </tr>
                                            </thead>

                                            <tbody>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endrole
                        <!-- /.span -->
                    </div>
                    <!-- /.row -->
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
<script src="../assets/js2/jquery.dataTables.min.js"></script>
<script src="../assets/js2/jquery.dataTables.bootstrap.js"></script>
<!--<script>
    $(document).ready(function () {
        $('#warning,#appointment,#examine,#questionnaire').dataTable({
            "bSort": false,
            "oLanguage": {
                "sInfoEmpty": "没有数据",
                "sZeroRecords": "没有检索到数据"
            },
            "bProcessing": true,
            "searching": false,
            "bLengthChange": false,
            "bAutoWidth": true,
            "bPaginate": false,
            "bInfo": false,
            "scrollY": "200px",
            "sScrollX": "100%",
            "sScrollXInner": "100%",
            "sAjaxSource": 'homedata.json'
        });
        $($(".light-blue")[1]).on("click",function(){
            window.location="index.html";
        });
    });
</script>
-->
<!-- ace scripts -->
<script src="../assets/js2/ace-elements.min.js"></script>
<script src="../assets/js2/ace.min.js"></script>

</html>