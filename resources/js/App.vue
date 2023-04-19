<template>
  <div class="container">

    <section class="px-4 md:px-0">
        <nav>
            <div class=" flex justify-between mx-auto items-center">
                <div>
                    <h3 class="uppercase text-lg font-bold text-slate-700">TestCoding</h3>
                </div>

                <ul class="flex gap-2 font-medium">
                    <li class="text-slate-800 py-2 px-4 hover:text-teal-500 hover:underline">
                        <router-link to="/">
                            Home
                        </router-link>
                    </li>
                </ul>
            </div>
        </nav>
    </section>

    <RouterView></RouterView>
  </div>

</template>

