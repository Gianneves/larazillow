<template>
    <MainLayout>
        <h1 class="text-3xl mb-4">Your Listings</h1>
        <section class="mb-4">
            Filters
        </section>
        <section class="grid grid-cols-1 lg:grid-cols-2 gap-2">
            <Box v-for="list in listing" :key="list.id">
                <div class="flex flex-col md:flex-row gap-2 md:items-center justify-between">
                    <div>
                        <div class="xl:flex items-center gap-2">
                            <PriceTag :price="list.price" class="text-2xl font-medium" />
                            <ListingSpace  :listing="list" />
                        </div>
                    </div>
                    <ListingAddress  :listing="list" class="text-gray-500" />
                    <div class="flex items-center gap-1 text-gray-600 dark:text-gray-300">
                        <Link class="btn-outline text-xs font-medium">Preview</Link>
                        <Link class="btn-outline text-xs font-medium">Edit</Link>
                        <Link class="btn-outline text-xs font-medium">Delete</Link>
                    </div>
                </div>
            </Box>
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

defineProps({
    listing: Array
});

</script>