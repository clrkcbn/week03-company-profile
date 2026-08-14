@extends('layouts.app')

@section('content')

    {{-- Hero Banner --}}
    <section class="bg-gradient-to-b from-brand-50 to-white">
        <div class="max-w-6xl mx-auto px-6 py-24 text-center">
            <span class="inline-block mb-4 px-4 py-1 rounded-full bg-brand-100 text-brand-700 text-sm font-medium">
                Welcome to NovaWorks Technologies
            </span>
            <h1 class="text-4xl md:text-5xl font-extrabold text-brand-900 leading-tight">
                We Build Digital Products <br class="hidden md:block"> That Move Your Business Forward
            </h1>
            <p class="mt-6 max-w-2xl mx-auto text-lg text-slate-600">
                NovaWorks is a technology startup helping companies design, build, and scale
                web, mobile, and cloud solutions — from idea to launch.
            </p>
            <div class="mt-10">
                <a href="{{ route('contact') }}"
                   class="inline-block rounded-full bg-brand-600 text-white px-8 py-3 font-semibold hover:bg-brand-700 transition">
                    Get a Free Consultation
                </a>
            </div>
        </div>
    </section>

    {{-- Company Introduction --}}
    <section class="max-w-6xl mx-auto px-6 py-20 grid md:grid-cols-2 gap-12 items-center">
        <div>
            <h2 class="text-3xl font-bold text-brand-900 mb-4">Who We Are</h2>
            <p class="text-slate-600 leading-relaxed">
                Founded by a small team of engineers and designers, NovaWorks Technologies exists
                to help startups and growing businesses turn their ideas into reliable software.
                We combine modern engineering practices with thoughtful design to deliver products
                that are fast, secure, and built to scale.
            </p>
        </div>
        <div class="bg-brand-50 rounded-2xl p-10 text-center">
            <div class="grid grid-cols-2 gap-6">
                <div>
                    <p class="text-3xl font-extrabold text-brand-600">50+</p>
                    <p class="text-sm text-slate-600">Projects Delivered</p>
                </div>
                <div>
                    <p class="text-3xl font-extrabold text-brand-600">30+</p>
                    <p class="text-sm text-slate-600">Happy Clients</p>
                </div>
                <div>
                    <p class="text-3xl font-extrabold text-brand-600">5+</p>
                    <p class="text-sm text-slate-600">Years Combined Experience</p>
                </div>
                <div>
                    <p class="text-3xl font-extrabold text-brand-600">24/7</p>
                    <p class="text-sm text-slate-600">Support</p>
                </div>
            </div>
        </div>
    </section>

    {{-- Featured Services --}}
    <section class="bg-slate-50 py-20">
        <div class="max-w-6xl mx-auto px-6">
            <div class="text-center mb-14">
                <h2 class="text-3xl font-bold text-brand-900">Featured Services</h2>
                <p class="text-slate-600 mt-3">A few of the ways we can help your business grow.</p>
            </div>

            <div class="grid md:grid-cols-3 gap-8">
                @foreach ($services as $service)
                    <div class="bg-white rounded-2xl p-8 shadow-sm border border-slate-100 hover:shadow-md transition">
                        <div class="w-12 h-12 rounded-lg bg-brand-100 text-brand-600 flex items-center justify-center mb-5">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 3v2m6-2v2M4 8h16M5 8h14v11a2 2 0 01-2 2H7a2 2 0 01-2-2V8z" />
                            </svg>
                        </div>
                        <h3 class="text-xl font-semibold text-brand-900 mb-2">{{ $service['title'] }}</h3>
                        <p class="text-slate-600 text-sm">{{ $service['description'] }}</p>
                    </div>
                @endforeach
            </div>

            <div class="text-center mt-12">
                <a href="{{ route('services') }}" class="text-brand-600 font-semibold hover:underline">
                    View All Services &rarr;
                </a>
            </div>
        </div>
    </section>

    {{-- Call To Action --}}
    <section class="bg-brand-600">
        <div class="max-w-4xl mx-auto px-6 py-16 text-center">
            <h2 class="text-3xl font-bold text-white mb-4">Ready to start your next project?</h2>
            <p class="text-brand-100 mb-8">Let's talk about how NovaWorks can help bring your idea to life.</p>
            <a href="{{ route('contact') }}"
               class="inline-block rounded-full bg-white text-brand-700 px-8 py-3 font-semibold hover:bg-brand-50 transition">
                Contact Us Today
            </a>
        </div>
    </section>

@endsection
