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

<section class="py-8">
    <div class="container mx-auto px-4 relative">
        <div id="alert-additional-content-4" class="p-4 mb-4 text-yellow-800 border border-yellow-300 rounded-lg bg-yellow-50 dark:bg-gray-800 dark:text-yellow-300 dark:border-yellow-800" role="alert">
            <div class="flex items-center">
                <svg aria-hidden="true" class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
                <span class="sr-only">Info</span>
                <h3 class="text-lg font-medium">Vous n'avez pas encore créer de forum</h3>
            </div>
            <div class="mt-2 mb-4 text-sm">
                Rendez-vous dans le panel d'administration pour commencer à l'utiliser<br>Seuls les administrateurs voient ce message !
            </div>
            <div class="flex">
                <a href="/cmw-admin/forum/manage" target="_blank" type="button" class="text-white bg-yellow-800 hover:bg-yellow-900 focus:ring-4 focus:outline-none focus:ring-yellow-300 font-medium rounded-lg text-xs px-3 py-1.5 mr-2 text-center inline-flex items-center dark:bg-yellow-300 dark:text-gray-800 dark:hover:bg-yellow-400 dark:focus:ring-yellow-800">
                    <p><i class="fa-solid fa-gears"></i> Gestion du forum</p>
                </a>
                <button type="button" class="text-yellow-800 bg-transparent border border-yellow-800 hover:bg-yellow-900 hover:text-white focus:ring-4 focus:outline-none focus:ring-yellow-300 font-medium rounded-lg text-xs px-3 py-1.5 text-center dark:hover:bg-yellow-300 dark:border-yellow-300 dark:text-yellow-300 dark:hover:text-gray-800 dark:focus:ring-yellow-800" data-dismiss-target="#alert-additional-content-4" aria-label="Close">
                    <p><i class="fa-solid fa-eye-slash"></i> Masquer</p>
                </button>
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
                <div class="md:w-[55%] px-4 font-bold">Contenus importants</div>
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

