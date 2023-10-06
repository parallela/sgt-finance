<template>
    <div class="w-full h-full flex p-8">
            <slot />
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
