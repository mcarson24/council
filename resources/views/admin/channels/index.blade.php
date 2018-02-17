@extends('admin.layout.app')

@section('administration-content')
    <new-channel></new-channel>

    <table style="border-collapse: collapse">
        <thead class="bg-grey-lightest text-grey-darkest uppercase tracking-wide text-xs">
            <tr>
                <th class="p-4 border-b">Name</th>
                <th class="p-4 border-b">Slug</th>
                <th class="p-4 border-b">Description</th>
                <th class="p-4 border-b">Threads</th>
                <th class="p-4 border-b">Actions</th>
            </tr>
        </thead>

        <tbody>
            @forelse($channels as $channel)
                <tr class="border-b {{ $channel->archived ? 'bg-red-lighter' : '' }}">
                    <td class="text-sm p-4 border-b">{{ $channel->name }}</td>
                    <td class="text-sm p-4 border-b">{{ $channel->slug }}</td>
                    <td class="text-sm p-4 border-b">{{ $channel->description }}</td>
                    <td class="text-sm p-4 border-b">{{ $channel->threads_count }}</td>
                    <td class="text-sm p-4 border-b">
                        <a href="{{ route('admin.channels.edit', $channel) }}" class="text-blue link text-sm">Edit</a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td>Nothing here.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection
