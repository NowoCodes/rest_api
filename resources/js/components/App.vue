<template>
  <!--  <AppHeader></AppHeader>-->
  <div class="flex flex-col min-h-screen justify-between">
    <app-header></app-header>
    <main class="flex flex-grow bg-100 bg-blue-100">
      <router-view></router-view>
    </main>
    <app-footer></app-footer>
  </div>
  <!--  <AppFooter></AppFooter>-->
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