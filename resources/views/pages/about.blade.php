@extends('layouts.app')

@section('content')

    <section class="bg-brand-50 py-16 text-center">
        <div class="max-w-3xl mx-auto px-6">
            <h1 class="text-4xl font-extrabold text-brand-900">About NovaWorks Technologies</h1>
            <p class="mt-4 text-slate-600">Learn more about who we are, what we believe in, and the people behind our work.</p>
        </div>
    </section>

    {{-- Company History --}}
    <section class="max-w-5xl mx-auto px-6 py-16 grid md:grid-cols-2 gap-12 items-center">
        <div>
            <h2 class="text-2xl font-bold text-brand-900 mb-4">Our History</h2>
            <p class="text-slate-600 leading-relaxed">
                NovaWorks Technologies started as a two-person freelance team taking on small web
                projects for local businesses. As demand grew, the team expanded into a full
                startup, formalizing its processes and hiring specialists in development, design,
                and cloud infrastructure. Today, we work with startups and enterprises alike,
                bringing the same care to every project regardless of size.
            </p>
        </div>
        <div class="bg-slate-50 rounded-2xl p-8">
            <ul class="space-y-4 text-sm text-slate-600">
                <li><span class="font-semibold text-brand-700">2021</span> — Founded as a two-person freelance studio.</li>
                <li><span class="font-semibold text-brand-700">2022</span> — Registered as a formal startup company.</li>
                <li><span class="font-semibold text-brand-700">2023</span> — Grew to a 10-person cross-functional team.</li>
                <li><span class="font-semibold text-brand-700">2024–Present</span> — Delivering full-stack web, mobile, and cloud solutions.</li>
            </ul>
        </div>
    </section>

    {{-- Mission & Vision --}}
    <section class="bg-slate-50 py-16">
        <div class="max-w-5xl mx-auto px-6 grid md:grid-cols-2 gap-8">
            <div class="bg-white rounded-2xl p-8 shadow-sm border border-slate-100">
                <h3 class="text-xl font-bold text-brand-900 mb-3">Our Mission</h3>
                <p class="text-slate-600 text-sm leading-relaxed">
                    To empower businesses of all sizes with reliable, well-engineered software
                    that solves real problems and grows with them.
                </p>
            </div>
            <div class="bg-white rounded-2xl p-8 shadow-sm border border-slate-100">
                <h3 class="text-xl font-bold text-brand-900 mb-3">Our Vision</h3>
                <p class="text-slate-600 text-sm leading-relaxed">
                    To be a trusted technology partner recognized for quality, integrity, and
                    innovation across Southeast Asia and beyond.
                </p>
            </div>
        </div>
    </section>

    {{-- Core Values --}}
    <section class="max-w-5xl mx-auto px-6 py-16">
        <h2 class="text-2xl font-bold text-brand-900 mb-8 text-center">Core Values</h2>
        <div class="grid sm:grid-cols-2 md:grid-cols-4 gap-6">
            @foreach ($coreValues as $value)
                <div class="rounded-xl border border-slate-100 p-6 text-center hover:shadow-md transition">
                    <div class="w-10 h-10 mx-auto mb-4 rounded-full bg-brand-100 text-brand-600 flex items-center justify-center font-bold">
                        {{ $loop->iteration }}
                    </div>
                    <p class="text-sm text-slate-600">{{ $value }}</p>
                </div>
            @endforeach
        </div>
    </section>

    {{-- Team Introduction --}}
    <section class="bg-slate-50 py-16">
        <div class="max-w-5xl mx-auto px-6">
            <h2 class="text-2xl font-bold text-brand-900 mb-10 text-center">Meet the Team</h2>
            <div class="grid sm:grid-cols-3 gap-8">
                @foreach ($team as $member)
                    <div class="bg-white rounded-2xl p-6 text-center shadow-sm border border-slate-100">
                        <div class="w-20 h-20 rounded-full bg-brand-100 text-brand-600 mx-auto mb-4 flex items-center justify-center text-2xl font-bold">
                            {{ strtoupper(substr($member['name'], 0, 1)) }}
                        </div>
                        <h3 class="font-semibold text-brand-900">{{ $member['name'] }}</h3>
                        <p class="text-sm text-slate-500">{{ $member['role'] }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

@endsection
