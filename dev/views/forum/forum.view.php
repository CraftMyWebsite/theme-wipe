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

            <div class="relative flex py-2 border-t bg-gray-50 hover:bg-gray-100">
                <div class="md:w-[55%] px-5 relative">
                    <a class="flex flex-wrap hover:text-blue-800" href="subforum.php">
                        <div class="w-12 h-12 shadow-xl">
                            <img style="object-fit: fill; max-height: 48px; max-width: 48px" width="48px" height="48px" src="https://voyza.fr/public/uploads/users/oTFhgvOIwBy657uDEaW2kizf.png" />
                        </div>
                        <div class="ml-4">
                            <p>Bonsoir !</p>
                            <p><span class="font-medium">Zomb</span> <span class="text-sm">le </span></p>
                            </p>
                        </div>
                        <div class="absolute top-0 right-0">
                            <i data-tooltip-target="tooltip-important" class="fa-solid fa-triangle-exclamation fa-sm text-orange-500 ml-2"></i>
                            <div id="tooltip-important" role="tooltip" class="absolute z-10 invisible inline-block p-2 text-sm font-medium text-white bg-gray-700 rounded-lg">
                                Important
                            </div>
                            <i data-tooltip-target="tooltip-pined" class="fa-solid fa-thumbtack fa-sm text-red-600 ml-2"></i>
                            <div id="tooltip-pined" role="tooltip" class="absolute z-10 invisible inline-block p-2 text-sm font-medium text-white bg-gray-700 rounded-lg">
                                Épinglé
                            </div>
                            <i data-tooltip-target="tooltip-closed" class="fa-solid fa-lock fa-sm text-yellow-300 ml-2"></i>
                            <div id="tooltip-closed" role="tooltip" class="absolute z-10 invisible inline-block p-2 text-sm font-medium text-white bg-gray-700 rounded-lg">
                                Fermé
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
                                <div class="w-fit">
                                    <img src="https://randomuser.me/api/portraits/women/33.jpg" />
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

                <!------------------
                 -- ADMIN SECTION --
                -------------------->
                <i data-modal-target="defaultModal" data-modal-toggle="defaultModal" data-tooltip-target="tooltip-admin" class="absolute right-1 top-8 fa-solid fa-lg fa-screwdriver-wrench text-blue-800 ml-6 "></i>
                <div id="tooltip-admin" role="tooltip" class="absolute z-10 invisible inline-block p-2 text-sm font-medium text-white bg-gray-700 rounded-lg">
                    Administration du topic
                </div>
                <!------------------
                 --- ADMIN MODAL ---
                -------------------->
                <div id="defaultModal" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] md:h-full">
                    <div class="relative w-full h-full max-w-2xl md:h-auto">
                        <!-- Modal content -->
                        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                            <!-- Modal header -->
                            <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                    Gestion de
                                </h3>
                                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="defaultModal">
                                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                    <span class="sr-only">Close modal</span>
                                </button>
                            </div>
                            <!-- Modal body -->
                            <div class="p-4">

                                <label for="countries" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Déplacer vers</label>
                                <select id="countries" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    <option selected>Ne pas déplacer</option>
                                    <option>Un autre topic</option>
                                </select>


                                    <h6 class="font-semibold mt-4">Marquer comme :</h6>
                                    <ul class="ml-3">
                                        <li class="mb-2"><a class="hover:text-blue-600 cursor-pointer"><i class="fa-solid fa-triangle-exclamation text-orange-500 fa-lg"></i> Important</a></li>
                                        <li class="mb-2"><a class="hover:text-blue-600 cursor-pointer"><i class="fa-solid fa-thumbtack text-red-600 fa-lg"></i> Épingler</a></li>
                                        <li class="mb-2"><a class="hover:text-blue-600 cursor-pointer"><i class="fa-solid fa-lock text-yellow-300 fa-lg"></i> Fermer</a></li>
                                    </ul>



                            </div>
                            <!-- Modal footer -->
                            <div class="flex justify-between p-6 space-x-2 border-t border-gray-200 rounded-b">
                                <button type="button" class="text-gray-700 border-2 border-red-700 hover:border-red-800 font-medium rounded-md text-sm p-1"><i class="fa-solid fa-trash fa-lg"></i> Supprimer</button>
                                <button type="button" class="text-white bg-blue-700 hover:bg-blue-800 font-medium rounded-md text-sm p-1">Valider</button>
                            </div>
                        </div>
                    </div>
                </div>

            </div>




        </div>
    </div>


    <div class="h-fit">
        <div class="text-center mb-4">
            <a href="" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 focus:outline-none"><i class="fa-solid fa-pen-to-square"></i> Créer un topic</a>
        </div>

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








