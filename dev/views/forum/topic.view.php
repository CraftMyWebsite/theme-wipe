<section class="bg-gray-800 relative text-white">
    <img src="/dev/img/bg.webp" class="absolute h-full inset-0 object-center object-cover w-full"
         alt="Vous devez upload bg.webp depuis votre panel !" width="1080" height="720"/>
    <div class="container mx-auto px-4 py-12 relative">
        <div class="flex flex-wrap -mx-4">
            <div class="mx-auto px-4 text-center w-full lg:w-8/12">
                <h1 class="font-bold mb-4 text-2xl md:text-6xl">Forum</h1>
            </div>
        </div>
    </div>
</section>

<section class="lg:grid grid-cols-4 gap-6 sm:mx-12 2xl:mx-72 pt-8">
    <div class="col-span-3">

        <nav class="flex" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1">
                <li class="inline-flex items-center">
                    <a href="#" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">
                        Home
                    </a>
                </li>
                <li>
                    <div class="flex items-center">
                        <i class="fa-solid fa-chevron-right"></i>
                        <a href="#" class="ml-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ml-2 dark:text-gray-400 dark:hover:text-white">Projects</a>
                    </div>
                </li>
            </ol>
        </nav>

    </div>
    <form>
        <div class="flex">
            <div class="relative w-full">
                <input type="search" id="search-dropdown" class="block p-1 w-full z-20 text-sm text-gray-900 bg-gray-50 rounded-lg border-gray-100 border-l-2 border border-gray-300 focus:ring-blue-500 focus:border-blue-500" placeholder="Rechercher">
                <button type="submit" class="absolute top-0 right-0 p-1 text-sm font-medium text-white bg-blue-700 rounded-r-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300"><i class="fa-solid fa-magnifying-glass"></i></button>
            </div>
        </div>
    </form>
</section>

<section class="my-8 sm:mx-12 2xl:mx-72">
    <div class="rounded-md shadow-lg p-8">
        <section>
            <div class="flex justify-between">
                <h4>Nom du Topic</h4>
                <div class="">
                    <i data-tooltip-target="tooltip-important" class="fa-solid fa-triangle-exclamation text-orange-500 ml-4"></i>
                    <div id="tooltip-important" role="tooltip" class="absolute z-10 invisible inline-block p-2 text-sm font-medium text-white bg-gray-700 rounded-lg">
                        Important
                    </div>
                    <i data-tooltip-target="tooltip-pined" class="fa-solid fa-thumbtack text-red-600 ml-4"></i>
                    <div id="tooltip-pined" role="tooltip" class="absolute z-10 invisible inline-block p-2 text-sm font-medium text-white bg-gray-700 rounded-lg">
                        Épinglé
                    </div>
                    <i data-tooltip-target="tooltip-closed" class="fa-solid fa-lock text-yellow-300 ml-4"></i>
                    <div id="tooltip-closed" role="tooltip" class="absolute z-10 invisible inline-block p-2 text-sm font-medium text-white bg-gray-700 rounded-lg">
                        Fermé
                    </div>
                </div>
            </div>

            <p><small>Discussion dans crée par Zomb, le</small></p>
            <p><small><span class="px-1 bg-gray-200 rounded mr-1">Tag 1</span></small> <small><span class="px-1 bg-gray-200 rounded mr-1">Tag 2</span></small> <small><span class="px-1 bg-gray-200 rounded mr-1">Tag 3</span></small></p>
        </section>

        <section class="border mt-4">
            <div class="flex justify-between bg-gray-200 p-2">
                <p>07/04/2023 à 22h 35m 32s</p>
                <p>#1</p>
            </div>
            <div class="lg:grid grid-cols-5">
                <div class="p-4 text-center ">
                    <div class="bg-gray-100 p-2">
                        <div class="w-36 h-36 mx-auto border">
                            <img style="object-fit: fill; max-height: 144px; max-width: 144px" width="144px" height="144px" src="https://voyza.fr/public/uploads/users/default/defaultImage.jpg" />
                        </div>
                    </div>
                    <h5 class="font-semibold bg-gray-200">Zomb</h5>
                    <div class="bg-gray-100 pb-1">
                        <p><small>Administrateur</small></p>
                    </div>
                    <div class="px-4 pb-2 bg-gray-100">
                        <div class="border">
                            <div class="grid grid-cols-3">
                                <div>
                                    <p><i class="fa-solid fa-comments fa-xs text-gray-600"></i></p>
                                    <p><small>NA</small></p>
                                </div>
                                <div>
                                    <p><i class="fa-solid fa-thumbs-up fa-xs text-gray-600"></i></p>
                                    <p><small>NA</small></p>
                                </div>
                                <div>
                                    <p><i class="fa-solid fa-trophy fa-xs text-gray-600"></i></p>
                                    <p><small>NA</small></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-span-4 py-4 pr-2">
                    <div class="border p-2 h-fit">
                        <p>
                        Bonjour à tous,<br>
                        Ceci est le Forum de Wipe.<br>
                        Qu'en pensez vous ??
                        </p>
                        <div class="flex justify-between mt-4">
                            <p><small>Zomb, 07/04/2023 à 22h 35m 32s</small></p>
                            <p>#1</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="border mt-4">
            <div class="bg-gray-200 p-2">
                <p><b>Répondre à ce topic :</b></p>
            </div>
            <div class="lg:grid grid-cols-5">
                <div class="p-4 text-center ">
                    <div class="bg-gray-100 p-2">
                        <div class="w-36 h-36 mx-auto border">
                            <img style="object-fit: fill; max-height: 144px; max-width: 144px" width="144px" height="144px" src="https://voyza.fr/public/uploads/users/oTFhgvOIwBy657uDEaW2kizf.png" />
                        </div>
                    </div>
                </div>
                <div class="col-span-4 py-4 pr-2">
                    <div class="h-fit">
                        <textarea class="w-full"></textarea>
                        <div class="flex justify-end">
                            <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 font-medium rounded-lg text-sm px-5 py-2.5"><i class="fa-solid fa-reply"></i> Poster ma réponse</button>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</section>