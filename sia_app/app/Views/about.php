<?= $this->extend('layouts/main') ?>

<?= $this->section('title') ?>About Us<?= $this->endSection() ?>

<?= $this->section('content') ?>

<!-- HERO SECTION -->
<section class="relative bg-gradient-to-br from-indigo-900 via-indigo-700 to-purple-900 py-20 px-6 text-center flex flex-col items-center justify-center min-h-[40vh] overflow-hidden">
  <div class="absolute inset-0 pointer-events-none z-0">
    <svg class="absolute left-1/2 top-0 -translate-x-1/2 opacity-30 animate-pulse" width="1200" height="400" viewBox="0 0 1200 400" fill="none">
      <defs>
        <linearGradient id="about-circuit" x1="0" y1="0" x2="1200" y2="400" gradientUnits="userSpaceOnUse">
          <stop stop-color="#a5b4fc" />
          <stop offset="1" stop-color="#f472b6" />
        </linearGradient>
      </defs>
      <rect x="0" y="0" width="1200" height="400" fill="url(#about-circuit)" opacity="0.1"/>
      <g stroke="url(#about-circuit)" stroke-width="2">
        <path d="M100 100 Q200 200 300 100 T500 100 T700 100 T900 100" />
        <path d="M200 300 Q400 200 600 300 T1000 300" />
        <circle cx="600" cy="200" r="80" fill="none" />
      </g>
    </svg>
  </div>
  <div class="relative z-10 max-w-3xl mx-auto">
    <h1 class="text-5xl md:text-7xl font-extrabold text-white leading-tight mb-6 drop-shadow-lg font-mono">About BIT BY BIT</h1>
    <p class="text-2xl text-indigo-100 mb-6">A modern tech blogging platform for developers, engineers, and enthusiasts to <span class="font-mono bg-white/10 px-2 rounded">write</span>, <span class="font-mono bg-white/10 px-2 rounded">share</span>, and <span class="font-mono bg-white/10 px-2 rounded">connect</span>.</p>
  </div>
</section>

<!-- WHAT MAKES US A TECH BLOGGING PLATFORM -->
<section class="py-16 bg-gradient-to-br from-indigo-50 via-white to-pink-50 border-b border-gray-100">
  <div class="max-w-6xl mx-auto flex flex-col md:flex-row items-center gap-12 px-6">
    <div class="flex-1 flex justify-center mb-8 md:mb-0">
      <svg width="220" height="160" viewBox="0 0 220 160" fill="none"><rect x="10" y="30" width="200" height="80" rx="12" fill="#fff" fill-opacity=".12"/><rect x="24" y="46" width="172" height="12" rx="3" fill="#a5b4fc"/><rect x="24" y="66" width="120" height="8" rx="2" fill="#fbbf24"/><rect x="24" y="80" width="172" height="8" rx="2" fill="#f472b6"/><rect x="24" y="94" width="80" height="8" rx="2" fill="#34d399"/></svg>
    </div>
    <div class="flex-1">
      <h2 class="text-2xl font-bold mb-4 text-gray-900 font-mono">What Makes Us a Tech Blogging Platform?</h2>
      <ul class="mb-6 space-y-2">
        <li><span class="font-mono text-green-600">&lt;Code/&gt;</span> Focused on programming, engineering, and technology</li>
        <li><span class="font-mono text-yellow-600">#Share</span> Publish tutorials, reviews, and deep dives</li>
        <li><span class="font-mono text-pink-600">@Connect</span> Grow your network and get feedback</li>
        <li><span class="font-mono text-blue-600">★</span> Build your portfolio and reputation</li>
      </ul>
      <div class="bg-white/60 rounded-lg p-4 text-sm italic text-indigo-700 border-l-4 border-indigo-400 mb-2">“Blogging here helped me land a job and connect with amazing devs!”<br><span class="not-italic font-bold text-indigo-900">— Priya, Full Stack Blogger</span></div>
      <div class="mt-4">
        <div class="font-bold text-gray-700 mb-2">Sample Blog Titles:</div>
        <ul class="text-sm text-gray-600 font-mono grid grid-cols-1 sm:grid-cols-2 gap-2">
          <li>How I Built My First API in Go</li>
          <li>5 CSS Tricks for Responsive Layouts</li>
          <li>Why I Switched to TypeScript</li>
          <li>Debugging Like a Pro: My Workflow</li>
        </ul>
      </div>
    </div>
  </div>
</section>

<!-- OUR MISSION & VALUES (GLASSY CARDS) -->
<section class="py-16 bg-white/80 backdrop-blur border-b border-gray-100">
  <div class="max-w-6xl mx-auto px-6">
    <div class="grid md:grid-cols-2 gap-12 items-center">
      <div>
        <h2 class="text-2xl font-bold mb-4 text-gray-900 font-mono">Our Mission</h2>
        <p class="mb-3 text-gray-700">BIT BY BIT envisions a specialized platform where tech community members can effortlessly share programming tips, technology reviews, industry insights, and technical knowledge while building meaningful professional connections.</p>
        <p class="mb-0 text-gray-700">By creating a secure, responsive, and user-friendly environment, we aim to promote active participation and foster a sense of belonging among technology enthusiasts and professionals.</p>
      </div>
      <div class="grid grid-cols-1 sm:grid-cols-3 gap-6">
        <div class="flex flex-col items-center bg-white/60 backdrop-blur-lg rounded-xl p-6 shadow-xl">
          <svg class="w-8 h-8 mb-2 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a4 4 0 00-3-3.87M9 20H4v-2a4 4 0 013-3.87m9-4V7a4 4 0 00-8 0v3m12 4a4 4 0 01-8 0"></path></svg>
          <div class="text-lg font-bold text-indigo-600 mb-1 font-mono">Knowledge</div>
          <div class="text-gray-600 text-sm text-center">Sharing knowledge to advance the tech community.</div>
        </div>
        <div class="flex flex-col items-center bg-white/60 backdrop-blur-lg rounded-xl p-6 shadow-xl">
          <svg class="w-8 h-8 mb-2 text-pink-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21H5a2 2 0 01-2-2V7a2 2 0 012-2h4l2-2 2 2h4a2 2 0 012 2v12a2 2 0 01-2 2z"></path></svg>
          <div class="text-lg font-bold text-pink-600 mb-1 font-mono">Community</div>
          <div class="text-gray-600 text-sm text-center">An inclusive, supportive space for all techies.</div>
        </div>
        <div class="flex flex-col items-center bg-white/60 backdrop-blur-lg rounded-xl p-6 shadow-xl">
          <svg class="w-8 h-8 mb-2 text-amber-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v4a1 1 0 001 1h3v2a1 1 0 001 1h2a1 1 0 001-1v-2h3a1 1 0 001-1V7"></path></svg>
          <div class="text-lg font-bold text-amber-600 mb-1 font-mono">Integrity</div>
          <div class="text-gray-600 text-sm text-center">Honesty, transparency, and ethical practices.</div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- OUR STORY (GLASSY CARD) -->
<section class="py-16 bg-gradient-to-br from-indigo-50 via-white to-pink-50 border-b border-gray-100">
  <div class="max-w-4xl mx-auto px-6">
    <div class="bg-white/60 backdrop-blur-lg rounded-2xl shadow-xl p-8">
      <h2 class="text-2xl font-bold mb-4 text-center text-gray-900 font-mono">Our Story</h2>
      <p class="text-gray-700 mb-3">BIT BY BIT was born from a simple observation: while there are many general platforms for content sharing, few are designed specifically with the needs of technology professionals in mind.</p>
      <p class="text-gray-700 mb-3">In 2024, a group of passionate developers and tech enthusiasts came together with a vision to create a dedicated space for the technology community – a place where knowledge could be shared in a structured, meaningful way, and where connections between professionals could flourish.</p>
      <p class="text-gray-700 mb-3">What started as a small community has grown into a vibrant ecosystem of developers, data scientists, security experts, and technology enthusiasts from around the world. Today, BIT BY BIT serves thousands of users who come together to learn, share, and connect.</p>
      <p class="text-gray-700">As we continue to grow, our commitment remains the same: to provide a high-quality platform that empowers technology professionals to share their knowledge and build meaningful professional relationships.</p>
    </div>
  </div>
</section>

<!-- TEAM SECTION (MODERN, TECH BLOGGING STYLE) -->
<section class="py-16 bg-white/80 backdrop-blur border-b border-gray-100">
  <div class="max-w-6xl mx-auto px-6">
    <div class="flex flex-col items-center mb-8">
      <span class="inline-flex items-center bg-gradient-to-r from-indigo-500 via-pink-500 to-purple-500 text-white px-3 py-1 rounded-full text-xs font-mono mb-2 shadow">// Meet the Team</span>
      <h2 class="text-2xl md:text-3xl font-extrabold text-center mb-2 text-gray-900 font-mono tracking-tight">Our <span class="bg-gradient-to-r from-indigo-400 via-pink-400 to-purple-400 bg-clip-text text-transparent">Tech</span> Crew</h2>
      <p class="text-gray-600 text-center max-w-xl">The minds behind BIT BY BIT — passionate about code, collaboration, and sharing knowledge with the world.</p>
    </div>
    <!-- Playful code snippet with markdown frontmatter -->
    <div class="bg-gradient-to-r from-indigo-50 via-white to-pink-50 rounded-xl p-4 mb-6 shadow-inner border border-indigo-100 text-xs font-mono text-gray-700 overflow-x-auto">
      <pre class="whitespace-pre leading-relaxed"><code>--- 
title: "BIT BY BIT Team"
tags: [tech, blogging, crew]
authors:
  - Michael Ryuhiro Rosas
  - Reoner Renato Jr.
  - Nathaniel Talag
  - Carl Saginsin
  - Joshua Hero Dela Cruz
  - Edward John Gozon
  - Paul Harold Batiles
---
</code></pre>
    </div>
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
      <!-- Technical Project Manager -->
      <div class="group bg-white/60 backdrop-blur-lg rounded-2xl shadow-xl border border-indigo-100 hover:shadow-2xl hover:scale-105 hover:ring-2 hover:ring-indigo-400 transition-all duration-200 flex flex-col items-center p-8 relative overflow-hidden">
        <div class="absolute -top-6 -right-6 opacity-20 pointer-events-none">
          <svg width="64" height="64" viewBox="0 0 64 64"><rect x="8" y="16" width="48" height="24" rx="6" fill="#a5b4fc"/></svg>
        </div>
        <div class="bg-gradient-to-r from-indigo-400 to-purple-400 p-3 rounded-full mb-4 shadow">
          <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><rect x="3" y="7" width="18" height="10" rx="2"/><path d="M8 7V5a4 4 0 018 0v2"/></svg>
        </div>
        <div class="font-mono text-xs uppercase tracking-wider text-indigo-600 mb-1">Technical Project Manager</div>
        <div class="font-mono text-lg font-bold text-gray-900 mb-2">Michael Ryuhiro Rosas</div>
        <span class="inline-block bg-indigo-100 text-indigo-700 font-mono text-xs px-2 py-1 rounded mb-1">Favorite Tech: Agile, Scrum</span>
        <span class="inline-block bg-white/80 text-indigo-700 font-mono text-xs px-2 py-1 rounded mb-2 border border-indigo-100">Latest Blog: <span class="font-semibold">Managing Tech Teams 101</span></span>
      </div>
      <!-- Business Analyst -->
      <div class="group bg-white/60 backdrop-blur-lg rounded-2xl shadow-xl border border-pink-100 hover:shadow-2xl hover:scale-105 hover:ring-2 hover:ring-pink-400 transition-all duration-200 flex flex-col items-center p-8 relative overflow-hidden">
        <div class="absolute -top-6 -right-6 opacity-20 pointer-events-none">
          <svg width="64" height="64" viewBox="0 0 64 64"><rect x="8" y="16" width="48" height="24" rx="6" fill="#f472b6"/></svg>
        </div>
        <div class="bg-gradient-to-r from-pink-400 to-amber-400 p-3 rounded-full mb-4 shadow">
          <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M3 17l6-6 4 4 8-8"/><rect x="2" y="2" width="20" height="20" rx="5"/></svg>
        </div>
        <div class="font-mono text-xs uppercase tracking-wider text-pink-600 mb-1">Business Analyst</div>
        <div class="font-mono text-lg font-bold text-gray-900 mb-1">Reoner Renato Jr.</div>
        <div class="font-mono text-lg font-bold text-gray-900 mb-1">Nathaniel Talag</div>
        <span class="inline-block bg-pink-100 text-pink-700 font-mono text-xs px-2 py-1 rounded mb-1">Favorite Tech: Data Analytics</span>
        <span class="inline-block bg-white/80 text-pink-700 font-mono text-xs px-2 py-1 rounded mb-2 border border-pink-100">Latest Blog: <span class="font-semibold">Turning Data Into Insights</span></span>
      </div>
      <!-- Software Engineer -->
      <div class="group bg-white/60 backdrop-blur-lg rounded-2xl shadow-xl border border-amber-100 hover:shadow-2xl hover:scale-105 hover:ring-2 hover:ring-amber-400 transition-all duration-200 flex flex-col items-center p-8 relative overflow-hidden">
        <div class="absolute -top-6 -right-6 opacity-20 pointer-events-none">
          <svg width="64" height="64" viewBox="0 0 64 64"><rect x="8" y="16" width="48" height="24" rx="6" fill="#fbbf24"/></svg>
        </div>
        <div class="bg-gradient-to-r from-amber-400 to-pink-400 p-3 rounded-full mb-4 shadow">
          <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M16 18V6M8 6v12M3 6h18"/></svg>
        </div>
        <div class="font-mono text-xs uppercase tracking-wider text-amber-600 mb-1">Software Engineer</div>
        <div class="font-mono text-lg font-bold text-gray-900 mb-1">Carl Saginsin</div>
        <span class="inline-block bg-amber-100 text-amber-700 font-mono text-xs px-2 py-1 rounded mb-1">Favorite Tech: TypeScript, Node.js</span>
        <span class="inline-block bg-white/80 text-amber-700 font-mono text-xs px-2 py-1 rounded mb-2 border border-amber-100">Latest Blog: <span class="font-semibold">Async/Await Demystified</span></span>
      </div>
      <!-- Database Administrator -->
      <div class="group bg-white/60 backdrop-blur-lg rounded-2xl shadow-xl border border-green-100 hover:shadow-2xl hover:scale-105 hover:ring-2 hover:ring-green-400 transition-all duration-200 flex flex-col items-center p-8 relative overflow-hidden">
        <div class="absolute -top-6 -right-6 opacity-20 pointer-events-none">
          <svg width="64" height="64" viewBox="0 0 64 64"><rect x="8" y="16" width="48" height="24" rx="6" fill="#34d399"/></svg>
        </div>
        <div class="bg-gradient-to-r from-green-400 to-indigo-400 p-3 rounded-full mb-4 shadow">
          <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><ellipse cx="12" cy="7" rx="8" ry="3"/><path d="M4 7v10c0 1.657 3.582 3 8 3s8-1.343 8-3V7"/></svg>
        </div>
        <div class="font-mono text-xs uppercase tracking-wider text-green-600 mb-1">Database Administrator</div>
        <div class="font-mono text-lg font-bold text-gray-900 mb-1">Joshua Hero Dela Cruz</div>
        <span class="inline-block bg-green-100 text-green-700 font-mono text-xs px-2 py-1 rounded mb-1">Favorite Tech: PostgreSQL, MongoDB</span>
        <span class="inline-block bg-white/80 text-green-700 font-mono text-xs px-2 py-1 rounded mb-2 border border-green-100">Latest Blog: <span class="font-semibold">Scaling Databases in 2025</span></span>
      </div>
      <!-- Testers -->
      <div class="group bg-white/60 backdrop-blur-lg rounded-2xl shadow-xl border border-purple-100 hover:shadow-2xl hover:scale-105 hover:ring-2 hover:ring-purple-400 transition-all duration-200 flex flex-col items-center p-8 relative overflow-hidden">
        <div class="absolute -top-6 -right-6 opacity-20 pointer-events-none">
          <svg width="64" height="64" viewBox="0 0 64 64"><rect x="8" y="16" width="48" height="24" rx="6" fill="#a78bfa"/></svg>
        </div>
        <div class="bg-gradient-to-r from-purple-400 to-pink-400 p-3 rounded-full mb-4 shadow">
          <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><rect x="3" y="7" width="18" height="10" rx="2"/><path d="M8 7V5a4 4 0 018 0v2"/></svg>
        </div>
        <div class="font-mono text-xs uppercase tracking-wider text-purple-600 mb-1">Testers</div>
        <div class="font-mono text-lg font-bold text-gray-900 mb-1">Edward John Gozon</div>
        <div class="font-mono text-lg font-bold text-gray-900 mb-1">Paul Harold Batiles</div>
        <span class="inline-block bg-purple-100 text-purple-700 font-mono text-xs px-2 py-1 rounded mb-1">Favorite Tech: Cypress, Jest</span>
        <span class="inline-block bg-white/80 text-purple-700 font-mono text-xs px-2 py-1 rounded mb-2 border border-purple-100">Latest Blog: <span class="font-semibold">Automated Testing for Modern Apps</span></span>
      </div>
    </div>
    <!-- Team Testimonial -->
    <div class="mt-10 bg-white/60 rounded-lg p-4 text-sm italic text-indigo-700 border-l-4 border-indigo-400 max-w-2xl mx-auto">“We believe in sharing knowledge, one blog at a time. Join us and be part of the tech blogging revolution!”<br><span class="not-italic font-bold text-indigo-900">— The BIT BY BIT Team</span></div>
  </div>
</section>

<!-- CONTACT SECTION (MODERN) -->
<section class="py-16 bg-gradient-to-br from-indigo-50 via-white to-pink-50">
  <div class="max-w-5xl mx-auto px-6">
    <div class="grid md:grid-cols-2 gap-12 items-center">
      <div>
        <h2 class="text-2xl font-bold mb-4 text-gray-900 font-mono">Contact Us</h2>
        <p class="mb-6 text-gray-700">Have questions or suggestions? We'd love to hear from you!</p>
        <form>
          <div class="mb-4">
            <label for="name" class="block text-gray-700 font-semibold mb-1">Your Name</label>
            <input type="text" class="w-full px-4 py-3 rounded-lg bg-white/60 backdrop-blur border border-gray-200 text-gray-900 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent" id="name" required>
          </div>
          <div class="mb-4">
            <label for="email" class="block text-gray-700 font-semibold mb-1">Email Address</label>
            <input type="email" class="w-full px-4 py-3 rounded-lg bg-white/60 backdrop-blur border border-gray-200 text-gray-900 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent" id="email" required>
          </div>
          <div class="mb-4">
            <label for="subject" class="block text-gray-700 font-semibold mb-1">Subject</label>
            <input type="text" class="w-full px-4 py-3 rounded-lg bg-white/60 backdrop-blur border border-gray-200 text-gray-900 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent" id="subject">
          </div>
          <div class="mb-4">
            <label for="message" class="block text-gray-700 font-semibold mb-1">Message</label>
            <textarea class="w-full px-4 py-3 rounded-lg bg-white/60 backdrop-blur border border-gray-200 text-gray-900 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent" id="message" rows="4" required></textarea>
          </div>
          <button type="submit" class="px-8 py-3 bg-gradient-to-r from-indigo-600 via-pink-500 to-purple-600 rounded-lg font-bold text-white shadow hover:scale-105 transition-all">Send Message</button>
        </form>
      </div>
      <div>
        <h2 class="text-2xl font-bold mb-4 text-gray-900 font-mono">Connect With Us</h2>
        <p class="mb-6 text-gray-700">Follow us on social media or reach out through these channels:</p>
        <div class="flex items-center mb-4">
          <div class="bg-indigo-100 p-3 rounded mr-3">
            <i class="fas fa-envelope text-indigo-600"></i>
          </div>
          <div>
            <h5 class="mb-0 font-bold text-gray-800">Email</h5>
            <p class="mb-0 text-gray-600"><a href="mailto:info@bitbybit.com" class="hover:underline">info@bitbybit.com</a></p>
          </div>
        </div>
        <div class="flex items-center mb-4">
          <div class="bg-pink-100 p-3 rounded mr-3">
            <i class="fas fa-map-marker-alt text-pink-600"></i>
          </div>
          <div>
            <h5 class="mb-0 font-bold text-gray-800">Location</h5>
            <p class="mb-0 text-gray-600">San Francisco, CA</p>
          </div>
        </div>
        <div class="flex items-center mb-6">
          <div class="bg-amber-100 p-3 rounded mr-3">
            <i class="fas fa-phone text-amber-600"></i>
          </div>
          <div>
            <h5 class="mb-0 font-bold text-gray-800">Phone</h5>
            <p class="mb-0 text-gray-600"><a href="tel:+14155552671" class="hover:underline">+1 (415) 555-2671</a></p>
          </div>
        </div>
        <div class="mt-6">
          <h5 class="mb-3 font-bold text-gray-800">Follow Us</h5>
          <div class="flex gap-3">
            <a href="#" class="text-indigo-500 hover:text-indigo-700"><i class="fab fa-twitter"></i></a>
            <a href="#" class="text-indigo-500 hover:text-indigo-700"><i class="fab fa-facebook-f"></i></a>
            <a href="#" class="text-indigo-500 hover:text-indigo-700"><i class="fab fa-linkedin-in"></i></a>
            <a href="#" class="text-indigo-500 hover:text-indigo-700"><i class="fab fa-github"></i></a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<?= $this->endSection() ?> 