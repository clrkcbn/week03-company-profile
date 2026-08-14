# NovaWorks Technologies — Company Profile Website

**Course:** ITST 302 – Client-Server Technologies
**Activity:** Week 3 Laboratory Activity — Mini Project 02
**Project Type:** Individual
**Stack:** Laravel (MVC), Blade Templating, Tailwind CSS
---

## 1. Introduction

### What is a Company Profile Website?
A company profile website is a public-facing site that introduces a business
to the world. It typically presents who the company is, what it offers, and
how to get in touch — acting as a digital storefront and first impression for
potential clients, partners, and employees.

### Why businesses need one
- **Credibility** — a professional website signals legitimacy to prospective clients.
- **Reach** — it's available to anyone, anywhere, at any time.
- **Marketing** — it showcases services and value proposition without a salesperson present.
- **First contact** — it's often the first place a potential client looks before reaching out.

### Purpose of this project
This project simulates a real freelance/junior-developer task: building a
multi-page company website for a fictional startup, **NovaWorks Technologies**,
using Laravel's MVC architecture. It demonstrates the practical application of
routing, controllers, and Blade templating in a structured, maintainable way.

---

## 2. Objectives

By completing this project, the following objectives were accomplished:

- [x] Explained and applied the MVC architecture in a Laravel context.
- [x] Created and named four application routes (`/`, `/about`, `/services`, `/contact`).
- [x] Built a single controller (`CompanyController`) with one method per page.
- [x] Built reusable Blade layouts and components (`navbar`, `footer`) instead
      of duplicating markup across pages.
- [x] Built four fully responsive pages using Tailwind CSS.
- [x] Organized the project following Laravel's standard folder structure.
- [x] Documented the project thoroughly in this README.

---

## 3. MVC Architecture

### What is MVC?
MVC (Model–View–Controller) is a software design pattern that separates an
application into three interconnected parts:

- **Model** — represents data and business logic (not required for this
  static-content project, but would hold things like `Service` or `TeamMember`
  records in a database-driven version).
- **View** — the presentation layer. In Laravel, this is handled by **Blade**
  templates (`.blade.php` files) that generate the HTML sent to the browser.
- **Controller** — the middleman. It receives the incoming request from a
  route, prepares any data the view needs, and returns the appropriate view.

### Why Laravel uses MVC
Laravel adopts MVC because it enforces **separation of concerns**: each part
of the application has one clear job. This makes the codebase easier to read,
test, and extend, since a change to the presentation (View) doesn't require
touching the business logic (Controller/Model), and vice versa.

### Advantages of MVC in software development
- **Maintainability** — logic, data, and presentation are isolated, so bugs are easier to trace.
- **Reusability** — Views (like our `navbar` and `footer` components) can be reused across pages.
- **Team collaboration** — designers can work on Views while developers work on Controllers/Models with minimal conflict.
- **Scalability** — new pages or features can be added by extending the existing structure instead of rewriting it.
- **Testability** — Controllers and Models can be unit tested independently of the HTML output.

### Request Flow Diagram

```
Browser
   │
   ▼
Route            (routes/web.php)
   │
   ▼
Controller        (CompanyController)
   │
   ▼
Blade View         (resources/views/pages/*.blade.php)
   │
   ▼
Response to Browser
```

A more detailed version of this diagram is available at
[!Diagram](documentation/architecture-diagram.svg)

---

## 4. Laravel Routing

### What is Routing?
Routing is how Laravel maps an incoming URL and HTTP method (e.g. `GET /about`)
to the code that should handle it — in this project, a method on
`CompanyController`. Routes are defined in `routes/web.php`.

### Named Routes
Every route in this project is named using `->name()`, e.g. `->name('about')`.
This lets Blade views reference URLs by name (`route('about')`) instead of
hard-coding the path string, so if a URL ever changes, only the route
definition needs to be updated — every link built with `route()` updates
automatically.

### GET Requests
All four routes use `Route::get(...)` because each page is simply **read**
(displayed) by the visitor — no data is being created, updated, or deleted,
so `GET` is the semantically correct HTTP verb.

### Route Definitions
```php
use App\Http\Controllers\CompanyController;
use Illuminate\Support\Facades\Route;

Route::get('/', [CompanyController::class, 'home'])->name('home');
Route::get('/about', [CompanyController::class, 'about'])->name('about');
Route::get('/services', [CompanyController::class, 'services'])->name('services');
Route::get('/contact', [CompanyController::class, 'contact'])->name('contact');
```

[!](Screenshot/web-php-routes.png)

---

## 5. Controllers

### Purpose of Controllers
A controller groups related request-handling logic together. Instead of
writing route logic directly inline in `web.php`, each route points to a
method on `CompanyController`, keeping `web.php` clean and the actual page
logic organized in one dedicated class.

### Benefits of Controllers
- Keeps routing files short and readable.
- Groups related actions (`home`, `about`, `services`, `contact`) under one class.
- Makes it easy to add middleware, validation, or additional logic later without cluttering the routes file.
- Encourages the "thin controller" principle — controllers coordinate, they don't contain heavy business logic.

### Controller Methods
`CompanyController` has four public methods, one per page:

```php
class CompanyController extends Controller
{
    public function home()
    {
        return view('pages.home', ['title' => 'Home', 'services' => $services]);
    }

    public function about() { /* returns pages.about with team & core values */ }

    public function services() { /* returns pages.services with the 6 services */ }

    public function contact() { /* returns pages.contact with company info */ }
}
```

Each method assembles the data the page needs (e.g. the list of services or
team members) and passes it to the corresponding Blade view via `view()`.

[!](Screenshot/company-controller.png)

---

## 6. Blade Templating Engine

### Blade Layouts
`resources/views/layouts/app.blade.php` is the **master layout**. It defines
the `<html>`/`<head>`/`<body>` skeleton, loads Tailwind CSS, and includes the
shared navbar and footer. Every page extends this layout instead of repeating
that boilerplate.

### Blade Components / Partials
The navbar and footer live in `resources/views/components/` and are pulled
into the layout with `@include`, so navigation and footer markup exists in
exactly **one place** in the codebase.

### `@extends`
Used at the top of every page view (e.g. `pages/home.blade.php`) to declare
which layout it builds on:
```blade
@extends('layouts.app')
```

### `@section` / `@yield`
- `@section('content') ... @endsection` in a page view defines the block of
  content specific to that page.
- `@yield('content')` in the layout marks **where** that content should be
  injected when the page is rendered.

### `@include`
Used in the layout to pull in the navbar and footer components without
duplicating their markup:
```blade
@include('components.navbar')
@include('components.footer')
```

### Sample code snippet
```blade
{{-- resources/views/pages/about.blade.php --}}
@extends('layouts.app')

@section('content')
    <h1>About NovaWorks Technologies</h1>
    @foreach ($coreValues as $value)
        <p>{{ $value }}</p>
    @endforeach
@endsection
```

[!](Screenshot/blade-layout.png)

---

## 7. Laravel Folder Structure

| Folder | Purpose |
|---|---|
| `app/` | Contains the application's core code — controllers, models, and business logic. |
| `routes/` | Defines how URLs map to controllers (`web.php` for browser-facing routes). |
| `resources/` | Holds "raw," un-compiled assets: Blade views, and (in a full project) source CSS/JS before they're built. |
| `public/` | The web server's document root — the only folder directly accessible from the browser; holds `index.php`, compiled CSS/JS, and images. |
| `bootstrap/` | Contains the framework's bootstrap/startup file and cached files Laravel generates for performance. |
| `config/` | Holds all of the application's configuration files (database, mail, services, etc.), each returning an array of settings. |

---

## 8. Screenshots

> Replace the placeholders below with your actual screenshots once the
> project is running locally (see `INSTALL.md`).

| Page / Item | Screenshot |
|---|---|
| Home Page | [!](Screenshot/homepage.png) |
| About Page | [!](Screenshot/about-page.png) |
| Services Page | [!](Screenshot/services-page.png) |
| Contact Page | [!](Screenshot/contact-page.png) |
| Navigation Bar | [!](Screenshot/navbar.png) |
| Footer | [!](Screenshot/footer.png) |
| VS Code Project | [!](Screenshot/vscode-project.png) |
| Laravel Folder Structure | [!](Screenshot/folder-structure.png) |
| GitHub Repository | [!](Screenshot/github-repo.png) |
| Browser Output | [!](Screenshot/browser-output.png) |
| Route Definitions | [!](Screenshot/web-php-routes.png) |
| Controller | [!](Screenshot/company-controller.png) |
| Blade Layout | [!](Screenshot/blade-layout.png) |

---

## 9. Problems Encountered & Solutions

| # | Problem Encountered | Solution |
|---|---|---|
| 1 | **Route not found** — visiting `/about` returned a 404 error. | Discovered the route in `web.php` was misspelled as `/abuot`. Corrected the path and confirmed with `php artisan route:list`. |
| 2 | **View not found** — `View [pages.about] not found` error when loading the About page. | The Blade file was saved as `About.blade.php` (capitalized) inside `resources/views/Pages/`. Renamed the folder and file to lowercase (`pages/about.blade.php`) to match Laravel's view-resolution convention. |
| 3 | **Duplicate navbar/footer code** causing inconsistent styling across pages. | Extracted the navbar and footer into their own Blade components (`components/navbar.blade.php`, `components/footer.blade.php`) and included them once in the master layout, so every page automatically stays in sync. |
| 4 | **Blade syntax errors** — a stray `@endforeach` without a matching `@foreach` broke page rendering. | Carefully reviewed each Blade control-structure pair and used consistent indentation to make opening/closing directives easier to track. |

---

## 10. Reflection

Working on this project gave me a much clearer, hands-on understanding of the
Model–View–Controller pattern than reading about it in isolation ever could.
Going in, MVC felt like an abstract diagram — three boxes and some arrows.
Building an actual multi-page site around it made the "why" click: each part
of the application really does have exactly one job, and that discipline pays
off almost immediately. When I needed to update the navigation links, I
touched one file — the navbar component — and every page updated at once.
Before I refactored into components, I had briefly copy-pasted the header
into two pages, and even in that short window I could feel how quickly
inconsistencies creep in when markup is duplicated instead of reused.

Separation of concerns matters because it limits the blast radius of any
single change. My controller doesn't know or care what Tailwind classes are
used to style a button, and my Blade views don't need to know how the list of
services was assembled — they just receive `$services` and loop over it. That
boundary means a designer could rework the entire visual style of this site
without touching a single line of PHP, and I could swap the hard-coded
service arrays for real database records later without touching a single
Blade file. In a solo project like this one, that separation is a nice-to-have.
On a team, it's closer to a necessity — it's what lets multiple people work on
the same application simultaneously without constantly stepping on each
other's code.

Seeing routes, controllers, and views work together end-to-end also
demystified what actually happens when a browser requests a page. A URL comes
in, `web.php` matches it to a method, that method in `CompanyController`
gathers whatever data the page needs and hands it off, and a Blade view turns
that data into HTML that gets sent back down to the browser. Naming the
routes and using Laravel's `route()` helper instead of hard-coded strings
also showed me a small but important lesson: even "just displaying a page" is
an opportunity to write more maintainable code if you use the tools the
framework gives you.

I can see this same architecture scaling directly into enterprise systems.
Right now, my "services" and "team" data are hard-coded arrays sitting inside
the controller — but the exact same routes and views would work unchanged if
that data came from a `Service` or `TeamMember` Eloquent model backed by a
real database instead. That's the real power of MVC at scale: the View layer
doesn't need to change just because the Model layer grows from a static array
into a full relational database with thousands of records, multiple related
tables, caching layers, and API integrations. Controllers can grow to
coordinate multiple models, apply authorization rules, or delegate to service
classes, while still returning the same simple `view()` call at the end. This
project was small, but it followed the exact same architectural shape that a
much larger, database-backed, multi-team enterprise Laravel application
would — which is exactly the point of learning it here first.

---

## 11. References

Laravel. (2024). *Laravel 11.x documentation*. Laravel LLC. https://laravel.com/docs

PHP Group. (2024). *PHP manual*. https://www.php.net/manual/en/

Mozilla Developer Network. (2024). *MDN Web Docs*. Mozilla Foundation. https://developer.mozilla.org/

Tailwind Labs. (2024). *Tailwind CSS documentation*. https://tailwindcss.com/docs

---

## Suggested Git Commit Sequence

```
feat: create Laravel project
feat: add company routes
feat: create CompanyController
feat: build Home page
feat: build About page
feat: build Services page
feat: build Contact page
feat: extract navbar and footer into reusable components
docs: update README
```

---

## LinkedIn Post Draft

```
🚀 Week 3 – Client-Server Technologies

This week, I developed a multi-page Company Profile Website for a fictional
startup, NovaWorks Technologies, using Laravel's MVC architecture. I
implemented routing, a dedicated controller, and reusable Blade layouts and
components to keep the codebase clean while learning how Laravel processes
client requests and serves dynamic web pages end to end.

Through this project I gained a deeper understanding of separation of
concerns and reusable UI components — foundational skills for enterprise web
development.

🔗 GitHub Repository: https://github.com/clrkcbn/week03-company-profile

#Laravel #MVC #PHP #Blade #GitHub #WebDevelopment #ClientServer
#SoftwareEngineering #ComputerScience
```
