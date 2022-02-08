<template>
    <!--  <AppHeader></AppHeader>-->
    <div class="flex flex-col justify-between min-h-screen">
        <app-header></app-header>
        <main class="flex flex-grow bg-blue-100 bg-100">
            <router-view></router-view>
        </main>
        <app-footer></app-footer>
    </div>
</template>

<script>

import AppHeader from './partials/Header';
import AppFooter from './partials/Footer';

export default {
    components: {
        AppHeader,
        AppFooter,
    }
}
</script>