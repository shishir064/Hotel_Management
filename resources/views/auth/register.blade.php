@extends('layouts.app')

@section('title', 'Sign Up')

@section('content')
<main class="py-24 max-w-7xl mx-auto px-6 lg:px-20 flex justify-center">
        <div class="px-margin-mobile relative z-10 w-full max-w-120 md:px-0">
        <div class="glass-panel rounded-lg p-8 shadow-[0_15px_50px_-15px_rgba(0,0,0,0.1)] md:p-12">
          <!-- Branding -->
          <div class="mb-10 text-center">
            <h1 class="font-headline-lg text-4xl text-headline-lg text-black mb-2 tracking-tight">Begin your journey.</h1>
            <p class="font-body-md text-secondary">Create an account to access our private collection of stays and personalized concierge services.</p>
          </div>
          <!-- Login Form -->
          <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data" class="space-y-6">
            @csrf
            <div class="space-y-1">
              <label class="font-label-md text-label-md text-secondary block tracking-widest uppercase" for="name">FULL NAME</label>
              <input class="border-outline-variant focus:border-black font-body-md text-on-surface placeholder:text-on-surface-variant/40 w-full border-0 border-b bg-transparent px-0 py-3 transition-all duration-300 focus:ring-0" id="name" name="name" placeholder="Julian Vandermeer"  type="text" />
              @error('name')
                  <h1 class="text-red-400">{{ $message }}</h1>
              @enderror
            </div>
            <div class="space-y-1">
              <label class="font-label-md text-label-md text-secondary block tracking-widest uppercase" for="email">Email Address</label>
              <input class="border-outline-variant focus:border-black font-body-md text-on-surface placeholder:text-on-surface-variant/40 w-full border-0 border-b bg-transparent px-0 py-3 transition-all duration-300 focus:ring-0" id="email" name="email" placeholder="name@example.com" type="email" />
              @error('email')
                  <h1 class="text-red-400">{{ $message }}</h1>
              @enderror
            </div>
            <div class="space-y-1">
              <label class="font-label-md text-label-md text-secondary block tracking-widest uppercase" for="password">Password</label>
              <input class="border-outline-variant focus:border-black font-body-md text-on-surface placeholder:text-on-surface-variant/40 w-full border-0 border-b bg-transparent px-0 py-3 transition-all duration-300 focus:ring-0" id="password" type="password" name="password" placeholder="••••••••">
              
              <label class="uppercase" for="password">Confirm Password</label>
              <input class="border-outline-variant focus:border-black font-body-md text-on-surface placeholder:text-on-surface-variant/40 w-full border-0 border-b bg-transparent px-0 py-3 transition-all duration-300 focus:ring-0" id="password" name="password_confirmation" placeholder="••••••••"  type="password" />
              @error('password')
                  <h1 class="text-red-400">{{ $message }}</h1>
              @enderror
            </div>
            <button class="bg-black text-white font-label-md text-label-md hover:bg-on-surface-variant w-full rounded-sm py-4 tracking-widest uppercase shadow-sm transition-all active:scale-[0.98]" type="submit">Sign Up</button>
          </form>
          <div class="space-y-4 pt-4">
              <label class="group flex cursor-pointer items-start gap-4">
                <div class="mt-1">
                  <input class="border-outline-variant text-black focus:ring-black h-5 w-5 rounded-none focus:ring-offset-0" type="checkbox" />
                </div>
                <span class="font-body-md text-body-md text-secondary group-hover:text-black transition-colors"> I agree to the <a class="text-black underline decoration-1 underline-offset-4" href="#">Terms of Service</a> and <a class="text-black underline decoration-1 underline-offset-4" href="#">Privacy Policy</a>. </span>
              </label>
            </div>
          <!-- Footer Link -->
          <p class="font-body-md pt-4 text-secondary text-center">
            Already have an account?
            <a class="text-black font-bold decoration-1 underline-offset-4 hover:underline" href="{{ route('login.form') }}">Login Account</a>
          </p>
        </div>
        <!-- Legal Footer -->
        <div class="mt-8 flex justify-center gap-6">
          <a class="font-label-sm text-label-sm text-white-container/80 transition-colors hover:text-white" href="#">Privacy Policy</a>
          <a class="font-label-sm text-label-sm text-white-container/80 transition-colors hover:text-white" href="#">Terms of Service</a>
        </div>
      </div>
    </main>
@endsection

