{{--
    Reusable footer.
    Included in the master layout so every page automatically shares
    the same copyright, social links, and contact information.
--}}
<footer class="bg-brand-900 text-brand-100">
    <div class="max-w-6xl mx-auto px-6 py-12 grid gap-10 md:grid-cols-3">

        <div>
            <div class="flex items-center gap-2 mb-3">
                <span class="w-8 h-8 rounded-lg bg-brand-600 text-white flex items-center justify-center font-bold">N</span>
                <span class="text-lg font-bold text-white">NovaWorks Technologies</span>
            </div>
            <p class="text-sm text-brand-100/70">
                Building modern, reliable digital products for growing businesses.
            </p>
        </div>

        <div>
            <h4 class="text-white font-semibold mb-3">Contact</h4>
            <ul class="text-sm space-y-2 text-brand-100/80">
                <li>123 Innovation Avenue, Makati City, Metro Manila</li>
                <li>hello@yourcompany.com</li>
                <li>+63 900 000 0000</li>
            </ul>
        </div>

        <div>
            <h4 class="text-white font-semibold mb-3">Follow Us</h4>
            <div class="flex gap-4 text-sm">
                <a href="https://facebook.com/yourcompany" class="hover:text-white">Facebook</a>
                <a href="https://linkedin.com/company/yourcompany" class="hover:text-white">LinkedIn</a>
                <a href="https://twitter.com/yourcompany" class="hover:text-white">Twitter</a>
                <a href="https://instagram.com/yourcompany" class="hover:text-white">Instagram</a>
            </div>
        </div>
    </div>

    <div class="border-t border-white/10 py-5 text-center text-xs text-brand-100/60">
        &copy; {{ date('Y') }} NovaWorks Technologies. All rights reserved.
    </div>
</footer>
