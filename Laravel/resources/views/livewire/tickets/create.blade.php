<div>
    {{-- Stop trying to control. --}}
    <form wire:submit="create">
      <input type = "text" wire:model="title">
      <input type = "text" wire:model="comment">
      <button type = "submit">Create</button>
    </form>
</div>
