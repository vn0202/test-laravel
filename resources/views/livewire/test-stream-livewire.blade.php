<div>
    <table class="border border-slate-300">
        <thead>
        <tr class="border  border-slate-300">
            <th class="px-3 py-2.5"> check all</th>
            <th class="px-3 py-2.5">Name</th>
            <th class="px-3 py-2.5">Processed</th>
        </tr>
        </thead>
        <tbody>
        <!-- List real estate properties -->
        @foreach( $properties as $prop )
            <tr wire:key="{{$prop->id}}">
                <!-- Yes Checkbox for each row! -->
                <td  class="px-3 py-2.5"> <input type="checkbox" wire:model.live="ids.{{$prop->id}}.checked"/></td>
                <td  class="px-3 py-2.5">{{$prop['name']}}</td>
                <td  class="px-3 py-2.5" wire:stream="process{{$prop->id}}">
                    @if(count($ids) && isset($ids[$prop->id]['status']))
                        {{$ids[$prop->id]['status'] }}
                    @endif
                </td>
            </tr>
        @endforeach
        </tbody>

    </table>
    <div class="mt-10">
        {{ $properties->links() }}
        <button wire:click="process" class="bg-blue-500 text-white rounded-full px-4 py-2.5">Process</button>
    </div>
</div>
