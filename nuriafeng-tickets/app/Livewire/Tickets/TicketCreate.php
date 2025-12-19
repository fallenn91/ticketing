<?php

namespace App\Livewire\Tickets;

use App\Livewire\Traits\HasAttachmentHandling;
use App\Models\Attachment;
use App\Models\Ticket;
use App\Services\TicketDataService;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;

class TicketCreate extends Component
{
    use HasAttachmentHandling;
    use WithFileUploads;

    public string $title = '';

    public string $description = '';

    public string $type = 'incidencia';

    public string $priority = 'media';

    public ?int $category_id = null;

    public ?int $assigned_to_id = null;

    public ?string $deadline = null;

    public array $attachments = [];

    protected function rules(): array
    {
        return array_merge(
            Ticket::validationRules('create'),
            Attachment::validationRules()
        );
    }

    protected function messages(): array
    {
        return array_merge(
            Ticket::validationMessages(),
            Attachment::validationMessages(),
            [
                'category_id.exists' => 'La categoría seleccionada no existe.',
                'assigned_to_id.exists' => 'El usuario seleccionado no existe.',
            ]
        );
    }

    public function removeAttachment(int $index): void
    {
        $this->removeFromArray('attachments', $index);
    }

    public function save()
    {
        $this->validate();

        $data = [
            'user_id' => Auth::id(),
            'title' => $this->title,
            'description' => $this->description,
            'type' => $this->type,
            'priority' => $this->priority,
            'category_id' => $this->category_id,
            'deadline' => $this->deadline ?: null,
            'status' => 'abierto',
        ];

        if (auth()->user()->isAdmin() && $this->assigned_to_id) {
            $data['assigned_to_id'] = $this->assigned_to_id;
        }

        $ticket = Ticket::create($data);

        $this->storeAttachments($ticket);

        session()->flash('message', 'Ticket creado correctamente.');

        return redirect()->route('tickets.show', $ticket);
    }

    protected function storeAttachments(Ticket $ticket): void
    {
        $this->storeAttachmentsFor($ticket, 'attachments', 'tickets');
    }

    public function render(TicketDataService $ticketData)
    {
        return view('livewire.tickets.ticket-create',
            $ticketData->getTicketFormData(includeUsers: auth()->user()->isAdmin())
        );
    }
}
