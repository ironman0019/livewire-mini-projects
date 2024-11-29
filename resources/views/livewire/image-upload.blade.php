<div class="p-6">

    <form wire:submit.prevent="save" class="flex flex-col w-[400px] mx-auto py-16">

        @if($images)
            Preview:
            <div class="flex flex-wrap justify-center gap-6">
                @foreach($images as $im)
                    <img src="{{ $im->temporaryUrl() }}" class="w-[110px] h-[90px] object-cover">
                @endforeach
            </div>
        @endif

        <input type="file" wire:model="images" class="mb-4" multiple>

        @error('images.*') <span class="error text-red-600">{{$message}}</span> @enderror

        <button type="submit" class="py-2 px-4 bg-indigo-500 hover:bg-indigo-600 rounded text-white">Save Photo</button>
    </form>

    <div class="flex flex-wrap gap-7">
        @foreach($allImages as $image)
            <img src="{{$image}}" alt="image" class="w-[128px] h-[120px] object-cover">
        @endforeach
    </div>
    
</div>
