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


<section class="lg:grid grid-cols-4 gap-6 my-8 sm:mx-12 2xl:mx-72 ">
    <div class="lg:col-span-3 h-fit">
        <div class="w-full shadow-md mb-10">
            <div class="flex py-4 bg-gray-100">
                <div class="md:w-[55%] px-4 font-bold">Sous-Forums</div>
                <div class="hidden md:block w-[10%] font-bold text-center">Topics</div>
                <div class="hidden md:block w-[10%] font-bold text-center">Messages</div>
                <div class="hidden md:block w-[25%] font-bold text-center">Dernier messages</div>
            </div>

            <div class="flex py-6 border-t bg-gray-50 hover:bg-gray-100">
                <div class="md:w-[55%] px-5">
                    <a class="flex" href="subforum.php">
                        <div class="py-2 px-2 bg-gradient-to-b from-gray-400 to-gray-300 rounded-xl shadow-connect w-fit h-fit">
                            <i class="fa-solid fa-comment fa-xl"></i>
                        </div>
                        <div class="ml-4">
                            <div class="font-bold">
                                Informations <span class="badge badge-success">
                            </div>
                            <div>
                                Toutes les informations importantes liées à CraftMyWebsite.
                            </div>
                        </div>
                    </a>
                </div>
                <div class="hidden md:block w-[10%] text-center my-auto">32</div>
                <div class="hidden md:inline-block w-[10%] text-center my-auto">967</div>
                <!--Dernier message-->
                <div class="hidden md:block w-[25%] my-auto">
                    <div class="flex text-sm">
                        <a href="#">
                            <div tabindex="0" class="avatar w-10">
                                <div class="w-fit rounded-full ">
                                    <img src="https://placeimg.com/80/80/people" />
                                </div>
                            </div>
                        </a>
                        <a href="#">
                            <div class="ml-2">
                                <div class="">Vous</div>
                                <div>Mardi 09 Juin, 19:42</div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="w-full shadow-md mb-10">
            <div class="flex py-4 bg-gray-100">
                <div class="md:w-[55%] px-4 font-bold">Topics</div>
                <div class="hidden md:block w-[10%] font-bold text-center">Affichages</div>
                <div class="hidden md:block w-[10%] font-bold text-center">Réponses</div>
                <div class="hidden md:block w-[25%] font-bold text-center">Dernier messages</div>
            </div>

            <div class="flex py-6 border-t bg-gray-50 hover:bg-gray-100">
                <div class="md:w-[55%] px-5">
                    <a class="flex flex-wrap" href="subforum.php">
                        <div class="py-2 px-2 bg-gradient-to-b from-gray-400 to-gray-300 rounded-xl shadow-connect w-fit h-fit">
                            <i class="fa-solid fa-comment fa-xl"></i>
                        </div>
                        <div class="ml-4">
                            <div class="font-bold">
                                Je suis un fifou
                            </div>
                            <div>
                                <b>Zomb</b> le
                            </div>
                        </div>
                        <div class="ml-auto">
                            <i data-tooltip-target="tooltip-pined" class="fa-solid fa-thumbtack fa-sm text-red-600"></i>
                            <div id="tooltip-pined" role="tooltip" class="absolute z-10 invisible inline-block p-2 text-sm font-medium text-white bg-gray-700 rounded-lg">
                                Topic important
                            </div>

                            <i data-tooltip-target="tooltip-closed" class="fa-solid fa-lock fa-sm text-yellow-300 ml-6"></i>
                            <div id="tooltip-closed" role="tooltip" class="absolute z-10 invisible inline-block p-2 text-sm font-medium text-white bg-gray-700 rounded-lg">
                                Topic clos
                            </div>
                        </div>
                    </a>
                </div>
                <div class="hidden md:block w-[10%] text-center my-auto">32</div>
                <div class="hidden md:inline-block w-[10%] text-center my-auto">967</div>
                <!--Dernier message-->
                <div class="hidden md:block w-[25%] my-auto">
                    <div class="flex text-sm">
                        <a href="#">
                            <div tabindex="0" class="avatar w-10">
                                <div class="w-fit rounded-full ">
                                    <img src="https://placeimg.com/80/80/people" />
                                </div>
                            </div>
                        </a>
                        <a href="#">
                            <div class="ml-2">
                                <div class="">Vous</div>
                                <div>Mardi 09 Juin, 19:42</div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <div class="h-fit">
        <div class="w-full shadow-md mb-6">
            <div class="flex py-4 bg-gray-100 border-b">
                <div class="px-4 font-bold">Widgets 1</div>
            </div>

            <div class="px-2 py-4">
                <p>Des trucs cool</p>
            </div>
        </div>

        <div class="w-full shadow-md mb-6">
            <div class="flex py-4 bg-gray-100 border-b">
                <div class="px-4 font-bold">Widgets 2</div>
            </div>

            <div class="px-2 py-4">
                <p>D'autres trucs cool</p>
            </div>
        </div>
    </div>
</section>