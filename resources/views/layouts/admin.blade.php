<!DOCTYPE html>
<html lang="en" class="h-full bg-slate-50">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Admin Portal') — Navagruha Infra Developers</title>
    
    <!-- Favicon -->
    <link rel="icon" href="{{ asset('images/favicon.png') }}" type="image/png">

    <!-- Fonts: Plus Jakarta Sans & Inter -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <!-- Tailwind CSS CDN with custom brand extensions -->
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
                            600: '#16a34a', // Navagruha Primary Green
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
                    }
                }
            }
        }
    </script>
    
    <style>
        [x-cloak] { display: none !important; }
        /* Custom scrollbars */
        ::-webkit-scrollbar { width: 6px; height: 6px; }
        ::-webkit-scrollbar-track { background: #f1f5f9; }
        ::-webkit-scrollbar-thumb { background: #cbd5e1; border-radius: 4px; }
        ::-webkit-scrollbar-thumb:hover { background: #94a3b8; }
    </style>
</head>
<body class="h-full flex flex-col font-sans antialiased text-slate-800 bg-slate-50">

    <!-- Mobile Sidebar Backdrop -->
    <div id="sidebarBackdrop" onclick="toggleSidebar()" class="fixed inset-0 z-40 bg-slate-900/60 backdrop-blur-sm hidden transition-opacity duration-300"></div>

    <div class="flex h-full min-h-screen overflow-hidden">

        <!-- ============================================================== -->
        <!-- 1. LEFT SIDEBAR NAVIGATION                                     -->
        <!-- ============================================================== -->
        <aside id="sidebar" class="fixed inset-y-0 left-0 z-50 flex flex-col w-72 bg-corporate-900 text-white transition-transform duration-300 ease-in-out -translate-x-full lg:translate-x-0 lg:static lg:inset-auto">
            
            <!-- Brand / Logo Area -->
            <div class="flex items-center justify-between px-6 h-20 border-b border-slate-800/80 bg-corporate-950/40">
                <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3">
                    <img src="{{ asset('images/navagruha-logo-white.png') }}" alt="Navagruha Infra" class="h-10 w-auto object-contain" onerror="this.onerror=null; this.src='{{ asset('images/navagruha-logo.png') }}';">
                    <div class="flex flex-col">
                        <span class="text-xs font-bold uppercase tracking-widest text-brand-400">Admin Portal</span>
                        <span class="text-[11px] text-slate-400 font-medium">AIIMS Bibinagar Venture</span>
                    </div>
                </a>
                
                <!-- Close Button (Mobile Only) -->
                <button onclick="toggleSidebar()" class="p-2 text-slate-400 hover:text-white rounded-lg lg:hidden focus:outline-none">
                    <i class="fa-solid fa-xmark text-lg"></i>
                </button>
            </div>

            <!-- Sidebar Navigation Links -->
            <nav class="flex-1 px-4 py-6 space-y-1.5 overflow-y-auto">
                <div class="px-3 pb-2 text-[11px] font-bold uppercase tracking-wider text-slate-400">
                    Core Modules
                </div>

                <!-- Dashboard -->
                <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3.5 px-3.5 py-3 rounded-xl font-semibold text-sm transition-all {{ request()->routeIs('admin.dashboard') ? 'bg-brand-600 text-white shadow-lg shadow-brand-600/25' : 'text-slate-300 hover:bg-slate-800/80 hover:text-white' }}">
                    <i class="fa-solid fa-chart-pie w-5 text-center text-base {{ request()->routeIs('admin.dashboard') ? 'text-white' : 'text-slate-400' }}"></i>
                    <span>Dashboard</span>
                </a>

                <!-- Plots Management -->
                <a href="{{ route('admin.plots.index') }}" class="flex items-center justify-between px-3.5 py-3 rounded-xl font-semibold text-sm transition-all {{ request()->routeIs('admin.plots.*') ? 'bg-brand-600 text-white shadow-lg shadow-brand-600/25' : 'text-slate-300 hover:bg-slate-800/80 hover:text-white' }}">
                    <div class="flex items-center gap-3.5">
                        <i class="fa-solid fa-layer-group w-5 text-center text-base {{ request()->routeIs('admin.plots.*') ? 'text-white' : 'text-slate-400' }}"></i>
                        <span>Plots</span>
                    </div>
                    @php $plotCount = \App\Models\Plot::count(); @endphp
                    <span class="text-xs px-2 py-0.5 rounded-full font-bold {{ request()->routeIs('admin.plots.*') ? 'bg-white/20 text-white' : 'bg-slate-800 text-slate-400' }}">
                        {{ $plotCount }}
                    </span>
                </a>

                <!-- Contact Enquiries -->
                <a href="{{ route('admin.enquiries.index') }}" class="flex items-center justify-between px-3.5 py-3 rounded-xl font-semibold text-sm transition-all {{ request()->routeIs('admin.enquiries.*') ? 'bg-brand-600 text-white shadow-lg shadow-brand-600/25' : 'text-slate-300 hover:bg-slate-800/80 hover:text-white' }}">
                    <div class="flex items-center gap-3.5">
                        <i class="fa-solid fa-envelope-open-text w-5 text-center text-base {{ request()->routeIs('admin.enquiries.*') ? 'text-white' : 'text-slate-400' }}"></i>
                        <span>Contact Enquiries</span>
                    </div>
                    @php $newCount = \App\Models\ContactEnquiry::where('status', 'new')->count(); @endphp
                    @if($newCount > 0)
                        <span class="text-xs px-2 py-0.5 rounded-full font-bold bg-amber-500 text-slate-950 animate-pulse">
                            {{ $newCount }} new
                        </span>
                    @endif
                </a>

                <div class="pt-6 px-3 pb-2 text-[11px] font-bold uppercase tracking-wider text-slate-400">
                    Account & Preferences
                </div>

                <!-- My Profile -->
                <a href="{{ route('admin.profile.index') }}" class="flex items-center gap-3.5 px-3.5 py-3 rounded-xl font-semibold text-sm transition-all {{ request()->routeIs('admin.profile.*') ? 'bg-brand-600 text-white shadow-lg shadow-brand-600/25' : 'text-slate-300 hover:bg-slate-800/80 hover:text-white' }}">
                    <i class="fa-solid fa-user-gear w-5 text-center text-base {{ request()->routeIs('admin.profile.*') ? 'text-white' : 'text-slate-400' }}"></i>
                    <span>My Profile</span>
                </a>

                <!-- Public Site Link -->
                <a href="{{ route('home') }}" target="_blank" class="flex items-center justify-between px-3.5 py-3 rounded-xl font-semibold text-sm text-slate-300 hover:bg-slate-800/80 hover:text-white transition-all">
                    <div class="flex items-center gap-3.5">
                        <i class="fa-solid fa-arrow-up-right-from-square w-5 text-center text-base text-slate-400"></i>
                        <span>Public Website</span>
                    </div>
                    <span class="text-[10px] uppercase font-bold text-slate-400 bg-slate-800 px-1.5 py-0.5 rounded">Live</span>
                </a>
            </nav>

            <!-- Bottom User Profile Snippet & Logout -->
            <div class="p-4 border-t border-slate-800/80 bg-corporate-950/50">
                <div class="flex items-center justify-between gap-3">
                    <a href="{{ route('admin.profile.index') }}" class="flex items-center gap-3 min-w-0 group">
                        <img src="{{ Auth::user()->avatar_url }}" alt="{{ Auth::user()->name }}" class="w-10 h-10 rounded-full object-cover border-2 border-brand-500/40 group-hover:border-brand-400 transition-colors">
                        <div class="min-w-0 flex-1">
                            <div class="text-sm font-semibold text-white truncate group-hover:text-brand-300 transition-colors">
                                {{ Auth::user()->name }}
                            </div>
                            <div class="text-xs text-slate-400 truncate">
                                {{ Auth::user()->email }}
                            </div>
                        </div>
                    </a>

                    <!-- Logout Button -->
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" title="Logout" class="p-2.5 text-slate-400 hover:text-rose-400 hover:bg-rose-500/10 rounded-lg transition-all focus:outline-none">
                            <i class="fa-solid fa-arrow-right-from-bracket text-base"></i>
                        </button>
                    </form>
                </div>
            </div>
        </aside>

        <!-- ============================================================== -->
        <!-- 2. MAIN VIEW AREA (Header + Content + Footer)                  -->
        <!-- ============================================================== -->
        <div class="flex-1 flex flex-col min-w-0 overflow-y-auto">

            <!-- Top Header / Navbar -->
            <header class="sticky top-0 z-30 flex items-center justify-between h-20 px-4 sm:px-8 bg-white border-b border-slate-200/80 shadow-xs">
                
                <!-- Left: Hamburger toggle + Breadcrumb / Title -->
                <div class="flex items-center gap-4">
                    <button onclick="toggleSidebar()" class="p-2.5 -ml-2 text-slate-600 hover:text-slate-900 rounded-xl hover:bg-slate-100 lg:hidden focus:outline-none">
                        <i class="fa-solid fa-bars-staggered text-xl"></i>
                    </button>

                    <div>
                        <h1 class="text-xl font-extrabold text-slate-900 tracking-tight">
                            @yield('page-title', 'Dashboard')
                        </h1>
                        <div class="hidden sm:flex items-center gap-2 text-xs text-slate-400 font-medium mt-0.5">
                            <a href="{{ route('admin.dashboard') }}" class="hover:text-brand-600 transition-colors">Admin</a>
                            <span>/</span>
                            <span class="text-slate-600">@yield('breadcrumb', 'Overview')</span>
                        </div>
                    </div>
                </div>

                <!-- Right: Status actions & Profile quick actions -->
                <div class="flex items-center gap-3 sm:gap-4">
                    
                    <!-- Quick Add Plot Shortcut -->
                    <a href="{{ route('admin.plots.create') }}" class="hidden sm:inline-flex items-center gap-2 px-3.5 py-2 text-xs font-bold text-white bg-brand-600 hover:bg-brand-700 rounded-lg shadow-sm shadow-brand-600/20 transition-all">
                        <i class="fa-solid fa-plus text-xs"></i>
                        <span>New Plot</span>
                    </a>

                    <!-- Enquiries Notification Bell -->
                    <a href="{{ route('admin.enquiries.index', ['status' => 'new']) }}" title="New Enquiries" class="relative p-2.5 text-slate-500 hover:text-slate-800 hover:bg-slate-100 rounded-xl transition-all">
                        <i class="fa-regular fa-bell text-lg"></i>
                        @if($newCount > 0)
                            <span class="absolute top-1.5 right-1.5 w-2.5 h-2.5 bg-amber-500 rounded-full ring-2 ring-white"></span>
                        @endif
                    </a>

                    <!-- Avatar Dropdown Trigger -->
                    <div class="flex items-center pl-2 border-l border-slate-200">
                        <a href="{{ route('admin.profile.index') }}" class="flex items-center gap-3 p-1 rounded-xl hover:bg-slate-100 transition-colors">
                            <img src="{{ Auth::user()->avatar_url }}" alt="{{ Auth::user()->name }}" class="w-9 h-9 rounded-full object-cover ring-2 ring-brand-500/20">
                            <div class="hidden md:block text-left">
                                <div class="text-xs font-bold text-slate-900 leading-tight">{{ Auth::user()->name }}</div>
                                <div class="text-[11px] text-brand-600 font-semibold uppercase tracking-wider">Super Admin</div>
                            </div>
                        </a>
                    </div>
                </div>
            </header>

            <!-- Notification Alerts Area -->
            <div class="px-4 sm:px-8 pt-6">
                <!-- Flash Success Message -->
                @if(session('success'))
                    <div class="flex items-start gap-3 p-4 mb-4 text-sm text-emerald-800 bg-emerald-50 border border-emerald-200 rounded-xl shadow-xs animate-fadeIn">
                        <i class="fa-solid fa-circle-check text-lg text-emerald-600 shrink-0 mt-0.5"></i>
                        <div class="flex-1 font-medium">{{ session('success') }}</div>
                        <button onclick="this.parentElement.remove()" class="text-emerald-500 hover:text-emerald-800 focus:outline-none">
                            <i class="fa-solid fa-xmark text-sm"></i>
                        </button>
                    </div>
                @endif

                <!-- Flash Error Message -->
                @if(session('error'))
                    <div class="flex items-start gap-3 p-4 mb-4 text-sm text-rose-800 bg-rose-50 border border-rose-200 rounded-xl shadow-xs">
                        <i class="fa-solid fa-circle-exclamation text-lg text-rose-600 shrink-0 mt-0.5"></i>
                        <div class="flex-1 font-medium">{{ session('error') }}</div>
                        <button onclick="this.parentElement.remove()" class="text-rose-500 hover:text-rose-800 focus:outline-none">
                            <i class="fa-solid fa-xmark text-sm"></i>
                        </button>
                    </div>
                @endif

                <!-- General Form Validation Errors -->
                @if(isset($errors) && $errors->any())
                    <div class="p-4 mb-4 text-sm text-rose-800 bg-rose-50 border border-rose-200 rounded-xl shadow-xs">
                        <div class="flex items-center gap-2 font-bold mb-1 text-rose-900">
                            <i class="fa-solid fa-triangle-exclamation text-rose-600"></i>
                            <span>Please check the errors below:</span>
                        </div>
                        <ul class="list-disc list-inside space-y-1 text-xs text-rose-700 ml-1">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>

            <!-- Main Content Injection -->
            <main class="flex-1 px-4 sm:px-8 py-6">
                @yield('content')
            </main>

            <!-- Bottom Admin Footer -->
            <footer class="px-4 sm:px-8 py-5 mt-auto border-t border-slate-200 bg-white text-center sm:text-left text-xs text-slate-500 flex flex-col sm:flex-row items-center justify-between gap-2">
                <div>
                    &copy; {{ date('Y') }} <strong class="text-slate-700">Navagruha Infra Developers</strong>. All rights reserved.
                </div>
                <div class="flex items-center gap-4 text-slate-400">
                    <span>AIIMS Bibinagar 17-Acre Venture</span>
                    <span>•</span>
                    <span class="text-brand-600 font-semibold">HMDA & RERA Approved</span>
                </div>
            </footer>

        </div>
    </div>

    <!-- ============================================================== -->
    <!-- 3. UNIVERSAL CONFIRMATION MODAL                                -->
    <!-- ============================================================== -->
    <div id="confirmModal" class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-slate-900/60 backdrop-blur-xs hidden transition-opacity">
        <div class="w-full max-w-md bg-white rounded-2xl shadow-2xl border border-slate-100 overflow-hidden transform transition-all scale-95 duration-200" id="confirmModalBox">
            <div class="p-6 text-center">
                <div class="w-14 h-14 mx-auto mb-4 bg-rose-50 text-rose-600 rounded-2xl flex items-center justify-center text-2xl border border-rose-100 shadow-inner">
                    <i class="fa-solid fa-triangle-exclamation"></i>
                </div>
                <h3 class="text-lg font-bold text-slate-900 mb-2" id="confirmModalTitle">Are you sure?</h3>
                <p class="text-sm text-slate-500 leading-relaxed mb-6" id="confirmModalMessage">
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

    <!-- Scripts: Mobile sidebar toggle & confirmation modal handlers -->
    <script>
        function toggleSidebar() {
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
            msgEl.textContent = message || 'Are you sure you want to delete this item?';
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

        // Close on ESC
        document.addEventListener('keydown', function(event) {
            if (event.key === 'Escape') {
                closeConfirmModal();
            }
        });
    </script>

    @stack('scripts')
</body>
</html>
