
<!-- listing card component takes in a prop, pass in array of props (listing) -->
@props(['listing'])

<x-card>
    <div class="flex">
        <!-- asset helper to show public images -->
        <img
            class="hidden w-48 mr-6 md:block"
            src="{{asset('images/no-image.png')}}"
            alt=""
        />
        <div>
            <h3 class="text-2xl">
                <!-- Eloquent models give collection. $listing['title'] replaced by $listing->title-->
                <a href="/listings/{{$listing->id}}">{{$listing->title}}</a>
            </h3>
            <div class="text-xl font-bold mb-4">{{$listing->company}}</div>
            <!-- bring in tags component, pass in tagsCsv, set to $listing->tags -->
            <x-listing-tags :tagsCsv="$listing->tags" />
            <div class="text-lg mt-4">
                <i class="fa-solid fa-location-dot"></i> {{$listing->location}}
            </div>
        </div>
    </div>
</x-card>