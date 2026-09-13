<!DOCTYPE html>
<html lang="en" class="h-full bg-slate-900">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>419 Page Expired — Navagruha Infra Developers</title>
    <link rel="icon" href="{{ asset('images/favicon.png') }}" type="image/png">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        brand: {
                            500: '#22c55e',
                            600: '#16a34a',
                            700: '#15803d',
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
</head>
<body class="h-full flex items-center justify-center p-4 bg-corporate-950 relative overflow-hidden font-sans text-white">

    <div class="absolute -top-40 -left-40 w-96 h-96 bg-brand-600/15 rounded-full blur-3xl pointer-events-none"></div>
    <div class="absolute -bottom-40 -right-40 w-96 h-96 bg-emerald-500/10 rounded-full blur-3xl pointer-events-none"></div>

    <div class="w-full max-w-md text-center relative z-10 bg-corporate-900 border border-slate-800 rounded-3xl p-8 sm:p-10 shadow-2xl backdrop-blur-md">
        <div class="inline-flex p-3 rounded-2xl bg-amber-500/10 border border-amber-500/20 text-amber-400 mb-6">
            <i class="fa-solid fa-clock-rotate-left text-3xl"></i>
        </div>
        
        <h1 class="text-3xl font-extrabold text-white tracking-tight mb-2">Page Expired</h1>
        <p class="text-sm text-slate-400 mb-6 leading-relaxed">
            Your security session expired due to inactivity. This protects your account security.
        </p>

        <div class="space-y-3">
            <a href="{{ route('login') }}" class="w-full py-3.5 px-4 bg-brand-600 hover:bg-brand-500 text-white font-bold text-sm rounded-xl shadow-lg shadow-brand-600/30 transition-all flex items-center justify-center gap-2">
                <i class="fa-solid fa-right-to-bracket"></i>
                <span>Sign In Again</span>
            </a>

            <button onclick="window.location.reload();" type="button" class="w-full py-3 px-4 bg-slate-800 hover:bg-slate-700 text-slate-300 font-semibold text-xs rounded-xl border border-slate-700 transition-all flex items-center justify-center gap-2">
                <i class="fa-solid fa-rotate-right"></i>
                <span>Refresh Current Page</span>
            </button>
        </div>

        <div class="mt-6 pt-6 border-t border-slate-800">
            <a href="{{ route('home') }}" class="text-xs text-slate-500 hover:text-slate-300 transition-colors">
                &larr; Return to Home Page
            </a>
        </div>
    </div>

</body>
</html>
