@extends('layouts.staticpages')

@section('content')
@php $initialStep = $step ?? 1; @endphp

<div x-data="resumeWizard({{ $initialStep }})" class="min-h-screen py-10">
    <div class="container mx-auto px-4 lg:px-8">

        <!-- Heading -->
        <div class="text-center">
            <h1 class="text-3xl md:text-4xl font-extrabold text-slate-50">
                Build a strong first impression with your <span class="text-cyan-400">personal header</span>
            </h1>
            <p class="mt-3 text-slate-300 max-w-3xl mx-auto">
                Start your resume with your full name, location, and clear contact details so employers can easily connect with you.
            </p>
        </div>

        <!-- Mobile: Horizontal stepper -->
        <div class="lg:hidden mt-6 overflow-x-auto">
            <ol class="flex gap-4 min-w-max px-1">
                @foreach ([
                1 => 'Personal Info.',
                2 => 'Experience',
                3 => 'Education',
                4 => 'Skills',
                5 => 'Projects',
                6 => 'Certifications',
                7 => 'Volunteer',
                8 => 'Awards',
                9 => 'Publications',
                10 => 'Languages',
                11 => 'Hobbies',
                12 => 'Summary',
                ] as $i => $label)
                <li
                    class="flex flex-col items-center text-center cursor-pointer"
                    :class="step === {{ $i }} ? '' : 'opacity-80'"
                    @click="goto({{ $i }})">
                    <span class="w-8 h-8 rounded-full grid place-items-center font-semibold"
                        :class="step === {{ $i }} ? 'bg-cyan-500 text-white' : 'bg-slate-700 text-slate-300'">
                        {{ $i }}
                    </span>
                    <span class="text-[11px] mt-1"
                        :class="step === {{ $i }} ? 'text-slate-100' : 'text-slate-300'">
                        {{ $label }}
                    </span>
                </li>
                @endforeach

            </ol>
        </div>

        <!-- Grid -->
        <div class="mt-8 grid grid-cols-1 md:grid-cols-[minmax(0,1fr)_minmax(0,480px)] lg:grid-cols-[220px_minmax(0,1fr)_minmax(0,520px)] gap-6">

            <!-- Desktop: vertical stepper -->
            <aside class="hidden lg:block">
                <div class="bg-slate-800/70 border border-slate-700 rounded-2xl p-4">
                    <ol class="space-y-4">
                        @foreach ([
                        1 => ['Personal Info.', 'Name, location & contact'],
                        2 => ['Experience', 'Roles, achievements'],
                        3 => ['Education', 'Degrees, durations'],
                        4 => ['Skills', 'Core competencies'],
                        5 => ['Projects', 'Notable work & contributions'],
                        6 => ['Certifications', 'Licenses & certifications'],
                        7 => ['Volunteer', 'Volunteer roles & activities'],
                        8 => ['Awards', 'Honors & recognitions'],
                        9 => ['Publications', 'Articles, books, research'],
                        10 => ['Languages', 'Spoken & written languages'],
                        11 => ['Hobbies', 'Interests & leisure activities'],
                        12 => ['Summary', 'Short intro & final review'],
                        ] as $i => [$title, $sub])
                        <li
                            class="flex items-start gap-3 cursor-pointer"
                            :class="step === {{ $i }} ? '' : 'opacity-80'"
                            @click="goto({{ $i }})">
                            <span class="mt-0.5 w-8 h-8 rounded-full grid place-items-center font-semibold"
                                :class="step === {{ $i }} ? 'bg-cyan-500 text-white' : 'bg-slate-700 text-slate-300'">
                                {{ $i }}
                            </span>
                            <div>
                                <div class="font-semibold text-slate-100">{{ $title }}</div>
                                <div class="text-sm text-slate-400">{{ $sub }}</div>
                            </div>
                        </li>
                        @endforeach

                    </ol>
                </div>
            </aside>

            <!-- Form (Step content switches via x-show) -->
            <section class="bg-slate-800/70 border border-slate-700 rounded-2xl p-5 md:p-7">
                <div class="mb-5 flex items-center justify-between">
                    <div>
                        <h2 class="text-lg md:text-xl font-bold text-slate-100" x-text="headingFor(step)"></h2>
                        <p class="text-slate-400 text-sm" x-text="subFor(step)"></p>
                    </div>
                    <span class="hidden md:inline-flex items-center gap-2 text-xs px-2.5 py-1.5 rounded-full bg-slate-900/50 border border-slate-700 text-slate-300">
                        Step <span x-text="step" class="mx-1"></span> of 12
                    </span>
                </div>

                <!-- Step 1: Personal Information -->
                <form
                    x-show="step === 1"
                    x-transition.opacity
                    @submit.prevent="saveAndNext"
                    class="grid grid-cols-1 md:grid-cols-2 gap-5">

                    @csrf

                    <!-- First Name -->
                    <!-- First Name -->
                    <!-- First Name -->
                    <!-- First Name -->
                    <!-- First Name -->
                    <div>
                        <label class="block text-xs font-semibold text-slate-300 mb-2">FIRST NAME</label>
                        <input
                            name="first_name"
                            :value="$store.resume.firstName"
                            @input="$store.resume.firstName = $event.target.value"
                            class="w-full h-11 rounded-xl bg-slate-900/50 border border-slate-700 text-slate-100 px-3
         focus:outline-none focus:ring-2 focus:ring-cyan-500"
                            placeholder="Diya">
                    </div>

                    <!-- Last Name -->
                    <div>
                        <label class="block text-xs font-semibold text-slate-300 mb-2">LAST NAME</label>
                        <input
                            name="last_name"
                            :value="$store.resume.lastName"
                            @input="$store.resume.lastName = $event.target.value"
                            class="w-full h-11 rounded-xl bg-slate-900/50 border border-slate-700 text-slate-100 px-3
         focus:outline-none focus:ring-2 focus:ring-cyan-500"
                            placeholder="Agarwal">
                    </div>

                    <!-- Contact Number -->
                    <div>
                        <label class="block text-xs font-semibold text-slate-300 mb-2">CONTACT NUMBER</label>
                        <input
                            name="contact_number"
                            :value="$store.resume.contact_number"
                            @input="$store.resume.contact_number = $event.target.value"
                            class="w-full h-11 rounded-xl bg-slate-900/50 border border-slate-700 text-slate-100 px-3 
           focus:outline-none focus:ring-2 focus:ring-cyan-500"
                            placeholder="+91 9876543210">
                    </div>


                    <!-- Email Address -->
                    <!-- EMAIL -->
                    <div>
                        <label class="block text-xs font-semibold text-slate-300 mb-2">
                            EMAIL <span class="text-rose-400">*</span>
                        </label>
                        <input
                            type="email"
                            name="email"
                            :value="$store.resume.email"
                            @input="$store.resume.email = $event.target.value"
                            class="w-full h-11 rounded-xl bg-slate-900/50 border border-slate-700 text-slate-100 px-3 
           focus:outline-none focus:ring-2 focus:ring-cyan-500"
                            placeholder="you@example.com">
                    </div>

                    <!-- DATE OF BIRTH -->
                    <div>
                        <label class="block text-xs font-semibold text-slate-300 mb-2">DATE OF BIRTH</label>
                        <input
                            type="date"
                            name="dob"
                            :value="$store.resume.dob"
                            @input="$store.resume.dob = $event.target.value"
                            class="w-full h-11 rounded-xl bg-slate-900/50 border border-slate-700 text-slate-100 px-3 
           focus:outline-none focus:ring-2 focus:ring-cyan-500">
                    </div>


                    <!-- Nationality -->
                    <!-- <div>
                        <label class="block text-xs font-semibold text-slate-300 mb-2">NATIONALITY</label>
                        <input class="w-full h-11 rounded-xl bg-slate-900/50 border border-slate-700 text-slate-100 px-3 
                focus:outline-none focus:ring-2 focus:ring-cyan-500" placeholder="Indian">
                    </div> -->

                    <!-- Country -->
                    <!-- COUNTRY -->
                    <div>
                        <label class="block text-xs font-semibold text-slate-300 mb-2">COUNTRY</label>
                        <input
                            name="country"
                            :value="$store.resume.country"
                            @input="$store.resume.country = $event.target.value"
                            class="w-full h-11 rounded-xl bg-slate-900/50 border border-slate-700 text-slate-100 px-3 
           focus:outline-none focus:ring-2 focus:ring-cyan-500"
                            placeholder="India">
                    </div>

                    <!-- STATE -->
                    <div>
                        <label class="block text-xs font-semibold text-slate-300 mb-2">STATE</label>
                        <input
                            name="state"
                            :value="$store.resume.state"
                            @input="$store.resume.state = $event.target.value"
                            class="w-full h-11 rounded-xl bg-slate-900/50 border border-slate-700 text-slate-100 px-3 
           focus:outline-none focus:ring-2 focus:ring-cyan-500"
                            placeholder="Delhi">
                    </div>

                    <!-- CITY -->
                    <div>
                        <label class="block text-xs font-semibold text-slate-300 mb-2">CITY</label>
                        <input
                            name="city"
                            :value="$store.resume.city"
                            @input="$store.resume.city = $event.target.value"
                            class="w-full h-11 rounded-xl bg-slate-900/50 border border-slate-700 text-slate-100 px-3 
           focus:outline-none focus:ring-2 focus:ring-cyan-500"
                            placeholder="New Delhi">
                    </div>

                    <!-- <div class="md:col-span-2">
                        <label class="block text-xs font-semibold text-slate-300 mb-2">ADDRESS</label>
                        <textarea rows="2" class="w-full rounded-xl bg-slate-900/50 border border-slate-700 text-slate-100 px-3 py-2 
                          focus:outline-none focus:ring-2 focus:ring-cyan-500" placeholder="Full address with street, area, etc."></textarea>
                    </div> -->

                    <!-- GitHub + Website -->
                    <div class="md:col-span-2 grid grid-cols-1 md:grid-cols-2 gap-5">
                        <!-- GitHub -->
                        <div>
                            <label class="block text-xs font-semibold text-slate-300 mb-2">GITHUB LINK</label>
                            <input type="url" name="github"
                                :value="$store.resume.github"
                                @input="$store.resume.github = $event.target.value"
                                class="w-full h-11 rounded-xl bg-slate-900/50 border border-slate-700 
                   text-slate-100 px-3 focus:outline-none focus:ring-2 focus:ring-cyan-500"
                                placeholder="https://github.com/username">
                        </div>

                        <!-- Personal Website -->
                        <div>
                            <label class="block text-xs font-semibold text-slate-300 mb-2">PERSONAL WEBSITE</label>
                            <input type="url" name="website"
                                :value="$store.resume.website"
                                @input="$store.resume.website = $event.target.value"
                                class="w-full h-11 rounded-xl bg-slate-900/50 border border-slate-700 
                   text-slate-100 px-3 focus:outline-none focus:ring-2 focus:ring-cyan-500"
                                placeholder="https://www.yourwebsite.com">
                        </div>
                    </div>

                    <!-- LinkedIn -->
                    <div>
                        <label class="block text-xs font-semibold text-slate-300 mb-2">LINKEDIN PROFILE</label>
                        <input type="url" name="linkedin"
                            :value="$store.resume.linkedin"
                            @input="$store.resume.linkedin = $event.target.value"
                            class="w-full h-11 rounded-xl bg-slate-900/50 border border-slate-700 
               text-slate-100 px-3 focus:outline-none focus:ring-2 focus:ring-cyan-500"
                            placeholder="https://linkedin.com/in/username">
                    </div>


                    <!-- Actions -->
                    <div class="md:col-span-2 flex justify-end gap-3 pt-2">
                        <button type="submit"
                            class="px-5 h-10 rounded-xl bg-cyan-600 text-white font-semibold hover:bg-cyan-700">
                            Save & Next
                        </button>
                    </div>
                </form>




                <!-- Step 2: Experience (example placeholder) -->
                <form x-show="step === 2" x-data="experienceStep(next, back)" x-transition.opacity
                    @submit.prevent="saveAndNext"
                    class="grid grid-cols-1 md:grid-cols-2 gap-5">

                    @csrf

                    {{-- HEADER --}}
                    <div class="md:col-span-2 flex items-center justify-between">
                        <div>
                            <h3 class="text-slate-100 text-lg font-semibold">Experience</h3>
                            <p class="text-slate-400 text-sm">Fill the form and click <b>Add to Resume</b>. Your entries will list below.</p>
                        </div>
                        <div>
                            <button type="button"
                                class="px-4 h-10 rounded-xl bg-slate-800 border border-slate-700 text-slate-200 hover:bg-slate-700"
                                @click="addMore"
                                x-show="!showForm">
                                + Add more experience
                            </button>
                        </div>
                    </div>

                    {{-- FORM (togglable) --}}
                    <template x-if="showForm">
                        <div class="md:col-span-2 grid grid-cols-1 md:grid-cols-2 gap-5">

                            {{-- Job Title --}}
                            <div>
                                <label class="block text-xs font-semibold text-slate-300 mb-2">JOB TITLE</label>
                                <input x-model="form.job_title"
                                    class="w-full h-11 rounded-xl bg-slate-900/50 border border-slate-700 text-slate-100 px-3 focus:outline-none focus:ring-2 focus:ring-cyan-500"
                                    placeholder="Software Engineer">
                            </div>

                            {{-- Company Name --}}
                            <div>
                                <label class="block text-xs font-semibold text-slate-300 mb-2">COMPANY NAME</label>
                                <input x-model="form.company_name"
                                    class="w-full h-11 rounded-xl bg-slate-900/50 border border-slate-700 text-slate-100 px-3 focus:outline-none focus:ring-2 focus:ring-cyan-500"
                                    placeholder="Alive Hire">
                            </div>

                            {{-- Company Type --}}
                            <div>
                                <label class="block text-xs font-semibold text-slate-300 mb-2">COMPANY TYPE</label>
                                <input x-model="form.company_type"
                                    class="w-full h-11 rounded-xl bg-slate-900/50 border border-slate-700 text-slate-100 px-3 focus:outline-none focus:ring-2 focus:ring-cyan-500"
                                    placeholder="IT Services / Product / Startup">
                            </div>

                            {{-- Job Type --}}
                            <div>
                                <label class="block text-xs font-semibold text-slate-300 mb-2">JOB TYPE</label>
                                <input x-model="form.job_type"
                                    class="w-full h-11 rounded-xl bg-slate-900/50 border border-slate-700 text-slate-100 px-3 focus:outline-none focus:ring-2 focus:ring-cyan-500"
                                    placeholder="Full-Time / Part-Time / Internship">
                            </div>

                            {{-- Company URL --}}
                            <div class="md:col-span-2">
                                <label class="block text-xs font-semibold text-slate-300 mb-2">COMPANY WEBSITE</label>
                                <input type="url" x-model="form.company_url"
                                    class="w-full h-11 rounded-xl bg-slate-900/50 border border-slate-700 text-slate-100 px-3 focus:outline-none focus:ring-2 focus:ring-cyan-500"
                                    placeholder="https://company.com">
                            </div>

                            {{-- Start Date --}}
                            <div>
                                <label class="block text-xs font-semibold text-slate-300 mb-2">START DATE</label>
                                <input type="date" x-model="form.start_date"
                                    class="w-full h-11 rounded-xl bg-slate-900/50 border border-slate-700 text-slate-100 px-3 focus:outline-none focus:ring-2 focus:ring-cyan-500">
                            </div>

                            {{-- End Date --}}
                            <div>
                                <label class="block text-xs font-semibold text-slate-300 mb-2">END DATE</label>
                                <input type="date" x-model="form.end_date"
                                    class="w-full h-11 rounded-xl bg-slate-900/50 border border-slate-700 text-slate-100 px-3 focus:outline-none focus:ring-2 focus:ring-cyan-500">
                            </div>

                            {{-- Meta Line --}}
                            <div class="md:col-span-2">
                                <label class="block text-xs font-semibold text-slate-300 mb-2">META LINE</label>
                                <input x-model="form.meta_line"
                                    class="w-full h-11 rounded-xl bg-slate-900/50 border border-slate-700 text-slate-100 px-3 focus:outline-none focus:ring-2 focus:ring-cyan-500"
                                    placeholder="Brief summary or role tagline (e.g., Led AI hiring platform development)">
                            </div>

                            {{-- City --}}
                            <div>
                                <label class="block text-xs font-semibold text-slate-300 mb-2">CITY</label>
                                <input x-model="form.city"
                                    class="w-full h-11 rounded-xl bg-slate-900/50 border border-slate-700 text-slate-100 px-3 focus:outline-none focus:ring-2 focus:ring-cyan-500"
                                    placeholder="New Delhi">
                            </div>

                            {{-- State --}}
                            <div>
                                <label class="block text-xs font-semibold text-slate-300 mb-2">STATE</label>
                                <input x-model="form.state"
                                    class="w-full h-11 rounded-xl bg-slate-900/50 border border-slate-700 text-slate-100 px-3 focus:outline-none focus:ring-2 focus:ring-cyan-500"
                                    placeholder="Delhi">
                            </div>

                            {{-- Country --}}
                            <div>
                                <label class="block text-xs font-semibold text-slate-300 mb-2">COUNTRY</label>
                                <input x-model="form.country"
                                    class="w-full h-11 rounded-xl bg-slate-900/50 border border-slate-700 text-slate-100 px-3 focus:outline-none focus:ring-2 focus:ring-cyan-500"
                                    placeholder="India">
                            </div>

                            {{-- Description --}}
                            <div class="md:col-span-2">
                                <label class="block text-xs font-semibold text-slate-300 mb-2">DESCRIPTION</label>
                                <textarea rows="4" x-model="form.description"
                                    class="w-full rounded-xl bg-slate-900/50 border border-slate-700 text-slate-100 px-3 py-2 focus:outline-none focus:ring-2 focus:ring-cyan-500"
                                    placeholder="Describe your role, responsibilities, achievements, and notable contributions..."></textarea>
                            </div>

                            {{-- Inline actions --}}
                            <div class="md:col-span-2 flex justify-between gap-3 pt-2">
                                <div class="flex gap-3">
                                    <button type="button"
                                        class="px-4 h-10 rounded-xl bg-emerald-600 text-white font-semibold hover:bg-emerald-700"
                                        @click="addToResume">
                                        {{ __('Add to Resume') }}
                                    </button>
                                    <button type="button"
                                        class="px-4 h-10 rounded-xl border border-slate-700 text-slate-200 hover:bg-slate-800"
                                        @click="resetForm">
                                        Clear
                                    </button>
                                </div>
                                <div class="flex gap-3">
                                    <button type="button"
                                        class="px-4 h-10 rounded-xl border border-slate-700 text-slate-200 hover:bg-slate-800"
                                        @click="back">
                                        Back
                                    </button>
                                    <button type="submit"
                                        class="px-5 h-10 rounded-xl bg-cyan-600 text-white font-semibold hover:bg-cyan-700">
                                        Save & Next
                                    </button>
                                </div>
                            </div>
                        </div>
                    </template>

                    {{-- LIST (rendered always; form hide after add) --}}
                    <div class="md:col-span-2">
                        <template x-if="items.length === 0">
                            <div class="text-sm text-slate-400">No experience added yet.</div>
                        </template>

                        <template x-for="(exp, i) in items" :key="i">
                            <div class="mt-4 border border-slate-700 rounded-xl p-4 bg-slate-900/40">
                                <div class="flex items-start justify-between">
                                    <div>
                                        <div class="font-semibold text-slate-100"
                                            x-text="(exp.company_name || 'Company') + ' | ' + (exp.job_title || 'Job Title')"></div>
                                        <div class="text-xs text-slate-400 mt-1"
                                            x-text="(exp.start_date || '—') + ' — ' + (exp.end_date || 'Present')"></div>
                                        <div class="text-xs text-slate-400" x-show="exp.meta_line" x-text="exp.meta_line"></div>
                                        <div class="text-xs text-slate-500 mt-1"
                                            x-text="[exp.city, exp.state, exp.country].filter(Boolean).join(', ')"></div>
                                    </div>
                                    <div class="flex gap-2">
                                        <button type="button"
                                            class="px-3 h-8 rounded-lg border border-slate-700 text-slate-200 hover:bg-slate-800"
                                            @click="edit(i)">
                                            Edit
                                        </button>
                                        <button type="button"
                                            class="px-3 h-8 rounded-lg bg-rose-600 text-white hover:bg-rose-700"
                                            @click="remove(i)">
                                            Remove
                                        </button>
                                    </div>
                                </div>

                                <div class="text-sm text-slate-200 mt-3 whitespace-pre-line" x-show="exp.description"
                                    x-text="exp.description"></div>
                                <div class="text-xs mt-2" x-show="exp.company_url">
                                    <a :href="exp.company_url" target="_blank" class="text-cyan-400 hover:underline" x-text="exp.company_url"></a>
                                </div>
                            </div>
                        </template>

                        {{-- Show "Add more experience" when form is hidden --}}
                        <div class="mt-4" x-show="!showForm">
                            <button type="button"
                                class="px-4 h-10 rounded-xl bg-slate-800 border border-slate-700 text-slate-200 hover:bg-slate-700"
                                @click="addMore">
                                + Add more experience
                            </button>
                        </div>
                    </div>
                </form>

                <form x-show="step === 3"
                    x-transition.opacity
                    @submit.prevent="saveAndNext()"
                    x-data="educationStep(next, back)"
                    class="grid grid-cols-1 md:grid-cols-2 gap-5">

                    @csrf

                    <!-- 🔒 Hidden inputs: serialize items[] for Laravel validation -->
                    <template x-for="(ed, i) in items" :key="'hidden-'+i">
                        <div>
                            <input type="hidden" :name="`educations[${i}][degree_name]`" :value="ed.degree_name">
                            <input type="hidden" :name="`educations[${i}][institution]`" :value="ed.institution">
                            <input type="hidden" :name="`educations[${i}][focus]`" :value="ed.focus">
                            <input type="hidden" :name="`educations[${i}][start_date]`" :value="ed.start_date">
                            <input type="hidden" :name="`educations[${i}][end_date]`" :value="ed.end_date">
                            <input type="hidden" :name="`educations[${i}][mode]`" :value="ed.mode">
                            <input type="hidden" :name="`educations[${i}][cgpa]`" :value="ed.cgpa">
                            <input type="hidden" :name="`educations[${i}][website]`" :value="ed.website">
                            <input type="hidden" :name="`educations[${i}][city]`" :value="ed.city">
                            <input type="hidden" :name="`educations[${i}][state]`" :value="ed.state">
                            <input type="hidden" :name="`educations[${i}][country]`" :value="ed.country">
                            <input type="hidden" :name="`educations[${i}][description]`" :value="ed.description">
                        </div>
                    </template>

                    <!-- ==== Committed entries (cards) ==== -->
                    <template x-if="items.length">
                        <div class="md:col-span-2 grid grid-cols-1 lg:grid-cols-2 gap-4">
                            <template x-for="(ed, i) in items" :key="i">
                                <div class="rounded-xl border border-slate-700 bg-slate-900/50 p-4 relative">
                                    <div class="flex items-start justify-between">
                                        <div>
                                            <div class="font-semibold text-slate-100"
                                                x-text="(ed.degree_name || 'Degree') + ' — ' + (ed.institution || 'Institution')"></div>
                                            <div class="text-xs text-slate-400 mt-1">
                                                <span x-text="range(ed) || 'Dates not set'"></span>
                                                <span class="mx-2">•</span>
                                                <span x-text="loc(ed) || 'Location not set'"></span>
                                            </div>
                                        </div>
                                        <div class="flex gap-2">
                                            <button type="button" @click="edit(i)"
                                                class="px-2 h-8 rounded-lg border border-slate-700 text-slate-200 hover:bg-slate-800">Edit</button>
                                            <button type="button" @click="remove(i)"
                                                class="px-2 h-8 rounded-lg border border-rose-700 text-rose-300 hover:bg-rose-900/40">Delete</button>
                                        </div>
                                    </div>
                                    <div class="text-xs text-slate-400 mt-2" x-show="ed.focus">
                                        Focus: <span x-text="ed.focus"></span>
                                    </div>
                                    <div class="text-xs text-slate-400 mt-1" x-show="ed.cgpa">
                                        CGPA: <span x-text="ed.cgpa"></span>
                                    </div>
                                </div>
                            </template>
                        </div>
                    </template>

                    <!-- ==== Form fields (draft) ==== -->
                    <!-- Degree Name -->
                    <div>
                        <label class="block text-xs font-semibold text-slate-300 mb-2">DEGREE NAME</label>
                        <input name="edu_degree_name" x-model="form.degree_name"
                            class="w-full h-11 rounded-xl bg-slate-900/50 border border-slate-700 text-slate-100 px-3 focus:outline-none focus:ring-2 focus:ring-cyan-500"
                            placeholder="Bachelor of Technology">
                    </div>

                    <!-- Institution Name -->
                    <div>
                        <label class="block text-xs font-semibold text-slate-300 mb-2">INSTITUTION NAME</label>
                        <input name="edu_institution" x-model="form.institution"
                            class="w-full h-11 rounded-xl bg-slate-900/50 border border-slate-700 text-slate-100 px-3 focus:outline-none focus:ring-2 focus:ring-cyan-500"
                            placeholder="Indian Institute of Technology">
                    </div>

                    <!-- Academic Focus -->
                    <div class="md:col-span-2">
                        <label class="block text-xs font-semibold text-slate-300 mb-2">ACADEMIC FOCUS</label>
                        <input name="edu_focus" x-model="form.focus"
                            class="w-full h-11 rounded-xl bg-slate-900/50 border border-slate-700 text-slate-100 px-3 focus:outline-none focus:ring-2 focus:ring-cyan-500"
                            placeholder="Computer Science, Artificial Intelligence">
                    </div>

                    <!-- Start Date -->
                    <div>
                        <label class="block text-xs font-semibold text-slate-300 mb-2">START DATE</label>
                        <input type="date" name="edu_start_date" x-model="form.start_date"
                            class="w-full h-11 rounded-xl bg-slate-900/50 border border-slate-700 text-slate-100 px-3 focus:outline-none focus:ring-2 focus:ring-cyan-500">
                    </div>

                    <!-- End Date -->
                    <div>
                        <label class="block text-xs font-semibold text-slate-300 mb-2">END DATE</label>
                        <input type="date" name="edu_end_date" x-model="form.end_date"
                            class="w-full h-11 rounded-xl bg-slate-900/50 border border-slate-700 text-slate-100 px-3 focus:outline-none focus:ring-2 focus:ring-cyan-500">
                    </div>

                    <!-- Mode of Study -->
                    <div>
                        <label class="block text-xs font-semibold text-slate-300 mb-2">MODE OF STUDY</label>
                        <input name="edu_mode" x-model="form.mode"
                            class="w-full h-11 rounded-xl bg-slate-900/50 border border-slate-700 text-slate-100 px-3 focus:outline-none focus:ring-2 focus:ring-cyan-500"
                            placeholder="Full-Time / Part-Time / Online">
                    </div>

                    <!-- CGPA -->
                    <div>
                        <label class="block text-xs font-semibold text-slate-300 mb-2">CGPA</label>
                        <input name="edu_cgpa" x-model="form.cgpa"
                            class="w-full h-11 rounded-xl bg-slate-900/50 border border-slate-700 text-slate-100 px-3 focus:outline-none focus:ring-2 focus:ring-cyan-500"
                            placeholder="8.5 / 10">
                    </div>

                    <!-- Institution Website -->
                    <div class="md:col-span-2">
                        <label class="block text-xs font-semibold text-slate-300 mb-2">INSTITUTION WEBSITE</label>
                        <input type="url" name="edu_website" x-model="form.website"
                            class="w-full h-11 rounded-xl bg-slate-900/50 border border-slate-700 text-slate-100 px-3 focus:outline-none focus:ring-2 focus:ring-cyan-500"
                            placeholder="https://www.university.edu">
                    </div>

                    <!-- City -->
                    <div>
                        <label class="block text-xs font-semibold text-slate-300 mb-2">CITY</label>
                        <input name="edu_city" x-model="form.city"
                            class="w-full h-11 rounded-xl bg-slate-900/50 border border-slate-700 text-slate-100 px-3 focus:outline-none focus:ring-2 focus:ring-cyan-500"
                            placeholder="New Delhi">
                    </div>

                    <!-- State -->
                    <div>
                        <label class="block text-xs font-semibold text-slate-300 mb-2">STATE</label>
                        <input name="edu_state" x-model="form.state"
                            class="w-full h-11 rounded-xl bg-slate-900/50 border border-slate-700 text-slate-100 px-3 focus:outline-none focus:ring-2 focus:ring-cyan-500"
                            placeholder="Delhi">
                    </div>

                    <!-- Country -->
                    <div>
                        <label class="block text-xs font-semibold text-slate-300 mb-2">COUNTRY</label>
                        <input name="edu_country" x-model="form.country"
                            class="w-full h-11 rounded-xl bg-slate-900/50 border border-slate-700 text-slate-100 px-3 focus:outline-none focus:ring-2 focus:ring-cyan-500"
                            placeholder="India">
                    </div>

                    <!-- Description -->
                    <div class="md:col-span-2">
                        <label class="block text-xs font-semibold text-slate-300 mb-2">DESCRIPTION</label>
                        <textarea name="edu_description" x-model="form.description" rows="4"
                            class="w-full rounded-xl bg-slate-900/50 border border-slate-700 text-slate-100 px-3 py-2 focus:outline-none focus:ring-2 focus:ring-cyan-500"
                            placeholder="Briefly describe your coursework, projects, achievements, or thesis work..."></textarea>
                    </div>

                    <!-- Nav / Actions -->
                    <div class="md:col-span-2 flex justify-between items-center pt-2">
                        <button type="button"
                            class="px-4 h-10 rounded-xl border border-slate-700 text-slate-200 hover:bg-slate-800"
                            @click="back()">
                            Back
                        </button>

                        <div class="flex gap-3">
                            <!-- Add to Resume (commit only, stay on step) -->
                            <button type="button"
                                class="px-4 h-10 rounded-xl bg-slate-800 border border-slate-700 text-slate-100 hover:bg-slate-700"
                                @click="save()">
                                <span x-show="!isEditing">Add to Resume</span>
                                <span x-show="isEditing">Update (Stay)</span>
                            </button>

                            <button type="button"
                                x-show="isEditing"
                                @click="resetForm()"
                                class="px-4 h-10 rounded-xl border border-slate-700 text-slate-200 hover:bg-slate-800">
                                Cancel Edit
                            </button>

                            <!-- Save & Next (commit + go next) -->
                            <button type="submit"
                                class="px-5 h-10 rounded-xl bg-cyan-600 text-white font-semibold hover:bg-cyan-700"
                                x-text="isEditing ? 'Update & Next' : 'Save & Next'">
                            </button>
                        </div>
                    </div>
                </form>


                {{-- Step 4: Skills --}}
                <form x-show="step === 4"
                    x-transition.opacity
                    @submit.prevent="saveAndNext"
                    x-data="skillsStep(next, back)"
                    class="grid grid-cols-1 gap-5">

                    @csrf

                    {{-- Sections List (editable drafts) --}}
                    <template x-for="(sec, i) in sections" :key="i">
                        <div class="border border-slate-700 rounded-xl p-4">
                            <div class="flex items-start gap-3">
                                {{-- Section Title --}}
                                <div class="flex-1">
                                    <label class="block text-xs font-semibold text-slate-300 mb-2">SECTION TITLE</label>
                                    <input x-model="sec.title"
                                        class="w-full h-11 rounded-xl bg-slate-900/50 border border-slate-700 text-slate-100 px-3
                        focus:outline-none focus:ring-2 focus:ring-cyan-500"
                                        placeholder="e.g., Programming Languages, Frameworks, Databases">
                                </div>

                                {{-- Add to resume --}}
                                <div class="mt-6 flex gap-2">
                                    <button type="button"
                                        class="px-4 h-10 rounded-xl bg-cyan-600 text-white font-semibold hover:bg-cyan-700 disabled:opacity-50"
                                        :disabled="!canCommit(sec)"
                                        @click="commitOne(i)">
                                        Add to resume
                                    </button>

                                    {{-- Remove draft section (if more than one) --}}
                                    <button type="button"
                                        class="px-3 h-10 rounded-xl border border-slate-700 text-rose-300 hover:bg-slate-800"
                                        @click="removeSection(i)"
                                        x-show="sections.length > 1">
                                        Remove
                                    </button>
                                </div>
                            </div>

                            {{-- Tags (skills) --}}
                            <div class="mt-4">
                                <label class="block text-xs font-semibold text-slate-300 mb-2">SKILLS</label>

                                {{-- Current tags --}}
                                <div class="flex flex-wrap gap-2">
                                    <template x-for="(tag, j) in sec.skills" :key="j">
                                        <span class="inline-flex items-center gap-2 px-3 h-9 rounded-full bg-slate-800 text-slate-100 border border-slate-700">
                                            <span x-text="tag"></span>
                                            <button type="button"
                                                class="text-slate-300 hover:text-rose-300"
                                                @click="removeSkill(i, j)">&times;</button>
                                        </span>
                                    </template>
                                </div>

                                {{-- Add tag input --}}
                                <div class="mt-3">
                                    <input x-model="sec.temp"
                                        @keydown.enter.prevent="addSkill(i, sec.temp)"
                                        @keydown="if ($event.key === ',') { $event.preventDefault(); addSkill(i, sec.temp); }"
                                        @blur="addSkill(i, sec.temp)"
                                        class="w-full h-11 rounded-xl bg-slate-900/50 border border-slate-700 text-slate-100 px-3
                        focus:outline-none focus:ring-2 focus:ring-cyan-500"
                                        placeholder="Type a skill and press Enter (e.g., JavaScript)">
                                    <p class="text-xs text-slate-400 mt-2">
                                        Tip: Press <strong>Enter</strong> or type a comma to add a skill.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </template>

                    {{-- Add new draft section --}}
                    <div>
                        <button type="button"
                            class="px-4 h-10 rounded-xl border border-slate-700 text-slate-200 hover:bg-slate-800"
                            @click="addSection()">
                            + Add Section
                        </button>
                    </div>

                    {{-- Committed list (live from Alpine store) --}}
                    <div class="mt-2" x-show="$store.resume.skills_sections && $store.resume.skills_sections.length">
                        <h4 class="text-slate-200 font-semibold mb-2">Added Skill Sections</h4>

                        <template x-for="(S, k) in $store.resume.skills_sections" :key="'skill-sec-'+k">
                            <div class="flex items-start justify-between gap-3 border border-slate-700 rounded-xl p-3 mb-2">
                                <div class="flex-1">
                                    <div class="font-semibold" x-text="S.title || 'Skills'"></div>
                                    <div class="tags mt-1">
                                        <template x-for="(sk, j) in (S.skills || [])" :key="j">
                                            <span class="tag" x-text="sk"></span>
                                        </template>
                                        <span class="text-xs text-slate-400" x-show="!(S.skills||[]).length">No skills</span>
                                    </div>
                                </div>
                                <div class="flex gap-2">
                                    <button type="button"
                                        class="px-3 h-9 rounded-xl border border-slate-700 text-slate-200 hover:bg-slate-800"
                                        @click="editCommitted(k)">Edit</button>
                                    <button type="button"
                                        class="px-3 h-9 rounded-xl border border-slate-700 text-rose-300 hover:bg-slate-800"
                                        @click="removeCommitted(k)">Remove</button>
                                </div>
                            </div>
                        </template>
                    </div>

                    {{-- Navigation --}}
                    <div class="flex justify-end gap-3 pt-2">
                        <button type="button"
                            class="px-4 h-10 rounded-xl border border-slate-700 text-slate-200 hover:bg-slate-800"
                            @click="back">
                            Back
                        </button>
                        <button type="submit"
                            class="px-5 h-10 rounded-xl bg-cyan-600 text-white font-semibold hover:bg-cyan-700">
                            Save & Next
                        </button>
                    </div>
                </form>

                {{-- Step 5: Projects --}}
                <form x-show="step === 5"
                    x-data="projectsStep(next, back)"
                    x-transition.opacity
                    @submit.prevent="saveAndNext"
                    class="grid grid-cols-1 md:grid-cols-2 gap-5">
                    @csrf

                    {{-- HEADER --}}
                    <div class="md:col-span-2 flex items-center justify-between">
                        <div>
                            <h3 class="text-slate-100 text-lg font-semibold">Projects</h3>
                            <p class="text-slate-400 text-sm">Fill the form and click <b>Add to Resume</b>. Your projects will list below.</p>
                        </div>
                        <div>
                            <button type="button"
                                class="px-4 h-10 rounded-xl bg-slate-800 border border-slate-700 text-slate-200 hover:bg-slate-700"
                                @click="addMore"
                                x-show="!showForm">
                                + Add more project
                            </button>
                        </div>
                    </div>

                    {{-- FORM (togglable) --}}
                    <template x-if="showForm">
                        <div class="md:col-span-2 grid grid-cols-1 md:grid-cols-2 gap-5">
                            {{-- Project Name --}}
                            <div>
                                <label class="block text-xs font-semibold text-slate-300 mb-2">PROJECT NAME</label>
                                <input x-model="form.name"
                                    class="w-full h-11 rounded-xl bg-slate-900/50 border border-slate-700 text-slate-100 px-3 focus:outline-none focus:ring-2 focus:ring-cyan-500"
                                    placeholder="AliveHire – AI Hiring Platform">
                            </div>

                            {{-- Meta Line --}}
                            <div>
                                <label class="block text-xs font-semibold text-slate-300 mb-2">META LINE</label>
                                <input x-model="form.meta_line"
                                    class="w-full h-11 rounded-xl bg-slate-900/50 border border-slate-700 text-slate-100 px-3 focus:outline-none focus:ring-2 focus:ring-cyan-500"
                                    placeholder="Brief tagline (e.g., End-to-end AI hiring workflow)">
                            </div>

                            {{-- Tech Stack --}}
                            <div class="md:col-span-2">
                                <label class="block text-xs font-semibold text-slate-300 mb-2">TECH STACK</label>
                                <input x-model="form.tech_stack"
                                    class="w-full h-11 rounded-xl bg-slate-900/50 border border-slate-700 text-slate-100 px-3 focus:outline-none focus:ring-2 focus:ring-cyan-500"
                                    placeholder="Laravel, React, Node.js, MongoDB, TailwindCSS, OpenAI API">
                            </div>

                            {{-- Start Date --}}
                            <div>
                                <label class="block text-xs font-semibold text-slate-300 mb-2">START DATE</label>
                                <input type="date" x-model="form.start_date"
                                    class="w-full h-11 rounded-xl bg-slate-900/50 border border-slate-700 text-slate-100 px-3 focus:outline-none focus:ring-2 focus:ring-cyan-500">
                            </div>

                            {{-- End Date --}}
                            <div>
                                <label class="block text-xs font-semibold text-slate-300 mb-2">END DATE</label>
                                <input type="date" x-model="form.end_date"
                                    class="w-full h-11 rounded-xl bg-slate-900/50 border border-slate-700 text-slate-100 px-3 focus:outline-none focus:ring-2 focus:ring-cyan-500">
                            </div>

                            {{-- Project Type --}}
                            <div>
                                <label class="block text-xs font-semibold text-slate-300 mb-2">PROJECT TYPE</label>
                                <input x-model="form.project_type"
                                    class="w-full h-11 rounded-xl bg-slate-900/50 border border-slate-700 text-slate-100 px-3 focus:outline-none focus:ring-2 focus:ring-cyan-500"
                                    placeholder="Personal / Client / Open Source / Academic">
                            </div>

                            {{-- Live Link --}}
                            <div>
                                <label class="block text-xs font-semibold text-slate-300 mb-2">LIVE LINK</label>
                                <input type="url" x-model="form.live_link"
                                    class="w-full h-11 rounded-xl bg-slate-900/50 border border-slate-700 text-slate-100 px-3 focus:outline-none focus:ring-2 focus:ring-cyan-500"
                                    placeholder="https://project-live-url.com">
                            </div>

                            {{-- Code Link --}}
                            <div class="md:col-span-2">
                                <label class="block text-xs font-semibold text-slate-300 mb-2">CODE LINK</label>
                                <input type="url" x-model="form.code_link"
                                    class="w-full h-11 rounded-xl bg-slate-900/50 border border-slate-700 text-slate-100 px-3 focus:outline-none focus:ring-2 focus:ring-cyan-500"
                                    placeholder="https://github.com/username/repo">
                            </div>

                            {{-- Description --}}
                            <div class="md:col-span-2">
                                <label class="block text-xs font-semibold text-slate-300 mb-2">DESCRIPTION</label>
                                <textarea rows="4" x-model="form.description"
                                    class="w-full rounded-xl bg-slate-900/50 border border-slate-700 text-slate-100 px-3 py-2 focus:outline-none focus:ring-2 focus:ring-cyan-500"
                                    placeholder="Explain problem, your role, features, architecture, metrics/impact..."></textarea>
                            </div>

                            {{-- Inline actions --}}
                            <div class="md:col-span-2 flex justify-between gap-3 pt-2">
                                <div class="flex gap-3">
                                    <button type="button"
                                        class="px-4 h-10 rounded-xl bg-emerald-600 text-white font-semibold hover:bg-emerald-700"
                                        @click="addToResume">
                                        Add to Resume
                                    </button>
                                    <button type="button"
                                        class="px-4 h-10 rounded-xl border border-slate-700 text-slate-200 hover:bg-slate-800"
                                        @click="resetForm">
                                        Clear
                                    </button>
                                </div>
                                <div class="flex gap-3">
                                    <button type="button"
                                        class="px-4 h-10 rounded-xl border border-slate-700 text-slate-200 hover:bg-slate-800"
                                        @click="back">
                                        Back
                                    </button>
                                    <button type="submit"
                                        class="px-5 h-10 rounded-xl bg-cyan-600 text-white font-semibold hover:bg-cyan-700">
                                        Save & Next
                                    </button>
                                </div>
                            </div>
                        </div>
                    </template>

                    {{-- LIST (always visible; form hides after add/update) --}}
                    <div class="md:col-span-2">
                        <template x-if="items.length === 0">
                            <div class="text-sm text-slate-400">No projects added yet.</div>
                        </template>

                        <template x-for="(p, i) in items" :key="i">
                            <div class="mt-4 border border-slate-700 rounded-xl p-4 bg-slate-900/40">
                                <div class="flex items-start justify-between">
                                    <div>
                                        <div class="font-semibold text-slate-100"
                                            x-text="(p.name || 'Project') + (p.project_type ? ' | ' + p.project_type : '')"></div>
                                        <div class="text-xs text-slate-400 mt-1"
                                            x-text="(p.start_date || '—') + ' — ' + (p.end_date || 'Present')"></div>
                                        <div class="text-xs text-slate-400" x-show="p.meta_line" x-text="p.meta_line"></div>
                                        <div class="text-xs text-slate-500 mt-1" x-show="p.tech_stack" x-text="p.tech_stack"></div>
                                    </div>
                                    <div class="flex gap-2">
                                        <button type="button"
                                            class="px-3 h-8 rounded-lg border border-slate-700 text-slate-200 hover:bg-slate-800"
                                            @click="edit(i)">
                                            Edit
                                        </button>
                                        <button type="button"
                                            class="px-3 h-8 rounded-lg bg-rose-600 text-white hover:bg-rose-700"
                                            @click="remove(i)">
                                            Remove
                                        </button>
                                    </div>
                                </div>

                                <div class="text-sm text-slate-200 mt-3 whitespace-pre-line" x-show="p.description"
                                    x-text="p.description"></div>

                                <div class="text-xs mt-2 flex gap-4">
                                    <template x-if="p.live_link">
                                        <a :href="p.live_link" target="_blank" class="text-cyan-400 hover:underline">Live</a>
                                    </template>
                                    <template x-if="p.code_link">
                                        <a :href="p.code_link" target="_blank" class="text-cyan-400 hover:underline">Code</a>
                                    </template>
                                </div>
                            </div>
                        </template>

                        {{-- "Add more" when form hidden --}}
                        <div class="mt-4" x-show="!showForm">
                            <button type="button"
                                class="px-4 h-10 rounded-xl bg-slate-800 border border-slate-700 text-slate-200 hover:bg-slate-700"
                                @click="addMore">
                                + Add more project
                            </button>
                        </div>
                    </div>
                </form>

                {{-- Step 6: Certifications --}}
                <form x-show="step === 6"
                    x-transition.opacity
                    x-data="certificationsStep(next, back)"
                    @submit.prevent="saveAndNext"
                    class="grid grid-cols-1 md:grid-cols-2 gap-5">
                    @csrf

                    {{-- HEADER --}}
                    <div class="md:col-span-2 flex items-center justify-between">
                        <div>
                            <h3 class="text-slate-100 text-lg font-semibold">Certifications</h3>
                            <p class="text-slate-400 text-sm">Fill the form and click <b>Add to Resume</b>. Your certifications will list below.</p>
                        </div>
                        <div>
                            <button type="button"
                                class="px-4 h-10 rounded-xl bg-slate-800 border border-slate-700 text-slate-200 hover:bg-slate-700"
                                @click="addMore"
                                x-show="!showForm">
                                + Add more certification
                            </button>
                        </div>
                    </div>

                    {{-- FORM (togglable) --}}
                    <template x-if="showForm">
                        <div class="md:col-span-2 grid grid-cols-1 md:grid-cols-2 gap-5">
                            {{-- Certification Name --}}
                            <div>
                                <label class="block text-xs font-semibold text-slate-300 mb-2">CERTIFICATION NAME</label>
                                <input x-model="form.name"
                                    class="w-full h-11 rounded-xl bg-slate-900/50 border border-slate-700 text-slate-100 px-3 focus:outline-none focus:ring-2 focus:ring-cyan-500"
                                    placeholder="e.g., AWS Certified Solutions Architect – Associate">
                            </div>

                            {{-- Issuing Organization --}}
                            <div>
                                <label class="block text-xs font-semibold text-slate-300 mb-2">ISSUING ORGANIZATION</label>
                                <input x-model="form.issuer"
                                    class="w-full h-11 rounded-xl bg-slate-900/50 border border-slate-700 text-slate-100 px-3 focus:outline-none focus:ring-2 focus:ring-cyan-500"
                                    placeholder="e.g., Amazon Web Services">
                            </div>

                            {{-- Skills Covered (tags) --}}
                            <div class="md:col-span-2">
                                <label class="block text-xs font-semibold text-slate-300 mb-2">SKILLS COVERED</label>

                                {{-- Current tags --}}
                                <div class="flex flex-wrap gap-2 mb-3">
                                    <template x-for="(tag, i) in form.skills_covered" :key="i">
                                        <span class="inline-flex items-center gap-2 px-3 h-9 rounded-full bg-slate-800 text-slate-100 border border-slate-700">
                                            <span x-text="tag"></span>
                                            <button type="button" class="text-slate-300 hover:text-rose-300" @click="removeTag(i)">&times;</button>
                                        </span>
                                    </template>
                                </div>

                                {{-- Add skill input --}}
                                <input x-model="tempSkill"
                                    @keydown.enter.prevent="addTag()"
                                    @keydown="if ($event.key === ',') { $event.preventDefault(); addTag(); }"
                                    @blur="addTag()"
                                    class="w-full h-11 rounded-xl bg-slate-900/50 border border-slate-700 text-slate-100 px-3 focus:outline-none focus:ring-2 focus:ring-cyan-500"
                                    placeholder="Type a skill and press Enter (e.g., VPC, IAM, EC2)">
                                <p class="text-xs text-slate-400 mt-2">Tip: Press <strong>Enter</strong> or type a comma to add a skill.</p>
                            </div>

                            {{-- Meta Line --}}
                            <div class="md:col-span-2">
                                <label class="block text-xs font-semibold text-slate-300 mb-2">META LINE</label>
                                <input x-model="form.meta_line"
                                    class="w-full h-11 rounded-xl bg-slate-900/50 border border-slate-700 text-slate-100 px-3 focus:outline-none focus:ring-2 focus:ring-cyan-500"
                                    placeholder="Short highlight (e.g., Validates core AWS architecture & deployment skills)">
                            </div>

                            {{-- Start / End Date --}}
                            <div>
                                <label class="block text-xs font-semibold text-slate-300 mb-2">START DATE</label>
                                <input type="date" x-model="form.start_date"
                                    class="w-full h-11 rounded-xl bg-slate-900/50 border border-slate-700 text-slate-100 px-3 focus:outline-none focus:ring-2 focus:ring-cyan-500">
                            </div>
                            <div>
                                <label class="block text-xs font-semibold text-slate-300 mb-2">END DATE</label>
                                <input type="date" x-model="form.end_date"
                                    class="w-full h-11 rounded-xl bg-slate-900/50 border border-slate-700 text-slate-100 px-3 focus:outline-none focus:ring-2 focus:ring-cyan-500">
                            </div>

                            {{-- Issue / Verify URL --}}
                            <div>
                                <label class="block text-xs font-semibold text-slate-300 mb-2">ISSUE / VERIFY URL</label>
                                <input type="url" x-model="form.verify_url"
                                    class="w-full h-11 rounded-xl bg-slate-900/50 border border-slate-700 text-slate-100 px-3 focus:outline-none focus:ring-2 focus:ring-cyan-500"
                                    placeholder="https://issuer.com/verify/ABC123">
                            </div>

                            {{-- Certification Link (certificate page/file) --}}
                            <div>
                                <label class="block text-xs font-semibold text-slate-300 mb-2">CERTIFICATION LINK</label>
                                <input type="url" x-model="form.cert_url"
                                    class="w-full h-11 rounded-xl bg-slate-900/50 border border-slate-700 text-slate-100 px-3 focus:outline-none focus:ring-2 focus:ring-cyan-500"
                                    placeholder="https://your-certificate-link.com">
                            </div>

                            {{-- City / State / Country --}}
                            <div>
                                <label class="block text-xs font-semibold text-slate-300 mb-2">CITY</label>
                                <input x-model="form.city"
                                    class="w-full h-11 rounded-xl bg-slate-900/50 border border-slate-700 text-slate-100 px-3 focus:outline-none focus:ring-2 focus:ring-cyan-500"
                                    placeholder="New Delhi">
                            </div>
                            <div>
                                <label class="block text-xs font-semibold text-slate-300 mb-2">STATE</label>
                                <input x-model="form.state"
                                    class="w-full h-11 rounded-xl bg-slate-900/50 border border-slate-700 text-slate-100 px-3 focus:outline-none focus:ring-2 focus:ring-cyan-500"
                                    placeholder="Delhi">
                            </div>
                            <div>
                                <label class="block text-xs font-semibold text-slate-300 mb-2">COUNTRY</label>
                                <input x-model="form.country"
                                    class="w-full h-11 rounded-xl bg-slate-900/50 border border-slate-700 text-slate-100 px-3 focus:outline-none focus:ring-2 focus:ring-cyan-500"
                                    placeholder="India">
                            </div>

                            {{-- Description --}}
                            <div class="md:col-span-2">
                                <label class="block text-xs font-semibold text-slate-300 mb-2">DESCRIPTION</label>
                                <textarea rows="4" x-model="form.description"
                                    class="w-full rounded-xl bg-slate-900/50 border border-slate-700 text-slate-100 px-3 py-2 focus:outline-none focus:ring-2 focus:ring-cyan-500"
                                    placeholder="Details about the certification, covered modules, assessment, and relevance."></textarea>
                            </div>

                            {{-- Inline actions --}}
                            <div class="md:col-span-2 flex justify-between gap-3 pt-2">
                                <div class="flex gap-3">
                                    <button type="button"
                                        class="px-4 h-10 rounded-xl bg-emerald-600 text-white font-semibold hover:bg-emerald-700"
                                        @click="addToResume">
                                        Add to Resume
                                    </button>
                                    <button type="button"
                                        class="px-4 h-10 rounded-xl border border-slate-700 text-slate-200 hover:bg-slate-800"
                                        @click="resetForm">
                                        Clear
                                    </button>
                                </div>
                                <div class="flex gap-3">
                                    <button type="button"
                                        class="px-4 h-10 rounded-xl border border-slate-700 text-slate-200 hover:bg-slate-800"
                                        @click="back">
                                        Back
                                    </button>
                                    <button type="submit"
                                        class="px-5 h-10 rounded-xl bg-cyan-600 text-white font-semibold hover:bg-cyan-700">
                                        Save & Next
                                    </button>
                                </div>
                            </div>
                        </div>
                    </template>

                    {{-- LIST (always visible; form hides after add/update) --}}
                    <div class="md:col-span-2">
                        <template x-if="items.length === 0">
                            <div class="text-sm text-slate-400">No certifications added yet.</div>
                        </template>

                        <template x-for="(c, i) in items" :key="i">
                            <div class="mt-4 border border-slate-700 rounded-xl p-4 bg-slate-900/40">
                                <div class="flex items-start justify-between">
                                    <div>
                                        <div class="font-semibold text-slate-100"
                                            x-text="(c.name || 'Certification') + (c.issuer ? ' | ' + c.issuer : '')"></div>
                                        <div class="text-xs text-slate-400 mt-1"
                                            x-text="(c.start_date || '—') + ' — ' + (c.end_date || 'Present')"></div>
                                        <div class="text-xs text-slate-400" x-show="c.meta_line" x-text="c.meta_line"></div>
                                        <div class="flex flex-wrap gap-2 mt-2" x-show="(c.skills_covered||[]).length">
                                            <template x-for="(tag, j) in c.skills_covered" :key="j">
                                                <span class="inline-flex items-center px-2.5 h-7 rounded-full bg-slate-800 text-slate-100 border border-slate-700 text-xs" x-text="tag"></span>
                                            </template>
                                        </div>
                                        <div class="text-xs text-slate-500 mt-1"
                                            x-text="[c.city, c.state, c.country].filter(Boolean).join(', ')"></div>
                                    </div>
                                    <div class="flex gap-2">
                                        <button type="button"
                                            class="px-3 h-8 rounded-lg border border-slate-700 text-slate-200 hover:bg-slate-800"
                                            @click="edit(i)">
                                            Edit
                                        </button>
                                        <button type="button"
                                            class="px-3 h-8 rounded-lg bg-rose-600 text-white hover:bg-rose-700"
                                            @click="remove(i)">
                                            Remove
                                        </button>
                                    </div>
                                </div>

                                <div class="text-sm text-slate-200 mt-3 whitespace-pre-line" x-show="c.description"
                                    x-text="c.description"></div>

                                <div class="text-xs mt-2 flex gap-4">
                                    <template x-if="c.verify_url">
                                        <a :href="c.verify_url" target="_blank" class="text-cyan-400 hover:underline">Verify</a>
                                    </template>
                                    <template x-if="c.cert_url">
                                        <a :href="c.cert_url" target="_blank" class="text-cyan-400 hover:underline">Certificate</a>
                                    </template>
                                </div>
                            </div>
                        </template>

                        {{-- "Add more" when form hidden --}}
                        <div class="mt-4" x-show="!showForm">
                            <button type="button"
                                class="px-4 h-10 rounded-xl bg-slate-800 border border-slate-700 text-slate-200 hover:bg-slate-700"
                                @click="addMore">
                                + Add more certification
                            </button>
                        </div>
                    </div>
                </form>

                {{-- Step 7: Volunteer --}}
                <form x-show="step === 7"
                    x-transition.opacity
                    x-data="volunteerStep(next, back)"
                    @submit.prevent="saveAndNext"
                    class="grid grid-cols-1 md:grid-cols-2 gap-5">
                    @csrf

                    {{-- Header + Add more --}}
                    <div class="md:col-span-2 flex items-center justify-between">
                        <div>
                            <h3 class="text-slate-100 text-lg font-semibold">Volunteer</h3>
                            <p class="text-slate-400 text-sm">Fill form and click <b>Add to Resume</b>. Added items appear below.</p>
                        </div>
                        <button type="button"
                            class="px-4 h-10 rounded-xl bg-slate-800 border border-slate-700 text-slate-200 hover:bg-slate-700"
                            x-show="!showForm"
                            @click="addMore">
                            + Add more volunteer
                        </button>
                    </div>

                    {{-- FORM (toggle) --}}
                    <template x-if="showForm">
                        <div class="md:col-span-2 grid grid-cols-1 md:grid-cols-2 gap-5">
                            {{-- Role --}}
                            <div>
                                <label class="block text-xs font-semibold text-slate-300 mb-2">ROLE</label>
                                <input x-model="form.role" class="w-full h-11 rounded-xl bg-slate-900/50 border border-slate-700
          text-slate-100 px-3 focus:outline-none focus:ring-2 focus:ring-cyan-500" placeholder="Role">
                            </div>

                            {{-- Organization Name --}}
                            <div>
                                <label class="block text-xs font-semibold text-slate-300 mb-2">ORGANIZATION NAME</label>
                                <input x-model="form.org_name" class="w-full h-11 rounded-xl bg-slate-900/50 border border-slate-700
          text-slate-100 px-3 focus:outline-none focus:ring-2 focus:ring-cyan-500" placeholder="Organization Name">
                            </div>

                            {{-- Start/End Date --}}
                            <div>
                                <label class="block text-xs font-semibold text-slate-300 mb-2">START DATE</label>
                                <input type="date" x-model="form.start_date" class="w-full h-11 rounded-xl bg-slate-900/50 border border-slate-700
          text-slate-100 px-3 focus:outline-none focus:ring-2 focus:ring-cyan-500">
                            </div>
                            <div>
                                <label class="block text-xs font-semibold text-slate-300 mb-2">END DATE</label>
                                <input type="date" x-model="form.end_date" class="w-full h-11 rounded-xl bg-slate-900/50 border border-slate-700
          text-slate-100 px-3 focus:outline-none focus:ring-2 focus:ring-cyan-500">
                            </div>

                            {{-- Type / URL --}}
                            <div>
                                <label class="block text-xs font-semibold text-slate-300 mb-2">VOLUNTEER TYPE</label>
                                <input x-model="form.volunteer_type" class="w-full h-11 rounded-xl bg-slate-900/50 border border-slate-700
          text-slate-100 px-3 focus:outline-none focus:ring-2 focus:ring-cyan-500" placeholder="e.g., NGO, Event, Remote">
                            </div>
                            <div>
                                <label class="block text-xs font-semibold text-slate-300 mb-2">ORGANIZATION URL</label>
                                <input type="url" x-model="form.org_url" class="w-full h-11 rounded-xl bg-slate-900/50 border border-slate-700
          text-slate-100 px-3 focus:outline-none focus:ring-2 focus:ring-cyan-500" placeholder="https://organization.com">
                            </div>

                            {{-- Meta line --}}
                            <div class="md:col-span-2">
                                <label class="block text-xs font-semibold text-slate-300 mb-2">META LINE</label>
                                <input x-model="form.meta_line" class="w-full h-11 rounded-xl bg-slate-900/50 border border-slate-700
          text-slate-100 px-3 focus:outline-none focus:ring-2 focus:ring-cyan-500"
                                    placeholder="Short highlight (e.g., Coordinated 50+ volunteers for health camp)">
                            </div>

                            {{-- Description --}}
                            <div class="md:col-span-2">
                                <label class="block text-xs font-semibold text-slate-300 mb-2">DESCRIPTION</label>
                                <textarea rows="3" x-model="form.description" class="w-full rounded-xl bg-slate-900/50 border border-slate-700
          text-slate-100 px-3 py-2 focus:outline-none focus:ring-2 focus:ring-cyan-500"
                                    placeholder="Briefly describe your volunteer work..."></textarea>
                            </div>

                            {{-- City/State/Country --}}
                            <div>
                                <label class="block text-xs font-semibold text-slate-300 mb-2">CITY</label>
                                <input x-model="form.city" class="w-full h-11 rounded-xl bg-slate-900/50 border border-slate-700
          text-slate-100 px-3 focus:outline-none focus:ring-2 focus:ring-cyan-500" placeholder="City">
                            </div>
                            <div>
                                <label class="block text-xs font-semibold text-slate-300 mb-2">STATE</label>
                                <input x-model="form.state" class="w-full h-11 rounded-xl bg-slate-900/50 border border-slate-700
          text-slate-100 px-3 focus:outline-none focus:ring-2 focus:ring-cyan-500" placeholder="State">
                            </div>
                            <div class="md:col-span-2">
                                <label class="block text-xs font-semibold text-slate-300 mb-2">COUNTRY</label>
                                <input x-model="form.country" class="w-full h-11 rounded-xl bg-slate-900/50 border border-slate-700
          text-slate-100 px-3 focus:outline-none focus:ring-2 focus:ring-cyan-500" placeholder="Country">
                            </div>

                            {{-- Actions --}}
                            <div class="md:col-span-2 flex justify-between gap-3 pt-2">
                                <div class="flex gap-3">
                                    <button type="button" class="px-4 h-10 rounded-xl bg-emerald-600 text-white font-semibold hover:bg-emerald-700"
                                        @click="addToResume">Add to Resume</button>
                                    <button type="button" class="px-4 h-10 rounded-xl border border-slate-700 text-slate-200 hover:bg-slate-800"
                                        @click="resetForm">Clear</button>
                                </div>
                                <div class="flex gap-3">
                                    <button type="button" class="px-4 h-10 rounded-xl border border-slate-700 text-slate-200 hover:bg-slate-800"
                                        @click="back">Back</button>
                                    <button type="submit" class="px-5 h-10 rounded-xl bg-cyan-600 text-white font-semibold hover:bg-cyan-700">
                                        Save & Next
                                    </button>
                                </div>
                            </div>
                        </div>
                    </template>

                    {{-- LIST --}}
                    <div class="md:col-span-2">
                        <template x-if="items.length === 0">
                            <div class="text-sm text-slate-400">No volunteer work added yet.</div>
                        </template>

                        <template x-for="(v, i) in items" :key="i">
                            <div class="mt-4 border border-slate-700 rounded-xl p-4 bg-slate-900/40">
                                <div class="flex items-start justify-between">
                                    <div>
                                        <div class="font-semibold text-slate-100"
                                            x-text="(v.org_name || 'Organization') + (v.role ? ' | ' + v.role : '')"></div>
                                        <div class="text-xs text-slate-400 mt-1"
                                            x-text="(v.start_date || '—') + ' — ' + (v.end_date || 'Present')"></div>
                                        <div class="text-xs text-slate-400" x-show="v.meta_line" x-text="v.meta_line"></div>
                                        <div class="text-xs text-slate-500" x-show="v.volunteer_type" x-text="v.volunteer_type"></div>
                                        <div class="text-xs text-slate-500 mt-1"
                                            x-text="[v.city, v.state, v.country].filter(Boolean).join(', ')"></div>
                                    </div>
                                    <div class="flex gap-2">
                                        <button type="button" class="px-3 h-8 rounded-lg border border-slate-700 text-slate-200 hover:bg-slate-800"
                                            @click="edit(i)">Edit</button>
                                        <button type="button" class="px-3 h-8 rounded-lg bg-rose-600 text-white hover:bg-rose-700"
                                            @click="remove(i)">Remove</button>
                                    </div>
                                </div>

                                <div class="text-sm text-slate-200 mt-3 whitespace-pre-line" x-show="v.description" x-text="v.description"></div>

                                <div class="text-xs mt-2" x-show="v.org_url">
                                    <a :href="v.org_url" target="_blank" class="text-cyan-400 hover:underline">Org Link</a>
                                </div>
                            </div>
                        </template>

                        <div class="mt-4" x-show="!showForm">
                            <button type="button" class="px-4 h-10 rounded-xl bg-slate-800 border border-slate-700 text-slate-200 hover:bg-slate-700"
                                @click="addMore">+ Add more volunteer</button>
                        </div>
                    </div>
                </form>
                {{-- Step 8: Awards --}}
                <form x-show="step === 8"
                    x-transition.opacity
                    x-data="awardsStep(next, back)"
                    @submit.prevent="saveAndNext"
                    class="grid grid-cols-1 md:grid-cols-2 gap-5">
                    @csrf

                    <div class="md:col-span-2 flex items-center justify-between">
                        <div>
                            <h3 class="text-slate-100 text-lg font-semibold">Awards</h3>
                            <p class="text-slate-400 text-sm">Add awards to resume; they’ll list below with edit/remove.</p>
                        </div>
                        <button type="button" class="px-4 h-10 rounded-xl bg-slate-800 border border-slate-700 text-slate-200 hover:bg-slate-700"
                            x-show="!showForm" @click="addMore">+ Add more award</button>
                    </div>

                    <template x-if="showForm">
                        <div class="md:col-span-2 grid grid-cols-1 md:grid-cols-2 gap-5">
                            {{-- Title / Organization --}}
                            <div>
                                <label class="block text-xs font-semibold text-slate-300 mb-2">AWARD TITLE</label>
                                <input x-model="form.title" class="w-full h-11 rounded-xl bg-slate-900/50 border border-slate-700
          text-slate-100 px-3 focus:outline-none focus:ring-2 focus:ring-cyan-500" placeholder="e.g., Best Innovator Award">
                            </div>
                            <div>
                                <label class="block text-xs font-semibold text-slate-300 mb-2">AWARD ORGANIZATION</label>
                                <input x-model="form.organization" class="w-full h-11 rounded-xl bg-slate-900/50 border border-slate-700
          text-slate-100 px-3 focus:outline-none focus:ring-2 focus:ring-cyan-500" placeholder="e.g., TechConf 2024">
                            </div>

                            {{-- Meta line (full) --}}
                            <div class="md:col-span-2">
                                <label class="block text-xs font-semibold text-slate-300 mb-2">META LINE</label>
                                <input x-model="form.meta_line" class="w-full h-11 rounded-xl bg-slate-900/50 border border-slate-700
          text-slate-100 px-3 focus:outline-none focus:ring-2 focus:ring-cyan-500"
                                    placeholder="Short highlight (e.g., Recognized for ML model improving hiring accuracy by 28%)">
                            </div>

                            {{-- Date / Links --}}
                            <div>
                                <label class="block text-xs font-semibold text-slate-300 mb-2">AWARD DATE</label>
                                <input type="date" x-model="form.award_date" class="w-full h-11 rounded-xl bg-slate-900/50 border border-slate-700
          text-slate-100 px-3 focus:outline-none focus:ring-2 focus:ring-cyan-500">
                            </div>
                            <div>
                                <label class="block text-xs font-semibold text-slate-300 mb-2">AWARD LINK</label>
                                <input type="url" x-model="form.award_link" class="w-full h-11 rounded-xl bg-slate-900/50 border border-slate-700
          text-slate-100 px-3 focus:outline-none focus:ring-2 focus:ring-cyan-500" placeholder="https://event.com/awards/your-award">
                            </div>

                            {{-- Associated work / Verify --}}
                            <div>
                                <label class="block text-xs font-semibold text-slate-300 mb-2">ASSOCIATED WORK</label>
                                <input x-model="form.associated_work" class="w-full h-11 rounded-xl bg-slate-900/50 border border-slate-700
          text-slate-100 px-3 focus:outline-none focus:ring-2 focus:ring-cyan-500" placeholder="Project / Publication / Role">
                            </div>
                            <div>
                                <label class="block text-xs font-semibold text-slate-300 mb-2">VERIFICATION LINK</label>
                                <input type="url" x-model="form.verify_link" class="w-full h-11 rounded-xl bg-slate-900/50 border border-slate-700
          text-slate-100 px-3 focus:outline-none focus:ring-2 focus:ring-cyan-500" placeholder="https://verify.com/ABC123">
                            </div>

                            {{-- Description --}}
                            <div class="md:col-span-2">
                                <label class="block text-xs font-semibold text-slate-300 mb-2">DESCRIPTION</label>
                                <textarea rows="3" x-model="form.description" class="w-full rounded-xl bg-slate-900/50 border border-slate-700
          text-slate-100 px-3 py-2 focus:outline-none focus:ring-2 focus:ring-cyan-500"
                                    placeholder="Context, selection criteria, impact, and key contributions..."></textarea>
                            </div>

                            {{-- Actions --}}
                            <div class="md:col-span-2 flex justify-between gap-3 pt-2">
                                <div class="flex gap-3">
                                    <button type="button" class="px-4 h-10 rounded-xl bg-emerald-600 text-white font-semibold hover:bg-emerald-700"
                                        @click="addToResume">Add to Resume</button>
                                    <button type="button" class="px-4 h-10 rounded-xl border border-slate-700 text-slate-200 hover:bg-slate-800"
                                        @click="resetForm">Clear</button>
                                </div>
                                <div class="flex gap-3">
                                    <button type="button" class="px-4 h-10 rounded-xl border border-slate-700 text-slate-200 hover:bg-slate-800"
                                        @click="back">Back</button>
                                    <button type="submit" class="px-5 h-10 rounded-xl bg-cyan-600 text-white font-semibold hover:bg-cyan-700">
                                        Save & Next
                                    </button>
                                </div>
                            </div>
                        </div>
                    </template>

                    {{-- LIST --}}
                    <div class="md:col-span-2">
                        <template x-if="items.length === 0">
                            <div class="text-sm text-slate-400">No awards added yet.</div>
                        </template>

                        <template x-for="(a, i) in items" :key="i">
                            <div class="mt-4 border border-slate-700 rounded-xl p-4 bg-slate-900/40">
                                <div class="flex items-start justify-between">
                                    <div>
                                        <div class="font-semibold text-slate-100"
                                            x-text="(a.title || 'Award') + (a.organization ? ' | ' + a.organization : '')"></div>
                                        <div class="text-xs text-slate-400 mt-1" x-text="a.award_date || ''"></div>
                                        <div class="text-xs text-slate-400" x-show="a.meta_line" x-text="a.meta_line"></div>
                                        <div class="text-xs text-slate-500" x-show="a.associated_work" x-text="a.associated_work"></div>
                                    </div>
                                    <div class="flex gap-2">
                                        <button type="button" class="px-3 h-8 rounded-lg border border-slate-700 text-slate-200 hover:bg-slate-800"
                                            @click="edit(i)">Edit</button>
                                        <button type="button" class="px-3 h-8 rounded-lg bg-rose-600 text-white hover:bg-rose-700"
                                            @click="remove(i)">Remove</button>
                                    </div>
                                </div>

                                <div class="text-sm text-slate-200 mt-3 whitespace-pre-line" x-show="a.description" x-text="a.description"></div>

                                <div class="text-xs mt-2 flex gap-4">
                                    <template x-if="a.award_link">
                                        <a :href="a.award_link" target="_blank" class="text-cyan-400 hover:underline">Award</a>
                                    </template>
                                    <template x-if="a.verify_link">
                                        <a :href="a.verify_link" target="_blank" class="text-cyan-400 hover:underline">Verify</a>
                                    </template>
                                </div>
                            </div>
                        </template>

                        <div class="mt-4" x-show="!showForm">
                            <button type="button" class="px-4 h-10 rounded-xl bg-slate-800 border border-slate-700 text-slate-200 hover:bg-slate-700"
                                @click="addMore">+ Add more award</button>
                        </div>
                    </div>
                </form>
                {{-- Step 9: Publications --}}
                <form x-show="step === 9"
                    x-transition.opacity
                    x-data="publicationsStep(next, back)"
                    @submit.prevent="saveAndNext"
                    class="grid grid-cols-1 md:grid-cols-2 gap-5">
                    @csrf

                    <div class="md:col-span-2 flex items-center justify-between">
                        <div>
                            <h3 class="text-slate-100 text-lg font-semibold">Publications</h3>
                            <p class="text-slate-400 text-sm">Use <b>Add to Resume</b> to add, then edit/remove below.</p>
                        </div>
                        <button type="button" class="px-4 h-10 rounded-xl bg-slate-800 border border-slate-700 text-slate-200 hover:bg-slate-700"
                            x-show="!showForm" @click="addMore">+ Add more publication</button>
                    </div>

                    <template x-if="showForm">
                        <div class="md:col-span-2 grid grid-cols-1 md:grid-cols-2 gap-5">
                            {{-- Title (full) --}}
                            <div class="md:col-span-2">
                                <label class="block text-xs font-semibold text-slate-300 mb-2">TITLE</label>
                                <input x-model="form.title" class="w-full h-11 rounded-xl bg-slate-900/50 border border-slate-700
          text-slate-100 px-3 focus:outline-none focus:ring-2 focus:ring-cyan-500"
                                    placeholder="e.g., Efficient Transformers for Resume Parsing">
                            </div>

                            {{-- Type / Authors --}}
                            <div>
                                <label class="block text-xs font-semibold text-slate-300 mb-2">PUBLICATION TYPE</label>
                                <input x-model="form.publication_type" class="w-full h-11 rounded-xl bg-slate-900/50 border border-slate-700
          text-slate-100 px-3 focus:outline-none focus:ring-2 focus:ring-cyan-500" placeholder="Journal / Conference / Preprint / Blog">
                            </div>
                            <div>
                                <label class="block text-xs font-semibold text-slate-300 mb-2">AUTHORS</label>
                                <input x-model="form.authors" class="w-full h-11 rounded-xl bg-slate-900/50 border border-slate-700
          text-slate-100 px-3 focus:outline-none focus:ring-2 focus:ring-cyan-500" placeholder="First Author, Second Author, ...">
                            </div>

                            {{-- Venue / Date --}}
                            <div>
                                <label class="block text-xs font-semibold text-slate-300 mb-2">PUBLISHED IN</label>
                                <input x-model="form.published_in" class="w-full h-11 rounded-xl bg-slate-900/50 border border-slate-700
          text-slate-100 px-3 focus:outline-none focus:ring-2 focus:ring-cyan-500" placeholder="e.g., IEEE Access / arXiv / Medium">
                            </div>
                            <div>
                                <label class="block text-xs font-semibold text-slate-300 mb-2">PUBLISHED DATE</label>
                                <input type="date" x-model="form.published_date" class="w-full h-11 rounded-xl bg-slate-900/50 border border-slate-700
          text-slate-100 px-3 focus:outline-none focus:ring-2 focus:ring-cyan-500">
                            </div>

                            {{-- Tags (full width) --}}
                            <div class="md:col-span-2">
                                <label class="block text-xs font-semibold text-slate-300 mb-2">TAGS</label>
                                <div class="flex flex-wrap gap-2 mb-3">
                                    <template x-for="(tag, i) in form.tags" :key="i">
                                        <span class="inline-flex items-center gap-2 px-3 h-9 rounded-full bg-slate-800 text-slate-100 border border-slate-700">
                                            <span x-text="tag"></span>
                                            <button type="button" class="text-slate-300 hover:text-rose-300" @click="removeTag(i)">&times;</button>
                                        </span>
                                    </template>
                                </div>
                                <input x-model="tempTag"
                                    @keydown.enter.prevent="addTag()"
                                    @keydown="if ($event.key === ',') { $event.preventDefault(); addTag(); }"
                                    @blur="addTag()"
                                    class="w-full h-11 rounded-xl bg-slate-900/50 border border-slate-700 text-slate-100 px-3 focus:outline-none focus:ring-2 focus:ring-cyan-500"
                                    placeholder="Type a tag and press Enter (e.g., NLP, ATS, Resume)">
                                <p class="text-xs text-slate-400 mt-2">Tip: Press <strong>Enter</strong> or type a comma to add a tag.</p>
                            </div>

                            {{-- Meta line (full) --}}
                            <div class="md:col-span-2">
                                <label class="block text-xs font-semibold text-slate-300 mb-2">META LINE</label>
                                <input x-model="form.meta_line" class="w-full h-11 rounded-xl bg-slate-900/50 border border-slate-700
          text-slate-100 px-3 focus:outline-none focus:ring-2 focus:ring-cyan-500"
                                    placeholder="Short highlight (e.g., Cited 42 times; presented at NeurIPS workshop)">
                            </div>

                            {{-- Description (full) --}}
                            <div class="md:col-span-2">
                                <label class="block text-xs font-semibold text-slate-300 mb-2">DESCRIPTION</label>
                                <textarea rows="4" x-model="form.description" class="w-full rounded-xl bg-slate-900/50 border border-slate-700
          text-slate-100 px-3 py-2 focus:outline-none focus:ring-2 focus:ring-cyan-500"
                                    placeholder="Abstract/summary, your contribution, results, and impact..."></textarea>
                            </div>

                            {{-- Actions --}}
                            <div class="md:col-span-2 flex justify-between gap-3 pt-2">
                                <div class="flex gap-3">
                                    <button type="button" class="px-4 h-10 rounded-xl bg-emerald-600 text-white font-semibold hover:bg-emerald-700"
                                        @click="addToResume">Add to Resume</button>
                                    <button type="button" class="px-4 h-10 rounded-xl border border-slate-700 text-slate-200 hover:bg-slate-800"
                                        @click="resetForm">Clear</button>
                                </div>
                                <div class="flex gap-3">
                                    <button type="button" class="px-4 h-10 rounded-xl border border-slate-700 text-slate-200 hover:bg-slate-800"
                                        @click="back">Back</button>
                                    <button type="submit" class="px-5 h-10 rounded-xl bg-cyan-600 text-white font-semibold hover:bg-cyan-700">
                                        Save & Next
                                    </button>
                                </div>
                            </div>
                        </div>
                    </template>

                    {{-- LIST --}}
                    <div class="md:col-span-2">
                        <template x-if="items.length === 0">
                            <div class="text-sm text-slate-400">No publications added yet.</div>
                        </template>

                        <template x-for="(p, i) in items" :key="i">
                            <div class="mt-4 border border-slate-700 rounded-xl p-4 bg-slate-900/40">
                                <div class="flex items-start justify-between">
                                    <div>
                                        <div class="font-semibold text-slate-100"
                                            x-text="(p.title || 'Publication') + (p.publication_type ? ' | ' + p.publication_type : '')"></div>
                                        <div class="text-xs text-slate-400 mt-1"
                                            x-text="(p.published_in ? p.published_in + ' • ' : '') + (p.published_date || '')"></div>
                                        <div class="text-xs text-slate-500" x-show="p.authors" x-text="p.authors"></div>
                                        <div class="text-xs text-slate-400 mt-1" x-show="p.meta_line" x-text="p.meta_line"></div>

                                        <div class="flex flex-wrap gap-2 mt-2" x-show="(p.tags||[]).length">
                                            <template x-for="(tag, j) in p.tags" :key="j">
                                                <span class="inline-flex items-center px-2.5 h-7 rounded-full bg-slate-800 text-slate-100 border border-slate-700 text-xs"
                                                    x-text="tag"></span>
                                            </template>
                                        </div>
                                    </div>
                                    <div class="flex gap-2">
                                        <button type="button" class="px-3 h-8 rounded-lg border border-slate-700 text-slate-200 hover:bg-slate-800"
                                            @click="edit(i)">Edit</button>
                                        <button type="button" class="px-3 h-8 rounded-lg bg-rose-600 text-white hover:bg-rose-700"
                                            @click="remove(i)">Remove</button>
                                    </div>
                                </div>

                                <div class="text-sm text-slate-200 mt-3 whitespace-pre-line" x-show="p.description" x-text="p.description"></div>
                            </div>
                        </template>

                        <div class="mt-4" x-show="!showForm">
                            <button type="button" class="px-4 h-10 rounded-xl bg-slate-800 border border-slate-700 text-slate-200 hover:bg-slate-700"
                                @click="addMore">+ Add more publication</button>
                        </div>
                    </div>
                </form>

                {{-- Step 10: Languages --}}
                <form x-show="step === 10"
                    x-transition.opacity
                    @submit.prevent="saveAndNext"
                    x-data="languagesStep(back, saveAndNext)"
                    class="grid grid-cols-1 gap-5">
                    @csrf

                    <div>
                        <h3 class="text-slate-100 font-semibold">Add your languages</h3>
                        <p class="text-slate-400 text-sm mt-1">Each language has: Name, Proficiency, Type, Certification.</p>
                    </div>

                    {{-- Repeater form sections --}}
                    <template x-for="(lang, i) in langs" :key="i">
                        <div class="bg-slate-900/40 border border-slate-700 rounded-xl p-4">
                            <div class="flex items-center justify-between gap-3">
                                <h4 class="text-slate-200 font-semibold">Language <span x-text="i + 1"></span></h4>
                                <div class="flex items-center gap-2">
                                    <button type="button"
                                        class="px-3 h-9 rounded-xl border border-slate-700 text-slate-200 hover:bg-slate-800"
                                        @click="commitOne(i)">
                                        Add to resume
                                    </button>
                                    <button type="button"
                                        class="px-3 h-9 rounded-xl border border-slate-700 text-rose-300 hover:bg-slate-800"
                                        @click="removeLang(i)"
                                        x-show="langs.length > 1">
                                        Remove
                                    </button>
                                </div>
                            </div>

                            <div class="mt-4 grid grid-cols-1 md:grid-cols-2 gap-5">
                                <div>
                                    <label class="block text-xs font-semibold text-slate-300 mb-2">LANGUAGE NAME</label>
                                    <input x-model="lang.name" class="w-full h-11 rounded-xl bg-slate-900/50 border border-slate-700
                 text-slate-100 px-3 focus:outline-none focus:ring-2 focus:ring-cyan-500"
                                        placeholder="e.g., English, Hindi, Spanish">
                                </div>

                                <div>
                                    <label class="block text-xs font-semibold text-slate-300 mb-2">PROFICIENCY LEVEL</label>
                                    <select x-model="lang.proficiency" class="w-full h-11 rounded-xl bg-slate-900/50 border border-slate-700
                 text-slate-100 px-3 focus:outline-none focus:ring-2 focus:ring-cyan-500">
                                        <option value="">Select level</option>
                                        <option>Basic</option>
                                        <option>Conversational</option>
                                        <option>Fluent</option>
                                        <option>Native / Bilingual</option>
                                    </select>
                                </div>

                                <div>
                                    <label class="block text-xs font-semibold text-slate-300 mb-2">LANGUAGE TYPE</label>
                                    <select x-model="lang.type" class="w-full h-11 rounded-xl bg-slate-900/50 border border-slate-700
                 text-slate-100 px-3 focus:outline-none focus:ring-2 focus:ring-cyan-500">
                                        <option value="">Select type</option>
                                        <option>Spoken</option>
                                        <option>Written</option>
                                        <option>Both</option>
                                    </select>
                                </div>

                                <div>
                                    <label class="block text-xs font-semibold text-slate-300 mb-2">CERTIFICATION</label>
                                    <input x-model="lang.cert" class="w-full h-11 rounded-xl bg-slate-900/50 border border-slate-700
                 text-slate-100 px-3 focus:outline-none focus:ring-2 focus:ring-cyan-500"
                                        placeholder="e.g., IELTS 7.5, DELF B2, JLPT N2">
                                </div>
                            </div>
                        </div>
                    </template>

                    <div>
                        <button type="button"
                            class="px-4 h-10 rounded-xl border border-slate-700 text-slate-200 hover:bg-slate-800"
                            @click="addLang()">
                            + Add Language
                        </button>
                    </div>

                    {{-- Committed list (live) --}}
                    <div class="mt-2" x-show="$store.resume.languages && $store.resume.languages.length">
                        <h4 class="text-slate-200 font-semibold mb-2">Added Languages</h4>
                        <template x-for="(L, k) in $store.resume.languages" :key="'L-'+k">
                            <div class="flex items-center justify-between gap-3 border border-slate-700 rounded-xl p-3 mb-2">
                                <div>
                                    <div class="font-semibold" x-text="(L.name || 'Language') + (L.proficiency ? ' | ' + L.proficiency : '')"></div>
                                    <div class="text-xs text-slate-400" x-show="L.type || L.cert"
                                        x-text="[(L.type || ''), (L.cert || '')].filter(Boolean).join(' • ')"></div>
                                </div>
                                <div class="flex gap-2">
                                    <button type="button" class="px-3 h-9 rounded-xl border border-slate-700 text-slate-200 hover:bg-slate-800"
                                        @click="editCommitted(k)">Edit</button>
                                    <button type="button" class="px-3 h-9 rounded-xl border border-slate-700 text-rose-300 hover:bg-slate-800"
                                        @click="removeCommitted(k)">Remove</button>
                                </div>
                            </div>
                        </template>
                    </div>

                    <div class="flex justify-end gap-3 pt-2">
                        <button type="button"
                            class="px-4 h-10 rounded-xl border border-slate-700 text-slate-200 hover:bg-slate-800"
                            @click="back">
                            Back
                        </button>
                        <button type="submit"
                            class="px-5 h-10 rounded-xl bg-cyan-600 text-white font-semibold hover:bg-cyan-700">
                            Save & Next
                        </button>
                    </div>
                </form>
                {{-- Step 11: Hobbies --}}
                <form x-show="step === 11"
                    x-transition.opacity
                    @submit.prevent="saveAndNext"
                    x-data="hobbiesStep(back, saveAndNext)"
                    class="grid grid-cols-1 gap-5">
                    @csrf

                    <div>
                        <h3 class="text-slate-100 font-semibold">Add your hobbies</h3>
                        <p class="text-slate-400 text-sm mt-1">Each hobby has a title and skills (add with Enter/comma).</p>
                    </div>

                    <template x-for="(hb, i) in hobbies" :key="i">
                        <div class="bg-slate-900/40 border border-slate-700 rounded-xl p-4">
                            <div class="flex items-center justify-between gap-3">
                                <h4 class="text-slate-200 font-semibold">Hobby <span x-text="i + 1"></span></h4>
                                <div class="flex items-center gap-2">
                                    <button type="button"
                                        class="px-3 h-9 rounded-xl border border-slate-700 text-slate-200 hover:bg-slate-800"
                                        @click="commitOne(i)">
                                        Add to resume
                                    </button>
                                    <button type="button"
                                        class="px-3 h-9 rounded-xl border border-slate-700 text-rose-300 hover:bg-slate-800"
                                        @click="removeHobby(i)"
                                        x-show="hobbies.length > 1">
                                        Remove
                                    </button>
                                </div>
                            </div>

                            <div class="mt-4 grid grid-cols-1 gap-5">
                                <div>
                                    <label class="block text-xs font-semibold text-slate-300 mb-2">HOBBY TITLE</label>
                                    <input x-model="hb.title" class="w-full h-11 rounded-xl bg-slate-900/50 border border-slate-700
                 text-slate-100 px-3 focus:outline-none focus:ring-2 focus:ring-cyan-500"
                                        placeholder="e.g., Photography">
                                </div>

                                <div>
                                    <label class="block text-xs font-semibold text-slate-300 mb-2">SKILLS</label>

                                    <div class="flex flex-wrap gap-2 mb-3">
                                        <template x-for="(tag, j) in hb.skills" :key="j">
                                            <span class="inline-flex items-center gap-2 px-3 h-9 rounded-full bg-slate-800 text-slate-100 border border-slate-700">
                                                <span x-text="tag"></span>
                                                <button type="button" class="text-slate-300 hover:text-rose-300" @click="removeSkill(i, j)">&times;</button>
                                            </span>
                                        </template>
                                    </div>

                                    <input x-model="hb.temp"
                                        @keydown.enter.prevent="addSkill(i)"
                                        @keydown="if ($event.key === ',') { $event.preventDefault(); addSkill(i); }"
                                        @blur="addSkill(i)"
                                        class="w-full h-11 rounded-xl bg-slate-900/50 border border-slate-700
                 text-slate-100 px-3 focus:outline-none focus:ring-2 focus:ring-cyan-500"
                                        placeholder="Type a skill and press Enter (e.g., Lightroom, Composition)">
                                    <p class="text-xs text-slate-400 mt-2">Tip: Press <strong>Enter</strong> or type a comma to add a skill.</p>
                                </div>
                            </div>
                        </div>
                    </template>

                    <div>
                        <button type="button"
                            class="px-4 h-10 rounded-xl border border-slate-700 text-slate-200 hover:bg-slate-800"
                            @click="addHobby()">
                            + Add Hobby
                        </button>
                    </div>

                    {{-- Committed list (live) --}}
                    <div class="mt-2" x-show="$store.resume.hobbies && $store.resume.hobbies.length">
                        <h4 class="text-slate-200 font-semibold mb-2">Added Hobbies</h4>
                        <template x-for="(H, k) in $store.resume.hobbies" :key="'H-'+k">
                            <div class="flex items-center justify-between gap-3 border border-slate-700 rounded-xl p-3 mb-2">
                                <div>
                                    <div class="font-semibold" x-text="H.title || 'Hobby'"></div>
                                    <div class="text-xs text-slate-400 mt-1" x-show="(H.skills||[]).length">
                                        <span x-text="(H.skills||[]).join(', ')"></span>
                                    </div>
                                </div>
                                <div class="flex gap-2">
                                    <button type="button" class="px-3 h-9 rounded-xl border border-slate-700 text-slate-200 hover:bg-slate-800"
                                        @click="editCommitted(k)">Edit</button>
                                    <button type="button" class="px-3 h-9 rounded-xl border border-slate-700 text-rose-300 hover:bg-slate-800"
                                        @click="removeCommitted(k)">Remove</button>
                                </div>
                            </div>
                        </template>
                    </div>

                    <div class="flex justify-end gap-3 pt-2">
                        <button type="button"
                            class="px-4 h-10 rounded-xl border border-slate-700 text-slate-200 hover:bg-slate-800"
                            @click="back">
                            Back
                        </button>
                        <button type="submit"
                            class="px-5 h-10 rounded-xl bg-cyan-600 text-white font-semibold hover:bg-cyan-700">
                            Save & Next
                        </button>
                    </div>
                </form>

                {{-- Step 12: Summary + Preview --}}
                <form x-show="step === 12"
                    x-transition.opacity
                    @submit.prevent
                    x-data="{
        profSummary: '',
        profTitle: '',
        measurable: '',
        hourlyRate: '',
        download() {
        }
      }"
                    class="grid grid-cols-1 lg:grid-cols-2 gap-6">

                    @csrf


                    {{-- Professional Summary (header row) --}}
                    <div class="lg:col-span-2">
                        <div class="flex items-center justify-between mb-2">
                            <label class="block text-xs font-semibold text-slate-300">PROFESSIONAL SUMMARY</label>

                            {{-- Generate with AI (sparkle, yellow) --}}
                            <button type="button"
                                class="inline-flex items-center gap-2 text-xs px-3 h-9 rounded-lg border border-slate-700 text-slate-200 hover:bg-slate-800 disabled:opacity-60"
                                @click="generateSummary()"
                                :disabled="generating">
                                <span class="relative">
                                    {{-- Sparkles icon (yellow) --}}
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                        class="w-4 h-4 text-amber-400" :class="!generating ? 'animate-pulse' : ''"
                                        fill="currentColor" aria-hidden="true">
                                        <path d="M5 3l1.546 3.727L10 8.5l-3.454 1.773L5 14 3.454 10.273 0 8.5l3.454-1.773L5 3zm13-1l1.237 2.98L22 6l-2.763 1.02L18 10l-1.237-2.98L14 6l2.763-1.02L18 2zm-4 8l1.546 3.727L20 15.5l-3.454 1.773L14 21l-1.546-3.727L9 15.5l3.454-1.773L14 10z" />
                                    </svg>
                                    {{-- tiny glowing ping --}}
                                    <span class="absolute -top-1 -right-1 w-2 h-2 rounded-full bg-amber-400 opacity-70 animate-ping"></span>
                                </span>
                                <span x-show="!generating">Generate with AI</span>
                                <span x-show="generating">Generating…</span>
                            </button>
                        </div>
                    </div>

                    {{-- Professional Summary (textarea row, full width) --}}
                    <div class="lg:col-span-2">
                        <textarea
                            name="prof_summary"
                            :value="$store.resume.prof_summary"
                            @input="$store.resume.prof_summary = $event.target.value"
                            rows="5"
                            class="w-full rounded-xl bg-slate-900/50 border border-slate-700 text-slate-100 px-3 py-2
           focus:outline-none focus:ring-2 focus:ring-cyan-500"
                            placeholder="Write a short, impactful introduction summarizing your experience, strengths, and goals..."></textarea>
                        <p class="text-xs text-slate-400 mt-1">Tip: You can edit this after generating.</p>
                    </div>




                    {{-- Professional Title --}}
                    <div class="lg:col-span-2">
                        <label class="block text-xs font-semibold text-slate-300 mb-2">PROFESSIONAL TITLE</label>
                        <input
                            name="prof_title"
                            x-model="$store.resume.prof_title"
                            class="w-full h-11 rounded-xl bg-slate-900/50 border border-slate-700 text-slate-100 px-3
               focus:outline-none focus:ring-2 focus:ring-cyan-500"
                            placeholder="e.g., Full-Stack Developer">
                    </div>


                    <!-- {{-- Measurable Achievement --}}
                    <div class="lg:col-span-2">
                        <label class="block text-xs font-semibold text-slate-300 mb-2">MEASURABLE ACHIEVEMENT</label>
                        <input x-model="measurable"
                            class="w-full h-11 rounded-xl bg-slate-900/50 border border-slate-700 text-slate-100 px-3
                      focus:outline-none focus:ring-2 focus:ring-cyan-500"
                            placeholder="e.g., Increased conversion rate by 28%">
                    </div>

                    {{-- Hourly Rate --}}
                    <div class="lg:col-span-2">
                        <label class="block text-xs font-semibold text-slate-300 mb-2">HOURLY RATE</label>
                        <div class="flex items-center gap-3">
                            <input x-model="hourlyRate" type="number" step="0.01" min="0"
                                class="w-full h-11 rounded-xl bg-slate-900/50 border border-slate-700 text-slate-100 px-3
                          focus:outline-none focus:ring-2 focus:ring-cyan-500"
                                placeholder="e.g., 25">
                            <span class="text-slate-400 text-sm">per hour</span> 
                        </div>
                    </div> -->

                    {{-- Actions: Back + Preview + Download --}}
                    <div class="lg:col-span-2 flex items-center justify-between gap-3 pt-2">
                        <button type="button"
                            class="px-4 h-10 rounded-xl border border-slate-700 text-slate-200 hover:bg-slate-800"
                            @click="back">
                            Back
                        </button>

                        <div class="flex gap-3">
                            <button type="button"
                                class="px-5 h-10 rounded-xl border border-slate-700 text-slate-200 hover:bg-slate-800"
                                @click="$refs.preview?.scrollIntoView({ behavior: 'smooth', block: 'start' })">
                                Preview
                            </button>

                            <button type="button"
                                class="px-5 h-10 rounded-xl bg-cyan-600 text-white font-semibold hover:bg-cyan-700"
                                @click="download">
                                Download
                            </button>
                        </div>
                    </div>

                </form>

            </section>

            <!-- Preview -->
            <!-- <aside class="bg-slate-800/70 border border-slate-700 rounded-2xl p-3 md:p-5 lg:sticky lg:top-24 h-fit">
                <img src="{{ $image }}" alt="Template {{ $id }}" class="w-full rounded-xl shadow-lg ring-1 ring-slate-700">
            </aside> -->
            <aside
                class="bg-slate-800/70 border border-slate-700 rounded-2xl lg:sticky lg:top-24 h-[125vh] flex flex-col"
                x-data="{ ...resumeActions(), busy:false }">
                <div class="flex justify-end p-3 border-b border-slate-700 flex-shrink-0 gap-3">
                    <!-- Download (JS-enabled) -->
                    <!-- Example button -->
                    <button type="button"
                        x-data="resumeActions()"
                        @click="downloadResume()"
                        class="px-5 h-10 rounded-xl bg-cyan-600 text-white font-semibold hover:bg-cyan-700">
                        Download PDF
                    </button>


                    <!-- No-JS fallback (optional) -->
                    <noscript>
                        <a href="{{ route('resume.download', ['id' => $resumeId ?? 1]) }}"
                            class="px-4 py-2 text-sm font-semibold bg-cyan-600 hover:bg-cyan-700 text-white rounded-lg">
                            Download PDF
                        </a>
                    </noscript>
                </div>

                <div class="flex-1 overflow-y-auto p-3 md:p-5">
                    @include('Templates.Resumes.template1-preview')
                </div>
            </aside>




        </div>
    </div>
</div>

<!-- Alpine helpers -->
<script>
    document.addEventListener('alpine:init', () => {
        /* ---------------- Wizard (Stepper) ---------------- */
        Alpine.data('resumeWizard', (initialStep = 1) => ({
            step: Number(initialStep) || 1,
            total: 12,
            goto(n) {
                if (n < 1 || n > this.total) return;
                this.step = n;
                this._syncUrl();
            },
            next() {
                if (this.step < this.total) {
                    this.step++;
                    this._syncUrl();
                }
            },
            back() {
                if (this.step > 1) {
                    this.step--;
                    this._syncUrl();
                }
            },
            saveAndNext() {
                this.next();
            },
            _syncUrl() {
                const url = new URL(window.location.href);
                url.searchParams.set('step', this.step);
                window.history.replaceState({}, '', url);
            },
            headingFor(s) {
                const map = {
                    1: 'Personal Information',
                    2: 'Experience',
                    3: 'Education',
                    4: 'Skills',
                    5: 'Projects',
                    6: 'Certifications',
                    7: 'Volunteer',
                    8: 'Awards',
                    9: 'Publications',
                    10: 'Languages',
                    11: 'Hobbies',
                    12: 'Summary'
                };
                return map[s] || 'Step';
            },
            subFor(s) {
                const map = {
                    1: 'This will appear at the top of your resume.',
                    2: 'Add roles, dates, impact and company info.',
                    3: 'Degrees, institution, focus, dates and details.',
                    4: 'Organize sections and add skills as tags.',
                    5: 'Project details, tech stack, type, links and dates.',
                    6: 'Certification, skills covered, issuer and verify links.',
                    7: 'Volunteer role, dates, org/type, location and highlights.',
                    8: 'Award, organization, date, links and context.',
                    9: 'Title, type, authors, venue/date, tags and summary.',
                    10: 'Language, proficiency, type and certification.',
                    11: 'Add hobbies and related skills.',
                    12: 'Write your professional summary, generate title',
                };
                return map[s] || '';
            },
        }));

        /* ---------------- Resume Store (init-once + hydrate + persist) ---------------- */
        const LS_KEY = 'resume.builder.v1';

        const readLS = () => {
            try {
                return JSON.parse(localStorage.getItem(LS_KEY) || '{}');
            } catch {
                return {};
            }
        };
        const writeLS = (obj) => {
            try {
                localStorage.setItem(LS_KEY, JSON.stringify(obj || {}));
            } catch {}
        };

        const defaults = {
            firstName: '',
            lastName: '',
            contact_number: '',
            email: '',
            dob: '',
            country: '',
            state: '',
            city: '',
            github: '',
            website: '',
            linkedin: '',
            prof_title: '',
            prof_summary: '',

            educations: [],
            experiences: [],
            projects: [],
            certifications: [],
            skills_sections: [],
            volunteers: [],
            awards: [],
            publications: [],
            languages: [],
            hobbies: [],
        };


        const saved = readLS();

        if (Alpine.store('resume')) {
            const s = Alpine.store('resume');
            // fill any missing keys only
            for (const k in defaults)
                if (s[k] === undefined) s[k] = defaults[k];
            // hydrate from LS (only if current is empty)
            for (const k in saved) {
                const cur = s[k],
                    val = saved[k];
                const isEmpty = (Array.isArray(cur) ? cur.length === 0 : (cur === '' || cur == null));
                if (isEmpty) s[k] = val;
            }
        } else {
            Alpine.store('resume', Alpine.reactive({
                ...defaults,
                ...saved
            }));
        }

        // persist helper
        let __persistTimer;
        const persist = () => {
            clearTimeout(__persistTimer);
            __persistTimer = setTimeout(() => writeLS(Alpine.store('resume')), 150);
        };
        Alpine.store('persistResume', persist);

        // ensure arrays
        ['educations', 'experiences', 'projects', 'skills_sections', 'certifications', 'volunteers', 'awards', 'publications', 'languages', 'hobbies']
        .forEach(k => {
            if (!Array.isArray(Alpine.store('resume')[k])) {
                Alpine.store('resume')[k] = [];
            }
        });


        /* ---------------- Download Action ---------------- */
        Alpine.data('resumeActions', () => ({
            async downloadResume() {
                const q = (s) => document.querySelector(s)?.value?.trim() || '';
                const payload = {
                    first_name: q('input[name="first_name"]'),
                    last_name: q('input[name="last_name"]'),
                    contact_number: q('input[name="contact_number"]'),
                    email: q('input[name="email"]'),
                    dob: q('input[name="dob"]'),
                    country: q('input[name="country"]'),
                    state: q('input[name="state"]'),
                    city: q('input[name="city"]'),
                    github: q('input[name="github"]'),
                    website: q('input[name="website"]'),
                    linkedin: q('input[name="linkedin"]'),
                    prof_title: q('input[name="prof_title"]'),
                    prof_summary: q('textarea[name="prof_summary"]'),

                    educations: Alpine.store('resume').educations || [],
                    experiences: Alpine.store('resume').experiences || [],
                    skills_sections: Alpine.store('resume').skills_sections || [],
                    projects: Alpine.store('resume').projects || [],
                    certifications: Alpine.store('resume').certifications || [],
                    volunteers: Alpine.store('resume').volunteers || [],
                    awards: Alpine.store('resume').awards || [],
                    publications: Alpine.store('resume').publications || [],
                    languages: Alpine.store('resume').languages || [],
                    hobbies: Alpine.store('resume').hobbies || [],
                };


                const normUrl = (u) => u ? (/^(https?:)?\/\//i.test(u) ? u : `https://${u}`) : '';
                payload.github = normUrl(payload.github);
                payload.website = normUrl(payload.website);
                payload.linkedin = normUrl(payload.linkedin);

                const csrf = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || '';
                const res = await fetch('{{ route("resume.export.post") }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': csrf,
                        'X-Requested-With': 'XMLHttpRequest',
                        'Accept': 'application/pdf',
                    },
                    body: JSON.stringify(payload),
                });

                if (!res.ok) {
                    const msg = await res.text().catch(() => '');
                    alert('Export failed: ' + (msg || ('HTTP ' + res.status)));
                    return;
                }

                const blob = await res.blob();
                const url = URL.createObjectURL(blob);
                const a = document.createElement('a');
                a.href = url;
                a.download = 'resume.pdf';
                document.body.appendChild(a);
                a.click();
                a.remove();
                URL.revokeObjectURL(url);
            }
        }));

        /* ---------------- Education Step ---------------- */
        Alpine.data('educationStep', (goNext, goBack) => ({
            // ---- state ----
            form: {
                degree_name: '',
                institution: '',
                focus: '',
                start_date: '',
                end_date: '',
                mode: '',
                cgpa: '',
                website: '',
                city: '',
                state: '',
                country: '',
                description: ''
            },
            editingIndex: null,
            goNext,
            goBack,

            // ---- computed ----
            get items() {
                return Alpine.store('resume').educations || [];
            },
            get isEditing() {
                return this.editingIndex !== null;
            },

            // ---- helpers ----
            _emptyForm() {
                return {
                    degree_name: '',
                    institution: '',
                    focus: '',
                    start_date: '',
                    end_date: '',
                    mode: '',
                    cgpa: '',
                    website: '',
                    city: '',
                    state: '',
                    country: '',
                    description: ''
                };
            },
            _persist() {
                Alpine.store('persistResume')?.();
            },
            _sanitize(row) {
                const r = {
                    ...row
                };
                for (const k in r) r[k] = (r[k] ?? '').toString().trim();
                return r;
            },
            _isBlank(row) {
                return Object.values(row).join('').trim() === '';
            },

            // ---- UI display helpers ----
            year(d) {
                return d ? new Date(d).getFullYear() : '';
            },
            range(it) {
                const a = this.year(it.start_date),
                    b = this.year(it.end_date);
                return [a, b].filter(Boolean).join(' - ');
            },
            loc(it) {
                return [it.city, it.state, it.country].filter(Boolean).join(', ');
            },

            // ---- actions ----
            resetForm() {
                this.form = this._emptyForm();
                this.editingIndex = null;
            },
            edit(i) {
                const it = this.items[i];
                if (!it) return;
                this.form = JSON.parse(JSON.stringify(it));
                this.editingIndex = i;
                try {
                    window.scrollTo({
                        top: 0,
                        behavior: 'smooth'
                    });
                } catch {}
            },
            remove(i) {
                const store = Alpine.store('resume');
                (store.educations || []).splice(i, 1);
                this._persist();
                if (this.editingIndex === i) this.resetForm();
                window.dispatchEvent(new CustomEvent('resume:educations-updated'));
                console.log('[education] removed index', i, store.educations);
            },
            save() {
                const payload = this._sanitize(this.form);
                if (this._isBlank(payload)) {
                    console.warn('[education] blank payload ignored');
                    return;
                }
                const store = Alpine.store('resume');
                if (!Array.isArray(store.educations)) store.educations = [];
                if (this.isEditing) {
                    store.educations.splice(this.editingIndex, 1, payload);
                    console.log('[education] updated @', this.editingIndex, payload);
                } else {
                    store.educations.push(payload);
                    console.log('[education] added', payload);
                }
                this._persist();
                window.dispatchEvent(new CustomEvent('resume:educations-updated'));
                this.resetForm();
            },
            saveAndNext() {
                this.save();
                if (typeof this.goNext === 'function') this.goNext();
            },
            back() {
                if (typeof this.goBack === 'function') this.goBack();
            },
        }));

        /* ---------------- Experience Step (Add to Resume + list below) ---------------- */
        Alpine.data('experienceStep', (goNext, goBack) => ({
            showForm: true,
            editingIndex: null,
            form: {
                job_title: '',
                company_name: '',
                company_type: '',
                job_type: '',
                company_url: '',
                start_date: '',
                end_date: '',
                meta_line: '',
                city: '',
                state: '',
                country: '',
                description: '',
            },
            goNext,
            goBack,

            get items() {
                return Alpine.store('resume').experiences || [];
            },
            get isEditing() {
                return this.editingIndex !== null;
            },

            resetForm() {
                this.form = {
                    job_title: '',
                    company_name: '',
                    company_type: '',
                    job_type: '',
                    company_url: '',
                    start_date: '',
                    end_date: '',
                    meta_line: '',
                    city: '',
                    state: '',
                    country: '',
                    description: '',
                };
                this.editingIndex = null;
            },

            addToResume() {
                // skip if totally empty
                if (Object.values(this.form).join('').trim() === '') return;

                // normalize url (optional)
                const normUrl = (u) => u ? (/^(https?:)?\/\//i.test(u) ? u : `https://${u}`) : '';
                const payload = {
                    ...this.form,
                    company_url: normUrl(this.form.company_url)
                };

                const store = Alpine.store('resume');
                if (!Array.isArray(store.experiences)) store.experiences = [];

                if (this.isEditing) {
                    store.experiences.splice(this.editingIndex, 1, payload);
                } else {
                    store.experiences.push(payload);
                }

                Alpine.store('persistResume')?.();
                this.showForm = false; // hide form after add/update
                this.resetForm();
                this.$dispatch('toast', {
                    type: 'success',
                    message: 'Experience saved'
                });
            },

            edit(i) {
                const it = this.items[i];
                if (!it) return;
                this.form = JSON.parse(JSON.stringify(it));
                this.editingIndex = i;
                this.showForm = true;
                try {
                    window.scrollTo({
                        top: 0,
                        behavior: 'smooth'
                    });
                } catch {}
            },

            remove(i) {
                Alpine.store('resume').experiences.splice(i, 1);
                Alpine.store('persistResume')?.();
                if (this.editingIndex === i) this.resetForm();
            },

            addMore() {
                this.resetForm();
                this.showForm = true;
            },

            saveAndNext() {
                // data already in store
                if (typeof this.goNext === 'function') this.goNext();
            },

            back() {
                if (typeof this.goBack === 'function') this.goBack();
            },
        }));

        /* ---------------- Skills Step (commit + real-time preview) ---------------- */
        Alpine.data('skillsStep', (goNext, goBack) => ({
            sections: [{
                title: 'Programming Languages',
                skills: [],
                temp: ''
            }],

            // nav
            back: goBack,
            saveAndNextHandler: goNext,

            addSection() {
                this.sections.push({
                    title: '',
                    skills: [],
                    temp: ''
                });
            },
            removeSection(i) {
                const removed = this.sections.splice(i, 1)[0];
                // if removing a draft that had a title, also remove from committed store by title
                if (removed?.title) {
                    const key = (removed.title || '').trim().toLowerCase();
                    const store = Alpine.store('resume');
                    const idx = (store.skills_sections || []).findIndex(s => (s.title || '').toLowerCase() === key);
                    if (idx >= 0) {
                        store.skills_sections.splice(idx, 1);
                        Alpine.store('persistResume')?.();
                    }
                }
            },

            addSkill(i, val) {
                const v = (val || '').trim().replace(/,$/, '');
                if (!v) return;
                const arr = this.sections[i].skills;
                if (!arr.includes(v)) arr.push(v);
                this.sections[i].temp = '';
            },
            removeSkill(i, j) {
                this.sections[i].skills.splice(j, 1);
            },

            canCommit(sec) {
                return (sec.title || '').trim().length > 0 && (sec.skills || []).length > 0;
            },

            // Add to resume → upsert in store.skills_sections
            commitOne(i) {
                try {
                    const sec = this.sections[i];
                    if (!this.canCommit(sec)) return;

                    const copy = {
                        title: (sec.title || '').trim(),
                        skills: Array.isArray(sec.skills) ? [...sec.skills] : [],
                    };

                    const store = Alpine.store('resume');
                    store.skills_sections = store.skills_sections || [];
                    const idx = store.skills_sections.findIndex(
                        s => (s.title || '').toLowerCase() === copy.title.toLowerCase()
                    );
                    if (idx >= 0) store.skills_sections.splice(idx, 1, copy);
                    else store.skills_sections.push(copy);

                    Alpine.store('persistResume')?.();

                    // clear this draft block after committing (like other steps)
                    this.sections.splice(i, 1, {
                        title: '',
                        skills: [],
                        temp: ''
                    });
                } catch (e) {
                    console.error('[skillsStep.commitOne] error', e);
                }
            },

            // Save all commit + Next
            saveAndNext() {
                const store = Alpine.store('resume');
                const toCommit = this.sections
                    .map(s => ({
                        title: (s.title || '').trim(),
                        skills: Array.isArray(s.skills) ? [...s.skills] : []
                    }))
                    .filter(s => s.title && s.skills.length);

                // upsert by case-insensitive title
                store.skills_sections = store.skills_sections || [];
                toCommit.forEach(copy => {
                    const idx = store.skills_sections.findIndex(
                        s => (s.title || '').toLowerCase() === copy.title.toLowerCase()
                    );
                    if (idx >= 0) store.skills_sections.splice(idx, 1, copy);
                    else store.skills_sections.push(copy);
                });

                Alpine.store('persistResume')?.();
                if (typeof this.saveAndNextHandler === 'function') this.saveAndNextHandler();
            },

            // Committed list actions
            editCommitted(k) {
                const item = (Alpine.store('resume').skills_sections || [])[k];
                if (!item) return;
                // push into drafts for editing
                this.sections.push(JSON.parse(JSON.stringify(item)));
                // remove original so re-commit replaces cleanly
                Alpine.store('resume').skills_sections.splice(k, 1);
                Alpine.store('persistResume')?.();
            },
            removeCommitted(k) {
                Alpine.store('resume').skills_sections.splice(k, 1);
                Alpine.store('persistResume')?.();
            },
        }));
        /* ---------------- Projects Step (Add to Resume + list below) ---------------- */
        Alpine.data('projectsStep', (goNext, goBack) => ({
            showForm: true,
            editingIndex: null,
            form: {
                name: '',
                meta_line: '',
                tech_stack: '',
                start_date: '',
                end_date: '',
                project_type: '',
                live_link: '',
                code_link: '',
                description: '',
            },
            goNext,
            goBack,

            get items() {
                return Alpine.store('resume').projects || [];
            },
            get isEditing() {
                return this.editingIndex !== null;
            },

            resetForm() {
                this.form = {
                    name: '',
                    meta_line: '',
                    tech_stack: '',
                    start_date: '',
                    end_date: '',
                    project_type: '',
                    live_link: '',
                    code_link: '',
                    description: ''
                };
                this.editingIndex = null;
            },

            addToResume() {
                if (Object.values(this.form).join('').trim() === '') return;

                const normUrl = (u) => u ? (/^(https?:)?\/\//i.test(u) ? u : `https://${u}`) : '';
                const payload = {
                    ...this.form,
                    live_link: normUrl(this.form.live_link),
                    code_link: normUrl(this.form.code_link),
                };

                const store = Alpine.store('resume');
                if (!Array.isArray(store.projects)) store.projects = [];

                if (this.isEditing) store.projects.splice(this.editingIndex, 1, payload);
                else store.projects.push(payload);

                Alpine.store('persistResume')?.();
                this.showForm = false;
                this.resetForm();
                this.$dispatch('toast', {
                    type: 'success',
                    message: 'Project saved'
                });
            },

            edit(i) {
                const it = this.items[i];
                if (!it) return;
                this.form = JSON.parse(JSON.stringify(it));
                this.editingIndex = i;
                this.showForm = true;
                try {
                    window.scrollTo({
                        top: 0,
                        behavior: 'smooth'
                    });
                } catch {}
            },

            remove(i) {
                Alpine.store('resume').projects.splice(i, 1);
                Alpine.store('persistResume')?.();
                if (this.editingIndex === i) this.resetForm();
            },

            addMore() {
                this.resetForm();
                this.showForm = true;
            },

            saveAndNext() {
                if (typeof this.goNext === 'function') this.goNext();
            },

            back() {
                if (typeof this.goBack === 'function') this.goBack();
            },
        }));
        /* ---------------- Certifications Step (Add to Resume + list) ---------------- */
        Alpine.data('certificationsStep', (goNext, goBack) => ({
            showForm: true,
            editingIndex: null,
            form: {
                name: '',
                issuer: '',
                skills_covered: [], // tags
                meta_line: '',
                start_date: '',
                end_date: '',
                verify_url: '',
                cert_url: '',
                city: '',
                state: '',
                country: '',
                description: '',
            },
            tempSkill: '',
            goNext,
            goBack,

            get items() {
                return Alpine.store('resume').certifications || [];
            },
            get isEditing() {
                return this.editingIndex !== null;
            },

            resetForm() {
                this.form = {
                    name: '',
                    issuer: '',
                    skills_covered: [],
                    meta_line: '',
                    start_date: '',
                    end_date: '',
                    verify_url: '',
                    cert_url: '',
                    city: '',
                    state: '',
                    country: '',
                    description: '',
                };
                this.tempSkill = '';
                this.editingIndex = null;
            },

            addTag() {
                const v = (this.tempSkill || '').trim().replace(/,$/, '');
                if (!v) return;
                if (!this.form.skills_covered.includes(v)) this.form.skills_covered.push(v);
                this.tempSkill = '';
            },
            removeTag(i) {
                this.form.skills_covered.splice(i, 1);
            },

            addToResume() {
                // ignore totally empty
                if (Object.values({
                        ...this.form,
                        skills_covered: ''
                    }).join('').trim() === '' &&
                    this.form.skills_covered.length === 0) return;

                const normUrl = (u) => u ? (/^(https?:)?\/\//i.test(u) ? u : `https://${u}`) : '';
                const payload = {
                    ...this.form,
                    verify_url: normUrl(this.form.verify_url),
                    cert_url: normUrl(this.form.cert_url),
                };

                const store = Alpine.store('resume');
                if (!Array.isArray(store.certifications)) store.certifications = [];

                if (this.isEditing) store.certifications.splice(this.editingIndex, 1, payload);
                else store.certifications.push(payload);

                Alpine.store('persistResume')?.();
                this.showForm = false;
                this.resetForm();
                this.$dispatch('toast', {
                    type: 'success',
                    message: 'Certification saved'
                });
            },

            edit(i) {
                const it = this.items[i];
                if (!it) return;
                this.form = JSON.parse(JSON.stringify(it));
                // make sure tags array exists
                if (!Array.isArray(this.form.skills_covered)) this.form.skills_covered = [];
                this.editingIndex = i;
                this.showForm = true;
                try {
                    window.scrollTo({
                        top: 0,
                        behavior: 'smooth'
                    });
                } catch {}
            },

            remove(i) {
                Alpine.store('resume').certifications.splice(i, 1);
                Alpine.store('persistResume')?.();
                if (this.editingIndex === i) this.resetForm();
            },

            addMore() {
                this.resetForm();
                this.showForm = true;
            },

            saveAndNext() {
                if (typeof this.goNext === 'function') this.goNext();
            },

            back() {
                if (typeof this.goBack === 'function') this.goBack();
            },
        }));

        // --- VOLUNTEER ---
        Alpine.data('volunteerStep', (goNext, goBack) => ({
            showForm: true,
            editingIndex: null,
            form: {
                role: '',
                org_name: '',
                start_date: '',
                end_date: '',
                volunteer_type: '',
                org_url: '',
                meta_line: '',
                description: '',
                city: '',
                state: '',
                country: '',
            },
            goNext,
            goBack,

            get items() {
                return Alpine.store('resume').volunteers || [];
            },
            get isEditing() {
                return this.editingIndex !== null;
            },

            resetForm() {
                this.form = {
                    role: '',
                    org_name: '',
                    start_date: '',
                    end_date: '',
                    volunteer_type: '',
                    org_url: '',
                    meta_line: '',
                    description: '',
                    city: '',
                    state: '',
                    country: ''
                };
                this.editingIndex = null;
            },

            addToResume() {
                // ignore totally empty
                if (Object.values(this.form).join('').trim() === '') return;
                const normUrl = (u) => u ? (/^(https?:)?\/\//i.test(u) ? u : `https://${u}`) : '';

                const payload = {
                    ...this.form,
                    org_url: normUrl(this.form.org_url)
                };
                const store = Alpine.store('resume');
                if (!Array.isArray(store.volunteers)) store.volunteers = [];

                if (this.isEditing) store.volunteers.splice(this.editingIndex, 1, payload);
                else store.volunteers.push(payload);

                Alpine.store('persistResume')?.();
                this.showForm = false;
                this.resetForm();
                this.$dispatch('toast', {
                    type: 'success',
                    message: 'Volunteer saved'
                });
            },

            edit(i) {
                const it = this.items[i];
                if (!it) return;
                this.form = JSON.parse(JSON.stringify(it));
                this.editingIndex = i;
                this.showForm = true;
                try {
                    window.scrollTo({
                        top: 0,
                        behavior: 'smooth'
                    });
                } catch {}
            },

            remove(i) {
                Alpine.store('resume').volunteers.splice(i, 1);
                Alpine.store('persistResume')?.();
                if (this.editingIndex === i) this.resetForm();
            },

            addMore() {
                this.resetForm();
                this.showForm = true;
            },

            saveAndNext() {
                if (typeof this.goNext === 'function') this.goNext();
            },
            back() {
                if (typeof this.goBack === 'function') this.goBack();
            },
        }));

        // --- AWARDS ---
        Alpine.data('awardsStep', (goNext, goBack) => ({
            showForm: true,
            editingIndex: null,
            form: {
                title: '',
                organization: '',
                meta_line: '',
                award_date: '',
                award_link: '',
                associated_work: '',
                verify_link: '',
                description: '',
            },
            goNext,
            goBack,

            get items() {
                return Alpine.store('resume').awards || [];
            },
            get isEditing() {
                return this.editingIndex !== null;
            },

            resetForm() {
                this.form = {
                    title: '',
                    organization: '',
                    meta_line: '',
                    award_date: '',
                    award_link: '',
                    associated_work: '',
                    verify_link: '',
                    description: ''
                };
                this.editingIndex = null;
            },

            addToResume() {
                if (Object.values(this.form).join('').trim() === '') return;
                const normUrl = (u) => u ? (/^(https?:)?\/\//i.test(u) ? u : `https://${u}`) : '';

                const payload = {
                    ...this.form,
                    award_link: normUrl(this.form.award_link),
                    verify_link: normUrl(this.form.verify_link),
                };

                const store = Alpine.store('resume');
                if (!Array.isArray(store.awards)) store.awards = [];

                if (this.isEditing) store.awards.splice(this.editingIndex, 1, payload);
                else store.awards.push(payload);

                Alpine.store('persistResume')?.();
                this.showForm = false;
                this.resetForm();
                this.$dispatch('toast', {
                    type: 'success',
                    message: 'Award saved'
                });
            },

            edit(i) {
                const it = this.items[i];
                if (!it) return;
                this.form = JSON.parse(JSON.stringify(it));
                this.editingIndex = i;
                this.showForm = true;
                try {
                    window.scrollTo({
                        top: 0,
                        behavior: 'smooth'
                    });
                } catch {}
            },

            remove(i) {
                Alpine.store('resume').awards.splice(i, 1);
                Alpine.store('persistResume')?.();
                if (this.editingIndex === i) this.resetForm();
            },

            addMore() {
                this.resetForm();
                this.showForm = true;
            },

            saveAndNext() {
                if (typeof this.goNext === 'function') this.goNext();
            },
            back() {
                if (typeof this.goBack === 'function') this.goBack();
            },
        }));

        // --- PUBLICATIONS ---
        Alpine.data('publicationsStep', (goNext, goBack) => ({
            showForm: true,
            editingIndex: null,
            form: {
                title: '',
                publication_type: '',
                authors: '',
                published_in: '',
                published_date: '',
                tags: [],
                meta_line: '',
                description: '',
            },
            tempTag: '',
            goNext,
            goBack,

            get items() {
                return Alpine.store('resume').publications || [];
            },
            get isEditing() {
                return this.editingIndex !== null;
            },

            resetForm() {
                this.form = {
                    title: '',
                    publication_type: '',
                    authors: '',
                    published_in: '',
                    published_date: '',
                    tags: [],
                    meta_line: '',
                    description: ''
                };
                this.tempTag = '';
                this.editingIndex = null;
            },

            addTag() {
                const v = (this.tempTag || '').trim().replace(/,$/, '');
                if (!v) return;
                if (!this.form.tags.includes(v)) this.form.tags.push(v);
                this.tempTag = '';
            },
            removeTag(i) {
                this.form.tags.splice(i, 1);
            },

            addToResume() {
                // ignore totally empty except tags length
                if (Object.values({
                        ...this.form,
                        tags: ''
                    }).join('').trim() === '' &&
                    (this.form.tags || []).length === 0) return;

                const store = Alpine.store('resume');
                if (!Array.isArray(store.publications)) store.publications = [];

                const payload = JSON.parse(JSON.stringify(this.form));

                if (this.isEditing) store.publications.splice(this.editingIndex, 1, payload);
                else store.publications.push(payload);

                Alpine.store('persistResume')?.();
                this.showForm = false;
                this.resetForm();
                this.$dispatch('toast', {
                    type: 'success',
                    message: 'Publication saved'
                });
            },

            edit(i) {
                const it = this.items[i];
                if (!it) return;
                this.form = JSON.parse(JSON.stringify(it));
                if (!Array.isArray(this.form.tags)) this.form.tags = [];
                this.editingIndex = i;
                this.showForm = true;
                try {
                    window.scrollTo({
                        top: 0,
                        behavior: 'smooth'
                    });
                } catch {}
            },

            remove(i) {
                Alpine.store('resume').publications.splice(i, 1);
                Alpine.store('persistResume')?.();
                if (this.editingIndex === i) this.resetForm();
            },

            addMore() {
                this.resetForm();
                this.showForm = true;
            },

            saveAndNext() {
                if (typeof this.goNext === 'function') this.goNext();
            },
            back() {
                if (typeof this.goBack === 'function') this.goBack();
            },
        }));
        Alpine.data('languagesStep', (goBack, goNext) => ({
            langs: [{
                name: '',
                proficiency: '',
                type: '',
                cert: ''
            }],
            back: goBack,
            saveAndNext: goNext,

            addLang() {
                this.langs.push({
                    name: '',
                    proficiency: '',
                    type: '',
                    cert: ''
                });
            },
            removeLang(i) {
                this.langs.splice(i, 1);
            },

            canCommit(L) {
                return (L.name || '').trim().length > 0;
            },

            commitOne(i) {
                const sec = this.langs[i];
                if (!this.canCommit(sec)) return;
                const copy = {
                    name: (sec.name || '').trim(),
                    proficiency: (sec.proficiency || '').trim(),
                    type: (sec.type || '').trim(),
                    cert: (sec.cert || '').trim(),
                };
                const store = Alpine.store('resume');
                store.languages = store.languages || [];
                const idx = store.languages.findIndex(x => (x.name || '').toLowerCase() === copy.name.toLowerCase());
                if (idx >= 0) store.languages.splice(idx, 1, copy);
                else store.languages.push(copy);
                Alpine.store('persistResume')?.();
                // clear this section
                this.langs.splice(i, 1, {
                    name: '',
                    proficiency: '',
                    type: '',
                    cert: ''
                });
            },

            // save all & next
            saveAndNext() {
                const store = Alpine.store('resume');
                const toCommit = this.langs
                    .map(l => ({
                        ...l,
                        name: (l.name || '').trim()
                    }))
                    .filter(this.canCommit);
                // upsert by name
                store.languages = store.languages || [];
                toCommit.forEach(L => {
                    const idx = store.languages.findIndex(x => (x.name || '').toLowerCase() === L.name.toLowerCase());
                    if (idx >= 0) store.languages.splice(idx, 1, L);
                    else store.languages.push(L);
                });
                Alpine.store('persistResume')?.();
                if (typeof goNext === 'function') goNext();
            },

            // committed list actions
            editCommitted(k) {
                const item = (Alpine.store('resume').languages || [])[k];
                if (!item) return;
                this.langs.push(JSON.parse(JSON.stringify(item)));
                // optional: remove original, so re-commit overrides
                Alpine.store('resume').languages.splice(k, 1);
                Alpine.store('persistResume')?.();
            },
            removeCommitted(k) {
                Alpine.store('resume').languages.splice(k, 1);
                Alpine.store('persistResume')?.();
            },
        }));
        Alpine.data('hobbiesStep', (goBack, goNext) => ({
            hobbies: [{
                title: '',
                skills: [],
                temp: ''
            }],
            back: goBack,
            saveAndNext: goNext,

            addHobby() {
                this.hobbies.push({
                    title: '',
                    skills: [],
                    temp: ''
                });
            },
            removeHobby(i) {
                this.hobbies.splice(i, 1);
            },

            addSkill(i) {
                const v = (this.hobbies[i].temp || '').trim().replace(/,$/, '');
                if (!v) return;
                if (!this.hobbies[i].skills.includes(v)) this.hobbies[i].skills.push(v);
                this.hobbies[i].temp = '';
            },
            removeSkill(i, j) {
                this.hobbies[i].skills.splice(j, 1);
            },

            canCommit(H) {
                return (H.title || '').trim().length > 0;
            },

            commitOne(i) {
                const sec = this.hobbies[i];
                if (!this.canCommit(sec)) return;
                const copy = {
                    title: (sec.title || '').trim(),
                    skills: Array.isArray(sec.skills) ? [...sec.skills] : [],
                };
                const store = Alpine.store('resume');
                store.hobbies = store.hobbies || [];
                const idx = store.hobbies.findIndex(x => (x.title || '').toLowerCase() === copy.title.toLowerCase());
                if (idx >= 0) store.hobbies.splice(idx, 1, copy);
                else store.hobbies.push(copy);
                Alpine.store('persistResume')?.();
                // clear this section
                this.hobbies.splice(i, 1, {
                    title: '',
                    skills: [],
                    temp: ''
                });
            },

            saveAndNext() {
                const store = Alpine.store('resume');
                const toCommit = this.hobbies
                    .map(h => ({
                        ...h,
                        title: (h.title || '').trim(),
                        skills: Array.isArray(h.skills) ? h.skills.filter(Boolean) : []
                    }))
                    .filter(this.canCommit);
                store.hobbies = store.hobbies || [];
                toCommit.forEach(H => {
                    const idx = store.hobbies.findIndex(x => (x.title || '').toLowerCase() === H.title.toLowerCase());
                    if (idx >= 0) store.hobbies.splice(idx, 1, H);
                    else store.hobbies.push(H);
                });
                Alpine.store('persistResume')?.();
                if (typeof goNext === 'function') goNext();
            },

            // committed list actions
            editCommitted(k) {
                const item = (Alpine.store('resume').hobbies || [])[k];
                if (!item) return;
                this.hobbies.push(JSON.parse(JSON.stringify(item)));
                Alpine.store('resume').hobbies.splice(k, 1);
                Alpine.store('persistResume')?.();
            },
            removeCommitted(k) {
                Alpine.store('resume').hobbies.splice(k, 1);
                Alpine.store('persistResume')?.();
            },
        }));
        console.log('[resume] Alpine initialized; store =', Alpine.store('resume'));
    });
</script>






@endsection