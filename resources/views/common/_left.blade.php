<!-- 侧边栏 -->
<ul class="nav nav-list">
    @role('admin')
    <li class="">
        <a href="#" class="dropdown-toggle">
            <i class="menu-icon fa fa-cogs"></i>
            <span class="menu-text">基础设置</span>

            <b class="arrow fa fa-angle-down"></b>
        </a>
        <b class="arrow"></b>
        <ul class="submenu">
            <li class="">
                <a href="{{ url('/settings') }}">
                    <i class="menu-icon fa fa-caret-right"></i> 系统设置
                </a>

                <b class="arrow"></b>
            </li>
            <li class="">
                <a href="{{ url('/databackup') }}">
                    <i class="menu-icon fa fa-caret-right"></i> 数据备份
                </a>

                <b class="arrow"></b>
            </li>
            <li class="">
                <a href="{{ url('/roles') }}">
                    <i class="menu-icon fa fa-caret-right"></i> 角色管理
                </a>

                <b class="arrow"></b>
            </li>
            <li class="">
                <a href="{{ url('/membermanage') }}">
                    <i class="menu-icon fa fa-caret-right"></i> 成员管理
                </a>

                <b class="arrow"></b>
            </li>
        </ul>
    </li>
    @endrole
    <li class="">
        <a href="#" class="dropdown-toggle">
            <i class="menu-icon fa fa-pencil-square-o"></i>
            <span class="menu-text"> 心理测验</span>

            <b class="arrow fa fa-angle-down"></b>
        </a>

        <b class="arrow"></b>

        <ul class="submenu">
            @permission('psychological_test')
            <li class="">
                <a href="{{ url('/gaugemanage') }}">
                    <i class="menu-icon fa fa-caret-right"></i> 量表管理
                </a>

                <b class="arrow"></b>
            </li>

            <li class="">
                <a href="{{ url('/gaugeallot') }}">
                    <i class="menu-icon fa fa-caret-right"></i> 量表分配
                </a>

                <b class="arrow"></b>
            </li>

            <li class="">
                <a href="{{ url('/gaugeinput') }}">
                    <i class="menu-icon fa fa-caret-right"></i> 测试结果录入
                </a>

                <b class="arrow"></b>
            </li>
            @endpermission
            <li class="">
                <a href="{{ url('/home') }}">

                    <i class="menu-icon fa fa-caret-right"></i> @role('user')查看测试结果@endrole
                    @permission('psychological_test') 我的审核 @endpermission
                </a>

                <b class="arrow"></b>
            </li>
        </ul>
    </li>

    <li class="">
        <a href="#" class="dropdown-toggle">
            <i class="menu-icon fa fa-warning"></i>
            <span class="menu-text">危机预警 </span>

            <b class="arrow fa fa-angle-down"></b>
        </a>

        <b class="arrow"></b>

        <ul class="submenu">
            <li class="">
                <a href="{{ url('/warnsee') }}">
                    <i class="menu-icon fa fa-caret-right"></i> 查看预警
                </a>

                <b class="arrow"></b>
            </li>
            @permission('crisis_warning')
            <li class="">
                <a href="{{ url('/warnsetting') }}">
                    <i class="menu-icon fa fa-caret-right"></i> 预警设置
                </a>

                <b class="arrow"></b>
            </li>
            @endpermission
        </ul>
    </li>

    <li class="">
        <a href="#" class="dropdown-toggle">
            <i class="menu-icon fa fa-file-text-o"></i>
            <span class="menu-text">问卷调查 </span>

            <b class="arrow fa fa-angle-down"></b>
        </a>

        <b class="arrow"></b>

        <ul class="submenu">
            @permission('questionnaire_survey')
            <li class="">
                <a href="{{ url('/questmanage') }}">
                    <i class="menu-icon fa fa-caret-right"></i> 问卷管理
                </a>

                <b class="arrow"></b>
            </li>

            <li class="">
                <a href="{{ url('/questallot') }}">
                    <i class="menu-icon fa fa-caret-right"></i> 问卷分配
                </a>

                <b class="arrow"></b>
            </li>
            @endpermission
            <li class="">
                <a href="{{ url('/questresult') }}">
                    <i class="menu-icon fa fa-caret-right"></i> 调查结果
                </a>

                <b class="arrow"></b>
            </li>
        </ul>
    </li>
    <li class="">
        <a href="#" class="dropdown-toggle">
            <i class="menu-icon fa fa-comments"></i>
            <span class="menu-text">预约咨询</span>

            <b class="arrow fa fa-angle-down"></b>
        </a>

        <b class="arrow"></b>

        <ul class="submenu">
            @permission('Reservation_consultation')
            <li class="">
                <a href="{{ url('/appointsetting') }}">
                    <i class="menu-icon fa fa-caret-right"></i> 参数设置
                </a>

                <b class="arrow"></b>
            </li>

            <li class="">
                <a href="{{ url('/appointmanage') }}">
                    <i class="menu-icon fa fa-caret-right"></i> 预约管理
                </a>

                <b class="arrow"></b>
            </li>

            <li class="">
                <a href="{{ url('/appointcoach') }}">
                    <i class="menu-icon fa fa-caret-right"></i> 个案辅导
                </a>

                <b class="arrow"></b>
            </li>
            @endpermission
            @role('user')
            <li class="">
                <a href="{{ url('/appointmy') }}">
                    <i class="menu-icon fa fa-caret-right"></i> 我的预约
                </a>

                <b class="arrow"></b>
            </li>
            @endrole
        </ul>
    </li>
    @role('admin')
    <li class="">
        <a href="#" class="dropdown-toggle">
            <i class="menu-icon fa fa-book"></i>
            <span class="menu-text">档案管理 </span>

            <b class="arrow fa fa-angle-down"></b>
        </a>

        <b class="arrow"></b>

        <ul class="submenu">
            <li class="">
                <a href="{{ url('/archivestest') }}">
                    <i class="menu-icon fa fa-caret-right"></i> 测评档案
                </a>

                <b class="arrow"></b>
            </li>

            <li class="">
                <a href="{{ url('/archivespersonal') }}">
                    <i class="menu-icon fa fa-caret-right"></i> 个案档案
                </a>

                <b class="arrow"></b>
            </li>

            <li class="">
                <a href="{{ url('/archivesquest') }}">
                    <i class="menu-icon fa fa-caret-right"></i> 问卷档案
                </a>

                <b class="arrow"></b>
            </li>

            <li class="">
                <a href="{{ url('/archivesall') }}">
                    <i class="menu-icon fa fa-caret-right"></i> 综合档案
                </a>

                <b class="arrow"></b>
            </li>
        </ul>
    </li>
    @endrole

    <li class="">
        <a href="{{ url('/recycle') }}">
            <i class="menu-icon fa fa-trash-o"></i>
            <span class="menu-text">回收站</span>
        </a>

        <b class="arrow"></b>
    </li>
</ul>

<!-- #section:basics/sidebar.layout.minimize -->
<div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
    <i class="ace-icon fa fa-angle-double-left" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
</div>

<!-- /section:basics/sidebar.layout.minimize -->
<script type="text/javascript">
    try {
        ace.settings.check('sidebar', 'collapsed')
    } catch (e) {}
</script>
</div>