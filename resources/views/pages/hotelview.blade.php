@extends('layouts.app')

@section('title', 'Hotel View')
@section('content')
    <main class="pt-28 pb-20 max-w-7xl mx-auto px-6 lg:px-20">
        <section class="max-w-container-max mx-auto px-margin-desktop mb-16">
            <div class="flex justify-between items-end mb-8">
                <div>
                    <h1 class="font-display-lg text-display-lg text-primary mb-2">The Azure Sanctuary</h1>
                    <p class="font-body-lg text-body-lg text-secondary flex items-center gap-2">
                        <span class="material-symbols-outlined">location_on</span>
                        Santorini, Greece
                    </p>
                </div>
                <div class="flex gap-4">
                    <button
                        class="p-3 rounded-full bg-surface-container-low text-primary border border-outline-variant hover:bg-surface-container-high transition-colors">
                        <span class="material-symbols-outlined">share</span>
                    </button>
                    <button
                        class="p-3 rounded-full bg-surface-container-low text-primary border border-outline-variant hover:bg-surface-container-high transition-colors">
                        <span class="material-symbols-outlined">favorite</span>
                    </button>
                </div>
            </div>
            <div class="grid grid-cols-12 grid-rows-2 gap-4 h-[600px] overflow-hidden rounded-lg">
                <div class="col-span-8 row-span-2 relative group cursor-pointer overflow-hidden">
                    <img class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105"
                        data-alt="A wide-angle landscape photograph of The Azure Sanctuary hotel in Santorini, featuring pristine white architectural lines against a deep Mediterranean blue sea. The morning sun casts soft, long shadows across a private infinity pool that blends seamlessly with the horizon. The aesthetic is clean, luxurious, and peaceful, embodying a high-end digital sanctuary."
                        src="https://lh3.googleusercontent.com/aida-public/AB6AXuDSaOnhOu3y_J62HWDxflpj0ZPyS0ztvT5LcNm7-1w2WGNwsjrMgObD9wNgpvZZON6mEhlVLdTPY92lWW9c40rAxTCXZX8Sbb0d8xEU6_rKfyolMw_QZbeWH6llybiLSijhjmxNa0AgrmvoB5P0HwsZXbYPExzYD4O4L7uNYPampGB7G7qp21oe93SgzV_l2JrMNgUNv4LagjBdw3Bmn94J8CDjK9Q06_26atgR9cPoYo7p4eIco6G1abuJZXB4aZAsHAKJT2Iyy4qk" />
                </div>
                <div class="col-span-4 row-span-1 relative group cursor-pointer overflow-hidden">
                    <img class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105"
                        data-alt="An interior shot of a minimalist luxury suite at The Azure Sanctuary with white plastered walls and natural wooden accents. Soft daylight filters through sheer linen curtains, illuminating a plush king-sized bed and a quiet reading nook. The composition is airy and sophisticated, using a neutral color palette of eggshell and warm sand."
                        src="https://lh3.googleusercontent.com/aida-public/AB6AXuALOFrFeBLx3CaUY8gnv0y9IplCqcZsOWKppIGYNudz6jZnzGk_cSGKIM6ffq8d_x4E85aOJonPNi3aEU-C6gEgwMxQpxj3TyO3FkI3u1aMwnbIrXxrYxz3qMNLzUxxwsLdGigY2dyDJ2_bjcybaeVMr45OYXjZ23PtdNL4mMsslKqv2Zt_iPr8N-20W34CAsA00E8SaeYOM1kNZY1tHOgs4vhSG1T-OnWWjhJQB-88mRr75sWpHjcstCIXRV6a-K75LPDS265s9XlX" />
                </div>
                <div class="col-span-2 row-span-1 relative group cursor-pointer overflow-hidden">
                    <img class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105"
                        data-alt="A close-up detail of a spa treatment area at The Azure Sanctuary, featuring smooth volcanic stones and locally sourced essential oils on a marble tray. The lighting is dim and atmospheric, creating a sense of profound tranquility and exclusive wellness. The image highlights the hotel's commitment to sensory curation and premium natural materials."
                        src="https://lh3.googleusercontent.com/aida-public/AB6AXuAaUHVzgb_5zWEA6N4Ibqa5vmzTmTjCEUQFLzkhhrni8DIiChBHN09PdM8LreBPXnd9u8P5VwIQBmjRVS05fNJ448CMlj5aI8oOOdizcNFqXN2dDQnHTyDL4Gtk0WLJPAiI9FPZ28DGMatNpONyCXqwLXY6UQGLsRZw26W2zH3hi8duLEPe_j05SRgn3BZG3nuLjM3IV0xi49G2hGlNH-OWOtxq4Nw4D504jYrrkoYLfcwaGikbIGGLh37E-fGCO4eKxogyBSaUII7l" />
                </div>
                <div class="col-span-2 row-span-1 relative group cursor-pointer overflow-hidden">
                    <div
                        class="absolute inset-0 bg-primary/40 flex flex-col items-center justify-center text-on-primary z-10 transition-opacity group-hover:bg-primary/60">
                        <span class="material-symbols-outlined text-4xl mb-2">grid_view</span>
                        <span class="font-label-md text-label-md uppercase tracking-widest">View 24 Photos</span>
                    </div>
                    <img class="w-full h-full object-cover"
                        data-alt="A vertical shot of a hidden terrace at The Azure Sanctuary, surrounded by vibrant pink bougainvillea and overlooking the Aegean Sea at dusk. The sky is painted in soft lilac and gold, complementing the architectural white of the building. This editorial-style photograph captures the quiet elegance and private luxury of the property's exterior spaces."
                        src="https://lh3.googleusercontent.com/aida-public/AB6AXuAGZOfFoFwXYylj0NEPG8z-eZCUaQuaCfD6NXAX-dJaPSdgHQRB2GJL4HaVZowBx7KfKLAk386HMomcUFmu3mtoUnHyQQqgDNP294to-bu7SA6VdnRA1M9YRswzBCHMXgnBJr1IMN-A70gxmq_BcwnNmuxzogDm-BhhxLm2QQQgfGoVj5G3RLgVvE1q6dcdVSb2vp5-rz8x1nHqz3DHiwZeu1C_AIuCpEy3uFDeFducxP_lsKSjTU_BSxUhr4s-3KCGbM7jHhwjcAPo" />
                </div>
            </div>
        </section>
        <section class="max-w-container-max mx-auto px-margin-desktop grid grid-cols-12 gap-gutter">
            <div class="col-span-12 lg:col-span-8 space-y-16">
                <div class="border-b border-outline-variant pb-12">
                    <h2 class="font-headline-lg text-headline-lg text-primary mb-6">Property Overview</h2>
                    <p class="font-body-lg text-body-lg text-secondary leading-relaxed max-w-3xl">
                        Designed as a silent dialogue between the Aegean horizon and the rugged volcanic cliffs of
                        Santorini, The Azure Sanctuary offers a curated retreat for the mindful traveler. Every angle of
                        the property has been sculpted to maximize light and space, utilizing traditional Cycladic
                        techniques reimagined for modern luxury. This is more than a hotel; it is a meticulously crafted
                        atmosphere of stillness, where the rhythmic sound of the sea serves as the only soundtrack to
                        your stay.
                    </p>
                    <div class="mt-8 flex flex-wrap gap-4">
                        <div
                            class="flex items-center gap-2 bg-surface-container text-on-surface-variant px-4 py-2 rounded-full">
                            <span class="material-symbols-outlined text-sm">bed</span>
                            <span class="font-label-sm text-label-sm">2 Bedrooms</span>
                        </div>
                        <div
                            class="flex items-center gap-2 bg-surface-container text-on-surface-variant px-4 py-2 rounded-full">
                            <span class="material-symbols-outlined text-sm">shower</span>
                            <span class="font-label-sm text-label-sm">Private Spa Bath</span>
                        </div>
                        <div
                            class="flex items-center gap-2 bg-surface-container text-on-surface-variant px-4 py-2 rounded-full">
                            <span class="material-symbols-outlined text-sm">square_foot</span>
                            <span class="font-label-sm text-label-sm">1,200 sq ft</span>
                        </div>
                    </div>
                </div>
                <div>
                    <h2 class="font-headline-lg text-headline-lg text-primary mb-8">Exceptional Amenities</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-y-6 gap-x-12">
                        <div class="flex gap-4">
                            <span class="material-symbols-outlined text-primary text-2xl">pool</span>
                            <div>
                                <h4 class="font-label-md text-label-md text-primary mb-1">Private Infinity Pool</h4>
                                <p class="font-body-md text-body-md text-secondary">Temperated-controlled pool with
                                    seamless horizon edge.</p>
                            </div>
                        </div>
                        <div class="flex gap-4">
                            <span class="material-symbols-outlined text-primary text-2xl">restaurant</span>
                            <div>
                                <h4 class="font-label-md text-label-md text-primary mb-1">Private Chef Service</h4>
                                <p class="font-body-md text-body-md text-secondary">In-villa fine dining featuring
                                    locally sourced ingredients.</p>
                            </div>
                        </div>
                        <div class="flex gap-4">
                            <span class="material-symbols-outlined text-primary text-2xl">spa</span>
                            <div>
                                <h4 class="font-label-md text-label-md text-primary mb-1">In-Room Wellness</h4>
                                <p class="font-body-md text-body-md text-secondary">Holistic spa rituals and yoga
                                    equipment provided.</p>
                            </div>
                        </div>
                        <div class="flex gap-4">
                            <span class="material-symbols-outlined text-primary text-2xl">directions_car</span>
                            <div>
                                <h4 class="font-label-md text-label-md text-primary mb-1">Airport Concierge</h4>
                                <p class="font-body-md text-body-md text-secondary">Chauffeur-driven luxury transfers in
                                    electric vehicles.</p>
                            </div>
                        </div>
                    </div>
                    <button
                        class="mt-10 font-label-md text-label-md text-tertiary-container hover:text-primary underline underline-offset-8 transition-colors">Show
                        all 45 amenities</button>
                </div>
                <div class="pt-8 border-t border-outline-variant">
                    <div class="flex items-center justify-between mb-10">
                        <div class="flex items-center gap-4">
                            <h2 class="font-headline-lg text-headline-lg text-primary">Guest Reviews</h2>
                            <div class="flex items-center bg-primary text-on-primary px-3 py-1 rounded-sm gap-1">
                                <span class="material-symbols-outlined text-xs"
                                    style="font-variation-settings: 'FILL' 1;">star</span>
                                <span class="font-label-md text-label-md">4.96</span>
                            </div>
                        </div>
                        <button
                            class="font-label-md text-label-md text-secondary border border-outline px-6 py-2 rounded-DEFAULT hover:bg-surface-container transition-colors">Write
                            a Review</button>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-12">
                        <div class="space-y-4">
                            <div class="flex items-center gap-4">
                                <div
                                    class="w-12 h-12 rounded-full bg-surface-container-highest flex items-center justify-center font-bold text-primary">
                                    EK</div>
                                <div>
                                    <h4 class="font-label-md text-label-md text-primary">Elena K.</h4>
                                    <p class="font-label-sm text-label-sm text-secondary">June 2024 • London, UK</p>
                                </div>
                            </div>
                            <p class="font-body-md text-body-md text-on-surface-variant italic">"A literal sanctuary.
                                The design is so intentional—every morning I felt like I was waking up in a piece of
                                art. The concierge team anticipated needs I didn't even know I had."</p>
                        </div>
                        <div class="space-y-4">
                            <div class="flex items-center gap-4">
                                <div
                                    class="w-12 h-12 rounded-full bg-surface-container-highest flex items-center justify-center font-bold text-primary">
                                    MW</div>
                                <div>
                                    <h4 class="font-label-md text-label-md text-primary">Marcus W.</h4>
                                    <p class="font-label-sm text-label-sm text-secondary">May 2024 • San Francisco, USA
                                    </p>
                                </div>
                            </div>
                            <p class="font-body-md text-body-md text-on-surface-variant italic">"The privacy here is
                                unparalleled. If you are looking to disconnect and recharge in absolute luxury, this is
                                the only place in Santorini to consider."</p>
                        </div>
                    </div>
                </div>
            </div>
            <aside class="col-span-12 lg:col-span-4">
                <div class="sticky top-32 bg-white border border-outline-variant p-8 shadow-sm rounded-DEFAULT">
                    <div class="flex justify-between items-baseline mb-8">
                        <div>
                            <span class="font-headline-md text-headline-md text-primary font-bold">€1,240</span>
                            <span class="font-body-md text-body-md text-secondary">/ night</span>
                        </div>
                        <div class="flex items-center gap-1">
                            <span class="material-symbols-outlined text-sm"
                                style="font-variation-settings: 'FILL' 1;">star</span>
                            <span class="font-label-sm text-label-sm">4.96</span>
                        </div>
                    </div>
                    <div class="space-y-4 mb-8">
                        <div class="grid grid-cols-2 border border-outline rounded-DEFAULT">
                            <div class="p-4 border-r border-outline">
                                <label
                                    class="block font-label-sm text-label-sm text-secondary uppercase mb-1">Check-in</label>
                                <div class="font-body-md text-body-md text-primary">Oct 12, 2024</div>
                            </div>
                            <div class="p-4">
                                <label
                                    class="block font-label-sm text-label-sm text-secondary uppercase mb-1">Checkout</label>
                                <div class="font-body-md text-body-md text-primary">Oct 17, 2024</div>
                            </div>
                        </div>
                        <div class="border border-outline rounded-DEFAULT p-4">
                            <label
                                class="block font-label-sm text-label-sm text-secondary uppercase mb-1">Guests</label>
                            <div class="flex justify-between items-center">
                                <div class="font-body-md text-body-md text-primary">2 Adults</div>
                                <span class="material-symbols-outlined">expand_more</span>
                            </div>
                        </div>
                    </div>
                    <button
                        class="w-full bg-primary text-on-primary py-4 font-label-md text-label-md rounded-DEFAULT uppercase tracking-widest hover:opacity-90 transition-opacity mb-6">
                        Reserve Now
                    </button>
                    <p class="text-center font-label-sm text-label-sm text-secondary mb-8">You won't be charged yet</p>
                    <div class="space-y-4 pt-6 border-t border-outline-variant">
                        <div class="flex justify-between font-body-md text-body-md">
                            <span class="text-secondary">€1,240 x 5 nights</span>
                            <span class="text-primary font-medium">€6,200</span>
                        </div>
                        <div class="flex justify-between font-body-md text-body-md">
                            <span class="text-secondary">Concierge Service Fee</span>
                            <span class="text-primary font-medium">€150</span>
                        </div>
                        <div class="flex justify-between font-body-md text-body-md">
                            <span class="text-secondary">Eco-tourism Tax</span>
                            <span class="text-primary font-medium">€45</span>
                        </div>
                        <div
                            class="flex justify-between font-headline-md text-headline-md pt-4 text-primary font-bold">
                            <span>Total</span>
                            <span>€6,395</span>
                        </div>
                    </div>
                </div>
            </aside>
        </section>
    </main>
@endsection