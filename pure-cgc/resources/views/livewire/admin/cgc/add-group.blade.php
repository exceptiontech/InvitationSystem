<div>
    <form wire:submit.prevent="saveGroup">
        <div class="mb-3">
            <label for="groupName" class="form-label">Group Name</label>
            <input type="text" class="form-control" id="groupName" wire:model="name">
            @error('name') <span class="text-danger">{{ $message }}</span> @enderror
        </div>
        <button type="submit" class="btn btn-primary">Save</button>
    </form>
</div>
