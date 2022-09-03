<div class="sidebar" data-background-color="brown" data-active-color="danger">
    <!--
        Tip 1: you can change the color of the sidebar's background using: data-background-color="white | brown"
        Tip 2: you can change the color of the active button using the data-active-color="primary | info | success | warning | danger"
    -->
    <div class="logo">
        <a href="http://www.creative-tim.com" class="simple-text logo-mini">
            CT
        </a>

        <a href="http://www.creative-tim.com" class="simple-text logo-normal">
            Creative Tim
        </a>
    </div>
    <div class="sidebar-wrapper ps-container ps-theme-default ps-active-y" data-ps-id="eb4b5b4d-ab68-7aec-9ff9-c188dff57241">
        <div class="user">
            <div class="photo">
                <img src="../assets/img/faces/face-2.jpg">
            </div>
            <div class="info">
                <a data-toggle="collapse" href="#collapseExample" class="collapsed">
	                        <span>
								{{session()->get('name')}} - {{session()->get('id')}}
		                        <b class="caret"></b>
							</span>
                </a>
                <div class="clearfix"></div>

                <div class="collapse" id="collapseExample">
                    <ul class="nav">
                        <li>
                            <a href="{{route('students.show',session()->get('id'))}}">
                                <span class="sidebar-mini">Mp</span>
                                <span class="sidebar-normal">My Profile</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{route('logout')}}">
                                <span class="sidebar-mini">S</span>
                                <span class="sidebar-normal">Log out</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <ul class="nav">
            @if(session()->get('level') !== 0)
                <li>
                    <a data-toggle="collapse" href="#dashboardOverview" class="collapsed" aria-expanded="false">
                        <i class="ti-panel"></i>
                        <p>Dashboard
                            <b class="caret"></b>
                        </p>
                    </a>
                    <div class="collapse" id="dashboardOverview" aria-expanded="false" style="">
                        <ul class="nav">
                            <li>
                                <a href="#panda">
                                    <span class="sidebar-mini">C1</span>
                                    <span class="sidebar-normal">Collapse 1</span>
                                </a>
                            </li>
                            <li>
                                <a>
                                    <span class="sidebar-mini">C2</span>
                                    <span class="sidebar-normal">Collapse 2</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li>
                    <a data-toggle="collapse" href="#accountmanage" class="collapsed" aria-expanded="false">
                        <i class="ti-user"></i>
                        <p>Account Manage
                            <b class="caret"></b>
                        </p>
                        <div class="collapse" id="accountmanage" aria-expanded="false" style="">
                            <ul class="nav">
                                <li>
                                    <a href="{{route('admins.index')}}">
                                        <span class="sidebar-mini">A1</span>
                                        <span class="sidebar-normal">Admin Manage</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{route('managers.index')}}">
                                        <span class="sidebar-mini">A2</span>
                                        <span class="sidebar-normal">Manager Manage</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </a>
                </li>
                <li>
                    <a data-toggle="collapse" href="#degreemanage" class="collapsed" aria-expanded="false">
                        <i class="ti-agenda" ></i>
                        <p>Degree Manage
                            <b class="caret"></b>
                        </p>
                        <div class="collapse" id="degreemanage" aria-expanded="false" style="">
                            <ul class="nav">
                                <li>
                                    <a href="{{route('degrees.index')}}">
                                        <span class="sidebar-mini">D1</span>
                                        <span class="sidebar-normal">Degree Manage</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{route('degree_majors.index')}}">
                                        <span class="sidebar-mini">D2</span>
                                        <span class="sidebar-normal">Degree Major Manage</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </a>
                </li>
                <li>
                    <a data-toggle="collapse" href="#majormanage" class="collapsed" aria-expanded="false">
                        <i class="ti-agenda"></i>
                        <p>Major Manage
                            <b class="caret"></b>
                        </p>
                        <div class="collapse" id="majormanage" aria-expanded="false" style="">
                            <ul class="nav">
                                <li>
                                    <a href="{{route('majors.index')}}">
                                        <span class="sidebar-mini">M1</span>
                                        <span class="sidebar-normal">Major Manage</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{route('curriculums.index')}}">
                                        <span class="sidebar-mini">M2</span>
                                        <span class="sidebar-normal">Add New Curriculum Manage</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="{{route('subjects.index')}}" >
                        <i class="ti-view-list"></i>
                        <p>Subject Manage</p>
                    </a>
                </li>
                <li>
                    <a href="{{route('students.index')}}" >
                        <i class="ti-view-list"></i>
                        <p>Student Manage</p>
                    </a>
                </li>

                <li>
                    <a data-toggle="collapse" href="#groupmanage" class="collapsed" aria-expanded="false">
                        <i class="ti-view-list"></i>
                        <p>Group Manage
                            <b class="caret"></b>
                        </p>
                        <div class="collapse" id="groupmanage" aria-expanded="false" style="">
                            <ul class="nav">
                                <li>
                                    <a href="{{route('groups.index')}}">
                                        <span class="sidebar-mini">G1</span>
                                        <span class="sidebar-normal">Group Manage</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{route('student_groups.index')}}">
                                        <span class="sidebar-mini">G2</span>
                                        <span class="sidebar-normal">Add Student Groups</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </a>
                </li>

                <li>
                    <a data-toggle="collapse" href="#grademanage" class="collapsed" aria-expanded="false">
                        <i class="ti-view-list"></i>
                        <p>Grade Manage
                            <b class="caret"></b>
                        </p>
                        <div class="collapse" id="grademanage" aria-expanded="false" style="">
                            <ul class="nav">
                                <li>
                                    <a href="{{route('grades.index')}}">
                                        <span class="sidebar-mini">G1</span>
                                        <span class="sidebar-normal">Grade View</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{route('grades.import_Grade')}}">
                                        <span class="sidebar-mini">G2</span>
                                        <span class="sidebar-normal">Import Grade</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </a>
                </li>
            @else

                <li>
                    <a href="{{route('grades.student_grade', ['id' => session()->get('id')])}}" >
                        <i class="ti-view-list"></i>
                        <p>Mark Report</p>
                    </a>
                </li>
                <li>
                    <a href="{{route('students.index')}}" >
                        <i class="ti-view-list"></i>
                        <p>Academic Transcript</p>
                    </a>
                </li>
                <li>
                    <a href="{{route('students.index')}}" >
                        <i class="ti-view-list"></i>
                        <p>Curriculum</p>
                    </a>
                </li>

            @endif
        </ul>
        <div class="ps-scrollbar-x-rail" style="width: 260px; left: 0px; bottom: 3px;"><div class="ps-scrollbar-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps-scrollbar-y-rail" style="top: 0px; height: 186px; right: 3px;"><div class="ps-scrollbar-y" tabindex="0" style="top: 0px; height: 153px;"></div></div></div>
</div>
