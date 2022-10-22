<nav class="bg-white border-gray-200 px-2 md:px-4 py-2.5">
    <div class="flex flex-wrap justify-between items-center mx-auto max-w-screen-xl">
        <a href="index.php" class="flex items-center">
            <!--PROD DEFINIR LA SOURCE-->
            <img src="/dev/img/grass.webp" class="mr-3 h-6 sm:h-9" alt="Vous devez upload logo.webp depuis votre panel !">
            <span class="self-center md:text-xl font-semibold whitespace-nowrap">CraftMyWebsite 2.0<!--TODO : Récupération du titre du site--></span>
        </a>
        <div class="flex items-center md:order-2">
            <a href="login" class="hidden md:inline text-gray-800 hover:bg-gray-50 focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-4 py-2 md:px-5 md:py-2.5 mr-1 md:mr-2">Connexion</a>
            <a href="register" class="hidden md:inline text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 md:px-5 md:py-2.5 mr-1 md:mr-2 focus:outline-none">S'inscrire</a>
            <ul class="hidden md:inline">
                <li>
                    <button id="dropdownUserLink" data-dropdown-toggle="dropdownNavbar" class="flex justify-between items-center py-2 pr-4 pl-3 w-full font-medium text-gray-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 md:w-auto"><i class="mr-2 fa-solid fa-user"></i> Pseudo <svg class="ml-1 w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg></button>
                    <!-- Dropdown menu -->
                    <div id="dropdownUser" class="hidden z-10 w-44 font-normal bg-white rounded divide-y divide-gray-100 shadow">
                        <ul class="py-1 text-sm text-gray-700" aria-labelledby="dropdownLargeButton">
                            <li>
                                <a href="#" class="block py-2 px-4 hover:bg-gray-100">Mon compte</a>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>
            <button data-collapse-toggle="mega-menu-icons" type="button" class="inline-flex items-center p-2 ml-1 text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200" aria-controls="mega-menu-icons" aria-expanded="false">
                <span class="sr-only">Open main menu</span>
                <svg aria-hidden="true" class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path></svg>
            </button>
        </div>
        <div id="mega-menu-icons" class="hidden justify-between items-center w-full md:flex md:w-auto md:order-1">
            <ul class="flex flex-col mt-4 text-sm font-medium md:flex-row md:space-x-8 md:mt-0">
                <li>
                    <a href="index.php" class="block py-2 pr-4 pl-3 text-gray-700 border-b border-gray-100 hover:bg-gray-50 md:hover:bg-transparent md:border-0 md:hover:text-blue-600 md:p-0">Accueil</a>
                </li>
                <li>
                    <a href="#" class="block py-2 pr-4 pl-3 text-gray-700 border-b border-gray-100 hover:bg-gray-50 md:hover:bg-transparent md:border-0 md:hover:text-blue-600 md:p-0">Page template</a>
                </li>
                <li>
                    <a href="wiki.php" class="block py-2 pr-4 pl-3 text-gray-700 border-b border-gray-100 hover:bg-gray-50 md:hover:bg-transparent md:border-0 md:hover:text-blue-600 md:p-0">Wiki</a>
                </li>
                <li>
                    <a href="faq.php" class="block py-2 pr-4 pl-3 text-gray-700 border-b border-gray-100 hover:bg-gray-50 md:hover:bg-transparent md:border-0 md:hover:text-blue-600 md:p-0">F.A.Q</a>
                </li>
                <li>
                    <a href="#" class="block py-2 pr-4 pl-3 text-gray-700 border-b border-gray-100 hover:bg-gray-50 md:hover:bg-transparent md:border-0 md:hover:text-blue-600 md:p-0">Votes</a>
                </li>
                <li>
                    <a href="#" class="block py-2 pr-4 pl-3 text-gray-700 border-b border-gray-100 hover:bg-gray-50 md:hover:bg-transparent md:border-0 md:hover:text-blue-600 md:p-0">Boutique</a>
                </li>
                <li class="md:hidden">
                    <a href="#" class=" block py-2 pr-4 pl-3 text-gray-700 border-b border-gray-100 hover:bg-gray-50 md:hover:bg-transparent md:border-0 md:hover:text-blue-600 md:p-0" data-modal-toggle="login-modal">Connexion</a>
                </li>
                <li class="md:hidden">
                    <a href="#" class=" block py-2 pr-4 pl-3 text-gray-700 border-b border-gray-100 hover:bg-gray-50 md:hover:bg-transparent md:border-0 md:hover:text-blue-600 md:p-0" data-modal-toggle="register-modal">S'inscrire</a>
                </li>
                <li class="md:hidden">
                    <button id="dropdownNavbarLink" data-dropdown-toggle="dropdownNavbar" class="flex  py-2 pr-4 pl-3 w-full font-medium text-gray-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 md:w-auto"><i class="mr-2 fa-solid fa-user"></i> Pseudo <svg class="ml-1 w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg></button>
                    <!-- Dropdown menu -->
                    <div id="dropdownNavbar" class="hidden z-10 w-44 font-normal bg-white rounded divide-y divide-gray-100 shadow">
                        <ul class="py-1 text-sm text-gray-700" aria-labelledby="dropdownLargeButton">
                            <li>
                                <a href="#" class="block py-2 px-4 hover:bg-gray-100">Mon compte</a>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>

