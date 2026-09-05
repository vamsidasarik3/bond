<!DOCTYPE html>
<html lang="en" class="h-full bg-slate-50">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Admin Portal') — Navagruha Infra Developers</title>
    
    <!-- Favicon -->
    <link rel="icon" href="{{ asset('images/favicon.png') }}" type="image/png">

    <!-- Google Fonts: Plus Jakarta Sans & Inter -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Font Awesome 6.5.1 Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <!-- Chart.js 4.4.4 CDN for Dashboard Visualizations -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.4/dist/chart.umd.min.js"></script>

    <!-- Tailwind CSS CDN with custom real-estate brand theme -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        brand: {
                            50: '#f0fdf4',
                            100: '#dcfce7',
                            200: '#bbf7d0',
                            300: '#86efac',
                            400: '#4ade80',
                            500: '#22c55e',
                            600: '#16a34a', // Navagruha Emerald
                            700: '#15803d',
                            800: '#166534',
                            900: '#14532d',
                        },
                        corporate: {
                            800: '#1e293b',
                            900: '#0f172a',
                            950: '#020617',
                        }
                    },
                    fontFamily: {
                        sans: ['"Plus Jakarta Sans"', 'Inter', 'system-ui', 'sans-serif'],
                    },
                    boxShadow: {
                        'card': '0 1px 3px 0 rgba(0, 0, 0, 0.04), 0 1px 2px -1px rgba(0, 0, 0, 0.04)',
                        'card-hover': '0 10px 25px -5px rgba(15, 23, 42, 0.08), 0 8px 10px -6px rgba(15, 23, 42, 0.04)',
                    }
                }
            }
        }
    </script>
    
    <style>
        [x-cloak] { display: none !important; }
        /* Custom sleek scrollbars */
        ::-webkit-scrollbar { width: 5px; height: 5px; }
        ::-webkit-scrollbar-track { background: #f8fafc; }
        ::-webkit-scrollbar-thumb { background: #cbd5e1; border-radius: 4px; }
        ::-webkit-scrollbar-thumb:hover { background: #94a3b8; }
        
        /* Smooth transitions */
        .sidebar-transition {
            transition: width 0.25s cubic-bezier(0.4, 0, 0.2, 1), transform 0.25s cubic-bezier(0.4, 0, 0.2, 1);
        }
        
        /* Active nav pill indicator */
        .nav-active-pill {
            position: relative;
        }
        .nav-active-pill::before {
            content: '';
            position: absolute;
            left: 0;
            top: 20%;
            bottom: 20%;
            width: 3px;
            background: #4ade80;
            border-radius: 0 4px 4px 0;
        }
    </style>
</head>
<body class="h-full flex flex-col font-sans antialiased text-slate-800 bg-slate-50 selection:bg-brand-500 selection:text-white">

    <!-- Mobile Sidebar Backdrop Overlay -->
    <div id="sidebarBackdrop" onclick="toggleSidebarMobile()" class="fixed inset-0 z-40 bg-slate-950/60 backdrop-blur-xs hidden transition-opacity duration-300"></div>

    <div class="flex h-full min-h-screen overflow-hidden">

        <!-- ============================================================== -->
        <!-- 1. MODERN COLLAPSIBLE SIDEBAR NAVIGATION                        -->
        <!-- ============================================================== -->
        <aside id="sidebar" class="sidebar-transition fixed inset-y-0 left-0 z-50 flex flex-col w-72 bg-corporate-900 text-white shadow-2xl lg:shadow-none -translate-x-full lg:translate-x-0 lg:static lg:inset-auto border-r border-slate-800/80">
            
            <!-- Brand / Logo Area -->
            <div class="flex items-center justify-between px-5 h-20 border-b border-slate-800/80 bg-corporate-950/50">
                <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3 group min-w-0">
                    <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-brand-500 to-emerald-700 flex items-center justify-center text-white font-black shadow-md shadow-brand-500/20 shrink-0">
                        <i class="fa-solid fa-gem text-lg"></i>
                    </div>
                    <div class="flex flex-col min-w-0 sidebar-text">
                        <div class="flex items-center gap-1.5">
                            <span class="text-sm font-extrabold text-white tracking-tight truncate group-hover:text-brand-300 transition-colors">Navagruha Infra</span>
                        </div>
                        <div class="flex items-center gap-1.5 mt-0.5">
                            <span class="w-1.5 h-1.5 rounded-full bg-brand-400 animate-pulse"></span>
                            <span class="text-[11px] font-semibold text-brand-400 uppercase tracking-wider truncate">AIIMS Bibinagar</span>
                        </div>
                    </div>
                </a>
                
                <!-- Desktop Collapse Button -->
                <button onclick="toggleSidebarDesktop()" title="Toggle Sidebar" class="hidden lg:flex items-center justify-center w-8 h-8 rounded-lg text-slate-400 hover:text-white hover:bg-slate-800 transition-all focus:outline-none">
                    <i id="desktopToggleIcon" class="fa-solid fa-angles-left text-xs transition-transform duration-300"></i>
                </button>

                <!-- Close Button (Mobile Only) -->
                <button onclick="toggleSidebarMobile()" class="p-2 text-slate-400 hover:text-white rounded-lg lg:hidden focus:outline-none">
                    <i class="fa-solid fa-xmark text-lg"></i>
                </button>
            </div>

            <!-- Sidebar Navigation Links -->
            <nav class="flex-1 px-3.5 py-5 space-y-1.5 overflow-y-auto">
                <div class="px-3 pb-2 text-[10px] font-extrabold uppercase tracking-wider text-slate-400 sidebar-text">
                    Core Operations
                </div>

                <!-- 1. Dashboard -->
                <a href="{{ route('admin.dashboard') }}" 
                   title="Dashboard Overview"
                   class="flex items-center gap-3.5 px-3.5 py-2.5 rounded-xl font-semibold text-xs transition-all {{ request()->routeIs('admin.dashboard') ? 'bg-brand-600 text-white shadow-lg shadow-brand-600/25 nav-active-pill' : 'text-slate-300 hover:bg-slate-800/80 hover:text-white' }}">
                    <i class="fa-solid fa-chart-pie w-5 text-center text-sm {{ request()->routeIs('admin.dashboard') ? 'text-white' : 'text-slate-400' }}"></i>
                    <span class="sidebar-text">Dashboard</span>
                </a>

                <!-- 2. Projects Portfolio (Requirement #4) -->
                <a href="{{ route('admin.projects.index') }}" 
                   title="Project Portfolio"
                   class="flex items-center justify-between px-3.5 py-2.5 rounded-xl font-semibold text-xs transition-all {{ request()->routeIs('admin.projects.*') ? 'bg-brand-600 text-white shadow-lg shadow-brand-600/25 nav-active-pill' : 'text-slate-300 hover:bg-slate-800/80 hover:text-white' }}">
                    <div class="flex items-center gap-3.5 min-w-0">
                        <i class="fa-solid fa-city w-5 text-center text-sm {{ request()->routeIs('admin.projects.*') ? 'text-white' : 'text-slate-400' }}"></i>
                        <span class="sidebar-text truncate">Projects</span>
                    </div>
                    <span class="sidebar-text text-[10px] px-2 py-0.5 rounded-full font-bold {{ request()->routeIs('admin.projects.*') ? 'bg-white/20 text-white' : 'bg-slate-800 text-slate-400' }}">
                        2
                    </span>
                </a>

                <!-- 3. Plots Management -->
                <a href="{{ route('admin.plots.index') }}" 
                   title="Plots Inventory"
                   class="flex items-center justify-between px-3.5 py-2.5 rounded-xl font-semibold text-xs transition-all {{ request()->routeIs('admin.plots.*') ? 'bg-brand-600 text-white shadow-lg shadow-brand-600/25 nav-active-pill' : 'text-slate-300 hover:bg-slate-800/80 hover:text-white' }}">
                    <div class="flex items-center gap-3.5 min-w-0">
                        <i class="fa-solid fa-layer-group w-5 text-center text-sm {{ request()->routeIs('admin.plots.*') ? 'text-white' : 'text-slate-400' }}"></i>
                        <span class="sidebar-text truncate">Plots Inventory</span>
                    </div>
                    @php $plotCount = \App\Models\Plot::count(); @endphp
                    <span class="sidebar-text text-[10px] px-2 py-0.5 rounded-full font-bold {{ request()->routeIs('admin.plots.*') ? 'bg-white/20 text-white' : 'bg-slate-800 text-slate-400' }}">
                        {{ $plotCount }}
                    </span>
                </a>

                <!-- 4. Contact Enquiries / CRM -->
                <a href="{{ route('admin.enquiries.index') }}" 
                   title="Contact & Leads CRM"
                   class="flex items-center justify-between px-3.5 py-2.5 rounded-xl font-semibold text-xs transition-all {{ request()->routeIs('admin.enquiries.*') ? 'bg-brand-600 text-white shadow-lg shadow-brand-600/25 nav-active-pill' : 'text-slate-300 hover:bg-slate-800/80 hover:text-white' }}">
                    <div class="flex items-center gap-3.5 min-w-0">
                        <i class="fa-solid fa-envelope-open-text w-5 text-center text-sm {{ request()->routeIs('admin.enquiries.*') ? 'text-white' : 'text-slate-400' }}"></i>
                        <span class="sidebar-text truncate">Contact Leads</span>
                    </div>
                    @php $newCount = \App\Models\ContactEnquiry::where('status', 'new')->count(); @endphp
                    @if($newCount > 0)
                        <span class="sidebar-text text-[10px] px-2 py-0.5 rounded-full font-bold bg-amber-500 text-slate-950 animate-pulse">
                            {{ $newCount }} new
                        </span>
                    @else
                        @php $totalEnquiriesCount = \App\Models\ContactEnquiry::count(); @endphp
                        <span class="sidebar-text text-[10px] px-2 py-0.5 rounded-full font-bold bg-slate-800 text-slate-400">
                            {{ $totalEnquiriesCount }}
                        </span>
                    @endif
                </a>

                <div class="pt-6 px-3 pb-2 text-[10px] font-extrabold uppercase tracking-wider text-slate-400 sidebar-text">
                    Preferences & Site
                </div>

                <!-- 5. My Profile -->
                <a href="{{ route('admin.profile.index') }}" 
                   title="Admin Profile Settings"
                   class="flex items-center gap-3.5 px-3.5 py-2.5 rounded-xl font-semibold text-xs transition-all {{ request()->routeIs('admin.profile.*') ? 'bg-brand-600 text-white shadow-lg shadow-brand-600/25 nav-active-pill' : 'text-slate-300 hover:bg-slate-800/80 hover:text-white' }}">
                    <i class="fa-solid fa-user-gear w-5 text-center text-sm {{ request()->routeIs('admin.profile.*') ? 'text-white' : 'text-slate-400' }}"></i>
                    <span class="sidebar-text">Admin Settings</span>
                </a>

                <!-- 6. Public Website Preview -->
                <a href="{{ route('home') }}" target="_blank" 
                   title="Open Public Website"
                   class="flex items-center justify-between px-3.5 py-2.5 rounded-xl font-semibold text-xs text-slate-300 hover:bg-slate-800/80 hover:text-white transition-all">
                    <div class="flex items-center gap-3.5 min-w-0">
                        <i class="fa-solid fa-arrow-up-right-from-square w-5 text-center text-sm text-slate-400"></i>
                        <span class="sidebar-text truncate">Public Website</span>
                    </div>
                    <span class="sidebar-text text-[9px] uppercase font-bold text-emerald-400 bg-emerald-950/60 border border-emerald-800/50 px-1.5 py-0.5 rounded">Live</span>
                </a>
            </nav>

            <!-- Bottom User Profile Snippet & Logout -->
            <div class="p-3.5 border-t border-slate-800/80 bg-corporate-950/60">
                <div class="flex items-center justify-between gap-3">
                    <a href="{{ route('admin.profile.index') }}" class="flex items-center gap-3 min-w-0 group">
                        <img src="{{ Auth::user()->avatar_url }}" alt="{{ Auth::user()->name }}" class="w-9 h-9 rounded-xl object-cover ring-2 ring-brand-500/40 group-hover:ring-brand-400 transition-all shrink-0">
                        <div class="min-w-0 flex-1 sidebar-text">
                            <div class="text-xs font-bold text-white truncate group-hover:text-brand-300 transition-colors">
                                {{ Auth::user()->name }}
                            </div>
                            <div class="text-[11px] text-slate-400 truncate">
                                Super Administrator
                            </div>
                        </div>
                    </a>

                    <!-- Logout Button -->
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" title="Sign out" class="p-2 text-slate-400 hover:text-rose-400 hover:bg-rose-500/10 rounded-lg transition-all focus:outline-none">
                            <i class="fa-solid fa-arrow-right-from-bracket text-sm"></i>
                        </button>
                    </form>
                </div>
            </div>
        </aside>

        <!-- ============================================================== -->
        <!-- 2. MAIN VIEW AREA (Header + Content + Footer)                  -->
        <!-- ============================================================== -->
        <div class="flex-1 flex flex-col min-w-0 overflow-y-auto">

            <!-- Top Header / Modern SaaS Topbar -->
            <header class="sticky top-0 z-30 flex items-center justify-between h-18 px-4 sm:px-8 bg-white/90 backdrop-blur-md border-b border-slate-200/80 shadow-xs">
                
                <!-- Left: Mobile Menu Trigger + Breadcrumb / Title -->
                <div class="flex items-center gap-3 sm:gap-4">
                    <button onclick="toggleSidebarMobile()" class="p-2.5 -ml-2 text-slate-600 hover:text-slate-900 rounded-xl hover:bg-slate-100 lg:hidden focus:outline-none" aria-label="Open sidebar">
                        <i class="fa-solid fa-bars-staggered text-lg"></i>
                    </button>

                    <div>
                        <h1 class="text-lg sm:text-xl font-extrabold text-slate-900 tracking-tight flex items-center gap-2">
                            @yield('page-title', 'Dashboard')
                        </h1>
                        <div class="hidden sm:flex items-center gap-1.5 text-[11px] text-slate-400 font-medium">
                            <a href="{{ route('admin.dashboard') }}" class="hover:text-brand-600 transition-colors flex items-center gap-1">
                                <i class="fa-solid fa-house-chimney text-[10px]"></i>
                                <span>Admin</span>
                            </a>
                            <span>/</span>
                            <span class="text-slate-600 font-semibold">@yield('breadcrumb', 'Overview')</span>
                        </div>
                    </div>
                </div>

                <!-- Right: Quick actions, notifications & profile dropdown -->
                <div class="flex items-center gap-2.5 sm:gap-3.5">
                    
                    <!-- Quick Add Plot Shortcut -->
                    <a href="{{ route('admin.plots.create') }}" class="hidden sm:inline-flex items-center gap-2 px-3.5 py-2 text-xs font-bold text-white bg-brand-600 hover:bg-brand-500 rounded-xl shadow-xs shadow-brand-600/25 transition-all">
                        <i class="fa-solid fa-plus text-[11px]"></i>
                        <span>New Plot</span>
                    </a>

                    <!-- Enquiries Notification Bell with Popover Dropdown -->
                    <div class="relative" id="notificationsContainer">
                        <button type="button" onclick="toggleNotificationsMenu()" title="Notifications" class="relative p-2.5 text-slate-500 hover:text-slate-800 hover:bg-slate-100 rounded-xl transition-all focus:outline-none">
                            <i class="fa-regular fa-bell text-base"></i>
                            @if($newCount > 0)
                                <span class="absolute top-1.5 right-1.5 w-2.5 h-2.5 bg-amber-500 rounded-full ring-2 ring-white"></span>
                            @endif
                        </button>

                        <!-- Notification Dropdown Panel -->
                        <div id="notificationsDropdown" class="hidden absolute right-0 mt-2 w-80 sm:w-96 bg-white rounded-2xl shadow-xl border border-slate-200/80 p-4 z-50">
                            <div class="flex items-center justify-between pb-3 border-b border-slate-100 mb-3">
                                <div class="font-extrabold text-xs text-slate-900 uppercase tracking-wider">
                                    Enquiries & Leads
                                </div>
                                <span class="text-[11px] px-2 py-0.5 rounded-full font-bold bg-amber-50 text-amber-700 border border-amber-200">
                                    {{ $newCount }} Pending
                                </span>
                            </div>

                            @php
                                $recentNotifications = \App\Models\ContactEnquiry::latest()->take(4)->get();
                            @endphp

                            <div class="space-y-2 max-h-72 overflow-y-auto">
                                @forelse($recentNotifications as $item)
                                    <a href="{{ route('admin.enquiries.show', $item) }}" class="flex items-start gap-3 p-2.5 rounded-xl hover:bg-slate-50 transition-colors border border-transparent hover:border-slate-100">
                                        <div class="w-8 h-8 rounded-lg flex items-center justify-center text-xs shrink-0 {{ $item->status === 'new' ? 'bg-blue-50 text-blue-600 border border-blue-100' : 'bg-slate-100 text-slate-600' }}">
                                            <i class="fa-solid fa-user"></i>
                                        </div>
                                        <div class="min-w-0 flex-1">
                                            <div class="flex items-center justify-between text-xs">
                                                <span class="font-bold text-slate-900 truncate">{{ $item->name }}</span>
                                                <span class="text-[10px] text-slate-400">{{ $item->created_at->diffForHumans() }}</span>
                                            </div>
                                            <p class="text-[11px] text-slate-500 truncate mt-0.5">
                                                {{ $item->subject ?: $item->message ?: 'General contact enquiry' }}
                                            </p>
                                        </div>
                                    </a>
                                @empty
                                    <div class="text-center py-6 text-xs text-slate-400">
                                        No recent notifications.
                                    </div>
                                @endforelse
                            </div>

                            <div class="pt-3 mt-2 border-t border-slate-100 text-center">
                                <a href="{{ route('admin.enquiries.index') }}" class="text-xs font-bold text-brand-600 hover:text-brand-700">
                                    View All Leads & Enquiries →
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- User Profile Dropdown -->
                    <div class="relative pl-1 border-l border-slate-200" id="profileDropdownContainer">
                        <button type="button" onclick="toggleProfileMenu()" class="flex items-center gap-2.5 p-1 rounded-xl hover:bg-slate-100 transition-colors focus:outline-none">
                            <img src="{{ Auth::user()->avatar_url }}" alt="{{ Auth::user()->name }}" class="w-8 h-8 sm:w-9 sm:h-9 rounded-xl object-cover ring-2 ring-brand-500/20">
                            <div class="hidden md:block text-left">
                                <div class="text-xs font-bold text-slate-900 leading-tight">{{ Auth::user()->name }}</div>
                                <div class="text-[10px] text-brand-600 font-bold uppercase tracking-wider">Super Admin</div>
                            </div>
                            <i class="fa-solid fa-chevron-down text-[10px] text-slate-400 hidden sm:block"></i>
                        </button>

                        <!-- Profile Dropdown Menu -->
                        <div id="profileDropdownMenu" class="hidden absolute right-0 mt-2 w-56 bg-white rounded-2xl shadow-xl border border-slate-200/80 p-2 z-50">
                            <div class="px-3 py-2 border-b border-slate-100 mb-1">
                                <p class="text-xs font-bold text-slate-900">{{ Auth::user()->name }}</p>
                                <p class="text-[11px] text-slate-400 truncate">{{ Auth::user()->email }}</p>
                            </div>

                            <a href="{{ route('admin.profile.index') }}" class="flex items-center gap-2.5 px-3 py-2 text-xs font-semibold text-slate-700 hover:text-brand-700 hover:bg-brand-50 rounded-xl transition-colors">
                                <i class="fa-solid fa-user-gear text-slate-400"></i>
                                <span>Account Settings</span>
                            </a>

                            <a href="{{ route('home') }}" target="_blank" class="flex items-center justify-between px-3 py-2 text-xs font-semibold text-slate-700 hover:text-brand-700 hover:bg-brand-50 rounded-xl transition-colors">
                                <div class="flex items-center gap-2.5">
                                    <i class="fa-solid fa-arrow-up-right-from-square text-slate-400"></i>
                                    <span>Live Website</span>
                                </div>
                                <span class="text-[9px] uppercase font-bold text-emerald-600 bg-emerald-50 px-1.5 py-0.5 rounded">Live</span>
                            </a>

                            <div class="pt-1 mt-1 border-t border-slate-100">
                                <form action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <button type="submit" class="w-full flex items-center gap-2.5 px-3 py-2 text-xs font-semibold text-rose-600 hover:bg-rose-50 rounded-xl transition-colors text-left">
                                        <i class="fa-solid fa-arrow-right-from-bracket"></i>
                                        <span>Sign Out</span>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
            </header>

            <!-- Global Toast Container -->
            <div id="globalToastContainer" class="fixed top-5 right-5 z-50 flex flex-col gap-2 pointer-events-none"></div>

            <!-- Notification Alerts Area -->
            <div class="px-4 sm:px-8 pt-5">
                <!-- Flash Success Message -->
                @if(session('success'))
                    <div class="flex items-start gap-3 p-4 mb-4 text-xs text-emerald-900 bg-emerald-50/90 border border-emerald-200 rounded-2xl shadow-xs animate-fadeIn">
                        <i class="fa-solid fa-circle-check text-base text-emerald-600 shrink-0 mt-0.5"></i>
                        <div class="flex-1 font-semibold">{{ session('success') }}</div>
                        <button onclick="this.parentElement.remove()" class="text-emerald-500 hover:text-emerald-800 focus:outline-none">
                            <i class="fa-solid fa-xmark text-sm"></i>
                        </button>
                    </div>
                @endif

                <!-- Flash Error Message -->
                @if(session('error'))
                    <div class="flex items-start gap-3 p-4 mb-4 text-xs text-rose-900 bg-rose-50/90 border border-rose-200 rounded-2xl shadow-xs">
                        <i class="fa-solid fa-circle-exclamation text-base text-rose-600 shrink-0 mt-0.5"></i>
                        <div class="flex-1 font-semibold">{{ session('error') }}</div>
                        <button onclick="this.parentElement.remove()" class="text-rose-500 hover:text-rose-800 focus:outline-none">
                            <i class="fa-solid fa-xmark text-sm"></i>
                        </button>
                    </div>
                @endif

                <!-- Form Validation Errors -->
                @if(isset($errors) && $errors->any())
                    <div class="p-4 mb-4 text-xs text-rose-900 bg-rose-50/90 border border-rose-200 rounded-2xl shadow-xs">
                        <div class="flex items-center gap-2 font-bold mb-1.5 text-rose-900">
                            <i class="fa-solid fa-triangle-exclamation text-rose-600"></i>
                            <span>Please review the errors below:</span>
                        </div>
                        <ul class="list-disc list-inside space-y-1 text-[11px] text-rose-700 ml-1">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>

            <!-- Main Content Injection -->
            <main class="flex-1 px-4 sm:px-8 py-5 sm:py-6">
                @yield('content')
            </main>

            <!-- Bottom Admin Footer -->
            <footer class="px-4 sm:px-8 py-5 mt-auto border-t border-slate-200/80 bg-white text-center sm:text-left text-xs text-slate-500 flex flex-col sm:flex-row items-center justify-between gap-3">
                <div class="flex items-center gap-2">
                    <span class="w-2 h-2 rounded-full bg-emerald-500"></span>
                    <span>&copy; {{ date('Y') }} <strong class="text-slate-800">Navagruha Infra Developers</strong>. Client Demo Dashboard.</span>
                </div>
                <div class="flex items-center gap-4 text-[11px] text-slate-400">
                    <span>AIIMS Bibinagar 17-Acre Venture</span>
                    <span>•</span>
                    <span class="text-brand-600 font-bold">HMDA Final Approved</span>
                </div>
            </footer>

        </div>
    </div>

    <!-- ============================================================== -->
    <!-- 3. UNIVERSAL CONFIRMATION MODAL                                -->
    <!-- ============================================================== -->
    <div id="confirmModal" class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-slate-950/60 backdrop-blur-xs hidden transition-opacity">
        <div class="w-full max-w-md bg-white rounded-3xl shadow-2xl border border-slate-100 overflow-hidden transform transition-all scale-95 duration-200" id="confirmModalBox">
            <div class="p-6 sm:p-8 text-center">
                <div class="w-14 h-14 mx-auto mb-4 bg-rose-50 text-rose-600 rounded-2xl flex items-center justify-center text-2xl border border-rose-100 shadow-inner">
                    <i class="fa-solid fa-triangle-exclamation"></i>
                </div>
                <h3 class="text-lg font-bold text-slate-900 mb-2 tracking-tight" id="confirmModalTitle">Are you sure?</h3>
                <p class="text-xs text-slate-500 leading-relaxed mb-6" id="confirmModalMessage">
                    This action cannot be undone. Do you really want to proceed with this operation?
                </p>
                <div class="flex items-center justify-center gap-3">
                    <button type="button" onclick="closeConfirmModal()" class="px-5 py-2.5 text-xs font-bold text-slate-700 bg-slate-100 hover:bg-slate-200 rounded-xl transition-colors">
                        Cancel
                    </button>
                    <form id="confirmModalForm" method="POST" action="">
                        @csrf
                        <input type="hidden" name="_method" id="confirmModalMethod" value="DELETE">
                        <button type="submit" id="confirmModalButton" class="px-5 py-2.5 text-xs font-bold text-white bg-rose-600 hover:bg-rose-700 rounded-xl shadow-md shadow-rose-600/20 transition-all">
                            Yes, Delete
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts: Collapsible sidebar, dropdown handlers & confirmation modal -->
    <script>
        // Desktop Sidebar Collapse Toggle
        let isSidebarCollapsed = false;
        function toggleSidebarDesktop() {
            const sidebar = document.getElementById('sidebar');
            const toggleIcon = document.getElementById('desktopToggleIcon');
            const sidebarTexts = document.querySelectorAll('.sidebar-text');
            isSidebarCollapsed = !isSidebarCollapsed;

            if (isSidebarCollapsed) {
                sidebar.classList.remove('w-72');
                sidebar.classList.add('w-20');
                sidebarTexts.forEach(el => el.classList.add('hidden'));
                toggleIcon.classList.add('rotate-180');
            } else {
                sidebar.classList.remove('w-20');
                sidebar.classList.add('w-72');
                sidebarTexts.forEach(el => el.classList.remove('hidden'));
                toggleIcon.classList.remove('rotate-180');
            }
        }

        // Mobile Sidebar Drawer Toggle
        function toggleSidebarMobile() {
            const sidebar = document.getElementById('sidebar');
            const backdrop = document.getElementById('sidebarBackdrop');
            const isOpen = !sidebar.classList.contains('-translate-x-full');

            if (isOpen) {
                sidebar.classList.add('-translate-x-full');
                backdrop.classList.add('hidden');
            } else {
                sidebar.classList.remove('-translate-x-full');
                backdrop.classList.remove('hidden');
            }
        }

        // Notification and Profile Dropdown Toggles
        function toggleNotificationsMenu() {
            const menu = document.getElementById('notificationsDropdown');
            menu.classList.toggle('hidden');
            document.getElementById('profileDropdownMenu')?.classList.add('hidden');
        }

        function toggleProfileMenu() {
            const menu = document.getElementById('profileDropdownMenu');
            menu.classList.toggle('hidden');
            document.getElementById('notificationsDropdown')?.classList.add('hidden');
        }

        // Close dropdowns on outside click
        document.addEventListener('click', function(e) {
            const notifCont = document.getElementById('notificationsContainer');
            const profCont = document.getElementById('profileDropdownContainer');
            if (notifCont && !notifCont.contains(e.target)) {
                document.getElementById('notificationsDropdown')?.classList.add('hidden');
            }
            if (profCont && !profCont.contains(e.target)) {
                document.getElementById('profileDropdownMenu')?.classList.add('hidden');
            }
        });

        // Global Toast Notification Helper
        function showGlobalToast(message, type = 'success') {
            const container = document.getElementById('globalToastContainer');
            if (!container) return;

            const toast = document.createElement('div');
            const isError = type === 'error';
            toast.className = `pointer-events-auto flex items-center gap-3 px-4 py-3 rounded-2xl shadow-xl border text-xs font-bold transition-all duration-300 transform translate-y-2 opacity-0 ${
                isError ? 'bg-rose-950 text-white border-rose-800' : 'bg-slate-900 text-white border-slate-800'
            }`;
            toast.innerHTML = `
                <i class="fa-solid ${isError ? 'fa-circle-exclamation text-rose-400' : 'fa-circle-check text-emerald-400'} text-sm"></i>
                <span>${message}</span>
            `;

            container.appendChild(toast);
            setTimeout(() => {
                toast.classList.remove('translate-y-2', 'opacity-0');
            }, 10);

            setTimeout(() => {
                toast.classList.add('opacity-0', 'translate-y-2');
                setTimeout(() => toast.remove(), 300);
            }, 3500);
        }

        // Confirmation Modal Logic
        function openConfirmModal(actionUrl, title, message, buttonText = 'Yes, Delete', method = 'DELETE') {
            const modal = document.getElementById('confirmModal');
            const modalBox = document.getElementById('confirmModalBox');
            const form = document.getElementById('confirmModalForm');
            const titleEl = document.getElementById('confirmModalTitle');
            const msgEl = document.getElementById('confirmModalMessage');
            const btn = document.getElementById('confirmModalButton');
            const methodEl = document.getElementById('confirmModalMethod');

            form.action = actionUrl;
            methodEl.value = method;
            titleEl.textContent = title || 'Confirm Action';
            msgEl.textContent = message || 'Are you sure you want to proceed?';
            btn.textContent = buttonText;

            modal.classList.remove('hidden');
            setTimeout(() => {
                modalBox.classList.remove('scale-95');
                modalBox.classList.add('scale-100');
            }, 10);
        }

        function closeConfirmModal() {
            const modal = document.getElementById('confirmModal');
            const modalBox = document.getElementById('confirmModalBox');
            modalBox.classList.remove('scale-100');
            modalBox.classList.add('scale-95');
            setTimeout(() => {
                modal.classList.add('hidden');
            }, 150);
        }

        // Close on ESC key
        document.addEventListener('keydown', function(event) {
            if (event.key === 'Escape') {
                closeConfirmModal();
                document.getElementById('notificationsDropdown')?.classList.add('hidden');
                document.getElementById('profileDropdownMenu')?.classList.add('hidden');
            }
        });
    </script>

    @stack('scripts')
</body>
</html>
