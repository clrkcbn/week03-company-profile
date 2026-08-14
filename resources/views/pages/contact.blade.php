@extends('layouts.app')

@section('content')

    <section class="bg-brand-50 py-16 text-center">
        <div class="max-w-3xl mx-auto px-6">
            <h1 class="text-4xl font-extrabold text-brand-900">Contact Us</h1>
            <p class="mt-4 text-slate-600">We'd love to hear about your project. Reach out any time.</p>
        </div>
    </section>

    <section class="max-w-6xl mx-auto px-6 py-16 grid md:grid-cols-2 gap-12">

        {{-- Contact Form (UI only, no submission handling required for this activity) --}}
        <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-8">
            <h2 class="text-xl font-bold text-brand-900 mb-6">Send Us a Message</h2>
            <form class="space-y-5">
                @csrf
                <div>
                    <label for="name" class="block text-sm font-medium text-slate-700 mb-1">Full Name</label>
                    <input type="text" id="name" name="name" placeholder="Juan Dela Cruz"
                           class="w-full rounded-lg border border-slate-200 px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-brand-500">
                </div>
                <div>
                    <label for="email" class="block text-sm font-medium text-slate-700 mb-1">Email Address</label>
                    <input type="email" id="email" name="email" placeholder="you@example.com"
                           class="w-full rounded-lg border border-slate-200 px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-brand-500">
                </div>
                <div>
                    <label for="subject" class="block text-sm font-medium text-slate-700 mb-1">Subject</label>
                    <input type="text" id="subject" name="subject" placeholder="Project Inquiry"
                           class="w-full rounded-lg border border-slate-200 px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-brand-500">
                </div>
                <div>
                    <label for="message" class="block text-sm font-medium text-slate-700 mb-1">Message</label>
                    <textarea id="message" name="message" rows="5" placeholder="Tell us about your project..."
                              class="w-full rounded-lg border border-slate-200 px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-brand-500"></textarea>
                </div>
                <button type="submit"
                        class="w-full rounded-full bg-brand-600 text-white py-3 font-semibold hover:bg-brand-700 transition">
                    Send Message
                </button>
                <p class="text-xs text-slate-400 text-center">
                    This form is UI only for this activity — no backend submission is wired up.
                </p>
            </form>
        </div>

        {{-- Company Info --}}
        <div class="space-y-8">
            <div>
                <h2 class="text-xl font-bold text-brand-900 mb-4">Get in Touch</h2>
                <ul class="space-y-4 text-slate-600 text-sm">
                    <li class="flex gap-3">
                        <span class="font-semibold text-brand-700 w-20 shrink-0">Address</span>
                        <span>{{ $companyInfo['address'] }}</span>
                    </li>
                    <li class="flex gap-3">
                        <span class="font-semibold text-brand-700 w-20 shrink-0">Email</span>
                        <span>{{ $companyInfo['email'] }}</span>
                    </li>
                    <li class="flex gap-3">
                        <span class="font-semibold text-brand-700 w-20 shrink-0">Phone</span>
                        <span>{{ $companyInfo['phone'] }}</span>
                    </li>
                </ul>
            </div>

            <div>
                <h3 class="font-semibold text-brand-900 mb-3">Follow Us</h3>
                <div class="flex gap-4 text-sm">
                    <a href="{{ $companyInfo['social']['facebook'] }}" class="text-brand-600 hover:underline">Facebook</a>
                    <a href="{{ $companyInfo['social']['linkedin'] }}" class="text-brand-600 hover:underline">LinkedIn</a>
                    <a href="{{ $companyInfo['social']['twitter'] }}" class="text-brand-600 hover:underline">Twitter</a>
                    <a href="{{ $companyInfo['social']['instagram'] }}" class="text-brand-600 hover:underline">Instagram</a>
                </div>
            </div>

            {{-- Embedded Google Map (optional) --}}
            <div class="rounded-2xl overflow-hidden border border-slate-100">
                <iframe
                    src="https://www.google.com/maps?q=Makati%20City%2C%20Metro%20Manila&output=embed"
                    width="100%" height="260" style="border:0;" allowfullscreen loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade">
                </iframe>
            </div>
        </div>
    </section>

@endsection
