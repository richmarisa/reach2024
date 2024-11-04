<div class="m-8">
<H1>Resources</h1>

<div>
<flux:button size="sm" color="primary" wire:click="new()">New Resource</flux:button>
</div>

<flux:table :paginate="$resources" >
    <flux:columns>
        <flux:column sortable :sorted="$sortBy === 'name'" :direction="$sortDirection" wire:click="sort('name')">Name</flux:column>
        <flux:column sortable :sorted="$sortBy === 'role'" :direction="$sortDirection" wire:click="sort('role')">Role</flux:column>
        <flux:column sortable :sorted="$sortBy === 'color'" :direction="$sortDirection" wire:click="sort('color')">Color</flux:column>
        <flux:column sortable :sorted="$sortBy === 'text_color'" :direction="$sortDirection" wire:click="sort('text_color')">Text Color</flux:column>
        <flux:column sortable :sorted="$sortBy === 'created_at'" :direction="$sortDirection" wire:click="sort('created_at')">Creation Date</flux:column>
        <flux:column>Action</flux:column>
    </flux:columns>

    <flux:rows>
        @foreach ($resources as $resource)

            <flux:row :key="$resource->id">

                <flux:cell>
                    {{ $resource->name }}
                </flux:cell>

                <flux:cell>{{ $resource->resourcerole }}</flux:cell>
                
                <flux:cell>
                    <input type="color" value="{{ $resource->color }}" disabled> {{$resource->color}}
                </flux:cell>
                
                <flux:cell>
                    <input type="color" value="{{ $resource->textcolor }}" disabled> {{$resource->textcolor}}
                </flux:cell>

                <flux:cell>{{ $resource->created_at }}</flux:cell>

                <flux:cell>
                    <flux:button size="sm" color="primary" wire:click="edit({{ $resource->id }})">Edit</flux:button>
                    <flux:button size="sm" color="danger" wire:click="delete({{ $resource->id }})">Delete</flux:button>
                </flux:cell>

            </flux:row>
        @endforeach
    </flux:rows>
</flux:table>


    <flux:modal name="edit-resource" class="md:w-96 space-y-6">
        <h2 class="text-lg font-semibold">{{ $modalMessage }}</h2>

        <flux:input label="Name" placeholder="Resource name" wire:model="name" />

        <div class="">
        <flux:select wire:model.live="resourcerole" placeholder="Choose Resource Role" label="Role">
            @foreach ($resourceroles as $rr)
            <flux:option >{{$rr}}</flux:option>  
            @endforeach
        </flux:select>
        </div>
       

        <flux:input  class="" type="color" name="color" label="Color" wire:model="color" />

        <flux:input  class="" type="color" name="textcolor" label="Text Color" wire:model="textcolor" />
 
        <div class="flex ">
            <flux:spacer />

            <flux:button   type="submit" variant="primary" wire:click="submitModal">Save changes</flux:button>
        </div>
    </flux:modal>

</div>
