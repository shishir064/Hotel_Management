@extends('layouts.app')

@section('title', 'Hotel Book')

@section('content')
    <main class="pt-28 pb-20 max-w-7xl mx-auto px-6 lg:px-20">
        <div class="flex items-center gap-4 mb-12">
            <button class="flex items-center text-secondary hover:text-primary transition-colors">
                <span class="material-symbols-outlined mr-2">arrow_back</span>
                <span class="font-label-md text-label-md">BACK TO PROPERTY</span>
            </button>
            <h1 class="font-headline-lg text-headline-lg text-primary">Complete Your Sanctuary</h1>
        </div>
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-start">
            <section class="lg:col-span-7 space-y-12">
                <div>
                    <div class="flex items-center gap-4 mb-6">
                        <span
                            class="w-8 h-8 rounded-full bg-primary text-on-primary flex items-center justify-center font-label-md text-label-md">1</span>
                        <h2 class="font-headline-md text-headline-md text-primary">Guest Information</h2>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-gutter">
                        <div class="space-y-2">
                            <label class="font-label-md text-label-md text-secondary block">FIRST NAME</label>
                            <input
                                class="w-full border-0 border-b border-outline-variant bg-transparent py-3 focus:ring-0 focus:border-primary transition-colors outline-none"
                                placeholder="Julian" type="text" />
                        </div>
                        <div class="space-y-2">
                            <label class="font-label-md text-label-md text-secondary block">LAST NAME</label>
                            <input
                                class="w-full border-0 border-b border-outline-variant bg-transparent py-3 focus:ring-0 focus:border-primary transition-colors outline-none"
                                placeholder="Vandermeer" type="text" />
                        </div>
                        <div class="md:col-span-2 space-y-2">
                            <label class="font-label-md text-label-md text-secondary block">EMAIL ADDRESS</label>
                            <input
                                class="w-full border-0 border-b border-outline-variant bg-transparent py-3 focus:ring-0 focus:border-primary transition-colors outline-none"
                                placeholder="j.vandermeer@elysian.com" type="email" />
                        </div>
                    </div>
                </div>
                <div>
                    <div class="flex items-center gap-4 mb-6">
                        <span
                            class="w-8 h-8 rounded-full bg-primary text-on-primary flex items-center justify-center font-label-md text-label-md">2</span>
                        <h2 class="font-headline-md text-headline-md text-primary">Payment Details</h2>
                    </div>
                    <div class="space-y-8 bg-surface-container-low p-8">
                        <div class="flex gap-6 mb-4">
                            <label class="flex items-center gap-3 cursor-pointer group">
                                <input checked="" class="text-primary focus:ring-primary w-4 h-4" name="payment"
                                    type="radio" />
                                <span
                                    class="font-label-md text-label-md group-hover:text-primary transition-colors">CREDIT
                                    CARD</span>
                            </label>
                            <label class="flex items-center gap-3 cursor-pointer group">
                                <input class="text-primary focus:ring-primary w-4 h-4" name="payment" type="radio" />
                                <span
                                    class="font-label-md text-label-md group-hover:text-primary transition-colors">BANK
                                    TRANSFER</span>
                            </label>
                        </div>
                        <div class="space-y-6">
                            <div class="space-y-2">
                                <label class="font-label-md text-label-md text-secondary block">CARDHOLDER NAME</label>
                                <input
                                    class="w-full border-0 border-b border-outline-variant bg-transparent py-3 focus:ring-0 focus:border-primary transition-colors outline-none"
                                    placeholder="Julian Vandermeer" type="text" />
                            </div>
                            <div class="space-y-2">
                                <label class="font-label-md text-label-md text-secondary block">CARD NUMBER</label>
                                <div class="relative">
                                    <input
                                        class="w-full border-0 border-b border-outline-variant bg-transparent py-3 focus:ring-0 focus:border-primary transition-colors outline-none pr-10"
                                        placeholder="0000 0000 0000 0000" type="text" />
                                    <span
                                        class="material-symbols-outlined absolute right-0 top-3 text-secondary">credit_card</span>
                                </div>
                            </div>
                            <div class="grid grid-cols-2 gap-gutter">
                                <div class="space-y-2">
                                    <label class="font-label-md text-label-md text-secondary block">EXPIRY DATE</label>
                                    <input
                                        class="w-full border-0 border-b border-outline-variant bg-transparent py-3 focus:ring-0 focus:border-primary transition-colors outline-none"
                                        placeholder="MM/YY" type="text" />
                                </div>
                                <div class="space-y-2">
                                    <label class="font-label-md text-label-md text-secondary block">CVC</label>
                                    <input
                                        class="w-full border-0 border-b border-outline-variant bg-transparent py-3 focus:ring-0 focus:border-primary transition-colors outline-none"
                                        placeholder="123" type="text" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="pt-6 border-t border-outline-variant">
                    <p class="text-secondary font-body-md mb-8 italic">"Every stay is curated with silence in mind. By
                        confirming, you agree to our house rules and sanctuary protocols."</p>
                    <button
                        class="w-full md:w-auto bg-primary text-on-primary px-12 py-5 font-label-md text-label-md uppercase tracking-widest hover:opacity-90 active:scale-[0.99] transition-all">
                        Confirm Booking
                    </button>
                </div>
            </section>
            <aside class="lg:col-span-5">
                <div class="sticky top-32 space-y-6">
                    <div class="bg-surface-container-lowest overflow-hidden shadow-sm border border-surface-container">
                        <div class="h-64 overflow-hidden">
                            <img class="w-full h-full object-cover"
                                data-alt="A luxurious minimalist villa with floor-to-ceiling glass windows overlooking a serene coastal landscape at dusk. The interior is bathed in warm, soft golden lighting, highlighting a clean white aesthetic with deep navy blue accents. Outside, the calm ocean reflects a purple and orange sunset sky, creating a tranquil digital sanctuary atmosphere."
                                src="https://lh3.googleusercontent.com/aida-public/AB6AXuDfVnairrRGgsqwhTjApksebVhJ2smIG9OllMOtc3TCtYgnznYDg2ukmlOAGb0oZlYNIQCWI0chGkGsnfXHZC2dCGFoPM29VhaHFRP-nCHpRV71Z7SGoE9sGkOuB4IBbLkDCI95RPHqM5FpCQR8p8rINNKnua8xJhJTJyP2FZBaYe5l6GgX1aZjfsP2jAQXtkCyhELEdokKVnLft9PD9J28KWrl2S8ty-q4gE6OYaaJQXOCS8FpBjtNfrOzqsSmTT12LmwF-wlg3PVr" />
                        </div>
                        <div class="p-8 space-y-6">
                            <div>
                                <h3 class="font-headline-md text-headline-md text-primary mb-2">The Glass Pavilion</h3>
                                <div class="flex items-center gap-2 text-secondary">
                                    <span class="material-symbols-outlined text-sm">location_on</span>
                                    <span class="font-label-sm text-label-sm">Reykjavík, Iceland</span>
                                </div>
                            </div>
                            <div class="grid grid-cols-2 gap-gutter py-6 border-y border-surface-container">
                                <div class="space-y-1">
                                    <span
                                        class="font-label-sm text-label-sm text-secondary uppercase tracking-tighter block">CHECK-IN</span>
                                    <span class="font-label-md text-label-md text-primary block">Oct 14, 2024</span>
                                </div>
                                <div class="space-y-1">
                                    <span
                                        class="font-label-sm text-label-sm text-secondary uppercase tracking-tighter block">CHECK-OUT</span>
                                    <span class="font-label-md text-label-md text-primary block">Oct 21, 2024</span>
                                </div>
                            </div>
                            <div class="space-y-3">
                                <div class="flex justify-between items-center">
                                    <span class="font-body-md text-secondary">7 nights at $1,250</span>
                                    <span class="font-body-md text-primary font-bold">$8,750.00</span>
                                </div>
                                <div class="flex justify-between items-center">
                                    <span class="font-body-md text-secondary">Concierge Service Fee</span>
                                    <span class="font-body-md text-primary font-bold">$420.00</span>
                                </div>
                                <div class="flex justify-between items-center">
                                    <span class="font-body-md text-secondary">Environmental Tax</span>
                                    <span class="font-body-md text-primary font-bold">$85.00</span>
                                </div>
                            </div>
                            <div class="pt-6 border-t border-primary flex justify-between items-end">
                                <span class="font-headline-md text-headline-md text-primary">Total</span>
                                <div class="text-right">
                                    <span class="block font-label-sm text-label-sm text-secondary">USD</span>
                                    <span
                                        class="font-headline-md text-headline-md text-primary font-bold">$9,255.00</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="bg-primary-container p-6 flex gap-4 items-start">
                        <span class="material-symbols-outlined text-tertiary-fixed-dim"
                            data-weight="fill">verified_user</span>
                        <div>
                            <h4 class="font-label-md text-label-md text-on-primary-container uppercase">Elysian
                                Guarantee</h4>
                            <p class="font-body-md text-on-primary-container text-sm opacity-80 mt-1">Your booking is
                                protected by our global concierge support and 48-hour cancellation policy.</p>
                        </div>
                    </div>
                </div>
            </aside>
        </div>
    </main>
@endsection