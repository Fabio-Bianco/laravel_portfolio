@extends('guest.layouts.guest-minimal')

@section('title', 'Portfolio')

@section('content')
<div class="guest-container">
  
  {{-- Hero Section Component --}}
  @include('guest.components.hero-section')
  
  {{-- Skills Component (Competenze & Tecnologie + Learning) --}}
  @include('guest.components.skills-component')

    {{-- Projects Component (Projects + Filters) --}}
    @include('guest.components.projects-component') 

    {{-- Modern Contact Section --}}
    @include('guest.partials.contact-modern')

</div>
@endsection