@extends('layouts.modern-welcome')

@section('content')
    <!-- Hero Section -->
    <div class="min-h-screen bg-gradient-to-br from-sky-300 via-sky-400 to-teal-400 dark:from-gray-900 dark:via-gray-800 dark:to-gray-700 flex items-center justify-center p-4 relative overflow-hidden transition-colors duration-500">
        
        <!-- Theme Toggle -->
        <div x-show="true"
             x-transition:enter="transition ease-out duration-300 delay-300"
             x-transition:enter-start="opacity-0 transform scale-0"
             x-transition:enter-end="opac   ity-100 transform scale-100"
             class="absolute top-4 right-4 z-20">
            <button @click="darkMode = !darkMode" 
                    class="p-3 rounded-full bg-white/20 dark:bg-gray-800/20 backdrop-blur-md border border-white/30 dark:border-gray-700/30 hover:bg-white/30 dark:hover:bg-gray-700/30 transition-all duration-300 shadow-lg">
                <i data-lucide="sun" class="w-6 h-6 text-yellow-400 dark:hidden"></i>
                <i data-lucide="moon" class="w-6 h-6 text-blue-200 hidden dark:block"></i>
            </button>
        </div>

        <!-- Background Effects -->
        <div class="absolute inset-0 overflow-hidden pointer-events-none">
            <div class="absolute -top-32 -right-32 w-64 h-64 bg-white dark:bg-gray-200 rounded-full blur-3xl animate-fade-in-scale floating-bg-1" 
                 style="animation-delay: 0.5s;"></div>
            <div class="absolute -bottom-32 -left-32 w-64 h-64 bg-teal-200 dark:bg-teal-800 rounded-full blur-3xl animate-fade-in-scale floating-bg-2" 
                 style="animation-delay: 1s;"></div>
            
            <!-- Additional floating elements -->
            <div class="absolute top-20 left-10 w-32 h-32 bg-sky-200 dark:bg-sky-700 rounded-full blur-2xl opacity-20 floating-bg-1" 
                 style="animation-delay: 2s;"></div>
            <div class="absolute bottom-20 right-20 w-40 h-40 bg-teal-300 dark:bg-teal-600 rounded-full blur-2xl opacity-20 floating-bg-2" 
                 style="animation-delay: 3s;"></div>
        </div>

        <!-- Main Content -->
        <div x-show="true"
             x-transition:enter="transition ease-out duration-600"
             x-transition:enter-start="opacity-0 transform translate-y-8"
             x-transition:enter-end="opacity-100 transform translate-y-0"
             class="relative z-10 w-full max-w-4xl mx-auto">
            
            <!-- Hero Content -->
            <div class="bg-white/95 dark:bg-gray-900/95 backdrop-blur-xl rounded-[30px] p-8 shadow-2xl border border-white/20 dark:border-gray-700/20 w-full">
                <!-- Header -->
                <div class="text-center mb-8">
                    <div x-show="true" 
                         x-transition:enter="transition ease-out duration-500 delay-200"
                         x-transition:enter-start="opacity-0 transform -translate-y-2"
                         x-transition:enter-end="opacity-100 transform translate-y-0"
                         class="flex items-center justify-center mb-4">
                        <i data-lucide="shield-check" class="h-8 w-8 text-sky-500 dark:text-sky-400 mr-3"></i>
                        <span class="text-2xl font-semibold text-gray-800 dark:text-gray-200">Selamat Datang di</span>
                    </div>

                    <h1 x-show="true"
                        x-transition:enter="transition ease-out duration-500 delay-300"
                        x-transition:enter-start="opacity-0 transform scale-90"
                        x-transition:enter-end="opacity-100 transform scale-100"
                        class="text-5xl font-extrabold bg-gradient-to-r from-sky-500 to-teal-500 dark:from-sky-400 dark:to-teal-400 bg-clip-text text-transparent mb-4">
                        ProPangkat
                    </h1>

                    <div x-show="true"
                         x-transition:enter="transition ease-out duration-500 delay-400"
                         x-transition:enter-start="opacity-0 transform translate-y-2"
                         x-transition:enter-end="opacity-100 transform translate-y-0"
                         class="space-y-2">
                        <p class="text-xl font-semibold text-gray-800 dark:text-gray-200">Proses Kenaikan Pangkat Terintegrasi</p>
                        <p class="text-gray-500 dark:text-gray-400">Dinas Pendidikan dan Kebudayaan Prov. Kaltim Kalimantan Timur</p>
                    </div>
                </div>

                <!-- Hero Description -->
                <div x-show="true"
                     x-transition:enter="transition ease-out duration-500 delay-500"
                     x-transition:enter-start="opacity-0"
                     x-transition:enter-end="opacity-100"
                     class="text-center mb-8 max-w-2xl mx-auto">
                    <p class="text-gray-700 dark:text-gray-300 leading-relaxed">
                        Platform digital untuk memudahkan proses kenaikan pangkat pegawai di lingkungan 
                        Dinas Pendidikan dan Kebudayaan Provinsi Kalimantan Timur. ProPangkat hadir dengan
                        sistem yang terintegrasi, mudah digunakan, dan mempercepat proses kenaikan pangkat Anda.
                    </p>
                </div>

                <!-- CTA Button -->
                <div x-show="true"
                     x-transition:enter="transition ease-out duration-500 delay-600"
                     x-transition:enter-start="opacity-0 transform translate-y-4"
                     x-transition:enter-end="opacity-100 transform translate-y-0"
                     class="text-center">
                    <a href="{{ route('login') }}" 
                       class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-sky-500 to-teal-500 hover:from-sky-600 hover:to-teal-600 text-white font-semibold rounded-full transition-all duration-300 shadow-lg">
                        <span>Masuk ke ProPangkat</span>
                        <i data-lucide="arrow-right" class="w-5 h-5 ml-2"></i>
                    </a>
                </div>
            </div>
        </div>

        <!-- Footer -->
        <footer x-show="true"
                x-transition:enter="transition ease-out duration-500 delay-1000"
                x-transition:enter-start="opacity-0 transform translate-y-4"
                x-transition:enter-end="opacity-100 transform translate-y-0"
                class="absolute bottom-6 left-1/2 transform -translate-x-1/2 z-10">
            <p class="text-sky-100 dark:text-gray-300 text-xs text-center font-medium px-4">
                © {{ date('Y') }} Dinas Pendidikan dan Kebudayaan Prov. Kaltim Kalimantan Timur
            </p>
        </footer>

        <!-- Scroll indicator for mobile -->
        <div x-show="true"
             x-transition:enter="transition ease-out duration-500 delay-1200"
             x-transition:enter-start="opacity-0"
             x-transition:enter-end="opacity-100"
             class="absolute bottom-20 left-1/2 transform -translate-x-1/2 z-10 lg:hidden">
            <div class="flex flex-col items-center space-y-2 text-white/70 dark:text-gray-300/70">
                <span class="text-xs font-medium">Scroll untuk melihat lebih</span>
                <i data-lucide="chevron-down" class="w-4 h-4 animate-bounce"></i>
            </div>
        </div>
    </div>

    <!-- Features Section -->
    <div class="min-h-screen bg-gradient-to-br from-teal-400 via-blue-500 to-purple-600 dark:from-gray-800 dark:via-gray-900 dark:to-black flex items-center justify-center p-4 transition-colors duration-500">
        <div class="text-center text-white dark:text-gray-200 max-w-4xl mx-auto">
            <div x-intersect="$el.classList.add('animate-fade-in-up')"
                 class="opacity-0 transform translate-y-8 transition-all duration-1000">
                <h2 class="text-4xl md:text-6xl font-bold mb-6">
                    Sistem Terintegrasi
                </h2>
                <p class="text-xl md:text-2xl mb-8 leading-relaxed">
                    Platform digital untuk memudahkan proses kenaikan pangkat pegawai di lingkungan Dinas Pendidikan dan Kebudayaan Provinsi Kalimantan Timur
                </p>
                
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mt-12">
                    <div class="bg-white/10 dark:bg-gray-800/20 backdrop-blur-md rounded-xl p-6 border border-white/20 dark:border-gray-700/20">
                        <div class="w-16 h-16 mx-auto mb-4 bg-blue-500 rounded-full flex items-center justify-center">
                            <i data-lucide="zap" class="w-8 h-8 text-white"></i>
                        </div>
                        <h3 class="text-xl font-semibold mb-2">Proses Cepat</h3>
                        <p class="text-sm opacity-90">Pengajuan dan verifikasi kenaikan pangkat yang efisien dan real-time</p>
                    </div>
                    
                    <div class="bg-white/10 dark:bg-gray-800/20 backdrop-blur-md rounded-xl p-6 border border-white/20 dark:border-gray-700/20">
                        <div class="w-16 h-16 mx-auto mb-4 bg-green-500 rounded-full flex items-center justify-center">
                            <i data-lucide="shield-check" class="w-8 h-8 text-white"></i>
                        </div>
                        <h3 class="text-xl font-semibold mb-2">Aman & Terpercaya</h3>
                        <p class="text-sm opacity-90">Sistem keamanan tinggi untuk melindungi data dan informasi pegawai</p>
                    </div>
                    
                    <div class="bg-white/10 dark:bg-gray-800/20 backdrop-blur-md rounded-xl p-6 border border-white/20 dark:border-gray-700/20">
                        <div class="w-16 h-16 mx-auto mb-4 bg-purple-500 rounded-full flex items-center justify-center">
                            <i data-lucide="activity" class="w-8 h-8 text-white"></i>
                        </div>
                        <h3 class="text-xl font-semibold mb-2">Monitoring Real-time</h3>
                        <p class="text-sm opacity-90">Pantau status pengajuan dan proses kenaikan pangkat secara langsung</p>
                    </div>
                </div>
                
                <div class="mt-12">
                    <a href="#"
                       onclick="window.scrollTo({top: 0, behavior: 'smooth'})"
                       class="inline-flex items-center px-8 py-4 bg-white/20 dark:bg-gray-800/20 backdrop-blur-md border border-white/30 dark:border-gray-700/30 rounded-full text-white font-semibold hover:bg-white/30 dark:hover:bg-gray-700/30 transition-all duration-300 shadow-lg">
                        <i data-lucide="arrow-up" class="w-5 h-5 mr-2"></i>
                        Kembali ke Atas
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
<script>
    // Initialize Lucide icons
    document.addEventListener('DOMContentLoaded', function() {
        lucide.createIcons();
    });
    
    // Re-initialize icons when Alpine.js updates the DOM
    document.addEventListener('alpine:initialized', function() {
        lucide.createIcons();
    });

    // Add intersection observer for animations
    if ('IntersectionObserver' in window) {
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('animate-fade-in-up');
                    // Re-initialize icons for newly visible elements
                    setTimeout(() => lucide.createIcons(), 100);
                }
            });
        }, { threshold: 0.1 });

        // Observe elements when DOM is ready
        document.addEventListener('DOMContentLoaded', () => {
            const elements = document.querySelectorAll('[x-intersect]');
            elements.forEach(el => observer.observe(el));
        });
    }
</script>

<style>
/* Animation styles */
.animate-fade-in-scale {
    animation: fadeInScale 3s ease-in-out infinite alternate;
}

@keyframes fadeInScale {
    0% {
        opacity: 0.5;
        transform: scale(0.8);
    }
    100% {
        opacity: 1;
        transform: scale(1);
    }
}

.floating-bg-1 {
    animation: float1 15s ease-in-out infinite alternate;
}

.floating-bg-2 {
    animation: float2 18s ease-in-out infinite alternate;
}

@keyframes float1 {
    0% {
        transform: translate(0, 0) scale(1);
    }
    50% {
        transform: translate(50px, -30px) scale(1.1);
    }
    100% {
        transform: translate(-20px, 20px) scale(0.9);
    }
}

@keyframes float2 {
    0% {
        transform: translate(0, 0) scale(1);
    }
    50% {
        transform: translate(-40px, 40px) scale(1.1);
    }
    100% {
        transform: translate(30px, -30px) scale(0.9);
    }
}

.animate-fade-in-up {
    opacity: 1 !important;
    transform: translateY(0) !important;
}
</style>
@endpush
