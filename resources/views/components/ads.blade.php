
<div class="grid lg:grid-cols-3 md:grid-cols-2 grid-cols-1 gap-[30px]">
    @foreach ($ads as $ad)
        <div class="group rounded-xl bg-white dark:bg-slate-900 shadow hover:shadow-xl dark:hover:shadow-xl dark:shadow-gray-700 dark:hover:shadow-gray-700 overflow-hidden ease-in-out duration-500">
            <a href="/ads/{{ $ad->id }}">
                <div class="relative">
                    <img src="../assets/images/ads/{{ $ad->image_name }}" alt="">

                    <div class="absolute top-4 end-4">
                        <form action="/ads/{{$ad->id}}/bookmark" method="post">
                            @csrf
                            <button type="submit" class="btn btn-icon btn-sm btn-success shadow">
                                <i data-feather="bookmark" class="text-[20px]"></i>
                            </button>
                        </form>
                    </div>
                </div>
            </a>
            <div class="p-6">
                <div class="pb-6">
                    <a href="/ads/{{ $ad->id }}" class="text-lg hover:text-green-600 font-medium ease-in-out duration-500">{{  $ad->title }}</a>
                </div>

                <ul class="py-6 border-y border-slate-100 dark:border-gray-800 flex items-center list-none">
                    <li class="flex items-center me-4">
                        <i class="uil uil-compress-arrows text-2xl me-2 text-green-600"></i>
                        <span>{{ $ad->square }} m2</span>
                    </li>

                    <li class="flex items-center me-4">
                        <i class="mdi mdi-door-open text-2xl me-2 text-green-600"></i>
                        <span>{{ $ad->rooms }} rooms</span>
                    </li>

                    <li class="flex items-center">
                        <i class="mdi mdi-map-marker-radius text-2xl me-2 text-green-600"></i>
                        <span>{{ $ad->branch->name }}</span>
                    </li>
                </ul>

                <ul class="pt-6 flex justify-between items-center list-none">
                    <li>
                        <span class="text-slate-400">Price</span>
                        <p class="text-lg font-medium">${{ $ad->price }}</p>
                    </li>

                    <li>
                        <span class="text-slate-400">Rating</span>
                        <ul class="text-lg font-medium text-amber-400 list-none">
                            <li class="inline"><i class="mdi mdi-star"></i></li>
                            <li class="inline"><i class="mdi mdi-star"></i></li>
                            <li class="inline"><i class="mdi mdi-star"></i></li>
                            <li class="inline"><i class="mdi mdi-star"></i></li>
                            <li class="inline"><i class="mdi mdi-star"></i></li>
                            <li class="inline text-black dark:text-white">5.0(30)</li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div><!--end property content-->
    @endforeach
</div><!--en grid-->


@if ($ads->isEmpty())
    <div class="container relative lg:mt-2 mt-16">
        <div class="grid grid-cols-1 text-center">
            <h3 class="mb-6 md:text-3xl md:leading-normal text-2xl leading-normal font-semibold">No resources!</h3>
        </div><!--end grid-->
    </div><!--end container-->
@endif
