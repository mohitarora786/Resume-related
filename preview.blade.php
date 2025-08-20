{{-- resources/views/Templates/Resumes/template1-preview.blade.php --}}
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resume Template 1</title>

    {{-- Load Tailwind + your JS --}}
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
</head>

<body class="ml-15 mr-15 pl-10 pr-10">
    <div class="resume-template-1 w-full rounded-xl shadow-lg ring-1 ring-slate-700 overflow-hidden bg-white text-slate-900 ">
        <style>
            .resume-template-1 {
                font-family: 'Latin Modern Roman', serif;
                font-size: 11pt;
                line-height: 1.4;
                padding: 2rem;
            }

            .resume-template-1 * {
                box-sizing: border-box;
            }

            .resume-template-1 .last-updated {
                text-align: right;
                font-size: 9pt;
                font-style: italic;
                color: #555;
            }

            .resume-template-1 .header {
                text-align: center;
                margin-bottom: 1.2em;
            }

            .resume-template-1 .name {
                font-size: 20pt;
                font-weight: bold;
                margin-bottom: 0.3em;
            }

            .resume-template-1 .contact-info {
                font-size: 9.5pt;
                color: #222;
                display: flex;
                flex-wrap: wrap;
                justify-content: center;
                gap: 0.8em;
            }

            .resume-template-1 .contact-info i {
                margin-right: 0.3em;
            }

            .resume-template-1 .section {
                margin-bottom: 1.5em;
            }

            .resume-template-1 .section-title {
                font-size: 12pt;
                font-weight: bold;
                margin-bottom: 0.4em;
            }

            .resume-template-1 .entry {
                margin-bottom: 0.8em;
            }

            .resume-template-1 .entry-header {
                display: flex;
                justify-content: space-between;
                font-weight: bold;
            }

            .resume-template-1 .entry-sub {
                font-style: italic;
                font-size: 10pt;
                display: flex;
                justify-content: space-between;
            }

            .resume-template-1 .bullet-list {
                margin-left: 1em;
                margin-top: 0.3em;
            }

            .resume-template-1 .bullet-list li {
                list-style: none;
                position: relative;
                margin-bottom: 0.2em;
            }

            .resume-template-1 .bullet-list li:before {
                content: "◦";
                position: absolute;
                left: -1em;
            }

            .resume-template-1 a {
                color: #2563eb;
                text-decoration: none;
            }

            .resume-template-1 .tags {
                display: flex;
                flex-wrap: wrap;
                gap: .35rem .6rem;
            }

            .resume-template-1 .tag {
                border: 1px solid #333;
                padding: .05rem .4rem;
                border-radius: .25rem;
                font-size: 10pt;
            }
        </style>
        {{-- Header --}}
        <div class="header">

            <div class="name text-center text-5">
                <!-- If Alpine store is present, show live name -->
                <span
                    x-show="$store && $store.resume && ((($store.resume.firstName || '') + ' ' + ($store.resume.lastName || '')).trim().length > 0)"
                    x-text="(($store.resume.firstName || '') + ' ' + ($store.resume.lastName || '')).trim()">
                </span>

                <!-- Fallback to server-rendered values -->
                <span
                    x-show="!($store && $store.resume && ((($store.resume.firstName || '') + ' ' + ($store.resume.lastName || '')).trim().length > 0))"
                    class="text-4xl">
                    {{ $first_name ?? 'John' }} {{ $last_name ?? 'Doe' }}
                </span>

            </div>

            <!-- Professional Title (always below name) -->
            <div class="prof-title text-center text-2xl">
                <!-- Live from Alpine -->
                <span
                    x-show="$store && $store.resume && ($store.resume.prof_title || '').trim().length > 0"
                    x-text="$store.resume.prof_title">
                </span>

                <!-- Fallback to server value -->
                <span
                    x-show="!($store && $store.resume && ($store.resume.prof_title || '').trim().length > 0)">
                    {{ $prof_title ?? 'Professional Title' }}
                </span>
            </div>



            <div class="contact-info ml-40">
                <span class="ml-20">
                    <i class="fas fa-map-marker-alt"></i>

                    <!-- Live Alpine values -->
                    <span
                        x-show="$store && $store.resume && (
      ($store.resume.city || $store.resume.state || $store.resume.country || '').trim().length > 0
    )"
                        x-text="[($store.resume.city || ''), ($store.resume.state || ''), ($store.resume.country || '')]
              .filter(Boolean).join(', ')">
                    </span>

                    <!-- Fallback server values -->
                    <span
                        x-show="!($store && $store.resume && (
      ($store.resume.city || $store.resume.state || $store.resume.country || '').trim().length > 0
    ))"
                        class="text-base">
                        {{ collect([$city ?? null, $state ?? null, $country ?? null])->filter()->join(', ') ?: 'Your Location | ' }}
                    </span>
                </span>

                <!-- EMAIL -->
                <span>
                    <i class="fas fa-envelope"></i>

                    <!-- If Alpine store has value -->
                    <span
                        x-show="$store && $store.resume && ($store.resume.email || '').trim().length > 0"
                        x-text="$store.resume.email"></span>

                    <!-- Fallback -->
                    <span
                        x-show="!($store && $store.resume && ($store.resume.email || '').trim().length > 0)"
                        class="text-base">
                        {{ $email ?? 'youremail@yourdomain.com | ' }}
                    </span>
                </span>

                <!-- DATE OF BIRTH -->
                <span class="ml-2">
                    <i class="fas fa-calendar"></i>

                    <!-- If Alpine store has value -->
                    <span
                        x-show="$store && $store.resume && ($store.resume.dob || '').trim().length > 0"
                        x-text="$store.resume.dob"></span>

                    <!-- Fallback -->
                    <span
                        x-show="!($store && $store.resume && ($store.resume.dob || '').trim().length > 0)"
                        class="text-base">
                        {{ $dob ?? '1990-01-01 | ' }}
                    </span>
                </span>

                <span>
                    <i class="fas fa-phone"></i>

                    <!-- If Alpine store has value -->
                    <span
                        x-show="$store && $store.resume && ($store.resume.contact_number || '').trim().length > 0"
                        x-text="$store.resume.contact_number">
                    </span>

                    <!-- Fallback to server-rendered -->

                    <span
                        x-show="!($store && $store.resume && ($store.resume.contact_number || '').trim().length > 0)"
                        class="text-base -ml-[30%]">
                        {{ $contact_number ?? '0541 999 99 99 | ' }}
                    </span>

                    <span class="text-base ml-5">
                        {{ $contact_number ?? 'yourwebsite.com' }}
                    </span>
                    <span><br></span>
                    <span class="-ml-[130%]">
                        <span class="text-base">
                            linkedin.com/in/yourusername |
                        </span>
                        <span class="text-base">
                            github.com/yourusername
                        </span>
                    </span>
                </span>


                {{-- Website --}}
                <span>
                    <a x-show="$store && $store.resume && ($store.resume.website || '').trim().length > 0"
                        :href="$store.resume.website"
                        target="_blank"
                        style="margin-right:10px;">
                        <i class="fas fa-globe"></i>
                    </a>

                    <a x-show="!($store && $store.resume && ($store.resume.website || '').trim().length > 0)"
                        href="{{ $website ?? '#' }}"
                        target="_blank"
                        style="margin-right:10px;">
                        <i class="fas fa-globe"></i>
                    </a>
                </span>

                {{-- LinkedIn --}}
                <span>
                    <a x-show="$store && $store.resume && ($store.resume.linkedin || '').trim().length > 0"
                        :href="$store.resume.linkedin"
                        target="_blank"
                        style="margin-right:10px;">
                        <i class="fab fa-linkedin"></i>
                    </a>

                    <a x-show="!($store && $store.resume && ($store.resume.linkedin || '').trim().length > 0)"
                        href="{{ $linkedin ?? '#' }}"
                        target="_blank"
                        style="margin-right:10px;">
                        <i class="fab fa-linkedin"></i>
                    </a>
                </span>

                {{-- GitHub --}}
                <span>
                    <a x-show="$store && $store.resume && ($store.resume.github || '').trim().length > 0"
                        :href="$store.resume.github"
                        target="_blank"
                        style="margin-right:10px;">
                        <i class="fab fa-github"></i>
                    </a>

                    <a x-show="!($store && $store.resume && ($store.resume.github || '').trim().length > 0)"
                        href="{{ $github ?? '#' }}"
                        target="_blank"
                        style="margin-right:10px;">
                        <i class="fab fa-github"></i>
                    </a>
                </span>


            </div>
        </div>

        {{-- Professional Summary --}}
        <div class="section">
            <div class=" font-bold text-2xl">Professional Summary</div>
            <p class="font-semibold border-b-2 border-black pb-1">
            </p>

            <!-- LIVE from Alpine (preserve line breaks) -->
            <p
                x-show="$store && $store.resume && ($store.resume.prof_summary || '').trim().length > 0"
                x-html="($store.resume.prof_summary || '').replace(/\n/g,'<br>')"
                class="text-sm leading-relaxed">
            </p>

            <!-- Fallback to server value (already preserves line breaks) -->
            <p
                x-show="!($store && $store.resume && ($store.resume.prof_summary || '').trim().length > 0)"
                class="text-base leading-relaxed">
                {!! nl2br(e($prof_summary ?? 'Results-driven software engineer with experience in backend APIs, scalable systems, and product UI/UX—adept at shipping features fast with clean code and measurable impact.')) !!}
            </p>

        </div>
        {{-- Education --}}
        <div class="section" x-data="{}">
            <div class="font-bold text-2xl">Education</div>
            <p class="font-semibold border-b-2 border-black pb-1">
            </p>

            {{-- LIVE (Alpine store) --}}
            <template
                x-if="$store?.resume && Array.isArray($store.resume.educations) && $store.resume.educations.length"
                x-cloak>
                <div x-init="console.log('[preview:education] live render', $store.resume.educations)">
                    <template x-for="(ed, i) in $store.resume.educations" :key="'edu-'+i">
                        <div class="entry mt-3 border border-slate-700 rounded-xl p-4 ">
                            <div class="entry-header flex items-start justify-between gap-3">
                                <span class="font-semibold"
                                    x-text="(ed.institution || 'Institution') + ' — ' + (ed.degree_name || 'Degree')"></span>
                                <span class="text-sm text-slate-400"
                                    x-text="(ed.start_date || '—') + ' – ' + (ed.end_date || 'Present')"></span>
                            </div>

                            <ul class="bullet-list mt-2">
                                <template x-if="(ed.focus || '').trim().length">
                                    <li><span x-text="'Focus: ' + ed.focus"></span></li>
                                </template>
                                <template x-if="(ed.cgpa || '').trim().length">
                                    <li><span x-text="'CGPA: ' + ed.cgpa"></span></li>
                                </template>
                                <template x-if="(ed.mode || '').trim().length">
                                    <li><span x-text="'Mode: ' + ed.mode"></span></li>
                                </template>
                                <template x-if="(ed.city || ed.state || ed.country)">
                                    <li>
                                        <span x-text="[ed.city || '', ed.state || '', ed.country || ''].filter(Boolean).join(', ')"></span>
                                    </li>
                                </template>
                                <template x-if="(ed.description || '').trim().length">
                                    <li x-html="(ed.description || '').replace(/\n/g,'<br>')"></li>
                                </template>
                            </ul>
                        </div>
                    </template>
                </div>
            </template>

            {{-- SERVER (fallback; only show when no live data) --}}
            @php $educations = $educations ?? []; @endphp
            <div x-show="!($store?.resume && Array.isArray($store.resume.educations) && $store.resume.educations.length)">
                @if(!empty($educations))
                @foreach($educations as $e)
                @php
                $inst = trim($e['institution'] ?? '');
                $deg = trim($e['degree_name'] ?? ($e['degree'] ?? ''));
                $start = trim($e['start_date'] ?? ($e['start'] ?? ''));
                $end = trim($e['end_date'] ?? ($e['end'] ?? ''));
                $focus = trim($e['focus'] ?? '');
                $cgpa = trim($e['cgpa'] ?? '');
                $mode = trim($e['mode'] ?? '');
                $loc = collect([$e['city'] ?? null, $e['state'] ?? null, $e['country'] ?? null])->filter()->join(', ');
                $desc = $e['description'] ?? null;
                $details= is_array($e['details'] ?? null) ? $e['details'] : [];
                @endphp

                <div class="entry mt-3">
                    <div class="entry-header flex items-start justify-between gap-3">
                        <span class="font-semibold">
                            {{ $inst !== '' ? $inst : 'Institution' }} — {{ $deg !== '' ? $deg : 'Degree' }}
                        </span>
                        <span class="text-sm text-slate-400">
                            {{ $start !== '' ? $start : '—' }} – {{ $end !== '' ? $end : 'Present' }}
                        </span>
                    </div>

                    @if(!empty($details))
                    <ul class="bullet-list mt-2">
                        @foreach($details as $d)
                        <li>{{ $d }}</li>
                        @endforeach
                    </ul>
                    @elseif($focus || $cgpa || $mode || $loc || $desc)
                    <ul class="bullet-list mt-2">
                        @if($focus) <li>Focus: {{ $focus }}</li> @endif
                        @if($cgpa) <li>CGPA: {{ $cgpa }}</li> @endif
                        @if($mode) <li>Mode: {{ $mode }}</li> @endif
                        @if($loc) <li>{{ $loc }}</li> @endif
                        @if(($desc ?? '') !== '') <li>{!! nl2br(e($desc)) !!}</li> @endif
                    </ul>
                    @endif
                </div>
                @endforeach
                @else
                {{-- DEFAULT sample --}}
                <div class="entry mt-3 ">
                    <div class="entry-header flex items-start justify-between gap-3">
                        <span class="font-semibold text-base">
                            {{ $edu_university ?? 'University of Pennsylvania' }}
                            {{ $edu_degree ?? 'BS in Computer Science' }}
                        </span>
                        <span class="text-base">
                            {{ $edu_start ?? 'Sept 2000' }} – {{ $edu_end ?? 'May 2005' }}
                        </span>
                    </div>
                    <ul class="bullet-list text-base mt-2">
                        <li>GPA: {{ $edu_gpa ?? '3.9/4.0 (a link to somewhere)' }}</li>
                        <li>Coursework: {{ $edu_courses ?? 'Computer Architecture, Algorithms, Theory' }}</li>
                    </ul>
                </div>
                @endif
            </div>
        </div>



        {{-- Experience (Live-first, then server, then fallback) --}}
        <div class="section" x-data="{}">
            <div class="font-bold text-2xl">Experience</div>
            <p class="font-semibold border-b-2 border-black pb-1">
            </p>

            {{-- LIVE: Alpine store --}}
            <template x-if="$store.resume && $store.resume.experiences && $store.resume.experiences.length" x-cloak>
                <div x-init="console.log('[preview:exp] live render', $store.resume.experiences)">
                    <template x-for="(x, i) in $store.resume.experiences" :key="'exp-'+i">
                        <div class="entry mt-3 border border-slate-700 rounded-xl p-4 ">
                            <div class="entry-header flex items-start justify-between gap-3">
                                <span class="font-semibold"
                                    x-text="(x.company_name || 'Company') + ' | ' + (x.job_title || 'Job Title')"></span>
                                <span class="text-sm text-slate-400"
                                    x-text="(x.start_date || '—') + ' – ' + (x.end_date || 'Present')"></span>
                            </div>

                            <div class="entry-sub text-xs text-slate-400 mt-1" x-show="x.meta_line" x-text="x.meta_line"></div>
                            <div class="entry-sub text-xs text-slate-500"
                                x-show="[x.city, x.state, x.country].filter(Boolean).length"
                                x-text="[x.city, x.state, x.country].filter(Boolean).join(', ')"></div>

                            <div class="mt-2 text-sm whitespace-pre-line" x-show="x.description" x-text="x.description"></div>

                            <div class="text-xs mt-1" x-show="x.company_url">
                                <a :href="x.company_url" target="_blank" class="text-cyan-400 hover:underline"
                                    x-text="x.company_url"></a>
                            </div>
                        </div>
                    </template>
                </div>
            </template>

            {{-- SERVER: PHP-rendered --}}
            @php $experiences = $experiences ?? []; @endphp
            @if(!empty($experiences))
            @foreach($experiences as $x)
            @php
            $job = trim($x['job_title'] ?? '');
            $company = trim($x['company_name'] ?? '');
            $start = trim($x['start_date'] ?? '');
            $end = trim($x['end_date'] ?? '');
            $dates = trim(($start !== '' ? $start : '—') . ' – ' . ($end !== '' ? $end : 'Present'));
            $loc = implode(', ', array_filter([$x['city'] ?? '', $x['state'] ?? '', $x['country'] ?? '']));
            $meta = trim($x['meta_line'] ?? '');
            $desc = trim($x['description'] ?? '');
            $url = trim($x['company_url'] ?? '');
            @endphp
            <div class="entry mt-3"
                x-show="!($store.resume && $store.resume.experiences && $store.resume.experiences.length)">
                <div class="entry-header flex items-start justify-between gap-3">
                    <span class="font-semibold">{{ $company !== '' ? $company : 'Company' }} | {{ $job !== '' ? $job : 'Job Title' }}</span>
                    <span class="text-sm text-slate-400">{{ $dates }}</span>
                </div>

                @if($meta !== '')
                <div class="entry-sub text-xs text-slate-400 mt-1">{{ $meta }}</div>
                @endif

                @if($loc !== '')
                <div class="entry-sub text-xs text-slate-500">{{ $loc }}</div>
                @endif

                @if($desc !== '')
                <div class="mt-2 text-sm whitespace-pre-line">{{ $desc }}</div>
                @endif

                @if($url !== '')
                <div class="text-xs mt-1">
                    <a href="{{ $url }}" target="_blank" class="text-cyan-400 hover:underline">{{ $url }}</a>
                </div>
                @endif
            </div>
            @endforeach

            {{-- DEFAULT sample (when nothing present anywhere) --}}
            @else
            <div class="entry mt-3"
                x-show="!($store.resume && $store.resume.experiences && $store.resume.experiences.length)">
                <div class=" flex items-start justify-between gap-3">
                    <span class="font-semibold text-base">{{ $exp_title ?? 'Software Engineer, ' }} {{ $exp_company ?? 'Apple, ' }} {{ $exp_location ?? 'Cupertino, CA' }} </span>
                    <span class="text-base font-bold">{{ $exp_start ?? 'Jun 2005' }} – {{ $exp_end ?? 'Aug 2007' }}</span>
                </div>
                <ul class="bullet-list text-base mt-2">
                    <li>Reduced render time by 75% for buddy lists; integrated search; redesigned file format and indexing.</li>
                    <li>Integrated iChat with Spotlight Search by creating a tool to extract metadata from saved chat transcripts and provide metadata to a system wide search database</li>
                    <li>Redesigned chat file format and implemented backward compatibility for search</li>
                </ul>
            </div>

            <div class="entry mt-3"
                x-show="!($store.resume && $store.resume.experiences && $store.resume.experiences.length)">
                <div class=" flex items-start justify-between gap-3">
                    <span class="font-semibold text-base">{{ $exp_title ?? 'Software Engineer Intern, ' }} {{ $exp_company ?? 'Microsoft Redmond, ' }} {{ $exp_location ?? 'WA' }}</span>
                    <span class="text-base font-bold">{{ $exp_start ?? 'Jun 2005' }} – {{ $exp_end ?? 'Aug 2007' }}</span>
                </div>
                <ul class="bullet-list text-base mt-2">
                    <li>Designed a Ul for the VS open file switcher (Ctrl-Tab) and extended it to tool windows
                    </li>
                    <li>Created a service to provide gradient across VS and VS add-ins, optimizing its performance via caching</li>
                    <li>Built an app to compute the similarity of all methods in a codebase, reducing the time from O(w²) to O(nlogn)</li>
                    <li>Created a test case generation tool that creates random XML. docs from XML. Schema</li>
                    <li>Automated the extraction and processing of large datasets from legacy systems using SQL and Perl scripts</li>
                </ul>
            </div>
            @endif
        </div>


        {{-- Certifications (Live-first, then server, then fallback) --}}
        <div class="section" x-data="{}">
            <div class="font-bold text-2xl">Certifications</div>
            <p class="font-semibold border-b-2 border-black pb-1">
            </p>

            {{-- LIVE: Alpine store --}}
            <template x-if="$store.resume && $store.resume.certifications && $store.resume.certifications.length" x-cloak>
                <div x-init="console.log('[preview:certs] live render', $store.resume.certifications)">
                    <template x-for="(c, i) in $store.resume.certifications" :key="'cert-'+i">
                        <div class="entry mt-3 border border-slate-700 rounded-xl p-4 ">
                            <div class="flex items-start justify-between gap-3">
                                <span class="font-semibold"
                                    x-text="(c.name || 'Certification') + (c.issuer ? ' | ' + c.issuer : '')"></span>
                                <span class="text-sm text-slate-400"
                                    x-text="(c.start_date || '—') + ' – ' + (c.end_date || 'Present')"></span>
                            </div>

                            <div class="text-xs text-slate-400 mt-1" x-show="c.meta_line" x-text="c.meta_line"></div>

                            <div class="flex flex-wrap gap-2 mt-2" x-show="(c.skills_covered||[]).length">
                                <template x-for="(tag, j) in c.skills_covered" :key="j">
                                    <span class="inline-flex items-center px-2.5 h-7 rounded-full bg-slate-800 text-slate-100 border border-slate-700 text-xs"
                                        x-text="tag"></span>
                                </template>
                            </div>

                            <div class="text-xs text-slate-500 mt-1"
                                x-show="[c.city, c.state, c.country].filter(Boolean).length"
                                x-text="[c.city, c.state, c.country].filter(Boolean).join(', ')"></div>

                            <div class="mt-2 text-sm whitespace-pre-line" x-show="c.description" x-text="c.description"></div>

                            <div class="text-xs mt-2 flex gap-4">
                                <template x-if="c.verify_url">
                                    <a :href="c.verify_url" target="_blank" rel="noopener" class="text-cyan-400 hover:underline">Verify</a>
                                </template>
                                <template x-if="c.cert_url">
                                    <a :href="c.cert_url" target="_blank" rel="noopener" class="text-cyan-400 hover:underline">Certificate</a>
                                </template>
                            </div>
                        </div>
                    </template>
                </div>
            </template>

            {{-- SERVER: PHP-rendered --}}
            @php $certs = $certifications ?? []; @endphp
            @if(!empty($certs))
            @foreach($certs as $c)
            @php
            $name = trim($c['name'] ?? '');
            $issuer = trim($c['issuer'] ?? '');
            $start = trim($c['start_date'] ?? '');
            $end = trim($c['end_date'] ?? '');
            $dates = ($start !== '' ? $start : '—') . ' – ' . ($end !== '' ? $end : 'Present');
            $meta = trim($c['meta_line'] ?? '');
            $desc = trim($c['description'] ?? '');
            $skills = is_array($c['skills_covered'] ?? null) ? $c['skills_covered'] : [];
            $loc = implode(', ', array_filter([$c['city'] ?? '', $c['state'] ?? '', $c['country'] ?? '']));
            $verify = trim($c['verify_url'] ?? '');
            $cert = trim($c['cert_url'] ?? '');
            @endphp

            <div class="entry mt-3 border border-slate-700 rounded-xl p-4 "
                x-show="!($store.resume && $store.resume.certifications && $store.resume.certifications.length)">
                <div class="flex items-start justify-between gap-3">
                    <span class="font-semibold">
                        {{ $name !== '' ? $name : 'Certification' }}@if($issuer !== '') | {{ $issuer }} @endif
                    </span>
                    <span class="text-sm text-slate-400">{{ $dates }}</span>
                </div>

                @if($meta !== '')
                <div class="text-xs text-slate-400 mt-1">{{ $meta }}</div>
                @endif

                @if(!empty($skills))
                <div class="flex flex-wrap gap-2 mt-2">
                    @foreach($skills as $tag)
                    @php $tagv = trim((string)$tag); @endphp
                    @if($tagv !== '')
                    <span class="inline-flex items-center px-2.5 h-7 rounded-full bg-slate-800 text-slate-100 border border-slate-700 text-xs">
                        {{ $tagv }}
                    </span>
                    @endif
                    @endforeach
                </div>
                @endif

                @if($loc !== '')
                <div class="text-xs text-slate-500 mt-1">{{ $loc }}</div>
                @endif

                @if($desc !== '')
                <div class="mt-2 text-sm whitespace-pre-line">{{ $desc }}</div>
                @endif

                @if($verify !== '' || $cert !== '')
                <div class="text-xs mt-2 flex gap-4">
                    @if($verify !== '')
                    <a href="{{ $verify }}" target="_blank" rel="noopener" class="text-cyan-400 hover:underline">Verify</a>
                    @endif
                    @if($cert !== '')
                    <a href="{{ $cert }}" target="_blank" rel="noopener" class="text-cyan-400 hover:underline">Certificate</a>
                    @endif
                </div>
                @endif
            </div>
            @endforeach

            {{-- DEFAULT sample --}}
            @else
            <div class="entry mt-3"
                x-show="!($store.resume && $store.resume.certifications && $store.resume.certifications.length)">
                <div class="flex items-start justify-between gap-3">
                    <span class="font-semibold text-base">{{ $cert_name ?? 'AWS Certified Solutions Architect' }} | {{ $cert_issuer ?? 'Amazon Web Services' }}</span>
                    <span class="text-base font-bold">{{ $cert_dates ?? '2024' }}</span>
                </div>
                <div class="text-base mt-1">{{ $cert_meta ?? 'Validates core AWS architecture & deployment skills.' }}</div>
                <div class="flex flex-wrap gap-2 mt-2">
                    <span class="inline-flex items-center px-2.5 h-7 rounded-full bg-slate-800 text-slate-100 border border-slate-700 text-xs">VPC</span>
                    <span class="inline-flex items-center px-2.5 h-7 rounded-full bg-slate-800 text-slate-100 border border-slate-700 text-xs">IAM</span>
                    <span class="inline-flex items-center px-2.5 h-7 rounded-full bg-slate-800 text-slate-100 border border-slate-700 text-xs">EC2</span>
                </div>
                <div class="text-base mt-1">{{ $cert_loc ?? 'Remote' }}</div>
                <div class="mt-2 text-base whitespace-pre-line">{{ $cert_desc ?? 'Designed highly available architectures and automated deployments.' }}</div>
                <div class="text-base mt-2 flex gap-4">
                    <a href="{{ $cert_verify ?? '#' }}" target="_blank" rel="noopener" class="text-cyan-400 hover:underline">Verify</a>
                    <a href="{{ $cert_link ?? '#' }}" target="_blank" rel="noopener" class="text-cyan-400 hover:underline">Certificate</a>
                </div>
            </div>
            @endif
        </div>
        {{-- Volunteer (Live-first, then server, then fallback) --}}
        <div class="section" x-data="{}">
            <div class="font-bold text-2xl">Volunteer</div>
            <p class="font-semibold border-b-2 border-black pb-1">
            </p>

            {{-- LIVE --}}
            <template x-if="$store.resume && $store.resume.volunteers && $store.resume.volunteers.length" x-cloak>
                <div x-init="console.log('[preview:volunteers] live render', $store.resume.volunteers)">
                    <template x-for="(v, i) in $store.resume.volunteers" :key="'vol-'+i">
                        <div class="entry mt-3 border border-slate-700 rounded-xl p-4 ">
                            <div class="flex items-start justify-between gap-3">
                                <span class="font-semibold"
                                    x-text="(v.role || 'Volunteer') + (v.org_name ? ' | ' + v.org_name : '')"></span>
                                <span class="text-sm text-slate-400"
                                    x-text="(v.start_date || '—') + ' – ' + (v.end_date || 'Present')"></span>
                            </div>

                            <div class="text-xs text-slate-400 mt-1" x-show="v.meta_line" x-text="v.meta_line"></div>

                            <div class="text-xs text-slate-500 mt-1"
                                x-show="[v.city, v.state, v.country].filter(Boolean).length"
                                x-text="[v.city, v.state, v.country].filter(Boolean).join(', ')"></div>

                            <div class="mt-2 text-sm whitespace-pre-line" x-show="v.description" x-text="v.description"></div>

                            <div class="text-xs mt-2" x-show="v.org_url">
                                <a :href="v.org_url" target="_blank" rel="noopener" class="text-cyan-400 hover:underline">Organization</a>
                            </div>
                        </div>
                    </template>
                </div>
            </template>

            {{-- SERVER --}}
            @php $vols = $volunteers ?? []; @endphp
            @if(!empty($vols))
            @foreach($vols as $v)
            @php
            $role = trim($v['role'] ?? '');
            $org = trim($v['org_name'] ?? '');
            $start= trim($v['start_date'] ?? '');
            $end = trim($v['end_date'] ?? '');
            $dates= ($start !== '' ? $start : '—') . ' – ' . ($end !== '' ? $end : 'Present');
            $meta = trim($v['meta_line'] ?? '');
            $desc = trim($v['description'] ?? '');
            $loc = implode(', ', array_filter([$v['city'] ?? '', $v['state'] ?? '', $v['country'] ?? '']));
            $link = trim($v['org_url'] ?? '');
            @endphp
            <div class="entry mt-3 border border-slate-700 rounded-xl p-4 "
                x-show="!($store.resume && $store.resume.volunteers && $store.resume.volunteers.length)">
                <div class="flex items-start justify-between gap-3">
                    <span class="font-semibold">{{ $role !== '' ? $role : 'Volunteer' }}@if($org !== '') | {{ $org }} @endif</span>
                    <span class="text-sm text-slate-400">{{ $dates }}</span>
                </div>
                @if($meta !== '') <div class="text-xs text-slate-400 mt-1">{{ $meta }}</div> @endif
                @if($loc !== '') <div class="text-xs text-slate-500 mt-1">{{ $loc }}</div> @endif
                @if($desc !== '') <div class="mt-2 text-sm whitespace-pre-line">{{ $desc }}</div> @endif
                @if($link !== '') <div class="text-xs mt-2"><a href="{{ $link }}" target="_blank" rel="noopener" class="text-cyan-400 hover:underline">Organization</a></div> @endif
            </div>
            @endforeach
            @else
            {{-- DEFAULT --}}
            <div class="entry mt-3"
                x-show="!($store.resume && $store.resume.volunteers && $store.resume.volunteers.length)">
                <div class="flex items-start justify-between gap-3">
                    <span class="font-semibold text-base">{{ $vol_role ?? 'Community Mentor' }} | {{ $vol_org ?? 'Local Tech NGO' }}</span>
                    <span class="text-base font-bold">{{ $vol_dates ?? '2023 – Present' }}</span>
                </div>
                <div class="text-base mt-1">{{ $vol_meta ?? 'Coordinated weekly coding workshops for students.' }}</div>
                <div class="text-base mt-1">{{ $vol_loc ?? 'Remote' }}</div>
                <div class="mt-2 text-base whitespace-pre-line">{{ $vol_desc ?? 'Designed curriculum and mentored 40+ students.' }}</div>
            </div>
            @endif
        </div>
        {{-- Awards (Live-first, then server, then fallback) --}}
        <div class="section" x-data="{}">
            <div class="text-2xl font-bold">Awards</div>
            <p class="font-semibold border-b-2 border-black pb-1">
            </p>

            {{-- LIVE --}}
            <template x-if="$store.resume && $store.resume.awards && $store.resume.awards.length" x-cloak>
                <div x-init="console.log('[preview:awards] live render', $store.resume.awards)">
                    <template x-for="(a, i) in $store.resume.awards" :key="'awd-'+i">
                        <div class="entry mt-3 border border-slate-700 rounded-xl p-4 ">
                            <div class="flex items-start justify-between gap-3">
                                <span class="font-semibold"
                                    x-text="(a.title || 'Award') + (a.organization ? ' | ' + a.organization : '')"></span>
                                <span class="text-sm text-slate-400" x-text="a.award_date || ''"></span>
                            </div>

                            <div class="text-xs text-slate-400 mt-1" x-show="a.meta_line" x-text="a.meta_line"></div>

                            <div class="text-xs text-slate-500 mt-1" x-show="a.associated_work"
                                x-text="'Work: ' + a.associated_work"></div>

                            <div class="mt-2 text-sm whitespace-pre-line" x-show="a.description" x-text="a.description"></div>

                            <div class="text-xs mt-2 flex gap-4">
                                <template x-if="a.award_link">
                                    <a :href="a.award_link" target="_blank" rel="noopener" class="text-cyan-400 hover:underline">Link</a>
                                </template>
                                <template x-if="a.verify_link">
                                    <a :href="a.verify_link" target="_blank" rel="noopener" class="text-cyan-400 hover:underline">Verify</a>
                                </template>
                            </div>
                        </div>
                    </template>
                </div>
            </template>

            {{-- SERVER --}}
            @php $awds = $awards ?? []; @endphp
            @if(!empty($awds))
            @foreach($awds as $a)
            @php
            $title = trim($a['title'] ?? '');
            $org = trim($a['organization'] ?? '');
            $date = trim($a['award_date'] ?? '');
            $meta = trim($a['meta_line'] ?? '');
            $work = trim($a['associated_work'] ?? '');
            $desc = trim($a['description'] ?? '');
            $link = trim($a['award_link'] ?? '');
            $verify= trim($a['verify_link'] ?? '');
            @endphp
            <div class="entry mt-3 border border-slate-700 rounded-xl p-4 "
                x-show="!($store.resume && $store.resume.awards && $store.resume.awards.length)">
                <div class="flex items-start justify-between gap-3">
                    <span class="font-semibold">
                        {{ $title !== '' ? $title : 'Award' }}@if($org !== '') | {{ $org }} @endif
                    </span>
                    <span class="text-sm text-slate-400">{{ $date }}</span>
                </div>
                @if($meta !== '') <div class="text-xs text-slate-400 mt-1">{{ $meta }}</div> @endif
                @if($work !== '') <div class="text-xs text-slate-500 mt-1">Work: {{ $work }}</div> @endif
                @if($desc !== '') <div class="mt-2 text-sm whitespace-pre-line">{{ $desc }}</div> @endif
                @if($link !== '' || $verify !== '')
                <div class="text-xs mt-2 flex gap-4">
                    @if($link !== '') <a href="{{ $link }}" target="_blank" rel="noopener" class="text-cyan-400 hover:underline">Link</a> @endif
                    @if($verify !== '') <a href="{{ $verify }}" target="_blank" rel="noopener" class="text-cyan-400 hover:underline">Verify</a> @endif
                </div>
                @endif
            </div>
            @endforeach
            @else
            {{-- DEFAULT --}}
            <div class="entry mt-3"
                x-show="!($store.resume && $store.resume.awards && $store.resume.awards.length)">
                <div class="flex items-start justify-between gap-3">
                    <span class="font-semibold text-base">{{ $awd_title ?? 'Best Innovator Award' }} | {{ $awd_org ?? 'TechConf' }}</span>
                    <span class="text-base font-bold">{{ $awd_date ?? '2024' }}</span>
                </div>
                <div class="text-base mt-1">{{ $awd_meta ?? 'Recognized for building an ML feature improving accuracy by 28%.' }}</div>
                <div class="text-base mt-1">{{ $awd_work ?? 'Project: Hiring AI Platform' }}</div>
                <div class="mt-2 text-base whitespace-pre-line">{{ $awd_desc ?? 'Selected from 120+ teams.' }}</div>
            </div>
            @endif
        </div>
        {{-- Publications (Live-first, then server, then fallback) --}}
        <div class="section" x-data="{}">
            <div class="text-2xl font-bold">Publications</div>
            <p class="font-semibold border-b-2 border-black pb-1">
            </p>

            {{-- LIVE --}}
            <template x-if="$store.resume && $store.resume.publications && $store.resume.publications.length" x-cloak>
                <div x-init="console.log('[preview:pubs] live render', $store.resume.publications)">
                    <template x-for="(p, i) in $store.resume.publications" :key="'pub-'+i">
                        <div class="entry mt-3 border border-slate-700 rounded-xl p-4 ">
                            <div class="flex items-start justify-between gap-3">
                                <span class="font-semibold" x-text="p.title || 'Publication'"></span>
                                <span class="text-sm text-slate-400" x-text="p.published_date || ''"></span>
                            </div>

                            <div class="text-xs text-slate-500 mt-1" x-show="p.authors || p.published_in">
                                <span x-text="p.authors || ''"></span>
                                <template x-if="p.authors && p.published_in">
                                    <span> — </span>
                                </template>
                                <span x-text="p.published_in || ''"></span>
                            </div>

                            <div class="text-xs text-slate-400 mt-1" x-show="p.meta_line" x-text="p.meta_line"></div>

                            <div class="flex flex-wrap gap-2 mt-2" x-show="(p.tags||[]).length">
                                <template x-for="(tag, j) in p.tags" :key="j">
                                    <span class="inline-flex items-center px-2.5 h-7 rounded-full bg-slate-800 text-slate-100 border border-slate-700 text-xs"
                                        x-text="tag"></span>
                                </template>
                            </div>

                            <div class="mt-2 text-sm whitespace-pre-line" x-show="p.description" x-text="p.description"></div>
                        </div>
                    </template>
                </div>
            </template>

            {{-- SERVER --}}
            @php $pubs = $publications ?? []; @endphp
            @if(!empty($pubs))
            @foreach($pubs as $p)
            @php
            $title = trim($p['title'] ?? '');
            $type = trim($p['publication_type'] ?? '');
            $auth = trim($p['authors'] ?? '');
            $in = trim($p['published_in'] ?? '');
            $date = trim($p['published_date'] ?? '');
            $tags = is_array($p['tags'] ?? null) ? $p['tags'] : [];
            $meta = trim($p['meta_line'] ?? '');
            $desc = trim($p['description'] ?? '');
            @endphp
            <div class="entry mt-3 border border-slate-700 rounded-xl p-4 "
                x-show="!($store.resume && $store.resume.publications && $store.resume.publications.length)">
                <div class="flex items-start justify-between gap-3">
                    <span class="font-semibold">{{ $title !== '' ? $title : 'Publication' }}</span>
                    <span class="text-sm text-slate-400">{{ $date }}</span>
                </div>

                @if($auth !== '' || $in !== '')
                <div class="text-xs text-slate-500 mt-1">
                    {{ $auth }}@if($auth !== '' && $in !== '') — @endif{{ $in }}
                </div>
                @endif

                @if($meta !== '') <div class="text-xs text-slate-400 mt-1">{{ $meta }}</div> @endif

                @if(!empty($tags))
                <div class="flex flex-wrap gap-2 mt-2">
                    @foreach($tags as $tag)
                    @php $tagv = trim((string)$tag); @endphp
                    @if($tagv !== '')
                    <span class="inline-flex items-center px-2.5 h-7 rounded-full bg-slate-800 text-slate-100 border border-slate-700 text-xs">{{ $tagv }}</span>
                    @endif
                    @endforeach
                </div>
                @endif

                @if($desc !== '') <div class="mt-2 text-sm whitespace-pre-line">{{ $desc }}</div> @endif
            </div>
            @endforeach
            @else
            {{-- DEFAULT --}}
            <div class="entry mt-3"
                x-show="!($store.resume && $store.resume.publications && $store.resume.publications.length)">
                <div class="flex items-start justify-between gap-3">
                    <span class="font-semibold text-base">{{ $pub_title ?? 'Efficient Transformers for Resume Parsing' }}</span>
                    <span class="text-base font-bold">{{ $pub_date ?? '2024' }}</span>
                </div>
                <div class="text-base mt-1">
                    {{ $pub_authors ?? 'A. Sharma, B. Khan' }} — {{ $pub_in ?? 'arXiv' }}
                </div>
                <div class="text-base mt-1">{{ $pub_meta ?? 'Cited 20+ times; presented at ML workshop.' }}</div>
                <div class="flex flex-wrap gap-2 mt-2">
                    <span class="inline-flex items-center px-2.5 h-7 rounded-full bg-slate-800 text-slate-100 border border-slate-700 text-base">NLP</span>
                    <span class="inline-flex items-center px-2.5 h-7 rounded-full bg-slate-800 text-slate-100 border border-slate-700 text-base">ATS</span>
                </div>
                <div class="mt-2 text-base whitespace-pre-line">{{ $pub_desc ?? 'We propose a lightweight transformer...' }}</div>
            </div>
            @endif
        </div>
        {{-- Languages (Live-first, then server, then default) --}}
        <div class="section" x-data="{}">
            <div class="text-2xl font-bold">Languages</div>
            <p class="font-semibold border-b-2 border-black pb-1">
            </p>

            {{-- LIVE --}}
            <template x-if="$store.resume && $store.resume.languages && $store.resume.languages.length" x-cloak>
                <div x-init="console.log('[preview:languages] live render', $store.resume.languages)">
                    <template x-for="(L, i) in $store.resume.languages" :key="'lang-'+i">
                        <div class="entry mt-2">
                            <div class="entry-header">
                                <span x-text="(L.name || 'Language') + (L.proficiency ? ' — ' + L.proficiency : '')"></span>
                                <span x-text="L.type || ''"></span>
                            </div>
                            <div class="entry-sub" x-show="L.cert" x-text="L.cert"></div>
                        </div>
                    </template>
                </div>
            </template>

            {{-- SERVER --}}
            @php $langs = $languages ?? []; @endphp
            @if(!empty($langs))
            @foreach($langs as $L)
            @php
            $name = trim($L['name'] ?? '');
            $prof = trim($L['proficiency'] ?? '');
            $type = trim($L['type'] ?? '');
            $cert = trim($L['cert'] ?? '');
            @endphp
            <div class="entry mt-2"
                x-show="!($store.resume && $store.resume.languages && $store.resume.languages.length)">
                <div class="entry-header">
                    <span>{{ $name !== '' ? $name : 'Language' }}@if($prof !== '') — {{ $prof }} @endif</span>
                    <span>{{ $type }}</span>
                </div>
                @if($cert !== '') <div class="entry-sub">{{ $cert }}</div> @endif
            </div>
            @endforeach
            @else
            {{-- DEFAULT --}}
            <div class="entry mt-2"
                x-show="!($store.resume && $store.resume.languages && $store.resume.languages.length)">
                <div class="text-base font-bold">
                    <span>{{ $lang_name ?? 'English' }} — {{ $lang_prof ?? 'Fluent' }}</span>
                    <span>{{ $lang_type ?? 'Both' }}</span>
                </div>
                <div class="text-base">{{ $lang_cert ?? 'IELTS 7.5' }}</div>
            </div>
            @endif
        </div>
        {{-- Hobbies (Live-first, then server, then default) --}}
        <div class="section" x-data="{}">
            <div class="text-2xl font-bold">Hobbies</div>
            <p class="font-semibold border-b-2 border-black pb-1">
            </p>

            {{-- LIVE --}}
            <template x-if="$store.resume && $store.resume.hobbies && $store.resume.hobbies.length" x-cloak>
                <div x-init="console.log('[preview:hobbies] live render', $store.resume.hobbies)">
                    <template x-for="(H, i) in $store.resume.hobbies" :key="'hob-'+i">
                        <div class="mt-2">
                            <div class="font-semibold" x-text="H.title || 'Hobby'"></div>
                            <div class="tags mt-1" x-show="(H.skills||[]).length">
                                <template x-for="(sk, j) in (H.skills || [])" :key="j">
                                    <span class="tag" x-text="sk"></span>
                                </template>
                            </div>
                            <span class="text-xs text-slate-400" x-show="!(H.skills||[]).length">No skills</span>
                        </div>
                    </template>
                </div>
            </template>

            {{-- SERVER --}}
            @php $hobs = $hobbies ?? []; @endphp
            @if(!empty($hobs))
            @foreach($hobs as $H)
            @php
            $title = trim($H['title'] ?? '');
            $skills = is_array($H['skills'] ?? null) ? $H['skills'] : [];
            @endphp
            <div class="mt-2"
                x-show="!($store.resume && $store.resume.hobbies && $store.resume.hobbies.length)">
                <div class="font-semibold">{{ $title !== '' ? $title : 'Hobby' }}</div>
                <div class="tags mt-1">
                    @forelse($skills as $sk)
                    @php $sv = trim((string)$sk); @endphp
                    @if($sv !== '') <span class="tag">{{ $sv }}</span> @endif
                    @empty
                    <span class="text-xs text-slate-400">No skills</span>
                    @endforelse
                </div>
            </div>
            @endforeach
            @else
            {{-- DEFAULT --}}
            <div class="mt-2"
                x-show="!($store.resume && $store.resume.hobbies && $store.resume.hobbies.length)">
                <div class="font-semibold text-base">{{ $hob_title ?? 'Photography' }}</div>
                <div class="tags mt-1 text-base">
                    <span class="tag">Lightroom</span>
                    <span class="tag">Composition</span>
                </div>
            </div>
            @endif
        </div>


        {{-- Skills --}}
        {{-- Skills (Live-first, then server, then fallback) --}}
        <div class="section" x-data="{}">
            <div class="text-2xl font-bold">Skills</div>
            <p class="font-semibold border-b-2 border-black pb-1">
            </p>

            {{-- LIVE: Alpine store --}}
            <template x-if="$store.resume && $store.resume.skills_sections && $store.resume.skills_sections.length" x-cloak>
                <div x-init="console.log('[preview:skills] live render', $store.resume.skills_sections)">
                    <template x-for="(sec, i) in $store.resume.skills_sections" :key="'live-'+i">
                        <div class="mt-2">
                            <div class="font-semibold" x-text="(sec.title || '').trim() || 'Skills'"></div>
                            <div class="tags mt-1">
                                <template x-for="(sk, j) in (sec.skills || [])" :key="'live-skill-'+j">
                                    <span class="tag" x-text="sk"></span>
                                </template>
                                <span class="text-xs text-slate-400" x-show="!(sec.skills||[]).length">No skills</span>
                            </div>
                        </div>
                    </template>
                </div>
            </template>

            {{-- SERVER: sectioned skills --}}
            @if(!empty($skills_sections))
            @foreach($skills_sections as $sec)
            @php
            $title = trim($sec['title'] ?? '');
            $skills = $sec['skills'] ?? [];
            @endphp
            @if($title !== '' || !empty($skills))
            <div class="mt-2" x-show="!($store.resume && $store.resume.skills_sections && $store.resume.skills_sections.length)">
                <div class="font-semibold">{{ $title !== '' ? $title : 'Skills' }}</div>
                <div class="tags mt-1">
                    @forelse($skills as $sk)
                    <span class="tag">{{ $sk }}</span>
                    @empty
                    <span class="text-xs text-slate-400">No skills</span>
                    @endforelse
                </div>
            </div>
            @endif
            @endforeach

            {{-- SERVER: legacy flat skills --}}
            @elseif(!empty($skills))
            <div class="tags" x-show="!($store.resume && $store.resume.skills_sections && $store.resume.skills_sections.length)">
                @foreach($skills as $s)
                <span class="tag">{{ is_array($s) ? ($s['name'] ?? '') : $s }}</span>
                @endforeach
            </div>

            {{-- DEFAULT fallback --}}
            @else
            <div class="tags text-base mt-2" x-show="!($store.resume && $store.resume.skills_sections && $store.resume.skills_sections.length)">
                <span class="tag">Laravel</span><span class="tag">React</span>
                <span class="tag">Node.js</span><span class="tag">MongoDB</span>
                <span class="tag">Docker</span><span class="tag">AWS</span>
            </div>
            @endif
        </div>




        {{-- Volunteer Experience --}}
        <div class="section">
            <div class="text-2xl font-bold">Volunteer Experience</div>
            <p class="font-semibold border-b-2 border-black pb-1">
            </p>
            @php $vols = $volunteer ?? []; @endphp
            @if(!empty($vols))
            @foreach($vols as $v)
            <div class="entry">
                <div class="entry-header">
                    <span>{{ $v['role'] ?? '' }} — {{ $v['org'] ?? '' }}</span>
                    <span>{{ $v['start'] ?? '' }} – {{ $v['end'] ?? '' }}</span>
                </div>
                <div class="entry-sub">{{ $v['location'] ?? '' }}</div>
                @if(!empty($v['points']))
                <ul class="bullet-list">
                    @foreach((array)$v['points'] as $vp)
                    <li>{{ $vp }}</li>
                    @endforeach
                </ul>
                @endif
            </div>
            @endforeach
            @else
            <div class="entry">
                <div class="entry-header text-base">
                    <span>Mentor — Local Coding Bootcamp</span>
                    <span>2023 – Present</span>
                </div>
                <div class="text-base">Remote</div>
                <ul class="bullet-list text-base">
                    <li>Guided 20+ students through full-stack projects.</li>
                </ul>
            </div>
            @endif
        </div>

        {{-- Awards --}}
        <div class="section">
            <div class="text-2xl font-bold">Awards</div>
            <p class="font-semibold border-b-2 border-black pb-1">
            </p>
            @php $awards = $awards ?? []; @endphp
            @if(!empty($awards))
            @foreach($awards as $a)
            <div class="entry">
                <div class="entry-header">
                    <span>{{ $a['title'] ?? '' }} — {{ $a['by'] ?? '' }}</span>
                    <span>{{ $a['year'] ?? '' }}</span>
                </div>
                @isset($a['note'])
                <div class="entry-sub">{{ $a['note'] }}</div>
                @endisset
            </div>
            @endforeach
            @else
            <div class="entry">
                <div class="entry-header mt-1 text-base">
                    <span>Employee of the Quarter — AliveHire</span>
                    <span>2024</span>
                </div>
            </div>
            @endif
        </div>

        {{-- Publications --}}
        <div class="section">
            <div class="text-2xl font-bold">Publications</div>
            <p class="font-semibold border-b-2 border-black pb-1">
            </p>
            @php $pubs = $publications ?? []; @endphp
            @if(!empty($pubs))
            @foreach($pubs as $p)
            <div class="entry">
                <span>{{ $p['title'] ?? '' }}</span>,
                {{ $p['authors'] ?? '' }}
                @isset($p['link']) — <a href="{{ $p['link'] }}">{{ $p['doi'] ?? $p['link'] }}</a> @endisset
            </div>
            @endforeach
            @else
            <div class="entry text-base">
                <span class="font-bold">{{ $pub_title ?? '3D Finite Element Analysis of No-Insulation Coils' }}</span>
                <span class="font-italic"><br>
                    {{ $pub_authors ?? 'John Doe, Example Author' }}<br></span>
                <a href="{{ $pub_link ?? '#' }}">{{ $pub_doi ?? 'DOI link' }}</a>
            </div>
            @endif
        </div>

        {{-- Projects (Live-first, then server, then fallback) --}}
        <div class="section" x-data="{}">
            <div class="text-2xl font-bold">Projects</div>
            <p class="font-semibold border-b-2 border-black pb-1">
            </p>

            {{-- LIVE: Alpine store --}}
            <template x-if="$store.resume && $store.resume.projects && $store.resume.projects.length" x-cloak>
                <div x-init="console.log('[preview:projects] live render', $store.resume.projects)">
                    <template x-for="(p, i) in $store.resume.projects" :key="'proj-'+i">
                        <div class="entry mt-3 border border-slate-700 rounded-xl p-4 ">
                            <div class="flex items-start justify-between gap-3">
                                <span class="font-semibold"
                                    x-text="(p.name || 'Project') + (p.project_type ? ' | ' + p.project_type : '')"></span>
                                <span class="text-sm text-slate-400"
                                    x-text="(p.start_date || '—') + ' – ' + (p.end_date || 'Present')"></span>
                            </div>

                            <div class="text-xs text-slate-400 mt-1" x-show="p.meta_line" x-text="p.meta_line"></div>
                            <div class="text-xs text-slate-500 mt-1" x-show="p.tech_stack" x-text="p.tech_stack"></div>

                            <div class="mt-2 text-sm whitespace-pre-line" x-show="p.description" x-text="p.description"></div>

                            <div class="text-xs mt-2 flex gap-4">
                                <template x-if="p.live_link">
                                    <a :href="p.live_link" target="_blank" rel="noopener" class="text-cyan-400 hover:underline">Live</a>
                                </template>
                                <template x-if="p.code_link">
                                    <a :href="p.code_link" target="_blank" rel="noopener" class="text-cyan-400 hover:underline">Code</a>
                                </template>
                            </div>
                        </div>
                    </template>
                </div>
            </template>

            {{-- SERVER: PHP-rendered --}}
            @php $projects = $projects ?? []; @endphp
            @if(!empty($projects))
            @foreach($projects as $pr)
            @php
            $name = trim($pr['name'] ?? '');
            $ptype = trim($pr['project_type'] ?? '');
            $start = trim($pr['start_date'] ?? '');
            $end = trim($pr['end_date'] ?? '');
            $dates = ($start !== '' ? $start : '—') . ' – ' . ($end !== '' ? $end : 'Present');
            $meta = trim($pr['meta_line'] ?? '');
            $stack = trim($pr['tech_stack'] ?? '');
            $desc = trim($pr['description'] ?? '');
            $live = trim($pr['live_link'] ?? '');
            $code = trim($pr['code_link'] ?? '');
            @endphp
            <div class="entry mt-3 border border-slate-700 rounded-xl p-4 "
                x-show="!($store.resume && $store.resume.projects && $store.resume.projects.length)">
                <div class="flex items-start justify-between gap-3">
                    <span class="font-semibold">
                        {{ $name !== '' ? $name : 'Project' }}@if($ptype !== '') | {{ $ptype }} @endif
                    </span>
                    <span class="text-sm text-slate-400">{{ $dates }}</span>
                </div>

                @if($meta !== '')
                <div class="text-xs text-slate-400 mt-1">{{ $meta }}</div>
                @endif
                @if($stack !== '')
                <div class="text-xs text-slate-500 mt-1">{{ $stack }}</div>
                @endif
                @if($desc !== '')
                <div class="mt-2 text-sm whitespace-pre-line">{{ $desc }}</div>
                @endif

                @if($live !== '' || $code !== '')
                <div class="text-xs mt-2 flex gap-4">
                    @if($live !== '')
                    <a href="{{ $live }}" target="_blank" rel="noopener" class="text-cyan-400 hover:underline">Live</a>
                    @endif
                    @if($code !== '')
                    <a href="{{ $code }}" target="_blank" rel="noopener" class="text-cyan-400 hover:underline">Code</a>
                    @endif
                </div>
                @endif
            </div>
            @endforeach

            {{-- DEFAULT sample --}}
            @else
            <div class="entry mt-3"
                x-show="!($store.resume && $store.resume.projects && $store.resume.projects.length)">
                <div class="flex items-start justify-between gap-3">
                    <span class="font-semibold text-base">{{ $proj_title ?? 'Multi-Text Drawing Tool' }} | {{ $proj_type ?? 'Open Source' }}</span>
                    <span class="text-base font-bold">{{ $proj_start ?? '2023' }} – {{ $proj_end ?? 'Present' }}</span>
                </div>
                <ul class="bullet-list text-base mt-2">
                    <li>{{ $proj_meta ?? 'Canvas editing, multi-text layers, export.' }}</li>
                    <li>{{ $proj_stack ?? 'React, Canvas API, TailwindCSS' }}</li>
                    <li>{{ $proj_desc ?? 'Implemented layer management, snapping, and SVG export with undo/redo.' }}</li>
                </ul>
                <div class="text-base mt-2 flex gap-4 ml-4">
                    <a href="{{ $proj_live ?? '#' }}" target="_blank" rel="noopener" class="text-cyan-400 hover:underline">Live</a>
                    <a href="{{ $proj_code ?? '#' }}" target="_blank" rel="noopener" class="text-cyan-400 hover:underline">Code</a>
                </div>
            </div>
            @endif
        </div>

    </div>
</body>

</html>