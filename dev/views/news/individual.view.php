<section class="bg-gray-800 relative text-white">
    <!--PROD DEFINIR LA SOURCE-->
    <img src="/dev/img/bg.webp" class="absolute h-full inset-0 object-center object-cover w-full" alt="Vous devez upload bg.webp depuis votre panel !" width="1080" height="720"/>
    <div class="container mx-auto px-4 py-12 relative">
        <div class="flex flex-wrap -mx-4">
            <div class="mx-auto px-4 text-center w-full lg:w-8/12">
                <h1 class="font-extrabold mb-4 text-2xl md:text-6xl">Titre de la news</h1>
                <p>Descritpion de la news</p>
            </div>
        </div>
    </div>
</section>

<div class="my-8 mx-2 xl:mx-72">
    <div class="p-4">
        <div class="md:grid md:grid-cols-5 md:gap-16">
            <div>
                <img class="mx-auto rounded-lg border border-gray-300 shadow-xl" src="https://dev.voyza.fr/public/uploads/users/default/defaultImage.jpg" height="90%" width="90%" alt="...">
                <div class="text-center mt-2">
                    Auteur : Moi
                </div>
                <div class="text-center mt-2">
                    <div class="bg-gray-300 font-medium inline-block px-3 py-1 rounded-sm text-xs uppercase">Date</div>
                </div>
                <div class="text-center mt-2">
                    <span data-tooltip-target="tooltip-default" class="cursor-pointer">
                        <span class="text-base">0 <i class="fa-regular fa-heart"></i></span>
                    </span>
                    <div id="tooltip-default" role="tooltip" class="inline-block absolute invisible z-10 py-2 px-3 text-sm font-medium text-white bg-gray-900 rounded-lg shadow-sm opacity-0 transition-opacity duration-300 tooltip">
                        Vous aimez déjà !
                        <div class="tooltip-arrow" data-popper-arrow></div>
                    </div>
                </div>
                <div class="text-center">
                <a href="/news" class="text-blue-600">< Revenir aux news</a>
                </div>
            </div>
            <div class="md:hidden mt-4 border"></div>
            <div class="col-span-4">
                Contenue de la news
            </div>
        </div>
    </div>
    <div class="flex flex-no-wrap justify-center items-center pt-4">
        <div class="bg-gray-500 flex-grow h-px max-w-sm"></div>
        <div class="px-10 w-auto">
            <h2 class="font-semibold text-2xl uppercase">Espace commentaire</h2>
        </div>
        <div class="bg-gray-500 flex-grow h-px max-w-sm"></div>
    </div>
    <div class="pt-2 pb-6 px-2 lg:px-24 2xl:px-72">

        <div class="bg-white rounded-lg shadow md:grid md:grid-cols-5 py-4 pr-4 mb-4">
            <div class="">
                <img class="hidden lg:block mx-auto rounded-lg border border-gray-300 shadow-xl" src="https://dev.voyza.fr/public/uploads/users/default/defaultImage.jpg" height="50%" width="50%" alt="...">
            </div>
            <div class="col-span-4 px-4 md:px-0">

                <div class="flex justify-between">
                    <div class="font-medium">Auteur :</div>
                    <div class="bg-gray-300 font-medium inline-block px-3 py-1 rounded-sm text-xs uppercase">Date</div>
                </div>

                <div>Bla bla bla</div>
                <div class="flex justify-end">
                    <span data-tooltip-target="tooltip-default" class="cursor-pointer">
                    <span class="text-base">0 <i class="fa-regular fa-heart"></i></span>
                    </span>
                    <div id="tooltip-default" role="tooltip" class="inline-block absolute invisible z-10 py-2 px-3 text-sm font-medium text-white bg-gray-900 rounded-lg shadow-sm opacity-0 transition-opacity duration-300 tooltip">
                        Vous aimez déjà !
                        <div class="tooltip-arrow" data-popper-arrow></div>
                    </div>
                </div>
            </div>
        </div>
        <form method="post" action="" class="">
            <label for="message" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Votre commentaire :</label>
            <textarea id="message" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 " placeholder="Bonjour,"></textarea>
            <div class="text-center mt-4">
                <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg px-4 py-2 md:px-5 md:py-2.5 mr-1 md:mr-2 focus:outline-none">Commenter <i class="fa-solid fa-comments"></i></i></button>

                <button type="button" class="text-white bg-blue-400 dark:bg-blue-500 cursor-not-allowed font-medium rounded-lg px-4 py-2 md:px-5 md:py-2.5 mr-1 md:mr-2 text-center" disabled="">Connectez vous</button>

            </div>
        </form>
    </div>
</div>
