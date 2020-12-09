<div class="app-sidebar sidebar-shadow">
    <div class="app-header__logo">
        <div class="logo-src"></div>
        <div class="header__pane ml-auto">
            <div>
                <button type="button" class="hamburger close-sidebar-btn hamburger--elastic"
                        data-class="closed-sidebar">
                                    <span class="hamburger-box">
                                        <span class="hamburger-inner"></span>
                                    </span>
                </button>
            </div>
        </div>
    </div>
    <div class="app-header__mobile-menu">
        <div>
            <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                                <span class="hamburger-box">
                                    <span class="hamburger-inner"></span>
                                </span>
            </button>
        </div>
    </div>
    <div class="app-header__menu">
                        <span>
                            <button type="button"
                                    class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                                <span class="btn-icon-wrapper">
                                    <i class="fa fa-ellipsis-v fa-w-6"></i>
                                </span>
                            </button>
                        </span>
    </div>
    <div class="scrollbar-sidebar">
        <div class="app-sidebar__inner">
            <ul class="vertical-nav-menu">
                <li class="app-sidebar__heading">ADMIN</li>
                <li>
                    <a href="{{route('dashboard')}}">
                        <i class="metismenu-icon pe-7s-albums"></i>
                        Dashboard
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="metismenu-icon pe-7s-user"></i>
                        Thành viên
                        <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                    </a>
                    <ul>
                        <li>
                            <a href="{{route('user-index')}}">
                                <i class="metismenu-icon"></i>
                                Danh sách
                            </a>
                        </li>
                        <li>
                            <a href="{{route('user-insertForm')}}">
                                <i class="metismenu-icon"></i>
                                Thêm mới
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#">
                        <i class="metismenu-icon pe-7s-disk"></i>
                        Danh mục
                        <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                    </a>
                    <ul>
                        <li>
                            <a href="{{route('cate-index')}}">
                                <i class="metismenu-icon"></i>
                                Danh sách
                            </a>
                        </li>
                        <li>
                            <a href="{{route('cate-insertForm')}}">
                                <i class="metismenu-icon"></i>
                                Thêm mới
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#">
                        <i class="metismenu-icon pe-7s-folder"></i>
                        Sản phẩm
                        <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                    </a>
                    <ul>
                        <li>
                            <a href="{{route('prod-index')}}">
                                <i class="metismenu-icon"></i>
                                Danh sách
                            </a>
                        </li>
                        <li>
                            <a href="{{route('prod-insertForm')}}">
                                <i class="metismenu-icon"></i>
                                Thêm mới
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#">
                        <i class="metismenu-icon pe-7s-cash"></i>
                        Hóa đơn
                        <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                    </a>
                    <ul>
                        <li>
                            <a href="{{route('invoice-index')}}">
                                <i class="metismenu-icon"></i>
                                Danh sách
                            </a>
                        </li>
                        <li>
                            <a href="{{route('invoice-insertForm')}}">
                                <i class="metismenu-icon"></i>
                                Thêm mới
                            </a>
                        </li>
                    </ul>
                </li>

            </ul>
        </div>
    </div>
</div>
