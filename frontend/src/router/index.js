import Vue from "vue";
import VueRouter from "vue-router";

Vue.use(VueRouter);

const routes = [
  { path: "/", redirect: "/login" },
  {
    path: "/login",
    redirect: "/tasks",
    // component: LoginPage,
    // name: "Login",
    // meta: { isPublic: true },
  },
  {
    path: "/tasks",
    component: () =>
      import(/* webpackChunkName: "about" */ "../views/tasks/TaskList.vue"),
  },
  {
    path: "/positions",
    component: () =>
      import(/* webpackChunkName: "about" */ "../views/positions/PositionsList.vue"),
  },
];

const router = new VueRouter({
  mode: "history",
  base: process.env.BASE_URL,
  routes,
});

export default router;
