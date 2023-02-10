
@if(session()->has('message'))
    <!-- when message is initialized, disappear after certain amount of time w/setTimeout. setTimeout takes in arrow function where show is equal to false after 2 seconds -->
    <div x-data="{show: true}" 
        x-init="setTimeout(()=> show = false, 2000)"  
        x-show="show" 
        class="fixed top-0 left-1/2 transform -translate-x-1/2 bg-laravel text-white px-48 py">
        <p>
            {{session('message')}}
        </p>
    </div>
@endif