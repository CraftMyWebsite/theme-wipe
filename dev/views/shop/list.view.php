<section class="bg-gray-800 relative text-white">
    <img src="/dev/img/bg.webp" class="absolute h-full inset-0 object-center object-cover w-full"
         alt="Vous devez upload bg.webp depuis votre panel !" width="1080" height="720"/>
    <div class="container mx-auto px-4 py-12 relative">
        <div class="flex flex-wrap -mx-4">
            <div class="mx-auto px-4 text-center w-full lg:w-8/12">
                <h1 class="font-extrabold mb-4 text-2xl md:text-6xl">Boutique</h1>
            </div>
        </div>
    </div>
</section>

<section class="bg-white rounded-lg shadow my-8 sm:mx-12 lg:mx-72">
    <div class="container p-4">

        <div class="flex flex-wrap justify-between border-t border-b py-2">
            <div>
                <select id="small"
                        class="block pr-8 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500">
                    <option selected>Tri : Défaut</option>
                    <option value="pop">Tri : Popularité</option>
                    <option value="review">Tri : Notes</option>
                    <option value="date">Tri : Dates</option>
                    <option value="priceup">Tri : Prix croissant</option>
                    <option value="pricedown">Tri : Prix décroissant</option>
                </select>
            </div>
            <div class="flex hidden xl:block">
                <div class="relative w-full lg:w-96">
                    <input type="search" id="search-dropdown"
                           class="block p-2.5 w-full z-20 text-sm text-gray-900 bg-gray-50 rounded-lg border-gray-100 border-l-2 border border-gray-300 focus:ring-blue-500 focus:border-blue-500"
                           placeholder="Rechercher" required>
                    <button type="submit"
                            class="absolute top-0 right-0 p-2.5 text-sm font-medium text-white bg-blue-700 rounded-r-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300">
                        <svg aria-hidden="true" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                             xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                    </button>
                </div>
            </div>
            <div>
                <button type="button"
                        class="inline-flex relative items-center p-3 text-sm font-medium text-center text-black">
                    <i class="text-xl fa-solid fa-cart-shopping"></i>
                    <span class="sr-only">Articles</span>
                    <div class="inline-flex  absolute -top-2 -right-2 justify-center items-center w-6 h-6 text-xs font-bold text-white bg-red-500 rounded-full border-2 border-white dark:border-gray-900">
                        4
                    </div>
                </button>
            </div>

        </div>

        <div class="flex flex-wrap justify-between border-b py-2">
            <div>
                <select id="small"
                        class="block pr-8 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500">
                    <option selected>Catégorie : Tout afficher</option>
                    <option value="pop">Catégorie : Oklm</option>
                </select>
            </div>
            <div>
                <select id="small"
                        class="block pr-8 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500">
                    <option selected>Serveur : Minecraft</option>
                    <option value="pop">Serveur : Eve Online</option>
                </select>
            </div>
        </div>

        <div class="py-4 flex flex-wrap">
            <div class="w-full xl:w-1/2 2xl:w-1/4 mb-5 2xl:mb-0 px-4 hover:scale-105 transition">
                <a href="#">
                    <div class="rounded-t border-t border-l border-r border-gray-200 p-4">
                        <img class="mx-auto h-48"
                             src="data:image/jpeg;base64,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">
                        <h4 class="text-center">Du pain.</h4>
                        <p>Ceci est un description courte de l'article !</p>
                        <p class="text-xs text-center hover:text-blue-600">Lire la suite</p>
                    </div>
                    <div class="grid grid-cols-2 border rounded-b py-2">
                        <p class="text-center text-xl">15,99€</p>
                        <a href="#" class="border-l text-center text-2xl hover:text-blue-600"><i
                                    class="fa-solid fa-cart-plus"></i></a>
                    </div>
                </a>
            </div>

            <div class="w-full xl:w-1/2 2xl:w-1/4 mb-5 2xl:mb-0 px-4 hover:scale-105 transition">
                <a href="#">
                    <div class="rounded-t border-t border-l border-r border-gray-200 p-4">
                        <img class="mx-auto h-48" src="https://i.notretemps.com/2000x1125/smart/2022/10/07/pains.jpg">
                        <h4 class="text-center">Du pain.</h4>
                        <p>Ceci est un description courte de l'article !</p>
                        <p class="text-xs text-center hover:text-blue-600">Lire la suite</p>
                    </div>
                    <div class="grid grid-cols-2 border rounded-b py-2">
                        <p class="text-center text-xl">15,99€</p>
                        <a href="#" class="border-l text-center text-2xl hover:text-blue-600"><i
                                    class="fa-solid fa-cart-plus"></i></a>
                    </div>
                </a>
            </div>

            <div class="w-full xl:w-1/2 2xl:w-1/4 mb-5 2xl:mb-0 px-4 hover:scale-105 transition">
                <a href="#">
                    <div class="rounded-t border-t border-l border-r border-gray-200 p-4">
                        <img class="mx-auto h-48"
                             src="https://static.lexpress.fr/medias_11483/w_2048,h_1146,c_crop,x_0,y_0/w_1000,h_563,c_fill,g_north/v1494863617/baguette-pain-boulangerie_5879711.jpg">
                        <h4 class="text-center">Du pain.</h4>
                        <p>Ceci est un description courte de l'article !</p>
                        <p class="text-xs text-center hover:text-blue-600">Lire la suite</p>
                    </div>
                    <div class="grid grid-cols-2 border rounded-b py-2">
                        <p class="text-center text-xl">15,99€</p>
                        <a href="#" class="border-l text-center text-2xl hover:text-blue-600"><i
                                    class="fa-solid fa-cart-plus"></i></a>
                    </div>
                </a>
            </div>

            <div class="w-full xl:w-1/2 2xl:w-1/4 mb-5 2xl:mb-0 px-4 hover:scale-105 transition">
                <a href="#">
                    <div class="rounded-t border-t border-l border-r border-gray-200 p-4">
                        <img class="mx-auto h-48"
                             src="https://lepetitjournal.com/sites/default/files/styles/main_article/public/2019-03/ob_a7c24f_capture-d-ecran-2015-06-16-a-20-16.png?itok=_F5wE6ew">
                        <h4 class="text-center">Du pain.</h4>
                        <p>Ceci est un description courte de l'article !</p>
                        <p class="text-xs text-center hover:text-blue-600">Lire la suite</p>
                    </div>
                    <div class="grid grid-cols-2 border rounded-b py-2">
                        <p class="text-center text-xl">15,99€</p>
                        <a href="#" class="border-l text-center text-2xl hover:text-blue-600"><i
                                    class="fa-solid fa-cart-plus"></i></a>
                    </div>
                </a>
            </div>

        </div>
        <div class="flex flex-col items-center border-t pt-2">
            <span class="text-sm text-gray-700 dark:text-gray-400">Affiche
                <span class="font-semibold text-gray-900 dark:text-white">1</span> à <span
                        class="font-semibold text-gray-900 dark:text-white">10</span> sur <span
                        class="font-semibold text-gray-900 dark:text-white">100</span> éléments
  </span>
            <!-- Buttons -->
            <div class="inline-flex mt-2 xs:mt-0">
                <button class="px-4 py-2 text-sm font-medium text-white bg-gray-800 rounded-l hover:bg-gray-900 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                         xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                              d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                              clip-rule="evenodd"></path>
                    </svg>
                </button>
                <button class="px-4 py-2 text-sm font-medium text-white bg-gray-800 border-0 border-l border-gray-700 rounded-r hover:bg-gray-900 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                         xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                              d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                              clip-rule="evenodd"></path>
                    </svg>
                </button>
            </div>
        </div>
    </div>
</section>