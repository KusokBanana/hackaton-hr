<template>
  <div id="app">
    <div class="min-w-220px w-220px h-full shadow-side z-30 overflow-y-auto">
      <Menu />
    </div>
    <div class="flex-grow z-20 flex flex-col">
      <div class="h-60px z-10 shadow-bottom relative flex items-center">
        <SearchBox class="flex-grow" />
        <div class="text-menugrey">Добавить</div>
        <div
          class="shadow-card mx-3 plus rounded flex items-center justify-center cursor-pointer"
        >
          <img
            class="cursor-pointer"
            :src="require(`@/assets/icons/plus.svg`)"
          />
        </div>
        <div class="h-full border-l flex items-center p-4">
          <div class="mr-4">
            <img
              class="cursor-pointer h-7"
              :src="require(`@/assets/icons/bell.svg`)"
            />
          </div>
          <div class="ml-4">
            <img
              class="cursor-pointer"
              :src="require(`@/assets/icons/avatar.svg`)"
            />
          </div>
          <div class="ml-2">
            <img
              class="cursor-pointer"
              :src="require(`@/assets/icons/triangle.svg`)"
            />
          </div>
        </div>
      </div>
      <div class="h-full overflow-y-auto bg-appbg p-8 pt-5">
        <router-view />
      </div>
    </div>
  </div>
</template>

<script>
import Menu from "./components/menu/SideMenu";
import SearchBox from "./components/search/SearchBox";
export default {
  components: { Menu, SearchBox },
};
</script>

<style lang="scss">
html {
  overflow: hidden;
}
html,
body {
  height: 100%;
}
#app {
  width: 100%;
  height: 100%;
  display: flex;
  flex-direction: row;
  font-family: "TT Firs Neue";
}
.plus {
  min-width: 30px;
  height: 30px;
}
</style>
