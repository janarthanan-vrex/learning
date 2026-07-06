<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ __('Vortex Studio - Bespoke Enterprise AI Engineering Agency') }}</title>
    <meta name="description" content="{{ __('Custom LLM tuning, enterprise workflow orchestration, and high-performance AI design. We build production-ready intelligence systems.') }}">
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700&family=Playfair+Display:ital,wght@0,400;0,600;0,700;1,400&family=Outfit:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- CSS & JS Assets (Tailwind & Alpine) -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
        }
        h1, h2, h3, h4, h5, h6 {
            font-family: 'Outfit', sans-serif;
        }
        .serif-text {
            font-family: 'Playfair Display', serif;
        }
    </style>
</head>
<body class="bg-slate-50 text-slate-900 antialiased overflow-x-hidden min-h-screen relative custom-scrollbar bg-grid-light">

    <!-- Ambient soft light glows -->
    <div class="absolute top-[-5%] left-[-5%] w-[40%] h-[40%] rounded-full glow-blue opacity-5 animate-pulse-glow"></div>
    <div class="absolute top-[35%] right-[-5%] w-[40%] h-[40%] rounded-full glow-purple opacity-5 animate-pulse-glow" style="animation-delay: 2.5s;"></div>

    <!-- Sticky Header -->
    <header class="sticky top-0 z-50 w-full border-b border-slate-200/60 bg-white/70 backdrop-blur-xl transition-all duration-300">
        <div class="max-w-7xl mx-auto px-6 h-20 flex items-center justify-between">
            <a href="#" class="flex items-center space-x-3 group">
                <div class="w-10 h-10 rounded-xl bg-gradient-to-tr from-cyan-500 to-indigo-600 flex items-center justify-center shadow-lg shadow-cyan-500/10 group-hover:scale-105 transition-transform duration-300">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                    </svg>
                </div>
                <span class="text-xl font-bold tracking-tight text-slate-900 group-hover:text-transparent group-hover:bg-clip-text group-hover:bg-gradient-to-r group-hover:from-cyan-600 group-hover:to-indigo-600 transition-all duration-300">Vortex<span class="text-cyan-500">Studio</span></span>
            </a>

            <!-- Navigation Links -->
            <nav class="hidden md:flex items-center space-x-8 text-sm font-medium text-slate-650">
                <a href="#services" class="hover:text-slate-900 transition-colors duration-200">{{ __('Services') }}</a>
                <a href="#portfolio" class="hover:text-slate-900 transition-colors duration-200">{{ __('Case Studies') }}</a>
                <a href="#estimator" class="hover:text-slate-900 transition-colors duration-200">{{ __('Cost Estimator') }}</a>
                <a href="#contact" class="hover:text-slate-900 transition-colors duration-200">{{ __('Contact') }}</a>
                <a href="{{ route('landing.platform') }}" class="flex items-center text-indigo-600 hover:text-indigo-700 transition-colors duration-200 py-1.5 px-3 rounded-lg bg-indigo-50 border border-indigo-100">
                    <span>{{ __('SaaS Platform') }}</span>
                    <svg class="w-3.5 h-3.5 ml-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                    </svg>
                </a>
            </nav>

            <!-- Header CTA & Language Switcher -->
            <div class="flex items-center space-x-4">
                <!-- Language Selector -->
                <div class="relative" x-data="{ open: false }">
                    <button @click="open = !open" class="flex items-center space-x-1.5 text-xs font-semibold text-slate-700 bg-slate-100 hover:bg-slate-200 transition-all duration-200 py-2 px-3 rounded-xl border border-slate-200/50">
                        <svg class="w-3.5 h-3.5 text-slate-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5h12M9 3v2m1.048 9.5A18.022 18.022 0 016.412 9m6.088 9h7M11 21l5-10 5 10M12.751 5c-.345 3.522-1.763 6.78-4.001 9.25"></path></svg>
                        <span>{{ app()->getLocale() == 'ta' ? 'தமிழ்' : (app()->getLocale() == 'hi' ? 'हिन्दी' : 'English') }}</span>
                        <svg class="w-3 h-3 text-slate-450" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2" d="M19 9l-7 7-7-7"></path></svg>
                    </button>
                    <div x-show="open" @click.outside="open = false" x-transition class="absolute right-0 mt-2 w-32 rounded-xl bg-white border border-slate-200 shadow-xl py-1 z-50 text-xs">
                        <a href="?lang=en" class="block px-4 py-2.5 text-slate-700 hover:bg-slate-50 font-medium">English</a>
                        <a href="?lang=ta" class="block px-4 py-2.5 text-slate-700 hover:bg-slate-50 font-medium">தமிழ்</a>
                        <a href="?lang=hi" class="block px-4 py-2.5 text-slate-700 hover:bg-slate-50 font-medium">हिन्दी</a>
                    </div>
                </div>

                <a href="#contact" class="px-5 py-2.5 rounded-xl bg-slate-950 text-white text-xs font-semibold hover:bg-slate-900 transition-all duration-300">
                    {{ __('Consultation') }}
                </a>
            </div>
        </div>
    </header>

    <!-- Hero Section -->
    <section class="max-w-7xl mx-auto px-6 pt-20 pb-24 md:pt-28 md:pb-32 grid grid-cols-1 lg:grid-cols-12 gap-12 items-center text-left">
        <!-- Text details -->
        <div class="lg:col-span-7">
            <div class="inline-flex items-center space-x-2 px-3 py-1 rounded-full border border-cyan-500/20 bg-cyan-500/5 text-cyan-700 text-xs font-semibold uppercase tracking-wider mb-6">
                <span>{{ __('Enterprise Consulting') }}</span>
            </div>
            
            <h1 class="text-4xl sm:text-6xl font-extrabold tracking-tight text-slate-950 leading-[1.1] mb-6">
                {!! __('Engineering :bespoke Intelligence for Complex Workflows', ['bespoke' => '<span class="serif-text italic font-light text-cyan-600">' . __('Bespoke') . '</span>']) !!}
            </h1>
            
            <p class="text-base sm:text-lg text-slate-650 font-normal leading-relaxed mb-10 max-w-xl">
                {{ __('We design, train, and deploy production-grade AI systems, LLM adapters, and agent graphs tailored to your business limits.') }}
            </p>

            <!-- Metrics bar -->
            <div class="grid grid-cols-3 gap-6 max-w-lg border-t border-slate-200/80 pt-8 mb-8">
                <div>
                    <div class="text-2xl sm:text-3xl font-extrabold text-slate-950">35+</div>
                    <div class="text-xs text-slate-500 font-medium uppercase tracking-wider mt-1">{{ __('Clients Shipped') }}</div>
                </div>
                <div>
                    <div class="text-2xl sm:text-3xl font-extrabold text-slate-950">150M+</div>
                    <div class="text-xs text-slate-500 font-medium uppercase tracking-wider mt-1">{{ __('Queries Run') }}</div>
                </div>
                <div>
                    <div class="text-2xl sm:text-3xl font-extrabold text-slate-950">99.9%</div>
                    <div class="text-xs text-slate-500 font-medium uppercase tracking-wider mt-1">{{ __('Uptime SLA') }}</div>
                </div>
            </div>
        </div>

        <!-- Dynamic Visual Column -->
        <div class="lg:col-span-5 relative flex justify-center">
            <!-- Glass card stack -->
            <div class="relative w-full max-w-md bg-white border border-slate-200 rounded-2xl p-6 shadow-xl shadow-slate-100/80 animate-float">
                <div class="absolute -top-3 -right-3 w-16 h-16 rounded-2xl bg-cyan-500/10 border border-cyan-500/20 flex items-center justify-center text-cyan-600 shadow-lg">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"></path></svg>
                </div>

                <div class="flex items-center space-x-3 mb-6">
                    <div class="w-2.5 h-2.5 rounded-full bg-cyan-500"></div>
                    <span class="text-xs font-bold text-slate-400 uppercase tracking-wide">{{ __('Client Project: Active') }}</span>
                </div>
                
                <h4 class="text-lg font-bold text-slate-900 mb-2">{{ __('Automated Audit & Compliance') }}</h4>
                <p class="text-xs text-slate-500 mb-6">{{ __('Built for a global Tier-1 fintech company, parsing 5,000 regulatory guidelines per second.') }}</p>
                
                <div class="space-y-3.5 text-xs text-slate-700">
                    <div class="flex items-center justify-between border-b border-slate-100 pb-2">
                        <span class="text-slate-500 font-medium">{{ __('Primary Model') }}</span>
                        <span class="font-mono text-cyan-600 font-semibold">{{ __('Fine-tuned Llama 3 (70B)') }}</span>
                    </div>
                    <div class="flex items-center justify-between border-b border-slate-100 pb-2">
                        <span class="text-slate-500 font-medium">{{ __('Integration Surface') }}</span>
                        <span class="font-semibold">{{ __('Kafka + Salesforce API') }}</span>
                    </div>
                    <div class="flex items-center justify-between pb-2">
                        <span class="text-slate-500 font-medium">{{ __('Project Delivery') }}</span>
                        <span class="text-slate-900 font-semibold">{{ __('6 Weeks (On Time)') }}</span>
                    </div>
                </div>

                <div class="mt-6 pt-4 border-t border-slate-100 flex justify-between items-center">
                    <div class="text-[10px] text-slate-400 font-mono">{{ __('HASH: 9a38f32bc71') }}</div>
                    <a href="#portfolio" class="text-xs text-indigo-600 hover:text-indigo-700 font-bold flex items-center">
                        <span>{{ __('Read Case Study') }}</span>
                        <svg class="w-3.5 h-3.5 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Services Section -->
    <section id="services" class="max-w-7xl mx-auto px-6 py-20 border-t border-slate-200/80">
        <div class="text-center max-w-3xl mx-auto mb-16">
            <h2 class="text-3xl sm:text-5xl font-extrabold text-slate-900 mb-4">{{ __('Our Engineering Capabilities') }}</h2>
            <p class="text-slate-500">{{ __("We don't build generic wrappers. We write custom architectures designed to scale.") }}</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Service 1 -->
            <div class="bg-white border border-slate-200 rounded-2xl p-8 hover:shadow-xl hover:shadow-slate-150/40 hover:-translate-y-0.5 transition-all duration-300">
                <div class="w-12 h-12 rounded-xl bg-cyan-500/10 flex items-center justify-center text-cyan-600 mb-6 font-bold text-sm">01</div>
                <h3 class="text-xl font-bold text-slate-950 mb-3">{{ __('Custom Model Tuning') }}</h3>
                <p class="text-slate-500 text-sm leading-relaxed">
                    {{ __('We fine-tune open-weights LLMs (Llama, Mistral) on your private compliance and workflow database tables to create high-efficiency models.') }}
                </p>
            </div>

            <!-- Service 2 -->
            <div class="bg-white border border-slate-200 rounded-2xl p-8 hover:shadow-xl hover:shadow-slate-150/40 hover:-translate-y-0.5 transition-all duration-300">
                <div class="w-12 h-12 rounded-xl bg-indigo-500/10 flex items-center justify-center text-indigo-600 mb-6 font-bold text-sm">02</div>
                <h3 class="text-xl font-bold text-slate-950 mb-3">{{ __('Agent Orchestration') }}</h3>
                <p class="text-slate-500 text-sm leading-relaxed">
                    {{ __('We write complex state-machines (LangGraph/Autogen) connecting various model modules with specialized database, email, and API capabilities.') }}
                </p>
            </div>

            <!-- Service 3 -->
            <div class="bg-white border border-slate-200 rounded-2xl p-8 hover:shadow-xl hover:shadow-slate-150/40 hover:-translate-y-0.5 transition-all duration-300">
                <div class="w-12 h-12 rounded-xl bg-teal-500/10 flex items-center justify-center text-teal-600 mb-6 font-bold text-sm">03</div>
                <h3 class="text-xl font-bold text-slate-950 mb-3">{{ __('Custom Agent Interfaces') }}</h3>
                <p class="text-slate-500 text-sm leading-relaxed">
                    {{ __('We design and develop rich, responsive web and mobile interfaces that let your team trigger, analyze, and manage active agents easily.') }}
                </p>
            </div>
        </div>
    </section>

    <!-- Case Studies Portfolio (Interactive Filter) -->
    <section id="portfolio" class="max-w-7xl mx-auto px-6 py-20 border-t border-slate-200/80" x-data="{ filter: 'all' }">
        <div class="flex flex-col md:flex-row md:items-end justify-between mb-16 gap-6">
            <div class="text-left">
                <h2 class="text-3xl sm:text-5xl font-extrabold text-slate-900 mb-4">{{ __('Selected Case Studies') }}</h2>
                <p class="text-slate-500">{{ __('Read about custom intelligence platforms we have built from scratch.') }}</p>
            </div>

            <!-- Filters -->
            <div class="flex flex-wrap gap-2 text-xs font-semibold">
                <button @click="filter = 'all'" :class="filter === 'all' ? 'bg-slate-950 text-white' : 'bg-white border border-slate-200 text-slate-650 hover:bg-slate-100'" class="px-4 py-2.5 rounded-xl transition-all">{{ __('All Projects') }}</button>
                <button @click="filter = 'fintech'" :class="filter === 'fintech' ? 'bg-slate-950 text-white' : 'bg-white border border-slate-200 text-slate-650 hover:bg-slate-100'" class="px-4 py-2.5 rounded-xl transition-all">{{ __('Fintech') }}</button>
                <button @click="filter = 'healthcare'" :class="filter === 'healthcare' ? 'bg-slate-950 text-white' : 'bg-white border border-slate-200 text-slate-650 hover:bg-slate-100'" class="px-4 py-2.5 rounded-xl transition-all">{{ __('Healthcare') }}</button>
                <button @click="filter = 'enterprise'" :class="filter === 'enterprise' ? 'bg-slate-950 text-white' : 'bg-white border border-slate-200 text-slate-650 hover:bg-slate-100'" class="px-4 py-2.5 rounded-xl transition-all">{{ __('Enterprise') }}</button>
            </div>
        </div>

        <!-- Grid of case studies -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <!-- Study 1 -->
            <div x-show="filter === 'all' || filter === 'fintech'" x-transition class="bg-white border border-slate-200 rounded-2xl overflow-hidden hover:shadow-xl hover:shadow-slate-100 transition-shadow">
                <div class="h-48 bg-gradient-to-tr from-cyan-600 to-teal-400 p-6 flex flex-col justify-between text-white relative">
                    <span class="text-[10px] font-bold uppercase tracking-wider bg-white/20 backdrop-blur-md px-2.5 py-1 rounded-full self-start">{{ __('Compliance AI') }}</span>
                    <div class="text-3xl font-extrabold serif-text italic">Securitax Ltd.</div>
                </div>
                <div class="p-6 text-left">
                    <h4 class="text-lg font-bold text-slate-900 mb-2">{{ __('Real-Time Auditing Pipeline') }}</h4>
                    <p class="text-slate-500 text-xs leading-relaxed mb-4">
                        {{ __('Tuned model processing multi-million transaction arrays and alerting compliance handlers of high-probability audits in less than 8ms.') }}
                    </p>
                    <div class="flex items-center justify-between border-t border-slate-100 pt-4 text-xs font-semibold text-cyan-600">
                        <span>{{ __('Efficiency Gained: +43%') }}</span>
                        <a href="#contact" class="hover:underline flex items-center">{{ __('Book Similar') }} <svg class="w-3.5 h-3.5 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg></a>
                    </div>
                </div>
            </div>

            <!-- Study 2 -->
            <div x-show="filter === 'all' || filter === 'healthcare'" x-transition class="bg-white border border-slate-200 rounded-2xl overflow-hidden hover:shadow-xl hover:shadow-slate-100 transition-shadow">
                <div class="h-48 bg-gradient-to-tr from-indigo-600 to-cyan-500 p-6 flex flex-col justify-between text-white relative">
                    <span class="text-[10px] font-bold uppercase tracking-wider bg-white/20 backdrop-blur-md px-2.5 py-1 rounded-full self-start">{{ __('Symptom Router') }}</span>
                    <div class="text-3xl font-extrabold serif-text italic">MedCore Group</div>
                </div>
                <div class="p-6 text-left">
                    <h4 class="text-lg font-bold text-slate-900 mb-2">{{ __('Interactive Diagnosis Co-pilot') }}</h4>
                    <p class="text-slate-500 text-xs leading-relaxed mb-4">
                        {{ __('Structured patient Intake nodes connected to clinical diagnosis libraries, routing urgencies to matching localized medical specialists automatically.') }}
                    </p>
                    <div class="flex items-center justify-between border-t border-slate-100 pt-4 text-xs font-semibold text-indigo-650">
                        <span>{{ __('Intake Lag Saved: 75%') }}</span>
                        <a href="#contact" class="hover:underline flex items-center">{{ __('Book Similar') }} <svg class="w-3.5 h-3.5 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg></a>
                    </div>
                </div>
            </div>

            <!-- Study 3 -->
            <div x-show="filter === 'all' || filter === 'enterprise'" x-transition class="bg-white border border-slate-200 rounded-2xl overflow-hidden hover:shadow-xl hover:shadow-slate-100 transition-shadow">
                <div class="h-48 bg-gradient-to-tr from-teal-500 to-indigo-600 p-6 flex flex-col justify-between text-white relative">
                    <span class="text-[10px] font-bold uppercase tracking-wider bg-white/20 backdrop-blur-md px-2.5 py-1 rounded-full self-start">{{ __('ERP Connector') }}</span>
                    <div class="text-3xl font-extrabold serif-text italic">Vektor Logix</div>
                </div>
                <div class="p-6 text-left">
                    <h4 class="text-lg font-bold text-slate-900 mb-2">{{ __('Semantic Inventory Agent') }}</h4>
                    <p class="text-slate-500 text-xs leading-relaxed mb-4">
                        {{ __('Autonomous logistics nodes connected to global warehouse APIs, dynamically adjusting purchase requests based on natural language demand feeds.') }}
                    </p>
                    <div class="flex items-center justify-between border-t border-slate-100 pt-4 text-xs font-semibold text-teal-650">
                        <span>{{ __('SLA Accuracy: 99.88%') }}</span>
                        <a href="#contact" class="hover:underline flex items-center">{{ __('Book Similar') }} <svg class="w-3.5 h-3.5 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg></a>
                    </div>
                </div>
            </div>

            <!-- Study 4 -->
            <div x-show="filter === 'all' || filter === 'enterprise'" x-transition class="bg-white border border-slate-200 rounded-2xl overflow-hidden hover:shadow-xl hover:shadow-slate-100 transition-shadow">
                <div class="h-48 bg-gradient-to-tr from-rose-500 to-indigo-600 p-6 flex flex-col justify-between text-white relative">
                    <span class="text-[10px] font-bold uppercase tracking-wider bg-white/20 backdrop-blur-md px-2.5 py-1 rounded-full self-start">{{ __('Customer Support') }}</span>
                    <div class="text-3xl font-extrabold serif-text italic">Apex Corp</div>
                </div>
                <div class="p-6 text-left">
                    <h4 class="text-lg font-bold text-slate-900 mb-2">{{ __('Automated Ticket Resolution Engine') }}</h4>
                    <p class="text-slate-500 text-xs leading-relaxed mb-4">
                        {{ __('Multi-agent loop resolving customer tickets by consulting internal wikis, executing refund policies via integrations, and drafting empathetic replies.') }}
                    </p>
                    <div class="flex items-center justify-between border-t border-slate-100 pt-4 text-xs font-semibold text-rose-650">
                        <span>{{ __('Resolution Speed: 2 mins') }}</span>
                        <a href="#contact" class="hover:underline flex items-center">{{ __('Book Similar') }} <svg class="w-3.5 h-3.5 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg></a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Project Estimator Section (Interactive Calculator) -->
    <section id="estimator" class="max-w-7xl mx-auto px-6 py-20 border-t border-slate-200/80" x-data="{
        tuning: true,
        graph: false,
        interface: false,
        timeline: 3,
        getEstimatedCost() {
            let base = 0;
            if (this.tuning) base += 8000;
            if (this.graph) base += 12000;
            if (this.interface) base += 7000;
            
            // Adjust based on timeline (urgency multiplier)
            let factor = 1.0;
            if (this.timeline == 1) factor = 1.4; // super rush
            if (this.timeline == 2) factor = 1.2;
            if (this.timeline >= 5) factor = 0.95; // extended scale
            
            let finalValue = base * factor;
            let low = Math.round(finalValue * 0.9);
            let high = Math.round(finalValue * 1.15);
            
            if (base === 0) return '$0';
            return '$' + (low/1000).toFixed(0) + 'k - $' + (high/1000).toFixed(0) + 'k';
        },
        getEstHours() {
            let hours = 0;
            if (this.tuning) hours += 60;
            if (this.graph) hours += 100;
            if (this.interface) hours += 50;
            return Math.round(hours);
        }
    }">
        <div class="rounded-3xl border border-slate-200 bg-white p-8 md:p-12 grid grid-cols-1 lg:grid-cols-2 gap-12 items-center shadow-lg shadow-slate-100">
            <div>
                <span class="text-xs font-bold text-indigo-600 uppercase tracking-wider mb-2 block">{{ __('Project Pricing Tool') }}</span>
                <h2 class="text-3xl sm:text-4xl font-extrabold text-slate-900 mb-6">{{ __('Estimate Your Custom Integration Scope') }}</h2>
                <p class="text-slate-500 text-sm leading-relaxed mb-8">
                    {{ __('Select the modules you need and adjust the timeline slide. Vortex Studio runs a complexity algorithm to provide immediate scope estimations.') }}
                </p>

                <!-- Checkboxes -->
                <div class="space-y-4 mb-8">
                    <label class="flex items-center space-x-3.5 p-4 rounded-xl border border-slate-100 hover:bg-slate-50 cursor-pointer transition-colors"
                        :class="tuning ? 'border-cyan-500/40 bg-cyan-500/5' : ''">
                        <input type="checkbox" x-model="tuning" class="rounded text-cyan-600 focus:ring-cyan-500 border-slate-300 w-4 h-4">
                        <div>
                            <div class="text-xs font-bold text-slate-900">{{ __('Custom Model Tuning & RAG Configuration') }}</div>
                            <p class="text-[11px] text-slate-500 mt-0.5">{{ __('Setup local vector store + fine-tuning of Llama 3 models on proprietary records.') }}</p>
                        </div>
                    </label>

                    <label class="flex items-center space-x-3.5 p-4 rounded-xl border border-slate-100 hover:bg-slate-50 cursor-pointer transition-colors"
                        :class="graph ? 'border-indigo-500/40 bg-indigo-500/5' : ''">
                        <input type="checkbox" x-model="graph" class="rounded text-indigo-600 focus:ring-indigo-500 border-slate-300 w-4 h-4">
                        <div>
                            <div class="text-xs font-bold text-slate-900">{{ __('Multi-Agent Workflow Graphs') }}</div>
                            <p class="text-[11px] text-slate-500 mt-0.5">{{ __('Complex logic loops, fallback chains, API routers, and Slack notification nodes.') }}</p>
                        </div>
                    </label>

                    <label class="flex items-center space-x-3.5 p-4 rounded-xl border border-slate-100 hover:bg-slate-50 cursor-pointer transition-colors"
                        :class="interface ? 'border-teal-500/40 bg-teal-500/5' : ''">
                        <input type="checkbox" x-model="interface" class="rounded text-teal-600 focus:ring-teal-500 border-slate-300 w-4 h-4">
                        <div>
                            <div class="text-xs font-bold text-slate-900">{{ __('User Interface & Control Panel') }}</div>
                            <p class="text-[11px] text-slate-500 mt-0.5">{{ __('Custom web dashboard allowing internal teams to toggle triggers and inspect audit history logs.') }}</p>
                        </div>
                    </label>
                </div>

                <!-- Slider -->
                <div>
                    <div class="flex items-center justify-between text-xs font-bold text-slate-800 mb-2">
                        <span>{{ __('Expected Delivery Timeline') }}</span>
                        <span class="text-cyan-600 font-mono" x-text="timeline + (timeline == 1 ? ' {{ __('Month (Rush)') }}' : ' {{ __('Months') }}')"></span>
                    </div>
                    <input type="range" min="1" max="6" x-model="timeline" class="w-full h-1.5 bg-slate-200 rounded-lg appearance-none cursor-pointer accent-cyan-600">
                    <div class="flex justify-between text-[10px] text-slate-400 font-semibold mt-1.5 px-1">
                        <span>1M</span>
                        <span>2M</span>
                        <span>3M</span>
                        <span>4M</span>
                        <span>5M</span>
                        <span>6M</span>
                    </div>
                </div>
            </div>

            <!-- Estimator Output Card -->
            <div class="bg-slate-950 rounded-2xl border border-slate-850 p-8 flex flex-col justify-between min-h-[380px] text-left text-white shadow-2xl relative overflow-hidden">
                <div class="absolute top-0 right-0 w-32 h-32 rounded-full glow-blue opacity-10 pointer-events-none"></div>
                
                <div>
                    <span class="text-[10px] font-bold text-slate-400 uppercase tracking-widest block mb-4 border-b border-slate-850 pb-3">{{ __('Estimation Summary') }}</span>
                    
                    <div class="space-y-6">
                        <div>
                            <span class="text-xs text-slate-500">{{ __('Calculated Project Budget Range') }}</span>
                            <div class="text-4xl sm:text-5xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-cyan-400 to-indigo-400 mt-1 font-mono" x-text="getEstimatedCost()"></div>
                        </div>

                        <div class="grid grid-cols-2 gap-4 border-t border-slate-850/80 pt-6">
                            <div>
                                <span class="text-xs text-slate-500">{{ __('Complexity Score') }}</span>
                                <div class="font-bold text-lg mt-0.5" x-text="tuning + graph + interface === 3 ? '{{ __('High') }}' : (tuning + graph + interface === 0 ? '{{ __('None') }}' : '{{ __('Moderate') }}')"></div>
                            </div>
                            <div>
                                <span class="text-xs text-slate-500">{{ __('Estimated Dev Hours') }}</span>
                                <div class="font-bold text-lg mt-0.5 font-mono" x-text="getEstHours() + ' {{ __('hrs') }}'"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mt-8">
                    <a href="#contact" class="w-full py-4 rounded-xl bg-gradient-to-r from-cyan-500 to-indigo-600 hover:from-cyan-400 hover:to-indigo-500 text-white text-sm font-bold text-center block shadow-lg shadow-cyan-500/10 transition-all">
                        {{ __('Lock in Consultation Scope') }}
                    </a>
                    <p class="text-[10px] text-slate-500 text-center mt-2.5">{{ __('Note: Estimations are directional. Final budgets require technical architecture calls.') }}</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Multi-Step Inquiry Form Section -->
    <section id="contact" class="max-w-3xl mx-auto px-6 py-20 border-t border-slate-200/80" x-data="{
        step: 1,
        name: '',
        email: '',
        company: '',
        details: '',
        submitted: false,
        submitForm() {
            if (this.name === '' || this.email === '') {
                alert('{{ __('Please fill out Name and Email.') }}');
                return;
            }
            this.submitted = true;
            this.step = 3;
        }
    }">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-extrabold text-slate-900 mb-4">{{ __('Book a Technical Deep-Dive') }}</h2>
            <p class="text-slate-500 text-sm">{{ __('Tell us about your systems, and our engineers will prep custom flow recommendations.') }}</p>
        </div>

        <div class="bg-white border border-slate-200 rounded-2xl p-8 shadow-sm text-left">
            <!-- Progress Bar -->
            <div class="w-full bg-slate-100 rounded-full h-1.5 mb-8 overflow-hidden">
                <div class="bg-cyan-600 h-full transition-all duration-300" :style="'width: ' + (step === 1 ? '33%' : (step === 2 ? '66%' : '100%'))"></div>
            </div>

            <!-- Step 1: Contact details -->
            <div x-show="step === 1" x-transition:enter="transition duration-200" class="space-y-5">
                <h4 class="text-base font-bold text-slate-900 mb-2">{{ __('Step 1: Company Profile') }}</h4>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-xs font-semibold text-slate-500 mb-1.5">{{ __('Contact Name') }}</label>
                        <input type="text" x-model="name" placeholder="{{ __('John Doe') }}" class="w-full bg-slate-50 border border-slate-200 rounded-lg px-4 py-2.5 text-xs text-slate-900 focus:outline-none focus:border-cyan-500">
                    </div>
                    <div>
                        <label class="block text-xs font-semibold text-slate-500 mb-1.5">{{ __('Work Email') }}</label>
                        <input type="email" x-model="email" placeholder="{{ __('john@company.com') }}" class="w-full bg-slate-50 border border-slate-200 rounded-lg px-4 py-2.5 text-xs text-slate-900 focus:outline-none focus:border-cyan-500">
                    </div>
                </div>
                <div>
                    <label class="block text-xs font-semibold text-slate-500 mb-1.5">{{ __('Company Name') }}</label>
                    <input type="text" x-model="company" placeholder="{{ __('Acme Corp') }}" class="w-full bg-slate-50 border border-slate-200 rounded-lg px-4 py-2.5 text-xs text-slate-900 focus:outline-none focus:border-cyan-500">
                </div>
                <div class="pt-4 flex justify-end">
                    <button @click="step = 2" class="px-5 py-2.5 rounded-lg bg-slate-950 text-white text-xs font-semibold hover:bg-slate-900 transition-colors">{{ __('Continue') }}</button>
                </div>
            </div>

            <!-- Step 2: Project overview -->
            <div x-show="step === 2" x-transition:enter="transition duration-200" class="space-y-5">
                <h4 class="text-base font-bold text-slate-900 mb-2">{{ __('Step 2: Project Overview') }}</h4>
                <div>
                    <label class="block text-xs font-semibold text-slate-500 mb-1.5">{{ __('Scope & System Integrations Details') }}</label>
                    <textarea rows="4" x-model="details" placeholder="{{ __('Describe the workflow models, target database types, and slack/email requirements...') }}" class="w-full bg-slate-50 border border-slate-200 rounded-lg px-4 py-2.5 text-xs text-slate-900 focus:outline-none focus:border-cyan-500"></textarea>
                </div>
                <div class="pt-4 flex justify-between">
                    <button @click="step = 1" class="px-5 py-2.5 rounded-lg border border-slate-200 text-slate-650 hover:bg-slate-50 text-xs font-semibold transition-colors">{{ __('Back') }}</button>
                    <button @click="submitForm" class="px-5 py-2.5 rounded-lg bg-cyan-600 hover:bg-cyan-500 text-white text-xs font-semibold transition-colors">{{ __('Submit Request') }}</button>
                </div>
            </div>

            <!-- Step 3: Success Confirmation -->
            <div x-show="step === 3" class="text-center py-8 space-y-4">
                <div class="w-12 h-12 rounded-full bg-emerald-50 border border-emerald-200 text-emerald-600 flex items-center justify-center mx-auto shadow-md">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"></path></svg>
                </div>
                <h4 class="text-lg font-bold text-slate-900">{{ __('Request Received Successfully') }}</h4>
                <p class="text-xs text-slate-500 max-w-sm mx-auto leading-relaxed">
                    {!! __('Thank you :name. We have forwarded your project draft to our engineering coordinators. Expect a scoping agenda in your :email within 12 hours.', ['name' => '<span class="font-bold text-slate-900" x-text="name"></span>', 'email' => '<span class="font-bold text-slate-900" x-text="email"></span>']) !!}
                </p>
                <div class="pt-4">
                    <button @click="step = 1; name = ''; email = ''; company = ''; details = ''; submitted = false" class="px-4 py-2 rounded-lg bg-slate-100 hover:bg-slate-200 text-slate-650 text-xs font-bold transition-colors">{{ __('Submit Another Response') }}</button>
                </div>
            </div>
        </div>
    </section>

    <!-- Interconnected Promo Banner -->
    <section class="max-w-7xl mx-auto px-6 py-12 mb-16">
        <div class="relative rounded-3xl bg-slate-950 text-white border border-cyan-500/20 p-8 md:p-12 overflow-hidden flex flex-col md:flex-row items-center justify-between gap-8">
            <div class="absolute inset-0 glow-blue opacity-15 pointer-events-none"></div>
            <div class="relative z-10 max-w-xl text-left">
                <span class="text-[10px] font-bold text-cyan-400 uppercase tracking-widest block mb-2">{{ __('Want to build it yourself?') }}</span>
                <h3 class="text-2xl sm:text-3xl font-extrabold text-white mb-3">{{ __('Launch on the Vortex SaaS Platform') }}</h3>
                <p class="text-slate-400 text-sm leading-relaxed">
                    {{ __('Prefer direct API access? Construct models, manage runs, and peer vector storage containers yourself inside the Vortex Orchestration Console.') }}
                </p>
            </div>
            <div class="relative z-10 whitespace-nowrap">
                <a href="{{ route('landing.platform') }}" class="inline-flex items-center px-6 py-3.5 rounded-xl bg-gradient-to-r from-cyan-500 to-indigo-600 text-white font-bold hover:shadow-lg hover:shadow-cyan-500/20 transition-all text-sm group">
                    <span>{{ __('Deploy Workspace Now') }}</span>
                    <svg class="w-4 h-4 ml-2 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                </a>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="border-t border-slate-200 bg-white pt-16 pb-8 text-xs text-slate-500 relative z-10">
        <div class="max-w-7xl mx-auto px-6 grid grid-cols-1 md:grid-cols-4 gap-8 mb-12 text-left">
            <div>
                <a href="#" class="flex items-center space-x-2.5 mb-4">
                    <div class="w-8 h-8 rounded-lg bg-gradient-to-tr from-cyan-500 to-indigo-600 flex items-center justify-center">
                        <svg class="w-4.5 h-4.5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                        </svg>
                    </div>
                    <span class="text-sm font-bold text-slate-900 tracking-wider uppercase">{{ __('Vortex Studio') }}</span>
                </a>
                <p class="text-slate-500 leading-relaxed max-w-xs mb-4">
                    {{ __('Bespoke engineering for custom machine intelligence integration.') }}
                </p>
                <div class="text-[10px] text-slate-400">&copy; {{ __('2026 Vortex Studio. All rights reserved.') }}</div>
            </div>
            <div>
                <h5 class="text-slate-900 font-bold mb-4 uppercase tracking-wider text-[10px]">{{ __('Capabilities') }}</h5>
                <ul class="space-y-2">
                    <li><a href="#services" class="hover:text-slate-700 transition-colors">{{ __('Tuning & RAG') }}</a></li>
                    <li><a href="#services" class="hover:text-slate-700 transition-colors">{{ __('Multi-Agent Loops') }}</a></li>
                    <li><a href="#services" class="hover:text-slate-700 transition-colors">{{ __('Control Dashboards') }}</a></li>
                </ul>
            </div>
            <div>
                <h5 class="text-slate-900 font-bold mb-4 uppercase tracking-wider text-[10px]">{{ __('SaaS Product') }}</h5>
                <ul class="space-y-2">
                    <li><a href="{{ route('landing.platform') }}" class="hover:text-slate-700 transition-colors font-semibold text-indigo-600">{{ __('Vortex AI Platform') }}</a></li>
                    <li><a href="{{ route('landing.platform') }}#features" class="hover:text-slate-700 transition-colors">{{ __('Platform Features') }}</a></li>
                    <li><a href="{{ route('landing.platform') }}#pricing" class="hover:text-slate-700 transition-colors">{{ __('Pricing Guide') }}</a></li>
                </ul>
            </div>
            <div>
                <h5 class="text-slate-900 font-bold mb-4 uppercase tracking-wider text-[10px]">{{ __('Consultation') }}</h5>
                <p class="text-slate-500 mb-3 leading-relaxed">{{ __('Book a call to review your pipeline requirements.') }}</p>
                <a href="#contact" class="inline-block bg-slate-950 hover:bg-slate-900 text-white px-4 py-2 rounded-lg font-semibold transition-colors">{{ __('Request Scoping Agenda') }}</a>
            </div>
        </div>
    </footer>

</body>
</html>
