<template>
    <Box>
        <div>
            <Link :href="route('listing.show', props.listing)">
            <div class="flex items-center gap-1">
                <PriceTag :price="props.listing.price" class="text-2xl font-bold" />
                <div class="text-xs text-gray-500">
                    <PriceTag :price="monthlyPayment" /> pm
                </div>
            </div>
            <ListingSpace :listing="props.listing" class="text-lg" />
            <ListingAddress :listing="props.listing" class="text-gray-500" />
            </Link>
        </div>
        <div>
            <Link :href="route('listing.edit', props.listing)">Edit</Link>
        </div>
        <div>
            <Link :href="route('listing.destroy', props.listing)" method="DELETE">Delete</Link>
        </div>
    </Box>
</template>

<script setup>
import { Link } from '@inertiajs/vue3'
import ListingAddress from '@/Components/ListingAddress.vue';
import ListingSpace from '@/Components/ListingSpace.vue';
import Box from '@/Components/UI/Box.vue';
import PriceTag from '@/Components/PriceTag.vue';
import { useMonthlyPayment } from '@/Composables/useMonthlyPayment';

const props = defineProps({listing: Object});

const { monthlyPayment } = useMonthlyPayment(
    props.listing.price, 2.5, 25,
);
</script>