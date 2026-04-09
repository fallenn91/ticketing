<?php $__env->startSection('content'); ?>
<div class="w-full h-screen">
  <div class="w-full rounded-lg shadow-lg p-4">
    <h1 class="text-lg text-[var(--negro)] font-bold mb-3">USUARIOS</h1>
    <div class="w-full">
      <div class="my-4">
        <form action="" method="GET" class="flex items-center gap-2 ">
          <input type="text" name="search" placeholder="Buscar usuario..."
                class="w-[450px] px-4 py-2 border-2 border-gray-300 rounded-l-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
          
          <button type="submit"
                  class="px-4 py-2 rounded-lg border-1 border-[var(--negro)] bg-[var(--verde)] text-[var(--negro)] hover:bg-[var(--negro)] hover:text-[var(--beige)] transition duration-300">
            Buscar
          </button>
        </form>
      </div>
    </div>
    <form class="w-full border-l-2 border-r-2">
      <div class="grid grid-cols-1 md:grid-cols-4 w-full p-4 border-t-2">
        <div class="form-items"><h2 class="font-bold">ID</h2></div>
        <div class="form-items"><h2 class="font-bold">Nombre</h2></div>
        <div class="form-items"><h2 class="font-bold">Rol</h2></div>
        <div class="form-items"><h2 class="font-bold">Acciones</h2></div>
      </div>
      <div class="grid grid-cols-1 md:grid-cols-4 w-full p-4 border-t-2">
        <div class="form-items">1</div>
        <div class="form-items">Juan Pérez</div>
        <div class="form-items">Administrador</div>
        <div class="form-items gap-2">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 text-green-700 cursor-pointer hover:text-[var(--black)]">
            <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
          </svg>
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 text-blue-700 cursor-pointer hover:text-[var(--black)]">
            <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
            <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
          </svg>
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 text-red-700 cursor-pointer hover:text-[var(--black)]">
            <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
          </svg>
        </div>
      </div>
    </form>
  </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.layout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /var/www/html/resources/views/diabolo/users.blade.php ENDPATH**/ ?>