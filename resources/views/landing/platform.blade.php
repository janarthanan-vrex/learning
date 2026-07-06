<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ __('Vortex AI - Autonomous AI Agent Workflows') }}</title>
    <meta name="description" content="{{ __('Build, test, and orchestrate autonomous AI agents at scale with zero code. Integrate seamlessly with your databases, APIs, and communication tools.') }}">
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800&family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- CSS & JS Assets (Tailwind & Alpine) -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
        }
        h1, h2, h3, h4, h5, h6 {
            font-family: 'Outfit', sans-serif;
        }
    </style>
</head>
<body class="bg-slate-950 text-slate-100 antialiased overflow-x-hidden min-h-screen relative custom-scrollbar bg-grid-dark">

    <!-- Ambient glowing lights -->
    <div class="absolute top-[-10%] left-[-10%] w-[50%] h-[50%] rounded-full glow-purple animate-pulse-glow"></div>
    <div class="absolute top-[40%] right-[-10%] w-[50%] h-[50%] rounded-full glow-blue animate-pulse-glow" style="animation-delay: 2s;"></div>
    <div class="absolute bottom-[-10%] left-[20%] w-[40%] h-[40%] rounded-full glow-purple animate-pulse-glow" style="animation-delay: 4s;"></div>

    <!-- Navigation Header -->
    <header class="sticky top-0 z-50 w-full border-b border-slate-800/40 bg-slate-950/80 backdrop-blur-xl transition-all duration-300" id="main-header">
        <div class="max-w-7xl mx-auto px-6 h-20 flex items-center justify-between">
            <a href="#" class="flex items-center space-x-3 group">
                <div class="w-10 h-10 rounded-xl bg-gradient-to-tr from-violet-600 to-cyan-500 flex items-center justify-center shadow-lg shadow-violet-500/20 group-hover:scale-105 transition-transform duration-300">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                    </svg>
                </div>
                <span class="text-xl font-bold tracking-tight text-white group-hover:text-transparent group-hover:bg-clip-text group-hover:bg-gradient-to-r group-hover:from-violet-400 group-hover:to-cyan-400 transition-all duration-300">Vortex<span class="text-violet-500">AI</span></span>
            </a>

            <!-- Nav Items -->
            <nav class="hidden md:flex items-center space-x-8 text-sm font-medium text-slate-300">
                <a href="#features" class="hover:text-white transition-colors duration-200">{{ __('Features') }}</a>
                <a href="#workflow" class="hover:text-white transition-colors duration-200">{{ __('Canvas Demo') }}</a>
                <a href="#pricing" class="hover:text-white transition-colors duration-200">{{ __('Pricing') }}</a>
                <a href="#faq" class="hover:text-white transition-colors duration-200">{{ __('FAQ') }}</a>
                <a href="{{ route('landing.agency') }}" class="flex items-center text-cyan-400 hover:text-cyan-300 transition-colors duration-200 py-1.5 px-3 rounded-lg bg-cyan-950/40 border border-cyan-800/30">
                    <span>{{ __('Vortex Studio (Agency)') }}</span>
                    <svg class="w-3.5 h-3.5 ml-1.5 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path>
                    </svg>
                </a>
            </nav>

            <!-- CTA & Language Switcher -->
            <div class="flex items-center space-x-4">
                <!-- Language Selector -->
                <div class="relative" x-data="{ open: false }">
                    <button @click="open = !open" class="flex items-center space-x-1.5 text-xs font-semibold text-slate-300 bg-slate-900 hover:bg-slate-850 hover:text-white transition-all duration-200 py-2 px-3 rounded-xl border border-slate-800">
                        <svg class="w-3.5 h-3.5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5h12M9 3v2m1.048 9.5A18.022 18.022 0 016.412 9m6.088 9h7M11 21l5-10 5 10M12.751 5c-.345 3.522-1.763 6.78-4.001 9.25"></path></svg>
                        <span>{{ app()->getLocale() == 'ta' ? 'தமிழ்' : (app()->getLocale() == 'hi' ? 'हिन्दी' : 'English') }}</span>
                        <svg class="w-3 h-3 text-slate-450" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2" d="M19 9l-7 7-7-7"></path></svg>
                    </button>
                    <div x-show="open" @click.outside="open = false" x-transition class="absolute right-0 mt-2 w-32 rounded-xl bg-slate-900 border border-slate-800 shadow-xl py-1 z-50 text-xs text-left">
                        <a href="?lang=en" class="block px-4 py-2.5 text-slate-300 hover:bg-slate-850 hover:text-white font-medium">English</a>
                        <a href="?lang=ta" class="block px-4 py-2.5 text-slate-300 hover:bg-slate-850 hover:text-white font-medium">தமிழ்</a>
                        <a href="?lang=hi" class="block px-4 py-2.5 text-slate-300 hover:bg-slate-850 hover:text-white font-medium">हिन्दी</a>
                    </div>
                </div>

                <a href="#pricing" class="relative group overflow-hidden px-6 py-2.5 rounded-xl bg-gradient-to-r from-violet-600 to-cyan-500 text-white text-sm font-semibold shadow-lg shadow-violet-600/25 hover:shadow-violet-600/40 transition-all duration-300">
                    <span class="relative z-10">{{ __('Start Free') }}</span>
                    <span class="absolute inset-0 bg-gradient-to-r from-cyan-500 to-violet-600 opacity-0 group-hover:opacity-100 transition-opacity duration-500"></span>
                </a>
            </div>
        </div>
    </header>

    <!-- Hero Section -->
    <section class="relative max-w-7xl mx-auto px-6 pt-16 pb-24 md:pt-24 md:pb-32 flex flex-col items-center text-center">
        <!-- Badge -->
        <div class="inline-flex items-center space-x-2 px-3.5 py-1.5 rounded-full border border-violet-500/30 bg-violet-950/20 backdrop-blur-md text-violet-400 text-xs font-semibold tracking-wide uppercase mb-8 animate-float">
            <span class="flex h-2 w-2 relative">
                <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-violet-400 opacity-75"></span>
                <span class="relative inline-flex rounded-full h-2 w-2 bg-violet-500"></span>
            </span>
            <span>{{ __('Vortex Engine v2.0 is Live') }}</span>
        </div>

        <!-- Heading -->
        <h1 class="text-4xl sm:text-6xl md:text-7xl font-extrabold tracking-tight text-white max-w-4xl leading-[1.1] mb-6">
            {!! __('Orchestrate Autonomous :br AI Agents With Zero Code', ['br' => '<br class="hidden sm:inline">']) !!}
        </h1>

        <!-- Subheading -->
        <p class="text-lg md:text-xl text-slate-400 max-w-2xl font-light leading-relaxed mb-10">
            {{ __('Connect LLMs, vector stores, and custom APIs. Design visual logic flows that execute complex multi-agent workflows automatically.') }}
        </p>

        <!-- CTA Buttons -->
        <div class="flex flex-col sm:flex-row gap-4 mb-20 justify-center w-full max-w-sm sm:max-w-none">
            <a href="#pricing" class="px-8 py-4 rounded-xl bg-gradient-to-r from-violet-600 to-cyan-500 text-white font-semibold shadow-xl shadow-violet-500/20 hover:scale-[1.02] hover:shadow-violet-500/35 transition-all duration-300 text-center">
                {{ __('Launch Workspace') }}
            </a>
            <a href="{{ route('landing.agency') }}" class="px-8 py-4 rounded-xl bg-slate-900/60 hover:bg-slate-900 border border-slate-800/80 text-slate-200 font-semibold hover:border-slate-700 hover:text-white transition-all duration-300 text-center flex items-center justify-center space-x-2">
                <span>{{ __('Hire Custom Agency') }}</span>
                <svg class="w-4 h-4 text-cyan-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                </svg>
            </a>
        </div>

        <!-- Product Preview Dashboard -->
        <div class="relative w-full max-w-5xl rounded-2xl border border-slate-800 bg-slate-900/40 p-4 shadow-2xl backdrop-blur-md animate-float-delayed">
            <!-- Glass header -->
            <div class="flex items-center justify-between pb-4 border-b border-slate-800/60 mb-4 px-2">
                <div class="flex items-center space-x-2">
                    <div class="w-3 h-3 rounded-full bg-rose-500/80"></div>
                    <div class="w-3 h-3 rounded-full bg-amber-500/80"></div>
                    <div class="w-3 h-3 rounded-full bg-emerald-500/80"></div>
                </div>
                <div class="text-xs text-slate-500 font-mono">vortex-cloud-orchestrator://workspace_prod</div>
                <div class="w-6"></div>
            </div>
            
            <!-- Dashboard Mockup Image/Layout -->
            <div class="grid grid-cols-1 md:grid-cols-4 gap-4 text-left">
                <!-- Sidebar -->
                <div class="md:col-span-1 bg-slate-950/60 rounded-xl p-3 border border-slate-800/50 space-y-4">
                    <div class="text-xs font-bold text-slate-400 uppercase tracking-wider px-2">{{ __('Agents Library') }}</div>
                    <div class="space-y-1.5">
                        <div class="flex items-center justify-between bg-violet-500/10 border border-violet-500/30 text-violet-300 text-xs py-2 px-3 rounded-lg">
                            <span class="flex items-center space-x-2">
                                <span class="w-2 h-2 rounded-full bg-violet-400"></span>
                                <span>{{ __('Research Analyst') }}</span>
                            </span>
                            <span class="text-[10px] text-violet-400 px-1.5 py-0.5 rounded bg-violet-950/60 border border-violet-800/40">LLM</span>
                        </div>
                        <div class="flex items-center justify-between bg-slate-900 hover:bg-slate-850 text-slate-300 text-xs py-2 px-3 rounded-lg transition-colors">
                            <span class="flex items-center space-x-2">
                                <span class="w-2 h-2 rounded-full bg-emerald-400"></span>
                                <span>{{ __('Code Synthesizer') }}</span>
                            </span>
                            <span class="text-[10px] text-emerald-400 px-1.5 py-0.5 rounded bg-emerald-950/60 border border-emerald-980/40">LLM</span>
                        </div>
                        <div class="flex items-center justify-between bg-slate-900 hover:bg-slate-850 text-slate-300 text-xs py-2 px-3 rounded-lg transition-colors">
                            <span class="flex items-center space-x-2">
                                <span class="w-2 h-2 rounded-full bg-cyan-400"></span>
                                <span>{{ __('API Router') }}</span>
                            </span>
                            <span class="text-[10px] text-cyan-400 px-1.5 py-0.5 rounded bg-cyan-950/60 border border-cyan-800/40">{{ __('Action') }}</span>
                        </div>
                    </div>
                </div>

                <!-- Main Area -->
                <div class="md:col-span-3 bg-slate-950/40 rounded-xl p-4 border border-slate-800/50 flex flex-col justify-between min-h-[300px]">
                    <div class="flex items-center justify-between border-b border-slate-800/50 pb-3">
                        <h4 class="text-sm font-semibold text-white">{{ __('Interactive Editor: Lead Generation Workflow') }}</h4>
                        <span class="flex items-center space-x-1.5 text-xs text-emerald-400 bg-emerald-500/10 px-2.5 py-1 rounded-full border border-emerald-500/20">
                            <span class="w-1.5 h-1.5 rounded-full bg-emerald-400 animate-pulse"></span>
                            <span>{{ __('Active (99.9% Uptime)') }}</span>
                        </span>
                    </div>

                    <!-- Flow graph simulation -->
                    <div class="py-6 flex flex-col md:flex-row items-center justify-center gap-6 md:gap-4 relative overflow-hidden">
                        <!-- Card 1 -->
                        <div class="z-10 bg-slate-900 border border-slate-800 p-3 rounded-xl flex items-center space-x-3 w-48 shadow-lg shadow-black/40">
                            <div class="w-8 h-8 rounded-lg bg-cyan-500/10 border border-cyan-500/30 flex items-center justify-center text-cyan-400">
                                <svg class="w-4.5 h-4.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                            </div>
                            <div>
                                <div class="text-[10px] text-slate-500 font-bold uppercase">{{ __('Trigger') }}</div>
                                <div class="text-xs font-semibold text-slate-200">{{ __('New Email Lead') }}</div>
                            </div>
                        </div>

                        <!-- Connector Arrow -->
                        <div class="h-6 w-0.5 md:h-0.5 md:w-8 bg-gradient-to-b md:bg-gradient-to-r from-cyan-500 to-violet-500 relative flex items-center justify-center">
                            <div class="absolute w-2 h-2 rounded-full bg-violet-400 animate-ping"></div>
                        </div>

                        <!-- Card 2 -->
                        <div class="z-10 bg-slate-900 border border-violet-500/40 p-3 rounded-xl flex items-center space-x-3 w-48 shadow-lg shadow-violet-500/10">
                            <div class="w-8 h-8 rounded-lg bg-violet-500/10 border border-violet-500/30 flex items-center justify-center text-violet-400">
                                <svg class="w-4.5 h-4.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"></path></svg>
                            </div>
                            <div>
                                <div class="text-[10px] text-violet-400 font-bold uppercase">{{ __('AI Agent') }}</div>
                                <div class="text-xs font-semibold text-slate-200">{{ __('Qualify & Categorize') }}</div>
                            </div>
                        </div>

                        <!-- Connector Arrow -->
                        <div class="h-6 w-0.5 md:h-0.5 md:w-8 bg-gradient-to-b md:bg-gradient-to-r from-violet-500 to-fuchsia-500 relative flex items-center justify-center"></div>

                        <!-- Card 3 -->
                        <div class="z-10 bg-slate-900 border border-slate-800 p-3 rounded-xl flex items-center space-x-3 w-48 shadow-lg shadow-black/40">
                            <div class="w-8 h-8 rounded-lg bg-fuchsia-500/10 border border-fuchsia-500/30 flex items-center justify-center text-fuchsia-400">
                                <svg class="w-4.5 h-4.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path></svg>
                            </div>
                            <div>
                                <div class="text-[10px] text-slate-500 font-bold uppercase">{{ __('Integration') }}</div>
                                <div class="text-xs font-semibold text-slate-200">{{ __('Alert Slack Channel') }}</div>
                            </div>
                        </div>
                    </div>

                    <!-- Statistics Bar inside mockup -->
                    <div class="mt-4 pt-3 border-t border-slate-800/60 grid grid-cols-3 gap-2 text-center text-xs">
                        <div>
                            <div class="text-slate-500">{{ __('Execution Speed') }}</div>
                            <div class="font-bold text-white font-mono mt-0.5">{{ __('142ms / cycle') }}</div>
                        </div>
                        <div>
                            <div class="text-slate-500">{{ __('Success Rate') }}</div>
                            <div class="font-bold text-emerald-400 font-mono mt-0.5">99.98%</div>
                        </div>
                        <div>
                            <div class="text-slate-500">{{ __('Resource Savings') }}</div>
                            <div class="font-bold text-cyan-400 font-mono mt-0.5">{{ __('~12.4 hours/day') }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section id="features" class="max-w-7xl mx-auto px-6 py-20 border-t border-slate-900">
        <div class="text-center max-w-3xl mx-auto mb-16">
            <h2 class="text-3xl sm:text-5xl font-extrabold text-white mb-4">
                {{ __('Powering the Next Generation of AI Logic') }}
            </h2>
            <p class="text-slate-400 text-base sm:text-lg">
                {{ __('Stop writing custom orchestrators. Use our ready-made pipelines to scale intelligence throughout your stack.') }}
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Feature 1 -->
            <div class="group relative rounded-2xl border border-slate-800/80 bg-slate-900/30 p-8 shadow-md hover:border-violet-500/40 hover:bg-slate-900/50 hover:-translate-y-1 transition-all duration-300">
                <div class="w-12 h-12 rounded-xl bg-violet-500/10 border border-violet-500/20 flex items-center justify-center text-violet-400 mb-6 group-hover:scale-110 transition-transform duration-300">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-white mb-3">{{ __('Infinite LLM Context') }}</h3>
                <p class="text-slate-400 text-sm leading-relaxed">
                    {{ __('Automatically inject long-term vector embeddings and knowledge tables into context windows on the fly without database latency.') }}
                </p>
            </div>

            <!-- Feature 2 -->
            <div class="group relative rounded-2xl border border-slate-800/80 bg-slate-900/30 p-8 shadow-md hover:border-fuchsia-500/40 hover:bg-slate-900/50 hover:-translate-y-1 transition-all duration-300">
                <div class="w-12 h-12 rounded-xl bg-fuchsia-500/10 border border-fuchsia-500/20 flex items-center justify-center text-fuchsia-400 mb-6 group-hover:scale-110 transition-transform duration-300">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-white mb-3">{{ __('Enterprise Grade Security') }}</h3>
                <p class="text-slate-400 text-sm leading-relaxed">
                    {{ __('SAML SSO, RBAC compliance, end-to-end data encryption, and self-hosted VPC deployments. Your agency can manage custom compliance effortlessly.') }}
                </p>
            </div>

            <!-- Feature 3 -->
            <div class="group relative rounded-2xl border border-slate-800/80 bg-slate-900/30 p-8 shadow-md hover:border-cyan-500/40 hover:bg-slate-900/50 hover:-translate-y-1 transition-all duration-300">
                <div class="w-12 h-12 rounded-xl bg-cyan-500/10 border border-cyan-500/20 flex items-center justify-center text-cyan-400 mb-6 group-hover:scale-110 transition-transform duration-300">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 002 2h2a2 2 0 002-2z"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-white mb-3">{{ __('Dynamic Analytics Logs') }}</h3>
                <p class="text-slate-400 text-sm leading-relaxed">
                    {{ __('Track token count, routing decisions, execution fees, and latency indicators in real-time with comprehensive grafana dashboard syncing.') }}
                </p>
            </div>
        </div>
    </section>

    <!-- Workflow builder Demo section (Interactive) -->
    <section id="workflow" class="max-w-7xl mx-auto px-6 py-20" x-data="{ 
        currentStep: 'none', 
        simulating: false, 
        result: '', 
        runSimulation() {
            this.simulating = true;
            this.result = '{{ __('Analyzing input data...') }}';
            setTimeout(() => {
                this.result = '{{ __('AI Agent processing decision matrices...') }}';
                setTimeout(() => {
                    this.result = '{{ __('Action complete! Slack notify sent & sheet updated successfully.') }}';
                    this.simulating = false;
                }, 1500);
            }, 1000);
        }
    }">
        <div class="rounded-3xl border border-slate-880 bg-slate-900/20 backdrop-blur-md p-8 md:p-12 grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            <div>
                <span class="text-xs font-bold text-violet-400 uppercase tracking-wider mb-2 block">{{ __('Interactive Lab') }}</span>
                <h2 class="text-3xl sm:text-4xl font-extrabold text-white mb-6">{{ __('Build Your Logic & Test in Real Time') }}</h2>
                <p class="text-slate-400 text-base leading-relaxed mb-6">
                    {{ __('Toggle trigger states and test executions instantly right inside the landing page. Vortex runs the workflow in a sandboxed runtime environment.') }}
                </p>

                <!-- Alpine buttons -->
                <div class="space-y-4">
                    <button 
                        @click="currentStep = 'trigger'" 
                        class="w-full flex items-center justify-between text-left p-4 rounded-xl border border-slate-800 transition-all"
                        :class="currentStep === 'trigger' ? 'bg-cyan-500/10 border-cyan-500/50 text-white' : 'bg-slate-900/60 hover:bg-slate-900 text-slate-300'"
                    >
                        <div class="flex items-center space-x-3">
                            <span class="w-7 h-7 rounded-lg bg-cyan-500/10 border border-cyan-500/30 flex items-center justify-center text-cyan-400 font-bold text-xs">1</span>
                            <div>
                                <div class="text-xs font-semibold">{{ __('Select Trigger Node') }}</div>
                                <p class="text-[11px] text-slate-500">{{ __('Configure Webhook, Email or Schedule') }}</p>
                            </div>
                        </div>
                        <svg class="w-4 h-4 text-slate-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                    </button>

                    <button 
                        @click="currentStep = 'agent'" 
                        class="w-full flex items-center justify-between text-left p-4 rounded-xl border border-slate-800 transition-all"
                        :class="currentStep === 'agent' ? 'bg-violet-500/10 border-violet-500/50 text-white' : 'bg-slate-900/60 hover:bg-slate-900 text-slate-300'"
                    >
                        <div class="flex items-center space-x-3">
                            <span class="w-7 h-7 rounded-lg bg-violet-500/10 border border-violet-500/30 flex items-center justify-center text-violet-400 font-bold text-xs">2</span>
                            <div>
                                <div class="text-xs font-semibold">{{ __('Assign Intelligence Agent') }}</div>
                                <p class="text-[11px] text-slate-500">{{ __('Connect to Claude 3.5, GPT-4o or Llama3') }}</p>
                            </div>
                        </div>
                        <svg class="w-4 h-4 text-slate-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                    </button>

                    <button 
                        @click="currentStep = 'action'" 
                        class="w-full flex items-center justify-between text-left p-4 rounded-xl border border-slate-800 transition-all"
                        :class="currentStep === 'action' ? 'bg-fuchsia-500/10 border-fuchsia-500/50 text-white' : 'bg-slate-900/60 hover:bg-slate-900 text-slate-300'"
                    >
                        <div class="flex items-center space-x-3">
                            <span class="w-7 h-7 rounded-lg bg-fuchsia-500/10 border border-fuchsia-500/30 flex items-center justify-center text-fuchsia-400 font-bold text-xs">3</span>
                            <div>
                                <div class="text-xs font-semibold">{{ __('Set Response Destination') }}</div>
                                <p class="text-[11px] text-slate-500">{{ __('Slack, HubSpot, PostgreSQL or WhatsApp') }}</p>
                            </div>
                        </div>
                        <svg class="w-4 h-4 text-slate-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                    </button>
                </div>
            </div>

            <!-- Visual Sandbox -->
            <div class="bg-slate-950 rounded-2xl border border-slate-800 p-6 flex flex-col justify-between min-h-[380px]">
                <div class="flex items-center justify-between border-b border-slate-800/80 pb-4 mb-4">
                    <div class="flex items-center space-x-2">
                        <span class="w-2.5 h-2.5 rounded-full bg-violet-500 animate-ping"></span>
                        <span class="text-xs font-semibold tracking-wider uppercase text-slate-400">{{ __('Sandbox Preview') }}</span>
                    </div>
                    <button 
                        @click="runSimulation" 
                        :disabled="simulating" 
                        class="px-4 py-1.5 rounded-lg text-xs font-bold bg-violet-600 hover:bg-violet-500 text-white disabled:opacity-50 transition-colors"
                    >
                        <span x-show="!simulating">{{ __('Run Logic') }}</span>
                        <span x-show="simulating">{{ __('Running...') }}</span>
                    </button>
                </div>

                <div class="flex-1 flex flex-col items-center justify-center space-y-4">
                    <!-- Dynamic state rendering based on user click -->
                    <div class="text-center p-4 rounded-xl border border-dashed border-slate-800 w-full" x-show="currentStep === 'none'">
                        <span class="text-xs text-slate-500">{{ __('Click a configuration step on the left to activate sandbox elements.') }}</span>
                    </div>

                    <div class="w-full space-y-4 text-xs" x-show="currentStep !== 'none'">
                        <!-- Trigger Render -->
                        <div class="p-3.5 rounded-lg border border-slate-800 bg-slate-900/40 transition-all duration-300"
                            :class="currentStep === 'trigger' ? 'border-cyan-500/50 bg-cyan-950/10' : ''">
                            <span class="font-bold text-[10px] text-cyan-400 uppercase">{{ __('Step 1: Trigger Node') }}</span>
                            <div class="text-slate-300 mt-1">{{ __('Webhook listener active at:') }} <code class="bg-slate-950 px-1 py-0.5 rounded text-cyan-300">https://api.vortex.ai/hooks/lead</code></div>
                        </div>

                        <!-- Agent Render -->
                        <div class="p-3.5 rounded-lg border border-slate-800 bg-slate-900/40 transition-all duration-300"
                            :class="currentStep === 'agent' ? 'border-violet-500/50 bg-violet-950/10' : ''">
                            <span class="font-bold text-[10px] text-violet-400 uppercase">{{ __('Step 2: Intelligence Agent') }}</span>
                            <div class="text-slate-300 mt-1">{{ __('LLM Model:') }} <code class="bg-slate-950 px-1 py-0.5 rounded text-violet-300">Claude-3-5-Sonnet-v2</code></div>
                        </div>

                        <!-- Action Render -->
                        <div class="p-3.5 rounded-lg border border-slate-800 bg-slate-900/40 transition-all duration-300"
                            :class="currentStep === 'action' ? 'border-fuchsia-500/50 bg-fuchsia-950/10' : ''">
                            <span class="font-bold text-[10px] text-fuchsia-400 uppercase">{{ __('Step 3: Action Destination') }}</span>
                            <div class="text-slate-300 mt-1">{{ __('Output channel: Send packet to') }} <code class="bg-slate-950 px-1 py-0.5 rounded text-fuchsia-300">#sales-pipeline</code></div>
                        </div>
                    </div>
                </div>

                <!-- Console Output -->
                <div class="mt-4 pt-4 border-t border-slate-800/80 font-mono text-[10px] min-h-[60px]">
                    <div class="text-slate-500 mb-1">&gt; {{ __('Sandbox Output Console') }}</div>
                    <div class="text-emerald-400" x-text="result" x-show="result !== ''"></div>
                    <div class="text-slate-600" x-show="result === ''">{{ __('Console idle. Awaiting logic execution...') }}</div>
                </div>
            </div>
        </div>
    </section>

    <!-- Pricing Section -->
    <section id="pricing" class="max-w-7xl mx-auto px-6 py-20" x-data="{ billing: 'annual' }">
        <div class="text-center max-w-3xl mx-auto mb-16">
            <h2 class="text-3xl sm:text-5xl font-extrabold text-white mb-4">{{ __('Pricing Plans Made for Scale') }}</h2>
            <p class="text-slate-400 mb-8">{{ __('Start building today. Scale indefinitely with clear token pricing guides.') }}</p>

            <!-- Toggle -->
            <div class="inline-flex items-center space-x-3 bg-slate-900 border border-slate-800/80 p-1.5 rounded-xl">
                <button 
                    @click="billing = 'monthly'" 
                    class="px-4 py-2 text-xs font-semibold rounded-lg transition-all"
                    :class="billing === 'monthly' ? 'bg-violet-600 text-white shadow-md' : 'text-slate-400 hover:text-white'"
                >
                    {{ __('Monthly Billing') }}
                </button>
                <button 
                    @click="billing = 'annual'" 
                    class="px-4 py-2 text-xs font-semibold rounded-lg transition-all"
                    :class="billing === 'annual' ? 'bg-violet-600 text-white shadow-md' : 'text-slate-400 hover:text-white'"
                >
                    {{ __('Annual Billing') }}
                    <span class="ml-1 px-1.5 py-0.5 rounded bg-cyan-500/20 text-cyan-400 text-[9px] border border-cyan-500/30">{{ __('Save 20%') }}</span>
                </button>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Plan 1 -->
            <div class="bg-slate-900/30 rounded-2xl border border-slate-800 p-8 flex flex-col justify-between hover:border-slate-700 transition-colors">
                <div>
                    <h4 class="text-lg font-bold text-white mb-1">{{ __('Developer') }}</h4>
                    <p class="text-slate-400 text-xs mb-6">{{ __('Perfect for sandbox testing and small apps.') }}</p>
                    
                    <div class="flex items-baseline mb-6">
                        <span class="text-4xl font-extrabold text-white" x-text="billing === 'annual' ? '$19' : '$24'"></span>
                        <span class="text-slate-500 text-xs ml-2">/ {{ __('month') }}</span>
                    </div>

                    <ul class="space-y-3.5 text-xs text-slate-300 border-t border-slate-800/60 pt-6 mb-8">
                        <li class="flex items-center space-x-2.5">
                            <svg class="w-4 h-4 text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"></path></svg>
                            <span>{{ __('Up to 5 concurrent agents') }}</span>
                        </li>
                        <li class="flex items-center space-x-2.5">
                            <svg class="w-4 h-4 text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"></path></svg>
                            <span>{{ __('10,000 runs per month') }}</span>
                        </li>
                        <li class="flex items-center space-x-2.5">
                            <svg class="w-4 h-4 text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"></path></svg>
                            <span>{{ __('Shared node cluster hosting') }}</span>
                        </li>
                    </ul>
                </div>
                <a href="#" class="w-full py-3 rounded-xl border border-slate-850 bg-slate-950 text-slate-300 text-xs font-bold text-center hover:bg-slate-900 hover:text-white transition-colors">{{ __('Start Building') }}</a>
            </div>

            <!-- Plan 2 (Highlighted) -->
            <div class="relative bg-slate-900/60 rounded-2xl border border-violet-500/50 p-8 flex flex-col justify-between shadow-xl shadow-violet-500/5 hover:-translate-y-1 transition-all duration-300">
                <div class="absolute top-0 right-8 -translate-y-1/2 px-3 py-1 rounded-full text-[10px] font-bold tracking-wide uppercase bg-gradient-to-r from-violet-600 to-cyan-500 text-white shadow-lg">{{ __('Recommended') }}</div>
                <div>
                    <h4 class="text-lg font-bold text-white mb-1">{{ __('Growth Pro') }}</h4>
                    <p class="text-slate-400 text-xs mb-6">{{ __('Designed for scaleups and system optimization.') }}</p>
                    
                    <div class="flex items-baseline mb-6">
                        <span class="text-4xl font-extrabold text-white" x-text="billing === 'annual' ? '$79' : '$99'"></span>
                        <span class="text-slate-500 text-xs ml-2">/ {{ __('month') }}</span>
                    </div>

                    <ul class="space-y-3.5 text-xs text-slate-300 border-t border-slate-800/60 pt-6 mb-8">
                        <li class="flex items-center space-x-2.5">
                            <svg class="w-4 h-4 text-violet-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"></path></svg>
                            <span>{{ __('Unlimited agents') }}</span>
                        </li>
                        <li class="flex items-center space-x-2.5">
                            <svg class="w-4 h-4 text-violet-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"></path></svg>
                            <span>{{ __('150,000 runs per month') }}</span>
                        </li>
                        <li class="flex items-center space-x-2.5">
                            <svg class="w-4 h-4 text-violet-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"></path></svg>
                            <span>{{ __('Dedicated sandbox containers') }}</span>
                        </li>
                        <li class="flex items-center space-x-2.5">
                            <svg class="w-4 h-4 text-violet-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"></path></svg>
                            <span>{{ __('Prioritized API concurrency queue') }}</span>
                        </li>
                    </ul>
                </div>
                <a href="#" class="w-full py-3 rounded-xl bg-gradient-to-r from-violet-600 to-cyan-500 text-white text-xs font-bold text-center shadow-lg hover:shadow-violet-600/30 transition-all">{{ __('Claim Pro Access') }}</a>
            </div>

            <!-- Plan 3 -->
            <div class="bg-slate-900/30 rounded-2xl border border-slate-800 p-8 flex flex-col justify-between hover:border-slate-700 transition-colors">
                <div>
                    <h4 class="text-lg font-bold text-white mb-1">{{ __('Enterprise Cluster') }}</h4>
                    <p class="text-slate-400 text-xs mb-6">{{ __('Fully custom compliance, VPC and support SLAs.') }}</p>
                    
                    <div class="flex items-baseline mb-6">
                        <span class="text-4xl font-extrabold text-white">{{ __('Custom') }}</span>
                    </div>

                    <ul class="space-y-3.5 text-xs text-slate-300 border-t border-slate-800/60 pt-6 mb-8">
                        <li class="flex items-center space-x-2.5">
                            <svg class="w-4 h-4 text-cyan-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"></path></svg>
                            <span>{{ __('Self-hosted VPC option') }}</span>
                        </li>
                        <li class="flex items-center space-x-2.5">
                            <svg class="w-4 h-4 text-cyan-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"></path></svg>
                            <span>{{ __('HIPAA, SOC-2 compliance audits') }}</span>
                        </li>
                        <li class="flex items-center space-x-2.5">
                            <svg class="w-4 h-4 text-cyan-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"></path></svg>
                            <span>{{ __('Custom custom model integrations') }}</span>
                        </li>
                        <li class="flex items-center space-x-2.5">
                            <svg class="w-4 h-4 text-cyan-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"></path></svg>
                            <span>{{ __('24/7 dedicated system engineer') }}</span>
                        </li>
                    </ul>
                </div>
                <a href="{{ route('landing.agency') }}" class="w-full py-3 rounded-xl border border-cyan-850/40 bg-cyan-950/20 text-cyan-400 text-xs font-bold text-center hover:bg-cyan-900/30 transition-colors">{{ __('Contact Enterprise Agency') }}</a>
            </div>
        </div>
    </section>

    <!-- FAQ Section -->
    <section id="faq" class="max-w-4xl mx-auto px-6 py-20" x-data="{ activeFaq: null }">
        <div class="text-center mb-16">
            <h2 class="text-3xl sm:text-5xl font-extrabold text-white mb-4">{{ __('Frequently Asked Questions') }}</h2>
            <p class="text-slate-400">{{ __('Everything you need to know about the Vortex AI Platform.') }}</p>
        </div>

        <div class="space-y-4">
            <!-- FAQ 1 -->
            <div class="border border-slate-800 rounded-xl overflow-hidden bg-slate-900/20 backdrop-blur-md">
                <button 
                    @click="activeFaq = activeFaq === 1 ? null : 1" 
                    class="w-full flex items-center justify-between text-left p-6 font-semibold text-white focus:outline-none"
                >
                    <span>{{ __('How does Vortex connect to internal databases?') }}</span>
                    <svg class="w-5 h-5 text-slate-400 transition-transform duration-250" :class="activeFaq === 1 ? 'rotate-180 text-violet-400' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                </button>
                <div 
                    x-show="activeFaq === 1" 
                    x-transition:enter="transition ease-out duration-200" 
                    x-transition:enter-start="opacity-0 transform scale-98" 
                    x-transition:enter-end="opacity-100 transform scale-100"
                    class="p-6 pt-0 text-sm text-slate-400 leading-relaxed border-t border-slate-800/40"
                >
                    {{ __('Vortex provides secure, read-only Database nodes that support SSH tunneling, VPC peering, and secure API keys. Your database credentials are fully encrypted using AES-256 standard and stored inside AWS KMS HSMs.') }}
                </div>
            </div>

            <!-- FAQ 2 -->
            <div class="border border-slate-800 rounded-xl overflow-hidden bg-slate-900/20 backdrop-blur-md">
                <button 
                    @click="activeFaq = activeFaq === 2 ? null : 2" 
                    class="w-full flex items-center justify-between text-left p-6 font-semibold text-white focus:outline-none"
                >
                    <span>{{ __('Can we self-host Vortex?') }}</span>
                    <svg class="w-5 h-5 text-slate-400 transition-transform duration-250" :class="activeFaq === 2 ? 'rotate-180 text-violet-400' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                </button>
                <div 
                    x-show="activeFaq === 2" 
                    x-transition:enter="transition ease-out duration-200" 
                    x-transition:enter-start="opacity-0 transform scale-98" 
                    x-transition:enter-end="opacity-100 transform scale-100"
                    class="p-6 pt-0 text-sm text-slate-400 leading-relaxed border-t border-slate-800/40"
                >
                    {{ __('Yes, we offer Docker compose and Kubernetes Helm charts to deploy the Vortex Orchestrator directly inside your own private cloud infrastructure. Self-hosting requires an Enterprise subscription.') }}
                </div>
            </div>

            <!-- FAQ 3 -->
            <div class="border border-slate-800 rounded-xl overflow-hidden bg-slate-900/20 backdrop-blur-md">
                <button 
                    @click="activeFaq = activeFaq === 3 ? null : 3" 
                    class="w-full flex items-center justify-between text-left p-6 font-semibold text-white focus:outline-none"
                >
                    <span>{{ __('What is the difference between the SaaS Platform and Vortex Studio (Agency)?') }}</span>
                    <svg class="w-5 h-5 text-slate-400 transition-transform duration-250" :class="activeFaq === 3 ? 'rotate-180 text-violet-400' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                </button>
                <div 
                    x-show="activeFaq === 3" 
                    x-transition:enter="transition ease-out duration-200" 
                    x-transition:enter-start="opacity-0 transform scale-98" 
                    x-transition:enter-end="opacity-100 transform scale-100"
                    class="p-6 pt-0 text-sm text-slate-400 leading-relaxed border-t border-slate-800/40"
                >
                    {!! __('The **Vortex SaaS Platform** is a self-serve platform where your developers write workflows and nodes themselves. **Vortex Studio** is our dedicated consulting and implementation agency arm where our core engineers configure, optimize, and build custom end-to-end enterprise systems for your team. Learn more on our :agency_link.', ['agency_link' => '<a href="' . route('landing.agency') . '" class="text-cyan-400 underline font-medium">' . __('Vortex Studio Agency Page') . '</a>']) !!}
                </div>
            </div>
        </div>
    </section>

    <!-- Interconnected CTA Section -->
    <section class="max-w-7xl mx-auto px-6 py-12 mb-16">
        <div class="relative rounded-3xl bg-gradient-to-r from-slate-900 to-slate-950 border border-violet-500/20 p-8 md:p-12 overflow-hidden flex flex-col md:flex-row items-center justify-between gap-8">
            <div class="absolute inset-0 glow-purple opacity-20 pointer-events-none"></div>
            <div class="relative z-10 max-w-xl text-left">
                <span class="text-[10px] font-bold text-violet-400 uppercase tracking-widest block mb-2">{{ __('Looking for custom integration?') }}</span>
                <h3 class="text-2xl sm:text-3xl font-extrabold text-white mb-3">{{ __('Let Vortex Studio Build it For You') }}</h3>
                <p class="text-slate-400 text-sm leading-relaxed">
                    {{ __('Need customized LLM tuning, compliance infrastructure, or specialized agent UI design? Our custom design and implementation agency can build it.') }}
                </p>
            </div>
            <div class="relative z-10 whitespace-nowrap">
                <a href="{{ route('landing.agency') }}" class="inline-flex items-center px-6 py-3.5 rounded-xl bg-white hover:bg-slate-100 text-slate-950 font-bold transition-all text-sm group">
                    <span>{{ __('Explore Vortex Studio') }}</span>
                    <svg class="w-4 h-4 ml-2 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                </a>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="border-t border-slate-900/60 bg-slate-950/80 backdrop-blur-md pt-16 pb-8 text-xs text-slate-500 relative z-10">
        <div class="max-w-7xl mx-auto px-6 grid grid-cols-1 md:grid-cols-4 gap-8 mb-12 text-left">
            <div>
                <a href="#" class="flex items-center space-x-2.5 mb-4">
                    <div class="w-8 h-8 rounded-lg bg-gradient-to-tr from-violet-600 to-cyan-500 flex items-center justify-center">
                        <svg class="w-4.5 h-4.5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                        </svg>
                    </div>
                    <span class="text-sm font-bold text-white tracking-wider uppercase">{{ __('Vortex AI') }}</span>
                </a>
                <p class="text-slate-400 leading-relaxed max-w-xs mb-4">
                    {{ __('Making autonomous logic accessible to developers and businesses.') }}
                </p>
                <div class="text-[10px] text-slate-650">&copy; {{ __('2026 Vortex AI Corp. All rights reserved.') }}</div>
            </div>
            <div>
                <h5 class="text-white font-bold mb-4 uppercase tracking-wider text-[10px]">{{ __('Product') }}</h5>
                <ul class="space-y-2">
                    <li><a href="#features" class="hover:text-slate-350 transition-colors">{{ __('Features') }}</a></li>
                    <li><a href="#workflow" class="hover:text-slate-350 transition-colors">{{ __('Sandbox Demo') }}</a></li>
                    <li><a href="#pricing" class="hover:text-slate-350 transition-colors">{{ __('Pricing') }}</a></li>
                </ul>
            </div>
            <div>
                <h5 class="text-white font-bold mb-4 uppercase tracking-wider text-[10px]">{{ __('Services & Agency') }}</h5>
                <ul class="space-y-2">
                    <li><a href="{{ route('landing.agency') }}" class="hover:text-slate-350 transition-colors font-semibold text-cyan-400">{{ __('Vortex Studio (Custom Agency)') }}</a></li>
                    <li><a href="{{ route('landing.agency') }}#estimator" class="hover:text-slate-350 transition-colors">{{ __('Agency Cost Estimator') }}</a></li>
                    <li><a href="{{ route('landing.agency') }}#contact" class="hover:text-slate-350 transition-colors">{{ __('Book Consultation') }}</a></li>
                </ul>
            </div>
            <div>
                <h5 class="text-white font-bold mb-4 uppercase tracking-wider text-[10px]">{{ __('Sign Up') }}</h5>
                <p class="text-slate-400 mb-3 leading-relaxed">{{ __('Join our weekly newsletter for automation insights.') }}</p>
                <div class="flex space-x-2">
                    <input type="email" placeholder="{{ __('name@domain.com') }}" class="bg-slate-900 border border-slate-800 rounded-lg px-3 py-2 text-slate-200 focus:outline-none focus:border-violet-500 flex-1">
                    <button class="bg-violet-600 hover:bg-violet-500 px-3.5 py-2 rounded-lg text-white font-semibold transition-colors">{{ __('Join') }}</button>
                </div>
            </div>
        </div>
    </footer>

</body>
</html>
