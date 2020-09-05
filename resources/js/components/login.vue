<template>
  <div class="container">
    <form @submit.prevent="login">
      <div class="form-group">
        <label for="email" class="col-md-4 col-form-label text-md-right">email</label>
        <input type="email" v-model="email" class="form-control" id="email" />
        <span v-if="errors.email">{{ errors.email[0] }}</span>
      </div>

      <div class="form-group">
        <label>パスワード</label>
        <input type="password" v-model="password" />
        <span v-if="errors.password">{{ errors.password[0] }}</span>
      </div>

      <button class="btn btn-primary">ログイン</button>
    </form>
  </div>
</template>

<script>
export default {
  data() {
    return {
      email: "",
      password: "",
      errors: [],
    };
  },
  methods: {
    login() {
      axios.get("/sanctum/csrf-cookie").then((response) => {
        axios
          .post("/api/login", {
            email: this.email,
            password: this.password,
          })
          .then((response) => {
            console.log(response);
            localStorage.setItem("auth", "ture");
            this.$router.push("/about");
          })
          .catch((error) => {
            this.errors = error.response.data.errors;
          });
      });
    },
  },
};
</script>