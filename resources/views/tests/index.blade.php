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
            <li>量表查看</li>
            @foreach($scale as $value)<li class="active">{{ $value->title }}</li>
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
                        <div class="de-header">
                            <h4>汉密尔顿抑郁量表</h4>
                        </div>
                        <div class="tip"><h5>指 导 语： 请根据病人的实际表现选择相应的选项</h5></div>
                        {!! Form::open(['route'=>['permissions.update',$value->id],'method'=>'patch']) !!}
                            <div class="form-group">
                                {!! Form::label('title','1.抑郁情绪 :',['class'=>'control-label']) !!}
                                {!! Form::radio('1','0') !!}1.无
                                {!! Form::radio('1','1') !!}2.轻度
                                {!! Form::radio('1','2') !!}3.中度
                                {!! Form::radio('1','3') !!}4.重度
                                {!! Form::radio('1','4') !!}5.严重
                            </div>
                            <div class="form-group">
                                {!! Form::label('title','2.有罪感 :',['class'=>'control-label']) !!}
                                {!! Form::radio('2','0') !!}1.无
                                {!! Form::radio('2','1') !!}2.轻度
                                {!! Form::radio('2','2') !!}3.中度
                                {!! Form::radio('2','3') !!}4.重度
                                {!! Form::radio('2','4') !!}5.严重
                            </div>
                            <div class="form-group">
                                {!! Form::label('title','3. 自杀 :',['class'=>'control-label']) !!}
                                {!! Form::radio('3','0') !!}1.无
                                {!! Form::radio('3','1') !!}2.轻度
                                {!! Form::radio('3','2') !!}3.中度
                                {!! Form::radio('3','3') !!}4.重度
                                {!! Form::radio('3','4') !!}5.严重
                            </div>
                            <div class="form-group">
                                {!! Form::label('title','4. 入睡困难 :',['class'=>'control-label']) !!}
                                {!! Form::radio('4','0') !!}1.无
                                {!! Form::radio('4','1') !!}2.轻度
                                {!! Form::radio('4','2') !!}3.中度
                            </div>
                            <div class="form-group">
                                {!! Form::label('title','5. 睡眠不深 :',['class'=>'control-label']) !!}
                                {!! Form::radio('5','0') !!}1.无
                                {!! Form::radio('5','1') !!}2.轻度
                                {!! Form::radio('5','2') !!}3.中度
                            </div>
                            <div class="form-group">
                                {!! Form::label('title','6. 早醒 :',['class'=>'control-label']) !!}
                                {!! Form::radio('6','0') !!}1.无
                                {!! Form::radio('6','1') !!}2.轻度
                                {!! Form::radio('6','2') !!}3.中度
                            </div>
                            <div class="form-group">
                                {!! Form::label('title','7. 工作和兴趣 :',['class'=>'control-label']) !!}
                                {!! Form::radio('7','0') !!}1.无
                                {!! Form::radio('7','1') !!}2.轻度
                                {!! Form::radio('7','2') !!}3.中度
                                {!! Form::radio('7','3') !!}4.重度
                                {!! Form::radio('7','4') !!}5.严重
                            </div>
                            <div class="form-group">
                                {!! Form::label('title','8. 迟缓',['class'=>'control-label']) !!}
                                {!! Form::radio('8','0') !!}1.无
                                {!! Form::radio('8','1') !!}2.轻度
                                {!! Form::radio('8','2') !!}3.中度
                                {!! Form::radio('8','3') !!}4.重度
                                {!! Form::radio('8','4') !!}5.严重
                            </div>
                            <div class="form-group">
                                {!! Form::label('title','9. 激越',['class'=>'control-label']) !!}
                                {!! Form::radio('9','0') !!}1.无
                                {!! Form::radio('9','1') !!}2.轻度
                                {!! Form::radio('9','2') !!}3.中度
                                {!! Form::radio('9','3') !!}4.重度
                                {!! Form::radio('9','4') !!}5.严重
                            </div>
                            <div class="form-group">
                                {!! Form::label('title','10. 精神性焦虑',['class'=>'control-label']) !!}
                                {!! Form::radio('10','0') !!}1.无
                                {!! Form::radio('10','1') !!}2.轻度
                                {!! Form::radio('10','2') !!}3.中度
                                {!! Form::radio('10','3') !!}4.重度
                                {!! Form::radio('10','4') !!}5.严重
                            </div>
                            <div class="form-group">
                                {!! Form::label('title','11. 躯体性焦虑',['class'=>'control-label']) !!}
                                {!! Form::radio('11','0') !!}1.无
                                {!! Form::radio('11','1') !!}2.轻度
                                {!! Form::radio('11','2') !!}3.中度
                                {!! Form::radio('11','3') !!}4.重度
                                {!! Form::radio('11','4') !!}5.严重
                            </div>
                            <div class="form-group">
                                {!! Form::label('title','12. 胃肠道症状',['class'=>'control-label']) !!}
                                {!! Form::radio('12','0') !!}1.无
                                {!! Form::radio('12','1') !!}2.轻度
                                {!! Form::radio('12','2') !!}3.中度
                            </div>
                            <div class="form-group">
                                {!! Form::label('title','13. 全身症状',['class'=>'control-label']) !!}
                                {!! Form::radio('13','0') !!}1.无
                                {!! Form::radio('13','1') !!}2.轻度
                                {!! Form::radio('13','2') !!}3.中度
                            </div>
                            <div class="form-group">
                                {!! Form::label('title','14. 性症状',['class'=>'control-label']) !!}
                                {!! Form::radio('14','0') !!}1.无
                                {!! Form::radio('14','1') !!}2.轻度
                                {!! Form::radio('14','2') !!}3.中度
                            </div>
                            <div class="form-group">
                                {!! Form::label('title','15. 疑病',['class'=>'control-label']) !!}
                                {!! Form::radio('15','0') !!}1.无
                                {!! Form::radio('15','1') !!}2.轻度
                                {!! Form::radio('15','2') !!}3.中度
                                {!! Form::radio('15','3') !!}4.重度
                                {!! Form::radio('15','4') !!}5.严重
                            </div>
                            <div class="form-group">
                                {!! Form::label('title','16. 体重减轻',['class'=>'control-label']) !!}
                                {!! Form::radio('16','0') !!}1.无
                                {!! Form::radio('16','1') !!}2.轻度
                                {!! Form::radio('16','2') !!}3.中度
                            </div>
                            <div class="form-group">
                                {!! Form::label('title','17. 自知力',['class'=>'control-label']) !!}
                                {!! Form::radio('17','0') !!}1.无
                                {!! Form::radio('17','1') !!}2.轻度
                                {!! Form::radio('17','2') !!}3.中度
                                {!! Form::radio('17','3') !!}4.重度
                                {!! Form::radio('17','4') !!}5.严重
                            </div>
                            <div class="form-group">
                                {!! Form::label('title','18. 日夜变化 早',['class'=>'control-label']) !!}
                                {!! Form::radio('18','0') !!}1.无
                                {!! Form::radio('18','1') !!}2.轻度
                                {!! Form::radio('18','2') !!}3.中度
                            </div>
                            <div class="form-group">
                                {!! Form::label('title','19. 日夜变化 晚',['class'=>'control-label']) !!}
                                {!! Form::radio('19','0') !!}1.无
                                {!! Form::radio('19','1') !!}2.轻度
                                {!! Form::radio('19','2') !!}3.中度
                            </div>
                            <div class="form-group">
                                {!! Form::label('title','20. 人格或现实解体',['class'=>'control-label']) !!}
                                {!! Form::radio('20','0') !!}1.无
                                {!! Form::radio('20','1') !!}2.轻度
                                {!! Form::radio('20','2') !!}3.中度
                                {!! Form::radio('20','3') !!}4.重度
                                {!! Form::radio('20','4') !!}5.严重
                            </div>
                            <div class="form-group">
                                {!! Form::label('title','21. 偏执症状',['class'=>'control-label']) !!}
                                {!! Form::radio('21','0') !!}1.无
                                {!! Form::radio('21','1') !!}2.轻度
                                {!! Form::radio('21','2') !!}3.中度
                                {!! Form::radio('21','3') !!}4.重度
                                {!! Form::radio('21','4') !!}5.严重
                            </div>
                            <div class="form-group">
                                {!! Form::label('title','22. 强迫症状',['class'=>'control-label']) !!}
                                {!! Form::radio('22','0') !!}1.无
                                {!! Form::radio('22','1') !!}2.轻度
                                {!! Form::radio('22','2') !!}3.中度
                            </div>
                            <div class="form-group">
                                {!! Form::label('title','23. 能力减退感',['class'=>'control-label']) !!}
                                {!! Form::radio('23','0') !!}1.无
                                {!! Form::radio('23','1') !!}2.轻度
                                {!! Form::radio('23','2') !!}3.中度
                                {!! Form::radio('23','3') !!}4.重度
                                {!! Form::radio('23','4') !!}5.严重
                            </div>
                            <div class="form-group">
                                {!! Form::label('title','24. 绝望感',['class'=>'control-label']) !!}
                                {!! Form::radio('24','0') !!}1.无
                                {!! Form::radio('24','1') !!}2.轻度
                                {!! Form::radio('24','2') !!}3.中度
                                {!! Form::radio('24','3') !!}4.重度
                                {!! Form::radio('24','4') !!}5.严重
                            </div>
                            <div class="form-group">
                                {!! Form::label('title','25. 自卑感',['class'=>'control-label']) !!}
                                {!! Form::radio('25','0') !!}1.无
                                {!! Form::radio('25','1') !!}2.轻度
                                {!! Form::radio('25','2') !!}3.中度
                                {!! Form::radio('25','3') !!}4.重度
                                {!! Form::radio('25','4') !!}5.严重
                            </div>
                        {!! Form::submit('提交',['class'=>'btn btn-primary']) !!}
                        {!! Form::close() !!}
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
    @endforeach
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