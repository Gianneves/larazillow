<template>
    <MainLayout>
        <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-4">
            <Box v-for="list in listing" :key="list.id">
            <div>
                <Link :href="route('listing.show', list.id)">
                <PriceTag :price="list.price" class="text-2xl font-bold" />
                <ListingSpace :listing="list" class="text-lg" />
                <ListingAddress :listing="list" class="text-gray-500" />
                </Link>
            </div>
            <div>
                <Link :href="route('listing.edit', list.id)">Edit</Link>
            </div>
            <div>
                <Link :href="route('listing.destroy', list.id)" method="DELETE">Delete</Link>
            </div>
        </Box>
        </div>
    </MainLayout>
</template>

<script setup>
import { Link } from '@inertiajs/vue3'
import ListingAddress from '@/Components/ListingAddress.vue';
import ListingSpace from '@/Components/ListingSpace.vue';
import MainLayout from '@/Layouts/MainLayout.vue';
import Box from '@/Components/UI/Box.vue';
import PriceTag from '@/Components/PriceTag.vue';

defineProps({
    listing: Array,
});
</script>