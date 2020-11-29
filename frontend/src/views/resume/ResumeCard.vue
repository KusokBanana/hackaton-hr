<template>
  <div class="flex items-start" v-if="candidate">
    <div class="flex flex-col flex-grow">
      <div class="flex flex-row items-center mb-5">
        <div class="divide-x divide-appdivider flex items-center space-x-4">
          <div class="text-2xl">{{ candidate.name }}</div>
          <div
            class="pl-4 text-menugrey cursor-pointer"
            @click="$router.go(-1)"
          >
            назад
          </div>
        </div>
        <div class="flex-grow"></div>
        <div class="flex">
          <div
            class="bg-white shadow-card mx-3 plus rounded flex items-center justify-center cursor-pointer"
          >
            <img
              class="cursor-pointer"
              :src="require(`@/assets/icons/plus.svg`)"
            />
          </div>
          <div
            class="bg-white shadow-card mx-3 plus rounded flex items-center justify-center cursor-pointer"
          >
            <img
              class="cursor-pointer"
              :src="require(`@/assets/icons/mail.svg`)"
            />
          </div>
          <div
            class="bg-white shadow-card ml-3 plus rounded flex items-center justify-center cursor-pointer"
          >
            <img
              class="cursor-pointer"
              :src="require(`@/assets/icons/calls.svg`)"
            />
          </div>
        </div>
      </div>
      <!-- Карточка кандидата -->
      <div class="bg-white w-full shadow-card">
        <div class="grid grid-cols-2 gap-4 p-4">
          <div class="flex flex-col">
            <div class="w-full">
              <img
                class="w-full"
                :src="require(`@/assets/images/avatar.svg`)"
              />
            </div>
            <div class="flex items-center mt-4">
              <div class="flex">
                <img
                  class="cursor-pointer"
                  :src="require(`@/assets/icons/volume.svg`)"
                />
                <div class="w-16 px-2"><Progress :progress="80" /></div>
              </div>
              <div class="flex-grow flex justify-items-center">
                <div
                  class="bg-white shadow-card mx-3 plus rounded flex items-center justify-center cursor-pointer"
                >
                  <img
                    class="cursor-pointer"
                    :src="require(`@/assets/icons/play.svg`)"
                  />
                </div>
              </div>
              <div class="flex space-x-8 text-candidategrey">
                <div class="text-appblue">1x</div>
                <div>1.25x</div>
                <div>1.5x</div>
              </div>
            </div>
            <div class="mt-3">
              <Progress :progress="80" />
            </div>
            <div class="flex text-candidategrey mt-1">
              <div>4:00</div>
              <div class="flex-grow"></div>
              <div>00:00</div>
            </div>
            <div class="mt-1 flex">
                <div class="text-candidategrey mr-4">5/5</div>
                <div class="border-l-2 border-appblue pl-4">Какие ключевые выводы вы сделали из прошлого опыта и какие цели перед собой поставили для поиска работы?</div>
            </div>
            <div class="mt-4 flex">
                <div class="rounded-full border w-8 h-8 flex items-center justify-center ml-2" v-for="i in 5" :key="i">{{i}}</div>
            </div>
          </div>
          <div class="flex flex-col">
            <div class="flex-col" v-for="item in testq" :key="item.title">
              <div class="font-medium">{{ item.title }}</div>
              <div class="flex my-2" v-for="step in item.options" :key="step">
                <div class="pr-3">
                  <div
                    class="rounded-full h-8 w-8 border border-yellow-300"
                  ></div>
                </div>
                <div>{{ step }}</div>
              </div>
            </div>
          </div>
        </div>
        <div class="flex p-4">
          <div><Button class="ml-4" color="6C63FF">Завершить</Button></div>
        </div>
      </div>
    </div>

    <!-- Правая часть -->
    <div class="ml-16 flex-col">
      <div class="flex h-full items-center">
        <div
          class="flex-grow px-4 pb-2 font-medium border-b-2 border-appblue cursor-pointer"
        >
          Тестирование
        </div>
        <div class="flex-grow px-4 pb-2 font-medium border-b-2 cursor-pointer">
          Информация
        </div>
        <div class="flex-grow px-4 pb-2 font-medium border-b-2 cursor-pointer">
          История
        </div>
      </div>
      <div class="bg-white p-4 mt-4 rounded shadow-card w-500px">
        <div class="flex flex-wrap">
          <div
            class="border p-1 m-1 rounded flex items-center text-candidategrey"
            v-for="skill in candidate.skills"
            :key="skill.id"
          >
            {{ skill.name }}
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import Progress from "../../components/ui/Progress";
import Button from "../../components/ui/Button";
export default {
  components: { Progress, Button },
  data() {
    return {
      testq: [
        {
          title: "Командность",
          options: [
            "Аргументированно описывает свою позицию, используя “работа в команде”, “общие цели”, “структура”, “распределение обязанностей” и другие характеристики командной работы",
            "Использует для ответа стандартные фразы “все должны хорошо работать”, “нужен хороший начальник” / не может привести пример / В качестве примера приводит обычное рабочее взаимодействие",
            "Не может дать ответ / Сводит ответ к стандартной формулировке “команда должна быть дружной”",
          ],
        },
        {
          title: "Навыки коммуникации",
          options: [
            "Чётко выраженная линия аргументации, речь структурирована, сохраняет спокойствие/допускает незначительное волнение, вызванное процедурой уценки",
            "Умеренно нервничает, иногда теряет нить своего рассказа",
            "Речь запутана и несвязно, замыкается в себе, сильно нервничает, впадает в ступор",
          ],
        },
      ],
    };
  },
  computed: {
    candidate() {
      let data = this.$store.getters["candidates/candidate"](
        parseInt(this.$route.params.id)
      );
      return data;
    },
  },
  created() {
    this.$store.dispatch("candidates/getCandidates");
  },
};
</script>

<style>
.posgrid {
  grid-template-columns: repeat(auto-fit, minmax(330px, 1fr));
}
</style>