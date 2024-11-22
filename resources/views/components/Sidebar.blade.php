<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('dashboard.home') }}" class="brand-link">
        <img src="/assets/img/android-chrome-512x512.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-2"
            style="opacity: .9">
        <span class="brand-text font-weight-light">Refit Dashboard</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                @if (auth()->guard('admin')->user()->image)
                    <img src="{{ asset('storage/' . auth()->guard('admin')->user()->image) }}"
                        class="img-circle elevation-2" alt="User Image">
                @else
                    <img src="/dashboard/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
                @endif
            </div>
            <div class="info">
                <a href="{{ route('dashboard.adminprofile.show', ['admin' => auth()->guard('admin')->user()->id]) }}"
                    class="d-block">{{ auth()->guard('admin')->user()->name }}</a>
            </div>
        </div>

        <!-- Sidebar Menu -->

        @php
            // Check if the current route matches any of the child routes
            $isActiveTrainers =
                request()->routeIs('dashboard.trainers.index') ||
                request()->routeIs('dashboard.trainers.edit') ||
                request()->routeIs('dashboard.trainers.show') ||
                request()->routeIs('dashboard.trainers.create');
            $isActiveAdmin =
                request()->routeIs('dashboard.admin.index') ||
                request()->routeIs('dashboard.admin.edit') ||
                request()->routeIs('dashboard.admin.show') ||
                request()->routeIs('dashboard.admin.create');
            $isActivePackages =
                request()->routeIs('dashboard.training-packages.index') ||
                request()->routeIs('dashboard.training-packages.edit') ||
                request()->routeIs('dashboard.training-packages.show') ||
                request()->routeIs('dashboard.training-packages.create');
            $isActiveCoupon =
                request()->routeIs('dashboard.coupon.index') ||
                request()->routeIs('dashboard.coupon.edit') ||
                request()->routeIs('dashboard.coupon.create');
            $isActiveSubscriptions =
                request()->routeIs('dashboard.subscriptions.index') ||
                request()->routeIs('dashboard.subscriptions.create') ||
                request()->routeIs('dashboard.subscriptions.paid') ||
                request()->routeIs('dashboard.subscriptions.pending') ||
                request()->routeIs('dashboard.subscriptions.canceled');
            $isActiveSettings =
                request()->routeIs('dashboard.transformation.index') ||
                request()->routeIs('dashboard.setting.paymentConfig.index') ||
                request()->routeIs('dashboard.setting.whatsApp.index') ||
                request()->routeIs('dashboard.setting.index') ||
                request()->routeIs('dashboard.setting.create');
            // request()->routeIs('dashboard.setting.edit');
        @endphp
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <!-- Trainers Section -->
                <li class="nav-item {{ $isActiveTrainers ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link {{ $isActiveTrainers ? 'active' : '' }}">
                        <i class="nav-icon fa fa-dumbbell"></i>
                        <p>
                            {{ __('Trainers') }}
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('dashboard.trainers.index') }}"
                                class="nav-link {{ request()->routeIs('dashboard.trainers.index') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>{{ __('All Trainers') }}</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('dashboard.trainers.create') }}"
                                class="nav-link {{ request()->routeIs('dashboard.trainers.create') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>{{ __('Add Trainer') }}</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <!-- Training Packages Section -->
                <li class="nav-item {{ $isActivePackages ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link {{ $isActivePackages ? 'active' : '' }}">
                        <i class="nav-icon fa fa-layer-group"></i>
                        <p>
                            {{ __('Training Packages') }}
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('dashboard.training-packages.index') }}"
                                class="nav-link {{ request()->routeIs('dashboard.training-packages.index') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>{{ __('All Training Packages') }}</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('dashboard.training-packages.create') }}"
                                class="nav-link {{ request()->routeIs('dashboard.training-packages.create') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>{{ __('Add Training Package') }}</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <!-- Subscriptions Section -->
                <li class="nav-item {{ $isActiveSubscriptions ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link {{ $isActiveSubscriptions ? 'active' : '' }}">
                        <i class="nav-icon fa fa-users"></i>
                        <p>
                            {{ __('Subscriptions') }}
                            <i class="right fas fa-angle-left"></i>
                            {{-- <x-Subscription /> --}}
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('dashboard.subscriptions.index') }}"
                                class="nav-link {{ request()->routeIs('dashboard.subscriptions.index') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>{{ __('All Subscriptions') }}</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('dashboard.subscriptions.paid') }}"
                                class="nav-link {{ request()->routeIs('dashboard.subscriptions.paid') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>{{ __('Paid Subscriptions') }}
                                    @if ($noTrainerCount)
                                        <span class="badge badge-warning right">{{ $noTrainerCount }}</span>
                                    @endif
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('dashboard.subscriptions.pending') }}"
                                class="nav-link {{ request()->routeIs('dashboard.subscriptions.pending') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>{{ __('Pending Subscriptions') }}</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('dashboard.subscriptions.canceled') }}"
                                class="nav-link {{ request()->routeIs('dashboard.subscriptions.canceled') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>{{ __('Cancled Subscriptions') }}</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('dashboard.subscriptions.create') }}"
                                class="nav-link {{ request()->routeIs('dashboard.subscriptions.create') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>{{ __('Add Subscription') }}</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <!-- Coupons Section -->
                <li class="nav-item {{ $isActiveCoupon ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link {{ $isActiveCoupon ? 'active' : '' }}">
                        <i class="nav-icon fa fa-star"></i>
                        <p>
                            {{ __('Coupons') }}
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('dashboard.coupon.index') }}"
                                class="nav-link {{ request()->routeIs('dashboard.coupon.index') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>{{ __('All Coupons') }}</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('dashboard.coupon.create') }}"
                                class="nav-link {{ request()->routeIs('dashboard.coupon.create') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>{{ __('Add Coupon') }}</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <!-- Admin Section -->
                @if (auth()->guard('admin')->user()->admin_type == 'super_admin')
                    <li class="nav-item {{ $isActiveAdmin ? 'menu-open' : '' }}">
                        <a href="#" class="nav-link {{ $isActiveAdmin ? 'active' : '' }}">
                            <i class="nav-icon fa fa-user-tie"></i>
                            <p>
                                {{ __('Admins') }}
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('dashboard.admin.index') }}"
                                    class="nav-link {{ request()->routeIs('dashboard.admin.index') ? 'active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>{{ __('All Admins') }}</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('dashboard.admin.create') }}"
                                    class="nav-link {{ request()->routeIs('dashboard.admin.create') ? 'active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>{{ __('Add Admin') }}</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item {{ $isActiveSettings ? 'menu-open' : '' }}">
                        <a href="#" class="nav-link {{ $isActiveSettings ? 'active' : '' }}">
                            <i class="nav-icon fa fa-bars"></i>
                            <p>
                                {{ __('Settings') }}
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('dashboard.transformation.index') }}"
                                    class="nav-link {{ request()->routeIs('dashboard.transformation.index') ? 'active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>{{ __('Transformation') }}</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('dashboard.setting.whatsApp.index') }}"
                                    class="nav-link {{ request()->routeIs('dashboard.setting.whatsApp.index') ? 'active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>{{ __('WhatsApp') }}</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('dashboard.setting.paymentConfig.index') }}"
                                    class="nav-link {{ request()->routeIs('dashboard.setting.paymentConfig.index') ? 'active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>{{ __('Payment') }}</p>
                                </a>
                            </li>

                            {{-- <li class="nav-item">
                                <a href="{{ route('dashboard.setting.index') }}"
                                    class="nav-link {{ request()->routeIs('dashboard.setting.index') ? 'active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>{{ __('Content Management') }}</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('dashboard.setting.create') }}"
                                    class="nav-link {{ request()->routeIs('dashboard.setting.create') ? 'active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>{{ __('Create Content') }}</p>
                                </a>
                            </li> --}}

                        </ul>
                    </li>
                @endif
                <!-- Settings Section -->


                <!-- Logout -->
                <li class="nav-item">
                    <form id="logout-form" action="{{ route('admin.logout') }}" method="POST"
                        style="display: none;">
                        @csrf
                    </form>
                    <a href="#" class="nav-link"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="nav-icon far fa-circle text-danger"></i>
                        <p>{{ __('Logout') }}</p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
<!-- /.Main Sidebar Container -->
