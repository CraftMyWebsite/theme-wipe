<?php
/*
use CMW\Utils\Utils;
*/
?>
<nav class="bg-white border-gray-200 px-2 sm:px-4 py-2.5 rounded">
    <div class="container flex flex-wrap justify-between items-center mx-auto">
        <a href="/" class="flex items-center">
            <img src="/dev/img/grass.webp" class="mr-3 h-6 sm:h-9" alt="Vous devez upload logo.webp depuis votre panel !">
            <span class="self-center md:text-xl font-semibold whitespace-nowrap">A supprimer<?/*= Utils::getSiteName()*/?></span>
        </a>
        <div class=" hidden flex md:order-2">
            <a href="login" class="md:bg-white bg-blue-700 md:hover:bg-gray-200 hover:bg-blue-800 text-white md:text-gray-700 hover:bg-gray-50 focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-4 py-2 md:px-5 md:py-2.5 mr-1 md:mr-2">Connexion</a>
            <a href="register" class="hidden md:inline text-white bg-blue-700 hover:bg-blue-800 font-medium rounded-lg text-sm px-4 py-2 md:px-5 md:py-2.5 mr-1 md:mr-2 ">S'inscrire</a>
            <button data-collapse-toggle="navbar-cta" type="button" class="inline-flex items-center p-2 text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200" aria-controls="navbar-cta" aria-expanded="false">
                <span class="sr-only">Open main menu</span>
                <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path></svg>
            </button>

            <ul class="flex flex-col bg-gray-50 rounded-lg border border-gray-100 md:flex-row md:space-x-8 md:mt-0 md:text-sm md:font-medium md:border-0 md:bg-white">
                <li id="multiLevelDropdownButton" data-dropdown-toggle="dropdown1" class="cursor-pointer md:text-gray-700 hover:bg-gray-50 font-medium rounded-lg text-sm px-5 py-2.5" ><i class="mr-2 fa-solid fa-user"></i>Zomb<!--TODO : Recuperer nom d'user--></li>
                <div id="dropdown1" class="hidden z-10 w-44 bg-white rounded divide-y divide-gray-100 shadow">
                    <ul class="py-1 text-sm text-gray-700" aria-labelledby="multiLevelDropdownButton">
                        <li>
                            <a href="cmw-admin" target="_blank" class="block py-2 px-4 hover:bg-gray-100"><i class="fa-solid fa-screwdriver-wrench"></i> Administration</a>
                        </li>
                        <li>
                            <a href="profile" class="block py-2 px-4 hover:bg-gray-100"><i class="fa-regular fa-address-card"></i> Profile</a>
                        </li>
                    </ul>
                    <div class="py-1">
                        <a href="#" class="block py-2 px-4 text-sm text-red-700 hover:bg-gray-100"><i class="fa-solid fa-right-from-bracket"></i> Déconnexion</a>
                    </div>
                </div>
            </ul>

        </div>
        <div class="hidden justify-between items-center w-full md:flex md:w-auto md:order-1" id="navbar-cta">
            <ul class="flex flex-col p-4 mt-4 bg-gray-50 rounded-lg border border-gray-100 md:flex-row md:space-x-8 md:mt-0 md:text-sm md:font-medium md:border-0 md:bg-white">
                <li>
                    <a href="#" class="block py-2 pr-4 pl-3 text-white bg-blue-700 rounded md:bg-transparent md:text-blue-700 md:p-0" aria-current="page">Accueil</a>
                </li>
                <li id="multiLevelDropdownButton" data-dropdown-toggle="dropdown" class="cursor-pointer block py-2 pr-4 pl-3 text-gray-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0" >Test</li>
                <div id="dropdown" class="hidden z-10 w-44 bg-white rounded divide-y divide-gray-100 shadow">
                    <ul class="py-1 text-sm text-gray-700" aria-labelledby="multiLevelDropdownButton">
                        <li>
                            <button id="doubleDropdownButton" data-dropdown-toggle="doubleDropdown" data-dropdown-placement="right-start" type="button" class="flex justify-between items-center py-2 px-4 w-full hover:bg-gray-100">Sous menu<svg aria-hidden="true" class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg></button>
                            <div id="doubleDropdown" class="hidden z-10 w-44 bg-white rounded divide-y divide-gray-100 shadow" style="position: absolute; inset: 0px auto auto 0px; margin: 0px; transform: translate(10px, 300px);" data-popper-reference-hidden="" data-popper-escaped="" data-popper-placement="right-start">
                                <ul class="py-1 text-sm text-gray-700" aria-labelledby="doubleDropdownButton">
                                    <li>
                                        <a href="#" class="block py-2 px-4 hover:bg-gray-100">Ok !</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li>
                            <a href="#" class="block py-2 px-4 hover:bg-gray-100">Ok !</a>
                        </li>
                    </ul>
                </div>
            </ul>
        </div>
    </div>
</nav>




