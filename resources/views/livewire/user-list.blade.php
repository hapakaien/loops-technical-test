<div class="overflow-x-auto">
    <table clas="table-auto border-2 border-gray-500">
        <thead>
            <tr class=" text-gray-800">
                <th rowspan="2" class="border border-gray-400 px-4 py-2">Created At</th>
                <th rowspan="2" class="border border-gray-400 px-4 py-2">Updated At</th>
                <th rowspan="2" class="border border-gray-400 px-4 py-2">Name</th>
                <th rowspan="2" class="border border-gray-400 px-4 py-2">E-Mail</th>
                <th colspan="4" class="border border-gray-400 px-4 py-2">Comments</th>
            </tr>
            <tr class=" text-gray-800">
                <th class="border border-gray-400 px-4 py-2">Name</th>
                <th class="border border-gray-400 px-4 py-2">E-Mail</th>
                <th class="border border-gray-400 px-4 py-2">Website</th>
                <th class="border border-gray-400 px-4 py-2">Comment</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td class="border border-gray-400 px-4 py-2">{{ $user->created_at }}</td>
                    <td class="border border-gray-400 px-4 py-2">{{ $user->updated_at }}</td>
                    <td class="border border-gray-400 px-4 py-2">{{ $user->name }}</td>
                    <td class="border border-gray-400 px-4 py-2">{{ $user->email }}</td>
                    @if ($user->comments->count() == 0)
                        <td colspan="4"  class="border border-gray-400 px-4 py-2 text-center">Tidak ada komentar</td>
                    @endif
                    @foreach ($user->comments as $comment)
                        @if ($loop->first)
                            <td class="border border-gray-400 px-4 py-2">{{ $comment->name }}</td>
                            <td class="border border-gray-400 px-4 py-2">{{ $comment->email }}</td>
                            <td class="border border-gray-400 px-4 py-2">{{ $comment->website }}</td>
                            <td class="border border-gray-400 px-4 py-2">{{ $comment->comment }}</td>
                        @endif
                    @endforeach
                </tr>
                @foreach ($user->comments->skip(1)->all() as $comment)
                    <tr>
                        <td colspan="4" class="border border-gray-400 px-4 py-2"></td>
                        <td class="border border-gray-400 px-4 py-2">{{ $comment->name }}</td>
                        <td class="border border-gray-400 px-4 py-2">{{ $comment->email }}</td>
                        <td class="border border-gray-400 px-4 py-2">{{ $comment->website }}</td>
                        <td class="border border-gray-400 px-4 py-2">{{ $comment->comment }}</td>
                    </tr>
                @endforeach
            @endforeach
        </tbody>
    </table>
</div>
