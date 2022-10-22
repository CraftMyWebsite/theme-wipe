<?php


/*ACTIVER EN PROD : use CMW\Utils\SecurityService;*/

$title = "Connexion";
$description = "Description de votre page"; ?>

<section class="bg-gray-800 relative text-white">
    <!--PROD DEFINIR LA SOURCE-->
    <img src="/dev/img/bg.webp" class="absolute h-full inset-0 object-center object-cover w-full" alt="Vous devez upload bg.webp depuis votre panel !" width="1080" height="720"/>
    <div class="container mx-auto px-4 py-12 relative">
        <div class="flex flex-wrap -mx-4">
            <div class="mx-auto px-4 text-center w-full lg:w-8/12">
                <h1 class="font-extrabold mb-4 text-2xl md:text-6xl">Connexion</h1>
            </div>
        </div>
    </div>
</section>


    <div class="mx-auto relative p-4 w-full max-w-md h-full md:h-auto mb-6 mt-6">
        <div class="relative bg-white rounded-lg shadow">
            <div class="py-6 px-6 lg:px-8">
                <form class="space-y-6" action="" method="post">
                    <?php /* ACTIVER EN PROD : (new SecurityService())->insertHiddenToken()*/ ?>
                    <div>
                        <label for="email" class="block mb-2 text-sm font-medium text-gray-900">Mail</label>
                        <input name="login_email" type="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="mail@craftmywebsite.fr" required>
                    </div>
                    <div>
                        <label for="password" class="block mb-2 text-sm font-medium text-gray-900">Mot de passe</label>
                        <div class="flex">
                            <input type="password" name="login_password" placeholder="••••••••" class="block bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-l-lg block w-full p-2.5" required>
                            <div class="p-2.5 text-sm font-medium text-white bg-blue-700 rounded-r-lg border border-blue-700 hover:bg-blue-800"><i class="fa fa-eye-slash" aria-hidden="true"></i></div>
                        </div>
                    </div>
                    <div class="flex justify-between">
                        <div class="flex items-start">
                            <div class="flex items-center h-5">
                                <input id="login_keep_connect" name="login_keep_connect" type="checkbox" value="" class="w-4 h-4 bg-gray-50 rounded border border-gray-300 focus:ring-3 focus:ring-blue-300">
                            </div>
                            <label for="login_keep_connect" class="ml-2 text-sm font-medium text-gray-900">Se souvenir de moi</label>
                        </div>
                        <a href="#" class="text-sm text-blue-700 hover:underline">Mot de passe oublié ?</a>
                    </div>
                    <button type="submit" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Connexion</button>
                </form>
                <div class="flex flex-no-wrap justify-center items-center py-4">
                    <div class="bg-gray-500 flex-grow h-px max-w-sm"></div>
                    <div class="px-10 w-auto">
                        <h2 class="font-medium">Se connecter avec</h2>
                    </div>
                    <div class="bg-gray-500 flex-grow h-px max-w-sm"></div>
                </div>
                <div class="px-4 py-2 justify-center text-center w-full sm:w-auto">
                    <div class="flex-wrap inline-flex space-x-3">
                        <a href="#" class="hover:text-blue-600" aria-label="facebook">
                            <i class="fa-xl fa-brands fa-github"></i>
                        </a> <a href="#" class="hover:text-blue-600" aria-label="twitter">
                            <i class="fa-xl fa-brands fa-square-twitter"></i>
                        </a> <a href="#" class="hover:text-blue-600" aria-label="instagram">
                            <i class="fa-xl fa-brands fa-instagram"></i>
                        </a><a href="#" class="hover:text-blue-600" aria-label="discord">
                            <i class="fa-xl fa-brands fa-discord"></i></a>
                        <a href="#" class="hover:text-blue-600" aria-label="discord">
                            <i class="fa-xl fa-brands fa-google"></i></a>
                    </div>
                </div>
                <label class="block text-sm text-gray-900 mt-4">Pas encore de comtpe, <a href="register" class="text-blue-500">s'enregistrer</a></label>
            </div>
        </div>
    </div>


