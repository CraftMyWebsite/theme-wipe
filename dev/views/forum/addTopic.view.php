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
</section>

<section class="my-8 sm:mx-12 2xl:mx-72">
    <div class="rounded-md shadow-lg p-8">

        <h4>Nouveau topic dans : </h4>
        <form>
            <!--
            ADMINISTRATION
            -->
            <div class="border-b p-2">
                <div class="bg-gray-100 rounded-lg p-3">
                    <p class="font-semibold mt-2 text-center">Administration</p>
                    <div class="flex">
                        <div class="flex ml-3 space-x-4">
                            <div class="flex items-start">
                                <div class="flex items-center h-5">
                                    <input id="important" type="checkbox" value="" class="w-4 h-4 border border-gray-300 rounded bg-gray-50" required>
                                </div>
                                <label for="important" class="ml-2 text-sm font-medium text-gray-900"><i class="fa-solid fa-triangle-exclamation text-orange-500 fa-sm"></i> Important</label>
                            </div>
                            <div class="flex items-start">
                                <div class="flex items-center h-5">
                                    <input id="pin" type="checkbox" value="" class="w-4 h-4 border border-gray-300 rounded bg-gray-50" required>
                                </div>
                                <label for="pin" class="ml-2 text-sm font-medium text-gray-900"><i class="fa-solid fa-thumbtack text-red-600 fa-sm"></i> Épingler</label>
                            </div>
                            <div class="flex items-start">
                                <div class="flex items-center h-5">
                                    <input id="closed" type="checkbox" value="" class="w-4 h-4 border border-gray-300 rounded bg-gray-50" required>
                                </div>
                                <label for="closed" class="ml-2 text-sm font-medium text-gray-900"><i class="fa-solid fa-lock text-yellow-300 fa-sm"></i> Fermer</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <!--
            PUBLIC
            -->
            <div class="border-b p-2">
                <div class="bg-gray-100 rounded-lg p-3">
                    <p class="font-semibold mt-4 text-center">Topic<span class="text-red-500">*</span></p>
                <div class="grid gap-6 mb-4 md:grid-cols-2 mt-4">
                    <div>
                        <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Titre du topic<span class="text-red-500">*</span> :</label>
                        <input id="title" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Titre du topic" required>
                    </div>
                    <div>
                        <label for="last_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tags : <small>Séparez vos tags par ','</small></label>
                        <input type="text" id="last_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Tag1,Tag2,Tag3">
                    </div>
                </div>

                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Options :</label>
                    <div class="flex mb-4">
                        <div class="flex ml-3 space-x-4">
                            <div class="flex items-start">
                                <div class="flex items-center h-5">
                                    <input id="follow" type="checkbox" value="" class="w-4 h-4 border border-gray-300 rounded bg-gray-50" checked>
                                </div>
                                <label for="follow" class="ml-2 text-sm font-medium text-gray-900">Suivre la discussion</label>
                            </div>
                            <div class="flex items-start">
                                <div class="flex items-center h-5">
                                    <input id="mailalert" type="checkbox" value="" class="w-4 h-4 border border-gray-300 rounded bg-gray-50" checked>
                                </div>
                                <label for="mailalert" class="ml-2 text-sm font-medium text-gray-900">Recevoir les alertes par e-mail</label>
                            </div>
                        </div>
                    </div>
                    <label for="summernote-1" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Contenue<span class="text-red-500">*</span> :</label>
                    <textarea id="summernote-1" class="w-full"></textarea>
                </div>
            </div>

            <div class="border-b p-2">
                <div class="bg-gray-100 rounded-lg p-3">
                    <p class="font-semibold mt-4 text-center">Sondage <small><i>Falcutatif</i></small></p>
                    <div class="mt-4">
                        <label for="question" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Question :</label>
                        <input id="question" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                    </div>
                    <div class="mt-4">
                        <label for="response" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Réponse possible :</label>
                        <input id="response" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-1" placeholder="Réponse 1">
                        <input type="text" class="mt-1 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-1" placeholder="Réponse 2">
                        <div class="mt-1 text-center">
                            <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm sm:w-auto p-1 text-center"><i class="fa-solid fa-plus"></i> Ajouter une réponse</button>
                        </div>
                    </div>
                    <label class="block mt-4 mb-2 text-sm font-medium text-gray-900 dark:text-white">Options des réponses :</label>
                    <div class=" mb-4">
                        <div class=" ml-3">
                            <div class="flex items-start">
                                <div class="flex items-center h-5">
                                    <input id="unique" type="checkbox" value="" class="w-4 h-4 border border-gray-300 rounded bg-gray-50">
                                </div>
                                <label for="unique" class="ml-2 text-sm font-medium text-gray-900">Choix unique</label>
                            </div>
                            <div class="flex items-start">
                                <div class="flex items-center h-5">
                                    <input id="multiple" type="checkbox" value="" class="w-4 h-4 border border-gray-300 rounded bg-gray-50">
                                </div>
                                <label for="multiple" class="ml-2 text-sm font-medium text-gray-900">Choix multiple illimité</label>
                            </div>
                            <div class="flex items-start">
                                <div class="flex items-center h-5">
                                    <input id="multipleLimit" type="checkbox" value="" class="w-4 h-4 border border-gray-300 rounded bg-gray-50">
                                </div>
                                <label for="multipleLimit" class="ml-2 text-sm font-medium text-gray-900">Choix multiple limité :</label>
                            </div>
                            <div class="flex flex-wrap space-x-2">
                                    <div class="flex">
                                        <div class="relative w-full ml-4">
                                            <button id="plus" class="absolute top-0 left-0 p-1 text-sm font-medium text-white bg-blue-700 rounded-l-lg border border-blue-700 hover:bg-blue-800"><i class="fa-solid fa-minus"></i></button>
                                            <input class="text-center block p-1 px-6 w-20 z-20 text-sm text-gray-900 bg-gray-50 rounded-r-lg" value="2">
                                            <button id="plus" class="absolute top-0 right-0 p-1 text-sm font-medium text-white bg-blue-700 rounded-r-lg border border-blue-700 hover:bg-blue-800"><i class="fa-solid fa-plus"></i></button>
                                        </div>
                                    </div>
                            </div>
                        </div>
                    </div>
                    <label class="block mt-4 mb-2 text-sm font-medium text-gray-900 dark:text-white">Options :</label>
                    <div class=" mb-4">
                        <div class=" ml-3">
                            <div class="flex items-start">
                                <div class="flex items-center h-5">
                                    <input id="canchange" type="checkbox" value="" class="w-4 h-4 border border-gray-300 rounded bg-gray-50">
                                </div>
                                <label for="canchange" class="ml-2 text-sm font-medium text-gray-900">Les votant peuvent changer leur votes</label>
                            </div>
                            <div class="flex items-start">
                                <div class="flex items-center h-5">
                                    <input id="public" type="checkbox" value="" class="w-4 h-4 border border-gray-300 rounded bg-gray-50">
                                </div>
                                <label for="public" class="ml-2 text-sm font-medium text-gray-900">Les résultats sont publique</label>
                            </div>
                            <div class="flex items-start">
                                <div class="flex items-center h-5">
                                    <input id="publicnovote" type="checkbox" value="" class="w-4 h-4 border border-gray-300 rounded bg-gray-50">
                                </div>
                                <label for="publicnovote" class="ml-2 text-sm font-medium text-gray-900">Les résultats sont publique sans avoir voter</label>
                            </div>
                            <div class="flex items-start">
                                <div class="flex items-center h-5">
                                    <input id="autoclose" type="checkbox" value="" class="w-4 h-4 border border-gray-300 rounded bg-gray-50">
                                </div>
                                <label for="autoclose" class="ml-2 text-sm font-medium text-gray-900">Clore automatiquement après :</label>
                            </div>
                            <div class="flex flex-wrap space-x-2">
                                <div class="w-20">
                                    <input type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-1" placeholder="3">
                                </div>
                                <div>
                                    <select class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-1">
                                        <option value="">Heures</option>
                                        <option value="">Jours</option>
                                        <option value="">Semaines</option>
                                        <option value="">Mois</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <div class="text-center mt-2">
                <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm sm:w-auto px-5 py-2.5 text-center"><i class="fa-solid fa-pen-to-square"></i> Poster</button>
            </div>
        </form>
    </div>
</section>