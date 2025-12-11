@extends('guest.layouts.guest-minimal')

@section('title', 'Portfolio Completo - ' . config('app.owner_name'))

@section('content')
<div class="guest-container">
  {{-- Sidebar Navigation --}}
  @include('guest.components.sidebar-nav')
  
  {{-- Main Content --}}
  <main class="main-content">
    {{-- Back Navigation --}}
    <div class="mb-4">
      <a href="{{ route('home') }}" class="btn btn-outline-primary btn-portfolio-view">← Torna alla Home</a>
    </div>
    
    {{-- Projects Component - Mode: Portfolio --}}
    @include('guest.components.projects-component', ['mode' => 'portfolio'])
  </main>

  {{-- Footer --}}
  @include('guest.components.footer-component')
</div>
@endsection