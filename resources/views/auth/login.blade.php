@extends('layouts.app')

@section('title', 'Sign In')
@section('content')
    <main class="py-24 max-w-7xl mx-auto px-6 lg:px-20 flex justify-center">
        <div class="px-margin-mobile relative z-10 w-full max-w-120 md:px-0">
        <div class="glass-panel rounded-lg p-8 shadow-[0_15px_50px_-15px_rgba(0,0,0,0.1)] md:p-12">
          <!-- Branding -->
          <div class="mb-10 text-center">
            <h1 class="font-headline-lg text-4xl text-headline-lg text-primary mb-2 tracking-tight">QuickStay</h1>
            <p class="font-body-md text-secondary">Welcome back to QuickStay.</p>
          </div>
          <!-- Login Form -->
          <form action="{{ route('login') }}" method="POST" class="space-y-6">
            @csrf
            <div class="space-y-1">
              <label class="font-label-md text-label-md  block  uppercase" for="email">Email Address</label>
              <input class=" focus:border-primary    w-full border-0 border-b  px-2 py-3 transition-all duration-300 focus:ring-0" id="email" name="email" placeholder="name@example.com" type="email" />
              @error('email')
                  <h1 class="text-red-400">{{ $message }}</h1>
              @enderror
            
            </div>
            <div class="space-y-1">
              <div class="flex items-center justify-between">
                <label class="font-label-md text-label-md text-secondary block tracking-widest uppercase" for="password">Password</label>
                <a class="font-label-sm text-label-sm text-on-primary-container hover:text-primary transition-colors" href="#">Forgot Password?</a>
              </div>
              <input class="border-outline-variant focus:border-primary font-body-md text-on-surface placeholder:text-on-surface-variant/40 w-full border-0 border-b bg-transparent px-2 py-3 transition-all duration-300 focus:ring-0" id="password" name="password" placeholder="••••••••" type="password" />
              @error('password')
                  <h1 class="text-red-400">{{ $message }}</h1>
              @enderror
            </div>
            <button class="bg-primary text-on-primary font-label-md text-label-md hover:bg-on-surface-variant w-full rounded-sm py-4 tracking-widest uppercase shadow-sm transition-all active:scale-[0.98]" type="submit">Sign In</button>
          </form>
          <!-- Footer Link -->
          <p class="font-body-md pt-4 text-secondary text-center">
            Don't have an account?
            <a class="text-primary font-bold decoration-1 underline-offset-4 hover:underline" href="{{ route('register') }}">Create Account</a>
          </p>
        </div>
        <!-- Legal Footer -->
        <div class="mt-8 flex justify-center gap-6">
          <a class="font-label-sm text-label-sm text-on-primary-container/80 transition-colors hover:text-white" href="#">Privacy Policy</a>
          <a class="font-label-sm text-label-sm text-on-primary-container/80 transition-colors hover:text-white" href="#">Terms of Service</a>
        </div>
      </div>
    </main>
@endsection