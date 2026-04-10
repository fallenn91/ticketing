@extends('layouts.layout')

@section('content')
<div class="w-full h-full">
  <div class="fade-up w-full h-full flex flex-col p-4 gap-3">
    <div class="w-full">
      <h1 class="text-lg text-[var(--negro)] font-bold">Ofertas Recientes</h1>
    </div>
    <div class="w-full h-full flex justify-between rounded-lg gap-3">
      <div class="w-[50%] h-full">
        <card class="card-item !w-full !h-full flex flex-col justify-between bg-gray-100 shadow-sm rounded-lg">
          <!--LOGO PERFIL-->
            <h1 class="text-lg">FOTO PERFIL</h1>
          <!--INFORMACIÓN-->
          <h3 class="text-base text-[var(--negro)] font-bold">Malabarista</h3>
          <p class="text-sm text-gray-500">Empresa</p>
          <p class="text-sm text-gray-500">Descripción</p>
          <p class="text-sm text-gray-500">Publicado hace:</p>
        </card>
      </div>
      <div class="w-[50%] grid grid-cols-1 md:grid-cols-2 gap-4">
        <card class="card-item bg-gray-100 shadow-sm rounded-lg">
          <div class="w-full h-full p-2 flex">
            <!--LOGO PERFIL-->
            <div class="w-full">
              <h1 class="text-lg">FOTO PERFIL</h1>
            </div>
            <!--INFORMACIÓN-->
            <div class="w-full  h-full flex flex-col justify-between">
              <div  class="w-full space-y-2">
                <h3 class="text-base text-[var(--negro)] font-bold">Malabarista</h3>
                <p class="text-sm text-gray-500">Empresa</p>
                <p class="text-sm text-gray-500">Descripción</p>
              </div>
              <div class="w-full mt-auto">
                <p class="text-sm text-gray-500">Publicado hace:</p>
              </div>
            </div>
          </div>
        </card>
        <card class="card-item bg-gray-100 shadow-sm rounded-lg">
          <div class="w-full h-full p-2 flex">
            <!--LOGO PERFIL-->
            <div class="w-full">
              <h1 class="text-lg">FOTO PERFIL</h1>
            </div>
            <!--INFORMACIÓN-->
            <div class="w-full  h-full flex flex-col justify-between">
              <div  class="w-full space-y-2">
                <h3 class="text-base text-[var(--negro)] font-bold">Malabarista</h3>
                <p class="text-sm text-gray-500">Empresa</p>
                <p class="text-sm text-gray-500">Descripción</p>
              </div>
              <div class="w-full mt-auto">
                <p class="text-sm text-gray-500">Publicado hace:</p>
              </div>
            </div>
          </div>
        </card>
        <card class="card-item bg-gray-100 shadow-sm rounded-lg">
          <div class="w-full h-full p-2 flex">
            <!--LOGO PERFIL-->
            <div class="w-full">
              <h1 class="text-lg">FOTO PERFIL</h1>
            </div>
            <!--INFORMACIÓN-->
            <div class="w-full  h-full flex flex-col justify-between">
              <div  class="w-full space-y-2">
                <h3 class="text-base text-[var(--negro)] font-bold">Malabarista</h3>
                <p class="text-sm text-gray-500">Empresa</p>
                <p class="text-sm text-gray-500">Descripción</p>
              </div>
              <div class="w-full mt-auto">
                <p class="text-sm text-gray-500">Publicado hace:</p>
              </div>
            </div>
          </div>
        </card>
        <card class="card-item bg-gray-100 shadow-sm rounded-lg">
          <div class="w-full h-full p-2 flex">
            <!--LOGO PERFIL-->
            <div class="w-full">
              <h1 class="text-lg">FOTO PERFIL</h1>
            </div>
            <!--INFORMACIÓN-->
            <div class="w-full  h-full flex flex-col justify-between">
              <div  class="w-full space-y-2">
                <h3 class="text-base text-[var(--negro)] font-bold">Malabarista</h3>
                <p class="text-sm text-gray-500">Empresa</p>
                <p class="text-sm text-gray-500">Descripción</p>
              </div>
              <div class="w-full mt-auto">
                <p class="text-sm text-gray-500">Publicado hace:</p>
              </div>
            </div>
          </div>
        </card>
      </div>
    </div>
  </div>
  <div class="w-full p-4 ">
  <div class="w-full">
      <h1 class="text-lg text-[var(--negro)] font-bold mb-3">Todas las Ofertas</h1>
  </div>
  <div class=" fade-up grid grid-cols-1 md:grid-cols-3 gap-4">
    <card class="card-item !w-full !h-full flex flex-col justify-between bg-gray-100 shadow-sm rounded-lg">
      <!--LOGO PERFIL-->
        <h1 class="text-lg">FOTO PERFIL</h1>
      <!--INFORMACIÓN-->
      <h3 class="text-base text-[var(--negro)] font-bold">Malabarista</h3>
      <p class="text-sm text-gray-500">Empresa</p>
      <p class="text-sm text-gray-500">Descripción</p>
      <p class="text-sm text-gray-500">Publicado hace:</p>
    </card>
    <card class="card-item !w-full !h-full flex flex-col justify-between bg-gray-100 shadow-sm rounded-lg">
      <!--LOGO PERFIL-->
        <h1 class="text-lg">FOTO PERFIL</h1>
      <!--INFORMACIÓN-->
      <h3 class="text-base text-[var(--negro)] font-bold">Malabarista</h3>
      <p class="text-sm text-gray-500">Empresa</p>
      <p class="text-sm text-gray-500">Descripción</p>
      <p class="text-sm text-gray-500">Publicado hace:</p>
    </card>
    <card class="card-item !w-full !h-full flex flex-col justify-between bg-gray-100 shadow-sm rounded-lg">
      <!--LOGO PERFIL-->
        <h1 class="text-lg">FOTO PERFIL</h1>
      <!--INFORMACIÓN-->
      <h3 class="text-base text-[var(--negro)] font-bold">Malabarista</h3>
      <p class="text-sm text-gray-500">Empresa</p>
      <p class="text-sm text-gray-500">Descripción</p>
      <p class="text-sm text-gray-500">Publicado hace:</p>
    </card>
    <card class="card-item !w-full !h-full flex flex-col justify-between bg-gray-100 shadow-sm rounded-lg">
      <!--LOGO PERFIL-->
        <h1 class="text-lg">FOTO PERFIL</h1>
      <!--INFORMACIÓN-->
      <h3 class="text-base text-[var(--negro)] font-bold">Malabarista</h3>
      <p class="text-sm text-gray-500">Empresa</p>
      <p class="text-sm text-gray-500">Descripción</p>
      <p class="text-sm text-gray-500">Publicado hace:</p>
    </card>
    <card class="card-item !w-full !h-full flex flex-col justify-between bg-gray-100 shadow-sm rounded-lg">
      <!--LOGO PERFIL-->
        <h1 class="text-lg">FOTO PERFIL</h1>
      <!--INFORMACIÓN-->
      <h3 class="text-base text-[var(--negro)] font-bold">Malabarista</h3>
      <p class="text-sm text-gray-500">Empresa</p>
      <p class="text-sm text-gray-500">Descripción</p>
      <p class="text-sm text-gray-500">Publicado hace:</p>
    </card>
    <card class="card-item !w-full !h-full flex flex-col justify-between bg-gray-100 shadow-sm rounded-lg">
      <!--LOGO PERFIL-->
        <h1 class="text-lg">FOTO PERFIL</h1>
      <!--INFORMACIÓN-->
      <h3 class="text-base text-[var(--negro)] font-bold">Malabarista</h3>
      <p class="text-sm text-gray-500">Empresa</p>
      <p class="text-sm text-gray-500">Descripción</p>
      <p class="text-sm text-gray-500">Publicado hace:</p>
    </card>
    <card class="card-item !w-full !h-full flex flex-col justify-between bg-gray-100 shadow-sm rounded-lg">
      <!--LOGO PERFIL-->
        <h1 class="text-lg">FOTO PERFIL</h1>
      <!--INFORMACIÓN-->
      <h3 class="text-base text-[var(--negro)] font-bold">Malabarista</h3>
      <p class="text-sm text-gray-500">Empresa</p>
      <p class="text-sm text-gray-500">Descripción</p>
      <p class="text-sm text-gray-500">Publicado hace:</p>
    </card>
    <card class="card-item !w-full !h-full flex flex-col justify-between bg-gray-100 shadow-sm rounded-lg">
      <!--LOGO PERFIL-->
        <h1 class="text-lg">FOTO PERFIL</h1>
      <!--INFORMACIÓN-->
      <h3 class="text-base text-[var(--negro)] font-bold">Malabarista</h3>
      <p class="text-sm text-gray-500">Empresa</p>
      <p class="text-sm text-gray-500">Descripción</p>
      <p class="text-sm text-gray-500">Publicado hace:</p>
    </card>
    <card class="card-item !w-full !h-full flex flex-col justify-between bg-gray-100 shadow-sm rounded-lg">
      <!--LOGO PERFIL-->
        <h1 class="text-lg">FOTO PERFIL</h1>
      <!--INFORMACIÓN-->
      <h3 class="text-base text-[var(--negro)] font-bold">Malabarista</h3>
      <p class="text-sm text-gray-500">Empresa</p>
      <p class="text-sm text-gray-500">Descripción</p>
      <p class="text-sm text-gray-500">Publicado hace:</p>
    </card>
  </div>
  </div>
</div>


@endsection
