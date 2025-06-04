@extends('Master')

@section('title', 'Sign Up')

@section('content')

<div class="container-fluid min-vh-100 d-flex align-items-center py-5">
    <div class="container">
        <div class="row justify-content-center align-items-center g-5">
            <!-- Left side image column -->
            <div class="col-lg-6 d-none d-lg-block">
                <div class="position-relative">
                    <div class="login-hero-bg">
                        <img src="https://img.freepik.com/free-vector/mobile-login-concept-illustration_114360-83.jpg?semt=ais_hybrid&w=740" 
                             alt="Sign Up" class="img-fluid rounded-3 shadow-lg">
                        <div class="hero-overlay">
                            <div class="hero-content">
                                <h2 class="text-white fw-bold mb-3 display-6">Join Our Community!</h2>
                                <p class="text-white-50 mb-4 lead">Create an account and get access to all features</p>
                                
                                <div class="feature-list">
                                    <div class="feature-item">
                                        <div class="feature-icon">
                                            <i class="fas fa-shield-alt"></i>
                                        </div>
                                        <span class="text-white">Bank-level security</span>
                                    </div>
                                    <div class="feature-item">
                                        <div class="feature-icon">
                                            <i class="fas fa-lock"></i>
                                        </div>
                                        <span class="text-white">End-to-end encryption</span>
                                    </div>
                                    <div class="feature-item">
                                        <div class="feature-icon">
                                            <i class="fas fa-user-check"></i>
                                        </div>
                                        <span class="text-white">Trusted by millions</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Enhanced floating elements -->
                    <div class="floating-elements">
                        <div class="floating-element element-1"></div>
                        <div class="floating-element element-2"></div>
                        <div class="floating-element element-3"></div>
                        <div class="floating-element element-4"></div>
                        <div class="floating-element element-5"></div>
                    </div>
                </div>
            </div>
            
            <!-- Right side form column -->
            <div class="col-lg-6 col-md-8 col-sm-10">
                <div class="login-card">
                    <div class="card-header-custom">
                        <div class="brand-section">
                            <div class="brand-icon">
                                <i class="fas fa-user-plus"></i>
                            </div>
                            <h3 class="mb-0 fw-bold">{{ __('Create Account') }}</h3>
                            <p class="mb-0 mt-1 opacity-75">Sign up to get started</p>
                        </div>
                    </div>

                    <div class="card-body-custom">
                        <form method="POST" action="{{ route('register') }}" id="registerForm">
                            @csrf

                            <div class="form-floating-custom mb-4">
                                <div class="input-wrapper">
                                    <div class="input-icon">
                                        <i class="fas fa-user"></i>
                                    </div>
                                    <input id="name" type="text" 
                                        class="form-control-custom @error('name') is-invalid @enderror" 
                                        name="name" value="{{ old('name') }}" required autocomplete="name" autofocus
                                        placeholder=" ">
                                    <label for="name" class="floating-label">{{ __('Full Name') }}</label>
                                    <div class="input-border"></div>
                                </div>
                                @error('name')
                                    <div class="error-message">
                                        <i class="fas fa-exclamation-circle"></i>
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-floating-custom mb-4">
                                <div class="input-wrapper">
                                    <div class="input-icon">
                                        <i class="fas fa-envelope"></i>
                                    </div>
                                    <input id="email" type="email" 
                                        class="form-control-custom @error('email') is-invalid @enderror" 
                                        name="email" value="{{ old('email') }}" required autocomplete="email"
                                        placeholder=" ">
                                    <label for="email" class="floating-label">{{ __('Email Address') }}</label>
                                    <div class="input-border"></div>
                                </div>
                                @error('email')
                                    <div class="error-message">
                                        <i class="fas fa-exclamation-circle"></i>
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-floating-custom mb-4">
                                <div class="input-wrapper">
                                    <div class="input-icon">
                                        <i class="fas fa-lock"></i>
                                    </div>
                                    <input id="password" type="password" 
                                        class="form-control-custom @error('password') is-invalid @enderror" 
                                        name="password" required autocomplete="new-password"
                                        placeholder=" ">
                                    <label for="password" class="floating-label">{{ __('Password') }}</label>
                                    <div class="password-toggle" onclick="togglePassword()">
                                        <i class="fas fa-eye" id="toggleIcon"></i>
                                    </div>
                                    <div class="input-border"></div>
                                </div>
                                <div class="password-strength mt-2" id="passwordStrength">
                                    <div class="progress" style="height: 5px;">
                                        <div class="progress-bar" role="progressbar" style="width: 0%;" id="passwordStrengthBar"></div>
                                    </div>
                                    <small class="text-muted" id="passwordStrengthText">Password strength</small>
                                </div>
                                @error('password')
                                    <div class="error-message">
                                        <i class="fas fa-exclamation-circle"></i>
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-floating-custom mb-4">
                                <div class="input-wrapper">
                                    <div class="input-icon">
                                        <i class="fas fa-lock"></i>
                                    </div>
                                    <input id="password-confirm" type="password" 
                                        class="form-control-custom" 
                                        name="password_confirmation" required autocomplete="new-password"
                                        placeholder=" ">
                                    <label for="password-confirm" class="floating-label">{{ __('Confirm Password') }}</label>
                                    <div class="password-toggle" onclick="toggleConfirmPassword()">
                                        <i class="fas fa-eye" id="toggleIconConfirm"></i>
                                    </div>
                                    <div class="input-border"></div>
                                </div>
                            </div>

                            <div class="form-options mb-4">
                                <div class="custom-checkbox">
                                    <input class="checkbox-input" type="checkbox" name="terms" 
                                           id="terms" required>
                                    <label class="checkbox-label" for="terms">
                                        <span class="checkbox-custom"></span>
                                        {{ __('I agree to the') }} <a href="#" class="terms-link">Terms of Service</a> {{ __('and') }} 
                                        <a href="#" class="terms-link">Privacy Policy</a>
                                    </label>
                                </div>
                            </div>

                            <div class="d-grid mb-4">
                                <button type="submit" class="login-btn" id="registerButton">
                                    <span class="btn-content">
                                        <span class="btn-text">{{ __('Create Account') }}</span>
                                        <div class="btn-icon">
                                            <i class="fas fa-arrow-right"></i>
                                        </div>
                                    </span>
                                    <div class="btn-loading">
                                        <div class="spinner"></div>
                                        <span>Creating account...</span>
                                    </div>
                                </button>
                            </div>

                            <div class="signup-link">
                                <p class="mb-0">Already have an account? 
                                    <a href="{{ route('login') }}" class="signup-btn">
                                        Login
                                    </a>
                                </p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
function togglePassword() {
    const passwordInput = document.getElementById('password');
    const toggleIcon = document.getElementById('toggleIcon');
    
    if (passwordInput.type === 'password') {
        passwordInput.type = 'text';
        toggleIcon.classList.remove('fa-eye');
        toggleIcon.classList.add('fa-eye-slash');
    } else {
        passwordInput.type = 'password';
        toggleIcon.classList.remove('fa-eye-slash');
        toggleIcon.classList.add('fa-eye');
    }
}

function toggleConfirmPassword() {
    const passwordInput = document.getElementById('password-confirm');
    const toggleIcon = document.getElementById('toggleIconConfirm');
    
    if (passwordInput.type === 'password') {
        passwordInput.type = 'text';
        toggleIcon.classList.remove('fa-eye');
        toggleIcon.classList.add('fa-eye-slash');
    } else {
        passwordInput.type = 'password';
        toggleIcon.classList.remove('fa-eye-slash');
        toggleIcon.classList.add('fa-eye');
    }
}

// Enhanced form interactions
document.querySelectorAll('.form-control-custom').forEach(input => {
    input.addEventListener('focus', function() {
        this.closest('.input-wrapper').classList.add('focused');
    });
    
    input.addEventListener('blur', function() {
        if (!this.value) {
            this.closest('.input-wrapper').classList.remove('focused');
        }
    });
    
    // Check if input has value on page load
    if (input.value) {
        input.closest('.input-wrapper').classList.add('focused');
    }
});

// Password strength meter
document.getElementById('password').addEventListener('input', function() {
    const password = this.value;
    const strengthBar = document.getElementById('passwordStrengthBar');
    const strengthText = document.getElementById('passwordStrengthText');
    
    // Calculate strength
    let strength = 0;
    if (password.length > 6) strength += 25;
    if (password.length > 10) strength += 15;
    if (/[A-Z]/.test(password)) strength += 20;
    if (/[0-9]/.test(password)) strength += 20;
    if (/[^A-Za-z0-9]/.test(password)) strength += 20;
    
    // Update UI
    strengthBar.style.width = strength + '%';
    
    if (strength < 30) {
        strengthBar.className = 'progress-bar bg-danger';
        strengthText.textContent = 'Weak password';
    } else if (strength < 60) {
        strengthBar.className = 'progress-bar bg-warning';
        strengthText.textContent = 'Moderate password';
    } else if (strength < 80) {
        strengthBar.className = 'progress-bar bg-info';
        strengthText.textContent = 'Good password';
    } else {
        strengthBar.className = 'progress-bar bg-success';
        strengthText.textContent = 'Strong password';
    }
});

// Enhanced form validation
document.getElementById('registerForm').addEventListener('submit', function(e) {
    let isValid = true;
    const name = document.getElementById('name');
    const email = document.getElementById('email');
    const password = document.getElementById('password');
    const passwordConfirm = document.getElementById('password-confirm');
    const terms = document.getElementById('terms');
    
    // Remove previous error states
    document.querySelectorAll('.input-wrapper').forEach(wrapper => {
        wrapper.classList.remove('error');
    });
    
    // Name validation
    if (!name.value.trim()) {
        isValid = false;
        name.closest('.input-wrapper').classList.add('error');
        showInputError(name, 'Please enter your full name');
    }
    
    // Email validation
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!email.value || !emailRegex.test(email.value)) {
        isValid = false;
        email.closest('.input-wrapper').classList.add('error');
        showInputError(email, 'Please enter a valid email address');
    }
    
    // Password validation
    if (!password.value || password.value.length < 6) {
        isValid = false;
        password.closest('.input-wrapper').classList.add('error');
        showInputError(password, 'Password must be at least 6 characters');
    }
    
    // Password confirmation validation
    if (password.value !== passwordConfirm.value) {
        isValid = false;
        passwordConfirm.closest('.input-wrapper').classList.add('error');
        showInputError(passwordConfirm, 'Passwords do not match');
    }
    
    // Terms validation
    if (!terms.checked) {
        isValid = false;
        terms.closest('.custom-checkbox').classList.add('error');
    }
    
    if (!isValid) {
        e.preventDefault();
        // Add shake animation to form
        document.querySelector('.login-card').classList.add('shake');
        setTimeout(() => {
            document.querySelector('.login-card').classList.remove('shake');
        }, 600);
    } else {
        // Show loading state
        const registerButton = document.getElementById('registerButton');
        registerButton.classList.add('loading');
        registerButton.disabled = true;
    }
});

function showInputError(input, message) {
    // Remove existing error message
    const existingError = input.closest('.form-floating-custom').querySelector('.error-message');
    if (existingError) {
        existingError.remove();
    }
    
    // Add new error message
    const errorDiv = document.createElement('div');
    errorDiv.className = 'error-message';
    errorDiv.innerHTML = `<i class="fas fa-exclamation-circle"></i> ${message}`;
    input.closest('.form-floating-custom').appendChild(errorDiv);
}

// Add page load animation
document.addEventListener('DOMContentLoaded', function() {
    setTimeout(() => {
        document.querySelector('.login-card').classList.add('loaded');
    }, 100);
});
</script>

<style>
/* Enhanced base styles */
.login-card {
    background: rgba(255, 255, 255, 0.95);
    backdrop-filter: blur(20px);
    border-radius: 24px;
    box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
    border: 1px solid rgba(255, 255, 255, 0.2);
    overflow: hidden;
    transition: all 0.6s cubic-bezier(0.165, 0.84, 0.44, 1);
    transform: translateY(30px);
    opacity: 0;
}

.login-card.loaded {
    transform: translateY(0);
    opacity: 1;
}

.login-card.shake {
    animation: shake 0.6s ease-in-out;
}

@keyframes shake {
    0%, 100% { transform: translateX(0); }
    10%, 30%, 50%, 70%, 90% { transform: translateX(-10px); }
    20%, 40%, 60%, 80% { transform: translateX(10px); }
}

/* Enhanced header */
.card-header-custom {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    padding: 40px 40px 30px;
    text-align: center;
    position: relative;
    overflow: hidden;
}

.card-header-custom::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.1), transparent);
    transition: left 0.5s;
}

.login-card:hover .card-header-custom::before {
    left: 100%;
}

.brand-section {
    position: relative;
    z-index: 2;
}

.brand-icon {
    width: 80px;
    height: 80px;
    background: rgba(255, 255, 255, 0.2);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 20px;
    font-size: 2rem;
    color: white;
    backdrop-filter: blur(10px);
    border: 2px solid rgba(255, 255, 255, 0.3);
}

.brand-section h3 {
    color: white;
    font-size: 1.8rem;
    margin-bottom: 8px;
}

.brand-section p {
    color: rgba(255, 255, 255, 0.8);
    font-size: 1rem;
}

/* Enhanced form body */
.card-body-custom {
    padding: 40px;
}

/* Floating label inputs */
.form-floating-custom {
    position: relative;
    margin-bottom: 24px;
}

.input-wrapper {
    position: relative;
    display: flex;
    align-items: center;
}

.input-icon {
    position: absolute;
    left: 20px;
    top: 50%;
    transform: translateY(-50%);
    color: #9ca3af;
    font-size: 1.1rem;
    z-index: 2;
    transition: all 0.3s ease;
}

.form-control-custom {
    width: 100%;
    padding: 20px 20px 20px 55px;
    border: 2px solid #e5e7eb;
    border-radius: 16px;
    font-size: 1rem;
    background: #f9fafb;
    transition: all 0.3s ease;
    outline: none;
}

.form-control-custom:focus {
    border-color: #667eea;
    background: white;
    box-shadow: 0 0 0 4px rgba(102, 126, 234, 0.1);
}

.floating-label {
    position: absolute;
    left: 55px;
    top: 50%;
    transform: translateY(-50%);
    color: #9ca3af;
    font-size: 1rem;
    pointer-events: none;
    transition: all 0.3s cubic-bezier(0.25, 0.46, 0.45, 0.94);
    background: transparent;
    padding: 0 8px;
}

.input-wrapper.focused .floating-label,
.form-control-custom:not(:placeholder-shown) + .floating-label {
    top: 0;
    left: 45px;
    font-size: 0.8rem;
    color: #667eea;
    background: white;
    font-weight: 600;
}

.input-wrapper.focused .input-icon {
    color: #667eea;
}

.input-wrapper.error .form-control-custom {
    border-color: #ef4444;
    background: #fef2f2;
}

.input-wrapper.error .input-icon {
    color: #ef4444;
}

.input-wrapper.error .floating-label {
    color: #ef4444;
}

/* Password toggle */
.password-toggle {
    position: absolute;
    right: 20px;
    top: 50%;
    transform: translateY(-50%);
    cursor: pointer;
    color: #9ca3af;
    font-size: 1.1rem;
    padding: 8px;
    border-radius: 8px;
    transition: all 0.3s ease;
}

.password-toggle:hover {
    color: #667eea;
    background: rgba(102, 126, 234, 0.1);
}

/* Form options */
.form-options {
    display: flex;
    justify-content: space-between;
    align-items: center;
    flex-wrap: wrap;
    gap: 16px;
}

.custom-checkbox {
    display: flex;
    align-items: center;
}

.checkbox-input {
    display: none;
}

.checkbox-label {
    display: flex;
    align-items: center;
    cursor: pointer;
    font-size: 0.95rem;
    color: #4b5563;
}

.checkbox-custom {
    width: 20px;
    height: 20px;
    border: 2px solid #d1d5db;
    border-radius: 6px;
    margin-right: 12px;
    position: relative;
    transition: all 0.3s ease;
}

.checkbox-input:checked + .checkbox-label .checkbox-custom {
    background: #667eea;
    border-color: #667eea;
}

.checkbox-input:checked + .checkbox-label .checkbox-custom::after {
    content: '\f00c';
    font-family: 'Font Awesome 5 Free';
    font-weight: 900;
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    color: white;
    font-size: 0.7rem;
}

.terms-link {
    color: #667eea;
    text-decoration: none;
    font-weight: 600;
    transition: all 0.3s ease;
}

.terms-link:hover {
    color: #4f46e5;
    text-decoration: underline;
}

/* Enhanced login button */
.login-btn {
    position: relative;
    width: 100%;
    padding: 18px 32px;
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    border: none;
    border-radius: 16px;
    color: white;
    font-size: 1.1rem;
    font-weight: 600;
    cursor: pointer;
    overflow: hidden;
    transition: all 0.3s ease;
    box-shadow: 0 4px 15px rgba(102, 126, 234, 0.3);
}

.login-btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 25px rgba(102, 126, 234, 0.4);
}

.login-btn:active {
    transform: translateY(0);
}

.btn-content {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 12px;
    transition: all 0.3s ease;
}

.btn-loading {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    display: flex;
    align-items: center;
    gap: 12px;
    opacity: 0;
    transition: all 0.3s ease;
}

.login-btn.loading .btn-content {
    opacity: 0;
}

.login-btn.loading .btn-loading {
    opacity: 1;
}

.spinner {
    width: 20px;
    height: 20px;
    border: 2px solid rgba(255, 255, 255, 0.3);
    border-top: 2px solid white;
    border-radius: 50%;
    animation: spin 1s linear infinite;
}

@keyframes spin {
    0% { transform: rotate(0deg); }
    100% { transform: rotate(360deg); }
}

.btn-icon {
    transition: transform 0.3s ease;
}

.login-btn:hover .btn-icon {
    transform: translateX(4px);
}

/* Signup link */
.signup-link {
    text-align: center;
    padding-top: 24px;
    border-top: 1px solid #e5e7eb;
}

.signup-link p {
    color: #6b7280;
    font-size: 0.95rem;
}

.signup-btn {
    color: #667eea;
    text-decoration: none;
    font-weight: 600;
    position: relative;
    transition: all 0.3s ease;
}

.signup-btn:hover {
    color: #4f46e5;
}

.signup-btn::after {
    content: '';
    position: absolute;
    bottom: -2px;
    left: 0;
    width: 0;
    height: 2px;
    background: #667eea;
    transition: width 0.3s ease;
}

.signup-btn:hover::after {
    width: 100%;
}

/* Hero section */
.login-hero-bg {
    position: relative;
    border-radius: 24px;
    overflow: hidden;
}

.hero-overlay {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: linear-gradient(90deg, rgba(92, 50, 163, 0.8) 0%, rgba(123, 76, 191, 0.4) 50%, rgba(255, 255, 255, 0) 100%);
    padding: 40px;
    display: flex;
    align-items: center;
}

.hero-content {
    color: white;
}

.feature-list {
    margin-top: 32px;
}

.feature-item {
    display: flex;
    align-items: center;
    margin-bottom: 16px;
}

.feature-icon {
    width: 40px;
    height: 40px;
    background: rgba(255, 255, 255, 0.2);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin-right: 16px;
    font-size: 1.2rem;
}

/* Floating elements */
.floating-elements {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    pointer-events: none;
}

.floating-element {
    position: absolute;
    border-radius: 50%;
    background: rgba(255, 255, 255, 0.1);
    backdrop-filter: blur(5px);
}

.element-1 {
    width: 60px;
    height: 60px;
    top: 15%;
    right: 20%;
    animation: float 6s ease-in-out infinite;
}

.element-2 {
    width: 40px;
    height: 40px;
    bottom: 20%;
    right: 10%;
    animation: float 8s ease-in-out infinite 1s;
}

.element-3 {
    width: 30px;
    height: 30px;
    top: 60%;
    right: 30%;
    animation: float 7s ease-in-out infinite 0.5s;
}

.element-4 {
    width: 50px;
    height: 50px;
    top: 30%;
    left: 10%;
    animation: float 9s ease-in-out infinite 1.5s;
}

.element-5 {
    width: 35px;
    height: 35px;
    bottom: 30%;
    left: 20%;
    animation: float 7s ease-in-out infinite 2s;
}

@keyframes float {
    0% { transform: translateY(0px); }
    50% { transform: translateY(-15px); }
    100% { transform: translateY(0px); }
}

/* Error message */
.error-message {
    color: #ef4444;
    font-size: 0.875rem;
    margin-top: 8px;
    display: flex;
    align-items: center;
    gap: 6px;
}

/* Password strength meter */
.password-strength {
    margin-top: 8px;
}

.progress {
    height: 4px;
    background-color: #e5e7eb;
    border-radius: 2px;
    overflow: hidden;
}

.progress-bar {
    transition: width 0.3s ease;
}

/* Responsive adjustments */
@media (max-width: 576px) {
    .card-header-custom,
    .card-body-custom {
        padding: 20px;
    }
    
    .form-control-custom {
        padding: 16px 16px 16px 50px;
    }
    
    .floating-label {
        left: 50px;
    }
    
    .input-wrapper.focused .floating-label {
        left: 40px;
    }
}
</style>

@endsection