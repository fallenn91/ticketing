<?php

namespace App\Livewire\Tickets;

use App\Livewire\Traits\HasAttachmentHandling;
use App\Livewire\Traits\HasInlineEditing;
use App\Models\Attachment;
use App\Models\Ticket;
use App\Models\TicketComment;
use App\Services\TicketDataService;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;

class TicketShow extends Component
{
    use HasAttachmentHandling;
    use HasInlineEditing;
    use WithFileUploads;

    public Ticket $ticket;

    public string $newComment = '';

    public string $status = '';

    public string $priority = '';

    public ?int $assigned_to_id = null;

    public ?int $category_id = null;

    public array $commentAttachments = [];

    public string $title = '';

    public string $description = '';

    public ?string $deadline = null;

    public bool $editingTitle = false;

    public function getBackRouteProperty(): string
    {
        $from = request()->query('from');

        if ($from === 'admin' && auth()->user()->is_admin) {
            return route('admin.tickets');
        }

        return route('tickets.index');
    }

    public bool $editingDescription = false;

    public function mount(Ticket $ticket): void
    {
        $this->authorize('view', $ticket);

        $this->ticket = $ticket->load('assignee');
        $this->status = $ticket->status;
        $this->priority = $ticket->priority;
        $this->assigned_to_id = $ticket->assigned_to_id;
        $this->category_id = $ticket->category_id;

        $this->title = $ticket->title;
        $this->description = $ticket->description;
        $this->deadline = $ticket->deadline?->format('Y-m-d');
    }

    protected function rules(): array
    {
        return array_merge(
            ['newComment' => 'required|string|min:3'],
            Attachment::validationRules('commentAttachments')
        );
    }

    protected function messages(): array
    {
        return array_merge(
            [
                'newComment.required' => 'El comentario es obligatorio.',
                'newComment.min' => 'El comentario debe tener al menos 3 caracteres.',
            ],
            Attachment::validationMessages('commentAttachments')
        );
    }

    public function removeCommentAttachment(int $index): void
    {
        $this->removeFromArray('commentAttachments', $index);
    }

    public function updated(string $property): void
    {
        $adminFields = ['status', 'priority', 'assigned_to_id', 'category_id'];

        if (in_array($property, $adminFields)) {
            if (in_array($property, ['assigned_to_id', 'category_id'])) {
                $this->authorize('assign', $this->ticket);
            } else {
                $this->authorize('updateStatus', $this->ticket);
            }

            $this->ticket->update([
                $property => $this->{$property} ?: null,
            ]);

            $this->ticket->refresh();
            $this->dispatch('saved');
        }

        if ($property === 'deadline') {
            $this->authorize('update', $this->ticket);
            $this->ticket->update([
                'deadline' => $this->deadline ?: null,
            ]);
            $this->ticket->refresh();
            $this->dispatch('saved');
        }
    }

    /**
     * Save both title and description (for mobile bottom sheet).
     */
    public function saveTicketFields(): void
    {
        $this->authorize('update', $this->ticket);

        $rules = Ticket::validationRules();

        $this->validate([
            'title' => $rules['title'],
            'description' => $rules['description'],
        ], Ticket::validationMessages());

        $this->ticket->update([
            'title' => $this->title,
            'description' => $this->description,
        ]);

        $this->ticket->refresh();
        $this->editingTitle = false;
        $this->editingDescription = false;
        $this->dispatch('saved');
    }

    /**
     * Cancel editing for all fields (for mobile bottom sheet).
     */
    public function cancelEditingAll(): void
    {
        $this->title = $this->ticket->title;
        $this->description = $this->ticket->description;
        $this->editingTitle = false;
        $this->editingDescription = false;
    }

    public function addComment(): void
    {
        $this->authorize('comment', $this->ticket);

        $this->validate();

        $comment = TicketComment::create([
            'ticket_id' => $this->ticket->id,
            'user_id' => Auth::id(),
            'body' => $this->newComment,
        ]);

        $this->storeCommentAttachments($comment);

        $this->newComment = '';
        $this->commentAttachments = [];
        $this->ticket->refresh();
    }

    protected function storeCommentAttachments(TicketComment $comment): void
    {
        $this->storeAttachmentsFor($comment, 'commentAttachments', 'comments');
    }

    public function render(TicketDataService $ticketData)
    {
        return view('livewire.tickets.ticket-show', array_merge(
            [
                'comments' => $this->ticket->comments()->with(['user', 'attachments'])->get(),
                'ticketAttachments' => $this->ticket->attachments()->with('user')->get(),
                'isAdmin' => auth()->user()->isAdmin(),
            ],
            $ticketData->getTicketFormData(includeUsers: true),
        ));
    }
}
