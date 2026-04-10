@extends('layouts.layout')

@section('content')
<div class="fade-up w-full h-screen">
  <div class="w-full bg-white rounded-lg shadow-lg">
    <div class="p-6 space-y-6">
  
    <!-- Stats -->
    <div class="grid grid-cols-4 gap-3">
      <div class="bg-gray-50 rounded-lg p-4">
        <p class="text-xs text-gray-500 mb-1">Total productos</p>
        <p class="text-2xl font-medium">124</p>
      </div>
      <div class="bg-gray-50 rounded-lg p-4">
        <p class="text-xs text-gray-500 mb-1">Ventas este mes</p>
        <p class="text-2xl font-medium">€8.430</p>
      </div>
      <div class="bg-gray-50 rounded-lg p-4">
        <p class="text-xs text-gray-500 mb-1">Pedidos activos</p>
        <p class="text-2xl font-medium">37</p>
      </div>
      <div class="bg-gray-50 rounded-lg p-4">
        <p class="text-xs text-gray-500 mb-1">Sin stock</p>
        <p class="text-2xl font-medium">5</p>
      </div>
    </div>
  
    <!-- Filtros -->
    <div class="flex flex-wrap items-center gap-3">
      <div class="relative flex-1 min-w-[180px]">
        <svg class="absolute left-2.5 top-1/2 -translate-y-1/2 w-4 h-4 text-gray-400 pointer-events-none" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
          <circle cx="11" cy="11" r="8"/><path d="m21 21-4.35-4.35"/>
        </svg>
        <input type="search" placeholder="Buscar producto..." class="w-full pl-8 pr-3 py-2 text-sm border border-gray-200 rounded-lg bg-white focus:outline-none focus:ring-2 focus:ring-gray-300 placeholder:text-gray-400" />
      </div>
      <select class="text-sm border border-gray-200 rounded-lg px-3 py-2 bg-white focus:outline-none focus:ring-2 focus:ring-gray-300">
        <option>Todas las categorías</option>
        <option>Electrónica</option>
        <option>Ropa</option>
        <option>Hogar</option>
      </select>
      <select class="text-sm border border-gray-200 rounded-lg px-3 py-2 bg-white focus:outline-none focus:ring-2 focus:ring-gray-300">
        <option>Todos los estados</option>
        <option>En stock</option>
        <option>Bajo stock</option>
        <option>Sin stock</option>
      </select>
      <select class="text-sm border border-gray-200 rounded-lg px-3 py-2 bg-white focus:outline-none focus:ring-2 focus:ring-gray-300">
        <option>Ordenar por</option>
        <option>Precio: menor a mayor</option>
        <option>Precio: mayor a menor</option>
        <option>Más vendidos</option>
      </select>
    </div>
  
    <!-- Tabla -->
    <div class="bg-white border border-gray-100 rounded-xl overflow-hidden">
      <table class="w-full text-sm">
        <thead class="bg-gray-50 text-gray-500 font-medium">
          <tr>
            <th class="text-left px-4 py-3">Producto</th>
            <th class="text-left px-4 py-3">Categoría</th>
            <th class="text-right px-4 py-3">Precio</th>
            <th class="text-right px-4 py-3">Stock</th>
            <th class="text-center px-4 py-3">Estado</th>
            <th class="px-4 py-3"></th>
          </tr>
        </thead>
        <tbody class="divide-y divide-gray-100">
  
          <!-- Fila -->
          <tr class="hover:bg-gray-50 transition-colors">
            <td class="px-4 py-3">
              <p class="font-medium text-gray-900">Auriculares BT Pro X</p>
              <p class="text-xs text-gray-400">SKU: AUD-001</p>
            </td>
            <td class="px-4 py-3 text-gray-500">Electrónica</td>
            <td class="px-4 py-3 text-right font-medium">€89,99</td>
            <td class="px-4 py-3 text-right">142</td>
            <td class="px-4 py-3 text-center">
              <span class="text-xs font-medium px-2 py-0.5 rounded-full bg-green-50 text-green-700">En stock</span>
            </td>
            <td class="px-4 py-3 text-right">
              <button class="text-xs px-3 py-1.5 border border-gray-200 rounded-lg hover:bg-gray-50 transition-colors">Editar</button>
            </td>
          </tr>
  
          <!-- Bajo stock -->
          <tr class="hover:bg-gray-50 transition-colors">
            <td class="px-4 py-3">
              <p class="font-medium text-gray-900">Silla ergonómica Flex</p>
              <p class="text-xs text-gray-400">SKU: SIL-042</p>
            </td>
            <td class="px-4 py-3 text-gray-500">Hogar</td>
            <td class="px-4 py-3 text-right font-medium">€349,00</td>
            <td class="px-4 py-3 text-right">8</td>
            <td class="px-4 py-3 text-center">
              <span class="text-xs font-medium px-2 py-0.5 rounded-full bg-amber-50 text-amber-700">Bajo stock</span>
            </td>
            <td class="px-4 py-3 text-right">
              <button class="text-xs px-3 py-1.5 border border-gray-200 rounded-lg hover:bg-gray-50 transition-colors">Editar</button>
            </td>
          </tr>
  
          <!-- Sin stock -->
          <tr class="hover:bg-gray-50 transition-colors">
            <td class="px-4 py-3">
              <p class="font-medium text-gray-900">Camiseta algodón orgánico</p>
              <p class="text-xs text-gray-400">SKU: ROP-118</p>
            </td>
            <td class="px-4 py-3 text-gray-500">Ropa</td>
            <td class="px-4 py-3 text-right font-medium">€24,50</td>
            <td class="px-4 py-3 text-right">0</td>
            <td class="px-4 py-3 text-center">
              <span class="text-xs font-medium px-2 py-0.5 rounded-full bg-red-50 text-red-700">Sin stock</span>
            </td>
            <td class="px-4 py-3 text-right">
              <button class="text-xs px-3 py-1.5 border border-gray-200 rounded-lg hover:bg-gray-50 transition-colors">Editar</button>
            </td>
          </tr>
  
        </tbody>
      </table>
    </div>
  
    <!-- Paginación -->
    <div class="flex items-center justify-between">
      <p class="text-sm text-gray-400">Mostrando 4 de 124 productos</p>
      <div class="flex gap-1">
        <button class="text-sm px-3 py-1.5 border border-gray-200 rounded-lg text-gray-400 hover:bg-gray-50">Anterior</button>
        <button class="text-sm px-3 py-1.5 border border-gray-200 rounded-lg bg-gray-100 font-medium">1</button>
        <button class="text-sm px-3 py-1.5 border border-gray-200 rounded-lg text-gray-400 hover:bg-gray-50">2</button>
        <button class="text-sm px-3 py-1.5 border border-gray-200 rounded-lg text-gray-400 hover:bg-gray-50">Siguiente</button>
      </div>
    </div>
  
  </div>
  </div>

</div>
@endsection