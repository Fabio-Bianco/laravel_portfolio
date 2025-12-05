@extends('guest.layouts.guest-minimal')

@section('title', 'Portfolio')

@section('content')
<div class="guest-container">
  
  {{-- Hero Section Component --}}
  @include('guest.components.hero-section')

      {{-- Projects Component (Projects + Filters) --}}
    @include('guest.components.projects-component', ['mode' => 'homepage']) 
  
  {{-- Skills Component (Competenze & Tecnologie + Learning) --}}
  @include('guest.components.skills-component')



    {{-- Modern Contact Section --}}
    @include('guest.partials.contact-modern')

</div>
@endsection