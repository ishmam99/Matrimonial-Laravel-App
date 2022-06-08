{{-- @can('contact_message.access')
    <li class="menu-item {{ request()->is('dashboard/contact-message*') ? 'menu-item-active' : null }}" aria-haspopup="true">
        <a href="{{ route('contact-message.index') }}" class="menu-link">
            <span class="svg-icon menu-icon">
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                        <rect x="0" y="0" width="24" height="24" />
                        <path
                            d="M16,15.6315789 L16,12 C16,10.3431458 14.6568542,9 13,9 L6.16183229,9 L6.16183229,5.52631579 C6.16183229,4.13107011 7.29290239,3 8.68814808,3 L20.4776218,3 C21.8728674,3 23.0039375,4.13107011 23.0039375,5.52631579 L23.0039375,13.1052632 L23.0206157,17.786793 C23.0215995,18.0629336 22.7985408,18.2875874 22.5224001,18.2885711 C22.3891754,18.2890457 22.2612702,18.2363324 22.1670655,18.1421277 L19.6565168,15.6315789 L16,15.6315789 Z"
                            fill="#000000" />
                        <path
                            d="M1.98505595,18 L1.98505595,13 C1.98505595,11.8954305 2.88048645,11 3.98505595,11 L11.9850559,11 C13.0896254,11 13.9850559,11.8954305 13.9850559,13 L13.9850559,18 C13.9850559,19.1045695 13.0896254,20 11.9850559,20 L4.10078614,20 L2.85693427,21.1905292 C2.65744295,21.3814685 2.34093638,21.3745358 2.14999706,21.1750444 C2.06092565,21.0819836 2.01120804,20.958136 2.01120804,20.8293182 L2.01120804,18.32426 C1.99400175,18.2187196 1.98505595,18.1104045 1.98505595,18 Z M6.5,14 C6.22385763,14 6,14.2238576 6,14.5 C6,14.7761424 6.22385763,15 6.5,15 L11.5,15 C11.7761424,15 12,14.7761424 12,14.5 C12,14.2238576 11.7761424,14 11.5,14 L6.5,14 Z M9.5,16 C9.22385763,16 9,16.2238576 9,16.5 C9,16.7761424 9.22385763,17 9.5,17 L11.5,17 C11.7761424,17 12,16.7761424 12,16.5 C12,16.2238576 11.7761424,16 11.5,16 L9.5,16 Z"
                            fill="#000000" opacity="0.3" />
                    </g>
                </svg>
            </span>
            <span class="menu-text">Contact Messages</span>
        </a>
    </li>
@endcan --}}

{{-- @can('notice.access')
    <li class="menu-item {{ request()->is('dashboard/notice*') ? 'menu-item-active menu-item-open' : null }}" aria-haspopup="true" data-menu-toggle="hover">
        <a href="javascript:" class="menu-link menu-toggle">
            <div class="svg-icon menu-icon">
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                        <rect x="0" y="0" width="24" height="24" />
                        <path
                            d="M13.2070325,4 C13.0721672,4.47683179 13,4.97998812 13,5.5 C13,8.53756612 15.4624339,11 18.5,11 C19.0200119,11 19.5231682,10.9278328 20,10.7929675 L20,17 C20,18.6568542 18.6568542,20 17,20 L7,20 C5.34314575,20 4,18.6568542 4,17 L4,7 C4,5.34314575 5.34314575,4 7,4 L13.2070325,4 Z"
                            fill="#000000" />
                        <circle fill="#000000" opacity="0.3" cx="18.5" cy="5.5" r="2.5" />
                    </g>
                </svg>
            </div>
            <span class="menu-text">Notices</span>
            <i class="menu-arrow"></i>
        </a>
        <div class="menu-submenu">
            <i class="menu-arrow"></i>
            <ul class="menu-subnav">
                <li class="menu-item menu-item-parent" aria-haspopup="true">
                    <span class="menu-link"><span class="menu-text">Notices</span></span>
                </li>

                <li class="menu-item {{ request()->is('dashboard/notice/create') ? 'menu-item-active' : null }}" aria-haspopup="true">
                    <a href="{{ route('notice.create') }}" class="menu-link">
                        <i class="menu-bullet menu-bullet-line">
                            <span></span>
                        </i>
                        <span class="menu-text">Add Notice</span>
                    </a>
                </li>

                <li class="menu-item {{ request()->is('dashboard/notice') ? 'menu-item-active' : null }}" aria-haspopup="true">
                    <a href="{{ route('notice.index') }}" class="menu-link">
                        <i class="menu-bullet menu-bullet-line">
                            <span></span>
                        </i>
                        <span class="menu-text">All Notice</span>
                    </a>
                </li>
            </ul>
        </div>
    </li>
@endcan --}}

<li class="menu-item {{ request()->is('dashboard/user*') ? 'menu-item-active menu-item-open' : null }}"
    aria-haspopup="true" data-menu-toggle="hover">
    <a href="javascript:" class="menu-link menu-toggle">
        <div class="svg-icon menu-icon">
            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                height="24px" viewBox="0 0 24 24" version="1.1">
                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                    <rect x="0" y="0" width="24" height="24" />
                    <path
                        d="M12,11 C9.790861,11 8,9.209139 8,7 C8,4.790861 9.790861,3 12,3 C14.209139,3 16,4.790861 16,7 C16,9.209139 14.209139,11 12,11 Z"
                        fill="#000000" fill-rule="nonzero" opacity="0.3" />
                    <path
                        d="M3.00065168,20.1992055 C3.38825852,15.4265159 7.26191235,13 11.9833413,13 C16.7712164,13 20.7048837,15.2931929 20.9979143,20.2 C21.0095879,20.3954741 20.9979143,21 20.2466999,21 C16.541124,21 11.0347247,21 3.72750223,21 C3.47671215,21 2.97953825,20.45918 3.00065168,20.1992055 Z"
                        fill="#000000" fill-rule="nonzero" />
                    <circle fill="#000000" opacity="0.3" cx="18.5" cy="5.5" r="2.5" />
                </g>
            </svg>
        </div>
        <span class="menu-text">User</span>
        <i class="menu-arrow"></i>
    </a>
    <div class="menu-submenu">
        <i class="menu-arrow"></i>
        <ul class="menu-subnav">
            <li class="menu-item menu-item-parent" aria-haspopup="true">
                <span class="menu-link"><span class="menu-text">Users</span></span>
            </li>

            <li class="menu-item {{ request()->is('dashboard/user/create') ? 'menu-item-active' : null }}"
                aria-haspopup="true">
                <a href="{{ route('user.create') }}" class="menu-link">
                    <i class="menu-bullet menu-bullet-line">
                        <span></span>
                    </i>
                    <span class="menu-text">Add User</span>
                </a>
            </li>
            <li class="menu-item {{ request()->is('dashboard/user-request') ? 'menu-item-active' : null }}"
                aria-haspopup="true">
                <a href="{{ route('user.request') }}" class="menu-link">
                    <i class="menu-bullet menu-bullet-line">
                        <span></span>
                    </i>
                    <span class="menu-text">View Registration Request</span>
                </a>
            </li>
            <li class="menu-item {{ request()->is('dashboard/user') ? 'menu-item-active' : null }}"
                aria-haspopup="true">
                <a href="{{ route('user.index') }}" class="menu-link">
                    <i class="menu-bullet menu-bullet-line">
                        <span></span>
                    </i>
                    <span class="menu-text">View All Users</span>
                </a>
            </li>

        </ul>
    </div>
</li>

<li class="menu-item {{ request()->is('dashboard/lawyer*') ? 'menu-item-active menu-item-open' : null }}"
    aria-haspopup="true" data-menu-toggle="hover">
    <a href="javascript:" class="menu-link menu-toggle">
        <div class="svg-icon menu-icon">
            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                height="24px" viewBox="0 0 24 24" version="1.1">
                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                    <rect x="0" y="0" width="24" height="24" />
                    <path
                        d="M12,11 C9.790861,11 8,9.209139 8,7 C8,4.790861 9.790861,3 12,3 C14.209139,3 16,4.790861 16,7 C16,9.209139 14.209139,11 12,11 Z"
                        fill="#000000" fill-rule="nonzero" opacity="0.3" />
                    <path
                        d="M3.00065168,20.1992055 C3.38825852,15.4265159 7.26191235,13 11.9833413,13 C16.7712164,13 20.7048837,15.2931929 20.9979143,20.2 C21.0095879,20.3954741 20.9979143,21 20.2466999,21 C16.541124,21 11.0347247,21 3.72750223,21 C3.47671215,21 2.97953825,20.45918 3.00065168,20.1992055 Z"
                        fill="#000000" fill-rule="nonzero" />
                    <circle fill="#000000" opacity="0.3" cx="18.5" cy="5.5" r="2.5" />
                </g>
            </svg>
        </div>
        <span class="menu-text">Lawyer</span>
        <i class="menu-arrow"></i>
    </a>
    <div class="menu-submenu">
        <i class="menu-arrow"></i>
        <ul class="menu-subnav">
            <li class="menu-item menu-item-parent" aria-haspopup="true">
                <span class="menu-link"><span class="menu-text">Lawyers</span></span>
            </li>
            <li class="menu-item {{ request()->is('dashboard/lawyer/create') ? 'menu-item-active' : null }}"
                aria-haspopup="true">
                <a href="{{ route('lawyer.create') }}" class="menu-link">
                    <i class="menu-bullet menu-bullet-line">
                        <span></span>
                    </i>
                    <span class="menu-text">Add Lawyer</span>
                </a>
            </li>
            <li class="menu-item {{ request()->is('dashboard/lawyerCategory') ? 'menu-item-active' : null }}"
                aria-haspopup="true">
                <a href="{{ route('lawyerCategory.index') }}" class="menu-link">
                    <i class="menu-bullet menu-bullet-line">
                        <span></span>
                    </i>
                    <span class="menu-text">Lawyer Categories</span>
                </a>
            </li>
            <li class="menu-item {{ request()->is('dashboard/lawyer-request') ? 'menu-item-active' : null }}"
                aria-haspopup="true">
                <a href="{{ route('lawyer.request') }}" class="menu-link">
                    <i class="menu-bullet menu-bullet-line">
                        <span></span>
                    </i>
                    <span class="menu-text">View Lawyer Registration Request</span>
                </a>
            </li>
            <li class="menu-item {{ request()->is('dashboard/lawyer') ? 'menu-item-active' : null }}"
                aria-haspopup="true">
                <a href="{{ route('lawyer.index') }}" class="menu-link">
                    <i class="menu-bullet menu-bullet-line">
                        <span></span>
                    </i>
                    <span class="menu-text">View All Lawyers</span>
                </a>
            </li>

        </ul>
    </div>
</li>
<li class="menu-item {{ request()->is('dashboard/agent*') ? 'menu-item-active menu-item-open' : null }}"
    aria-haspopup="true" data-menu-toggle="hover">
    <a href="javascript:" class="menu-link menu-toggle">
        <div class="svg-icon menu-icon">
            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                height="24px" viewBox="0 0 24 24" version="1.1">
                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                    <rect x="0" y="0" width="24" height="24" />
                    <path
                        d="M12,11 C9.790861,11 8,9.209139 8,7 C8,4.790861 9.790861,3 12,3 C14.209139,3 16,4.790861 16,7 C16,9.209139 14.209139,11 12,11 Z"
                        fill="#000000" fill-rule="nonzero" opacity="0.3" />
                    <path
                        d="M3.00065168,20.1992055 C3.38825852,15.4265159 7.26191235,13 11.9833413,13 C16.7712164,13 20.7048837,15.2931929 20.9979143,20.2 C21.0095879,20.3954741 20.9979143,21 20.2466999,21 C16.541124,21 11.0347247,21 3.72750223,21 C3.47671215,21 2.97953825,20.45918 3.00065168,20.1992055 Z"
                        fill="#000000" fill-rule="nonzero" />
                    <circle fill="#000000" opacity="0.3" cx="18.5" cy="5.5" r="2.5" />
                </g>
            </svg>
        </div>
        <span class="menu-text">Agent</span>
        <i class="menu-arrow"></i>
    </a>
    <div class="menu-submenu">
        <i class="menu-arrow"></i>
        <ul class="menu-subnav">
            
            <li class="menu-item menu-item-parent" aria-haspopup="true">
                <span class="menu-link"><span class="menu-text">Agents</span></span>
            </li>
            <li class="menu-item {{ request()->is('dashboard/agentCategory') ? 'menu-item-active' : null }}"
                aria-haspopup="true">
                <a href="{{ route('agentCategory.index') }}" class="menu-link">
                    <i class="menu-bullet menu-bullet-line">
                        <span></span>
                    </i>
                    <span class="menu-text">Agent Categories</span>
                </a>
            </li>
            <li class="menu-item {{ request()->is('dashboard/agent/create') ? 'menu-item-active' : null }}"
                aria-haspopup="true">
                <a href="{{ route('agent.create') }}" class="menu-link">
                    <i class="menu-bullet menu-bullet-line">
                        <span></span>
                    </i>
                    <span class="menu-text">Add Agent</span>
                </a>
            </li>
            <li class="menu-item {{ request()->is('dashboard/agent-request') ? 'menu-item-active' : null }}"
                aria-haspopup="true">
                <a href="{{ route('agent.request') }}" class="menu-link">
                    <i class="menu-bullet menu-bullet-line">
                        <span></span>
                    </i>
                    <span class="menu-text">View Agent Registration Request</span>
                </a>
            </li>
            <li class="menu-item {{ request()->is('dashboard/agent') ? 'menu-item-active' : null }}"
                aria-haspopup="true">
                <a href="{{ route('agent.index') }}" class="menu-link">
                    <i class="menu-bullet menu-bullet-line">
                        <span></span>
                    </i>
                    <span class="menu-text">View All Agent</span>
                </a>
            </li>


        </ul>
    </div>
</li>
<li class="menu-item {{ request()->is('dashboard/kazi*') ? 'menu-item-active menu-item-open' : null }}"
    aria-haspopup="true" data-menu-toggle="hover">
    <a href="javascript:" class="menu-link menu-toggle">
        <div class="svg-icon menu-icon">
            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                height="24px" viewBox="0 0 24 24" version="1.1">
                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                    <rect x="0" y="0" width="24" height="24" />
                    <path
                        d="M12,11 C9.790861,11 8,9.209139 8,7 C8,4.790861 9.790861,3 12,3 C14.209139,3 16,4.790861 16,7 C16,9.209139 14.209139,11 12,11 Z"
                        fill="#000000" fill-rule="nonzero" opacity="0.3" />
                    <path
                        d="M3.00065168,20.1992055 C3.38825852,15.4265159 7.26191235,13 11.9833413,13 C16.7712164,13 20.7048837,15.2931929 20.9979143,20.2 C21.0095879,20.3954741 20.9979143,21 20.2466999,21 C16.541124,21 11.0347247,21 3.72750223,21 C3.47671215,21 2.97953825,20.45918 3.00065168,20.1992055 Z"
                        fill="#000000" fill-rule="nonzero" />
                    <circle fill="#000000" opacity="0.3" cx="18.5" cy="5.5" r="2.5" />
                </g>
            </svg>
        </div>
        <span class="menu-text">Kazi</span>
        <i class="menu-arrow"></i>
    </a>
    <div class="menu-submenu">
        <i class="menu-arrow"></i>
        <ul class="menu-subnav">
            <li class="menu-item menu-item-parent" aria-haspopup="true">
                <span class="menu-link"><span class="menu-text">Kazi's</span></span>
            </li>
            <li class="menu-item {{ request()->is('dashboard/kazi/create') ? 'menu-item-active' : null }}"
                aria-haspopup="true">
                <a href="{{ route('kazi.create') }}" class="menu-link">
                    <i class="menu-bullet menu-bullet-line">
                        <span></span>
                    </i>
                    <span class="menu-text">Add Kazi</span>
                </a>
            </li>

            <li class="menu-item {{ request()->is('dashboard/kazi-request') ? 'menu-item-active' : null }}"
                aria-haspopup="true">
                <a href="{{ route('kazi.request') }}" class="menu-link">
                    <i class="menu-bullet menu-bullet-line">
                        <span></span>
                    </i>
                    <span class="menu-text">View Kazi Registration Request</span>
                </a>
            </li>
            <li class="menu-item {{ request()->is('dashboard/kazi') ? 'menu-item-active' : null }}"
                aria-haspopup="true">
                <a href="{{ route('kazi.index') }}" class="menu-link">
                    <i class="menu-bullet menu-bullet-line">
                        <span></span>
                    </i>
                    <span class="menu-text">View All Kazi</span>
                </a>
            </li>
        </ul>
    </div>
</li>

<li class="menu-item {{ request()->is('dashboard/shop*') ? 'menu-item-active menu-item-open' : null }}"
    aria-haspopup="true" data-menu-toggle="hover">
    <a href="javascript:" class="menu-link menu-toggle">
        <div class="svg-icon menu-icon">
            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                height="24px" viewBox="0 0 24 24" version="1.1">
                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                    <rect x="0" y="0" width="24" height="24" />
                    <path
                        d="M13.2070325,4 C13.0721672,4.47683179 13,4.97998812 13,5.5 C13,8.53756612 15.4624339,11 18.5,11 C19.0200119,11 19.5231682,10.9278328 20,10.7929675 L20,17 C20,18.6568542 18.6568542,20 17,20 L7,20 C5.34314575,20 4,18.6568542 4,17 L4,7 C4,5.34314575 5.34314575,4 7,4 L13.2070325,4 Z"
                        fill="#000000" />
                    <circle fill="#000000" opacity="0.3" cx="18.5" cy="5.5" r="2.5" />
                </g>
            </svg>
        </div>
        <span class="menu-text">Shop</span>
        <i class="menu-arrow"></i>
    </a>
    <div class="menu-submenu">
        <i class="menu-arrow"></i>
        <ul class="menu-subnav">
            <li class="menu-item menu-item-parent" aria-haspopup="true">
                <span class="menu-link"><span class="menu-text">Products</span></span>
            </li>
            <li class="menu-item {{ request()->is('dashboard/shop/product') ? 'menu-item-active' : null }}"
                aria-haspopup="true">
                <a href="{{ route('product.index') }}" class="menu-link">
                    <i class="menu-bullet menu-bullet-line">
                        <span></span>
                    </i>
                    <span class="menu-text">Products</span>
                </a>
            </li>
            <li class="menu-item {{ request()->is('dashboard/shop/productReturn') ? 'menu-item-active' : null }}"
                aria-haspopup="true">
                <a href="{{ route('productReturn.index') }}" class="menu-link">
                    <i class="menu-bullet menu-bullet-line">
                        <span></span>
                    </i>
                    <span class="menu-text">Product Return</span>
                </a>
            </li>
            <li class="menu-item {{ request()->is('dashboard/shop/productCategory') ? 'menu-item-active' : null }}"
                aria-haspopup="true">
                <a href="{{ route('productCategory.index') }}" class="menu-link">
                    <i class="menu-bullet menu-bullet-line">
                        <span></span>
                    </i>
                    <span class="menu-text">Categories</span>
                </a>
            </li>
            <li class="menu-item {{ request()->is('dashboard/shop/productCategory/create') ? 'menu-item-active' : null }}"
                aria-haspopup="true">
                <a href="{{ route('productCategory.create') }}" class="menu-link">
                    <i class="menu-bullet menu-bullet-line">
                        <span></span>
                    </i>
                    <span class="menu-text">Add Category</span>
                </a>
            </li>
            <li class="menu-item {{ request()->is('dashboard/shop/product/create') ? 'menu-item-active' : null }}"
                aria-haspopup="true">
                <a href="{{ route('product.create') }}" class="menu-link">
                    <i class="menu-bullet menu-bullet-line">
                        <span></span>
                    </i>
                    <span class="menu-text">Add Product</span>
                </a>
            </li>

            <li class="menu-item {{ request()->is('dashboard/shop/order*') ? 'menu-item-active menu-item-open' : null }}"
                aria-haspopup="true" data-menu-toggle="hover">
                <a href="javascript:" class="menu-link menu-toggle">
                    <div class="svg-icon menu-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                            height="24px" viewBox="0 0 24 24" version="1.1">
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <rect x="0" y="0" width="24" height="24" />
                                <path
                                    d="M13.2070325,4 C13.0721672,4.47683179 13,4.97998812 13,5.5 C13,8.53756612 15.4624339,11 18.5,11 C19.0200119,11 19.5231682,10.9278328 20,10.7929675 L20,17 C20,18.6568542 18.6568542,20 17,20 L7,20 C5.34314575,20 4,18.6568542 4,17 L4,7 C4,5.34314575 5.34314575,4 7,4 L13.2070325,4 Z"
                                    fill="#000000" />
                                <circle fill="#000000" opacity="0.3" cx="18.5" cy="5.5" r="2.5" />
                            </g>
                        </svg>
                    </div>
                    <span class="menu-text">Orders</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="menu-submenu">
                    <i class="menu-arrow"></i>
                    <ul class="menu-subnav">
                        <li class="menu-item menu-item-parent" aria-haspopup="true">
                            <span class="menu-link"><span class="menu-text">Order</span></span>
                        </li>
                        <li class="menu-item {{ request()->is('dashboard/shop/order') ? 'menu-item-active' : null }}"
                            aria-haspopup="true">
                            <a href="{{ route('order.index') }}" class="menu-link">
                                <i class="menu-bullet menu-bullet-line">
                                    <span></span>
                                </i>
                                <span class="menu-text">View All Orders</span>
                            </a>
                        </li>

                        <li class="menu-item {{ request()->is('dashboard/shop/order/ongoing') ? 'menu-item-active' : null }}"
                            aria-haspopup="true">
                            <a href="{{ route('order.ongoing') }}" class="menu-link">
                                <i class="menu-bullet menu-bullet-line">
                                    <span></span>
                                </i>
                                <span class="menu-text">Ongoing Orders</span>
                            </a>
                        </li>
                        <li class="menu-item {{ request()->is('dashboard/shop/order/delivered') ? 'menu-item-active' : null }}"
                            aria-haspopup="true">
                            <a href="{{ route('order.delivered') }}" class="menu-link">
                                <i class="menu-bullet menu-bullet-line">
                                    <span></span>
                                </i>
                                <span class="menu-text">Delivered Orders</span>
                            </a>
                        </li>
                        <li class="menu-item {{ request()->is('dashboard/shop/order/history') ? 'menu-item-active' : null }}"
                            aria-haspopup="true">
                            <a href="{{ route('order.history') }}" class="menu-link">
                                <i class="menu-bullet menu-bullet-line">
                                    <span></span>
                                </i>
                                <span class="menu-text">Order History</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
        </ul>
    </div>



</li>
<li class="menu-item {{ request()->is('dashboard/courses*') ? 'menu-item-active menu-item-open' : null }}"
    aria-haspopup="true" data-menu-toggle="hover">
    <a href="javascript:" class="menu-link menu-toggle">
        <div class="svg-icon menu-icon">
            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                height="24px" viewBox="0 0 24 24" version="1.1">
                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                    <rect x="0" y="0" width="24" height="24" />
                    <path
                        d="M13.2070325,4 C13.0721672,4.47683179 13,4.97998812 13,5.5 C13,8.53756612 15.4624339,11 18.5,11 C19.0200119,11 19.5231682,10.9278328 20,10.7929675 L20,17 C20,18.6568542 18.6568542,20 17,20 L7,20 C5.34314575,20 4,18.6568542 4,17 L4,7 C4,5.34314575 5.34314575,4 7,4 L13.2070325,4 Z"
                        fill="#000000" />
                    <circle fill="#000000" opacity="0.3" cx="18.5" cy="5.5" r="2.5" />
                </g>
            </svg>
        </div>
        <span class="menu-text">Course</span>
        <i class="menu-arrow"></i>
    </a>
    <div class="menu-submenu">
        <i class="menu-arrow"></i>
        <ul class="menu-subnav">

            <li class="menu-item {{ request()->is('dashboard/courses/category*') ? 'menu-item-active menu-item-open' : null }}"
                aria-haspopup="true" data-menu-toggle="hover">
                <a href="javascript:" class="menu-link menu-toggle">
                    <div class="svg-icon menu-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                            height="24px" viewBox="0 0 24 24" version="1.1">
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <rect x="0" y="0" width="24" height="24" />
                                <path
                                    d="M13.2070325,4 C13.0721672,4.47683179 13,4.97998812 13,5.5 C13,8.53756612 15.4624339,11 18.5,11 C19.0200119,11 19.5231682,10.9278328 20,10.7929675 L20,17 C20,18.6568542 18.6568542,20 17,20 L7,20 C5.34314575,20 4,18.6568542 4,17 L4,7 C4,5.34314575 5.34314575,4 7,4 L13.2070325,4 Z"
                                    fill="#000000" />
                                <circle fill="#000000" opacity="0.3" cx="18.5" cy="5.5" r="2.5" />
                            </g>
                        </svg>
                    </div>
                    <span class="menu-text">Course Category</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="menu-submenu">
                    <i class="menu-arrow"></i>
                    <ul class="menu-subnav">
                        <li class="menu-item menu-item-parent" aria-haspopup="true">
                            <span class="menu-link"><span class="menu-text">Category</span></span>
                        </li>

                        <li class="menu-item {{ request()->is('dashboard/courses/category/create') ? 'menu-item-active' : null }}"
                            aria-haspopup="true">
                            <a href="{{ route('category.create') }}" class="menu-link">
                                <i class="menu-bullet menu-bullet-line">
                                    <span></span>
                                </i>
                                <span class="menu-text">Add Categories</span>
                            </a>
                        </li>

                        <li class="menu-item {{ request()->is('dashboard/courses/category') ? 'menu-item-active' : null }}"
                            aria-haspopup="true">
                            <a href="{{ route('category.index') }}" class="menu-link">
                                <i class="menu-bullet menu-bullet-line">
                                    <span></span>
                                </i>
                                <span class="menu-text">All Categories</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="menu-item {{ request()->is('dashboard/courses/course/*') ? 'menu-item-active menu-item-open' : null }}"
                aria-haspopup="true" data-menu-toggle="hover">
                <a href="javascript:" class="menu-link menu-toggle">
                    <div class="svg-icon menu-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                            height="24px" viewBox="0 0 24 24" version="1.1">
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <rect x="0" y="0" width="24" height="24" />
                                <path
                                    d="M13.2070325,4 C13.0721672,4.47683179 13,4.97998812 13,5.5 C13,8.53756612 15.4624339,11 18.5,11 C19.0200119,11 19.5231682,10.9278328 20,10.7929675 L20,17 C20,18.6568542 18.6568542,20 17,20 L7,20 C5.34314575,20 4,18.6568542 4,17 L4,7 C4,5.34314575 5.34314575,4 7,4 L13.2070325,4 Z"
                                    fill="#000000" />
                                <circle fill="#000000" opacity="0.3" cx="18.5" cy="5.5" r="2.5" />
                            </g>
                        </svg>
                    </div>
                    <span class="menu-text">Courses</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="menu-submenu">
                    <i class="menu-arrow"></i>
                    <ul class="menu-subnav">
                        <li class="menu-item menu-item-parent" aria-haspopup="true">
                            <span class="menu-link"><span class="menu-text">Courses</span></span>
                        </li>

                        <li class="menu-item {{ request()->is('dashboard/courses/course/create') ? 'menu-item-active' : null }}"
                            aria-haspopup="true">
                            <a href="{{ route('course.create') }}" class="menu-link">
                                <i class="menu-bullet menu-bullet-line">
                                    <span></span>
                                </i>
                                <span class="menu-text">Add Course</span>
                            </a>
                        </li>

                        <li class="menu-item {{ request()->is('dashboard/courses/course') ? 'menu-item-active' : null }}"
                            aria-haspopup="true">
                            <a href="{{ route('course.index') }}" class="menu-link">
                                <i class="menu-bullet menu-bullet-line">
                                    <span></span>
                                </i>
                                <span class="menu-text">All Course</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
             <li class="menu-item {{ request()->is('dashboard/courses/course/*') ? 'menu-item-active menu-item-open' : null }}"
                aria-haspopup="true" data-menu-toggle="hover">
                <a href="javascript:" class="menu-link menu-toggle">
                    <div class="svg-icon menu-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                            height="24px" viewBox="0 0 24 24" version="1.1">
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <rect x="0" y="0" width="24" height="24" />
                                <path
                                    d="M13.2070325,4 C13.0721672,4.47683179 13,4.97998812 13,5.5 C13,8.53756612 15.4624339,11 18.5,11 C19.0200119,11 19.5231682,10.9278328 20,10.7929675 L20,17 C20,18.6568542 18.6568542,20 17,20 L7,20 C5.34314575,20 4,18.6568542 4,17 L4,7 C4,5.34314575 5.34314575,4 7,4 L13.2070325,4 Z"
                                    fill="#000000" />
                                <circle fill="#000000" opacity="0.3" cx="18.5" cy="5.5" r="2.5" />
                            </g>
                        </svg>
                    </div>
                    <span class="menu-text">Set Course Quiz</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="menu-submenu">
                    <i class="menu-arrow"></i>
                    <ul class="menu-subnav">
                        <li class="menu-item menu-item-parent" aria-haspopup="true">
                            <span class="menu-link"><span class="menu-text">Courses</span></span>
                        </li>

                        <li class="menu-item {{ request()->is('dashboard/courses/userCourse/result') ? 'menu-item-active' : null }}"
                            aria-haspopup="true">
                            <a href="{{ route('userCourse.result') }}" class="menu-link">
                                <i class="menu-bullet menu-bullet-line">
                                    <span></span>
                                </i>
                                <span class="menu-text">Course Quiz Result</span>
                            </a>
                        </li>

                        <li class="menu-item {{ request()->is('dashboard/courses/userCourse') ? 'menu-item-active' : null }}"
                            aria-haspopup="true">
                            <a href="{{ route('userCourse.index') }}" class="menu-link">
                                <i class="menu-bullet menu-bullet-line">
                                    <span></span>
                                </i>
                                <span class="menu-text">Provide Certificate To User</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="menu-item {{ request()->is('dashboard/courses/courseReview') ? 'menu-item-active' : null }}" aria-haspopup="true">
                <a href="{{ route('courseReview.index') }}" class="menu-link">
                   <span class="svg-icon menu-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24"
                            version="1.1">
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <rect x="0" y="0" width="24" height="24" />
                                <path
                                    d="M5.5,4 L9.5,4 C10.3284271,4 11,4.67157288 11,5.5 L11,6.5 C11,7.32842712 10.3284271,8 9.5,8 L5.5,8 C4.67157288,8 4,7.32842712 4,6.5 L4,5.5 C4,4.67157288 4.67157288,4 5.5,4 Z M14.5,16 L18.5,16 C19.3284271,16 20,16.6715729 20,17.5 L20,18.5 C20,19.3284271 19.3284271,20 18.5,20 L14.5,20 C13.6715729,20 13,19.3284271 13,18.5 L13,17.5 C13,16.6715729 13.6715729,16 14.5,16 Z"
                                    fill="#000000" />
                                <path
                                    d="M5.5,10 L9.5,10 C10.3284271,10 11,10.6715729 11,11.5 L11,18.5 C11,19.3284271 10.3284271,20 9.5,20 L5.5,20 C4.67157288,20 4,19.3284271 4,18.5 L4,11.5 C4,10.6715729 4.67157288,10 5.5,10 Z M14.5,4 L18.5,4 C19.3284271,4 20,4.67157288 20,5.5 L20,12.5 C20,13.3284271 19.3284271,14 18.5,14 L14.5,14 C13.6715729,14 13,13.3284271 13,12.5 L13,5.5 C13,4.67157288 13.6715729,4 14.5,4 Z"
                                    fill="#000000" opacity="0.3" />
                            </g>
                        </svg>
                    </span>
                    <span class="menu-text">Course Reviews</span>
                </a>
            </li>
            <li class="menu-item {{ request()->is('dashboard/courses/courseOrder*') ? 'menu-item-active' : null }}"
                aria-haspopup="true">
                <a href="{{ route('courseOrder.index') }}" class="menu-link">
                    <span class="svg-icon menu-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24"
                            version="1.1">
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <rect x="0" y="0" width="24" height="24" />
                                <path
                                    d="M5.5,4 L9.5,4 C10.3284271,4 11,4.67157288 11,5.5 L11,6.5 C11,7.32842712 10.3284271,8 9.5,8 L5.5,8 C4.67157288,8 4,7.32842712 4,6.5 L4,5.5 C4,4.67157288 4.67157288,4 5.5,4 Z M14.5,16 L18.5,16 C19.3284271,16 20,16.6715729 20,17.5 L20,18.5 C20,19.3284271 19.3284271,20 18.5,20 L14.5,20 C13.6715729,20 13,19.3284271 13,18.5 L13,17.5 C13,16.6715729 13.6715729,16 14.5,16 Z"
                                    fill="#000000" />
                                <path
                                    d="M5.5,10 L9.5,10 C10.3284271,10 11,10.6715729 11,11.5 L11,18.5 C11,19.3284271 10.3284271,20 9.5,20 L5.5,20 C4.67157288,20 4,19.3284271 4,18.5 L4,11.5 C4,10.6715729 4.67157288,10 5.5,10 Z M14.5,4 L18.5,4 C19.3284271,4 20,4.67157288 20,5.5 L20,12.5 C20,13.3284271 19.3284271,14 18.5,14 L14.5,14 C13.6715729,14 13,13.3284271 13,12.5 L13,5.5 C13,4.67157288 13.6715729,4 14.5,4 Z"
                                    fill="#000000" opacity="0.3" />
                            </g>
                        </svg>
                    </span>
                    <span class="menu-text">Course Orders</span>
                </a>
            </li>
        </ul>
    </div>
</li>

<li class="menu-item {{ request()->is('dashboard/packages*') ? 'menu-item-active menu-item-open' : null }}"
    aria-haspopup="true" data-menu-toggle="hover">
    <a href="javascript:" class="menu-link menu-toggle">
        <div class="svg-icon menu-icon">
            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                height="24px" viewBox="0 0 24 24" version="1.1">
                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                    <rect x="0" y="0" width="24" height="24" />
                    <path
                        d="M13.2070325,4 C13.0721672,4.47683179 13,4.97998812 13,5.5 C13,8.53756612 15.4624339,11 18.5,11 C19.0200119,11 19.5231682,10.9278328 20,10.7929675 L20,17 C20,18.6568542 18.6568542,20 17,20 L7,20 C5.34314575,20 4,18.6568542 4,17 L4,7 C4,5.34314575 5.34314575,4 7,4 L13.2070325,4 Z"
                        fill="#000000" />
                    <circle fill="#000000" opacity="0.3" cx="18.5" cy="5.5" r="2.5" />
                </g>
            </svg>
        </div>
        <span class="menu-text">Packages</span>
        <i class="menu-arrow"></i>
    </a>
    <div class="menu-submenu">
        <i class="menu-arrow"></i>
        <ul class="menu-subnav">
            <li class="menu-item {{ request()->is('dashboard/packages/package*') ? 'menu-item-active menu-item-open' : null }}"
                aria-haspopup="true" data-menu-toggle="hover">
                <a href="javascript:" class="menu-link menu-toggle">
                    <div class="svg-icon menu-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                            height="24px" viewBox="0 0 24 24" version="1.1">
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <rect x="0" y="0" width="24" height="24" />
                                <path
                                    d="M13.2070325,4 C13.0721672,4.47683179 13,4.97998812 13,5.5 C13,8.53756612 15.4624339,11 18.5,11 C19.0200119,11 19.5231682,10.9278328 20,10.7929675 L20,17 C20,18.6568542 18.6568542,20 17,20 L7,20 C5.34314575,20 4,18.6568542 4,17 L4,7 C4,5.34314575 5.34314575,4 7,4 L13.2070325,4 Z"
                                    fill="#000000" />
                                <circle fill="#000000" opacity="0.3" cx="18.5" cy="5.5" r="2.5" />
                            </g>
                        </svg>
                    </div>
                    <span class="menu-text">Membership Packages</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="menu-submenu">
                    <i class="menu-arrow"></i>
                    <ul class="menu-subnav">
                        <li class="menu-item {{ request()->is('dashboard/packages/package') ? 'menu-item-active' : null }}"
                            aria-haspopup="true">
                            <a href="{{ route('package.index') }}" class="menu-link">
                                <i class="menu-bullet menu-bullet-line">
                                    <span></span>
                                </i>
                                <span class="menu-text">View All Package</span>
                            </a>
                        </li>
                       
                       
                        <li class="menu-item {{ request()->is('dashboard/packages/package-request-list') ? 'menu-item-active' : null }}"
                            aria-haspopup="true">
                            <a href="{{ route('packageOrder.list') }}" class="menu-link">
                                <i class="menu-bullet menu-bullet-line">
                                    <span></span>
                                </i>
                                <span class="menu-text">Package Request </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="menu-item {{ request()->is('dashboard/packages/coursePackage*') ? 'menu-item-active menu-item-open' : null }}"
                aria-haspopup="true" data-menu-toggle="hover">
                <a href="javascript:" class="menu-link menu-toggle">
                    <div class="svg-icon menu-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                            height="24px" viewBox="0 0 24 24" version="1.1">
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <rect x="0" y="0" width="24" height="24" />
                                <path
                                    d="M13.2070325,4 C13.0721672,4.47683179 13,4.97998812 13,5.5 C13,8.53756612 15.4624339,11 18.5,11 C19.0200119,11 19.5231682,10.9278328 20,10.7929675 L20,17 C20,18.6568542 18.6568542,20 17,20 L7,20 C5.34314575,20 4,18.6568542 4,17 L4,7 C4,5.34314575 5.34314575,4 7,4 L13.2070325,4 Z"
                                    fill="#000000" />
                                <circle fill="#000000" opacity="0.3" cx="18.5" cy="5.5" r="2.5" />
                            </g>
                        </svg>
                    </div>
                    <span class="menu-text">Course Packages</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="menu-submenu">
                    <i class="menu-arrow"></i>
                    <ul class="menu-subnav">
                        <li class="menu-item {{ request()->is('dashboard/packages/coursePackage') ? 'menu-item-active' : null }}"
                            aria-haspopup="true">
                            <a href="{{ route('coursePackage.index') }}" class="menu-link">
                                <i class="menu-bullet menu-bullet-line">
                                    <span></span>
                                </i>
                                <span class="menu-text">View All Package</span>
                            </a>
                        </li>
                       
                       
                        <li class="menu-item {{ request()->is('dashboard/packages/coursePackageOrder') ? 'menu-item-active' : null }}"
                            aria-haspopup="true">
                            <a href="{{ route('package.userCoursePackage.orders') }}" class="menu-link">
                                <i class="menu-bullet menu-bullet-line">
                                    <span></span>
                                </i>
                                <span class="menu-text">Package Request </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="menu-item {{ request()->is('dashboard/packages/profileStatusBoostPackages*') ? 'menu-item-active menu-item-open' : null }}"
                aria-haspopup="true" data-menu-toggle="hover">
                <a href="javascript:" class="menu-link menu-toggle">
                    <div class="svg-icon menu-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                            height="24px" viewBox="0 0 24 24" version="1.1">
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <rect x="0" y="0" width="24" height="24" />
                                <path
                                    d="M13.2070325,4 C13.0721672,4.47683179 13,4.97998812 13,5.5 C13,8.53756612 15.4624339,11 18.5,11 C19.0200119,11 19.5231682,10.9278328 20,10.7929675 L20,17 C20,18.6568542 18.6568542,20 17,20 L7,20 C5.34314575,20 4,18.6568542 4,17 L4,7 C4,5.34314575 5.34314575,4 7,4 L13.2070325,4 Z"
                                    fill="#000000" />
                                <circle fill="#000000" opacity="0.3" cx="18.5" cy="5.5" r="2.5" />
                            </g>
                        </svg>
                    </div>
                    <span class="menu-text">Profile/Status Boost Packages</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="menu-submenu">
                    <i class="menu-arrow"></i>
                    <ul class="menu-subnav">
                        <li class="menu-item {{ request()->is('dashboard/packages/profileStatusBoostPackages') ? 'menu-item-active' : null }}"
                            aria-haspopup="true">
                            <a href="{{ route('profileStatusBoostPackages.index') }}" class="menu-link">
                                <i class="menu-bullet menu-bullet-line">
                                    <span></span>
                                </i>
                                <span class="menu-text">View All Package</span>
                            </a>
                        </li>
                       
                       
                        <li class="menu-item {{ request()->is('dashboard/packages/profileStatusBoostPackages/orders') ? 'menu-item-active' : null }}"
                            aria-haspopup="true">
                            <a href="{{ route('profileStatusBoostPackages.orders') }}" class="menu-link">
                                <i class="menu-bullet menu-bullet-line">
                                    <span></span>
                                </i>
                                <span class="menu-text">Package Request </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="menu-item {{ request()->is('dashboard/packages/shopPackage*') ? 'menu-item-active menu-item-open' : null }}"
                aria-haspopup="true" data-menu-toggle="hover">
                <a href="javascript:" class="menu-link menu-toggle">
                    <div class="svg-icon menu-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                            height="24px" viewBox="0 0 24 24" version="1.1">
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <rect x="0" y="0" width="24" height="24" />
                                <path
                                    d="M13.2070325,4 C13.0721672,4.47683179 13,4.97998812 13,5.5 C13,8.53756612 15.4624339,11 18.5,11 C19.0200119,11 19.5231682,10.9278328 20,10.7929675 L20,17 C20,18.6568542 18.6568542,20 17,20 L7,20 C5.34314575,20 4,18.6568542 4,17 L4,7 C4,5.34314575 5.34314575,4 7,4 L13.2070325,4 Z"
                                    fill="#000000" />
                                <circle fill="#000000" opacity="0.3" cx="18.5" cy="5.5" r="2.5" />
                            </g>
                        </svg>
                    </div>
                    <span class="menu-text">Shop Packages</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="menu-submenu">
                    <i class="menu-arrow"></i>
                    <ul class="menu-subnav">
                        <li class="menu-item {{ request()->is('dashboard/packages/shopPackage') ? 'menu-item-active' : null }}"
                            aria-haspopup="true">
                            <a href="{{ route('shopPackage.index') }}" class="menu-link">
                                <i class="menu-bullet menu-bullet-line">
                                    <span></span>
                                </i>
                                <span class="menu-text">View All Package</span>
                            </a>
                        </li>
                       
                       
                        <li class="menu-item {{ request()->is('dashboard/packages/shopPackage/orders') ? 'menu-item-active' : null }}"
                            aria-haspopup="true">
                            <a href="{{ route('shopPackage.orders') }}" class="menu-link">
                                <i class="menu-bullet menu-bullet-line">
                                    <span></span>
                                </i>
                                <span class="menu-text">Package Request </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="menu-item {{ request()->is('dashboard/packages/professional-package*') ? 'menu-item-active menu-item-open' : null }}"
                aria-haspopup="true" data-menu-toggle="hover">
                <a href="javascript:" class="menu-link menu-toggle">
                    <div class="svg-icon menu-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                            height="24px" viewBox="0 0 24 24" version="1.1">
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <rect x="0" y="0" width="24" height="24" />
                                <path
                                    d="M13.2070325,4 C13.0721672,4.47683179 13,4.97998812 13,5.5 C13,8.53756612 15.4624339,11 18.5,11 C19.0200119,11 19.5231682,10.9278328 20,10.7929675 L20,17 C20,18.6568542 18.6568542,20 17,20 L7,20 C5.34314575,20 4,18.6568542 4,17 L4,7 C4,5.34314575 5.34314575,4 7,4 L13.2070325,4 Z"
                                    fill="#000000" />
                                <circle fill="#000000" opacity="0.3" cx="18.5" cy="5.5" r="2.5" />
                            </g>
                        </svg>
                    </div>
                    <span class="menu-text">Professional Packages</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="menu-submenu">
                    <i class="menu-arrow"></i>
                    <ul class="menu-subnav">
                        <li class="menu-item menu-item-parent" aria-haspopup="true">
                            <span class="menu-link"><span class="menu-text">Courses</span></span>
                        </li>

                        

                        <li class="menu-item {{ request()->is('dashboard/packages/professional-package') ? 'menu-item-active' : null }}"
                            aria-haspopup="true">
                            <a href="{{ route('professional-package.index') }}" class="menu-link">
                                <i class="menu-bullet menu-bullet-line">
                                    <span></span>
                                </i>
                                <span class="menu-text">All Packages</span>
                            </a>
                        </li>
                        <li class="menu-item {{ request()->is('dashboard/packages/professional-package/requests') ? 'menu-item-active' : null }}"
                            aria-haspopup="true">
                            <a href="{{ route('professional-package.request') }}" class="menu-link">
                                <i class="menu-bullet menu-bullet-line">
                                    <span></span>
                                </i>
                                <span class="menu-text">Package Requests</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

        </ul>
    </div>
</li>
<li class="menu-item {{ request()->is(['dashboard/badge*', 'dashboard/badge']) ? 'menu-item-active' : null }}"
    aria-haspopup="true">
    <a href="{{ route('badge.index') }}" class="menu-link">
        <span class="svg-icon menu-icon">
            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                height="24px" viewBox="0 0 24 24" version="1.1">
                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                    <rect x="0" y="0" width="24" height="24" />
                    <path
                        d="M13.2070325,4 C13.0721672,4.47683179 13,4.97998812 13,5.5 C13,8.53756612 15.4624339,11 18.5,11 C19.0200119,11 19.5231682,10.9278328 20,10.7929675 L20,17 C20,18.6568542 18.6568542,20 17,20 L7,20 C5.34314575,20 4,18.6568542 4,17 L4,7 C4,5.34314575 5.34314575,4 7,4 L13.2070325,4 Z"
                        fill="#000000" />
                    <circle fill="#000000" opacity="0.3" cx="18.5" cy="5.5" r="2.5" />
                </g>
            </svg>
        </span>
        <span class="menu-text">Badge</span>
    </a>
</li>
<li class="menu-item {{ request()->is('dashboard/employee*') ? 'menu-item-active menu-item-open' : null }}"
    aria-haspopup="true" data-menu-toggle="hover">
    <a href="javascript:" class="menu-link menu-toggle">
        <div class="svg-icon menu-icon">
            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                height="24px" viewBox="0 0 24 24" version="1.1">
                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                    <rect x="0" y="0" width="24" height="24" />
                    <path
                        d="M12,11 C9.790861,11 8,9.209139 8,7 C8,4.790861 9.790861,3 12,3 C14.209139,3 16,4.790861 16,7 C16,9.209139 14.209139,11 12,11 Z"
                        fill="#000000" fill-rule="nonzero" opacity="0.3" />
                    <path
                        d="M3.00065168,20.1992055 C3.38825852,15.4265159 7.26191235,13 11.9833413,13 C16.7712164,13 20.7048837,15.2931929 20.9979143,20.2 C21.0095879,20.3954741 20.9979143,21 20.2466999,21 C16.541124,21 11.0347247,21 3.72750223,21 C3.47671215,21 2.97953825,20.45918 3.00065168,20.1992055 Z"
                        fill="#000000" fill-rule="nonzero" />
                    <circle fill="#000000" opacity="0.3" cx="18.5" cy="5.5" r="2.5" />
                </g>
            </svg>
        </div>
        <span class="menu-text">Employee</span>
        <i class="menu-arrow"></i>
    </a>
    <div class="menu-submenu">
        <i class="menu-arrow"></i>
        <ul class="menu-subnav">
            <li class="menu-item menu-item-parent" aria-haspopup="true">
                <span class="menu-link"><span class="menu-text">Employees</span></span>
            </li>

            <li class="menu-item {{ request()->is('dashboard/employee') ? 'menu-item-active' : null }}"
                aria-haspopup="true">
                <a href="{{ route('employee.index') }}" class="menu-link">
                    <i class="menu-bullet menu-bullet-line">
                        <span></span>
                    </i>
                    <span class="menu-text">All Employee List</span>
                </a>
            </li>
           

        </ul>
    </div>
</li>


<li class="menu-item {{ request()->is(['dashboard/report*', 'dashboard/report']) ? 'menu-item-active' : null }}"
    aria-haspopup="true">
    <a href="{{ route('report.index') }}" class="menu-link">
        <span class="svg-icon menu-icon">
            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                height="24px" viewBox="0 0 24 24" version="1.1">
                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                    <rect x="0" y="0" width="24" height="24" />
                    <path
                        d="M13.2070325,4 C13.0721672,4.47683179 13,4.97998812 13,5.5 C13,8.53756612 15.4624339,11 18.5,11 C19.0200119,11 19.5231682,10.9278328 20,10.7929675 L20,17 C20,18.6568542 18.6568542,20 17,20 L7,20 C5.34314575,20 4,18.6568542 4,17 L4,7 C4,5.34314575 5.34314575,4 7,4 L13.2070325,4 Z"
                        fill="#000000" />
                    <circle fill="#000000" opacity="0.3" cx="18.5" cy="5.5" r="2.5" />
                </g>
            </svg>
        </span>
        <span class="menu-text">Reports</span>
    </a>
</li>






@can('order.access')
    <li class="menu-item {{ request()->is('dashboard/slider*') ? 'menu-item-active menu-item-open' : null }}"
        aria-haspopup="true" data-menu-toggle="hover">
        <a href="javascript:" class="menu-link menu-toggle">
            <div class="svg-icon menu-icon">
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                    height="24px" viewBox="0 0 24 24" version="1.1">
                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                        <rect x="0" y="0" width="24" height="24" />
                        <path
                            d="M13.2070325,4 C13.0721672,4.47683179 13,4.97998812 13,5.5 C13,8.53756612 15.4624339,11 18.5,11 C19.0200119,11 19.5231682,10.9278328 20,10.7929675 L20,17 C20,18.6568542 18.6568542,20 17,20 L7,20 C5.34314575,20 4,18.6568542 4,17 L4,7 C4,5.34314575 5.34314575,4 7,4 L13.2070325,4 Z"
                            fill="#000000" />
                        <circle fill="#000000" opacity="0.3" cx="18.5" cy="5.5" r="2.5" />
                    </g>
                </svg>
            </div>
            <span class="menu-text">Sliders</span>
            <i class="menu-arrow"></i>
        </a>
        <div class="menu-submenu">
            <i class="menu-arrow"></i>
            <ul class="menu-subnav">
                <li class="menu-item menu-item-parent" aria-haspopup="true">
                    <span class="menu-link"><span class="menu-text">Courses</span></span>
                </li>

                <li class="menu-item {{ request()->is('dashboard/slider/create') ? 'menu-item-active' : null }}"
                    aria-haspopup="true">
                    <a href="{{ route('slider.create') }}" class="menu-link">
                        <i class="menu-bullet menu-bullet-line">
                            <span></span>
                        </i>
                        <span class="menu-text">Add Slider</span>
                    </a>
                </li>

                <li class="menu-item {{ request()->is('dashboard/slider') ? 'menu-item-active' : null }}"
                    aria-haspopup="true">
                    <a href="{{ route('slider.index') }}" class="menu-link">
                        <i class="menu-bullet menu-bullet-line">
                            <span></span>
                        </i>
                        <span class="menu-text">All Sliders</span>
                    </a>
                </li>
            </ul>
        </div>
    </li>
    {{-- <li class="menu-item {{ request()->is('dashboard/guest-orders*') ? 'menu-item-active' : null }}" aria-haspopup="true">
      <a href="{{ route('guest.orders') }}" class="menu-link">
        <span class="svg-icon menu-icon">
          <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
              <rect x="0" y="0" width="24" height="24" />
              <path
                d="M10,4 L21,4 C21.5522847,4 22,4.44771525 22,5 L22,7 C22,7.55228475 21.5522847,8 21,8 L10,8 C9.44771525,8 9,7.55228475 9,7 L9,5 C9,4.44771525 9.44771525,4 10,4 Z M10,10 L21,10 C21.5522847,10 22,10.4477153 22,11 L22,13 C22,13.5522847 21.5522847,14 21,14 L10,14 C9.44771525,14 9,13.5522847 9,13 L9,11 C9,10.4477153 9.44771525,10 10,10 Z M10,16 L21,16 C21.5522847,16 22,16.4477153 22,17 L22,19 C22,19.5522847 21.5522847,20 21,20 L10,20 C9.44771525,20 9,19.5522847 9,19 L9,17 C9,16.4477153 9.44771525,16 10,16 Z"
                fill="#000000" />
              <rect fill="#000000" opacity="0.3" x="2" y="4" width="5" height="16" rx="1" />
            </g>
          </svg>
        </span>
        <span class="menu-text">Service Orders</span>
      </a>
    </li> --}}
@endcan

@can('blog.access')
    <li class="menu-item {{ request()->is('dashboard/blog*') ? 'menu-item-active menu-item-open' : null }}"
        aria-haspopup="true" data-menu-toggle="hover">
        <a href="javascript:" class="menu-link menu-toggle">
            <div class="svg-icon menu-icon">
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                    height="24px" viewBox="0 0 24 24" version="1.1">
                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                        <rect x="0" y="0" width="24" height="24" />
                        <path
                            d="M13.2070325,4 C13.0721672,4.47683179 13,4.97998812 13,5.5 C13,8.53756612 15.4624339,11 18.5,11 C19.0200119,11 19.5231682,10.9278328 20,10.7929675 L20,17 C20,18.6568542 18.6568542,20 17,20 L7,20 C5.34314575,20 4,18.6568542 4,17 L4,7 C4,5.34314575 5.34314575,4 7,4 L13.2070325,4 Z"
                            fill="#000000" />
                        <circle fill="#000000" opacity="0.3" cx="18.5" cy="5.5" r="2.5" />
                    </g>
                </svg>
            </div>
            <span class="menu-text">Blogs</span>
            <i class="menu-arrow"></i>
        </a>
        <div class="menu-submenu">
            <i class="menu-arrow"></i>
            <ul class="menu-subnav">
                <li class="menu-item menu-item-parent" aria-haspopup="true">
                    <span class="menu-link"><span class="menu-text">Blogs</span></span>
                </li>

                <li class="menu-item {{ request()->is('dashboard/blog/create') ? 'menu-item-active' : null }}"
                    aria-haspopup="true">
                    <a href="{{ route('blog.create') }}" class="menu-link">
                        <i class="menu-bullet menu-bullet-line">
                            <span></span>
                        </i>
                        <span class="menu-text">Add Blog</span>
                    </a>
                </li>

                <li class="menu-item {{ request()->is('dashboard/blog') ? 'menu-item-active' : null }}"
                    aria-haspopup="true">
                    <a href="{{ route('blog.index') }}" class="menu-link">
                        <i class="menu-bullet menu-bullet-line">
                            <span></span>
                        </i>
                        <span class="menu-text">All Blog</span>
                    </a>
                </li>
            </ul>
        </div>
    </li>
    <li class="menu-item {{ request()->is('dashboard/succes-stories*') ? 'menu-item-active menu-item-open' : null }}"
        aria-haspopup="true" data-menu-toggle="hover">
        <a href="javascript:" class="menu-link menu-toggle">
            <div class="svg-icon menu-icon">
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                    height="24px" viewBox="0 0 24 24" version="1.1">
                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                        <rect x="0" y="0" width="24" height="24" />
                        <path
                            d="M13.2070325,4 C13.0721672,4.47683179 13,4.97998812 13,5.5 C13,8.53756612 15.4624339,11 18.5,11 C19.0200119,11 19.5231682,10.9278328 20,10.7929675 L20,17 C20,18.6568542 18.6568542,20 17,20 L7,20 C5.34314575,20 4,18.6568542 4,17 L4,7 C4,5.34314575 5.34314575,4 7,4 L13.2070325,4 Z"
                            fill="#000000" />
                        <circle fill="#000000" opacity="0.3" cx="18.5" cy="5.5" r="2.5" />
                    </g>
                </svg>
            </div>
            <span class="menu-text">Success Stories</span>
            <i class="menu-arrow"></i>
        </a>
        <div class="menu-submenu">
            <i class="menu-arrow"></i>
            <ul class="menu-subnav">
                <li class="menu-item menu-item-parent" aria-haspopup="true">
                    <span class="menu-link"><span class="menu-text">Success Stories</span></span>
                </li>

                <li class="menu-item {{ request()->is('dashboard/succes-stories/create') ? 'menu-item-active' : null }}"
                    aria-haspopup="true">
                    <a href="{{ route('succes-stories.create') }}" class="menu-link">
                        <i class="menu-bullet menu-bullet-line">
                            <span></span>
                        </i>
                        <span class="menu-text">Add Success Stories</span>
                    </a>
                </li>

                <li class="menu-item {{ request()->is('dashboard/succes-stories') ? 'menu-item-active' : null }}"
                    aria-haspopup="true">
                    <a href="{{ route('succes-stories.index') }}" class="menu-link">
                        <i class="menu-bullet menu-bullet-line">
                            <span></span>
                        </i>
                        <span class="menu-text">All Success Stories</span>
                    </a>
                </li>
            </ul>
        </div>
    </li>
@endcan

<li class="menu-section">
    <h4 class="menu-text">Settings</h4>
    <i class="menu-icon ki ki-bold-more-hor icon-md"></i>
</li>

<li class="menu-item {{ request()->is(['dashboard/country*', 'dashboard/country']) ? 'menu-item-active' : null }}"
    aria-haspopup="true">
    <a href="{{ route('country.index') }}" class="menu-link">
        <span class="svg-icon menu-icon">
            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                height="24px" viewBox="0 0 24 24" version="1.1">
                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                    <polygon points="0 0 24 0 24 24 0 24" />
                    <path
                        d="M12,11 C9.790861,11 8,9.209139 8,7 C8,4.790861 9.790861,3 12,3 C14.209139,3 16,4.790861 16,7 C16,9.209139 14.209139,11 12,11 Z"
                        fill="#000000" fill-rule="nonzero" opacity="0.3" />
                    <path
                        d="M3.00065168,20.1992055 C3.38825852,15.4265159 7.26191235,13 11.9833413,13 C16.7712164,13 20.7048837,15.2931929 20.9979143,20.2 C21.0095879,20.3954741 20.9979143,21 20.2466999,21 C16.541124,21 11.0347247,21 3.72750223,21 C3.47671215,21 2.97953825,20.45918 3.00065168,20.1992055 Z"
                        fill="#000000" fill-rule="nonzero" />
                </g>
            </svg>
        </span>
        <span class="menu-text">Country</span>
    </a>
</li>

{{-- @canany(['settings.access', 'role_permission.access'])
    <li class="menu-item {{ request()->is(['dashboard/settings*', 'dashboard/role*']) ? 'menu-item-active menu-item-open' : null }}" aria-haspopup="true" data-menu-toggle="hover">
        <a href="javascript:" class="menu-link menu-toggle">
            <span class="svg-icon menu-icon">
                <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                        <rect x="0" y="0" width="24" height="24" />
                        <path
                            d="M7,3 L17,3 C19.209139,3 21,4.790861 21,7 C21,9.209139 19.209139,11 17,11 L7,11 C4.790861,11 3,9.209139 3,7 C3,4.790861 4.790861,3 7,3 Z M7,9 C8.1045695,9 9,8.1045695 9,7 C9,5.8954305 8.1045695,5 7,5 C5.8954305,5 5,5.8954305 5,7 C5,8.1045695 5.8954305,9 7,9 Z"
                            fill="#000000" />
                        <path
                            d="M7,13 L17,13 C19.209139,13 21,14.790861 21,17 C21,19.209139 19.209139,21 17,21 L7,21 C4.790861,21 3,19.209139 3,17 C3,14.790861 4.790861,13 7,13 Z M17,19 C18.1045695,19 19,18.1045695 19,17 C19,15.8954305 18.1045695,15 17,15 C15.8954305,15 15,15.8954305 15,17 C15,18.1045695 15.8954305,19 17,19 Z"
                            fill="#000000" opacity="0.3" />
                    </g>
                </svg>
            </span>
            <span class="menu-text">Settings</span>
            <i class="menu-arrow"></i>
        </a>
        <div class="menu-submenu">
            <i class="menu-arrow"></i>
            <ul class="menu-subnav">
                @can('settings.access')
                    <li class="menu-item {{ request()->is('dashboard/settings/company_settings*') ? 'menu-item-active' : null }}" aria-haspopup="true">
                        <a href="{{ route('company.edit') }}" class="menu-link">
                            <i class="menu-bullet menu-bullet-line">
                                <span></span>
                            </i>
                            <span class="menu-text">Company Setting</span>
                        </a>
                    </li>
                @endcan
                @can('role_permission.access')
                    <li class="menu-item {{ request()->is('dashboard/role*') ? 'menu-item-active' : null }}" aria-haspopup="true">
                        <a href="{{ route('role.assign') }}" class="menu-link">
                            <i class="menu-bullet menu-bullet-line">
                                <span></span>
                            </i>
                            <span class="menu-text">Role permission</span>
                        </a>
                    </li>
                @endcan
            </ul>
        </div>
    </li>
@endcanany --}}
