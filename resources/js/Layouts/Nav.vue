<template>
  <Popover class="relative bg-gray-50 dark:bg-gray-800 sticky top-0 z-50">
    <div class="mx-auto max-w-full px-4 sm:px-6 ">
      <div class="flex items-center justify-between py-2 md:justify-start md:space-x-10">
        <div class="flex justify-start lg:w-0 lg:flex-1">
          <Link href="/" class="flex items-center">

          <img class="h-8 w-auto sm:h-10" src="../assets/logo.png" alt="" />
          <span class="font-bold text-2xl ml-2 text-green-400 dark:text-blue-50 ">Vaccancy
            <span class="text-green-800 dark:text-blue-200">Mail</span> </span>
          </Link>
        </div>
        <div class="-my-2 -mr-2 md:hidden">
          <button class="m-3" @click="toggleDark()">
            <SunIcon v-if="isDark" class="w-6 h-6 text-gray-800 dark:text-white font-bold" />
            <MoonIcon v-else class="w-6 h-6 text-gray-800 dark:text-white font-bold" />
          </button>
          <PopoverButton
            class="inline-flex items-center justify-center rounded-md bg-white p-2 text-gray-400 hover:bg-gray-100 hover:text-gray-500 dark:bg-transparent focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500">
            <span class="sr-only">Open menu</span>
            <Bars3Icon class="h-6 w-6 " aria-hidden="true" />
          </PopoverButton>
        </div>
        <PopoverGroup as="nav" class="hidden space-x-10 md:flex">
          <router-link to="/"
            class="text-base font-medium text-gray-500 hover:text-gray-900 dark:text-white dark:hover:text-gray-200">Jobs</router-link>
          <router-link to="/company-reviews"
            class="text-base font-medium text-gray-500 hover:text-gray-900 dark:text-white dark:hover:text-gray-200">Company
            Reviews</router-link>

          <Popover class="relative" v-slot="{ open }">
            <PopoverButton
              :class="[open ? 'text-gray-900' : 'text-gray-500', 'group inline-flex items-center rounded-md bg-transparent text-base font-medium hover:text-gray-900 dark:text-white dark:hover:text-gray-200']">
              <span>More</span>
              <ChevronDownIcon
                :class="[open ? 'text-gray-600' : 'text-gray-400', 'ml-2 h-5 w-5 group-hover:text-gray-500']"
                aria-hidden="true" />
            </PopoverButton>

            <transition enter-active-class="transition ease-out duration-200" enter-from-class="opacity-0 translate-y-1"
              enter-to-class="opacity-100 translate-y-0" leave-active-class="transition ease-in duration-150"
              leave-from-class="opacity-100 translate-y-0" leave-to-class="opacity-0 translate-y-1">
              <PopoverPanel class="absolute left-1/2 z-10 mt-3 w-screen max-w-md -translate-x-1/2 transform px-2 sm:px-0">
                <div class="overflow-hidden rounded-lg shadow-lg ring-1 ring-black ring-opacity-5">
                  <div class="relative grid gap-6 bg-white  px-5 py-6 sm:gap-8 sm:p-8 dark:bg-gray-800">
                    <a v-for="item in resources" :key="item.name" :href="item.href"
                      class="-m-3 flex items-start rounded-lg p-3 hover:bg-gray-50 dark:hover:bg-gray-600">
                      <component :is="item.icon" class="h-6 w-6 flex-shrink-0 text-indigo-600" aria-hidden="true" />
                      <div class="ml-4">
                        <p class="text-base font-medium text-gray-900 dark:text-white">{{ item.name }}</p>
                        <p class="mt-1 text-sm text-gray-500 dark:text-gray-300">{{ item.description }}</p>
                      </div>
                    </a>
                  </div>
                  <div class="bg-gray-50 px-5 py-5 sm:px-8 sm:py-8 dark:bg-gray-900">
                    <div>
                      <h3 class="text-base font-medium text-gray-500 dark:text-gray-50">Recent Posts</h3>
                      <ul role="list" class="mt-4 space-y-4">
                        <li v-for="post in recentPosts" :key="post.id" class="truncate text-base">
                          <a :href="post.href"
                            class="font-medium text-gray-900 hover:text-gray-700 dark:text-gray-50 dark:hover:text-gray-200">{{
                              post.name }}</a>
                        </li>
                      </ul>
                    </div>
                    <div class="mt-5 text-sm">
                      <a href="#" class="font-medium text-indigo-600 hover:text-indigo-500">
                        View all posts
                        <span aria-hidden="true"> &rarr;</span>
                      </a>
                    </div>
                  </div>
                </div>
              </PopoverPanel>
            </transition>
          </Popover>
        </PopoverGroup>
        <div v-if="$page.props.canLogin" class="hidden items-center justify-end md:flex md:flex-1 lg:w-0">
          <button class="m-3" @click="toggleDark()">
            <SunIcon v-if="isDark" class="w-6 h-6 text-gray-800 dark:text-white font-bold" />
            <MoonIcon v-else class="w-6 h-6 text-gray-800 dark:text-white font-bold" />
          </button>
          <Link v-if="$page.props.auth.user" :href="route('dashboard')"
            class="whitespace-nowrap text-base font-medium text-gray-500 hover:text-gray-900 dark:text-blue-200 dark:hover:text-blue-500">
          dashboard</Link>

          <template v-else>
            <Link :href="route('login')"
              class="whitespace-nowrap text-base font-medium text-gray-500 hover:text-gray-900 dark:text-blue-200 dark:hover:text-blue-500">
            Sign in</Link>
            <Link v-if="$page.props.canRegister" :href="route('register')"
              class="ml-8 inline-flex items-center justify-center whitespace-nowrap rounded-md border border-transparent bg-indigo-600 px-4 py-2 text-base font-medium text-white shadow-sm hover:bg-indigo-700 dark:text-white dark:border-blue-500 dark:bg-transparent dark:hover:border-blue-100">
            Sign up</Link>
          </template>

        </div>
      </div>
    </div>

    <transition enter-active-class="duration-200 ease-out" enter-from-class="opacity-0 scale-95"
      enter-to-class="opacity-100 scale-100" leave-active-class="duration-100 ease-in"
      leave-from-class="opacity-100 scale-100" leave-to-class="opacity-0 scale-95">
      <PopoverPanel focus class="absolute inset-x-0 top-0 origin-top-right transform p-2 transition md:hidden">
        <div
          class="divide-y-2 divide-gray-50 rounded-lg bg-white shadow-lg ring-1 ring-black ring-opacity-5 dark:bg-gray-800">
          <div class="px-5 pt-5 pb-6">
            <div class="flex items-center justify-between">
              <div>
                <img class="h-8 w-auto" src="../assets/logo.png" alt="Your Company" />
              </div>
              <div class="-mr-2">
                <PopoverButton
                  class="inline-flex items-center justify-center rounded-md bg-transparent p-2 dark:text-white text-gray-900 dark:bg-gray-700 hover:bg-gray-100 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500">
                  <span class="sr-only">Close menu</span>
                  <XMarkIcon class="h-6 w-6" aria-hidden="true" />
                </PopoverButton>
              </div>
            </div>
            <div class="mt-6">
              <nav class="grid gap-y-8">
                <a v-for="item in solutions" :key="item.name" :href="item.href"
                  class="-m-3 flex items-center rounded-md p-3 hover:bg-gray-50">
                  <component :is="item.icon" class="h-6 w-6 flex-shrink-0 text-indigo-600" aria-hidden="true" />
                  <span class="ml-3 text-base font-medium text-gray-900 dark:text-white">{{ item.name }}</span>
                </a>
              </nav>
            </div>
          </div>
          <div class="space-y-6 py-6 px-5">
            <div class="grid grid-cols-2 gap-y-4 gap-x-8">
              <a href="#"
                class="text-base font-medium text-gray-900 hover:text-gray-700 dark:text-gray-50 dark:hover:text-gray-300 ">Find
                Jobs</a>

              <a href="#"
                class="text-base font-medium text-gray-900 dark:text-gray-50 hover:text-gray-700 dark:hover:text-gray-300">Company
                Reviews</a>
              <a v-for="item in resources" :key="item.name" :href="item.href"
                class="text-base font-medium text-gray-900 hover:text-gray-700 dark:text-gray-50 dark:hover:text-gray-300h ">{{
                  item.name }}</a>
            </div>
            <div>
              <Link to="register"
                class="flex w-full items-center justify-center rounded-md border border-transparent bg-indigo-600 px-4 py-2 text-base font-medium text-white shadow-sm hover:bg-indigo-700">
              Sign up</Link>
              <p class="mt-6 text-center text-base font-medium text-gray-500">
                Existing customer?
                {{ ' ' }}
                <Link :href="route('login')" class="text-indigo-600 hover:text-indigo-500">Sign in</Link>
              </p>
            </div>
          </div>
        </div>
      </PopoverPanel>
    </transition>
  </Popover>
  <slot name="content"></slot>
</template>

<script setup>
import { useDark, useToggle } from '@vueuse/core';
import { Link } from '@inertiajs/vue3'
import { Popover, PopoverButton, PopoverGroup, PopoverPanel } from '@headlessui/vue'
import {
  ArrowPathIcon,
  Bars3Icon,
  BookmarkSquareIcon,
  CalendarIcon,
  ChartBarIcon,
  CursorArrowRaysIcon,
  LifebuoyIcon,
  SunIcon,
  PhoneIcon,
  PlayIcon,
  ShieldCheckIcon,
  MoonIcon,
  XMarkIcon
} from '@heroicons/vue/24/outline'
import { ChevronDownIcon } from '@heroicons/vue/20/solid'
const isDark = useDark();
const toggleDark = useToggle(isDark);
const resources = [
  {
    name: 'Help Center',
    description: 'Get all of your questions answered in our forums or contact support.',
    href: '#',
    icon: LifebuoyIcon,
  },
  {
    name: 'Guides',
    description: 'Learn how to maximize our platform to get the most out of it.',
    href: '#',
    icon: BookmarkSquareIcon,
  },
  {
    name: 'Events',
    description: 'See what meet-ups and other events we might be planning near you.',
    href: '#',
    icon: CalendarIcon,
  },
  { name: 'Security', description: 'Understand how we take your privacy seriously.', href: '#', icon: ShieldCheckIcon },
]
const recentPosts = [
  { id: 1, name: 'Boost your conversion rate', href: '#' },
  { id: 2, name: 'How to use search engine optimization to drive traffic to your site', href: '#' },
  { id: 3, name: 'Improve your customer experience', href: '#' },
]
</script>
