<div class="overflow-x-auto">
    <table class="table-auto border-2 border-gray-500">
        <thead>
            <tr class=" text-gray-800">
                <th class="border border-gray-400 px-4 py-2">Created At</th>
                <th class="border border-gray-400 px-4 py-2">Updated At</th>
                <th class="border border-gray-400 px-4 py-2">Title</th>
                <th class="border border-gray-400 px-4 py-2">Slug</th>
                <th class="border border-gray-400 px-4 py-2">Content</th>
                <th class="border border-gray-400 px-4 py-2">Name</th>
                <th class="border border-gray-400 px-4 py-2">E-Mail</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($posts as $post)
                <tr>
                    <td class="border border-gray-400 px-4 py-2">{{ $post->created_at }}</td>
                    <td class="border border-gray-400 px-4 py-2">{{ $post->updated_at }}</td>
                    <td class="border border-gray-400 px-4 py-2">{{ $post->title }}</td>
                    <td class="border border-gray-400 px-4 py-2">{{ $post->slug }}</td>
                    <td class="border border-gray-400 px-4 py-2">{{ $post->content }}</td>
                    <td class="border border-gray-400 px-4 py-2">{{ $post->user->name }}</td>
                    <td class="border border-gray-400 px-4 py-2">{{ $post->user->email }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
