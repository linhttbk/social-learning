<nav class="side-navbar">
    <!-- Sidebar Header-->
    <div class="sidebar-header d-flex align-items-center">
        <div class="avatar"><img src="{{asset('admin/img/avatar-1.jpg')}}" alt="..."
                                 class="img-fluid rounded-circle"></div>
        
    </div>
    <!-- Sidebar Navidation Menus--><span class="heading">Main</span>
    <ul class="list-unstyled">
        <li class="active"><a href="{{route('admin')}}">Trang chủ </a></li>
        <li><a href="{{route('admin-courses')}}">Quản lý khóa học</a></li>
        <li><a href="{{route('members')}}"> Quản lý người dùng </a></li>
        <li><a href="{{route('group-user')}}"> Quản lý nhóm  </a></li>
        <li><a href="{{route('document_management')}}"> Quản lý tài liệu</a></li>
        {{--<li><a href="#exampledropdownDropdown" aria-expanded="false" data-toggle="collapse"> <i--}}
                    {{--class="icon-interface-windows"></i>Example dropdown </a>--}}
            {{--<ul id="exampledropdownDropdown" class="collapse list-unstyled ">--}}
                {{--<li><a href="#">Page</a></li>--}}
                {{--<li><a href="#">Page</a></li>--}}
                {{--<li><a href="#">Page</a></li>--}}
            {{--</ul>--}}
        {{--</li>--}}
    </ul>

</nav>
