<div class="overflow-x-auto">
    <table class="table-auto border-2 border-gray-500">
        <thead>
            <tr class=" text-gray-800">
                <th class="border border-gray-400 px-4 py-2">Created At</th>
                <th class="border border-gray-400 px-4 py-2">Updated At</th>
                <th class="border border-gray-400 px-4 py-2">Name</th>
                <th class="border border-gray-400 px-4 py-2">E-Mail</th>
                <th class="border border-gray-400 px-4 py-2">Website</th>
                <th class="border border-gray-400 px-4 py-2">Comment</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($comments as $comment)
                <tr>
                    <td class="border border-gray-400 px-4 py-2">{{ $comment->created_at }}</td>
                    <td class="border border-gray-400 px-4 py-2">{{ $comment->updated_at }}</td>
                    <td class="border border-gray-400 px-4 py-2">{{ $comment->name }}</td>
                    <td class="border border-gray-400 px-4 py-2">{{ $comment->email }}</td>
                    <td class="border border-gray-400 px-4 py-2">{{ $comment->website }}</td>
                    <td class="border border-gray-400 px-4 py-2">{{ $comment->comment }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
