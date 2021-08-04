<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <div class="sb-sidenav-menu-heading">Core</div>
                <!---- Product Navigate ---->
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#product" aria-expanded="false" aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon"><i class="fab fa-product-hunt"></i></div>
                    Product
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="product" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="{{ route("admin.product.index") }}">Danh Sách</a>
                        <a class="nav-link" href="{{ route("admin.product_category.index") }}">Danh Mục</a>
                        <a class="nav-link" href="{{ route("admin.product_tags.index") }}">Tags</a>
                    </nav>
                </div>

                <!---- Blog Navigate ---->
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#blog" aria-expanded="false" aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon"><i class="fab fa-product-hunt"></i></div>
                    Blog
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="blog" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="{{ route("admin.blog.index") }}">Danh Sách</a>
                        <a class="nav-link" href="{{ route("admin.blog_category.index") }}">Danh Mục</a>
{{--                        <a class="nav-link" href="{{ route("admin.blog_tags.index") }}">Tags</a>--}}
                    </nav>
                </div>

                <!---- Setting Navigate ---->
                <a class="nav-link collapsed" href="{{ route('admin.setting.index') }}"  aria-expanded="false" aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon"><i class="fas fa-cog"></i></div>
                    Setting
                </a>

                <!---- Setting Navigate ---->
                <a class="nav-link collapsed" href="{{ route('admin.bank.index') }}"  aria-expanded="false" aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon"><i class="fas fa-university"></i></div>
                    Bank
                </a>

                <!---- Coupon Navigate ---->
                <a class="nav-link collapsed" href="{{ route('admin.coupon.index') }}"  aria-expanded="false" aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon"><i class="fas fa-percentage"></i></div>
                    Coupon
                </a>

                <!---- Menu Navigate ---->
                <a class="nav-link collapsed" href="{{ route('admin.menu.index') }}"  aria-expanded="false" aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon"><i class="fas fa-bars"></i></div>
                    Menu
                </a>

                <!---- User Navigate ---->
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#users" aria-expanded="false" aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon"><i class="fas fa-user-secret"></i></div>
                    Users
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="users" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="{{ route("admin.user.index") }}">Danh sách User</a>
                        <a class="nav-link" href="{{ route("admin.role.index") }}">Danh sách Role</a>
                    </nav>
                </div>

                <!---- Widget Navigate ---->
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#widget" aria-expanded="false" aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon"><i class="fas fa-arrows-alt-h"></i></div>
                    Widget
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="widget" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="{{ route("admin.widget.index") }}">List Widget</a>
                        <a class="nav-link" href="{{ route("admin.partner.index") }}">Partners</a>
                        <a class="nav-link" href="{{ route("admin.banner.index") }}">Banners</a>
                    </nav>
                </div>

                <!---- Orders Navigate ---->
                <a class="nav-link collapsed" href="{{ route('admin.order.index') }}"  aria-expanded="false" aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon"><i class="fab fa-jedi-order"></i></div>
                    Orders
                </a>

                <!---- FAQ Navigate ---->
                <a class="nav-link collapsed" href="{{ route('admin.faq.index') }}"  aria-expanded="false" aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon"><i class="fas fa-question-circle"></i></div>
                    FAQ
                </a>

                <!---- FAQ Navigate ---->
                <a class="nav-link collapsed" href="{{ route('admin.contact.index') }}"  aria-expanded="false" aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon"><i class="fas fa-question-circle"></i></div>
                    Contact
                </a>

            </div>
        </div>
        <div class="sb-sidenav-footer">
            <div class="small">Logged in as:</div>
            @if(\Illuminate\Support\Facades\Auth::check())
                {{ \Illuminate\Support\Facades\Auth::user()->email }}
            @endif
        </div>
    </nav>
</div>
