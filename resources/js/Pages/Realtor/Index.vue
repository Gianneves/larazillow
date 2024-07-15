<template>
    <MainLayout>
        <h1 class="text-3xl mb-4">Your Listings</h1>
        <section>
            <RealtorFilters :filters="filters" />
        </section>
        <section class="grid grid-cols-1 lg:grid-cols-2 gap-2">
            <Box v-for="list in listing.data" :key="list.id" :class="{ 'border-dashed': list.deleted_at }">
                <div class="flex flex-col md:flex-row gap-2 md:items-center justify-between">
                    <div :class="{ 'opacity-25': list.deleted_at }">
                        <div class="xl:flex items-center gap-2">
                            <PriceTag :price="list.price" class="text-2xl font-medium" />
                            <ListingSpace :listing="list" />
                        </div>
                    </div>
                    <ListingAddress :listing="list" class="text-gray-500" />
                    <section>
                        <div class="flex items-center gap-1 text-gray-600 dark:text-gray-300">
                            <a class="btn-outline text-xs font-medium"
                                :href="route('listing.show', { listing: list.id })" target="_blank">Preview</a>
                            <Link class="btn-outline text-xs font-medium"
                                :href="route('realtor.listing.edit', { listing: list.id })">Edit</Link>
                            <Link v-if="!list.deleted_at" class="btn-outline text-xs font-medium"
                                :href="route('realtor.listing.destroy', { listing: list.id })" as="button"
                                method="delete">
                            Delete
                            </Link>
                            <Link v-else class="btn-outline text-xs font-medium"
                                :href="route('realtor.listing.restore', { listing: list.id })" as="button" method="put">
                            Restore
                            </Link>
                        </div>

                        <div class="mt-2">
                            <Link :href="route('realtor.listing.image.create', { listing: list.id })" class="block w-full btn-outline text-xs font-medium text-center">Images ({{ list.images_count }})</Link>
                        </div>
                        <div class="mt-2">
                            <Link :href="route('realtor.listing.show', { listing: list.id })" class="block w-full btn-outline text-xs font-medium text-center">Offers ({{ list.offers_count }})</Link>
                        </div>
                    </section>
                </div>
            </Box>
        </section>

        <section v-if="listing.data.length" class="w-full flex justify-center mt-4 mb-4">
            <Pagination :links="listing.links" />
        </section>
    </MainLayout>

</template>

<script setup>
import MainLayout from '@/Layouts/MainLayout.vue';
import Box from '@/Components/UI/Box.vue';
import PriceTag from '@/Components/PriceTag.vue';
import ListingSpace from '@/Components/ListingSpace.vue';
import ListingAddress from '@/Components/ListingAddress.vue';
import { Link } from '@inertiajs/vue3';
import RealtorFilters from '../Listing/Index/Components/RealtorFilters.vue';
import Pagination from '@/Components/UI/Pagination.vue';


defineProps({
    listing: Object,
    filters: Object
});

</script>