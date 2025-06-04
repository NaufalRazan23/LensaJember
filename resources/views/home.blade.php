@extends('layouts.app')

@section('title', 'Welcome to Lensa Jember')

@section('content')
    <!-- Hero Section -->
    <div class="relative bg-gradient-to-r from-blue-600 to-teal-500 rounded-2xl overflow-hidden mb-12">
        <div class="absolute inset-0 bg-black opacity-30"></div>
        <div class="relative px-8 py-16 md:py-24">
            <div class="max-w-2xl">
                <h1 class="text-4xl md:text-5xl font-bold text-white mb-6 leading-tight">
                    Discover the Beauty of Jember's Hidden Treasures
                </h1>
                <p class="text-xl text-white/90 mb-8">
                    Explore breathtaking destinations, cultural landmarks, and natural wonders that make Jember a unique travel destination.
                </p>
                <div class="flex flex-wrap gap-4">
                    <a href="{{ route('destinations.index') }}"
                       class="inline-flex items-center px-6 py-3 rounded-lg bg-white text-blue-600 hover:bg-blue-50 transition-colors duration-200 font-semibold">
                        <span>Explore Destinations</span>
                        <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                        </svg>
                    </a>
                    <a href="#featured"
                       class="inline-flex items-center px-6 py-3 rounded-lg bg-blue-700 text-white hover:bg-blue-800 transition-colors duration-200 font-semibold">
                        Featured Places
                    </a>
                </div>
            </div>
        </div>
        <!-- Decorative pattern -->
        <div class="absolute bottom-0 left-0 right-0 h-32" style="background: linear-gradient(to right bottom, transparent 49%, white 50%)"></div>
    </div>

    <!-- Statistics Section -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-16">
        <div class="bg-white rounded-xl p-6 shadow-lg border border-gray-100">
            <div class="flex items-center justify-between mb-4">
                <h3 class="text-lg font-semibold text-gray-800">Total Destinations</h3>
                <span class="p-2 bg-blue-100 text-blue-600 rounded-lg">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                    </svg>
                </span>
            </div>
            <p class="text-3xl font-bold text-gray-900">{{ \App\Models\Destination::count() }}</p>
        </div>
        <div class="bg-white rounded-xl p-6 shadow-lg border border-gray-100">
            <div class="flex items-center justify-between mb-4">
                <h3 class="text-lg font-semibold text-gray-800">Categories</h3>
                <span class="p-2 bg-teal-100 text-teal-600 rounded-lg">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/>
                    </svg>
                </span>
            </div>
            <p class="text-3xl font-bold text-gray-900">{{ \App\Models\Category::count() }}</p>
        </div>
        <div class="bg-white rounded-xl p-6 shadow-lg border border-gray-100">
            <div class="flex items-center justify-between mb-4">
                <h3 class="text-lg font-semibold text-gray-800">Featured Places</h3>
                <span class="p-2 bg-yellow-100 text-yellow-600 rounded-lg">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"/>
                    </svg>
                </span>
            </div>
            <p class="text-3xl font-bold text-gray-900">{{ \App\Models\Destination::where('is_featured', true)->count() }}</p>
        </div>
    </div>

    <!-- Categories Section -->
    @if($categories->count() > 0)
    <div class="mb-16">
        <div class="flex justify-between items-end mb-8">
            <div>
                <h2 class="text-2xl md:text-3xl font-bold text-gray-900 mb-2">Explore by Category</h2>
                <p class="text-gray-600">Find the perfect destination based on your interests</p>
            </div>
            <a href="{{ route('categories.index') }}" class="text-blue-600 hover:text-blue-800 font-medium hidden md:inline-block">
                View All Categories &rarr;
            </a>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @foreach($categories as $category)
                <div class="group bg-white rounded-xl shadow-lg overflow-hidden transform transition duration-300 hover:-translate-y-1 hover:shadow-xl relative">
                    <div class="absolute inset-0 bg-gradient-to-br from-blue-600/80 to-teal-500/80 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                    <div class="p-6 relative">
                        <div class="flex items-center justify-between mb-4">
                            <h3 class="text-xl font-semibold text-gray-900 group-hover:text-white transition-colors duration-300">
                                {{ $category->name }}
                            </h3>
                            @if($category->icon)
                                <span class="text-2xl group-hover:text-white transition-colors duration-300">
                                    {{ $category->icon }}
                                </span>
                            @endif
                        </div>
                        <p class="text-gray-600 mb-4 group-hover:text-white/90 transition-colors duration-300">
                            {{ $category->description }}
                        </p>
                        <a href="{{ route('categories.show', $category) }}"
                           class="inline-flex items-center text-blue-600 hover:text-white font-medium transition-colors duration-300">
                            <span>View Destinations</span>
                            <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                            </svg>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="text-center mt-6 md:hidden">
            <a href="{{ route('categories.index') }}" class="text-blue-600 hover:text-blue-800 font-medium">
                View All Categories &rarr;
            </a>
        </div>
    </div>
    @endif

    <!-- Featured Destinations Section -->
    @if($featuredDestinations->count() > 0)
    <div class="mb-16" id="featured">
        <div class="flex justify-between items-end mb-8">
            <div>
                <h2 class="text-2xl md:text-3xl font-bold text-gray-900 mb-2">Featured Destinations</h2>
                <p class="text-gray-600">Handpicked places you shouldn't miss</p>
            </div>
            <a href="{{ route('destinations.index') }}" class="text-blue-600 hover:text-blue-800 font-medium hidden md:inline-block">
                View All Destinations &rarr;
            </a>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($featuredDestinations as $destination)
                <div class="group bg-white rounded-xl shadow-lg overflow-hidden transform transition duration-300 hover:-translate-y-1 hover:shadow-xl">
                    @if($destination->featured_image)
                        <div class="relative h-48 overflow-hidden">
                            <img src="{{ asset('storage/' . $destination->featured_image) }}"
                                alt="{{ $destination->name }}"
                                class="w-full h-full object-cover transform transition duration-300 group-hover:scale-110">
                            <div class="absolute top-0 right-0 bg-blue-600 text-white px-3 py-1 m-3 rounded-full text-sm">
                                {{ $destination->category->name }}
                            </div>
                        </div>
                    @endif
                    <div class="p-6">
                        <h3 class="text-xl font-semibold text-gray-900 mb-2 group-hover:text-blue-600 transition-colors duration-300">
                            {{ $destination->name }}
                        </h3>
                        <p class="text-gray-600 mb-4">{{ Str::limit($destination->description, 100) }}</p>
                        <div class="flex justify-between items-center">
                            <a href="{{ route('destinations.show', $destination) }}"
                               class="inline-flex items-center text-blue-600 hover:text-blue-800 font-medium">
                                <span>Learn More</span>
                                <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                                </svg>
                            </a>
                            @if($destination->entry_fee)
                                <span class="px-3 py-1 bg-gray-100 text-gray-800 rounded-full text-sm font-medium">
                                    Rp {{ number_format($destination->entry_fee, 0, ',', '.') }}
                                </span>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="text-center mt-6 md:hidden">
            <a href="{{ route('destinations.index') }}" class="text-blue-600 hover:text-blue-800 font-medium">
                View All Destinations &rarr;
            </a>
        </div>
    </div>
    @endif

    <!-- Call to Action -->
    <div class="bg-gradient-to-br from-blue-600 to-teal-500 rounded-2xl p-8 md:p-12 text-center relative overflow-hidden">
        <div class="absolute inset-0 bg-black opacity-10"></div>
        <div class="relative">
            <h2 class="text-2xl md:text-3xl font-bold text-white mb-4">Want to Add Your Destination?</h2>
            <p class="text-white/90 text-lg mb-8 max-w-2xl mx-auto">
                Help us grow our collection of amazing destinations in Jember and share your favorite places with others.
            </p>
            <a href="{{ route('destinations.create') }}"
               class="inline-flex items-center px-6 py-3 rounded-lg bg-white text-blue-600 hover:bg-blue-50 transition-colors duration-200 font-semibold">
                <span>Add New Destination</span>
                <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                </svg>
            </a>
        </div>
    </div>
@endsection
