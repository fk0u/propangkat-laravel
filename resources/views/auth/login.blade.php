@extends('layouts.welcome')

@section('content')
<div x-data="mockLogin" class="min-h-screen bg-gradient-to-br from-sky-300 via-sky-400 to-teal-400 dark:from-gray-900 dark:via-gray-800 dark:to-gray-700 flex items-center justify-center p-4 relative overflow-hidden transition-colors duration-500">
    <!-- Theme Toggle -->
    <div class="absolute top-4 right-4 z-20">
        <button @click="darkMode = !darkMode"
                class="p-3 rounded-full bg-white/20 dark:bg-gray-800/20 backdrop-blur-md border border-white/30 dark:border-gray-700/30 hover:bg-white/30 dark:hover:bg-gray-700/30 transition-all duration-300 shadow-lg">
            <i data-lucide="sun" class="w-6 h-6 text-yellow-400 dark:hidden"></i>
            <i data-lucide="moon" class="w-6 h-6 text-blue-200 hidden dark:block"></i>
        </button>
    </div>

    <!-- Back to Home Button -->
    <div class="absolute top-4 left-4 z-20">
        <a href="{{ url('/') }}"
           class="flex items-center p-2 text-gray-600 dark:text-gray-300 hover:text-gray-800 dark:hover:text-white bg-white/20 dark:bg-gray-800/20 backdrop-blur-md rounded-full shadow-sm border border-white/30 dark:border-gray-700/30 hover:border-gray-300 dark:hover:border-gray-600 transition-all">
            <i data-lucide="arrow-left" class="w-4 h-4 mr-1"></i>
            <span class="hidden sm:inline text-sm font-medium">Kembali</span>
        </a>
    </div>

    <!-- Main Content -->
    <div class="relative z-10 w-full max-w-xl mx-auto">
        <div class="bg-white/95 dark:bg-gray-900/95 backdrop-blur-xl rounded-[30px] p-8 shadow-2xl border border-white/20 dark:border-gray-700/20">
            <div class="text-center mb-8">
                <div class="flex items-center justify-center mb-4">
                    <i data-lucide="shield-check" class="h-8 w-8 text-sky-500 dark:text-sky-400 mr-3"></i>
                    <span class="text-2xl font-semibold text-gray-800 dark:text-gray-200">Selamat Datang di</span>
                </div>
                <h1 class="text-4xl font-extrabold bg-gradient-to-r from-sky-500 to-teal-500 dark:from-sky-400 dark:to-teal-400 bg-clip-text text-transparent mb-4">ProPangkat</h1>
                <p class="text-xl font-semibold text-gray-800 dark:text-gray-200">Proses Kenaikan Pangkat Terintegrasi</p>
                <p class="text-gray-500 dark:text-gray-400">Dinas Pendidikan dan Kebudayaan Prov. Kaltim Kalimantan Timur</p>
            </div>

            <!-- Notification Message -->
            <template x-if="message">
                <div :class="messageType === 'success' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800'" class="mb-4 p-3 rounded-lg text-center font-semibold">
                    <span x-text="message"></span>
                </div>
            </template>

            <!-- Login Form -->
            <form @submit="submit" class="space-y-6">
                <!-- Role Selection -->
                <div class="grid grid-cols-2 gap-4 mb-6">
                    <label class="cursor-pointer flex flex-col items-center p-4 rounded-xl border transition-all duration-200 hover:shadow-lg"
                           :class="[selectedRole === 'pegawai' ? 'role-card-selected role-card-pegawai' : 'border-gray-200']"
                           @click="selectedRole = 'pegawai'">
                        <i data-lucide="user" class="w-8 h-8 mb-2 text-blue-600"></i>
                        <span class="font-semibold text-gray-800 dark:text-gray-100">Pegawai</span>
                        <input type="radio" name="role" value="pegawai" x-model="selectedRole" class="hidden">
                    </label>
                    <label class="cursor-pointer flex flex-col items-center p-4 rounded-xl border transition-all duration-200 hover:shadow-lg"
                           :class="[selectedRole === 'operator' ? 'role-card-selected role-card-operator' : 'border-gray-200']"
                           @click="selectedRole = 'operator'">
                        <i data-lucide="check-circle" class="w-8 h-8 mb-2 text-green-600"></i>
                        <span class="font-semibold text-gray-800 dark:text-gray-100">Operator</span>
                        <input type="radio" name="role" value="operator" x-model="selectedRole" class="hidden">
                    </label>
                </div>
                <!-- NIP Field -->
                <div>
                    <label for="nip" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">NIP</label>
                    <input id="nip" name="nip" type="text" maxlength="18" required autocomplete="username" x-model="nip" class="w-full px-4 py-3 rounded-lg border border-gray-200 dark:border-gray-700 bg-white dark:bg-gray-800 text-gray-900 dark:text-white placeholder-gray-400 focus:border-blue-500 focus:ring-1 focus:ring-blue-500 text-base">
                </div>
                <!-- Password Field -->
                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Password</label>
                    <input id="password" name="password" type="password" required autocomplete="current-password" x-model="password" class="w-full px-4 py-3 rounded-lg border border-gray-200 dark:border-gray-700 bg-white dark:bg-gray-800 text-gray-900 dark:text-white placeholder-gray-400 focus:border-blue-500 focus:ring-1 focus:ring-blue-500 text-base">
                </div>
                <!-- Remember Me -->
                <div class="flex items-center justify-between">
                    <label class="inline-flex items-center">
                        <input type="checkbox" name="remember" class="rounded border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-800 text-blue-500 focus:ring-blue-500">
                        <span class="ml-2 text-xs text-gray-600 dark:text-gray-400">Ingat saya</span>
                    </label>
                    <a href="#" class="text-xs text-blue-600 dark:text-blue-400 hover:underline">Lupa password?</a>
                </div>
                <!-- Login Button -->
                <div>
                    <button type="submit" :disabled="isLoading" class="w-full py-3 bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-lg transition-all duration-200" x-text="isLoading ? 'Memproses...' : 'Masuk'">Masuk</button>
                </div>
            </form>
        </div>
    </div>
</div>

                            <!-- Role Selection Section -->
                            <div class="space-y-3">
                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Pilih Jenis Pengguna</label>
                                <div class="grid grid-cols-2 sm:grid-cols-4 gap-3 role-grid">
                                    <div class="role-card" :class="{'active': selectedRole === 'admin'}" @click="selectRole('admin')">
                                        <i data-lucide="settings" class="w-5 h-5 mb-1 text-purple-600 dark:text-purple-400"></i>
                                        <span class="text-xs font-medium">Admin</span>
                                    </div>
                                    <div class="role-card" :class="{'active': selectedRole === 'operator'}" @click="selectRole('operator')">
                                        <i data-lucide="check-circle" class="w-5 h-5 mb-1 text-emerald-600 dark:text-emerald-400"></i>
                                        <span class="text-xs font-medium">Operator</span>
                                    </div>
                                    <div class="role-card" :class="{'active': selectedRole === 'operator-sekolah'}" @click="selectRole('operator-sekolah')">
                                        <i data-lucide="school" class="w-5 h-5 mb-1 text-blue-600 dark:text-blue-400"></i>
                                        <span class="text-xs font-medium">Op. Sekolah</span>
                                    </div>
                                    <div class="role-card" :class="{'active': selectedRole === 'pegawai'}" @click="selectRole('pegawai')">
                                        <i data-lucide="user" class="w-5 h-5 mb-1 text-amber-600 dark:text-amber-400"></i>
                                        <span class="text-xs font-medium">Pegawai</span>
                                    </div>
                                </div>
                            </div>

                            <!-- Login Form -->
                            <form method="POST" action="{{ route('login') }}" @submit="validateForm" class="space-y-4">
                                @csrf
                                <input type="hidden" name="role" x-model="selectedRole">

                                <!-- NIP Field -->
                                <div>
                                    <label for="nip" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1.5">NIP</label>
                                    <div class="relative">
                                        <i data-lucide="id-card" class="w-4 h-4 absolute left-3 top-1/2 -translate-y-1/2 text-gray-400"></i>
                                        <input id="nip" type="text" name="nip" x-model="nip" @input="validateNip"
                                               class="form-input" placeholder="Masukkan NIP 18 digit" required autocomplete="username" maxlength="18">
                                    </div>
                                    <div x-show="nipError" x-text="nipError" class="mt-1.5 text-red-500 text-xs"></div>
                                    @error('nip')<div class="mt-1.5 text-red-500 text-xs">{{ $message }}</div>@enderror
                                </div>

                                <!-- Password Field -->
                                <div>
                                    <label for="password" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1.5">Password</label>
                                    <div class="relative">
                                        <i data-lucide="lock" class="w-4 h-4 absolute left-3 top-1/2 -translate-y-1/2 text-gray-400"></i>
                                        <input id="password" :type="passwordVisible ? 'text' : 'password'" name="password"
                                               class="form-input pr-10" placeholder="Masukkan password" required autocomplete="current-password">
                                        <button type="button" @click="togglePassword" class="absolute inset-y-0 right-0 pr-3 flex items-center text-gray-400 hover:text-gray-600 dark:hover:text-gray-300">
                                            <i data-lucide="eye" class="w-4 h-4" x-show="!passwordVisible"></i>
                                            <i data-lucide="eye-off" class="w-4 h-4" x-show="passwordVisible"></i>
                                        </button>
                                    </div>
                                    @error('password')<div class="mt-1.5 text-red-500 text-xs">{{ $message }}</div>@enderror
                                </div>

                                <!-- Captcha Field -->
                                <div>
                                    <x-captcha id="captcha" class="w-full" />
                                    @error('captcha')<div class="mt-1.5 text-red-500 text-xs">{{ $message }}</div>@enderror
                                </div>

                                <!-- Remember Me & Forgot Password -->
                                <div class="flex items-center justify-between">
                                    <label for="remember_me" class="inline-flex items-center">
                                        <input id="remember_me" type="checkbox" class="rounded border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-800 text-blue-600 focus:ring-blue-500" name="remember">
                                        <span class="ml-2 text-xs text-gray-600 dark:text-gray-400">Ingat saya</span>
                                    </label>
                                    <button type="button" @click="openForgotPassword" class="text-xs text-blue-600 dark:text-blue-400 hover:underline">Lupa password?</button>
                                </div>

                                <!-- Login Button -->
                                <div class="pt-2">
                                    <button type="submit" class="w-full btn-primary" :disabled="!isFormValid || isSubmitting">
                                        <div x-show="isSubmitting" class="animate-spin mr-2">
                                            <i data-lucide="loader-2" class="w-4 h-4"></i>
                                        </div>
                                        <span x-text="isSubmitting ? 'Memproses...' : 'Masuk'"></span>
                                    </button>
                                </div>
                            </form>

                            <!-- Footer Info -->
                            <div class="mt-6 text-center">
                                <p class="text-xs text-gray-500 dark:text-gray-400">
                                    © {{ date('Y') }} Dinas Pendidikan dan Kebudayaan Prov. Kaltim
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Forgot Password Modal -->
            <x-forgot-password-modal />
        </div>
    </div>
@endsection

@push('scripts')
<script>
    document.addEventListener('alpine:init', () => {
        Alpine.data('mockLogin', () => ({
            selectedRole: 'pegawai',
            nip: '',
            password: '',
            isLoading: false,
            message: '',
            messageType: '',
            mockUsers: [
                { role: 'pegawai', nip: '123456789012345678', password: 'pegawai123' },
                { role: 'operator', nip: '876543210987654321', password: 'operator123' }
            ],
            submit(e) {
                e.preventDefault();
                this.isLoading = true;
                this.message = '';
                setTimeout(() => {
                    const user = this.mockUsers.find(u => u.role === this.selectedRole && u.nip === this.nip && u.password === this.password);
                    if (user) {
                        this.message = 'Login berhasil! Selamat datang, ' + user.role.charAt(0).toUpperCase() + user.role.slice(1);
                        this.messageType = 'success';
                    } else {
                        this.message = 'Login gagal! NIP atau password salah.';
                        this.messageType = 'error';
                    }
                    this.isLoading = false;
                }, 800);
            }
        }));
    });
</script>
@endpush

@push('styles')
<style>
    .form-input {
        @apply w-full px-3 py-2.5 pl-9 bg-white dark:bg-gray-800/50 border border-gray-300 dark:border-gray-700 rounded-lg text-gray-900 dark:text-white placeholder-gray-400 focus:border-blue-500 focus:ring-1 focus:ring-blue-500 text-sm transition-shadow;
    }
    .btn-primary {
        @apply w-full py-2.5 bg-blue-600 hover:bg-blue-700 disabled:bg-gray-400 dark:disabled:bg-gray-600 text-white font-medium rounded-lg transition-all duration-200 flex items-center justify-center focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-gray-900 disabled:cursor-not-allowed;
    }
    .role-card {
        @apply cursor-pointer rounded-lg border-2 p-3 text-center transition-all duration-200 flex flex-col items-center justify-center;
        @apply border-gray-200 dark:border-gray-700 bg-gray-50/50 dark:bg-gray-800/50 hover:border-blue-400 dark:hover:border-blue-500 hover:bg-blue-50 dark:hover:bg-blue-900/20;
    }
    .role-card.active {
        @apply border-blue-500 dark:border-blue-400 bg-blue-50 dark:bg-blue-900/30 shadow-sm;
        transform: translateY(-2px);
    }
    .role-card-selected {
        border-width: 2px !important;
        box-shadow: 0 0 0 2px rgba(59,130,246,0.2);
    }
    .role-card-pegawai {
        border-color: #3b82f6 !important;
        background: linear-gradient(135deg, #dbeafe 0%, #f0f9ff 100%) !important;
    }
    .role-card-operator {
        border-color: #22c55e !important;
        background: linear-gradient(135deg, #bbf7d0 0%, #f0fdf4 100%) !important;
    }
</style>
@endpush