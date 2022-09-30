<div class="my-10 flex justify-center w-full" wire:poll.60s="refreshComponent" >
    <section class="border rounded shadow-lg p-4 w-6/12 bg-gray-200">
        <h2 class="text-center text-3xl my-5">Kayne West Quote</h2>
        <hr>

            <div class="my-8" style="padding:10px 0px 0px">
                @foreach($quotes as $quote)
                <div class="flex flex-wrap w-10/12">
                    <p class="text-gray-800">&#8226; {{$quote}}</p>
                </div>
                @endforeach
            </div>

            <div class="flex justify-around my-8">
                <div class="flex flex-wrap w-10/12">
                    <button wire:loading.attr="disabled" wire:click="refreshComponent" class="p-2 bg-gray-800 text-white w-full rounded tracking-wider cursor-pointer" >
                        <i wire:loading class="fa fa-refresh fa-spin"></i>
                        Refresh
                </button>
                </div>
            </div>
    </section>
</div>
