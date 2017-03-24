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
                    <li class="active">心理测验</li>
                    <li class="active">量表分配</li>
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
                                    <div class="container-fluid">
                                        <div class="row">
                                            @foreach($roles as $role)
                                            {!! Form::open(['method' => 'get','route' => ['permissions.edit',$role->name]]) !!}
                                            @endforeach
                                            <div class="col-md-7 scroll widget-box ui-sortable-handle" style="min-height:250px">
                                                <div class="widget-header">
                                                    <h5 class="widget-title bigger lighter">
													选择成员
												</h5>
                                                </div>
                                                <table class="table table-striped table-bordered table-hover">
                                                    <thead>
                                                        <tr>
                                                            <th>序号</th>
                                                            <th>登录名</th>
                                                            <th>email</th>
                                                            <th>角色名称</th>
                                                            <th>选择</th>
                                                        </tr>
                                                    <tbody>
                                                    <?php $i = 1; ?>
                                                    @foreach($users as $user)
                                                        <tr>
                                                            <td>{{ $i++ }}</td>
                                                            <td>{{ $user->name }}</td>
                                                            <td>{{ $user->email }}</td>
                                                            <td>用户</td>
                                                            <td>{!! Form::checkbox($user->id, $user->email) !!}<br></td>
                                                        </tr>
                                                    @endforeach
                                                    </tbody>
                                                    </thead>
                                                </table>
                                            </div>
                                            <div class="col-md-4 scroll widget-box ui-sortable-handle" style="min-height:250px;margin-left:8.333%">
                                                <div class="widget-header">
                                                    <h5 class="widget-title bigger lighter">
													量表选择
												</h5>
                                                </div>
                                                {!! Form::checkbox('depressed', '汉密尔顿抑郁量表') !!}汉密尔顿抑郁量表
                                                <br>
                                                {!! Form::checkbox('anxious', '汉密尔顿焦虑量表') !!}汉密尔顿焦虑量表
                                                <br>
                                                {!! Form::checkbox('symptom', '症状自评量表(SCL-90)') !!}症状自评量表(SCL-90)
                                                <br>
                                            </div>
                                            <div class="col-md-12 foot text-center">
                                                {!! Form::submit('分配',['class'=>"btn btn-sm btn-info"]) !!}
                                            </div>
                                            {!! Form::close() !!}
                                        </div>
                                        <!--<div class="row">
                                            <div class="col-md-12 widget-box ui-sortable-handle" style="min-height:250px">
                                                <div class="widget-header">
                                                    <h5 class="widget-title bigger lighter">
													<i class="glyphicon glyphicon-cog"></i>参数设置
												</h5>
                                                </div>
                                                <form id="setting">
                                                <div class="container text-center">
                                                    <div class="row">
                                                        <div class="col-md-2">
                                                            测试类型
                                                        </div>
                                                        <div class="col-md-8">
                                                            <input type="radio" name="testType" checked="checked">日常测试
                                                            <input type="radio" name="testType">普测
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-2">
                                                            重测
                                                        </div>
                                                        <div class="col-md-8">
                                                            <input type="radio" name="reTest" checked="checked">不可重测
                                                            <input type="radio" name="reTest">可重测
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-2">
                                                            是否发送通知
                                                        </div>
                                                        <div class="col-md-8">
                                                            <input type="radio" name="info" checked="checked">否
                                                            <input type="radio" name="info">是
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-2">
                                                            是否可查看报告
                                                        </div>
                                                        <div class="col-md-8">
                                                            <input type="radio" name="check" checked="checked">否
                                                            <input type="radio" name="check">是
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-2">
                                                            是否设置作答时间
                                                        </div>
                                                        <div class="col-md-8">
                                                            <input type="radio" name="time" checked="checked">否
                                                            <input type="radio" name="time">是
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12 foot text-center">
                                                    <botton id="destribute" class="btn btn-info">分配</botton>
                                                </div>
                                                </form>
                                            </div>
                                        </div>-->
                                        <div class="row">
                                            <div class="col-md-12 widget-box ui-sortable-handle" style="min-height:250px">
                                                <div class="widget-header">
                                                    <h5 class="widget-title bigger lighter">
													分配记录
												</h5>
                                                </div>
                                                <table class="table table-striped table-bordered table-hover">
                                                    <thead>
                                                        <tr>
                                                            <th>序号</th>
                                                            <th>量表名称</th>
                                                            <th>登录名</th>
                                                            <th>姓名</th>
                                                            <th>分配时间</th>
                                                            <th>作答状态</th>
                                                            <th>操作</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($scales as $scale)
                                                    <tr>
                                                            <td>{{ $scale->id }}</td>
                                                            <td>{{ $scale->title }}</td>
                                                            <td>{{ $scale->name }}</td>
                                                            <td>{{ $scale->name }}</td>
                                                            <td>{{ $scale->updated_at }}</td>
                                                            <td>{{ $scale->completed == 1? '已完成':'未完成' }}</td>
                                                            <td><a href="">查看</a></td>
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

            <!-- ace scripts -->
            <script src="../assets/js2/ace-elements.min.js"></script>
            <script src="../assets/js2/ace.min.js"></script>
            <script>
                $(function(){
                    $($(".light-blue")[1]).on("click",function(){
                        window.location="index.html";
                    }); 
                });
            </script>

</html>