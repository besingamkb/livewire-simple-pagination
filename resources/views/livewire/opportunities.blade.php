<div>
<!-- Items per page selection -->

<form wire:submit="search">
    <input type="text" wire:model="query" placeholder="query...">

    <button type="submit">Search item</button>
</form>


    <div class="my-6 py-6">
        <label for="perPage">Items per page:</label>
        <select wire:model.live="perPage" id="perPage">
            @foreach($options as $option)
            <option value="{{ $option }}">{{ $option }}</option>
            @endforeach
        </select>
    </div>

    <!-- Items list -->
    <div  class="my-6 py-6">
        <!-- Pagination links -->
        {{ $items->links() }}
            <table  class="min-w-full text-left border-collapse my-6 py-6">
            <thead>
                <tr>
                    <th class="px-6 py-3 bg-gray-200 font-semibold text-gray-700 text-sm uppercase border-b">Name: <button wire:click="sortBy('name')" class="text-blue-500 hover:underline">
                            Name
                            @if($sortField === 'name')
                                @if($sortDirection === 'asc')
                                    &uarr;
                            @else
                                &darr;
                            @endif
                            @endif
                        </button></th>
                    <th class="px-6 py-3 bg-gray-200 font-semibold text-gray-700 text-sm uppercase border-b">Name: Tags</th>
                </tr>
            </thead>
            <tbody>

            @forelse($items as $item)
                <tr>
                    <td class="px-6 py-4 border-b">{{ $item->name }}</td>
                    <td class="px-6 py-4 border-b">{{ collect($item->tags)->pluck('tag_name')->take(4)->implode(',') . ($item->tags->count() > 4 ? '...' : '') }}</td>
                </tr>
                @empty
                <tr>

                    <td class="px-6 py-4 border-b" colspan="2">no item found</td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>
    <!-- Pagination links -->
    <div  class="my-6 py-6">
        {{ $items->links() }}
    </div>
</div>
