<div class="m-8">
<H1>Projects</h1>

<div>
<flux:button size="sm" color="primary" wire:click="new()">New Project</flux:button>
</div>

<flux:table :paginate="$projects" >
    <flux:columns>
    <flux:column sortable :sorted="$sortBy === 'name'" :direction="$sortDirection" wire:click="sort('name')">Name</flux:column>
    <flux:column sortable :sorted="$sortBy === 'category'" :direction="$sortDirection" wire:click="sort('category')">Category</flux:column>
    <flux:column sortable :sorted="$sortBy === 'archived'" :direction="$sortDirection" wire:click="sort('archived')">Archived</flux:column>
    <flux:column sortable :sorted="$sortBy === 'created_at'" :direction="$sortDirection" wire:click="sort('created_at')">Creation Date</flux:column>
        <flux:column>Action</flux:column>
    </flux:columns>

    <flux:rows>
        @foreach ($projects as $project)

            <flux:row :key="$project->id">

                <flux:cell>
                    {{ $project->name }}
                </flux:cell>

                <flux:cell>
                    {{ $project->category }}
                </flux:cell>

                <flux:cell>
                    {{ $project->archived }}
                </flux:cell>

                <flux:cell>{{ $project->created_at }}</flux:cell>

                <flux:cell>
                    <flux:button size="sm" color="primary" wire:click="edit({{ $project->id }})">Edit</flux:button>
                    <flux:button size="sm" color="danger" wire:click="archive({{ $project->id }})">Archive</flux:button>
                </flux:cell>

            </flux:row>
        @endforeach
    </flux:rows>
</flux:table>


    <flux:modal name="edit-project" class="md:w-96 space-y-6">
        <h2 class="text-lg font-semibold">{{ $modalMessage }}</h2>

        <flux:input label="Name" placeholder="Proejct name" wire:model="name" />

        <flux:select wire:model.live="category" placeholder="Choose Category" label="Category">
            @foreach ($categories as $cat)
            <flux:option >{{$cat}}</flux:option>  
            @endforeach
        </flux:select>
        Category is {{$category}}

        <flux:switch wire:model.live="archived" label="Archive Project" />
    
        <div class="flex ">
            <flux:spacer />

            <flux:button   type="submit" variant="primary" wire:click="submitModal">Save changes</flux:button>
        </div>
    </flux:modal>

</div>

