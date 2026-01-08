<div>
    <table class="table-auto w-full">
        <thead>
            <tr>
                <th class="px-4 py-2">ID</th>
                <th class="px-4 py-2">Title</th>
                <th class="px-4 py-2">Status</th>
                <th class="px-4 py-2">Priority</th>
                <th class="px-4 py-2">Created At</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tickets as $ticket)
                <tr>
                    <td class="border px-4 py-2">{{ $ticket->id }}</td>
                    <td class="border px-4 py-2">{{ $ticket->title }}</td>
                    <td class="border px-4 py-2">{{ $ticket->status }}</td>
                    <td class="border px-4 py-2">{{ $ticket->priority }}</td>
                    <td class="border px-4 py-2">{{ $ticket->created_at }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
