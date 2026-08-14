<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

/**
 * CompanyController
 *
 * Handles all HTTP requests related to the public-facing pages of the
 * company profile website. Each method is responsible for a single page
 * and simply returns the corresponding Blade view. Keeping the controller
 * "thin" like this is a core MVC best practice — the controller's job is
 * only to receive the request and hand off a response, not to contain
 * business logic or markup.
 */
class CompanyController extends Controller
{
    /**
     * Display the Home page.
     *
     * Route: GET /
     */
    public function home()
    {
        $services = [
            [
                'icon' => 'code',
                'title' => 'Web Development',
                'description' => 'Custom, responsive websites and web applications built with modern frameworks.',
            ],
            [
                'icon' => 'device-mobile',
                'title' => 'Mobile Development',
                'description' => 'Native and cross-platform mobile apps for iOS and Android.',
            ],
            [
                'icon' => 'pencil-ruler',
                'title' => 'UI/UX Design',
                'description' => 'User-centered interface and experience design that keeps customers coming back.',
            ],
        ];

        return view('pages.home', [
            'title' => 'Home',
            'services' => $services,
        ]);
    }

    /**
     * Display the About page.
     *
     * Route: GET /about
     */
    public function about()
    {
        $team = [
            ['name' => 'Alex Santos', 'role' => 'Founder & CEO'],
            ['name' => 'Maria Cruz', 'role' => 'Lead Developer'],
            ['name' => 'Jordan Reyes', 'role' => 'Product Designer'],
        ];

        $coreValues = [
            'Integrity in everything we build.',
            'Innovation driven by real client needs.',
            'Excellence in every line of code.',
            'Collaboration across every team.',
        ];

        return view('pages.about', [
            'title' => 'About Us',
            'team' => $team,
            'coreValues' => $coreValues,
        ]);
    }

    /**
     * Display the Services page.
     *
     * Route: GET /services
     */
    public function services()
    {
        $services = [
            [
                'icon' => 'code',
                'title' => 'Web Development',
                'description' => 'We design and build fast, scalable, and secure websites and web applications tailored to your business.',
            ],
            [
                'icon' => 'device-mobile',
                'title' => 'Mobile Development',
                'description' => 'Cross-platform mobile apps that deliver a smooth, native-like experience on any device.',
            ],
            [
                'icon' => 'pencil-ruler',
                'title' => 'UI/UX Design',
                'description' => 'Human-centered design that turns complex workflows into simple, intuitive interfaces.',
            ],
            [
                'icon' => 'cloud',
                'title' => 'Cloud Solutions',
                'description' => 'Cloud infrastructure setup, migration, and management for reliable, scalable systems.',
            ],
            [
                'icon' => 'shield-check',
                'title' => 'Cybersecurity',
                'description' => 'Security audits, vulnerability testing, and protection strategies to keep your data safe.',
            ],
            [
                'icon' => 'chat-bubble',
                'title' => 'IT Consulting',
                'description' => 'Strategic technology guidance to help your business make smarter, future-proof decisions.',
            ],
        ];

        return view('pages.services', [
            'title' => 'Our Services',
            'services' => $services,
        ]);
    }

    /**
     * Display the Contact page.
     *
     * Route: GET /contact
     */
    public function contact()
    {
        $companyInfo = [
            'address' => '123 Innovation Avenue, Makati City, Metro Manila, Philippines',
            'email' => 'hello@yourcompany.com',
            'phone' => '+63 900 000 0000',
            'social' => [
                'facebook' => 'https://facebook.com/yourcompany',
                'linkedin' => 'https://linkedin.com/company/yourcompany',
                'twitter' => 'https://twitter.com/yourcompany',
                'instagram' => 'https://instagram.com/yourcompany',
            ],
        ];

        return view('pages.contact', [
            'title' => 'Contact Us',
            'companyInfo' => $companyInfo,
        ]);
    }
}
