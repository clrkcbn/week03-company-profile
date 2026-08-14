@extends('layouts.app')

@section('content')

    <section class="bg-brand-50 py-16 text-center">
        <div class="max-w-3xl mx-auto px-6">
            <h1 class="text-4xl font-extrabold text-brand-900">Our Services</h1>
            <p class="mt-4 text-slate-600">
                We offer a full range of technology services to help your business build, launch, and scale.
            </p>
        </div>
    </section>

    <section class="max-w-6xl mx-auto px-6 py-20">
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach ($services as $service)
                <div class="bg-white rounded-2xl p-8 shadow-sm border border-slate-100 hover:shadow-md hover:-translate-y-1 transition">
                    <div class="w-14 h-14 rounded-xl bg-brand-100 text-brand-600 flex items-center justify-center mb-6">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-7 h-7" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-brand-900 mb-3">{{ $service['title'] }}</h3>
                    <p class="text-slate-600 text-sm leading-relaxed">{{ $service['description'] }}</p>
                </div>
            @endforeach
        </div>

        <div class="mt-16 text-center bg-slate-50 rounded-2xl p-10">
            <h2 class="text-2xl font-bold text-brand-900 mb-3">Don't see what you're looking for?</h2>
            <p class="text-slate-600 mb-6">Tell us about your project and we'll figure out the right solution together.</p>
            <a href="{{ route('contact') }}"
               class="inline-block rounded-full bg-brand-600 text-white px-8 py-3 font-semibold hover:bg-brand-700 transition">
                Talk to Us
            </a>
        </div>
    </section>

@endsection
