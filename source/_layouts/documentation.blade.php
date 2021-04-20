@extends('_layouts.base')

@section('header')
    <div class="relative px-6 py-8 text-white bg-primary-900 md:py-16">
        <a href="#main" class="sr-only">Skip to main content</a>
        <img src="/assets/media/bg-illustrations@2x.jpg" alt="Illustrations" class="absolute top-0 left-0 object-cover object-bottom w-full h-full opacity-20" />
        <nav class="relative flex items-center justify-between max-w-screen-xl mx-auto space-x-4 lg:space-x-0">
            <button
                class="lg:hidden"
                aria-controls="main-menu"
                aria-haspopup="true"
                @click.prevent="mobileMenuIsOpen = !mobileMenuIsOpen"
                @click.away="mobileMenuIsOpen = false"
            >
                <x-icon-menu class="w-6 h-6" />
                <span class="sr-only">Toggle Menu</span>
            </button>
            <a href="/" rel="home" class="transition-colors duration-200 hover:text-gray-300">
                <x-logo :alt="$page->siteName" class="h-auto w-36" />
            </a>
            <ul>
                <li>
                    <a
                        href="{{ $page->projectUrl }}"
                        class="transition-colors duration-200 hover:text-gray-300"
                        target="_blank"
                        rel="noreferrer noopener"
                    >
                        <x-icon-github class="w-7 h-7" />
                        <span class="sr-only">GitHub</span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
@endsection

@section('main')
    <div class="px-6 py-8 lg:py-16">
        <div class="grid max-w-screen-xl grid-cols-1 gap-6 mx-auto lg:grid-cols-10 lg:gap-12">
            <nav
                id="main-menu"
                aria-label="Main"
                class="fixed inset-y-0 left-0 z-50 overflow-auto text-white transition-transform duration-500 ease-in-out transform bg-white bg-gray-900 shadow-lg lg:-translate-x-0 lg:text-current lg:bg-transparent md:shadow-none lg:relative lg:col-span-2"
                :aria-hidden="mobileMenuIsOpen.toString()"
                :class="mobileMenuIsOpen ? '-translate-x-0' : '-translate-x-full'"
            >
                <div class="p-6 space-y-6 lg:px-0 md:py-12 lg:sticky lg:top-0">
                    @foreach ($page->navigation as $section => $item)
                        <div class="space-y-3">
                            <h3 class="text-sm font-normal tracking-wider uppercase">
                                @php($url = isset($item['url']) ? $item['url'] : $item)
                                <a
                                    class="transition-colors duration-200 hover:text-primary-700 {{ $page->isActive($url) ? 'text-primary-500' : ''}}"
                                    href="{{ $url }}">{{ $section }}
                                </a>
                            </h3>
                            @isset($item['children'])
                                <ol class="space-y-1 leading-tight">
                                    @foreach ($item['children'] as $title => $url)
                                        <li>
                                            <a href="{{ $url }}" class="text-gray-500 transition-colors duration-200 hover:text-primary-700">{{ $title }}</a>
                                        </li>
                                    @endforeach
                                </ol>
                            @endisset
                        </div>
                    @endforeach
                </div>
            </nav>
            <div class="grid grid-cols-1 gap-6 md:grid-cols-3 lg:col-span-8 lg:gap-12">
                <div class="overflow-auto md:col-span-2">
                    <div class="prose lg:prose-lg">
                        @yield('content')
                    </div>
                </div>
                @if ($page->toc)
                    <aside class="relative p-6 bg-gray-100 rounded lg:p-0 lg:rounded-none lg:bg-transparent">
                        <div class="md:py-12 md:sticky md:top-0">
                            <h3 class="text-sm font-normal tracking-wider uppercase">On this page</h3>
                            <div class="prose-sm prose">
                                @markdown($page->toc)
                            </div>
                        </div>
                    </aside>
                @endif
            </div>
        </div>
    </div>
@endsection
