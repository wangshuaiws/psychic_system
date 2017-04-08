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
            <li>我的资料</li>
        </ul>
        <!-- /.breadcrumb -->
    </div>

    <!-- /section:basics/content.breadcrumbs -->
    <div class="page-content">
        <div class="page-content-area">
            <table class="row">
                <!--必须整体包含在这里-->
                <div class="center-block" style="border:2px solid #f5f5f5;width: 800px">
                  <div class="center-block" style="width:300px;">
                    <h4>用户名 : {{ $user->name }}</h4>
                    <h4>性别 : {{ $user->sex == 'man'? '男':'女' }}</h4>
                    <h4>生日 : {{ $user->birthday }}</h4>
                       <h4>邮箱 : {{ $user->email }}</h4>
                        <h4>所属角色 : {{ $user->permission == 0? '用户':'咨询师' }}</h4>
                         @role('user')<button type="button"><a href={{ url('/apply') }}>申请成为咨询师</a></button>
                         @endrole
                  </div>
                </div>
            </table>
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