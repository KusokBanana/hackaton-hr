<template>
  <div class="flex flex-col">
      <div class="flex flex-row items-center divide-x divide-appdivider space-x-4">
          <div class="text-2xl">Задачи</div>
          <div class="pl-4 text-menugrey">сегодня {{ new Date() | moment("D.MM.YYYY") }}</div>
      </div>
      <div class="grid grid-cols-2 gap-5 mt-3">
          <ApplicationColumn />
          <RequestColumn />
      </div>
  </div>
</template>

<script>
import ApplicationColumn from "./ApplicatonsColumn"
import RequestColumn from "./RequestColumn"
export default {
    components: {
        ApplicationColumn,
        RequestColumn
    },
    computed: {
    },
    created() {
      this.$store.dispatch('vacancies/getVacancies')
    }
}
</script>

<style>

</style>