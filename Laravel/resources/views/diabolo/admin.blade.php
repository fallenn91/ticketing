@extends('layouts.layout')

@section('content')
<div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-3">
    <livewire:diabolo.assets.summary-card title="Usuarios" count="20" icon="fas fa-users" />
    <livewire:diabolo.assets.summary-card title="Portfolios" count="20" icon="fas fa-images" />
    <livewire:diabolo.assets.summary-card title="Marketplace" count="20" icon="fas fa-store" />

</div>
<div class="grid grid-cols1 gap-6">
  <livewire:diabolo.assets.home-dashboard />
  <livewire:diabolo.assets.dashboard-cards />
  <livewire:diabolo.assets.recent-activities />
</div>

@endsection